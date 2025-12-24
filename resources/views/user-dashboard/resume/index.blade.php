@extends('layouts.master')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Your Resumes</h1>
    <a href="{{ route('resume.builder') }}" class="btn btn-primary">Create New Resume</a>
</div>

<!-- Resume List -->
<div id="resumeList">
    @foreach($resumes as $resume)
    <div class="resume-card d-flex justify-content-between align-items-center">
        <div>
            <h5>{{ $resume->title }}</h5>
            <p>Template: {{ $resume->template }}</p>
        </div>
        <div class="resume-actions">
            <a href="{{ route('resume.edit', $resume->id) }}" class="btn btn-sm btn-warning">Edit</a>
            <form action="{{ route('resume.destroy', $resume->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
        </div>
    </div>
    @endforeach
</div>
@endsection