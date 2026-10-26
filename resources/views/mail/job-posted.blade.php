<h2>
    {{$job->title}}
</h2>

<div>
    Thank you for choice our website for publish your job offers!
</div>

<p>
    <a href="{{url('/jobs/' . $job->id)}}">View your job listing</a>
</p>
