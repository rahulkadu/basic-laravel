@extends ('layout')

@section('title', 'List Users')

@section ('content')
    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">List Users</a>
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
                        
                            @include ('layouts.validationErrors')
                            @include ('layouts.showFlashMessage')
                            {{-- <div class="header">
                                <h4 class="title">Table on Plain Background</h4>
                                <p class="category">Here is a subtitle for this table</p>
                            </div> --}}
                            @if ($users_count > 0)
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover">
                                    <thead>
                                        <th>ID</th>
                                        <th>Email</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user) 
                                            <tr>
                                                <td>{{ $index }}</td>
                                                <td>{{ $user->email }}</td
                                            </tr>
                                            <?php $index++; ?>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div class="load-more">
                                    {{ $users->links() }}
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection