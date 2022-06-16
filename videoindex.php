<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php if(isset($_GET["error"])) {?>
      <p><?=$_GET['error']?></p>
      <?php } ?>
    <form action="upload.php" method="post" enctype="multipart/form-data">
      <input type="file" name="my_video" >
      <input type="submit" name="submit" value="UPLOAD">
    </form>
  </body>
</html>
