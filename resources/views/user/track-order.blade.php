<x-app-layout>


  <div class="container mx-auto py-4 px-2 h-full drop-shadow-lg" style="width: 1200px; height: 590px; overflow: hidden;">
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
                        <div class="px-6 py-4">Track Order</div>
                      </div>
                      <div class="py-2">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 bg-white border-b border-gray-200">
                              @php
                                $currentOrderId = null;
                                $count = 0;
                              @endphp
                              <div class="flex flex-wrap -mx-2">
                                @foreach ($trainings as $training)
                                  @if ($training->order_id != $currentOrderId)
                                    @if ($count % 4 == 0 && $count != 0)
                              </div>
                              <div class="flex flex-wrap -mx-2 mt-4">
                                @endif
                                @php
                                  $currentOrderId = $training->order_id;
                                  $count++;
                                @endphp
                                @endif
                                <div class="w-full sm:w-1/2 lg:w-1/4 px-2 mb-4">
                                  <div class="w-full bg-cyan-900 rounded-3xl shadow-md dark:bg-gray-800 p-4">
                                    <div class="flex items-center justify-between mb-2">
                                      <span
                                        class="px-3 py-1 text-xs text-slate-800 uppercase bg-blue-200 rounded-full dark:bg-blue-300 dark:text-blue-900">
                                        Order ID: {{ $training->order_id }}
                                      </span>
                                    </div>
                                    <div class="mt-2">
                                      {{-- <img src="{{ asset('images/trainings/' . $training->photo) }}"
                                        alt="Training Image" class="w-full h-40 rounded-md mb-4"> --}}
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
                                @endforeach
                              </div> <!-- Close last container -->
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
  </div>



</x-app-layout>
