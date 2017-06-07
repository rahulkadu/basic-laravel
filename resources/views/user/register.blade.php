<!DOCTYPE html>
<html>

<head>

    	{{-- <meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1"> --}}

	<title>Register</title>

	<link rel="stylesheet" href="assets/demo.css">
	<link rel="stylesheet" href="assets/form-register.css">

</head>

	{{-- <header>
		<h1>Freebie: 7 Clean and Responsive Forms</h1>
        <a href="http://tutorialzine.com/2015/07/freebie-7-clean-and-responsive-forms/">Download</a>
    </header>

    <ul>
        <li><a href="index.html">Basic</a></li>
        <li><a href="form-register.html" class="active">Register</a></li>
        <li><a href="form-login.html">Login</a></li>
        <li><a href="form-mini.html">Mini</a></li>
        <li><a href="form-labels-on-top.html">Labels on Top</a></li>
        <li><a href="form-validation.html">Validation</a></li>
        <li><a href="form-search.html">Search</a></li>
    </ul> --}}


    <div class="main-content">

        {!! Form::open(array('route' => array('post.register'),'method'=>'post', 'class'=>'form-register')) !!}

            <div class="form-register-with-email">

                <div class="form-white-background">

                    {{ csrf_field() }}

                    <div class="form-title-row">
                        <h1>Create an account</h1>
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
                        <label>
                            <span>Confirm Password</span>
                            <input type="password" name="password_confirmation">
                        </label>
                    </div>

                    <div class="form-row">
                        <button type="submit">Register</button>
                    </div>

                </div>

                <a href="{{ route('login') }}" class="form-log-in-with-existing">Already have an account? Login here &rarr;</a>

            </div>

        {!! Form::close() !!}

    </div>

</body>

</html>
