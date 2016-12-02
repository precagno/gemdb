@if(\Session::has('success_message'))

    <div id="success_message_container" class='alert alert-success'>

        <p>{{\Session::get('success_message')}}</p>

    </div>

@endif