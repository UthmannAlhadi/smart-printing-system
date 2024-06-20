<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Training;
use Illuminate\Support\Facades\File;
// use Image;
use App\Models\UploadedFile;
use Illuminate\Support\Facades\Storage;
// use Intervention\Image\ImageManagerStatic as Image;
use Spatie\PdfToImage\Pdf;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;


class TrainingController extends Controller
{

    public function getTrainingList()
    {
        $trainings = Training::all();
        // $uploaded_files = UploadedFile::all();
        Session::put('trainings', $trainings);

        // Get training IDs stored in the session
        $trainingIds = session()->get('uploaded_training_ids', []);

        // Retrieve trainings based on the IDs stored in the session
        $trainings = Training::whereIn('id', $trainingIds)->get();
        return view('user.training-list', compact('trainings'));

    }

    public function getTrainingForm()
    {

        return view('user.training-form');
    }

    public function postAddTraining(Request $request): RedirectResponse
    {

        //Latest
        $userId = auth()->user()->id;
        $training = new Training();

        $this->validate($request, [
            'photo' => 'nullable|mimes:pdf,jpg,jpeg,png,doc,docx|max:10000',
        ]);

        if ($request->hasFile('photo')) {
            $uploadedFile = $request->file('photo');
            $originalExtension = $uploadedFile->getClientOriginalExtension();
            $filename = 'training_' . $userId . '_' . time();
            $pdfFilename = $filename . '.pdf';
            $tempPath = storage_path('app/temp');

            // Ensure the directory exists
            $path = public_path('images/trainings');
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            // Clear temporary directory before conversion
            $tempPath = storage_path('app/temp');
            File::cleanDirectory($tempPath);

            if (in_array($originalExtension, ['doc', 'docx'])) {
                // Convert Word document to PDF using LibreOffice
                $command = "\"C:\\Program Files\\LibreOffice\\program\\soffice\" --headless --convert-to pdf --outdir " . escapeshellarg($tempPath) . " " . escapeshellarg($uploadedFile->getRealPath());
                \Log::info("Executing command: $command");

                // List files in tempPath before conversion
                $beforeFiles = scandir($tempPath);
                \Log::info("Files before conversion: " . implode(", ", $beforeFiles));

                $output = null;
                $returnVar = null;
                exec($command, $output, $returnVar);

                \Log::info("Command output: " . implode("\n", $output));
                \Log::info("Command return status: $returnVar");

                // List files in tempPath after conversion
                $afterFiles = scandir($tempPath);
                \Log::info("Files after conversion: " . implode(", ", $afterFiles));

                if ($returnVar !== 0) {
                    \Log::error("Failed to convert Word document to PDF: " . implode("\n", $output));
                    return redirect()->back()->withErrors(['photo' => 'Failed to convert Word document to PDF.']);
                }

                // Find the newly generated PDF file by comparing the file lists before and after conversion
                $newFiles = array_diff($afterFiles, $beforeFiles);
                $pdfPath = null;
                foreach ($newFiles as $file) {
                    if (pathinfo($file, PATHINFO_EXTENSION) === 'pdf') {
                        $pdfPath = $tempPath . '/' . $file;
                        break;
                    }
                }

                if (!$pdfPath || !file_exists($pdfPath)) {
                    \Log::error("Generated PDF file does not exist or is not readable: $pdfPath");
                    return redirect()->back()->withErrors(['photo' => 'Generated PDF file does not exist or is not readable.']);
                }

                // Log the existence of the PDF file
                \Log::info("Generated PDF file exists: $pdfPath");
            } elseif ($originalExtension === 'pdf') {
                // Directly use the uploaded PDF
                $pdfPath = $uploadedFile->getRealPath();
                \Log::info("Using uploaded PDF: $pdfPath");
            } else {
                // If it's not a PDF or Word document, directly save the uploaded image
                $imageFilename = $filename . '.' . $originalExtension;
                $uploadedFile->move($path, $imageFilename);
                $training->photo = $imageFilename;
                $training->save();
                session()->flash('message', 'Display document');
                return redirect()->route('user.training-list');
            }

            // Convert the generated or uploaded PDF to images
            try {
                $pdf = new Pdf($pdfPath);
            } catch (\Exception $e) {
                \Log::error("Failed to initialize Pdf object: " . $e->getMessage());
                return redirect()->back()->withErrors(['photo' => 'Failed to initialize Pdf object.']);
            }

            $pageCount = $pdf->getNumberOfPages();
            \Log::info("Number of pages in PDF: $pageCount");
            for ($page = 1; $page <= $pageCount; $page++) {
                $imageFilename = $filename . '_page' . $page . '.jpg';
                $imagePath = $path . '/' . $imageFilename;

                try {
                    $pdf->setPage($page)->saveImage($imagePath);
                    \Log::info("Saved image for page $page: $imagePath");
                } catch (\Exception $e) {
                    \Log::error("Failed to convert PDF page $page to image: " . $e->getMessage());
                    return redirect()->back()->withErrors(['photo' => "Failed to convert PDF page $page to image."]);
                }

                // Save each page as a separate Training entry (or handle as needed)
                $trainingPage = new Training();
                $trainingPage->photo = $imageFilename;
                $trainingPage->save();

                // Store the training ID in the session for potential deletion
                $uploadedTrainingIds = Session::get('uploaded_training_ids', []);
                $uploadedTrainingIds[] = $trainingPage->id;
                Session::put('uploaded_training_ids', $uploadedTrainingIds);
                Session::put('training_page', $trainingPage);
                Session::put('training', $training);
                Session::put('page', $page);
                Session::put('image_path', $imagePath);
            }
            $request->session()->put('total_pages', $pageCount);

            // Delete the temporary PDF file if it was converted from a Word document
            if (in_array($originalExtension, ['doc', 'docx'])) {
                unlink($pdfPath);
            }
        }

        session()->flash('message', 'Display uploaded document');
        return redirect()->route('user.training-list');

    }
    public function deleteTraining(Request $request)
    {
        // Fetch the training IDs stored in the session
        $trainingIds = Session::get('uploaded_training_ids', []);
        Log::info("Deleting training IDs: " . implode(", ", $trainingIds));

        foreach ($trainingIds as $trainingId) {
            $training = Training::find($trainingId);

            if ($training) {
                // Ensure the filename pattern is retrieved correctly
                $filenamePattern = $training->photo;
                $directory = public_path('images/trainings');

                // Delete the file
                $file = $directory . '/' . $filenamePattern;
                if (File::exists($file)) {
                    File::delete($file);
                }

                // Delete the record from the database
                $training->delete();
            }
        }

        // Clear the session data related to the upload
        Session::forget('uploaded_training_ids');

        return redirect()->route('user.training-form')->with('message', 'All uploaded files and data have been deleted.');
    }

    public function updateDocumentDisplay(Request $request)
    {
        // Validate the request data
        $request->validate([
            'printing_color_option' => 'required|in:1,2',
            'layout_option' => 'required|in:portrait,landscape',
            'copies' => 'required|integer|min:1',
        ]);

        // Store preferences in session
        session([
            'printing_color_option' => $request->input('printing_color_option'),
            'layout_option' => $request->input('layout_option'),
            'copies' => $request->input('copies'),
        ]);

        // Process documents as needed (e.g., convert to grayscale if necessary)
        $printingColorOption = $request->input('printing_color_option');
        $trainings = Training::all();

        foreach ($trainings as $training) {
            $imagePath = public_path('images/trainings/' . $training->photo);
            if (File::exists($imagePath)) {
                if ($printingColorOption == '1') {
                    // Convert the image to black and white
                    $image = Image::make($imagePath)->greyscale();
                    $image->save($imagePath);
                } else {
                    // Color images are already uploaded as color
                }
            }
        }

        // Flash a message to the session
        session()->flash('message', 'Preferences applied successfully.');

        return redirect()->route('user.training-list');
    }

    public function printPreview(Request $request)
    {
        $trainings = Training::all();
        // Get training IDs stored in the session
        $trainingIds = session()->get('uploaded_training_ids', []);
        $trainings = Training::whereIn('id', $trainingIds)->get();

        // Log the training IDs and training data for debugging
        \Log::info('Training IDs from session: ' . implode(', ', $trainingIds));
        \Log::info('Trainings: ' . $trainings->toJson());



        // Retrieve preferences from session with default values
        $printing_color_option = Session::get('printing_color_option', '1');
        $layout_option = Session::get('layout_option', 'portrait');
        $copies = Session::get('copies', 1);

        $preferences = [
            'printing_color_option' => $printing_color_option,
            'layout_option' => $layout_option,
            'copies' => $copies
        ];

        // Store preferences in session
        Session::put('printing_color_option', $printing_color_option);
        Session::put('layout_option', $layout_option);
        Session::put('copies', $copies);

        // Update each training entry with the preferred settings
        foreach ($trainings as $training) {
            $training->printing_color_option = $printing_color_option;
            $training->layout_option = $layout_option;
            $training->copies = $copies;
            $training->save();
        }

        // Retrieve total pages from session
        $totalPages = Session::get('total_pages', 1);

        session()->put('total_price', $request->input('total_price'));
        session()->put('trainings', $request->input('trainings'));

        // Calculate price based on preferences
        $colorPrice = $printing_color_option == '1' ? 0.1 : 0.2;
        $totalPrice = $colorPrice * $copies * $totalPages;
        session()->put('total_price', $totalPrice);

        // Prepare preferences for display
        $preferences = [
            'printing_color_option' => $printing_color_option,
            'layout_option' => $layout_option,
            'copies' => $copies
        ];

        // Log the total price for debugging
        \Log::info('Total Price Calculated: ' . $totalPrice);
        // Debugging to ensure session data is set
        \Log::info('Session data set: ', session()->all());

        return view('user.print-preview', compact('trainings', 'preferences', 'totalPrice'));
    }

    public function updatePreferences(Request $request)
    {
        $request->validate([
            'printing_color_option' => 'required|in:1,2',
            'layout_option' => 'required|in:portrait,landscape',
            'copies' => 'required|integer|min:1',
        ]);

        session([
            'printing_color_option' => $request->input('printing_color_option'),
            'layout_option' => $request->input('layout_option'),
            'copies' => $request->input('copies'),
        ]);

        return response()->json(['success' => true]);
    }

    public function cancelPreview()
    {
        // Clear the session data related to preferences
        Session::forget('printing_color_option');
        Session::forget('layout_option');
        Session::forget('copies');

        // Redirect back to the training-list page
        return redirect()->route('user.training-list')->with('message', 'Preferences have been cleared.');
    }


}