<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
  </head>
  <body>
    <div id="login_form">
      <div id="login_form_header">
        <img src="{{ asset('imgs/logo.png') }}" alt="logo">
      </div>
      <form id="login_form_contents" method="POST" action= "{{route("admin.auth")}}">
        @csrf
        <label for="login_id">ID:</label>
        <input type="text" id="id_input" name="userId">
        <label for="pass">パスワード:</label>
        <input type="password" id="password_input" name="password">
        <button id="login_button">ログイン</button>
        @if ($errors->has('error'))
            <p id="login_error">{{ $errors->first('error') }}</p>
        @endif
      </form>
      <div id="login_form_footer">
        <a href="/login">Quên Mật Khẩu</a>
      </div>
    </div>

  </body>

</html>
