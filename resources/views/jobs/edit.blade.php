<x-layout>
    <x-slot:title>Laracast - Edit Job {{ $job->title }}</x-slot:title>
    <x-slot:heading>Edit Job: {{ $job->title }}</x-slot:heading>

    <form method="POST" action="/jobs/{{ $job->id }}">
      @csrf
      @method('PATCH')
        <div class="space-y-12">
          <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base/7 font-semibold text-gray-900">Edit Job</h2>
            <p class="mt-1 text-sm/6 text-gray-600">This information will be displayed publicly so be careful what you share.</p>
      
          <div>      
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
      
              <x-form-field>
                <x-form-label for="title">Title</x-form-label>
                <x-form-input name="title" id="title" placeholder="Job Title" value="{{ old('title', $job->title) }}" required/>
                <x-form-error name="title"/>
              </x-form-field>

              @php
                $locations = [
                      'United States'         => 'United States',
                      'Canada'                => 'Canada',
                      'Mexico'                => 'Mexico',
                      'Kenya'                 => 'Kenya',
                      'Remote - United States'=> 'Remote - United States',
                      'Remote - Canada'       => 'Remote - Canada',
                      'Remote - Mexico'       => 'Remote - Mexico',
                      'Remote - Kenya'        => 'Remote - Kenya',
                  ];
              @endphp
              
              <x-form-field>
                  <x-form-label for="location">Location</x-form-label>
                  <x-form-select name="location" id="location" :options="$locations" :selected="old('location', $job->location)" required/>
                  <x-form-error name="location"/>
              </x-form-field>

              <x-form-field>
                <x-form-label for="salary">Salary</x-form-label>
                <x-form-input name="salary" id="salary" placeholder="Prefered Salary" value="{{ old('salary', $job->salary) }}" required/>
                <x-form-error name="salary"/>
              </x-form-field>
            </div>
          </div>
        </div>
    
        <div class="mt-6 flex items-center justify-between gap-x-6">
            <div class="flex items-center gap-x-6">
                <button form="delete-form" class="text-sm font-bold text-red-500">Delete</button>
            </div>
            <div class="flex items-center gap-x-6">
                <a href="/jobs/{{ $job->id }}" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
                <div>
                  <x-form-button type="submit">Update</x-form-button>
                </div>
            </div>
        </div>
        </div>
    </form>
    

    <form method="POST" action="/jobs/{{ $job->id }}" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')
    </form>

</x-layout>