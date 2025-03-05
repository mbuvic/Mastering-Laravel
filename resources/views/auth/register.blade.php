<x-layout>
    <x-slot:title>Laracast - User Registration</x-slot:title>
    <x-slot:heading>Register</x-slot:heading>

    <form method="POST" action="/register">
      @csrf
        <div class="space-y-12">
          <div class="border-b border-gray-900/10 pb-12">
      
          <div>      
            <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
      
              <x-form-field>
                <x-form-label for="first_name">First Name</x-form-label>
                <x-form-input name="first_name" id="first_name" placeholder="John" value="{{ old('first_name') }}" required/>
                <x-form-error name="first_name"/>
              </x-form-field>

              <x-form-field>
                <x-form-label for="last_name">Last Name</x-form-label>
                <x-form-input name="last_name" id="last_name" placeholder="Doe" value="{{ old('last_name') }}" required/>
                <x-form-error name="last_name"/>
              </x-form-field>

              <x-form-field class="sm:col-span-6">
                <x-form-label for="email">Email</x-form-label>
                <x-form-input name="email" id="email" placeholder="johndoe@example.test" value="{{ old('email') }}" required/>
                <x-form-error name="email"/>
              </x-form-field>

              <x-form-field>
                <x-form-label for="password">Password</x-form-label>
                <x-form-input type="password" name="password" id="password" placeholder="********" value="{{ old('password') }}" required/>
                <x-form-error name="password"/>
              </x-form-field>

              <x-form-field>
                <x-form-label for="password_confirmation">Confirm Password</x-form-label>
                <x-form-input type="password" name="password_confirmation" id="password_confirmation" placeholder="********" value="{{ old('password_confirmation') }}" required/>
                <x-form-error name="password_confirmation"/>
              </x-form-field>

            </div>
          </div>
        </div>
      
        <div class="mt-6 flex items-center justify-end gap-x-6">
          <a href="/" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
          <x-form-button type="submit">Register</x-form-button>
        </div>
      </form>
      

</x-layout>