@if($errors->any())
    <div id="errors_container">
        @foreach($errors->all() as $error)
            {{$error}}
        @endforeach
    </div>
@endif