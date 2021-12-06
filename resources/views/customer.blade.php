<x-layouts.base>
    <x-slot name="header">
        <x-header></x-header>
    </x-slot>
    <div class="row user-tab">
        <x-user-tabs active="customer" :user="$user"></x-user-tabs>
        <div class="dashboard-clock">
            <b>Time:</b> 
            <span id="real-time"></span>
        </div>
        <div class="profile-details-table">
            <table class="table table-dark table-striped">
                <tr>
                    <th>Name</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{ $user->phone }}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{ $user->description }}</td>
                </tr>
            </table>
            @if($user->role == 'customer')
            <a class="btn btn-danger" href="{{ route('profile_delete') }}">Delete account</a>
            @endif
            <a class="btn btn-success btn-profile-edit" href="{{ route('profile_edit') }}">Edit Profile</a>
        </div>
    </div>
    <x-slot name="footer">
        <x-footer></x-footer>
        <script>
            function startTime() {
                let today = new Date();
                let y = today.getYear() + 1900;
                let mo = today.getMonth()+1;
                let d = today.getDate();
                let h = today.getHours();
                let m = today.getMinutes();
                let s = today.getSeconds();
                m = checkTime(m);
                s = checkTime(s);
                document.getElementById('real-time').innerHTML =  d + " / " + mo + " / " + y + " - " + h + ":" + m + ":" + s;
                setTimeout(startTime, 1000);
            }

            function checkTime(i) {
                if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
                return i;
            }
            setTimeout(() => {
                startTime();
            }, 100);
        </script>
    </x-slot>
</x-layouts.base>