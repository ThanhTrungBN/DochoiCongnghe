<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập-HYPER</title>
    <link rel="stylesheet" href="{{asset('/css/dangnhap.css')}}">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap');
 * {box-sizing: border-box}
 
</style>
<body>
  <form action="{{route('kiemtradangnhap')}}" id="loginForm"> <!-- Thêm id cho form -->
    <div class="container">
        <h1>Đăng Nhập</h1>
        <hr>
        <label for="email"><b>Tên Tài Khoản</b></label>
        <input type="text" placeholder="Nhập tên tài khoản" name="user" required>
        <label for="psw"><b>Mật Khẩu</b></label>
        <input type="password" placeholder="Nhập Mật Khẩu" name="pass" required>
        <label>
            <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Nhớ Đăng Nhập
        </label>
        <div class="clearfix">
            <button type="button" class="signupbtn" id="loginButton">Đăng kí</button> <!-- Thêm id cho nút Đăng Nhập -->
            <button type="submit" class="signupbtn">Đăng Nhập</button>
        </div>
    </div>
</form>
      <link rel="stylesheet" href="/js/dangnhap.js">
</body>
</html>