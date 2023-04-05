
<!DOCTYPE html>
<html>
  <body>
<?php 
    include "log_top.php";

?>
    <!-- [SEARCH FORM] -->
    <form method="post" action="../control/search_user_control.php">
      <h1>SEARCH FOR USERS</h1>
      <input type="text" name="user_name" />
      <input type="submit" name="findUser" value="Search"/>
    </form>
    <a href="view_profile.php">Back</a>
  </body>
</html>