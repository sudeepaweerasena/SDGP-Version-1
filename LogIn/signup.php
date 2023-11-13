<?php
    include_once 'header.php'
?>

<div class="form">
    <h1>SDW</h1><br><br>
<form action = "includes/login.inc.php" method = "post">

    <label for="Name">Bla Bla</label>
    <input type="text" id="Name" name="name" placeholder="Name">

    <label for="Email">Bla Bla</label>
    <input type="email" id="email" name="email" placeholder="Email">

    <label for="Username">Bla Bla</label>
    <input type="text" id="uName" name="uName" placeholder="Username">

    <label for="password">Bla Bla</label>
    <input type="password" id="password" name="password" placeholder="Password">

    <label for="RePassword">Bla Bla</label>
    <input type="password" id="RePassword" name="RePassword" placeholder="ReEnter Password">
  
    <button name="submit" type="submit">Register</button>
    
</form>
<p>Already have an account? <a href="signup.inc.php">Log In</p>
</div>


<?php
    include_once 'footer.php'
?>