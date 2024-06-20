<x-app-layout>

  <!-- Chevrons Breadcrumbs -->
  <div class="flex flex-col w-full mt-8">
    <ol class="flex justify-center whitespace-nowrap mb-2 w-1/2 px-8" aria-label="Breadcrumb">
      <li class="inline-flex items-center">
        <a
          class="flex items-center text-sm text-gray-300 hover:text-purple-600 focus:outline-none focus:text-purple-600 dark:focus:text-purple-500">
          Dashboard
        </a>
        <svg class="flex-shrink-0 mx-2 overflow-visible size-4 text-gray-400 dark:text-neutral-600"
          xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="m9 18 6-6-6-6" />
        </svg>
      </li>
      <li class="inline-flex items-center">
        <a
          class="flex items-center text-sm text-gray-300 hover:text-purple-600 focus:outline-none focus:text-purple-600 dark:focus:text-purple-500">
          Print Explain
          <svg class="flex-shrink-0 mx-2 overflow-visible size-4 text-gray-400 dark:text-neutral-600"
            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="m9 18 6-6-6-6" />
          </svg>
        </a>
      </li>
      <li class="inline-flex items-center">
        <a
          class="flex items-center text-sm text-gray-300 hover:text-purple-600 focus:outline-none focus:text-purple-600 dark:focus:text-purple-500">
          Create Print Job
          <svg class="flex-shrink-0 mx-2 overflow-visible size-4 text-gray-400 dark:text-neutral-600"
            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="m9 18 6-6-6-6" />
          </svg>
        </a>
      </li>
      <li class="inline-flex items-center">
        <a
          class="flex items-center text-sm text-gray-900 hover:text-purple-600 focus:outline-none focus:text-purple-600 dark:focus:text-purple-500">
          Set Print Preference
          <svg class="flex-shrink-0 mx-2 overflow-visible size-4 text-gray-400 dark:text-neutral-600"
            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="m9 18 6-6-6-6" />
          </svg>
        </a>
      </li>
      <li class="inline-flex items-center">
        <a
          class="flex items-center text-sm text-gray-300 hover:text-purple-600 focus:outline-none focus:text-purple-600 dark:focus:text-purple-500">
          Preview
        </a>
      </li>
    </ol>
    <!-- Chevrons Breadcrumbs End -->
  </div>


  <!-- Display File -->
  <div class="container mx-auto py-4 px-2 grid grid-cols-1 sm:grid-cols-3 gap-4 h-full drop-shadow-lg"
    style="width: 1200px; height: 600px; overflow: hidden;">
    <!-- Content Left Side -->
    <div class="sm:col-span-2 h-full overflow-y-auto custom-scrollbar">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl h-full">
        <div class="bg-gray-50 rounded shadow p-4 h-full">
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
                    <table class="min-w-full text-left text-sm font-light h-full">
                      <thead class="border-b border-gray-400 font-medium dark:border-neutral-500">
                        <tr>
                          <th scope="col" class="px-6 py-4">File</th>
                        </tr>
                      </thead>
                      <tbody class="h-full">
                        @if ($trainings->isEmpty())
                          <p>No trainings available.</p>
                        @else
                          @foreach ($trainings as $training)
                            <!-- Display training details -->
                            <tr
                              class="flex border-b transition duration-300 ease-in-out justify-center hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                              <td class="whitespace-nowrap px-6 py-4">
                                <img src="{{ asset('images/trainings/' . $training->photo) }}" alt=""
                                  class="training-image"
                                  data-original-src="{{ asset('images/trainings/' . $training->photo) }}">
                              </td>
                            </tr>
                          @endforeach
                        @endif
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Content Right Side -->
    <div class="h-full">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl">
        <div class="bg-white rounded shadow p-5">
          <div class="p-2 h-full">
            @if (Session::has('message'))
              <div class="bg-green-500 text-white px-4 py-2 rounded">
                {{ Session::get('message') }}
              </div>
            @endif
            <div class="flex flex-col">
              <div class="sm:-mx-6 lg:-mx-8 w-full h-full">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8 h-full">
                  <div class="overflow-hidden h-full">
                    <form id="preferenceForm" action="{{ route('user.print-preview') }}" method="POST">
                      @csrf
                      <table class="min-w-full text-left text-sm font-light h-full">
                        <thead class="border-b border-gray-400 font-medium dark:border-neutral-500">
                          <tr>
                            <th scope="col" class="px-6 py-8">Set Preference</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Printing Color</td>
                            <td>
                              <div class="grid w-full place-items-center">
                                <div class="grid w-52 grid-cols-2 gap-2 rounded-xl bg-gray-50 p-2">
                                  <div>
                                    <input type="radio" name="printing_color_option" id="printing_color_option_black"
                                      value="1" class="peer hidden" />
                                    <label for="printing_color_option_black"
                                      class="block text-xs cursor-pointer select-none rounded-xl p-2 text-center peer-checked:bg-blue-500 peer-checked:font-bold peer-checked:text-white">Black
                                      & White</label>
                                  </div>
                                  <div>
                                    <input type="radio" name="printing_color_option"
                                      id="printing_color_option_color" value="2" class="peer hidden" />
                                    <label for="printing_color_option_color"
                                      class="block text-xs cursor-pointer select-none rounded-xl p-2 text-center peer-checked:bg-blue-500 peer-checked:font-bold peer-checked:text-white">Color</label>
                                  </div>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>Layout</td>
                            <td>
                              <div class="grid w-full place-items-center">
                                <div class="grid w-52 grid-cols-2 gap-2 rounded-xl bg-gray-50 p-2">
                                  <div>
                                    <input type="radio" name="layout_option" id="layout_option_portrait"
                                      value="portrait" class="peer hidden" />
                                    <label for="layout_option_portrait"
                                      class="block text-xs cursor-pointer select-none rounded-xl p-2 text-center peer-checked:bg-blue-500 peer-checked:font-bold peer-checked:text-white">Portrait</label>
                                  </div>
                                  <div>
                                    <input type="radio" name="layout_option" id="layout_option_landscape"
                                      value="landscape" class="peer hidden" />
                                    <label for="layout_option_landscape"
                                      class="block text-xs cursor-pointer select-none rounded-xl p-2 text-center peer-checked:bg-blue-500 peer-checked:font-bold peer-checked:text-white">Landscape</label>
                                  </div>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>Copies</td>
                            <td>
                              <input type="number" name="copies" id="copies" value="1" min="1"
                                max="100"
                                class="border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md">
                            </td>
                          </tr>
                          <!-- Other preferences here -->
                        </tbody>
                      </table>
                      <div class="flex justify-center px-6 py-4">
                        <button type="submit"
                          class="py-2 px-4 inline-flex my-5 items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-100 text-blue-800 hover:bg-blue-200">Apply
                          Preferences</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Success Modal -->
  <div id="successModal" class="fixed inset-0 flex items-center justify-center z-[80] hidden">
    <div class="fixed inset-0 bg-gray-600 bg-opacity-50"></div> <!-- Overlay -->
    <div
      class="relative bg-teal-50 border border-teal-200 text-sm text-teal-800 rounded-lg p-4 w-1/3 mx-auto dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500 z-60">
      <div class="flex">
        <div class="flex-shrink-0">
          <svg class="flex-shrink-0 size-4 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round">
            <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path>
            <path d="m9 12 2 2 4-4"></path>
          </svg>
        </div>
        <div class="ms-2">
          <div class="text-sm font-medium">
            Preferences saved successfully.
          </div>
        </div>
        <div class="ps-3 ms-auto">
          <div class="-mx-1.5 -my-1.5">
            <button type="button"
              class="inline-flex bg-teal-50 rounded-lg p-1.5 text-teal-500 hover:bg-teal-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-teal-50 focus:ring-teal-600 dark:bg-transparent dark:hover:bg-teal-800/50 dark:text-teal-600"
              onclick="document.getElementById('successModal').classList.add('hidden')">
              <span class="sr-only">Dismiss</span>
              <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round">
                <path d="M18 6 6 18"></path>
                <path d="m6 6 12 12"></path>
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>





  <!-- Add JavaScript to handle the display change -->
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const images = document.querySelectorAll('.training-image');

      images.forEach(image => {
        // Set initial display size to match portrait layout
        image.style.width = '550px'; // Portrait width
        image.style.height = '450px'; // Portrait height
        image.style.maxWidth = '450px'; // Max width for portrait layout
        image.style.maxHeight = '800px'; // Max height for portrait layout
      });
    });

    document.getElementById('preferenceForm').addEventListener('submit', function(event) {
      event.preventDefault();

      const selectedColorOption = document.querySelector('input[name="printing_color_option"]:checked').value;
      const selectedLayoutOption = document.querySelector('input[name="layout_option"]:checked').value;
      const copies = parseInt(document.getElementById('copies').value);
      const images = document.querySelectorAll('.training-image');

      images.forEach(image => {
        // Apply color preference
        if (selectedColorOption == '1') {
          image.style.filter = 'grayscale(100%)';
        } else {
          image.style.filter = 'none';
        }

        // Apply layout preference
        if (selectedLayoutOption == 'landscape') {
          image.style.width = '610px'; // Landscape width
          image.style.height = '450px'; // Landscape height
          image.style.maxWidth = '800px'; // Max width for landscape layout
          image.style.maxHeight = '450px'; // Max height for landscape layout
        } else {
          image.style.width = '450px'; // Portrait width
          image.style.height = '500px'; // Portrait height
          image.style.maxWidth = '450px'; // Max width for portrait layout
          image.style.maxHeight = '800px'; // Max height for portrait layout
        }
      });

      // Update the hidden input field with the number of copies
      document.getElementById('copies').value = copies;
      if (copies > 100) {
        alert('The number of copies cannot exceed 100.');
        return;
      }

      fetch('{{ route('user.update-preferences') }}', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          },
          body: JSON.stringify({
            printing_color_option: selectedColorOption,
            layout_option: selectedLayoutOption,
            copies: copies
          })
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            document.getElementById('successModal').classList.remove('hidden');
          }
        })
        .catch(error => {
          console.error('Error:', error);
        });

      // Optionally, you can add code here to submit the form asynchronously using AJAX if needed
    });
  </script>

  <div class="flex justify-center px-6 py-4">
    <form method="post" action="{{ route('user.delete-training') }}">
      @csrf
      <button type="submit"
        class="py-2 px-4 inline-flex my-5 items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-100 text-blue-800 hover:bg-blue-200">Cancel</button>
    </form>
    <a class="flex justify-center mx-4" href="#" onclick="document.getElementById('preferenceForm').submit();">
      <button type="button"
        class="py-2 px-4 inline-flex my-5 items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-100 text-blue-800 hover:bg-blue-200">Next</button>
    </a>
  </div>

</x-app-layout>
