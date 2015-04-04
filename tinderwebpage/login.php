<?php

session_start();

$username = $_POST['username'];
$password = $_POST['password'];

if ($username && $password)
{
  $connect = mysql_connect("localhost", "root", "") or die("Couldn't conect to the database!");
  mysql_connect_db("login1") or die("Couldn't find database");

  $query = mysql_query("SELECT * FROM users where username= '$username'");

  $numsrows = mysql_num_rows($query);

  if($numsrows!==0)
  {
    while($row = mysql_fetch_assoc($query))
    {
      $dbusername = $row['username'];
      $dbpassowrd = $row['password'];
    }
    if(($username==$dbusername)&&($password==$dbpassword))
    {
      echo "you are logged in!";

      @$_SESSION['username'] = $username;
  }
    else
        echo "Your password is incorrect";
 }
    else
        die("That user doesn't exist");
}
  else
      die("Please enter a username and passoword!")

?>
