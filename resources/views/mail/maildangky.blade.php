<html>
<head>
    <title>Hệ thống CSDL</title>
</head>
<body>
<p>Xin chào !</p>
<p>Bạn đã đăng ký thành công tài khoản</p>
<p>ID: {{$model_user->email}}</p>
<p>Mật khẩu: *******</p>
<p>Vui lòng truy cập vào đường dẫn dưới đây để kích hoạt</p>
<p><a href="{{url('/kichhoat?email='.$model_user->email)}}">Kích hoạt tài khoản</a></p>
<p>Cảm ơn bạn đã đăng ký.</p>
<p>Trân trọng.</p>
{{-- <p>Ghi chú: Thông báo này được gửi tự động từ hệ thống tiếp nhận thông tin của chương trình CSDL ./.</p>
<p>File đính kèm:</p> --}}
</body>
</html>