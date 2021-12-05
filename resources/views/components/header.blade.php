<div class="row main-nav">
    <div class="col-6">
        <a href="{{ url('/') }}">
            <div class="logo">
                <img src="{{ URL::asset('image/logo.png') }}">
            </div>
        </a>
    </div>
    <div class="col-6">
        @guest
        <a href="{{ route('login') }}" class="btn btn-danger account-button">Account</a>
        @endguest
        @auth
        <a href="{{ route('signout') }}" class="btn btn-danger account-button">Sign Out</a>
        @endauth
    </div>
</div>