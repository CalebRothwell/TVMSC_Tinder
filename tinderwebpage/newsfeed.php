<?php

require 'header.php';
if (!$session->isLoggedIn()) {
  header('Location: http://localhost:8008/login.php');
}

$users = $dao->listUsers();

?>

<h1>Newsfeed</h1>

<?php
foreach($users as $user) {

?>
<div class="jumbotron">
  <h1>
    <image src="<?= "uploads/{$user['username']}_profile.jpg"; ?>" style="max-width:200px; max-height: 200px">
    <?= $user['username'];?>
  </h1>
  <p> <?= $user['description'];?>
  <p><a class="btn btn-primary btn-lg" data-toggle="tooltip" data-placement="top" title="Nope">HIT ME UP!</a></p>
</div>

<?php
}
?>

<script>
$(function() {
  $('[data-toggle="tooltip"]').tooltip();
})
</script>

<?php

require 'footer.php';
?>
