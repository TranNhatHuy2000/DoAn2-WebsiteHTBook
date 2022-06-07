<?php
	session_start(); 
	if (empty($_SESSION['Position'])||$_SESSION['Position']=='user') {
		header("Location: login.php");
	}
	$con= mysqli_connect("localhost","root","","htbook");
	mysqli_set_charset($con, 'UTF8');
	$sql="select * from books where BookID='".$_GET['id']."'";
	$kq = mysqli_query($con,$sql);
	  while ($data = mysqli_fetch_array($kq)) {
	    $name = $data["Name"];
		$author = $data["Author"];
		$price = $data["Price"];
		$description = $data['Description'];
		$typeid = $data["TypeID"];
		$qty = $data["Quantity"];
		}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div>
		<?php include('header.php') ?>
	</div>
	<div class="container" style="margin-left: 500px; margin-top: 50px;">
		<form <?php echo 'action=xulysua.php?id='.$_GET['id']; ?> method="POST">
	 		<div class="form-group row">
			 	<label class="col-sm-2 col-form-label">Tên Sách</label>
			 	<div class="col-sm-10">
			  		<input type="text" <?php echo 'value="'.$name.'"'; ?> name="name" required="required">
		   		</div>
	  		</div>
	  		<div class="form-group row">
			 	<label  class="col-sm-2 col-form-label">Tác Giả</label>
			 	<div class="col-sm-10">
			  		<input type="text" <?php echo 'value="'.$author.'"'; ?> name="author" required="required">
		   		</div>
	  		</div>
	  		<div class="form-group row">
			 	<label  class="col-sm-2 col-form-label">Mô tả</label>
			 	<div class="col-sm-8" >
			  		<textarea name="description" rows="5" cols="50"><?php echo $description; ?></textarea>
		   		</div>
	  		</div>
	  		<div class="form-group row">
			 	<label  class="col-sm-2 col-form-label">Giá sách</label>
			 	<div class="col-sm-10">
			  		<input type="text" <?php echo 'value="'.$price.'"'; ?> name="price" required="required">
		   		</div>
	  		</div>
	  		<div class="form-group row">
			 	<label  class="col-sm-2 col-form-label">Thể Loại</label>
			 	<div class="col-sm-10">
			  		<input type="text"  name="typeid"  <?php echo 'value="'.$typeid.'"'; ?> required="required">
		   		</div>
	  		</div>
	  		<div class="form-group row">
	  			<label  class="col-sm-2 col-form-label">Số Lượng</label>
			 	<div class="col-sm-10">
			  		<input type="text"  name="qty"  <?php echo 'value="'.$qty.'"'; ?> required="required">
		   		</div>
			 	<div class="col-sm-10">
			  		<input type="submit" name="" value="OK">
		   		</div>
	  		</div>
		</form>
	</div>
	<script>
		config = {};
		config.entities_latin = false;
		CKEDITOR.replace('description',config);
	</script>
</body>
</html>
