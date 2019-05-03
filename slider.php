
<?Php

$conn = mysqli_connect("localhost","root","","dynamicslider");
$sql="select * from images";
$query=mysqli_query($conn, $sql);
$rowcount=mysqli_num_rows($query);

?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="styles.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner" role="listbox">
    <?php
     for($i=1;$i<=$rowcount;$i++)
     {
   	  $row=mysqli_fetch_array($query);

     ?>

     <?php
     if($i==1)
     {
     ?>
     <div class="carousel-item active">
         <img class="d-block img-fluid" src="<?php echo $row["image_path"] ?>" alt="First slide" width="100%">
         <div class="carousel-caption">
           <h3> <?php echo $row["caption"]; ?> </h3>
         </div>
       </div>
     <?php
     }
     else
     {
   	?>
     	<div class="carousel-item">
         <img class="d-block img-fluid" src="<?php echo $row["image_path"] ?>" alt="First slide" width="100%">
         <div class="carousel-caption">
           <h3> <?php echo $row["caption"]; ?> </h3>
         </div>
       </div>

     <?php
      }
     }
     ?>


     </div>

  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<form method="post" enctype="multipart/form-data">
  Image Serial Number: <input type="number" name="serial">
  Caption: <input type="text" name = "caption1">
  <input type="submit" name="submit" value="update caption" >
</form>
<?php
 $serial = $_POST["serial"];
 $newcaption = $_POST["caption1"];
 $sqlupdate = "UPDATE images SET caption='$newcaption' WHERE sr_no='$serial'";
 mysqli_query($conn, $sqlupdate);
 ?>
