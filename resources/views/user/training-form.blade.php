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
          <form method="post" action="{{ route('user.add-training') }}" enctype="multipart/form-data">
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
                  <td class="px-6 text-red-500 text-xs">
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
    class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
    <div
      class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
      <div class="relative flex flex-col bg-white shadow-lg rounded-xl dark:bg-neutral-900">
        <div class="absolute top-2 end-2">
          <button type="button"
            class="flex justify-center items-center size-7 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-transparent dark:hover:bg-neutral-700"
            data-hs-overlay="#hs-sign-out-alert">
            <span class="sr-only">Close</span>
            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
              viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round">
              <path d="M18 6 6 18" />
              <path d="m6 6 12 12" />
            </svg>
          </button>
        </div>

        <div class="p-4 sm:p-10 text-center overflow-y-auto">
          <!-- Icon -->
          <span
            class="mb-4 inline-flex justify-center items-center size-[62px] rounded-full border-4 border-yellow-50 bg-yellow-100 text-yellow-500 dark:bg-yellow-700 dark:border-yellow-600 dark:text-yellow-100">
            <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
              fill="currentColor" viewBox="0 0 16 16">
              <path
                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
            </svg>
          </span>
          <!-- End Icon -->

          <h3 class="mb-2 text-2xl font-bold text-gray-800 dark:text-neutral-200">
            PDF File Detected
          </h3>
          <p class="text-gray-500 dark:text-neutral-500">
            Are you sure you would like to upload this document?
          </p>

          <div class="mt-6 flex justify-center gap-x-4">
            <button type="Submit"
              class="px-4 py-2 bg-purple-500 text-white rounded-md hover:bg-purple-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">
              Submit
            </button>

            <button onclick="event.preventDefault(); location.href='{{ route('user.print-explain') }}';"
              class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-50">
              Cancel
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

</x-app-layout>
