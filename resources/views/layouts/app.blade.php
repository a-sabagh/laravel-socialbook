<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{env('DIRECTION')}}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="icon" href="{{ asset('favicon.jpg') }}" />
      <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
      <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
      <link rel="stylesheet" href="{{ asset('css/main.css') }}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
      <title>{{__('general.title')}} - @yield('title')</title>
   </head>
      @php
          $currentRoute = (isset($currentRoute)? $currentRoute : 'socialbook')
      @endphp       
   <body class="page-{{str_replace('.','-',$currentRoute)}}">
      <header id="header">
         <div class="top-bar">
            <div class="top-bar-text">
               @guest
               <p>{{__("general.welcome")}}</p>
               @else
               <p>{{ Auth::user()->name }}</p>
               @endguest
               
            </div>
            <ul class="top-bar-auth">
               @guest
               <li class="account-login"><a href="{{ route('login') }}"><i class="fa fa-sign-in"></i>{{__('auth.login')}}</a></li>
               <li class="account-sign-up"><a href="{{ route('register') }}"><i class="fa fa-user-circle-o"></i>{{__('auth.register')}}</a></li>
               @else
               <li class="my-account"><a href="#"><i class="fa fa fa-user-circle-o"></i>{{__('auth.my-account')}}</a></li>
               <li class="logout"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i>{{__('auth.logout')}}</a></li>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf </form>
               @endguest
            </ul>
         </div>
         <!--.top-bar-->
         <h1 class="text-center bloginfo">{{__('general.bloginfo')}}</h1>
         <nav id="main">
            <ul id="main-menu">
               <li class="{{($currentRoute == 'home')? 'active' : ''}} menu-item-home"><a href="{{ route('home') }}">{{__('menus.home')}}</a></li>
               <li class="{{($currentRoute == 'Book.index')? 'active' : ''}} menu-item-home"><a href="{{ route('Book.index') }}">{{__('menus.books')}}</a></li>
            </ul>
         </nav>
      </header>
      <main class="container">
         <div class="main-content">
            @yield('content')
         </div>
      </main>
      <footer class="footer-bottom">
         <p>{{__('general.copyright')}}</p>
      </footer>
      <script>
         @yield('script')
      </script>
   </body>
</html>

