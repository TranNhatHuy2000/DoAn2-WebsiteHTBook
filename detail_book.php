<?php session_start();
	if (empty($_SESSION['Position'])||$_SESSION['Position']=='admin') {
		header("Location: login.php");
	}
	$con= mysqli_connect('localhost','root','','htbook')
	or die("Không thể kết nối với cơ sở dữ liệu");
	mysqli_set_charset($con, 'UTF8');
	$sql="SELECT * FROM `books` WHERE BookID =".$_GET['bookid'];
	$kq = mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html>
    <head>
	<meta charset="utf-8">
	<title>Thông tin chi tiết</title>
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
						<?php include ('header_1.php'); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="">
			<div class="row">
			    <div class="col-md-2">
			    	<?php include('menu_1.php') ?>
			    </div>
			    <div class="col-md-10">
			    	<div class="table table-bored">
			    		<table>
                            <tr>
	                            <td>BookID</td>
				    			<td>Tên sách</td>
				    			<td>Ảnh</td>
				    			<td>Tác Giả</td>
				    			<td>Giá</td>
				    			<td>Loại Sách</td>
				    			<td>Số Lượng</td>
                            </tr>
                            <tr>
                            	<?php 
                            		while ($row = mysqli_fetch_array($kq)) {
                            			$description = $row['Description'];
                            			echo '<tr>';
									    echo '<td>'.$row["BookID"].'</td>';
									    echo '<td>'.$row["Name"].'</td>';
									    echo '<td><img src="img/'.$row["img"].'" alt=""></td>';
									    echo '<td>'.$row["Author"].'</td>';
									    echo '<td>'.$row["Price"].'</td>';
									    echo '<td>'.$row["TypeID"].'</td>';
									    echo '<td>'.$row["Quantity"].'</td>';
									    echo '<td><a href="addcart.php?id='.$row["BookID"].'" title=""><button type="button" class="btn btn-primary">Mua</button></a></td>';
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
				<div class="col-md-6">
					<p>GIỚI THIỆU SÁCH</p>
			    		<?php echo '<p>'.$description.'</p>';?>
			    </div>
			</div>
		</div>
</body>
</html>


