<x-layouts.base>
    <x-slot name="header">
        <x-header></x-header>
    </x-slot>
    <div class="row user-tab">
        <x-user-tabs active="dashboard" :user="$user"></x-user-tabs>
        <div class="dashboard-clock">
            <b>Time:</b> 
            <span id="real-time"></span>
        </div>
        <div class="dashboard-welcome">
            <h4>Welcome <b><em>{{ $user->name }}</em></b> to BYLC assesment portal.</h4>
        </div>
        <div class="dashboard-stat-table">
            <table class="table table-dark table-striped">
                @if($user->role == 'employee' || $user->role == 'admin')
                <tr>
                    <th>Total Customer</th>
                    <td>{{ $customer_count }}</td>
                </tr>
                @endif
                @if($user->role == 'admin')
                <tr>
                    <th>Total Employee</th>
                    <td>{{ $employee_count }}</td>
                </tr>
                @endif
            </table>
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