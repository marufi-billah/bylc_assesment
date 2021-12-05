<x-layouts.base>
    <x-slot name="header">
        <x-header></x-header>
    </x-slot>
    
    <div class="row login-container">
        <div class="col-sm-3 col-md-4"></div>
        <div class="col-sm-6 col-md-4">
            <div class="card login-card">
                <h2 class="card-header text-center">Login</h2>
                <div class="card-body">
                    <form method="POST" action="{{ route('account_login') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <input type="email" placeholder="Email" id="email" class="form-control" name="email" required autofocus>
                            @if($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                            @if($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <div class="checkbox">
                                <lavel>
                                    <input type="checkbox" name="remember"> Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="d-grid mx-auto">
                            <button type="submit" class="btn btn-danger btn-block">Sign In</button>
                        </div>
                        <div class="card-link">
                            <a href="{{ route('register') }}">Create account</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-3 col-md-4"></div>
    </div>

    <x-slot name="footer">
        <x-footer></x-footer>
    </x-slot>
</x-layouts.base>