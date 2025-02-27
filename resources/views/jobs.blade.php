<x-layout>
    <x-slot:title>Laracast - Jobs</x-slot:title>
    <x-slot:heading>Job Listings</x-slot:heading>
    <h1>Hello from the jobs Page.</h1>

@if (count($jobs) === 0)
    <p>No jobs found.</p>
@endif

@foreach ($jobs as $job)
    <div>
        <li>
            <strong><a href="/jobs/{{ $job['id'] }}" class="hover:underline text-blue-600">{{ $job['title'] }}</a></strong>: Location - {{ $job['location'] }}, Salary - {{ $job['salary'] }} per month.
        </li>
    </div>
@endforeach

</x-layout>