<x-app-layout>


  <!-- Container for breadcrumbs and title -->
  <div class="flex flex-col w-full mt-8">

    <!-- Chevrons Breadcrumbs -->
    <ol class="flex justify-center whitespace-nowrap mb-4 w-1/2 px-8" aria-label="Breadcrumb">
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
          class="flex items-center text-sm text-gray-900 hover:text-purple-600 focus:outline-none focus:text-purple-600 dark:focus:text-purple-500">
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
          class="flex items-center text-sm text-gray-300 hover:text-purple-600 focus:outline-none focus:text-purple-600 dark:focus:text-purple-500">
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

    <!-- Title -->
    <h1
      class="relative justify-center mt-4 w-4/6 pb-0 font-medium text-center text-gray-900 text-xl lg:text-xl dark:text-neutral-200">
      Step-by-step explanation before you start print job
    </h1>
  </div>


  <!-- Step by Step -->
  <section class="text-gray-600 body-font">
    <div class="container px-5 py-8 mx-auto flex flex-wrap">
      <div class="flex relative pt-10 pb-20 sm:items-center md:w-2/3 mx-auto">
        <div class="h-full w-6 absolute inset-0 flex items-center justify-center">
          <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
        </div>
        <!-- Step 1 -->
        <div
          class="flex-shrink-0 w-6 h-6 rounded-full mt-10 sm:mt-0 inline-flex items-center justify-center bg-purple-500 text-white relative z-10 title-font font-medium text-sm">
          1</div>
        <div class="flex-grow md:pl-8 pl-6 flex sm:items-center items-start flex-col sm:flex-row">
          <div
            class="flex-shrink-0 w-12 h-12 bg-purple-100 text-purple-500 rounded-full inline-flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-8 h-8"
              viewBox="0 0 16 16">
              <path
                d="M8.5 11.5a.5.5 0 0 1-1 0V7.707L6.354 8.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 7.707z" />
              <path
                d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
            </svg>
          </div>
          <div class="flex-grow sm:pl-6 mt-6 sm:mt-0">
            <h2 class="font-medium title-font text-gray-900 mb-1 text-xl">Upload Document</h2>
            <p class="leading-relaxed">Upload a document to print.</p>
          </div>
        </div>
      </div>
      <div class="flex relative pb-20 sm:items-center md:w-2/3 mx-auto">
        <div class="h-full w-6 absolute inset-0 flex items-center justify-center">
          <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
        </div>
        <div
          class="flex-shrink-0 w-6 h-6 rounded-full mt-10 sm:mt-0 inline-flex items-center justify-center bg-purple-500 text-white relative z-10 title-font font-medium text-sm">
          2</div>
        <div class="flex-grow md:pl-8 pl-6 flex sm:items-center items-start flex-col sm:flex-row">
          <div
            class="flex-shrink-0 w-12 h-12 bg-purple-100 text-purple-500 rounded-full inline-flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
              <path
                d="M6 12a.75.75 0 0 1-.75-.75v-7.5a.75.75 0 1 1 1.5 0v7.5A.75.75 0 0 1 6 12ZM18 12a.75.75 0 0 1-.75-.75v-7.5a.75.75 0 0 1 1.5 0v7.5A.75.75 0 0 1 18 12ZM6.75 20.25v-1.5a.75.75 0 0 0-1.5 0v1.5a.75.75 0 0 0 1.5 0ZM18.75 18.75v1.5a.75.75 0 0 1-1.5 0v-1.5a.75.75 0 0 1 1.5 0ZM12.75 5.25v-1.5a.75.75 0 0 0-1.5 0v1.5a.75.75 0 0 0 1.5 0ZM12 21a.75.75 0 0 1-.75-.75v-7.5a.75.75 0 0 1 1.5 0v7.5A.75.75 0 0 1 12 21ZM3.75 15a2.25 2.25 0 1 0 4.5 0 2.25 2.25 0 0 0-4.5 0ZM12 11.25a2.25 2.25 0 1 1 0-4.5 2.25 2.25 0 0 1 0 4.5ZM15.75 15a2.25 2.25 0 1 0 4.5 0 2.25 2.25 0 0 0-4.5 0Z" />
            </svg>
          </div>
          <div class="flex-grow sm:pl-6 mt-6 sm:mt-0">
            <h2 class="font-medium title-font text-gray-900 mb-1 text-xl">Set Preference</h2>
            <p class="leading-relaxed">Custom your print preference.</p>
          </div>
        </div>
      </div>
      <div class="flex relative pb-20 sm:items-center md:w-2/3 mx-auto">
        <div class="h-full w-6 absolute inset-0 flex items-center justify-center">
          <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
        </div>
        <div
          class="flex-shrink-0 w-6 h-6 rounded-full mt-10 sm:mt-0 inline-flex items-center justify-center bg-purple-500 text-white relative z-10 title-font font-medium text-sm">
          3</div>
        <div class="flex-grow md:pl-8 pl-6 flex sm:items-center items-start flex-col sm:flex-row">
          <div
            class="flex-shrink-0 w-12 h-12 bg-purple-100 text-purple-500 rounded-full inline-flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-8 h-8"
              viewBox="0 0 16 16">
              <path
                d="M10.854 7.854a.5.5 0 0 0-.708-.708L7.5 9.793 6.354 8.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z" />
              <path
                d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
            </svg>
          </div>
          <div class="flex-grow sm:pl-6 mt-6 sm:mt-0">
            <h2 class="font-medium title-font text-gray-900 mb-1 text-xl">Print Preview</h2>
            <p class="leading-relaxed">View document before proceed printing.</p>
          </div>
        </div>
      </div>
      <div class="flex relative pb-10 sm:items-center md:w-2/3 mx-auto">
        <div class="h-full w-6 absolute inset-0 flex items-center justify-center">
          <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
        </div>
        <div
          class="flex-shrink-0 w-6 h-6 rounded-full mt-10 sm:mt-0 inline-flex items-center justify-center bg-purple-500 text-white relative z-10 title-font font-medium text-sm">
          4</div>
        <div class="flex-grow md:pl-8 pl-6 flex sm:items-center items-start flex-col sm:flex-row">
          <div
            class="flex-shrink-0 w-12 h-12 bg-purple-100 text-purple-500 rounded-full inline-flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
              class="w-8 h-8" viewBox="0 0 16 16">
              <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4" />
              <path
                d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2z" />
            </svg>
          </div>
          <div class="flex-grow sm:pl-6 mt-6 sm:mt-0">
            <h2 class="font-medium title-font text-gray-900 mb-1 text-xl">Payment</h2>
            <p class="leading-relaxed">Proceed to payment after confirm print.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Button -->
  <a div class="flex justify-center" href="{{ route('user.training-form') }}">
    <button type="button"
      class="py-2 px-4 inline-flex my-5 items-center gap-x-1 text-sm font-semibold rounded-lg border border-transparent bg-blue-100 text-blue-800 hover:bg-blue-200 disabled:opacity-50 disabled:pointer-events-none dark:hover:bg-blue-900 dark:text-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
      Next
    </button>
    </div>

</x-app-layout>
