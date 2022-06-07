<?php session_start();
	if (empty($_SESSION['Position'])) {
		header("Location: login.php");
	}
	$con= mysqli_connect('localhost','root','','htbook');
	mysqli_set_charset($con, 'UTF8');
	$sql="select * from detailinvoice where InvoiceID=".$_GET['invoiceid'];
	$kq = mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html>
    <head>
	<meta charset="utf-8">
	<title>Chi Tiết Đơn Hàng</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
		<div class="" style="padding-bottom: 50px;">
			<div class="row" >
				<div class="col-md-12" >
					<div class="" >
						<?php include ('header_1.php'); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="">
			<div class="row">
			    <div class="col-md-4">
			    </div>
			    <div class="col-md-8">
			    	<div class="table table-bored">
			    		<table>
                           <tr>
                           	<td>Tên sách</td>
                           	<td>Ảnh</td>
                           	<td>Số lượng</td>
                           	<td>Giá tiền</td>
                           </tr>
                           <tr>
                            	<?php 
                            	$total =0;
                            		while ($row = mysqli_fetch_array($kq)) {
                            		    echo '<tr>';
                            		    echo '<td>'.$row['BookName'].'</td>';
									    echo '<td><img src="img_upload/'.$row["BookName"].'.jpg " width="100"></td>';
                            		    echo '<td>'.$row["Quantity"].'</td>';
                            		    echo '<td>'.$row["Total"].'</td>';
                            		    $total+=$row["Total"];
                            		    echo '</tr>';
                            		}
                            	?>
                            </tr>
                            <tr>
                            	<td></td>
                            	<td></td>
                            	<td>Tổng Cộng:</td>
                            	<td><b><?php echo $total; ?></b></td>
                            </tr>
			    		</table>
			    	</div>
			    </div>
			</div>
		</div>
</body>
</html>


