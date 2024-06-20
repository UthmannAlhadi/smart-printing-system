<x-app-layout>

  @if (auth()->user()->role == 'customer')
    <!-- Customer View -->
    <div class="w-full flex-grow flex flex-col items-center justify-center  space-y-8">
      <!-- Full height and center items without overflow -->

      <!-- Text Container -->
      <div class="flex flex-col items-center text-center">
        <h1 class="text-[5rem] text-gray-600 my-1">Homepage</h1>
        <h6 class="text-lg text-purple-800">Welcome to Ziegers Printing System</h6>
      </div>

      <!-- Buttons Container -->
      <div class="flex space-x-5 drop-shadow-lg">
        <!-- Print Job -->
        <div
          class="w-[250px] flex flex-col bg-white shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-700 dark:shadow-slate-700/[.7]">
          <div class="p-3 sm:p-4"> <!-- Adjusted padding -->
            <h3 class="text-base sm:text-lg font-bold text-gray-800 dark:text-white"> <!-- Adjusted text size -->
              Print Job
            </h3>
            <a class="mt-2 inline-flex items-center gap-x-1 text-sm font-semibold rounded-lg border border-transparent text-purple-600 hover:text-purple-800 disabled:opacity-50 disabled:pointer-events-none dark:purple-purple-500 dark:hover:text-purple-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
              href="{{ route('user.print-explain') }}">
              Create Job
              <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round">
                <path d="m9 18 6-6-6-6" />
              </svg>
            </a>
          </div>
        </div>

        <!-- Track Order-->
        <div
          class="w-[250px] flex flex-col bg-white shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-700 dark:shadow-slate-700/[.7]">
          <div class="p-3 sm:p-4"> <!-- Adjusted padding -->
            <h3 class="text-base sm:text-lg font-bold text-gray-800 dark:text-white"> <!-- Adjusted text size -->
              Track Order
            </h3>
            <a class="mt-2 inline-flex items-center gap-x-1 text-sm font-semibold rounded-lg border border-transparent text-purple-600 hover:text-purple-800 disabled:opacity-50 disabled:pointer-events-none dark:text-purple-500 dark:hover:text-purple-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
              href="{{ route('user.track-order') }}">
              Order Progress
              <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round">
                <path d="m9 18 6-6-6-6" />
              </svg>
            </a>
          </div>
        </div>

        <!-- Print History -->
        <div
          class="w-[250px] flex flex-col bg-white shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-700 dark:shadow-slate-700/[.7]">
          <div class="p-3 sm:p-4"> <!-- Adjusted padding -->
            <h3 class="text-base sm:text-lg font-bold text-gray-800 dark:text-white"> <!-- Adjusted text size -->
              Print History
            </h3>
            <a class="mt-2 inline-flex items-center gap-x-1 text-sm font-semibold rounded-lg border border-transparent text-purple-600 hover:text-purple-800 disabled:opacity-50 disabled:pointer-events-none dark:text-purple-500 dark:hover:text-purple-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
              href="{{ route('user.print-history') }}">
              View Order
              <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round">
                <path d="m9 18 6-6-6-6" />
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>
  @else
    @if (auth()->user()->role == 'admin')
      <!-- Admin View -->
      <!-- Content -->
      <div class="w-full">
        <div class="p-4 sm:p-6 space-y-2 sm:space-y-6 ">
          <!-- Grid -->
          <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">

            <!-- Card Total Users -->
            <div class="flex bg-white drop-shadow-lg shadow-sm rounded-xl dark:bg-neutral-800 dark:border-neutral-700">
              <div class="p-4 md:p-5 flex-1">
                <div class="flex items-center gap-x-2">
                  <p class="text-xs uppercase tracking-wide text-gray-500 dark:text-neutral-500">
                    Total users
                  </p>
                  <div class="hs-tooltip">
                    <div class="hs-tooltip-toggle">
                      <svg class="flex-shrink-0 size-4 text-gray-500 dark:text-neutral-500"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
                        <path d="M12 17h.01" />
                      </svg>
                      <span
                        class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-neutral-700"
                        role="tooltip">
                        The number of users
                      </span>
                    </div>
                  </div>
                </div>
                <div class="mt-1 flex items-center gap-x-1">
                  <h3 class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-neutral-200">
                    {{ $totalUsers }}
                  </h3>
                  <span class="flex items-center gap-x-1 text-green-600">
                    <svg class="inline-block size-4 self-center" xmlns="http://www.w3.org/2000/svg" width="24"
                      height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                      stroke-linecap="round" stroke-linejoin="round">
                      <polyline points="22 7 13.5 15.5 8.5 10.5 2 17" />
                      <polyline points="16 7 22 7 22 13" />
                    </svg>
                    <span class="inline-block text-sm">
                      <!-- You can add your percentage increase/decrease logic here if needed -->
                      1.7%
                    </span>
                  </span>
                </div>
              </div>
              <div class="flex items-center justify-center p-4">
                <div
                  class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 border rounded-md flex items-center justify-center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white"
                    class="bi bi-people-fill" viewBox="0 0 16 16">
                    <path
                      d="M9.5 15s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 7.5 14c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 7.5 10c-4 0-5 3-5 4s1 1 1 1zM7 9a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"
                      transform="scale(0.7) translate(3 3)" />
                  </svg>
                </div>
              </div>
            </div>
            <!-- End Card -->

            <!-- Card Total Orders -->
            <div class="flex bg-white drop-shadow-lg shadow-sm rounded-xl dark:bg-neutral-800 dark:border-neutral-700">
              <div class="p-4 md:p-5 flex-1">
                <div class="flex items-center gap-x-2">
                  <p class="text-xs uppercase tracking-wide text-gray-500 dark:text-neutral-500">
                    Total Orders
                  </p>
                </div>
                <div class="mt-1 flex items-center gap-x-1">
                  <h3 class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-neutral-200">
                    {{ $totalOrders }}
                  </h3>
                </div>
              </div>
              <div class="flex items-center justify-center p-4">
                <div
                  class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 border rounded-md flex items-center justify-center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white"
                    class="bi bi-people-fill" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                      d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0m-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z"
                      transform="scale(1.0) translate(3 3)" />
                  </svg>
                </div>
              </div>
            </div>
            <!-- End Card -->

            <!-- Card Daily Sales -->
            <div class="flex bg-white drop-shadow-lg shadow-sm rounded-xl dark:bg-neutral-800 dark:border-neutral-700">
              <div class="p-4 md:p-5 flex-1">
                <div class="flex items-center gap-x-2">
                  <p class="text-xs uppercase tracking-wide text-gray-500 dark:text-neutral-500">
                    Daily Sales
                  </p>
                </div>
                <div class="mt-1 flex items-center gap-x-1">
                  <h3 class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-neutral-200">
                    {{ $dailyIncome }}
                  </h3>
                </div>
              </div>
              <div class="flex items-center justify-center p-4">
                <div
                  class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 border rounded-md flex items-center justify-center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white"
                    class="bi bi-people-fill" viewBox="0 0 60 60">
                    <g transform="scale(0.7) translate(3 3)" data-name="Coin Dollar">
                      <path
                        d="M38 70c-.44 0-.88-.01-1.31-.03a23.999 23.999 0 0 0 33.28-33.28c.02.43.03.87.03 1.31a32.036 32.036 0 0 1-32 32z"
                        style="fill:#FFFFFF" />
                      <path
                        d="M67.52 25.64a32.237 32.237 0 0 1 2.08 7.28A25.994 25.994 0 0 1 32.93 69.6a31.954 31.954 0 0 1-7.29-2.08 30.005 30.005 0 1 0 41.88-41.88z"
                        style="fill:#FFFFFF" />
                      <path
                        d="M68 38a30 30 0 1 0-30 30 30.037 30.037 0 0 0 30-30zm-56 0a26 26 0 1 1 26 26 26.025 26.025 0 0 1-26-26z"
                        style="fill:#FFFFFF" />
                      <path
                        d="M33 32.87a3.858 3.858 0 0 0 3.24 3.82l.76.13V29h-.13A3.88 3.88 0 0 0 33 32.87zM43 43.13a3.858 3.858 0 0 0-3.24-3.82l-.76-.13V47h.13A3.88 3.88 0 0 0 43 43.13z"
                        style="fill:#FFFFFF" />
                      <path
                        d="M62 38a24 24 0 1 0-24 24 24.032 24.032 0 0 0 24-24zM37 51v-2h-.13A5.872 5.872 0 0 1 31 43.13V43a1 1 0 0 1 2 0v.13A3.88 3.88 0 0 0 36.87 47H37v-8.15l-1.09-.18A5.875 5.875 0 0 1 36.87 27H37v-2a1 1 0 0 1 2 0v2h.13A5.872 5.872 0 0 1 45 32.87V33a1 1 0 0 1-2 0v-.13A3.88 3.88 0 0 0 39.13 29H39v8.15l1.09.18A5.875 5.875 0 0 1 39.13 49H39v2a1 1 0 0 1-2 0z"
                        style="fill:#FFFFFF" />
                    </g>
                  </svg>
                </div>
              </div>
            </div>
            <!-- End Card -->

            <!-- Card Total Income -->
            <div class="flex bg-white drop-shadow-lg shadow-sm rounded-xl dark:bg-neutral-800 dark:border-neutral-700">
              <div class="p-4 md:p-5 flex-1">
                <div class="flex items-center gap-x-2">
                  <p class="text-xs uppercase tracking-wide text-gray-500 dark:text-neutral-500">
                    Total Income
                  </p>
                </div>
                <div class="mt-1 flex items-center gap-x-1">
                  <h3 class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-neutral-200">
                    {{ number_format($totalIncome, 2) }}
                  </h3>
                </div>
              </div>
              <div class="flex items-center justify-center p-4">
                <div
                  class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 border rounded-md flex items-center justify-center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white"
                    class="bi bi-people-fill" viewBox="0 0 300 300" xml:space="preserve">
                    <path fill="#FFFFFF"
                      d="M20.877 139.24h258.245v16.14H20.877zM20.877 262.982h258.245v16.14H20.877z" />
                    <path fill="#FFFFFF"
                      d="M123.1 155.38v9.494c0 6.641 3.431 12.027 10.072 12.027h31.702c6.641 0 12.027-5.385 12.027-12.027v-9.494H123.1zM37.018 155.38v9.494c0 6.641 3.431 12.027 10.072 12.027h31.702c6.641 0 12.027-5.385 12.027-12.027v-9.494H37.018zM209.181 155.38v9.494c0 6.641 3.431 12.027 10.072 12.027h31.702c6.641 0 12.027-5.385 12.027-12.027v-9.494h-53.801zM176.9 262.982v-9.494c0-6.641-3.431-12.027-10.072-12.027h-31.702c-6.641 0-12.027 5.385-12.027 12.027v9.494H176.9zM262.982 262.982v-9.494c0-6.641-3.431-12.027-10.072-12.027h-31.702c-6.641 0-12.027 5.385-12.027 12.027v9.494h53.801zM90.819 262.982v-9.494c0-6.641-3.431-12.027-10.072-12.027H49.044c-6.641 0-12.027 5.385-12.027 12.027v9.494h53.802z" />
                    <path fill="#FFFFFF"
                      d="M47.778 164.874v-9.494h-10.76v9.494c0 6.641 3.431 12.027 10.072 12.027h10.76c-6.641 0-10.072-5.386-10.072-12.027zM59.805 241.462h-10.76c-6.641 0-12.027 5.385-12.027 12.027v9.494h10.76v-9.494c0-6.642 5.385-12.027 12.027-12.027zM133.86 164.874v-9.494H123.1v9.494c0 6.641 3.431 12.027 10.072 12.027h10.76c-6.642 0-10.072-5.386-10.072-12.027zM145.886 241.462h-10.76c-6.641 0-12.027 5.385-12.027 12.027v9.494h10.76v-9.494c.001-6.642 5.386-12.027 12.027-12.027zM219.941 164.874v-9.494h-10.76v9.494c0 6.641 3.431 12.027 10.072 12.027h10.76c-6.641 0-10.072-5.386-10.072-12.027zM231.968 241.462h-10.76c-6.641 0-12.027 5.385-12.027 12.027v9.494h10.76v-9.494c0-6.642 5.386-12.027 12.027-12.027z" />
                    <path fill="#FFFFFF"
                      d="M53.158 176.901h21.521v64.561H53.158zM139.24 176.901h21.52v64.561h-21.52zM225.322 176.901h21.52v64.561h-21.52z" />
                    <path fill="#FFFFFF"
                      d="M120.562 101.579h58.877c9.956-8.391 16.293-20.932 16.293-34.971 0-25.256-20.475-45.731-45.731-45.731S104.27 41.352 104.27 66.608c-.001 14.039 6.335 26.58 16.292 34.971z" />
                    <path fill="#FFFFFF"
                      d="M120.409 66.608c0-22.497 16.261-41.16 37.661-44.974-2.622-.473-5.312-.757-8.07-.757-25.256 0-45.731 20.475-45.731 45.731 0 14.039 6.336 26.58 16.292 34.971h16.14c-9.956-8.391-16.292-20.932-16.292-34.971z" />
                    <path fill="#FFFFFF"
                      d="M195.531 62.61c.11 1.324.2 2.648.2 3.998 0 14.039-6.336 26.58-16.293 34.971h-58.877c-9.956-8.391-16.292-20.932-16.292-34.971 0-1.35.089-2.674.199-3.998l-83.591 76.63h258.245l-83.591-76.63z" />
                    <path fill="#FFFFFF"
                      d="M104.269 66.608c0-1.35.089-2.674.199-3.998l-83.591 76.63h16.14l68.355-62.665a45.835 45.835 0 0 1-1.103-9.967z" />
                    <path fill="#FFFFFF"
                      d="M165.053 70.155c-.978-1.718-2.181-3.053-3.62-4.04-1.44-.967-3.568-2.06-6.378-3.247-3.846-1.545-5.759-3.384-5.759-5.496 0-1.072.368-1.997 1.104-2.779.746-.756 1.629-1.156 2.653-1.156 1.334 0 3.526.898 6.552 2.69l4.35-6.835c-1.86-2.69-5.653-4.035-8.575-4.13v-3.074c0-1.592-1.881-2.884-5.38-2.884-3.499 0-5.38 1.292-5.38 2.884v3.536s-1.245.599-3.426 2.863c-2.391 2.475-2.606 6.647-2.606 9.515 0 5.737 4.902 8.212 6.037 9.074 1.129.862 3.042 1.865 5.296 2.842 4.629 1.981 6.798 3.547 6.798 5.79 0 1.082-.483 2.122-1.507 3.11-1.025.993-2.081 1.409-3.189 1.492-3.137.221-5.711-1.986-9.316-4.639l-5.348 6.788c3.305 3.904 7.261 5.674 7.261 5.753v2.89c0 1.597 2.327 2.885 5.38 2.885 2.869 0 5.38-1.287 5.38-2.885v-2.89c0-.031 3.846-.536 6.562-2.719 2.632-2.063 3.953-5.212 3.953-8.897-.001-4.827-2.055-8.525-6.228-11.647z" />
                    <path fill="#FFFFFF"
                      d="M150 106.543c-7.006 0-12.702-5.696-12.702-12.702 0-7.006 5.696-12.702 12.702-12.702 7.006 0 12.702 5.696 12.702 12.702 0 7.006-5.696 12.702-12.702 12.702zm0-17.822c-2.824 0-5.12 2.296-5.12 5.12s2.296 5.12 5.12 5.12 5.12-2.296 5.12-5.12-2.296-5.12-5.12-5.12z" />
                  </svg>

                </div>
              </div>
            </div>
            <!-- End Card -->

          </div>
          <!-- End Grid -->

          <!-- Card -->
          <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
              <div class="p-1.5 min-w-full inline-block align-middle">
                <div
                  class="bg-white drop-shadow-lg rounded-xl shadow-sm overflow-hidden dark:bg-neutral-800 dark:border-neutral-700">
                  <!-- Header -->
                  <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center dark:border-neutral-700">
                    <div>
                      <h2 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">
                        Users
                      </h2>
                      <p class="text-sm text-gray-600 dark:text-neutral-400">
                        View users, edit and more.
                      </p>
                    </div>
                  </div>
                  <!-- End Header -->

                  <!-- Table Container -->
                  <div class="overflow-x-auto w-full">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                      <thead class="bg-white border-b border-b-purple-400 dark:bg-neutral-800">
                        <tr>
                          <th scope="col" class="px-6 py-3 text-left">
                            <label for="hs-at-with-checkboxes-main" class="flex">
                              <input type="checkbox"
                                class="shrink-0 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                id="hs-at-with-checkboxes-main">
                              <span class="sr-only">Checkbox</span>
                            </label>
                          </th>
                          <th scope="col" class="px-6 py-3 text-left">
                            <div class="flex items-center gap-x-2">
                              <span
                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                Name
                              </span>
                            </div>
                          </th>
                          <th scope="col" class="px-6 py-3 text-left">
                            <div class="flex items-center gap-x-2">
                              <span
                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                Role
                              </span>
                            </div>
                          </th>
                          <th scope="col" class="px-6 py-3 text-left">
                            <div class="flex items-center gap-x-2">
                              <span
                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                Status
                              </span>
                            </div>
                          </th>
                          <th scope="col" class="px-6 py-3 text-left">
                            <div class="flex items-center gap-x-2">
                              <span
                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                Order
                              </span>
                            </div>
                          </th>
                          <th scope="col" class="px-6 py-3 text-left">
                            <div class="flex items-center gap-x-2">
                              <span
                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                Created
                              </span>
                            </div>
                          </th>
                        </tr>
                      </thead>
                      <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                        @foreach ($users as $user)
                          <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                              <label for="hs-at-with-checkboxes-{{ $user->id }}" class="flex">
                                <input type="checkbox"
                                  class="shrink-0 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                  id="hs-at-with-checkboxes-{{ $user->id }}">
                                <span class="sr-only">Checkbox</span>
                              </label>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                              <div class="flex items-center gap-x-3">
                                <div class="grow">
                                  <span
                                    class="block text-xs font-semibold text-gray-800 dark:text-neutral-200">{{ $user->name }}</span>
                                  <span
                                    class="block text-xs text-gray-500 dark:text-neutral-500">{{ $user->email }}</span>
                                </div>
                              </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                              <span
                                class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">{{ $user->role }}</span>
                              <span
                                class="block text-sm text-gray-500 dark:text-neutral-500">{{ $user->department }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                              @php
                                $statusClasses =
                                    $user->status == 'online'
                                        ? 'bg-green-300 text-green-900 dark:bg-green-500/10 dark:text-green-500'
                                        : 'bg-red-300 text-red-900 dark:bg-gray-500/10 dark:text-gray-500';
                              @endphp
                              <span
                                class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium rounded-full {{ $statusClasses }}">
                                @if ($user->status == 'online')
                                  <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 16 16">
                                    <path
                                      d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                  </svg>
                                  Online
                                @else
                                  <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 22"
                                    class="w-4 h-4">
                                    <path fill-rule="evenodd"
                                      d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z"
                                      clip-rule="evenodd" />
                                  </svg>
                                  Offline
                                @endif
                              </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                              <span
                                class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">{{ $user->trainings()->distinct('order_id')->count('order_id') }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                              <span
                                class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">{{ $user->created_at }}</span>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>


                  <!-- Footer -->
                  <div
                    class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200 dark:border-neutral-700">
                    <div>
                      <p class="text-sm text-gray-600 dark:text-neutral-400">
                        <span class="font-semibold text-gray-800 dark:text-neutral-200">{{ $totalUsers }}</span>
                        results
                      </p>
                    </div>

                    <div>
                      <div class="inline-flex gap-x-2">
                        <button type="button"
                          class="py-1.5 px-2 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800">
                          <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m15 18-6-6 6-6" />
                          </svg>
                          Prev
                        </button>

                        <button type="button"
                          class="py-1.5 px-2 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800">
                          Next
                          <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6" />
                          </svg>
                        </button>
                      </div>
                    </div>
                  </div>
                  <!-- End Footer -->
                </div>
              </div>
            </div>
          </div>
          <!-- End Card -->
        </div>




      </div>
      </div>
    @endif
  @endif








</x-app-layout>
