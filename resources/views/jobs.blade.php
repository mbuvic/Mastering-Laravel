<x-layout>
    <x-slot:title>Laracast - Jobs</x-slot:title>
    <x-slot:heading>Job Listings</x-slot:heading>
    <h1>Hello from the jobs Page.</h1>

@if (count($jobs) === 0)
    <p>No jobs found.</p>
@endif

<div class="space-y-4">
    @foreach ($jobs as $job)
        <a href="/jobs/{{ $job['id'] }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
            <div class="font-bold text-blue-500 text-sm">{{ $job->employer->name }}</div>
            <div>
                <strong>{{ $job['title'] ?? 'N/A' }}</strong>:  
                Location - {{ $job['location'] ?? 'Unknown' }},  
                Salary - {{ isset($job['salary']) ? $job['salary'] : 'Not specified' }} per month.
            </div>
        </a>
    @endforeach
</div>

</x-layout>