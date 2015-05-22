<?php
include('dao.php');
$dao = new Dao();

if(isset($_REQUEST['submit'])) {
  if($_REQUEST['name'] == '' || $_REQUEST['username'] == '' || $_REQUEST['password'] == '')
  {
    echo "please fill the empty field.";
  } else {
    $q = $dao->createUser($_REQUEST['username'], $_REQUEST['password'], $_REQUEST['name']);
    if (!$q->execute()) {
      var_dump($q->errorInfo());
      die();
    } else {
        header('Location: http://localhost:8008/login.php');  
    }
  }
} else {
  echo("No submit in request");
}

?>
