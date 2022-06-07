<?php session_start(); 
	if (empty($_SESSION['Position'])||$_SESSION['Position']=='user') {
		header("Location: login.php");
	}
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
    <style type="text/css">
	.panel-body
    {
    	width: 100%;
        display: flex;
        justify-content: center;
    }
    .from
    {
        display: flex;
        justify-content: center;
        width:100%;
    }
    .ip{
    	float: right;
    	width: 170px;
    }
	</style>
</head>
<body>
		  <div class="">
		  		<div class="row" >
				<div class="col-md-12" >
					<div class="" >
						<?php include ('header.php'); ?>
					</div>
				</div>
			</div>
	  		<div class="row">
	  			<div class="col-md-2" >
	  			 </div>
	  			<div class="col-md-10">
	  				<div class="panel group">
	  					<div class="panel panel-primary">
	  						<?php 
	  						$idd =$_GET['invoiceid'];
	  						$con= mysqli_connect("localhost","root","","htbook");
							mysqli_set_charset($con, 'UTF8');
							$sql="SELECT * FROM `invoice` where InvoiceID=".$idd;
							$kq = mysqli_query($con,$sql);
							while ($data = mysqli_fetch_array($kq)) {
							    $status = $data['Status'];
							}
							?>
	  						<div class="panel-heading" style="background: #fed014; color: black; height: 50px; width: 90%; ">Trạng thái<span style="float: right;"><a style="color: black; margin: 10px;" href="order_admin.php">Quay lại</a></span></div>  
	  						<div class="panel-body">	
	  							<form class="form" method="POST" <?php echo 'action="edit_status.php?invoiceid='.$idd.'"'; ?> >
							        <br>
							        <div>
							            Trạng thái&nbsp;&nbsp;&nbsp;
							            <select name="status" >
							            	<option value="Đã thanh toán">Đã thanh toán</option>
							            	<option value="Đang chờ thanh toán">Đang chờ thanh toán</option>
							            	<option value="Đã huỷ">Đã huỷ</option>
							            </select>
							        </div>
							        <br>
							        <button class="btn btn-primary btn-block" type="submit" name="edit">OK</button>
							    </form>
	  						</div>
	  					</div>
	  				</div>
	  			</div>
	  		</div>
  		</div>
  <?php
	if (isset($_POST["edit"])) 
	{
		$status = $_POST["status"];
		$sql1 = "UPDATE `invoice` SET `Status`='".$status."' WHERE InvoiceID=".$idd;
		$con= mysqli_connect("localhost","root","","htbook");
		mysqli_set_charset($con, 'UTF8');
		$query = mysqli_query($con,$sql1);
		if ($query) {
			header("location: order_admin.php");
		} else {
			echo "<script>alert('Sửa thất bại')</script>";
			echo $sql1;
		}
	}
?>
</body>
</html>