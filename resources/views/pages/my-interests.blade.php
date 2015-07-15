@extends('app')

@section('title')
    My interests
@endsection

@section('content')

    <h1>My interests</h1>

    <ul class="nav nav-pills nav-stacked">
        <li><a href="#hobby">My hobby</a></li>
        <li><a href="#music">Music</a></li>
        <li><a href="#movies">Movies</a></li>
        <li role="presentation" class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button">
                Games <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a href="#games">Games</a>
                </li>
                <li role="separator" class="divider"></li>
                <li>
                    <a href="#half-life">Half-Life</a>
                </li>
                <li>
                    <a href="#battlefield">Battlefield</a>
                </li>
            </ul>
        </li>
        {{--<li><a href="#games">Games</a></li>--}}
    </ul>

    <h2><a name="hobby">My hobby</a></h2>
    <h3>Programming</h3>
    <p>Мне нравится видеть как оживают идеи ...</p>
    <h3>Weapons</h3>
    <p>да да да</p>

    <h2><a name="music">Music</a></h2>
    <p>Favourite bands:</p>
    <ul>
        <li>System of a down</li>
        <li>Slipknot</li>
        <li>Skilet</li>
        <li>Scars on a broadway</li>
        <li>Bullet for My Valentine</li>
        <li>April Six</li>
        <li>Breaking Benjamin</li>
        <li>Delain</li>
        <li>Disturbed</li>
        <li>The Pretty Reckless</li>
        <li>RED</li>
        <li>Rise Against</li>
        <li>We Are the Emergency</li>
        <li>Yellowcard</li>
        <li>Король и Шут</li>
    </ul>

    <h2><a name="movies">Movies</a></h2>
    <p>Several movies:</p>
    <ul>
        <li>Seven</li>
        <li>Disturbia</li>
        <li>Matrix</li>
        <li>Interception</li>
    </ul>

    <h2><a name="games">Games</a></h2>
    <h3><a name="half-life">Half-Life</a></h3>
    <div class="media">
        <div class="media-left col-md-3">
            <a class="thumbnail">
                <img class="media-object" src="img/half-life.jpg"/>
            </a>
        </div>
        <div class="media-body text-justify">
            Что уж тут говорить, сложно даже представить более совершенный
            шутер от первого лица. Признайтесь, вы ведь тоже ждете третий эпизод!
        </div>
    </div>
    <h3><a name="battlefield">Battlefield</a></h3>
    <p>
        <div class="media">
            <div class="media-left col-md-3">
                <a class="thumbnail">
                    <img class="media-object" src="img/bf-bc2.png"/>
                </a>
                <a class="thumbnail">
                    <img class="media-object" src="img/bf-bc2-1.jpg"/>
                </a>
            </div>
            <div class="media-body text-justify">
                Что бы там не говорили школьники и прочий неадекватный народ, это
                лучшая игра из серии. Не в одной из последующих не было столь же
                отточеной боевой механики, столь же сбалансированой системы классов
                и идеального равновесия между техникой и обычной пехотой. Оказавшись
                на поле боя ни на минуту не сомневаешься в реальности происходящего.
                Только дым, грохот и разрушение!
            </div>
        </div>
    </p>
@endsection
