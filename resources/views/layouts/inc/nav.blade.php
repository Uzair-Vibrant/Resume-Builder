<!-- Header -->
<div class="header">
    <div class="hamburger" id="hamburger">
        <i class="bi bi-list"></i>
    </div>
    <div>
        <span>Welcome, {{ auth()->user()->name ?? 'User' }}</span>
        <!-- Logout Button -->
        <a href="{{ route('logout') }}" class="btn btn-sm btn-danger ms-3"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a>
        <!-- Hidden Logout Form -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
            @csrf
        </form>
    </div>
</div>