@if ($errors->any())
    <div class="alert alert-danger text-left" role="alert">
        <ul class="m-0 pl-1">
            @foreach ($errors->all() as $error)
                <li>{!! $error !!}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session("success"))
    <div class="alert alert-success text-left py-2">
        {{ session("success") }}
    </div>
@endif