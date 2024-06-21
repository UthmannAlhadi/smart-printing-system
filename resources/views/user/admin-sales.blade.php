<x-app-layout>
  <div class="w-full">
    <div class="p-4 sm:p-6 space-y-2 sm:space-y-6 ">

      <!-- Toggle monthy / annual -->
      <div class="flex justify-between mb-3">
        <h2 class="text-xl font-bold md:text-4xl md:leading-tight dark:text-white">Sales Dashboard</h2>
      </div>
      <!-- End Toggle -->

      <!-- Card Grid -->
      <div class="grid grid-cols-4 lg:items-center bg-white drop-shadow-lg rounded-xl dark:border-neutral-700">
        <!-- Number of sales -->
        <div class="flex flex-col p-4">
          <div class="flex justify-start items-center mb-1">
            <h4 class="text-gray-800 dark:text-neutral-200">Number of sales</h4>
            <div class="hs-tooltip">
              <div class="hs-tooltip-toggle">
                <svg class="flex-shrink-0 size-4 ml-2 text-gray-500 dark:text-neutral-500"
                  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <circle cx="12" cy="12" r="10" />
                  <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
                  <path d="M12 17h.01" />
                </svg>
                <span
                  class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-neutral-700"
                  role="tooltip">
                  The number of sales daily
                </span>
              </div>
            </div>
          </div>
          <div class="flex gap-x-1">
            <span class="text-base font-normal text-gray-800 dark:text-neutral-200">RM</span>
            <p class="text-gray-800 font-semibold text-3xl dark:text-neutral-200">
              {{ $dailyIncome }}
            </p>
          </div>
        </div>
        <!-- End Card -->

        <!-- Average Sales daily -->
        <div class="flex flex-col p-4">
          <div class="flex justify-between">
            <h4 class="text-gray-800 mb-1 dark:text-neutral-200">Average sales daily</h4>
          </div>
          <div class="flex gap-x-1">
            <span class="text-base font-normal text-gray-800 dark:text-neutral-200">RM</span>
            <p class="text-gray-800 font-semibold text-3xl dark:text-neutral-200">
              {{ $averageDailySales }}
            </p>
          </div>
        </div>
        <!-- End Card -->

        <!-- Average sales monthly -->
        <div class="flex flex-col p-4">
          <h4 class="text-gray-800 mb-1 dark:text-neutral-200">Average sales monthly</h4>
          <div class="flex gap-x-1">
            <span class="text-base font-normal text-gray-800 dark:text-neutral-200">RM</span>
            <p class="text-gray-800 font-semibold text-3xl dark:text-neutral-200">
              {{ $averageMonthlySales }}
            </p>
          </div>
        </div>
        <!-- End Card -->

        <!-- Annual sales -->
        <div class="flex flex-col p-4">
          <h4 class="text-gray-800 mb-1 dark:text-neutral-200">Annual Sales</h4>
          <div class="flex gap-x-1">
            <span class="text-base font-normal text-gray-800 dark:text-neutral-200">RM</span>
            <p class="text-gray-800 font-semibold text-3xl dark:text-neutral-200">
              {{ $annualSales }}
            </p>
          </div>
        </div>
        <!-- End Card -->
      </div>
      <!-- End Card Grid -->

      <div class="grid grid-cols-2 gap-x-4">
        <!-- Predicted Copies Chart -->
        <div
          class="flex flex-col  bg-white drop-shadow-lg shadow-sm rounded-xl dark:bg-neutral-800 dark:border-neutral-700">
          <div class="p-4 md:p-5">
            <div class="flex items-center gap-x-2">
              <p class="text-xs uppercase tracking-wide text-gray-500 dark:text-neutral-500">
                Predicted Copies Weekly: <span>{{ $totalPredictedCopies }}</span>
              </p>
            </div>
            <canvas id="predictionsChart"></canvas>
          </div>
        </div>
        <!-- End Card -->

        <!-- User Activity Chart -->
        <div
          class="flex flex-col bg-white drop-shadow-lg shadow-sm rounded-xl dark:bg-neutral-800 dark:border-neutral-700">
          <div class="p-4 md:p-5">
            <div class="flex items-center gap-x-2">
              <p class="text-xs uppercase tracking-wide text-gray-500 dark:text-neutral-500">
                User Activity by Hour
              </p>
            </div>
            <canvas id="userActivityChart"></canvas>
          </div>
        </div>
        <!-- End Card -->
      </div>
    </div>

    <!-- Modal for notifications -->
    <div id="hs-task-created-alert"
      class="hs-overlay hidden fixed inset-0 z-[100] justify-center items-center bg-gray-900 bg-opacity-50">
      <div class="relative flex flex-col bg-white shadow-lg rounded-xl dark:bg-neutral-900">
        <div class="absolute top-2 right-2">
          <button type="button"
            class="flex justify-center items-center size-7 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-transparent dark:hover:bg-neutral-700"
            data-hs-overlay="#hs-task-created-alert">
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
            class="mb-4 inline-flex justify-center items-center size-[46px] rounded-full border-4 border-gray-50 bg-gray-50 text-green-500 dark:bg-green-700 dark:border-green-600 dark:text-green-100">
            <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
              fill="red" viewBox="0 0 16 16">
              <path
                d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09z" />
            </svg>
          </span>
          <!-- End Icon -->
          <h3 class="mb-2 text-xl font-bold text-gray-800 dark:text-neutral-200">
            The number of printed copies has exceeded the predicted limit!
          </h3>
          <p class="text-gray-500 dark:text-neutral-500">
            You can see the predicted amount of copies in your sales dashboard.
          </p>
          <div class="mt-6 flex justify-center gap-x-4">
            <button type="button"
              class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-800 dark:text-white dark:hover:bg-neutral-800"
              data-hs-overlay="#hs-task-created-alert">
              OK
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>



  {{-- <script src="{{ $chart->cdn() }}"></script>

  {{ $chart->script() }} --}}

  {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
  {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@^2.0/dist/tailwind.min.css"> --}}

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const today = new Date().toISOString().split('T')[0];
      const lastShownDate = localStorage.getItem('lastShownDate');

      // Check if copies exceeded and show modal
      @if (session('copies_exceeded'))
        showModal();
      @endif

      function showModal() {
        const modal = document.getElementById('hs-task-created-alert');
        modal.classList.remove('hidden');
        modal.classList.add('flex');

        // Add event listener to close button
        // document.querySelector('[data-hs-overlay="#hs-task-created-alert"]').addEventListener('click', function() {
        //   modal.classList.add('hidden');
        //   modal.classList.remove('flex');
        // });
      }

      // Predicted Copies Chart
      var ctxPredictions = document.getElementById('predictionsChart').getContext('2d');
      var predictions = @json($predictions);

      var predictionLabels = Object.keys(predictions);
      var predictionData = Object.values(predictions);

      var predictionsChart = new Chart(ctxPredictions, {
        type: 'bar',
        data: {
          labels: predictionLabels,
          datasets: [{
            label: 'Predicted Copies',
            data: predictionData,
            backgroundColor: 'rgba(214, 188, 239)',
            borderColor: 'rgba(129, 41, 212)',
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });

      // User Activity Chart
      var ctxActivity = document.getElementById('userActivityChart').getContext('2d');
      var activities = @json($activities);

      var activityLabels = activities.map(item => item.hour);
      var activityData = activities.map(item => item.count);

      var userActivityChart = new Chart(ctxActivity, {
        type: 'line',
        data: {
          labels: activityLabels,
          datasets: [{
            label: 'User Activity by Hour',
            data: activityData,
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    });
  </script>

</x-app-layout>
