@extends ('layout')

@section('title', 'Send Message')

@section ('content')

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Send Message</a>
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
                                {!! Form::open(array('route' => array('message.post.send'),'method'=>'post', 'class'=>'form-register')) !!}

                                    {{ csrf_field() }}

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>To</label>
                                                {{-- <input type="text" class="form-control" name="email" required> --}}
                                                <select name="to">
                                                    <option value=''>select</option>
                                                    @foreach ($users_list as $user)
                                                        <option value="{{ $user->id }}">{{ $user->email }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Message</label>
                                                <input type="text" class="form-control" value="" name="message">
                                            </div>
                                        </div>
                                    </div>

                                    @include ('layouts.validationErrors')
                                    @include ('layouts.showFlashMessage')

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Send Message</button>
                                    <div class="clearfix"></div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection