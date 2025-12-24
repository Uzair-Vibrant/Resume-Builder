@extends('layouts.master')

@section('content')
<div class="container-fluid">

    <!-- Dashboard Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 fw-bold text-gray-900">Welcome Back, {{ auth()->user()->name ?? 'User' }}</h1>
        <div>
            <button class="btn btn-primary me-2"><i class="bi bi-plus-lg"></i> New Resume</button>
            <button class="btn btn-success"><i class="bi bi-briefcase"></i> Find Jobs</button>
        </div>
    </div>

    <!-- Metric Cards -->
    <div class="row g-4 mb-5">
        @php
        $metrics = [
        ['title'=>'Total Resumes','value'=>$totalResumes ?? 0,'icon'=>'bi-file-earmark-text','bg'=>'#4e73df','#grad'=>'linear-gradient(135deg,#4e73df,#2e59d9)'],
        ['title'=>'ATS Score Avg','value'=>$avgAtsScore ?? 0,'icon'=>'bi-bar-chart-line','bg'=>'#1cc88a','#grad'=>'linear-gradient(135deg,#1cc88a,#17a673)'],
        ['title'=>'Jobs Applied','value'=>$jobsApplied ?? 0,'icon'=>'bi-briefcase','bg'=>'#f6c23e','#grad'=>'linear-gradient(135deg,#f6c23e,#f4b619)'],
        ['title'=>'Unread Messages','value'=>$unreadMessages ?? 0,'icon'=>'bi-chat-dots','bg'=>'#e74a3b','#grad'=>'linear-gradient(135deg,#e74a3b,#be2617)'],
        ];
        @endphp

        @foreach($metrics as $metric)
        <div class="col-md-3">
            <div class="card text-white shadow-lg rounded-4 hover-metric" style="background: {{ $metric['#grad'] }}; border:none; position:relative; overflow:hidden;">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <div class="fw-bold">{{ $metric['title'] }}</div>
                        <div class="h2 display-5 counter" data-target="{{ $metric['value'] }}">0</div>
                    </div>
                    <i class="bi {{ $metric['icon'] }} fs-1 opacity-75"></i>
                </div>
                <div class="overlay-shape"></div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Charts Row -->
    <div class="row g-4 mb-5">
        <!-- Resume Submissions Chart -->
        <div class="col-lg-6">
            <div class="card shadow border-0 rounded-4 p-3">
                <h5 class="fw-bold mb-3">Resume Submissions</h5>
                <canvas id="resumesChart" height="250"></canvas>
            </div>
        </div>

        <!-- ATS Score Trends Chart -->
        <div class="col-lg-6">
            <div class="card shadow border-0 rounded-4 p-3">
                <h5 class="fw-bold mb-3">ATS Score Trends</h5>
                <canvas id="atsChart" height="250"></canvas>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row g-4">
        @php
        $actions = [
        ['title'=>'Create Resume','icon'=>'bi-pencil-square','bg'=>'#4e73df'],
        ['title'=>'ATS Analysis','icon'=>'bi-graph-up','bg'=>'#1cc88a'],
        ['title'=>'Job Search','icon'=>'bi-briefcase','bg'=>'#f6c23e'],
        ['title'=>'Chatbox','icon'=>'bi-chat-dots','bg'=>'#e74a3b'],
        ];
        @endphp

        @foreach($actions as $action)
        <div class="col-md-3">
            <div class="card text-white shadow hover-action rounded-3" style="background: {{ $action['bg'] }}; padding:30px; text-align:center;">
                <i class="bi {{ $action['icon'] }} fs-1 mb-2"></i>
                <div class="fw-bold">{{ $action['title'] }}</div>
            </div>
        </div>
        @endforeach
    </div>

</div>
@include('user-dashboard.chartJS')
@endsection