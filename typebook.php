<?php session_start();
	if (empty($_SESSION['Position'])) {
		header("Location: login.php");
	}
	$con= mysqli_connect('localhost','root','','htbook')
	or die("Không thể kết nối với cơ sở dữ liệu");
	mysqli_set_charset($con, 'UTF8');
	$sql="select * from typebook ";
	$kq = mysqli_query($con,$sql);
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
			<div class="row">
			    <div class="col-md-2">
			    	<?php include('menu.php'); ?>
			    </div>
			    <div class="col-md-3">
			    </div>
			    <div class="col-md-7">
			    	<div class="table table-bored">
			    		<table>
                            <tr>
	                            <td>Thể loại</td>
				    			<td>ID</td>
                            </tr>
                            <tr>
                            	<?php 
                            		while ($row = mysqli_fetch_array($kq)) {
                            			echo '<tr>';
									    echo '<td>'.$row["TypeName"].'</td>';
									    echo '<td>'.$row["TypeID"].'</td>';
									    echo '<td><a href="edit_typebook.php?id='.$row["TypeID"].'" title=""><button type="button" class="btn btn-primary">Sửa</button></a></td>';
									    echo '<td><a href="delete_typebook.php?typeid='.$row["TypeID"].'"  title=""><button type="button" class="btn btn-danger">Xóa</button></a></td>';
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


s