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
      <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500"
        href="{{ route('user.print-upload') }}">
        Create Print Job
        <svg class="flex-shrink-0 mx-2 overflow-visible size-4 text-gray-400 dark:text-neutral-600"
          xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="m9 18 6-6-6-6" />
        </svg>
      </a>
    </li>
    <li class="inline-flex items-center">
      <a class="flex items-center text-sm text-gray-300 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500"
        href="{{ route('user.print-preference') }}">
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
        Print Preview
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

  <!-- Upload Documents -->
  <section class="text-gray-600 body-font">
    <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
      <form>
        <label for="large-file-input" class="sr-only">Choose file</label>
        <input type="file" name="large-file-input" id="large-file-input"
          class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400
          file:bg-gray-50 file:border-0
          file:me-4
          file:py-3 file:px-4 file:sm:py-5
          dark:file:bg-neutral-700 dark:file:text-neutral-400">
      </form>






      <!-- Upload Files -->
      <div class="text-center lg:w-2/3 w-full py-5">
        <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Upload Files</h1>
        <p class="mb-8 leading-relaxed">Click anywhere in the box above to upload your document.</p>
        <div class="flex justify-center my-2 mx-2">
          <button
            class="py-3 px-4 inline-flex my-5 mx-4 items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-100 text-blue-800 hover:bg-blue-200 disabled:opacity-50 disabled:pointer-events-none dark:hover:bg-blue-900 dark:text-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
            <a href="">Reset</button>
          <button
            class="py-3 px-4 inline-flex my-5 mx-4 items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-100 text-blue-800 hover:bg-blue-200 disabled:opacity-50 disabled:pointer-events-none dark:hover:bg-blue-900 dark:text-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
            <a href="{{ route('user.print-preference') }}">Next</button>
        </div>
      </div>
    </div>
  </section>










</x-app-layout>
