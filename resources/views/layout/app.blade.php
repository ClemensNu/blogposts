
<!doctype html>
<html lang="en">
  <head>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <!-- Bootstrap CSS -->
    <link rel="stylesheet"
          href="{{asset('/css/app.css')}}"> 
    <title>GIPE 2022 - @yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.6/tailwind.min.css">
  </head>
  <body>
    <x-header></x-header>
    @if(session('status'))
    <div class="alert-sucess">
      {{session('status')}}
    </div>
    @endif
   <div class="container"> 
    
  

      
   @yield('content')
   </div>
   <footer>
     <div class = "text-center">
       &copy; Global Intercultural Project Exprience 
    <script>
      document.write(new Date().getFullYear())
      </script>
</footer>
  
<script src="{{asset('/js/app.js')}}"> </script>
  </body>
</html>




