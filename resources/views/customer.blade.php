<x-layouts.base>
    <x-slot name="header">
        <x-header></x-header>
    </x-slot>
    <div class="row user-tab">
        <x-user-tabs active="customer" :user="$user"></x-user-tabs>
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