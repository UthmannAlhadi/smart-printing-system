<x-app-layout>



  <div class="container mx-auto py-4 px-2 h-full" style="width: 1200px; height: 590px; overflow: hidden;">
    <!-- Content Left Side -->
    <div class="sm:col-span-2 h-full overflow-y-auto custom-scrollbar">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl h-full">
        <div class="bg-white rounded shadow p-4 h-full">
          <div class="p-2 h-full">
            @if (Session::has('message'))
              <div class="bg-green-500 text-white px-4 py-2 rounded">
                {{ Session::get('message') }}
              </div>
            @endif
            <div class="flex flex-col h-full">
              <div class="sm:-mx-6 lg:-mx-8 w-full h-full">
                <div class="inline-block min-w-full py-0 sm:px-6 lg:px-8 h-full">
                  <div class="overflow-auto h-full custom-scrollbar">
                    <div class="min-w-full text-left text-sm font-light h-full">
                      <div class="border-b border-gray-400 font-medium dark:border-neutral-900">
                        <div class="px-6 py-4">Update Payment</div>
                      </div>
                      <div class="py-2">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 bg-white border-b border-gray-200">
                              @php
                                $currentOrderId = null;
                              @endphp
                              @foreach ($trainings as $training)
                                @if ($training->order_id != $currentOrderId)
                                  @if ($currentOrderId !== null)
                            </div> <!-- Close previous container -->
                            @endif
                            <div class="flex mx-2 overflow-hidden">
                              @endif
                              <div class="py-4 mx-2">
                                <div class="w-48 max-w-sm px-4 py-3 bg-cyan-900 rounded-3xl shadow-md dark:bg-gray-800">
                                  @if ($training->order_id != $currentOrderId)
                                    <div class="flex items-center justify-between">
                                      <span
                                        class="px-3 py-1 text-xs text-slate-800 uppercase bg-blue-200 rounded-full dark:bg-blue-300 dark:text-blue-900">
                                        Order ID: {{ $training->order_id }}
                                      </span>
                                      <td class="size-px whitespace-nowrap ">
                                        <div class="px-0 py-2">
                                          <div class="hs-dropdown [--placement:bottom-right] relative inline-block ">
                                            <button id="hs-table-dropdown-{{ $training->order_id }}" type="button"
                                              class="hs-dropdown-toggle py-1.5 px-2 inline-flex justify-center items-center gap-2 rounded-lg text-gray-700 align-middle disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:text-neutral-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
                                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="white" class="flex-shrink-0 size-4" viewBox="0 0 16 16">
                                                <path
                                                  d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                              </svg>
                                            </button>
                                            <div
                                              class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden divide-y divide-gray-200 min-w-40 z-20 bg-white shadow-2xl rounded-lg p-2 mt-2 dark:divide-neutral-700 dark:bg-neutral-800 dark:border dark:border-neutral-700"
                                              aria-labelledby="hs-table-dropdown-{{ $training->order_id }}">
                                              <div class="py-2 first:pt-0 last:pb-0">
                                                <span
                                                  class="block py-2 px-3 text-xs font-medium uppercase text-gray-400 dark:text-neutral-600">Actions</span>
                                                <button type="button"
                                                  class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300"
                                                  data-hs-overlay="#hs-static-backdrop-modal-update-{{ $training->order_id }}">
                                                  Update Payment
                                                </button>
                                              </div>
                                              <div class="py-2 first:pt-0 last:pb-0">
                                                <button type="button"
                                                  class="flex items-center w-full text-left gap-x-3 py-2 px-3 rounded-lg text-sm text-red-600 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-red-500 dark:hover:bg-neutral-700 dark:hover:text-neutral-300"
                                                  data-hs-overlay="#hs-static-backdrop-modal-delete-{{ $training->order_id }}">
                                                  Delete
                                                </button>
                                              </div>
                                            </div>

                                          </div>
                                        </div>
                                      </td>
                                    </div>
                                  @endif
                                  <div class="mt-2">
                                    <img src="{{ asset('images/trainings/' . $training->photo) }}" alt="Training Image"
                                      class="w-40 h-40 rounded-md mb-4">
                                    <h4 class="text-md font-normal text-gray-800 dark:text-black"></h4>
                                    <ul class="text-white py-2">
                                      <li>Color:
                                        {{ $training->printing_color_option == '1' ? 'Black & White' : 'Color' }}</li>
                                      <li>Layout: {{ ucfirst($training->layout_option) }}</li>
                                      <li>Copies: {{ $training->copies }}</li>
                                      <li>Total Price: RM{{ number_format($training->total_price, 2) }}</li>
                                      <li>Status: {{ $training->payment_status }}</li>
                                      <li>Time: {{ \Carbon\Carbon::parse($training->time)->format('d-m-Y H:i') }}</li>
                                      <li>Payment Method: {{ $training->payment_method }}</li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                              <!-- Update Payment -->
                              <div id="hs-static-backdrop-modal-update-{{ $training->order_id }}"
                                class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto [--overlay-backdrop:static]' data-hs-overlay-keyboard="false">
                                <div
                                  class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                                  <div
                                    class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
                                    <div
                                      class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
                                      <h3 class="font-bold text-gray-800 dark:text-white">
                                        Update Payment
                                      </h3>
                                      <button type="button"
                                        class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700"
                                        data-hs-overlay="#hs-static-backdrop-modal-update-{{ $training->order_id }}">
                                        <span class="sr-only">Close</span>
                                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                          width="24" height="24" viewBox="0 0 24 24" fill="none"
                                          stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                          stroke-linejoin="round">
                                          <path d="M18 6 6 18"></path>
                                          <path d="m6 6 12 12"></path>
                                        </svg>
                                      </button>
                                    </div>
                                    <div class="p-4 overflow-y-auto">
                                      <p class="mt-1 text-gray-800 dark:text-neutral-400">
                                        Are you sure this order has been paid. This action
                                        cannot be undone.
                                      </p>
                                    </div>
                                    <div
                                      class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
                                      <button type="button"
                                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800"
                                        data-hs-overlay="#hs-static-backdrop-modal-update-{{ $training->order_id }}">
                                        Close
                                      </button>
                                      <form action="{{ route('update.payment') }}" method="POST"
                                        class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-green-500 hover:bg-green-800 focus:ring-2 focus:ring-blue-500 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300">
                                        @csrf
                                        <input type="hidden" name="order_id" value="{{ $training->order_id }}">
                                        <button type="submit" class="w-full text-left">Update
                                          Payment</button>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- Delete Order -->
                              <div id="hs-static-backdrop-modal-delete-{{ $training->order_id }}"
                                class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto [--overlay-backdrop:static]' data-hs-overlay-keyboard="false">
                                <div
                                  class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                                  <div
                                    class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
                                    <div
                                      class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
                                      <h3 class="font-bold text-gray-800 dark:text-white">
                                        Confirm Delete
                                      </h3>
                                      <button type="button"
                                        class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700"
                                        data-hs-overlay="#hs-static-backdrop-modal-delete-{{ $training->order_id }}">
                                        <span class="sr-only">Close</span>
                                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                          width="24" height="24" viewBox="0 0 24 24" fill="none"
                                          stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                          stroke-linejoin="round">
                                          <path d="M18 6 6 18"></path>
                                          <path d="m6 6 12 12"></path>
                                        </svg>
                                      </button>
                                    </div>
                                    <div class="p-4 overflow-y-auto">
                                      <p class="mt-1 text-gray-800 dark:text-neutral-400">
                                        Are you sure you would like to delete this order from the database. This action
                                        cannot be undone.
                                      </p>
                                    </div>
                                    <div
                                      class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
                                      <button type="button"
                                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800"
                                        data-hs-overlay="#hs-static-backdrop-modal-delete-{{ $training->order_id }}">
                                        Close
                                      </button>
                                      <form action="{{ route('delete.order') }}" method="POST"
                                        class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-red-500 hover:bg-red-800 focus:ring-2 focus:ring-blue-500 dark:text-red-500 dark:hover:bg-neutral-700 dark:hover:text-neutral-300">
                                        @csrf
                                        <input type="hidden" name="order_id" value="{{ $training->order_id }}">
                                        <button type="submit" class="w-full text-left">Delete</button>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              @php
                                $currentOrderId = $training->order_id;
                              @endphp
                              @endforeach
                              @if ($currentOrderId !== null)
                            </div> <!-- Close the last container -->
                            @endif
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</x-app-layout>
