@extends ('layout')

@section('title', 'Outbox')

@section ('content')
    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Message Outbox</a>
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
                    <div class="col-md-12">
                        <div class="card card-plain">
                            {{-- <div class="content col-md-12" style="float:left;">
                                {!! Form::open(array('route' => array('post.add.blacklisted.word'),'method'=>'post', 'class'=>'form-register')) !!}

                                    {{ csrf_field() }}

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Send Message</label>
                                                <input type="text" class="form-control" name="word" placeholder="word">
                                            </div>
                                        </div>
                                    </div>

                                    @include ('layouts.validationErrors')
                                    @include ('layouts.showFlashMessage')

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Add</button>
                                    <div class="clearfix"></div>
                                {!! Form::close() !!}
                            </div> --}}
                            @include ('layouts.validationErrors')
                            @include ('layouts.showFlashMessage')
                            {{-- <div class="header">
                                <h4 class="title">Table on Plain Background</h4>
                                <p class="category">Here is a subtitle for this table</p>
                            </div> --}}
                            @if ($messages_count > 0)
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover">
                                    <thead>
                                        <th>ID</th>
                                        <th>To</th>
                                        <th>Message</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($messages as $message) 
                                            <tr>
                                                <td>{{ $index }}</td>
                                                <td>{{ $message->to_user_data()->first()->email }}</td>
                                                <td>{{ $message->message }}</td>
                                            </tr>
                                            <?php $index++; ?>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div class="load-more">
                                    {{ $messages->links() }}
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection