<x-layout>
    <x-slot:title>Laracast - {{ $job['title'] }}</x-slot:title>
    <x-slot:heading>{{ $job['title'] }} Job Page</x-slot:heading>
    <h1>Hello from the {{ $job['title'] }} job Page.</h1>

    <div>
        <li>
            <strong>{{ $job['title'] }}</strong>: Location - {{ $job['location'] }}, Salary - {{ $job['salary'] }} per month.
        </li>
    </div>

    <x-button href="/jobs">Edit</x-button>

</x-layout>