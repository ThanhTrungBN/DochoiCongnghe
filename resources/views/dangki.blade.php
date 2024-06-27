<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Kí-HYPER</title>
    <link rel="stylesheet" href="{{asset('/css/dangki.css')}}">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap');
 * {box-sizing: border-box}
</style>
<body>
  <form action="{{route('dangki')}}" method="POST" id="registrationForm"> 
  @csrf
    <div class="container">
        <h1>Đăng Ký</h1>
        <hr>
        <label for="psw"><b>Tài Khoản</b></label>
        <input type="text" placeholder="Nhập Tài Khoản" name="user" required>
        <label for="psw"><b>Mật Khẩu</b></label>
        <input type="password" placeholder="Nhập Mật Khẩu" name="pass" required>
        <label for="psw-repeat"><b>Nhập Lại Mật Khẩu</b></label>
        <input type="password" placeholder="Nhập Lại Mật Khẩu" name="pass-repeat" required>
        <div class="clearfix">
            <button  type="submit" class="signupbtn" id="registerButton">Đăng Kí</button>
        </div>
    </div>
</form>

<script src="/js/dangki.js"></script>
</body>
</html>