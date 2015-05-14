<?php
class Dao {
  private $host = "localhost";
  private $db = "tvmsc_tinder";
  private $user = "root";
  private $pass = "yourpassword";
  private $fullname = "fullname";
  private $email = "email";
  private $profilepicture = "profilepicture";
  private $description = "description";

  public function getConnection () {
    return
      new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user,
          $this->pass);
  }

  public function login($username, $password) {
    $conn = $this->getConnection();
    $loginQuery = "SELECT * FROM users where username=(:username)";
    $q = $conn->prepare($loginQuery);
    $q->bindParam(":username", $username);
    $q->execute();

    if ($q->rowCount() !== 0) {
      while ($row = $q->fetch()) {
        $dbusername = $row['username'];
        $dbpassword = $row['password'];
        if (($username == $dbusername) && ($password == $dbpassword)) {
          return true;
        }
      }
    }
    return false;
  }

  public function saveComment ($comment) {
    $conn = $this->getConnection();
    $saveQuery =
        "INSERT INTO comment
        (comment)
        VALUES
        (:comment)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":comment", $comment);
    $q->execute();
  }

  public function getComments () {
    $conn = $this->getConnection();
    return $conn->query("SELECT * FROM comment");


  }
  public function createUser($fullname, $email, $user, $pass, $profilepicture, $description) {

  }
} // end Dao
