@if ($msgs->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($msgs->all() as $msg)
                <li>{{ $msg }}</li>
            @endforeach
        </ul>
    </div>
@endif
