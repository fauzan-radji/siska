<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Landing Page</title>
</head>
<body>
  @auth
  <h1>Anda sudah login</h1>
  @else
  <form action="/login" method="post">
    @csrf
    <input type="text" name="username">
    <input type="password" name="password">
    <button type="submit">Login</button>
  </form>
  @endauth
</body>
</html>
