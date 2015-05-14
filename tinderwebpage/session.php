<?php

class Session {
  private $keyUsername = "_USERNAME";

  function __construct() {
    session_start();
  }

  public function login($username) {
    $_SESSION[$this->keyUsername] = $username;
  }

  public function getUsername() {
    return $_SESSION[$this->keyUsername];
  }

  public function isLoggedIn() {
    return @$_SESSION[$this->keyUsername] !== null;
  }

  public function logout() {
    unset($_SESSION[$this->keyUsername]);
  }
}

?>
