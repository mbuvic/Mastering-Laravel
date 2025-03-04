<x-layout>
    <x-slot:title>Laracast - Create Job</x-slot:title>
    <x-slot:heading>Create Job</x-slot:heading>

    <form method="POST" action="/jobs">
      @csrf
        <div class="space-y-12">
          <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base/7 font-semibold text-gray-900">Create A New Job</h2>
            <p class="mt-1 text-sm/6 text-gray-600">This information will be displayed publicly so be careful what you share.</p>
      
          <div>      
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
      
              <div class="sm:col-span-6">
                <label for="last-name" class="block text-sm/6 font-medium text-gray-900">Title</label>
                <div class="mt-2">
                  <input type="text" name="title" id="title" value="{{ old('title') }}" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" required>
                </div>
                @error('title')
                    <p class="mt-2 text-sm/6 text-red-600">{{ $message }}</p>
                @enderror
              </div>

              <div class="sm:col-span-3">
                <label for="country" class="block text-sm/6 font-medium text-gray-900">Location</label>
                <div class="mt-2 grid grid-cols-1">
                  <select id="location" name="location" autocomplete="location-name" 
                          class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" required>
                      <option value="United States" {{ old('location') == 'United States' ? 'selected' : '' }}>United States</option>
                      <option value="Canada" {{ old('location') == 'Canada' ? 'selected' : '' }}>Canada</option>
                      <option value="Mexico" {{ old('location') == 'Mexico' ? 'selected' : '' }}>Mexico</option>
                      <option value="Kenya" {{ old('location') == 'Kenya' ? 'selected' : '' }}>Kenya</option>
                      <option value="Remote - United States" {{ old('location') == 'Remote - United States' ? 'selected' : '' }}>Remote - United States</option>
                      <option value="Remote - Canada" {{ old('location') == 'Remote - Canada' ? 'selected' : '' }}>Remote - Canada</option>
                      <option value="Remote - Mexico" {{ old('location') == 'Remote - Mexico' ? 'selected' : '' }}>Remote - Mexico</option>
                      <option value="Remote - Kenya" {{ old('location') == 'Remote - Kenya' ? 'selected' : '' }}>Remote - Kenya</option>
                  </select>
                  <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                    <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                  </svg>
                </div>
                @error('location')
                    <p class="mt-2 text-sm/6 text-red-600">{{ $message }}</p>
                @enderror
              </div>
      
              <div class="sm:col-span-3">
                <label for="email" class="block text-sm/6 font-medium text-gray-900">Salary</label>
                <div class="mt-2">
                  <input id="salary" name="salary" type="text" value="{{ old('salary') }}" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" required>
                </div>
                @error('salary')
                    <p class="mt-2 text-sm/6 text-red-600">{{ $message }}</p>
                @enderror 
              </div>
            </div>
          </div>
        </div>
      
        <div class="mt-6 flex items-center justify-end gap-x-6">
          <a href="/jobs" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
          <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
      </form>
      

</x-layout>