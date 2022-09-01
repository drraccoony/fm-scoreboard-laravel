@props(['time', 'route'])


<script>
    var time = {{ $time }};
    var route = "{{ route($route) }}";
    setInterval(function() {
        var seconds = time % 60;
        var minutes = (time - seconds) / 60;
        if (seconds.toString().length == 1) {
            seconds = "0" + seconds;
        }
        if (minutes.toString().length == 1) {
            minutes = "0" + minutes;
        }
        document.getElementById("time").innerHTML = minutes + ":" + seconds;
        if (time == 0) {
            window.location.href = route;
        }
        time--;
    }, 1000);
</script>

<div class="p-2">
    <strong>Redirect in: <span id="time"></span></strong>
</div>
