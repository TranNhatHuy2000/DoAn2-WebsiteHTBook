<?php
session_start();
if(isset($_POST['submit']))
{
	foreach($_POST['qty'] as $key=>$value)
	{
		if( ($value == 0) and (is_numeric($value)))
		{
			unset ($_SESSION['cart'][$key]);
		}
		else if(($value > 0) and (is_numeric($value)))
		{
			$_SESSION['cart'][$key]=$value;
		}
	}
	header("location:cart1.php");
}
?>
<html>
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, sNhrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<title>DANH SACH SAN PHAM DA MUA</title>
	</head>
	<body>
	<div class="container">
		<br>
		<h1 style="text-align: center;">DANH SÁCH SẢN PHẨM</h1>
		<br>
		<div class="row">
			<div class="col-lg-2 col-md-2"></div>
			<div class="col-lg-8 col-md-8" style="border:1px solid red;">
				<?php
				$tong = 0;
					include("connect.php");
					$ok=1;
					if(isset($_SESSION['cart']))
					{
						foreach($_SESSION['cart'] as $k => $v)
						{
							if(isset($k))
							{
								$ok=2;
							}
						}
					}
					if($ok == 2)
					{
						echo "<form action='cart1.php' method='post'>";
						foreach($_SESSION['cart'] as $key=>$value)
						{
							$item[]=$key;
						}
						$str=implode(",",$item);
						$sql="SELECT * FROM books where BookID in (".$str.")";
						$query=mysqli_query($con,$sql);
						while($row = mysqli_fetch_array($query))
						{
							echo "<h3 float: left;>".$row['Name']."</h3>";
							echo "Mô tả:".$row['Author']." - Gia: ".$row['Price']." VND<br />";
							echo "<p float: right;>So Luong: <input type='text'
							name='qty[".$row['BookID']."]' size='5' value='{$_SESSION['cart'][$row['BookID']]}'> - ";
							echo "<a href='xoagiohang.php?BookID=".$row['BookID']."'>Xóa sản phẩm</a></p>";
							echo "<p align='right'> Gia tien cho mon hang: ".$_SESSION['cart'][$row['BookID']]*$row['Price']." VND</p>";
							echo "</div>";
							$tong +=$_SESSION['cart'][$row['BookID']]*$row['Price'];
						}
						echo "<div class='pro' align='right'>";
						echo "<b>Tong tien cho cac mon hang: <font color='red'>".$tong." VND</font></b>";
						echo "</div>";
						echo "<input type='submit' name='submit' value='Cap Nhat Gio Hang'>";
						echo "<div class='pro' align='center'>";
						echo "<b><a href='trangchu.php'>Trở về trang chủ</a> - <a
						href='xoagiohang.php?BookID=0'>Xoa Bo Gio Hang</a></b>";
						echo "<br>";
						echo "<b><a href='thanhtoan.php'>THANH TOÁN</a></b>";
					}
					else
					{
						echo "<p align='center'>KHÔNG CÓ MÓN NÀO TRONG GIỎ HÀNG<br /><a
						href='trangchu.php'>Mua hàng ngay</a></p>";
					}
				?>
			</div>
			<div class="col-lg-2 col-md-2"></div>
		</div>
	</div>
	</body>
</html>