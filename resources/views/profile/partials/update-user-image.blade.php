<section>
  <header>
    <h2 class="text-lg font-medium text-gray-900">
      {{ __('Profile Image') }}
    </h2>

    <p class="mt-1 text-sm text-gray-600">
      {{ __('Update your profile image.') }}
    </p>
  </header>



  @if (auth()->user()->profile_image)
    <div class="mt-6">
      <img src="{{ asset('storage/' . auth()->user()->profile_image) }}" alt="Profile Image"
        class="w-32 h-32 rounded-full border-2 border-slate-600">
    </div>
  @endif

  <form method="post" action="{{ route('profile.image.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
    @csrf
    <div>
      <x-input-label for="image" :value="__('Image')" />
      <x-text-input id="image" name="image" type="file" class="mt-1 block w-1/2 border border-slate-400"
        required autofocus />
      <x-input-error class="mt-2" :messages="$errors->get('image')" />
    </div>

    <div class="flex items-center gap-4">
      <x-primary-button>{{ __('Upload') }}</x-primary-button>

      @if (session('status') === 'profile-image-updated')
        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">
          {{ __('Image Updated.') }}</p>
      @endif
    </div>
  </form>
</section>
