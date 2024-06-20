<x-app-layout>

  <div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6 text-gray-800 dark:text-white">Uploaded Receipts</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
      @php
        $displayedOrderIds = [];
      @endphp
      @foreach ($receipts as $receipt)
        @if (!in_array($receipt->order_id, $displayedOrderIds))
          @php
            $displayedOrderIds[] = $receipt->order_id;
          @endphp
          <div class="bg-white rounded-lg shadow-lg p-4 dark:bg-neutral-800">
            <img src="{{ asset('uploads/' . $receipt->receipt) }}" alt="Receipt Image"
              class="w-full h-48 object-cover rounded-lg mb-4">
            <p class="text-gray-600 dark:text-neutral-400 text-sm">Uploaded on:
              {{ $receipt->created_at->format('d M Y') }}</p>
            <p class="text-gray-600 dark:text-neutral-400 text-sm">Order ID: {{ $receipt->order_id }}</p>
            {{-- <p class="text-gray-600 dark:text-neutral-400 text-sm">Total Price: {{ $receipt->training->total_price }}</p> --}}
            {{-- <p class="text-gray-600 dark:text-neutral-400 text-sm">Payment Status:
              {{ $receipt->training->payment_status }}</p> --}}
          </div>
        @endif
      @endforeach
    </div>
  </div>

</x-app-layout>
