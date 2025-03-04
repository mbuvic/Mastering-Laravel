<x-layout>
    <x-slot:title>Laracast - {{ $job->title }}</x-slot:title>
    <x-slot:heading>{{ $job->title }} Job Page</x-slot:heading>
    <h1>Hello from the {{ $job->title }} job Page.</h1>

    <div>
        <li>
            <strong>{{ $job->title }}</strong>: Location - {{ $job->location }}, Salary - {{ $job->salary }} per month.<br>
            <i>{{ $job->slug }}</i>
        </li>
    </div>

    <x-button class="mt-6" href="/jobs/{{ $job->id }}/edit">Edit</x-button>

</x-layout>