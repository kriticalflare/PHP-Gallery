<?php
$link = mysqli_connect("localhost","root","","dynamicslider");
//mysqli_select_db($link,"dynamicslider");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

if(isset($_REQUEST["submit"]))
{
  $file=$_FILES["file"]["name"];
  $temp_name=$_FILES["file"]["tmp_name"];
  $path="images/".$file;
  $caption=$_POST['caption'];

  move_uploaded_file($temp_name,$path);
  $sql= "INSERT into images (image_path, caption) values('$path','$caption')";
  mysqli_query($link,$sql);
//  $sqlcaption = "INSERT into images (caption) values('$caption')";

}

 ?>

<form method="post" enctype="multipart/form-data">
  Image upload: <input type="file" name="file">
  Caption: <input type="text" name = "caption">
  <input type="submit" name="submit" value="upload image and caption" >
</form>
