<?php

require 'header.php';

$username = @$_POST['username'];
$password = @$_POST['password'];

if ($username && $password) {
  if($dao->login($username, $password)) {
    $session->login($username);
    echo("You are logged in, $username");
  } else {
    echo("Your username or password is wrong");
  }
}

?>

<form action="login.php" method="post">
  <label for="username">Username:</label>
  <input id="username" type="text" name="username" class="form-control" /> <br/>
  <label for="password">Password:</label>
  <input id="password" type="password" name="password" class="form-control" /> <br/>
  <input type="submit" value= "login" />
</form>

<?php

require 'footer.php'

?>
