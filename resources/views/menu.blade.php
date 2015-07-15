<nav class='navbar navbar-default navbar-fixed-top navbar-inverse'>
    <div class='container'>
        <ul class='nav navbar-nav'>
            <li>
                <a href="{{ url('/main') }}">Main</a>
            </li>
            <li class='dropdown'>
                <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button'>
                    About me<span class="caret"></span>
                </a>
                <ul class='dropdown-menu'>
                    <li>
                        <a href="{{ url('/about-me') }}">About me</a>
                    </li>
                    <li>
                        <a href="{{ url('/my-interests') }}">My interests</a>
                    </li>
                    <li>
                        <a href="{{ url('/education') }}">Education</a>
                    </li>
                    <li>
                        <a href="{{ url('/gallery') }}">Gallery</a>
                    </li>
                    <li>
                        <a href="{{ url('/contacts') }}">Contacts</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ url('/browse-history') }}">Browse history</a>
            </li>
            <li>
                <a href="{{ url('/guest-book') }}">Guest book</a>
            </li>
            <li>
                <a href="{{ url('/my-blog') }}">My blog</a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            @if(Auth::check())
                <li>
                    <a href="{{ route('auth.logout') }}">{{ Auth::user()->name }}(Logout)</a>
                </li>
            @else
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle='dropdown' role='button'>Login</a>
                    <ul class="dropdown-menu">
                        <li><a>@include('auth.login-form')</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('auth.register') }}">Register</a>
                </li>
            @endif
            <li>
                <a href="{{ route('admin') }}">Administration</a>
            </li>
        </ul>
        {{--<ul class="nav navbar-nav navbar-right">--}}
            {{--@if(Auth::check())--}}
                {{--<li>--}}
                    {{--<a href="{{ route('auth.logout') }}">{{ Auth::user()->name }}(Logout)</a>--}}
                {{--</li>--}}
            {{--@else--}}
                {{--<li>--}}
                    {{--<a href="{{ route('auth.login') }}">Login</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="{{ route('auth.register') }}">Register</a>--}}
                {{--</li>--}}
            {{--@endif--}}
            {{--<li>--}}
                {{--<a href="{{ route('admin') }}">Administration</a>--}}
            {{--</li>--}}
        {{--</ul>--}}
    </div>
</nav>

<style>
    body {
        padding-top: 70px;
    }
</style>
