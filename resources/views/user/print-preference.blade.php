<x-app-layout>

  <!-- Chevrons Breadcrumbs -->
  <ol class="flex items-center whitespace-nowrap" aria-label="Breadcrumb">
    <li class="inline-flex items-center">
      <a class="flex items-center text-sm text-gray-300 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500"
        href="{{ route('dashboard') }}">
        Dashboard
      </a>
      <svg class="flex-shrink-0 mx-2 overflow-visible size-4 text-gray-400 dark:text-neutral-600"
        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="m9 18 6-6-6-6" />
      </svg>
    </li>
    <li class="inline-flex items-center">
      <a class="flex items-center text-sm text-gray-300 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500"
        href="{{ route('user.print-explain') }}">
        Print Explain
        <svg class="flex-shrink-0 mx-2 overflow-visible size-4 text-gray-400 dark:text-neutral-600"
          xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="m9 18 6-6-6-6" />
        </svg>
      </a>
    </li>
    <li class="inline-flex items-center">
      <a class="flex items-center text-sm text-gray-300 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500"
        href="{{ route('user.training-form') }}">
        Create Print Job
        <svg class="flex-shrink-0 mx-2 overflow-visible size-4 text-gray-400 dark:text-neutral-600"
          xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="m9 18 6-6-6-6" />
        </svg>
      </a>
    </li>
    <li class="inline-flex items-center">
      <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500"
        href="{{ route('user.training-list') }}">
        Set Print Preference
        <svg class="flex-shrink-0 mx-2 overflow-visible size-4 text-gray-400 dark:text-neutral-600"
          xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="m9 18 6-6-6-6" />
        </svg>
      </a>
    </li>
    <li class="inline-flex items-center">
      <a class="flex items-center text-sm text-gray-300 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500"
        href="{{ route('user.print-preview') }}">
        Payment
        <svg class="flex-shrink-0 mx-2 overflow-visible size-4 text-gray-400 dark:text-neutral-600"
          xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="m9 18 6-6-6-6" />
        </svg>
      </a>
    </li>
    {{-- <li class="inline-flex items-center text-sm font-semibold text-gray-800 truncate dark:text-gray-200"
      aria-current="page">
      Create Print Job
    </li> --}}
  </ol>

  <div>
    <!-- File upload -->
    <div class="px-4 sm:px-0 mt-5">
      <h3 class="text-base font-semibold leading-7 text-gray-900">File Upload Information</h3>
      <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Kertas Kerja Mobility.pdf</p>
    </div>

    <!-- File Preference -->
    <div class="mt-6 border-t border-gray-100">
      <dl class="divide-y divide-gray-100">

        <!-- Printing Color -->
        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
          <dt class="text-sm font-medium leading-6 text-gray-900">Printing Color</dt>
          <!-- radio button -->
          <main class="grid w-full place-items-center">
            <div class="grid w-[30rem] grid-cols-2 gap-2 rounded-xl bg-gray-200 p-2">
              <div>
                <input type="radio" name="printing_color_option" id="printing_color_option_black" value="1"
                  class="peer hidden" checked />
                <label for="printing_color_option_black"
                  class="block cursor-pointer select-none rounded-xl p-2 text-center peer-checked:bg-blue-500 peer-checked:font-bold peer-checked:text-white">Black
                  & White</label>
              </div>

              <div>
                <input type="radio" name="printing_color_option" id="printing_color_option_color" value="2"
                  class="peer hidden" />
                <label for="printing_color_option_color"
                  class="block cursor-pointer select-none rounded-xl p-2 text-center peer-checked:bg-blue-500 peer-checked:font-bold peer-checked:text-white">Color</label>
              </div>
            </div>
          </main>
        </div>

        <!-- Copies -->
        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
          <dt class="text-sm font-medium leading-6 text-gray-900">Copies</dt>
          <input type="text"
            class="py-2 px-3 block w-16 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none bg-gray-200 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
            placeholder="0">
        </div>

        <!-- Portrait Option -->
        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
          <dt class="text-sm font-medium leading-6 text-gray-900">Portrait Option</dt>
          <main class="grid w-full place-items-center">
            <div class="grid w-[30rem] grid-cols-2 gap-2 rounded-xl bg-gray-200 p-2">
              <div>
                <input type="radio" name="portrait_option" id="portrait_option_portrait" value="1"
                  class="peer hidden" checked />
                <label for="portrait_option_portrait"
                  class="block cursor-pointer select-none rounded-xl p-2 text-center peer-checked:bg-blue-500 peer-checked:font-bold peer-checked:text-white">Portrait</label>
              </div>

              <div>
                <input type="radio" name="portrait_option" id="portrait_option_landscape" value="2"
                  class="peer hidden" />
                <label for="portrait_option_landscape"
                  class="block cursor-pointer select-none rounded-xl p-2 text-center peer-checked:bg-blue-500 peer-checked:font-bold peer-checked:text-white">Landscape</label>
              </div>
            </div>
          </main>
        </div>

        <!-- Page Per Sheet -->
        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
          <dt class="text-sm font-medium leading-6 text-gray-900">Page Per Sheet</dt>
          <div class="grid w-[30rem] grid-cols-4 gap-2 rounded-xl bg-gray-200 p-2">
            <div>
              <input type="radio" name="page_sheet_option" id="page_option_1" value="1" class="peer hidden"
                checked />
              <label for="page_option_1"
                class="block cursor-pointer select-none rounded-xl p-2 text-center peer-checked:bg-blue-500 peer-checked:font-bold peer-checked:text-white">1</label>
            </div>

            <div>
              <input type="radio" name="page_sheet_option" id="page_option_2" value="2"
                class="peer hidden" />
              <label for="page_option_2"
                class="block cursor-pointer select-none rounded-xl p-2 text-center peer-checked:bg-blue-500 peer-checked:font-bold peer-checked:text-white">2</label>
            </div>

            <div>
              <input type="radio" name="page_sheet_option" id="page_option_3" value="3"
                class="peer hidden" />
              <label for="page_option_3"
                class="block cursor-pointer select-none rounded-xl p-2 text-center peer-checked:bg-blue-500 peer-checked:font-bold peer-checked:text-white">3</label>
            </div>

            <div>
              <input type="radio" name="page_sheet_option" id="page_option_4" value="4"
                class="peer hidden" />
              <label for="page_option_4"
                class="block cursor-pointer select-none rounded-xl p-2 text-center peer-checked:bg-blue-500 peer-checked:font-bold peer-checked:text-white">4</label>
            </div>
          </div>
        </div>

        <!-- Page Range -->
        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
          <dt class="text-sm font-medium leading-6 text-gray-900">Page Range</dt>
          <input type="text"
            class="py-2 px-3 block w-24 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none bg-gray-200 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
            placeholder="1-5, 8, 11-13">
        </div>

        <!-- Sided Option -->
        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
          <dt class="text-sm font-medium leading-6 text-gray-900">Sided Options</dt>
          <div class="grid w-[30rem] grid-cols-3 gap-2 rounded-xl bg-gray-200 p-2">
            <div>
              <input type="radio" name="sided_option" id="sided_option_1" value="1" class="peer hidden"
                checked />
              <label for="sided_option_1"
                class="block cursor-pointer select-none rounded-xl p-2 text-center peer-checked:bg-blue-500 peer-checked:font-bold peer-checked:text-white">Single</label>
            </div>

            <div>
              <input type="radio" name="sided_option" id="sided_option_2" value="2" class="peer hidden" />
              <label for="sided_option_2"
                class="block cursor-pointer select-none rounded-xl p-2 text-center peer-checked:bg-blue-500 peer-checked:font-bold peer-checked:text-white">Double
                (short)</label>
            </div>

            <div>
              <input type="radio" name="sided_option" id="sided_option_3" value="3" class="peer hidden" />
              <label for="sided_option_3"
                class="block cursor-pointer select-none rounded-xl p-2 text-center peer-checked:bg-blue-500 peer-checked:font-bold peer-checked:text-white">Double
                (long)</label>
            </div>

          </div>
        </div>
      </dl>
    </div>

    <!-- Buttons -->
    <div class="flex justify-center my-2 mx-2">
      <button
        class="py-3 px-4 inline-flex my-5 mx-4 items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-100 text-blue-800 hover:bg-blue-200 disabled:opacity-50 disabled:pointer-events-none dark:hover:bg-blue-900 dark:text-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
        <a href="">Reset</button>
      <button
        class="py-3 px-4 inline-flex my-5 mx-4 items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-100 text-blue-800 hover:bg-blue-200 disabled:opacity-50 disabled:pointer-events-none dark:hover:bg-blue-900 dark:text-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
        <a href="{{ route('user.print-preview') }}">Next</button>
    </div>

  </div>


</x-app-layout>
