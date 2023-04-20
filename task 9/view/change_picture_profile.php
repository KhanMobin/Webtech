<!DOCTYPE html>
<html>
<body>
<?php include 'log_top.php';?>
<form action="../control/picture_upload.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
  <input type="submit" value="Upload Image" name="submit">
  <a href="view_profile.php">Back</a>
</form>
<?php include 'footer.php';?>
</body>
</html>