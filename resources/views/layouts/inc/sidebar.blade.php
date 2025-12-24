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
        <a href="{{ route('dashboard') }}"
            class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="bi bi-speedometer2"></i> <span>Dashboard</span>
        </a>

        <a href="{{ route('resumes.index') }}"
            class="{{ request()->routeIs('resumes.*') ? 'active' : '' }}">
            <i class="bi bi-file-earmark-text"></i> <span>My Resumes</span>
        </a>

        <a href="{{ route('resume.builder') }}"
            class="{{ request()->routeIs('resume.builder') ? 'active' : '' }}">
            <i class="bi bi-pencil-square"></i> <span>Resume Generator</span>
        </a>

        <a href="{{ route('ats.score') }}"
            class="{{ request()->routeIs('ats.*') ? 'active' : '' }}">
            <i class="bi bi-bar-chart-line"></i> <span>ATS Score</span>
        </a>

        <a href="{{ route('job.search') }}"
            class="{{ request()->routeIs('job.*') ? 'active' : '' }}">
            <i class="bi bi-search"></i> <span>Job Search</span>
        </a>

        <a href="{{ route('chatbox') }}"
            class="{{ request()->routeIs('chatbox') ? 'active' : '' }}">
            <i class="bi bi-chat-dots"></i> <span>Chatbox</span>
        </a>

        <a href="#"
            class="{{ request()->is('settings*') ? 'active' : '' }}">
            <i class="bi bi-gear"></i> <span>Settings</span>
        </a>
    </nav>
</div>