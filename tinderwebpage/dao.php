<?php
class Dao {
  private $host = "localhost";
  private $db = "tvmsc_tinder";
  private $user = "root";
  private $pass = "yourpassword";

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

  public function createUser($user, $pass, $fullname) {
    $conn = $this->getConnection();
    $saveQuery =
        "INSERT INTO users
        (username, password, fullname)
        VALUES
        (:username, :password, :fullname)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":username", $user);
    $q->bindParam(":password", $pass);
    $q->bindParam(":fullname", $fullname);
    return $q;
  }

  public function listUsers() {
    $conn = $this->getConnection();
    $listQuery =
        "SELECT username, description FROM users";
    $q = $conn->prepare($listQuery);
    $q->execute();
    return $q->fetchAll();
  }

  public function getDescription($username) {
    $conn = $this->getConnection();
    $getQuery =
        "SELECT description FROM users WHERE username = (:username)";
    $q = $conn->prepare($getQuery);
    $q->bindParam(":username", $username);
    $q->execute();
    return $q->fetch()["description"];
  }

  public function setDescription($username, $description) {
    $conn = $this->getConnection();
    $getQuery =
        "UPDATE users
        SET description = (:description) WHERE username = (:username)";
    $q = $conn->prepare($getQuery);
    $q->bindParam(":description", $description);
    $q->bindParam(":username", $username);
    $q->execute();


  }
} // end Dao
