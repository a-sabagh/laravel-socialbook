<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{env('DIRECTION')}}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="icon" href="{{ asset('favicon.jpg') }}" />
      <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
      <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
      <link rel="stylesheet" href="{{ asset('css/main.css') }}">
      <title>{{__('general.title')}} - @yield('title')</title>
   </head>
   <body class="page-{{str_replace('.','-',$currentRoute)}}">
      <header id="header">
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

