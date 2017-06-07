@extends ('layout')

@section('title', 'User Add')

@section ('content')

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Add Blacklist Word</a>
                </div>
                <div class="collapse navbar-collapse">

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="{{ route('logout') }}">
                                Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            {{-- <div class="header">
                                <h4 class="title">Add User</h4>
                            </div> --}}
                            <div class="content">
                                {!! Form::open(array('route' => array('post.add.blacklisted.word'),'method'=>'post', 'class'=>'form-registersd')) !!}

                                    {{ csrf_field() }}

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Word</label>
                                                <input type="text" class="form-control" name="word" required>
                                            </div>
                                        </div>
                                    </div>

                                    @include ('layouts.validationErrors')
                                    @include ('layouts.showFlashMessage')

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Add Word</button>
                                    <div class="clearfix"></div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                     <a href="#">
                                    <img class="avatar border-gray" src="assets/img/faces/face-3.jpg" alt="..."/>

                                      <h4 class="title">Mike Andrew<br />
                                         <small>michael24</small>
                                      </h4>
                                    </a>
                                </div>
                                <p class="description text-center"> "Lamborghini Mercy <br>
                                                    Your chick she so thirsty <br>
                                                    I'm in that two seat Lambo"
                                </p>
                            </div>
                            <hr>
                            <div class="text-center">
                                <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>

                            </div>
                        </div>
                    </div> --}}

                </div>
            </div>
        </div>
@endsection