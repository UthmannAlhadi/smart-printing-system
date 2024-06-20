<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Profile') }}
    </h2>
  </x-slot>

  <div class="mb-2">
    <div class="grid grid-cols-2 gap-2 max-w-full ">
      <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <div class="max-w-xl">
          @include('profile.partials.update-user-image')
        </div>
      </div>
      <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <div class="max-w-xl">
          @include('profile.partials.update-profile-information-form')
        </div>
      </div>
    </div>

    <div class="grid grid-cols-2 gap-2 max-w-full">
      <div class="my-2 col-span-1 p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <div class="w-full">
          @include('profile.partials.update-password-form')
        </div>
      </div>
      <div class="my-2 col-span-1 p-4 sm:p-8 bg-white shadow sm:rounded-lg self-start">
        <div class="w-full">
          @include('profile.partials.delete-user-form')
        </div>
      </div>
    </div>
  </div>






</x-app-layout>
