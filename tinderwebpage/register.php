<?php

require 'header.php'



?>

<div class="container">

  <form id='register' action='registration.php' method='post'
      accept-charset='UTF-8'>
    <legend>Register</legend>
    <div class="form-group">
       <label for="name">Your Full Name</label>
       <input type="name" class="form-control" name="name" id="name" placeholder="Enter name" required=true>
     </div>

     <div class="form-group">
        <label for="username">Username</label>
        <input type="username" class="form-control" name="username" id="username" placeholder="Enter username" required=true>
      </div>

      <div class="form-group">
         <label for="password">Password</label>
         <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required=true>
       </div>
       <input type='submit' name='submit' value='Submit' class="btn btn-default" />
  </form>



</div>

<?php

require 'footer.php'

?>
