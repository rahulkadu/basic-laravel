<!DOCTYPE html>
<html>

<head>

	<title>Login Form</title>

	<link rel="stylesheet" href="assets/demo.css">
    <link rel="stylesheet" href="assets/form-login.css">

</head>


    <div class="main-content">

        {!! Form::open(array('route' => array('post.login'),'method'=>'post', 'class'=>'form-login')) !!}

            <div class="form-log-in-with-email">

                <div class="form-white-background">

                    {{ csrf_field() }}

                    <div class="form-title-row">
                        <h1>Log in</h1>
                    </div>

                    <div class="form-row">
                        <label>
                            <span>Email</span>
                            <input type="email" name="email">
                        </label>
                    </div>

                    <div class="form-row">
                        <label>
                            <span>Password</span>
                            <input type="password" name="password">
                        </label>
                    </div>

                    <div class="form-row">
                        <button type="submit">Log in</button>
                    </div>

                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))

                            <p class="alert alert-{{ $msg }} center">{{ Session::get('alert-' . $msg) }}</p>

                        @endif
                    @endforeach

                    @if (count($errors))
                        <div class="alert alert-danger">
                            <ul style="list-style-type: none; padding:0; margin:0;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </div>

                {{-- <a href="{{ route('register') }}" class="form-create-an-account">Create an account &rarr;</a> --}}

            </div>

        {!! Form::close() !!}

    </div>

</body>

</html>
