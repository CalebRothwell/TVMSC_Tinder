<?php
require 'header.php';

if (!$session->isLoggedIn()) {
  header('Location: http://localhost:8008/login.php');
}

$username = $session->getUsername();
$target_file = "uploads/{$username}_profile.jpg";
$error = "";
if (isset($_POST["submit_image"])) {
  $file = $_FILES["profile"];
  $size = getimagesize($file["tmp_name"]);
  if ($size == false) {
    $error = "Uploaded file is not an image";
  }
  if (empty($error)) {
    if (move_uploaded_file($file['tmp_name'], $target_file)) {
      echo "Successfully uploaded profile images for $username<br />";
    } else {
      $error = "Error uploading profile image";
    }
  }
} else if (isset($_POST["submit_description"])) {
  $description = @$_POST["description"];
  if ($description) {
    $dao->setDescription($username, $description);
    echo "Your description has been updated";
  } else {
    echo "Please enter a non-empty description";
  }
}

?>
<div class="container">
  <h4> Upload a profile picture and add a short description about yourself: </h4>

  <?php
    if (!empty($error)) {
      echo "<strong>$error</strong><br />";
    }
  ?>
  <image src="<?php echo "uploads/{$username}_profile.jpg"; ?>" style="max-width: 200px; max-height: 200px">
  <form action='profile.php' method='post' accept-charset='UTF-8' enctype="multipart/form-data">
    <div class="form-group">
      <label for="profile">Select image: </label>
      <input type="file" name="profile"/>
    </div>

    <input type='submit' name='submit_image' value='Update Image' class="btn btn-default" />
  </form>

  <form id='register' action='profile.php' method='post'>
    <div class="form-group">
      <label for="description">Description: </label>
      <textarea name="description" class="form-control"><?= $dao->getDescription($username); ?></textarea>
    </div>

    <input type='submit' name='submit_description' value='Update Description' class="btn btn-default" />
  </form>
</div>
<?php
require 'footer.php';
?>
