<x-layouts.base>
    <x-slot name="header">
        <x-header></x-header>
    </x-slot>
    <div class="row user-tab">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" area-current="page" href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('profile') }}">Profile</a>
            </li>
        </ul>
        <div class="dashboard-clock">
            <b>Time:</b> 
            <span id="real-time"></span>
        </div>
    </div>
    <x-slot name="footer">
        <x-footer></x-footer>
        <script>
            function startTime() {
                let today = new Date();
                let y = today.getYear() + 1900;
                let mo = today.getMonth();
                let d = today.getDay();
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
            }, 1000);
        </script>
    </x-slot>
</x-layouts.base>