<x-layouts.base>
    <x-slot name="header">
        <x-header></x-header>
    </x-slot>
    
    <div class="row register-container">
        <div class="col-sm-3 col-md-4"></div>
        <div class="col-sm-6 col-md-4">
            <div class="card register-card">
                <h2 class="card-header text-center">Create Account</h2>
                <div class="card-body">
                    <form method="POST" action="{{ route('account_register') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <input type="text" placeholder="Name" id="name" class="form-control" name="name" required>
                            @if($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <input type="email" placeholder="Email" id="email" class="form-control" name="email" required>
                            @if($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" placeholder="Phone" id="phone" class="form-control" name="phone" required>
                            @if($errors->has('phone'))
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                            @if($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" placeholder="Confirm Password" id="confirm_password" class="form-control" name="password_confirmation" required>
                            @if($errors->has('confirm_password'))
                            <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <div class="checkbox">
                                <lavel>
                                    <input type="checkbox" name="agreement"> I agree to the terms and conditions
                                </label>
                            </div>
                            @if($errors->has('agreement'))
                            <span class="text-danger">{{ $errors->first('agreement') }}</span>
                            @endif
                        </div>
                        <div class="d-grid mx-auto">
                            <button type="submit" class="btn btn-danger btn-block">Sign Up</button>
                        </div>
                        <div class="card-link">
                            <a href="{{ route('login') }}">Login to your account</a>
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