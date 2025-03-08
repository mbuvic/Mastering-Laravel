<x-mail::message>
Job: {{ $job->title }}

Your job has been posted.

<x-mail::button :url="url('/jobs/' . $job->id)">
View New Job
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
