<x-guest-layout>
  <form method="POST" action="{{ route('guest.login') }}">
    @csrf
    <div
      class="flex w-full max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800 lg:max-w-4xl">
      <div class="w-full px-6 py-8 md:px-8 lg:w-1/2">
        <p class="mt-3 text-xl text-center text-gray-600 dark:text-gray-200">
          Login as guest
        </p>

        <!-- Form -->
        <div class="mt-2">
          <x-input-label for="name" :value="__('Name')" class="block text-sm font-medium dark:text-white">
            <span class="sr-only">Name</span>
          </x-input-label>
          <x-text-input id="name"
            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
            type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Name" />
          <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Button -->
        <div class="mt-6 flex justify-evenly items-center">
          <x-primary-button class="ms-4">
            {{ __('Login') }}
          </x-primary-button>
        </div>
        <!-- End Form -->
      </div>
    </div>
  </form>
</x-guest-layout>
