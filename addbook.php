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
    <script src="ckeditor/ckeditor.js"></script>
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
	  						<div class="panel-heading" style="background: #fed014; color: black;">THÊM SẢN PHẨM<span style="float: right;"><a style="color: black;" href="admin.php">Quay lại</a></span></div>  
	  						<div class="panel-body">	
	  							<form class="form" method="POST" action="addbook.php" enctype="multipart/form-data">
							        <div>
							        	Ảnh &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="file" value="" name="image" class="ip" required="">
							        </div>
							        <br>
							        <div>
							            Tên Sản Phẩm&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="ip" type="text" name="name" required="">
							        </div>
							        <br>
							        <div>
							            Số Lượng&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="ip"  type="text" name="qty" required="">
							        </div>
							        <br>
							        <div>
							           Giá <input  class="ip"  type="text" name="price" required="">
							        </div>
							        <br>
							        <div>
							           Tác Giả<input class="ip" type="text" name="author" required="">
							        </div>
							        <br>
							        <div>
							           Mô tả <textarea name="description" style="width: 200px; height:100px;"></textarea>
							        </div>
							        <br>
							        <div>
							        	Thể Loại&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							        	<select name="typeid">
							        		<?php 
												$con= mysqli_connect("localhost","root","","htbook");
												mysqli_set_charset($con, 'UTF8');
							        			$sql2 = "SELECT * FROM typebook";
							        			$kq = mysqli_query($con,$sql2);
							        			while ($row2 = mysqli_fetch_array($kq)) {
							        				echo "<option value= ".$row2["TypeID"].">".$row2["TypeName"]."</option>";
							        			}

							        		?>
							        	</select>
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
    <script> 
		config = {};
		config.entities_latin = false;
	    CKEDITOR.replace('description',config);
	</script>
<?php
	if (isset($_POST["add"])) 
		
		$name = $_POST["name"];
	{	
		if (isset($_FILES['image'])) {
            if ($_FILES['image']['error'] > 0){
                echo 'File Upload Bị Lỗi';
            }
            else{
                $img_type =pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
                move_uploaded_file($_FILES['image']['tmp_name'], 'img_upload/'.$name.'.jpg');
            }
        }
        else{
            echo 'Bạn chưa chọn file upload';
        }
		$price = $_POST["price"];
		$qty = $_POST["qty"];
		$description = $_POST['description'];
		$author = $_POST["author"];
		$typeid = $_POST["typeid"];
		$sql = "INSERT INTO `books`(`Name`, `Author`,`Description`, `Price`, `Quantity`, `TypeID`) VALUES ('".$name."','".$author."','".$description."','".$price."','".$qty."',".$typeid.")";
		$con= mysqli_connect("localhost","root","","htbook");
		mysqli_set_charset($con, 'UTF8');
		$query = mysqli_query($con,$sql);
		if ($query) {
			echo "<script>alert('Thêm thành công')</script>";
			// header("location: admin.php");
		} else {
			echo "<script>alert('thêm thất bại')</script>";
			echo $sql;
		}
	}
?>

</body>
</html>