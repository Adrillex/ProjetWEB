<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">



    <title>BDE CESi</title>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">

    <!-- Scripts -->
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-fixed-top" style="background-color: #191E46;">
        <a class="navbar-brand" href="{{ url('home') }}">
            <img src={{ URL::to('/') }}/logo_bde.png alt="" style=" height: 260%; margin-top: -30%;">
        </a>
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->

                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Branding Image -->

                <a class="navbar-brand" href="{{ url('home') }}">
                    BDE CESi
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">

                <!-- Left Side Of Navbar -->
                @if (Auth::check() and Auth::user()->status == 2)
                    <ul class="nav navbar-nav">
                        <li class="dropdown" style="float:left; position: relative;">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">News
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{url('news')}}">Voir les News</a></li>
                                <li><a href="{{url('news/create')}}">Créer une News</a></li>
                            </ul>
                        </li>
                        <li class="dropdown" style="float:left; position: relative">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Activités
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{url('activities')}}">Voir les Activités</a></li>
                                <li><a href="{{url('activities/create')}}">Créer une Activité</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{url('products')}}" role="button" aria-expanded="false">Shop</a>
                        </li>
                        <li class="dropdown" style="float:left; position: relative">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Boîte à idées<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{url('suggestionBox')}}">Voir les idées</a></li>
                                <li><a href="{{url('suggestionBox/create')}}">Proposer une idée</a></li>
                                <li><a href="{{url('categories')}}">Voir les catégories</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{route('profile.index')}}">Voir tous les utilisateurs</a>
                        </li>
                    </ul>
                @elseif (Auth::check() and Auth::user()->status == 3)
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="{{url('news')}}"role="button" aria-expanded="false">News</a>
                        </li>
                        <li>
                            <a href="{{url('activities')}}" role="button" aria-expanded="false">Activités</a>
                        </li>
                        <li class="dropdown" style="float:left; position: relative">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Shop<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{url('products')}}">Voir le magasin</a></li>
                                <li><a href="{{url('products/create')}}">Ajouter un nouveau produit</a></li>
                                <li><a href="{{url('categoriesProduct')}}">Voir les catégories</a></li>
                            </ul>
                        </li>

                        <li class="dropdown" style="float:left; position: relative">
                            <a href="{{url('suggestionBox')}}"  role="button" aria-expanded="false">Boîte à idées</a>
                        </li>
                    </ul>
                @else
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="{{url('news')}}"role="button" aria-expanded="false">News</a>
                        </li>
                        <li>
                            <a href="{{url('activities')}}" role="button" aria-expanded="false">Activités</a>
                        </li>
                        <li>
                            <a href="{{url('products')}}" role="button" aria-expanded="false">Shop</a>
                        </li>
                        <li class="dropdown" style="float:left; position: relative">
                            <a href="{{url('suggestionBox')}}"  role="button" aria-expanded="false">Boîte à idées</a>
                        </li>
                    </ul>
            @endif
            <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">

                    <!-- Authentication Links -->

                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Se connecter</a></li>
                        <li><a href="{{ route('register') }}">S'enregistrer</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{route('profile.show', Auth::user()->id)}}">Voir le profil</a>
                                </li>
                                <li>
                                    <a href="{{url('buy')}}">Panier</a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Se déconnecter
                                    </a>



                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.12.0/moment-with-locales.min.js"></script>
<script src="https://cdn.jsdelivr.net/bootstrap.datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
@yield('script')
<footer>
    <div>
        <a href="{{url('legalNotice')}}" style="text-align: center">Mentions légales</a>
    </div>
</footer>
</body>
</html>