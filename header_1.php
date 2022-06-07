<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="row" style="background-color: #fed014;" >
		<div class="col-sm-2 col-md-3" style="text-align: center; margin-top: 10px;">
			<?php echo '<a href="index.php" title="">Trang chủ</a>'; ?>
		</div>
		<div class="col-sm-7 col-md-5" style="text-align: center; margin-top: 10px;">
			<form action="search.php" method="get" accept-charset="utf-8">
				<input type="search" name="search" value="" placeholder="">
				<input type="submit" name="" value="Tìm">
			</form>
		</div>
		<div class="col-sm-3 col-md-4" style="text-align: center; margin-top: 20px;">
			<?php 
			if (isset($_SESSION['Position'])&&$_SESSION['Position']!=null && $_SESSION['Position']=="user") {
									
					echo '<a href="cart.php" >Giỏ hàng</a> &nbsp;';
					echo '<a href="order.php" >Đơn hàng</a> &nbsp;';
					echo '<a href="logout.php" title="">Đăng xuất</a> &nbsp;'; 	
				}
				else {
					echo '<a href="login.php" title="">Đăng Nhập</a> &nbsp;';
					echo '<a href="register.php" > Đăng ký</a>';
				}
			?>
		</div>
	</div>
</body>
</html>