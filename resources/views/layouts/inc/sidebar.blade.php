<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <!-- Logo -->
    <div class="dashboard-logo">
        <a href="{{ url('/') }}" target="_blank">
            <img src="{{ asset('assets/images/logo/new-logo/logo.png') }}" alt="Logo">
        </a>
    </div>

    <!-- Navigation -->
    <nav>
        <a href="{{ route('dashboard') }}"><i class="bi bi-speedometer2"></i> <span>Dashboard</span></a>
        <a href="{{ route('resumes.index') }}"><i class="bi bi-file-earmark-text"></i> <span>My Resumes</span></a>
        <a href="{{ route('resume.builder') }}"><i class="bi bi-pencil-square"></i> <span>Resume Generator</span></a>
        <a href="{{ route('ats.score') }}"><i class="bi bi-bar-chart-line"></i> <span>ATS Score</span></a>
        <a href="{{ route('job.search') }}"><i class="bi bi-search"></i> <span>Job Search</span></a>
        <a href="{{ route('chatbox') }}"><i class="bi bi-chat-dots"></i> <span>Chatbox</span></a>
        <a href="#"><i class="bi bi-gear"></i> <span>Settings</span></a>
    </nav>
</div>