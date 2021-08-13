<?php require_once('config.php') ?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
    body{
      background: yellow;
    }
.hell{
  width: 60%;
}



    </style>
    <?php include('includes/head_section.php'); ?>
  </head>
  <body>
<?php  include( ROOT_PATH . '/includes/navbar.php');?>

<form id="form" method="post" action="getweather.php">

<div class="hell">
  <div class="form-group">
        <select name="id" id="id" class="form-control">
          <option value="1273293">Delhi</option>
 <option value="6619347">Mumbai</option>
 <option value="1264527">Chennai</option>
 <option value="1275004">Kolkata</option>
 <option value="1269844">Hyderabad</option>
 <option value="1269320">State of Jammu and Kashmīr</option>
 <option value="1274746">Chandigarh</option>
 <option value="2984468">Ranchi</option>
    </select>
  <div class="form-group">
  <input type="submit" id="sub" name="submit" value="Submit" style="background-color: #51adcf; width: 10%;">
  </div>
</form>
</div>



<?php  include( ROOT_PATH . '/weather/weather.php'); ?>

  </body>
</html>
<?php include( ROOT_PATH . '/includes/footer.php') ?>
