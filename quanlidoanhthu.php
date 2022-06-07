x`<!DOCTYPE html>
<html>
<head>
	<title>ADMIN</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<?php include('conncet.php') ?>
<div class="content">
	  	<div class="container">
	  		<div class="row">
	  			<div class="col-lg-12 col-sm-12" >
	  				<div class="panel group">
	  					<div class="panel panel-primary">
	  						<?php  include("menu.php") ?>
	  						
	  						<h2>QUẢN LÍ DOANH THU</h2>
	  						<div class="panel-body">
	  							<form method="POST" action="">
	  						<table>
	  							<tr>
	  								<td>Từ ngày: </td>
	  								<td>
	  									<div class="form-group">
	  										<input type="date" class="form-control" name="ngaydau">
	  									</div>
	  								</td>
	  								<td>Đến ngày: </td>
	  								<td>
	  									<div class="form-group">
	  										<input type="date" class="form-control" name="ngaycuoi">
	  									</div>
	  								</td>
	  								<td>
	  									<button class="btn btn-success" type="submit" name="ok" style="margin-left: 15px;margin-top:-20px;"> Kiểm tra</button>
	  								</td>
	  							</tr>		
	  						</table>
	  						</form>
	  						</div>
	  						<?php
	  							if(isset($_POST["ok"])){
	  								$ngaydau=$_POST["ngaydau"];
	  								$ngaycuoi=$_POST["ngaycuoi"];
	  						?>
	  						<div class="show">
	  							<table class="table">
	  								<thead class="thead-dark">
	  									<tr>
	  										<td>STT</td>
	  										<td>SẢN PHẤM ĐÃ BÁN</td>
	  										<td>SỐ LƯỢNG</td>
	  										<td>GIÁ TIỀN</td>
	  									</tr>
	  								</thead>
	  								<tbody>
	  									<?php
	  									$conn=mysqli_connect("localhost","root","","banhang");
	  									$sql="SELECT * FROM chitiethd WHERE Ngay BETWEEN '$ngaydau' AND '$ngaycuoi'";
	  									$query=mysqli_query($conn,$sql);
	  									$stt=0;
	  									$total=0;
	  									$sl=0;
	  									while($dong= mysqli_fetch_array($query)){
	  										$sql1="SELECT * FROM sp WHERE IDSP=".$dong["IDSP"];
	  										$query1= mysqli_query($conn,$sql1);
	  										$stt++;
	  										while($dong1=mysqli_fetch_assoc($query1)){
	  									?>
	  									<tr>
	  										<td><?php echo $stt; ?></td>
	  										<td><?php echo $dong1["TenSP"]; ?></td>
	  										<td><?php echo $dong["SoLuong"];
                                                $sl+=$dong["SoLuong"];
	  										 ?> 	
	  										</td>
	  										<td><?php echo number_format($dong1["GiaSP"]*$dong["SoLuong"]);
	  										$total+= $dong1["GiaSP"]*$dong["SoLuong"];
	  										?> VND	  											
	  										</td>
	  									</tr>
	  								<?php } } ?>
	  								</tbody>
	  							</table>
									<div class="tongtien" style="width:100%; margin: auto;">
										<ul class="list-group">
											<li class="list-group-item-success">THỐNG KÊ DOANH THU TỪ NGÀY "<?php echo ($ngaydau)?>""ĐẾN"<?php echo($ngaycuoi)?>"  </li>
											<li class="list-group-item">TỔNG SẢN PHẨM ĐÃ BÁN: <?php echo ($sl);?> SẢN PHẨM</li>
											<li class="list-group-item">TỔNG DOANH THU: <?php echo number_format($total) ?> VND</li>
										</ul>
									</div>

	  						</div>
	  					<?php }?>

	  					</div>
	  				</div>
	  			</div>
	  		</div>
  		</div>
  	</div>
</body>
</html>