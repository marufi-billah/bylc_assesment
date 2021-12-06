<x-layouts.base>
    <x-slot name="header">
        <x-header></x-header>
    </x-slot>
    <div class="row user-tab">
        @if($user->role == 'customer')
        <x-user-tabs active="customer" :user="$admin"></x-user-tabs>
        @elseif($user->role == 'employee')
        <x-user-tabs active="employee" :user="$admin"></x-user-tabs>
        @endif
        <div class="profile-edit-container">
            <form method="POST" action="{{ route('user_edit', ['user_id'=>$user->id]) }}">
                @csrf
                <div class="form-group row mb-3">
                    <label class="col-sm-2" for="name">Name</label>
                    <div class="col-sm-10">
                        <input type="text" id="name" class="form-control" name="name" value="{{ $user->name }}" required>
                    </div>
                    @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group row mb-3">
                    <label class="col-sm-2" for="email">Email</label>
                    <div class="col-sm-10">
                        <input type="email" id="email" class="form-control" name="email" value="{{ $user->email }}" readonly>
                    </div>
                    @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group row mb-3">
                    <label class="col-sm-2" for="phone">Phone</label>
                    <div class="col-sm-10">
                        <input type="text" id="phone" class="form-control" name="phone" value="{{ $user->phone }}" required>
                    </div>
                    @if($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                    @endif
                </div>
                <div class="form-group row mb-3">
                    <label class="col-sm-2" for="password">Password</label>
                    <div class="col-sm-10">
                        <input type="password" id="password" class="form-control" name="password" required>
                    </div>
                    @if($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="form-group row mb-3">
                    <label class="col-sm-2" for="name">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="description" name="description" required>{{$user->description}}</textarea>
                    </div>
                    @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                <div class="profile-save-buttons">
                    <a class="btn btn-danger" href="{{ URL::previous() }}">Back</a>
                    <button type="submit" class="btn btn-success">Save Profile</button>
                </div>
            </form>
        </div>
    </div>
    <x-slot name="footer">
        <x-footer></x-footer>
    </x-slot>
</x-layouts.base>