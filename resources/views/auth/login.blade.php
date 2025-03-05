<x-layout>
    <x-slot:title>Laracast - User Login</x-slot:title>
    <x-slot:heading>Login</x-slot:heading>

    <form method="POST" action="/login">
      @csrf
        <div class="space-y-12">
          <div class="border-b border-gray-900/10 pb-12">
      
          <div>      
            <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

              <x-form-field>
                <x-form-label for="email">Email</x-form-label>
                <x-form-input name="email" id="email" placeholder="johndoe@example.test" value="{{ old('email') }}" required/>
                <x-form-error name="email"/>
              </x-form-field>

              <x-form-field>
                <x-form-label for="password">Password</x-form-label>
                <x-form-input type="password" name="password" id="password" placeholder="********" value="{{ old('password') }}" required/>
                <x-form-error name="password"/>
              </x-form-field>

            </div>
          </div>
        </div>
      
        <div class="mt-6 flex items-center justify-end gap-x-6">
          <a href="/" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
          <x-form-button type="submit">Login</x-form-button>
        </div>
      </form>
      

</x-layout>