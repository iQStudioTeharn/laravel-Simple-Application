@if (count($errors) > 0)

@foreach ($errors->all() as $message) 

    <div class="uk-alert-danger" uk-alert>
        <a class="uk-alert-close" uk-close></a>
        {{ $message }}
    </div>

@endforeach

@endif