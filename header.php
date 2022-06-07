<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="row" style="background-color: #fed014; margin-bottom: 10px; height: 60px;" >
		<div class="col-sm-2 col-md-3" style="text-align: center; margin-top: 20px;">
			<?php echo '<a href="admin.php" title="">Trang chủ</a>'; ?>
		</div>
		<div class="col-sm-4 col-md-2" style="text-align: center; margin-top: 10px;">
			
		</div>
		<div class="col-sm-6 col-md-7" style="text-align: center; margin-top: 20px;">
			<?php 
				if (isset($_SESSION['Position'])&&$_SESSION['Position']!=null && $_SESSION['Position']=="admin") {
					echo '<a href="turnover.php" title="">Quản lý doanh thu</a>';
					echo '&nbsp;&nbsp;&nbsp;';
					echo '<a href="order_admin.php?invoiceid=0" title="">Quản lý đơn hàng</a>';
					echo '&nbsp;&nbsp;&nbsp;';
					echo '<a href="typebook.php" title="">Quản lý danh mục</a>';
					echo '&nbsp;&nbsp;&nbsp;';
					echo '<a href="user.php" title="">Quản lý người dùng</a>';
					echo '&nbsp;&nbsp;&nbsp;';
					echo '<a href="addbook.php" title="">Thêm sách</a>';
					echo '&nbsp;&nbsp;&nbsp;';
					echo '<a href="addtypebook.php" title="">Thêm loại sách</a>';
					echo '&nbsp;&nbsp;&nbsp;';
					echo '<a href="logout.php" title="">Đăng xuất</a>';
				}
				else {
					echo '<a href="login.php" title="">Đăng Nhập</a>';
				}
			?>
		</div>
	</div>
</body>
</html>