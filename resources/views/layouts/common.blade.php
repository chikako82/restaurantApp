
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<script src="{{ asset('js/app.js') }}" defer></script>
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<nav class="top-nav">
  <ul>
    <li class="title"><a href="{{ url('/') }}">HOME</a></li>
  </ul>
  <ul>
    <li><a href="{{ url('access') }}">アクセス</a></li>
    <li><a href="{{ url('contact') }}">お問い合わせ</a></li>
  </ul>
</nav>
<div class="top-picture">
  <div class="opacity">
    <div class="top-text">
      <h1>Chika's Restaurant</h1>
      <h5><span class="text-danger">Welcome</span> to Chika's Restaurant!</h5>
    </div>
  </div>
</div>
<div class="blanc"></div>
@yield('content')
</body>
</html>