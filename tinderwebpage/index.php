<?php

require 'header.php'
?>

<div class="container">
  <?php
    if ($session->isLoggedIn()) {
      $username = $session->getUsername();

    <span>Welcome, <?php echo $username; ?></span>
  <?php } ?>
</div><!-- /.container -->

<?php

require 'footer.php'

?>
