<x-app-layout>

  <div class="container mx-auto py-4 px-2 h-full" style="width: 1200px; height: 590px;">
    <!-- Content Left Side -->
    <div class="sm:col-span-2 h-full custom-scrollbar">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl h-full">
        <div class="bg-white overflow-hidden rounded shadow p-4 h-full">
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
                        <div class="px-6 py-4">Admin Track Order</div>
                      </div>
                      <div class="py-2">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 bg-white border-b border-gray-200">
                              @if ($trainings && $trainings->count() > 0)
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
                                                  Update Order Progress
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
                                    {{-- <img src="{{ asset('images/trainings/' . $training->photo) }}" alt="Training Image"
                                      class="w-40 h-40 rounded-md mb-4"> --}}
                                    <h4 class="text-md font-normal text-gray-800 dark:text-black"></h4>
                                    <ul class="text-white py-2">
                                      {{-- <li>Color:
                                        {{ $training->printing_color_option == '1' ? 'Black & White' : 'Color' }}</li>
                                      <li>Layout: {{ ucfirst($training->layout_option) }}</li>
                                      <li>Copies: {{ $training->copies }}</li>
                                      <li>Total Price: RM{{ number_format($training->total_price, 2) }}</li> --}}
                                      <li>Time: {{ \Carbon\Carbon::parse($training->time)->format('d-m-Y H:i') }}</li>
                                      <li>Status: {{ $training->payment_status }}</li>
                                      <li>Payment Method: {{ $training->payment_method }}</li>
                                      <li>Order Progress: {{ ucfirst($training->order_progress) }}</li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                              <!-- Update Order Progress -->
                              <div id="hs-static-backdrop-modal-update-{{ $training->order_id }}"
                                class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto [--overlay-backdrop:static]' data-hs-overlay-keyboard="false">
                                <div
                                  class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hs-overlay-open:delay-0 min-h-[calc(100%-3.5rem)]  flex items-center justify-center px-4 ">
                                  <div
                                    class="relative w-full h-full max-w-2xl md:h-auto justify-center flex items-center mt-20">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-neutral-700">
                                      <!-- Modal header -->
                                      <div
                                        class="flex items-start justify-between p-4 border-b rounded-t dark:border-neutral-600">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                          Update Order Progress
                                        </h3>
                                        <button type="button"
                                          class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-neutral-600 dark:hover:text-white"
                                          data-hs-overlay="#hs-static-backdrop-modal-update-{{ $training->order_id }}">
                                          <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                              d="M4.293 4.293a1 1 0 0 1 1.414 0L10 8.586l4.293-4.293a1 1 0 0 1 1.414 1.414L11.414 10l4.293 4.293a1 1 0 0 1-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 0 1-1.414-1.414L8.586 10 4.293 5.707a1 1 0 0 1 0-1.414z"
                                              clip-rule="evenodd"></path>
                                          </svg>
                                          <span class="sr-only">Close modal</span>
                                        </button>
                                      </div>
                                      <!-- Modal body -->
                                      <div class="p-6 space-y-6">
                                        <form action="{{ route('update.order.progress') }}" method="POST">
                                          @csrf
                                          <input type="hidden" name="order_id" value="{{ $training->order_id }}">
                                          <div class="mb-4">
                                            <label for="order_progress"
                                              class="block text-sm font-medium text-gray-700">Order
                                              Progress</label>
                                            <select name="order_progress" id="order_progress"
                                              class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                                              <option value="pending"
                                                {{ $training->order_progress == 'pending' ? 'selected' : '' }}>Pending
                                              </option>
                                              <option value="in progress"
                                                {{ $training->order_progress == 'in progress' ? 'selected' : '' }}>In
                                                Progress
                                              </option>
                                              <option value="completed"
                                                {{ $training->order_progress == 'completed' ? 'selected' : '' }}>
                                                Completed
                                              </option>
                                            </select>
                                          </div>
                                          <div class="flex justify-end">
                                            <button type="submit"
                                              class="px-4 py-2 font-semibold text-white bg-blue-500 rounded-md shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                              Update
                                            </button>
                                          </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- Delete Order Progress -->
                              <div id="hs-static-backdrop-modal-delete-{{ $training->order_id }}"
                                class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto [--overlay-backdrop:static]' data-hs-overlay-keyboard="false">
                                <div
                                  class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hs-overlay-open:delay-0 min-h-[calc(100%-3.5rem)]  flex items-center justify-center px-4 ">
                                  <div
                                    class="relative w-full h-full max-w-2xl md:h-auto justify-center flex items-center mt-20">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-neutral-700">
                                      <!-- Modal header -->
                                      <div
                                        class="flex items-start justify-between p-4 border-b rounded-t dark:border-neutral-600">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                          Delete Order
                                        </h3>
                                        <button type="button"
                                          class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-neutral-600 dark:hover:text-white"
                                          data-hs-overlay="#hs-static-backdrop-modal-delete-{{ $training->order_id }}">
                                          <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                              d="M4.293 4.293a1 1 0 0 1 1.414 0L10 8.586l4.293-4.293a1 1 0 0 1 1.414 1.414L11.414 10l4.293 4.293a1 1 0 0 1-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 0 1-1.414-1.414L8.586 10 4.293 5.707a1 1 0 0 1 0-1.414z"
                                              clip-rule="evenodd"></path>
                                          </svg>
                                          <span class="sr-only">Close modal</span>
                                        </button>
                                      </div>
                                      <!-- Modal body -->
                                      <div class="p-6 space-y-6">
                                        <form action="{{ route('delete.order') }}" method="POST">
                                          @csrf
                                          <input type="hidden" name="order_id" value="{{ $training->order_id }}">
                                          <div class="flex justify-end">
                                            <button type="submit"
                                              class="px-4 py-2 font-semibold text-white bg-red-500 rounded-md shadow-sm hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                              Delete
                                            </button>
                                          </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              @php
                                $currentOrderId = $training->order_id;
                              @endphp
                              @endforeach
                              @if ($currentOrderId !== null)
                            </div> <!-- Close last container -->
                            @endif
                          @else
                            <p>No trainings found.</p>
                            @endif
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Content Right Side -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</x-app-layout>
