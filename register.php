<!DOCTYPE html>
<html>
<head>
	<title>Đăng ký</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
</head>
<body>
	<div class="card bg-light">
		<article class="card-body mx-auto" style="max-width: 400px;">
			<form action="xulydangky.php" method="POST">
			<div class="form-group input-group">
				<div class="input-group-prepend">
				    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
				 </div>
		        <input name="fullname" class="form-control" placeholder="Họ và tên" type="text" required="required">
		    </div> <!-- form-group// -->
		    <div class="form-group input-group">
		    	<div class="input-group-prepend">
				    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
				 </div>
		        <input name="email" class="form-control" placeholder="Email" type="email" required="required">
		    </div> <!-- form-group// -->
		    <div class="form-group input-group">
		    	<div class="input-group-prepend">
				    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
				</div>
		    	<input name="phone" class="form-control" placeholder="Số điện thoại" type="text" required="required">
		    </div> <!-- form-group// -->
		    <div class="form-group input-group">
		    	<div class="input-group-prepend">
				    <span class="input-group-text"> <i class="fa fa-building"></i> </span>
				</div>
				<input name="address" class="form-control" placeholder="Địa Chỉ" type="text" required="required">
			</div> <!-- form-group end.// -->
			<div class="form-group input-group">
				<div class="input-group-prepend">
				    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
				 </div>
		        <input name="username" class="form-control" placeholder="Tên đăng nhập" type="text" required="required">
		    </div>
		    <div class="form-group input-group">
		    	<div class="input-group-prepend">
				    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
				</div>
		        <input name="password" class="form-control" placeholder="Mật khẩu" type="password" required="required">
		    </div> <!-- form-group// -->                                     
		    <div class="form-group">
		        <button type="submit" class="btn btn-primary btn-block"> Tạo tài khoản  </button>
		    </div> <!-- form-group// -->      
		    <p class="text-center">Bạn đã có tài khoản? <a href="login.php">Đăng nhập</a> </p>                                                                 
		</form>
		</article>
	</div>
</body>
</html>