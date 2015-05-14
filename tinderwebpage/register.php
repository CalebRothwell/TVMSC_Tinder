<?php

require 'header.php'

?>

<div class="container">

  <form id='register' action='register.php' method='post'
      accept-charset='UTF-8'>
    <legend>Register</legend>
    <div class="form-group">
       <label for="full name">Your Full Name</label>
       <input type="name" class="form-control" id="full name" placeholder="Enter name" required=true>
     </div>

    <div class="form-group">
       <label for="email">Email address</label>
       <input type="email" class="form-control" id="email" placeholder="Enter email" required=true>
     </div>

     <div class="form-group">
        <label for="username">Username</label>
        <input type="username" class="form-control" id="username" placeholder="Enter username" required=true>
      </div>

      <div class="form-group">
         <label for="password">Password</label>
         <input type="password" class="form-control" id="password" placeholder="Enter password" required=true>
       </div>
  </form>
  <div class="container">
    <form>
      <form id='register' action='register.php' method='post'
          accept-charset='UTF-8'>

      <strong> Upload a profile picture and add a short description about yourself </strong>

      <p>Select images: </p>
      <input type="file" name="img" multiple>

    </form>
    <textarea cols="50" rows="5">

    </textarea>
    <p><input type='submit' name='Submit' value='Submit' class="btn btn-default" /></p>

  </div>


</div>

<?php

require 'footer.php'

?>
