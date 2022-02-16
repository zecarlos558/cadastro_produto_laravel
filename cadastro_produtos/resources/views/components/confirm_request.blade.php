

@if (session('msg_alert'))
    <p class="msg">{{ session('msg_alert') }}</p>
@endif

{{--
@if ($msgs->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($msgs->all() as $msg)
                <li>{{ $msg }}</li>
            @endforeach
        </ul>
    </div>
@endif
--}}
