    <div class="sidebar" data-color="purple" data-image="{{ asset('assets/img/sidebar-5.jpg') }}">
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    {{-- Creative Tim --}}
                </a>
            </div>

            <?php 
                $role_id = auth()->user()->role_id; 
            ?>

            <ul class="nav">
                {{-- <li class="active">
                    <a href="{{ route('dashboard') }}">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li> --}}
                <li>
                    <a href="{{ route('profile') }}">
                        <i class="pe-7s-user"></i>
                        <p>Profile</p>
                    </a>
                </li>
                @if ($role_id == 1)
                <li>
                    <a href="{{ route('add.user') }}">
                        <i class="pe-7s-note2"></i>
                        <p>Add User</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.list') }}">
                        <i class="pe-7s-note2"></i>
                        <p>List Users</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('blacklisted.words.list') }}">
                        <i class="pe-7s-note2"></i>
                        <p>List Blacklist Words</p>
                    </a>
                </li>
                @endif
                @if ($role_id == 2)
                <li>
                    <a href="{{ route('inbox.list') }}">
                        <i class="pe-7s-note2"></i>
                        <p>Message Inbox</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('outbox.list') }}">
                        <i class="pe-7s-note2"></i>
                        <p>Message Outbox</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('message.send') }}">
                        <i class="pe-7s-note2"></i>
                        <p>Send Message</p>
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </div>