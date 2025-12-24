@extends('layouts.master')

@section('content')
<div class="container py-5">
    <div class="card shadow-lg rounded-lg">
        <div class="card-body">
            <h1 class="card-title text-center mb-4 display-5">Create Your Resume</h1>

            <!-- Step Tabs -->
            <div class="overflow-auto mb-4">
                <ul class="nav nav-pills justify-content-center flex-nowrap">
                    @php
                    $steps = ['Contact','Summary','Experience','Education','Skills','Template'];
                    @endphp
                    @foreach($steps as $index => $label)
                    <li class="nav-item">
                        <a href="#step-{{ $index+1 }}"
                            class="nav-link {{ $step == $index+1 ? 'active fw-bold' : '' }}">
                            {{ $label }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <!-- Step Form -->
            <form method="POST" action="{{ $step < 6 ? route('resume.saveStep') : route('resume.store') }}">
                @csrf
                <input type="hidden" name="step" value="{{ $step }}">

                <div class="mb-4">

                    <!-- Step 1: Contact -->
                    @if($step == 1)
                    <div class="row g-3">
                        <div class="col-md-6">
                            <input type="text" name="full_name" placeholder="Full Name" value="{{ $resume['contact']['full_name'] ?? '' }}" required class="form-control">
                        </div>
                        <div class="col-md-6">
                            <input type="email" name="email" placeholder="Email" value="{{ $resume['contact']['email'] ?? '' }}" required class="form-control">
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="phone" placeholder="Phone" value="{{ $resume['contact']['phone'] ?? '' }}" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="location" placeholder="Location" value="{{ $resume['contact']['location'] ?? '' }}" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <input type="url" name="linkedin" placeholder="LinkedIn" value="{{ $resume['contact']['linkedin'] ?? '' }}" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <input type="url" name="website" placeholder="Website" value="{{ $resume['contact']['website'] ?? '' }}" class="form-control">
                        </div>
                    </div>
                    @endif

                    <!-- Step 2: Summary -->
                    @if($step == 2)
                    <textarea name="summary" rows="6" placeholder="Professional Summary" class="form-control">{{ $resume['summary'] ?? '' }}</textarea>
                    @endif

                    <!-- Step 3: Experiences -->
                    @if($step == 3)
                    <div id="experiences" class="mb-3">
                        @php $experiences = $resume['experiences'] ?? [[]]; @endphp
                        @foreach($experiences as $i => $exp)
                        <div class="card mb-3 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Experience {{ $i+1 }}</h5>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <input type="text" name="experiences[{{ $i }}][company]" placeholder="Company" value="{{ $exp['company'] ?? '' }}" required class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="experiences[{{ $i }}][position]" placeholder="Position" value="{{ $exp['position'] ?? '' }}" required class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="month" name="experiences[{{ $i }}][start_date]" value="{{ $exp['start_date'] ?? '' }}" required class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="month" name="experiences[{{ $i }}][end_date]" value="{{ $exp['end_date'] ?? '' }}" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="experiences[{{ $i }}][location]" placeholder="Location" value="{{ $exp['location'] ?? '' }}" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <textarea name="experiences[{{ $i }}][description]" placeholder="Description" rows="3" class="form-control">{{ $exp['description'] ?? '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif

                    <!-- Step 4: Education -->
                    @if($step == 4)
                    <div id="educations" class="mb-3">
                        @php $educations = $resume['educations'] ?? [[]]; @endphp
                        @foreach($educations as $i => $edu)
                        <div class="card mb-3 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Education {{ $i+1 }}</h5>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <input type="text" name="educations[{{ $i }}][institution]" placeholder="Institution" value="{{ $edu['institution'] ?? '' }}" required class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="educations[{{ $i }}][degree]" placeholder="Degree" value="{{ $edu['degree'] ?? '' }}" required class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="educations[{{ $i }}][field_of_study]" placeholder="Field of Study" value="{{ $edu['field_of_study'] ?? '' }}" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="month" name="educations[{{ $i }}][start_date]" value="{{ $edu['start_date'] ?? '' }}" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="month" name="educations[{{ $i }}][end_date]" value="{{ $edu['end_date'] ?? '' }}" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="educations[{{ $i }}][location]" placeholder="Location" value="{{ $edu['location'] ?? '' }}" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="educations[{{ $i }}][gpa]" placeholder="GPA" value="{{ $edu['gpa'] ?? '' }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif

                    <!-- Step 5: Skills -->
                    @if($step == 5)
                    <div id="skills" class="mb-3">
                        @php $skills = $resume['skills'] ?? [[]]; @endphp
                        @foreach($skills as $i => $skill)
                        <div class="card mb-3 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Skill {{ $i+1 }}</h5>
                                <div class="mb-2">
                                    <input type="text" name="skills[{{ $i }}][category]" placeholder="Category" value="{{ $skill['category'] ?? '' }}" required class="form-control mb-2">
                                    <input type="text" name="skills[{{ $i }}][skill_items]" placeholder="Skills (comma-separated)" value="{{ $skill['skill_items'] ?? '' }}" required class="form-control">
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif

                    <!-- Step 6: Template -->
                    @if($step == 6)
                    <div class="row g-3">
                        <div class="col-md-6">
                            <select name="template" required class="form-select">
                                @foreach($templates as $template)
                                <option value="{{ $template->name }}" {{ (isset($resume['template']) && $resume['template']==$template->name)?'selected':'' }}>
                                    {{ $template->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="title" placeholder="Resume Title" value="{{ $resume['title'] ?? 'My Resume' }}" required class="form-control">
                        </div>
                    </div>
                    @endif

                </div>

                <!-- Buttons -->
                <div class="d-flex justify-content-between mt-4">
                    @if($step > 1)
                    <a href="{{ route('resume.builder', ['step' => $step - 1]) }}" class="btn btn-secondary">Back</a>
                    @endif
                    <button type="submit" class="btn btn-primary">
                        {{ $step < 6 ? 'Next Step' : 'Finish & Save' }}
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection