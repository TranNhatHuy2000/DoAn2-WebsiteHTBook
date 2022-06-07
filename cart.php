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
		header("location:cart.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Giỏ hàng</title>
</head>
<body>
	<div>
	<?php include('header_1.php') ?>		
	</div>
	<?php 
			$check = 1;
			if(isset($_SESSION['cart'])){
			foreach($_SESSION['cart'] as $key => $value){
			if(isset($key)){
			$check=2;
			}
		}
	}

	if ($check==2) {
		echo '<div class="container">
		<form action="cart.php" method="POST" accept-charset="utf-8">
 		<table id="cart" class="table table-hover table-condensed"> 
		  	<tr> 
		  		<th></th>
			    <th >Tên sản phẩm</th> 
			    <th >Giá</th> 
			    <th style="width:8%;">Số lượng</th> 
			    <th  class="text-center">Thành tiền</th> 
		  	</tr>  ';
		  		foreach($_SESSION['cart'] as $key=>$value)
					{
					$item[]=$key;
					}
					$str=implode(",",$item);
					$con= mysqli_connect('localhost','root','','htbook');
					mysqli_set_charset($con, 'UTF8');
					$sql="select * from books where BookID in (".$str.")";
					$data=mysqli_query($con,$sql);
					$total =0;
					while($row=mysqli_fetch_array($data))
					{
						echo '<tr style="height: 150px;">';
						echo '<td><img src="img_upload/'.$row["Name"].'.jpg" width="100"></td>';
						echo '<td><h4>'.$row['Name'].'</h4></td>';
						echo '<td>'.$row['Price'].'</td>';
						echo '<td><input class="form-control text-center" name="qty['.$row['BookID'].']" value="'.$_SESSION['cart'][$row['BookID']].'" type="number"></td>';
						echo '<td style = "text-align: center;">'.$row['Price']*$_SESSION['cart'][$row['BookID']].'</td>';
						$total +=$row['Price']*$_SESSION['cart'][$row['BookID']];
						echo '<td class="actions">';
						echo '<a href="delete_cart.php?bookid='.$row['BookID'].'" <button class="btn btn-danger btn-sm">Xóa</button></a>';
						echo '</td> </tr>';
					}
					   echo '<tr> 
						    <td><a href="index.php" class="btn btn-warning"> Tiếp tục mua hàng</a></td> 
						    <td></td>
						    <td></td>
						    <td></td>
						    <td class="hidden-xs text-center"><strong>Tổng tiền:'.$total.'</strong></td> 
						    <td><a href="delete_cart.php?bookid=0" <button class="btn btn-danger btn-sm">Xóa giỏ hàng</button></a></td>
						    <td><button type="submit" name="invoice" class="btn btn-success btn-block" >Thanh Toán</button></td> 
						    </tr> 
							</table>
							<input type="submit" name="submit" value="Cap Nhat Gio Hang">
							</div>';
	}
	else {
		echo '
		<div class="row" style="margin-top: 50px;">
		<div class="col-md-5">
			
		</div>
		<div class="col-md-7">
			<img src="img/mascot-tiki.png" >
			<p>Giỏ hàng trống!</p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-5">
			
		</div>
		<div class="col-md-7">
			<a href="index.php" class="btn btn-warning"> Mua hàng</a>
		</div>
	</div>
	';
	}
	?>

	<?php
	$con= mysqli_connect('localhost','root','','htbook')
	or die("Không thể kết nối với cơ sở dữ liệu");
	mysqli_set_charset($con, 'UTF8');
	if (isset($_POST['invoice'])) {
		if(isset($_SESSION['Position'])){
		$sqlmax = "SELECT MAX(InvoiceID) max FROM Invoice";
		$query=mysqli_query($con,$sqlmax);
		while($row = mysqli_fetch_array($query))
		{
			if (!isset($row['max'])) {
				$idinvoice =1;
			}
			else
			{
				$idinvoice= $row['max']+1;
			}
		}
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$date = date('Y-m-d  H:i:s');
		$userid = $_SESSION['userid'];
		$sql1 = "INSERT INTO `invoice`(InvoiceID,`UserID`, `Date`,Total, Status) VALUES (".$idinvoice.",'".$userid."','".$date."','".$total."','Đã thanh toán')"; 
		$query1=mysqli_query($con,$sql1);
		$sql3="select * from books where BookID in (".$str.")";
		echo $sql3;
		$query3=mysqli_query($con,$sql3);
		while($row3 = mysqli_fetch_array($query3))
		{
			$sql4 = "INSERT INTO `detailinvoice` (InvoiceID, `BookID`, `BookName`, `Quantity`, `Total`) VALUES (".$idinvoice.",".$row3['BookID'].",'".$row3['Name']."',".$_SESSION['cart'][$row3['BookID']].",".$row3['Price']*$_SESSION['cart'][$row3['BookID']].")";
			$query4 = mysqli_query($con,$sql4);
		$sqll = "UPDATE `books` SET `Quantity` = Quantity-".$_SESSION['cart'][$row3['BookID']]." WHERE `books`.`BookID` =".$row3['BookID'];
		$queryy = mysqli_query($con,$sqll);
		}
		
		header("Location:delete_cart.php?bookid=0");
	}
	else
	{
		header("location: login.php");
	}
	}
?>

</body>
</html>