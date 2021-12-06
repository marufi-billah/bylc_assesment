<x-layouts.base>
    <x-slot name="header">
        <x-header></x-header>
    </x-slot>
    <div class="row user-tab">
        @if($customers[0]->role == "customer")
        <x-user-tabs active="customer" :user="$user"></x-user-tabs>
        @else
        <x-user-tabs active="employee" :user="$user"></x-user-tabs>
        @endif
        <div class="user-table">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer)
                    <tr>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>
                            @if($user->role == 'employee')
                            <form method="POST" action="{{ route('archive_user') }}">
                            @csrf
                                <input type="text" value="{{ $customer->id }}" name="customer_id" hidden>
                                @if($customer->status == 'active')
                                <button type="submit" class="btn btn-danger">Archive</button>
                                @else
                                <button type="submit" class="btn btn-primary">Activate</button>
                                @endif
                                <a class="btn btn-success" href="{{ route('user_edit', ['user_id'=>$customer->id]) }}">Edit</a>
                            </form>
                            @elseif($user->role == 'admin')
                            <form method="POST" action="{{ route('delete_user') }}">
                            @csrf
                                <input type="text" value="{{ $customer->id }}" name="customer_id" hidden>
                                <button type="submit" class="btn btn-danger">Delete</button>
                                <a class="btn btn-success" href="{{ route('user_edit', ['user_id'=>$customer->id]) }}">Edit</a>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $customers->links() !!}
        </div>
    </div>
    <x-slot name="footer">
        <x-footer></x-footer>
    </x-slot>
</x-layouts.base>