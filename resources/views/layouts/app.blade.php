<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{env('LOG_CHANNEL')}}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="icon" href="{{ asset('favicon.jpg') }}" />
      <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
      <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
      <link rel="stylesheet" href="{{ asset('css/main.css') }}">
      <title>{{__('general.title')}} - @yield('title')</title>
   </head>
   <body class="page-{{$current_route}}">
      <header id="header">
         <h1 class="text-center bloginfo">{{__('general.bloginfo')}}</h1>
         <nav id="main">
            <ul id="main-menu">
               <li class="{{($current_route == 'home')? 'active' : ''}} menu-item-home"><a href="#">{{__('menus.home')}}</a></li>
            </ul>
         </nav>
      </header>
      <main class="container">
         <div class="row">
            <div class="col-md-12 main-content">
               @yield('content')
            </div>
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

