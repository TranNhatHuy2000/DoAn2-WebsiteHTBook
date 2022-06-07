<?php session_start();
	if (empty($_SESSION['Position'])||$_SESSION['Position']=='user') {
		header("Location: login.php");
	}
	$con= mysqli_connect('localhost','root','','htbook');
	mysqli_set_charset($con, 'UTF8');
	$sql="select * from user ";
	$kq = mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html>
    <head>
	<meta charset="utf-8">
	<title>Quản Lý Người Dùng</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
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
			    <div class="col-md-1">
			    </div>
			    <div class="col-md-11">
			    	<div class="table table-bored">
			    		<table>
                            <tr>
	                            <td>ID</td>
				    			<td>Họ Và Tên</td>
				    			<td>Tên Đăng Nhập</td>
				    			<td>Mật Khẩu</td>
				    			<td>Địa Chỉ</td>
				    			<td>Email</td>
				    			<td>Điện thoại</td>
                            </tr>
                            <tr>
                            	<?php 
                            		while ($row = mysqli_fetch_array($kq)) {
                            			$id = $row['UserID'];
                            		    echo '<tr>';
                            		    echo '<td>'.$row["UserID"].'</td>';
                            		    echo '<td>'.$row["Fullname"].'</td>';
                            		    echo '<td>'.$row["Username"].'</td>';
                            		    echo '<td>'.$row["Password"].'</td>';
                            		    echo '<td>'.$row["Address"].'</td>';
                            		    echo '<td>'.$row["Email"].'</td>';
                            		    echo '<td>'.$row["Phone"].'</td>';
                            		    echo '<td><a href="#" title=""><button type="button" class="btn btn-primary">Sửa</button></a></td>';
                            		    echo '<td><a href="delete_user.php?id='.$id.'"  title=""><button type="button" class="btn btn-danger">Xóa</button></a></td>';
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


