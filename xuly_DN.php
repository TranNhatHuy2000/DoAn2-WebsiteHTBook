<?php  
    session_start();
    $con=mysqli_connect("localhost","root","","htbook")
	or die("Không thể kết nối với cơ sở dữ liệu");
    mysqli_set_charset($con, 'UTF8');
	$U_name = $_POST['U_name'];
	$U_pass = $_POST['U_pass'];
	if ($U_name=="admin"&& $U_pass=="333") {
		$_SESSION['Name'] = "Admin";
		$_SESSION['Position'] = "admin";
	    header("Location: viewbook_admin.php?typeid=1");
	}
	else {
		$sql="SELECT * FROM user WHERE Username = '".$U_name."' and Password ='".$U_pass."'";
		$kq= mysqli_query($con,$sql);
			while ($data = mysqli_fetch_array($kq)) {
				if ($data['Username']==$U_name && $data['Password']==$U_pass) {
				    $_SESSION['Name'] = $data['Fullname'];
				    $_SESSION['userid'] = $data['UserID'];
					$_SESSION['Position'] = "user";
					header("location: index.php");
				}
				else {
					header("Location: login.php");
				}
			}
		}
?>