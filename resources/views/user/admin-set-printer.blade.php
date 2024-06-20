<x-app-layout>


  <!-- Image Upload -->
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white border rounded-lg shadow p-4">
        <div class="p-2">
          <!-- Body content goes here -->
          @if (Session::has('message'))
            <div class="bg-green-500 text-white px-4 py-2 rounded">
              <!-- Alert content goes here -->
              {{ Session::get('message') }}
            </div>
          @endif
          <form method="post" action="" enctype="multipart/form-data">
            @csrf
            <table class="min-w-full divide-y divide-gray-400">
              <tbody class="bg-white divide-y divide-gray-400">
                <!-- ... similar for other rows ... -->
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap">Set Printer</td>
                  <td><select
                      class="py-3 px-4 pe-9 block w-1/3 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                      <option selected="">Open this select menu</option>
                      <option>Printer 1</option>
                      <option>Printer 2</option>
                      <option>Printer 3</option>
                    </select></td>
                </tr>
                <tr>
                  <td class="px-6 py-4"></td>
                  <td class="px-6 py-4">
                    <button type="button"
                      class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50 disabled:pointer-events-none"
                      data-hs-overlay="#hs-task-created-alert">
                      Submit
                    </button>

                    <div id="hs-task-created-alert"
                      class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
                      <div
                        class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                        <div class="relative flex flex-col bg-white shadow-lg rounded-xl dark:bg-neutral-900">
                          <div class="absolute top-2 end-2">
                            <button type="button"
                              class="flex justify-center items-center size-7 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-transparent dark:hover:bg-neutral-700"
                              data-hs-overlay="#hs-task-created-alert">
                              <span class="sr-only">Close</span>
                              <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 6 6 18" />
                                <path d="m6 6 12 12" />
                              </svg>
                            </button>
                          </div>

                          <div class="p-4 sm:p-10 text-center overflow-y-auto">
                            <!-- Icon -->
                            <span
                              class="mb-4 inline-flex justify-center items-center size-[46px] rounded-full border-4 border-green-50 bg-green-100 text-green-500 dark:bg-green-700 dark:border-green-600 dark:text-green-100">
                              <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                  d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09z" />
                              </svg>
                            </span>
                            <!-- End Icon -->

                            <h3 class="mb-2 text-xl font-bold text-gray-800 dark:text-neutral-200">
                              Printer 1 has been chosen!
                            </h3>
                            <p class="text-gray-500 dark:text-neutral-500">
                              You can see the progress of your task in your <a
                                class="inline-flex items-center gap-x-1.5 text-blue-600 decoration-2 hover:underline font-medium dark:text-blue-500"
                                href="#">personal account.</a>
                            </p>

                            <div class="mt-6 flex justify-center gap-x-4">
                              <button type="button"
                                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-800 dark:text-white dark:hover:bg-neutral-800"
                                data-hs-overlay="#hs-task-created-alert">
                                Cancel
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <button onclick="event.preventDefault()"
                      class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">
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

</x-app-layout>
