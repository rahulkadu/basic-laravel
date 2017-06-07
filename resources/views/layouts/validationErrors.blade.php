@if (count($errors))
    <div class="alert alert-danger">
        <ul style="list-style-type: none; padding:0; margin:0;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif