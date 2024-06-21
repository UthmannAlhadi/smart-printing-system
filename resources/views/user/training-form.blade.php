<x-app-layout>

  <div class="flex flex-col w-full mt-8">
    <!-- Chevrons Breadcrumbs -->
    <ol class="flex justify-center whitespace-nowrap mb-2 w-1/2 px-8" aria-label="Breadcrumb">
      <li class="inline-flex items-center">
        <a
          class="flex items-center text-sm text-gray-300 hover:text-purple-600 focus:outline-none focus:text-purple-600 dark:focus:text-purple-500">
          Dashboard
        </a>
        <svg class="flex-shrink-0 mx-2 overflow-visible size-4 text-gray-400 dark:text-neutral-600"
          xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="m9 18 6-6-6-6" />
        </svg>
      </li>
      <li class="inline-flex items-center">
        <a
          class="flex items-center text-sm text-gray-300 hover:text-purple-600 focus:outline-none focus:text-purple-600 dark:focus:text-purple-500">
          Print Explain
          <svg class="flex-shrink-0 mx-2 overflow-visible size-4 text-gray-400 dark:text-neutral-600"
            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="m9 18 6-6-6-6" />
          </svg>
        </a>
      </li>
      <li class="inline-flex items-center">
        <a
          class="flex items-center text-sm text-gray-900 hover:text-purple-600 focus:outline-none focus:text-purple-600 dark:focus:text-purple-500">
          Create Print Job
          <svg class="flex-shrink-0 mx-2 overflow-visible size-4 text-gray-400 dark:text-neutral-600"
            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="m9 18 6-6-6-6" />
          </svg>
        </a>
      </li>
      <li class="inline-flex items-center">
        <a
          class="flex items-center text-sm text-gray-300 hover:text-purple-600 focus:outline-none focus:text-purple-600 dark:focus:text-purple-500">
          Set Print Preference
          <svg class="flex-shrink-0 mx-2 overflow-visible size-4 text-gray-400 dark:text-neutral-600"
            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="m9 18 6-6-6-6" />
          </svg>
        </a>
      </li>
      <li class="inline-flex items-center">
        <a
          class="flex items-center text-sm text-gray-300 hover:text-purple-600 focus:outline-none focus:text-purple-600 dark:focus:text-purple-500">
          Preview
        </a>
      </li>
      {{-- <li class="inline-flex items-center text-sm font-semibold text-gray-800 truncate dark:text-gray-200"
      aria-current="page">
      Create Print Job
    </li> --}}
    </ol>
    <!-- Chevrons Breadcrumbs End -->
  </div>

  <!-- Image Upload -->
  <div class="py-12 drop-shadow-lg">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white rounded-lg shadow p-4">
        <div class="p-2">
          <!-- Body content goes here -->
          @if (Session::has('message'))
            <div class="bg-green-500 text-white px-4 py-2 rounded">
              <!-- Alert content goes here -->
              {{ Session::get('message') }}
            </div>
          @endif
          <form id="training-form" method="post" action="{{ route('user.add-training') }}"
            enctype="multipart/form-data" onsubmit="handleFormSubmit(event)">
            @csrf
            <table class="min-w-full divide-y divide-gray-400">
              <tbody class="bg-white">
                <!-- ... similar for other rows ... -->
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap">Upload File</td>
                  <td class="px-6 py-4">
                    <input type="file" name="photo" class="p-2 border rounded-md w-full">
                    @error('photo')
                      <span class="text-red-500">{{ $message }}</span>
                    @enderror
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td class="px-6 text-gray-900 text-opacity-50 text-xs">
                    <p>Upload 1 document per print job</p>
                    <p>Only pdf, doc, docx, jpeg, jpg and png are allowed</p>
                  </td>
                </tr>
                <tr>
                  <td class="px-6 py-4"></td>
                  <td class="px-6 py-4">
                    <button type="submit"
                      class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">
                      Upload
                    </button>

                    <button onclick="event.preventDefault(); location.href='{{ route('user.print-explain') }}';"
                      class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-50">
                      Cancel
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- File detect alert -->
  <div id="hs-file-detect-alert"
    class="hs-overlay hidden fixed top-0 left-0 w-full h-full flex items-center justify-center z-[80] overflow-x-hidden overflow-y-auto bg-gray-900 bg-opacity-50">
    <div class="bg-white shadow-lg rounded-xl dark:bg-neutral-900 max-w-lg w-full p-4 sm:p-10">
      <div class="relative">
        <button type="button"
          class="absolute top-2 right-2 text-gray-800 hover:bg-gray-100 dark:text-white dark:hover:bg-neutral-700"
          onclick="cancelUpload()">
          <span class="sr-only">Close</span>
          <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>

        <div class="text-center">
          <!-- Icon -->
          <span
            class="inline-flex items-center justify-center w-16 h-16 mb-4 rounded-full border-4 border-yellow-50 bg-yellow-100 text-yellow-500 dark:bg-yellow-700 dark:border-yellow-600 dark:text-yellow-100">
            <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
              <path
                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
            </svg>
          </span>
          <!-- End Icon -->

          <h3 id="modal-title" class="text-2xl font-bold text-gray-800 dark:text-neutral-200"></h3>
          <p id="modal-message" class="text-gray-500 dark:text-neutral-500"></p>

          <div class="mt-6 flex justify-center gap-x-4">
            <button onclick="proceedWithUpload()"
              class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">Submit</button>
            <button onclick="cancelUpload()"
              class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-50">Cancel</button>
          </div>
        </div>
      </div>
    </div>
  </div>



  <script>
    document.getElementById('training-form').addEventListener('submit', function(event) {
      event.preventDefault(); // Prevent form submission
      const fileInput = document.querySelector('input[name="photo"]');
      const file = fileInput.files[0];

      if (file) {
        const fileType = file.type;
        const allowedTypes = ['application/pdf', 'image/jpeg', 'image/png', 'application/msword',
          'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
        ];

        if (allowedTypes.includes(fileType)) {
          // Show modal based on file type
          if (fileType === 'application/pdf') {
            showModal('PDF File Detected', 'Are you sure you would like to upload this document?');
          } else if (fileType === 'application/msword' || fileType ===
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document') {
            showModal('Word Document Detected', 'Are you sure you would like to upload this document?');
          } else if (fileType === 'image/jpeg' || fileType === 'image/png') {
            showModal('Image File Detected', 'Are you sure you would like to upload this image?');
          } else {
            // Directly submit for unsupported files just in case
            document.getElementById('training-form').submit();
          }
        } else {
          alert('Unsupported file type.');
        }
      } else {
        alert('No file selected.');
      }
    });

    function showModal(title, message) {
      document.getElementById('modal-title').textContent = title;
      document.getElementById('modal-message').textContent = message;
      document.getElementById('hs-file-detect-alert').classList.remove('hidden');
    }

    function proceedWithUpload() {
      document.getElementById('hs-file-detect-alert').classList.add('hidden');
      document.getElementById('training-form').submit();
    }

    function cancelUpload() {
      document.getElementById('hs-file-detect-alert').classList.add('hidden');
    }
  </script>




</x-app-layout>
