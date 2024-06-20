<header
  class="sticky top-0 inset-x-0 flex flex-wrap sm:justify-start sm:flex-nowrap z-[48] w-full bg-gray-50 text-sm py-2.5 sm:py-3 lg:ps-64 dark:bg-gray-800 dark:border-gray-700 border-gray-300">
  <div class="w-full flex items-center justify-between sm:gap-x-3 sm:order-3">
    <div class="w-full flex flex-row items-center justify-center">
    </div>

    <div class="flex flex-row items-center justify-end ml-auto px-6"> <!-- Added ml-auto to push it to the right -->

      <!-- Notification Button -->
      <button type="button"
        class="w-[2.375rem] h-[2.375rem] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700">
        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
          viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
          stroke-linejoin="round">
          <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9" />
          <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0" />
        </svg>
      </button>

      <!-- Dark Mode Button -->
      <button type="button"
        class="hs-dark-mode hs-dark-mode-active:hidden inline-flex items-center mx-2 gap-x-2 py-2 px-3 bg-white/10 rounded-full text-sm text-black hover:bg-white/20"
        data-hs-theme-click-value="dark">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
          class="flex-shrink-0 size-4">
          <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z" />
        </svg>
      </button>

      <!-- Light Mode -->
      <button type="button"
        class="hs-dark-mode hs-dark-mode-active:inline-flex hidden items-center mx-2 gap-x-2 py-2 px-3  rounded-full text-sm text-white hover:bg-white/20"
        data-hs-theme-click-value="light">
        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
          viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
          stroke-linejoin="round">
          <circle cx="12" cy="12" r="4"></circle>
          <path d="M12 2v2"></path>
          <path d="M12 20v2"></path>
          <path d="m4.93 4.93 1.41 1.41"></path>
          <path d="m17.66 17.66 1.41 1.41"></path>
          <path d="M2 12h2"></path>
          <path d="M20 12h2"></path>
          <path d="m6.34 17.66-1.41 1.41"></path>
          <path d="m19.07 4.93-1.41 1.41"></path>
        </svg>
      </button>

      <!-- Profile -->
      <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
        <button id="hs-dropdown-with-header" type="button"
          class="w-[2.375rem] h-[2.375rem] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full  text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
          @if (auth()->user()->profile_image) style="background-image: url('{{ asset('storage/' . auth()->user()->profile_image) }}'); background-size: cover;" @endif>
          @if (!auth()->user()->profile_image)
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
              <path fill-rule="evenodd"
                d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"
                clip-rule="evenodd" />
            </svg>
          @endif
        </button>
        <div
          class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg p-2 dark:bg-gray-800 dark:border dark:border-gray-700"
          aria-labelledby="hs-dropdown-with-header">
          <div class="py-3 px-5 -m-2 bg-gray-100 rounded-t-lg dark:bg-gray-700">
            <p class="text-sm text-gray-500 dark:text-gray-400">Signed in as</p>
            <p class="text-sm font-medium text-gray-800 dark:text-gray-300">{{ Auth::user()->name }}</p>
          </div>
          <div class="mt-2 py-2 first:pt-0 last:pb-0">
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round">
                  <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                  <circle cx="9" cy="7" r="4" />
                  <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                  <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                </svg>
                Log Out
              </a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
