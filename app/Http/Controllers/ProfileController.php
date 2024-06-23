<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function showImageForm()
    {
        return view('profile.image');
    }

    public function updateImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = auth()->user();

        if ($request->file('image')) {
            // $imagePath = $request->file('image')->store('profile_images', 'public');
            // $user->profile_image = $imagePath;

            $image = $request->file('image');
            $imagePath = 'profile_' . time() . '.' . $image->getClientOriginalExtension();

            // Ensure the directory exists
            $path = public_path('profile_images');
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            Image::make($image)->resize(300, 300)->save($path . '/' . $imagePath);
            $user->profile_image = $imagePath;

        }

        $user->save();

        //save photo
        // if($request->hasFile('photo')){
        //     $image = $request->file('photo');
        //     $filename = 'training_'.$userId.'_'.time().'.'.$image->getClientOriginalExtension();

        //     // Ensure the directory exists
        //     $path = public_path('images/trainings');
        //     if(!File::isDirectory($path)){
        //         File::makeDirectory($path, 0777, true, true);
        //     }

        //     Image::make($image)->resize(300,300)->save($path.'/'.$filename);
        //     $training->photo = $filename;

        // }


        return back()->with('status', 'profile-image-updated');
    }
}
