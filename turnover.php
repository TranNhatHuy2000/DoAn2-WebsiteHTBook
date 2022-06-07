<?php session_start();
?>
<!DOCTYPE html>
<html>
    <head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style type="text/css" media="screen">
    	img{
    		width: 120px;
    		height: 150px;
    	}
    </style>
</head>
<body>
		<div class="" style="padding-bottom: 50px;">
			<div class="row" >
				<div class="col-md-12" >
					<div class="" >
						<?php include ('header.php'); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="">
			<div class="row" style="margin-bottom: 20px;">
				<div class="col-md-2">
					
				</div>
				<div class="col-md-10">
					<form method="POST">
						Từ Ngày <input type="date" name="date-strt" value="">
						Đến <input type="date" name="date-end" value="">
						<input type="submit" name="ok" value="OK"> 
						<input type="submit" name="week" value="Tuần Này">
						<input type="submit" name="month" value="Tháng này">
					</form>
				</div>
			</div>
			<?php
				if(isset($_POST["ok"])||isset($_POST["week"])||isset($_POST["month"])){
					$start=$_POST["date-strt"];
					$end=$_POST["date-end"];
        			$conn=mysqli_connect("localhost","root","","htbook");
					if (isset($_POST["ok"])) {
					$sql="SELECT * FROM invoice WHERE Date  BETWEEN '".$start."' AND '".$end."'";
					}
					elseif (isset($_POST["week"])) {
						date_default_timezone_set('Asia/Ho_Chi_Minh');
						$week = date('W');
						$sql="SELECT * FROM `invoice` WHERE WEEKOFYEAR(Date) = ".$week;
					}
					elseif (isset($_POST["month"])) {
						date_default_timezone_set('Asia/Ho_Chi_Minh');
						$month = date('m');
						$sql="SELECT * FROM `invoice` WHERE Month(Date) = ".$month;
					}
					else {
						
					}
					mysqli_set_charset($conn,'UTF8');
					$kq=mysqli_query($conn,$sql);
			?>
			<div class="row">
			    <div class="col-md-2">
			    </div>
			    <div class="col-md-10">
			    	<div class="table table-bored">
			    		<table>
                            <tr>
                            	<td>ID Hoá Đơn</td>
	                            <td>ID người dùng</td>
				    			<td>Thời gian</td>
				    			<td>Tổng tiền</td>
				    			<td>Trạng thái</td>
                            </tr>
                            <tr>
                            	<?php 
  									$total=0;
  									$count=0;
                            		while ($row = mysqli_fetch_array($kq)) {
                            			$id = $row['UserID'];
                            		    echo '<tr>';
                            		    echo '<td><a href="detail_order_admin.php?invoiceid='.$row["InvoiceID"].'">'.$row["InvoiceID"].'</a></td>';
                            		    echo '<td>'.$row["UserID"].'</td>';
                            		    echo '<td>'.$row["Date"].'</td>';
                            		    echo '<td>'.$row["Total"].'</td>';
                            		    $total+=$row["Total"];
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
                            		    $count+=1;
                            		    echo '</tr>';
                            		}
                            	?>
                            </tr>
			    		</table>
			    	</div>
			    </div>
			</div>
			<div class="row">
				<div class="col-md-2">
					
				</div>

				<div class="col-md-10">
					<?php echo '<h4>Có tất cả: '.$count.' đơn hàng.</h4> <br>'; 
                          echo '<h4>Tổng doanh thu: '.$total.'</h4>';
					?>
				</div>
			</div>
			<?php }?>
		</div>
	</body>
</html>