<?php 
   	$con= mysqli_connect('localhost','root','','htbook');
	mysqli_set_charset($con, 'UTF8');
	$sql="select * from books";
	$kq = mysqli_query($con,$sql);
  while ($row = mysqli_fetch_array($kq)) {
	    echo '<tr>';
	    echo '<td>'.$row["BookID"].'</td>';
	    echo '<td>'.$row["Name"].'</td>';
	    echo '<td>'.$row["Author"].'</td>';
	    echo '<td>'.$row["Price"].'</td>';
	    echo '<td>'.$row["TypeID"].'</td>';
	    echo '</tr>';
	}
?>