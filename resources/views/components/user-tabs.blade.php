<ul class="nav nav-tabs">
    <li class="nav-item">
        @if($active == 'dashboard')
        <a class="nav-link active" area-current="page" href="{{ route('dashboard') }}">Dashboard</a>
        @else
        <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
        @endif
    </li>
    <li class="nav-item">
        @if($active == 'profile')
        <a class="nav-link active" area-current="page" href="{{ route('profile') }}">Profile</a>
        @else
        <a class="nav-link" href="{{ route('profile') }}">Profile</a>
        @endif
    </li>
    @if($user->role == 'employee' | $user->role == 'admin')
    <li class="nav-item">
        @if($active == 'customer')
        <a class="nav-link active" area-current="page" href="{{ route('customer') }}">Customer</a>
        @else
        <a class="nav-link" href="{{ route('customer') }}">Customer</a>
        @endif
    </li>
    @endif
    @if($user->role == 'admin')
    <li class="nav-item">
        @if($active == 'employee')
        <a class="nav-link active" area-current="page" href="{{ route('employee') }}">Employee</a>
        @else
        <a class="nav-link" href="{{ route('employee') }}">Employee</a>
        @endif
    </li>
    @endif
</ul>