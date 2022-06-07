<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<title></title>
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
	<div class="content">
		<div class="row" >
				<div class="col-md-12" >
					<div class="" >
						<?php include ('header.php'); ?>
					</div>
				</div>
			</div>
	  	<div class="">
	  		<div class="row">
	  			<div class="col-md-2" >
			        <?php include('menu.php'); ?>
			    </div>
	  			<div class="col-md-10">
	  				<div class="panel group">
	  					<div class="panel panel-primary">
	  						<div class="panel-heading" style="background: #fed014; color: black;">Thể Loại<span style="float: right;"><a style="color: black;" href="admin.php">Quay lại</a></span></div>  
	  						<div class="panel-body">	
	  							<form class="form" method="POST" action="addtypebook.php">
							        <br>
							        <div>
							            Thể loại&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="ip" type="text" name="typename" required="">
							        </div>
							        <br>
							        <div>
							            ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="ip"  type="text" name="typeid" required="">
							        </div>
							        <br>
							        <button class="btn btn-primary btn-block" type="submit" name="add">Thêm</button>
							    </form>
	  						</div>
	  					</div>
	  				</div>
	  			</div>
	  		</div>
  		</div>
  	</div>
  	<script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<?php
	if (isset($_POST["add"])) 
	{
		$typename = $_POST["typename"];
		$typeid = $_POST["typeid"];
		$sql = "INSERT INTO `typebook`(`TypeID`, `TypeName`) VALUES  (".$typeid.",'".$typename."')";
		$con= mysqli_connect("localhost","root","","htbook");
		mysqli_set_charset($con, 'UTF8');
		$query = mysqli_query($con,$sql);
		if ($query) {
			echo "<script>alert('Thêm thành công')</script>";
			header("location: admin.php");
		} else {
			echo "<script>alert('thêm thất bại')</script>";
			echo $sql;
		}
	}
?>

</body>
</html>