<?php
    include_once 'header.php'
?>

<div class="form">
    <h1>SDW</h1><br><br>
<form action = "includes/login.inc.php" method = "post">

    <label for="uName">Bla Bla</label>
    <input type="text" id="uName" name="uName" placeholder="Email / Username">

    <label for="password">Bla Bla</label>
    <input type="password" id="password" name="password" placeholder="Password">
  
    <button name="submit" type="submit">LogIn</button>
    
</form>
<p>New Here? <a href="signup.php">Register</a></p>
</div>


<?php
    include_once 'footer.php'
?>
