<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="panel ">
		<div class="panel-heading ">
			<?php 
				$conn = mysqli_connect('localhost','root','','htbook');
				mysqli_set_charset($conn, 'UTF8');
				$query = "select * from typebook";
				$kqua = mysqli_query($conn,$query);
				echo '<ul class="list-group">';
				echo '<li class="list-group-item active">DANH MỤC SẢN PHẨM </li>';
				while ($data = mysqli_fetch_array($kqua)) {
					$typeid = $data['TypeID'];
				    echo '<li class="list-group-item"><a href="viewbook_admin.php?typeid='.$typeid.'" title="">'.$data["TypeName"].'</a></li>';
				}
				echo '</ul>';
			 ?> 
		</div>
	</div>
</body>
</html>
