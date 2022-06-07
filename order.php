<?php session_start();
	if (empty($_SESSION['Position'])||$_SESSION['Position']=='admin') {
		header("Location: login.php");
	}
	$con= mysqli_connect('localhost','root','','htbook');
	mysqli_set_charset($con, 'UTF8');
	$sql="select * from invoice where UserID=".$_SESSION['userid'];
	$kq = mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html>
    <head>
	<meta charset="utf-8">
	<title>Quản Lý Đơn Hàng</title>
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
	                            <td>ID Hoá Đơn</td>
				    			<td>Thời gian</td>
				    			<td>Tổng cộng</td>
				    			<td>Trạng thái</td>
				    		</tr>
                            <tr>
                            	<?php 
                            		while ($row = mysqli_fetch_array($kq)) {
                            			$id = $row['UserID'];
                            		    echo '<tr>';
                            		    echo '<td><a href="detail_order.php?invoiceid='.$row["InvoiceID"].'">'.$row["InvoiceID"].'</a></td>';
                            		    echo '<td>'.$row["Date"].'</td>';
                            		    echo '<td>'.$row["Total"].'</td>';
                            		    if ($row["Status"]=="Đã thanh toán") {
                            		    	$color = "#0abd11";
                            		    }
                            		    elseif($row["Status"]=="Đang chờ thanh toán") {
                            		    	$color = "#ffc107";
                            		    }
                            		    else {
                            		    	$color = "red";
                            		    }
                            		    echo '<td style="color: '.$color.';">'.$row["Status"].'</td>';
                            		    echo '</tr>';
                            		}
                            	?>
                            </tr>
			    		</table>
			    	</div>
			    </div>
			</div>
		</div>
</body>
</html>


