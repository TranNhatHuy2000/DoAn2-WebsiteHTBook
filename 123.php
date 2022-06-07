
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
<body>
    <form method="post" action="" enctype="multipart/form-data">
        <input type="file" name="avatar"/>
        <input type="submit" name="uploadclick" value="Upload"/>
    </form>
    <?php // Xử Lý Upload
  
    // Nếu người dùng click Upload
    if (isset($_POST['uploadclick'])){
        if (isset($_FILES['avatar'])) {
            if ($_FILES['avatar']['error'] > 0){
                echo 'File Upload Bị Lỗi';
            }
            else{
                $img_type =pathinfo($_FILES['avatar']['name'],PATHINFO_EXTENSION);
                move_uploaded_file($_FILES['avatar']['tmp_name'], 'upload/'.$img_type);
                echo $img_type ;
                echo '<br>';
                echo 'File Uploaded';
            }
        }
        else{
            echo 'Bạn chưa chọn file upload';
        }
    }
?>
<?php 
    echo date('W');


?>
</body>
</html>
 