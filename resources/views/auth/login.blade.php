<x-guest-layout>
  <!-- Session Status -->
  <x-auth-session-status class="mb-4" :status="session('status')" />

  <form method="POST" action="{{ route('login') }}">
    @csrf

    <div
      class="flex w-full max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800 lg:max-w-4xl">
      <!-- display left image -->
      <div class="hidden bg-cover lg:block lg:w-1/2"
        style="background-image: url('https://images.unsplash.com/photo-1470790376778-a9fbc86d70e2?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjB8fHByaW50aW5nfGVufDB8fDB8fHww');">
      </div>

      <div class="w-full px-6 py-8 md:px-8 lg:w-1/2">
        <!-- display right logo -->
        <div class="flex justify-center mx-auto">
          <svg version="1.1" id="Layer_1" class="w-auto h-9 sm:h-10" xmlns="http://www.w3.org/2000/svg" x="0" y="0"
            viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve">
            <style>
              .st0 {
                fill: #6770e6
              }

              .st1 {
                fill: #5861c7
              }

              .st6 {
                fill: #69ebfc
              }

              .st16 {
                fill: #fff7f2
              }
            </style>
            <path
              d="M108.201-.256c-15.734 0-28.482 12.748-28.482 28.482v49.912l56.964.001V28.226c0-15.735-12.757-28.482-28.482-28.482z"
              style="fill:#5fd4e3" />
            <path class="st0"
              d="M425.205 105H86.795C38.86 105 0 143.86 0 191.795v65.203C0 273.015 12.985 286 29.002 286h453.996C499.015 286 512 273.015 512 256.998v-65.203C512 143.86 473.14 105 425.205 105z" />
            <path class="st1" d="M25 286h48v199H25z" />
            <path class="st0"
              d="M80.705 512h-63.41A7.295 7.295 0 0 1 10 504.705v-12.411a7.295 7.295 0 0 1 7.295-7.295h63.411a7.295 7.295 0 0 1 7.295 7.295v12.411A7.296 7.296 0 0 1 80.705 512z" />
            <path class="st1" d="M439 286h48v199h-48z" />
            <path class="st0"
              d="M494.705 512h-63.411a7.295 7.295 0 0 1-7.295-7.295v-12.411a7.295 7.295 0 0 1 7.295-7.295h63.411a7.295 7.295 0 0 1 7.295 7.295v12.411a7.295 7.295 0 0 1-7.295 7.295z" />
            <path d="M0 216v40.998C0 273.015 12.985 286 29.002 286h453.996C499.016 286 512 273.015 512 256.998V216H0z"
              style="fill:#d476e2" />
            <path style="fill:#b665c2" d="M95 216h322v70H95z" />
            <path d="M378.5 261h-245c-5.523 0-10-4.477-10-10s4.477-10 10-10h245c5.523 0 10 4.477 10 10s-4.477 10-10 10z"
              style="fill:#339" />
            <circle class="st6" cx="69.5" cy="181.5" r="13.5" />
            <path class="st6" d="M150.5 187h-50a5.5 5.5 0 1 1 0-11h50a5.5 5.5 0 1 1 0 11z" />
            <path class="st1"
              d="M417 105V43.899A8.899 8.899 0 0 0 408.101 35H103.899A8.899 8.899 0 0 0 95 43.899V105h322z" />
            <path id="XMLID_499_" class="st6"
              d="M350.591-.256H108.198c15.732 0 28.482 12.751 28.482 28.482V105h242.393V28.226c0-15.732-12.76-28.482-28.482-28.482z" />
            <path
              d="M350.591-.256H108.198c11.613 0 21.595 6.952 26.029 16.918h216.364c15.722 0 28.482 12.751 28.482 28.482V28.226c0-15.732-12.76-28.482-28.482-28.482z"
              style="fill:#a1f1fc" />
            <path class="st6"
              d="M136.701 248.628V484.33c0 15.421 12.503 27.924 27.924 27.924h214.453V248.628H136.701z" />
            <path id="XMLID_500_"
              d="m351.148 454.756-158.6.001v29.573c0 15.421-12.494 27.924-27.924 27.924h214.347l.102.002c15.424 0 27.926-12.502 27.926-27.926v-29.575h-55.851z"
              style="fill:#5ed4e3" />
            <path
              d="m379.074 495.338-.102-.002H190.293c-4.27 9.949-14.15 16.918-25.669 16.918h214.347l.102.003c15.424 0 27.926-12.502 27.926-27.926v-16.918c.001 15.423-12.501 27.925-27.925 27.925z"
              style="fill:#56c1cf" />
            <path class="st16"
              d="M256.168 296.561h-86.756a7.5 7.5 0 0 1-7.501-7.501 7.5 7.5 0 0 1 7.501-7.501h86.756a7.5 7.5 0 0 1 7.501 7.501 7.5 7.5 0 0 1-7.501 7.501zM341.168 296.561h-56.756a7.5 7.5 0 0 1-7.501-7.501 7.5 7.5 0 0 1 7.501-7.501h56.756a7.5 7.5 0 0 1 7.501 7.501 7.5 7.5 0 0 1-7.501 7.501zM316.168 340.095H169.412a7.5 7.5 0 0 1-7.501-7.501 7.5 7.5 0 0 1 7.501-7.501h146.756a7.5 7.5 0 0 1 7.501 7.501 7.5 7.5 0 0 1-7.501 7.501zM346.168 388.095H169.412a7.5 7.5 0 0 1-7.501-7.501 7.5 7.5 0 0 1 7.501-7.501h176.756a7.5 7.5 0 0 1 7.501 7.501 7.5 7.5 0 0 1-7.501 7.501z" />
          </svg>
        </div>

        <p class="mt-3 text-xl text-center text-gray-600 dark:text-gray-200">
          Welcome back!
        </p>

        <!-- Form -->
        <form>
          <!-- Email Label -->
          <div class="mt-2">
            <x-input-label for="email" :value="__('Email')" class="block text-sm font-medium dark:text-white"><span
                class="sr-only">Email
                address</span></x-input-label>
            <x-text-input id="email"
              class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
              placeholder="Email address" type="email" name="email" :value="old('email')" required
              autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
          </div>
          <!-- Password Label -->
          <div class="mt-2">
            <x-input-label for="password" :value="__('Password')" class="block text-sm font-medium dark:text-white"><span
                class="sr-only">Password</span></x-input-label>
            <x-text-input id="password"
              class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
              placeholder="Password" type="password" name="password" required autocomplete="new-password"
              style="width: 100%;" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
          </div>

          <!-- Remember Me -->
          <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
              <input id="remember_me" type="checkbox"
                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
              <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
          </div>

          <!-- Register? -->
          <div class="flex items-center justify-end mt-4">
            @if (Route::has('register'))
              <a class="underline text-sm mx-4 text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('register') }}">
                {{ __('Register?') }}
              </a>
            @endif

            <!-- Forgot Password -->
            @if (Route::has('password.request'))
              <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
              </a>
            @endif

            <x-primary-button class="ms-3">
              {{ __('Log in') }}
            </x-primary-button>
          </div>
        </form>
        <!-- End Form -->
      </div>
    </div>

  </form>
</x-guest-layout>
