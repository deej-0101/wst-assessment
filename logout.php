
<?php
   session_start();

   // Check if the user has clicked the logout button
   if(isset($_POST['logout'])){
      // Unset all of the session variables
      $_SESSION = array();

      // Destroy the session
      session_destroy();

      // Redirect to the login page
      header("Location: login.php");
      exit;
   }
?>


<!DOCTYPE html>
<html>
<head>
    <title>
        Sample Web
    </title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <section class="navbar">
    <img src="images/logo.png" alt="Brand Logo" class="brand-logo">
        <h2 class="nav-title"> My Page </h2>
          <div class="nav-links">
            <a href="welcome.php" class="btn"> Home </a>
            <a href="profile.php" class="btn"> Profile </a>
            <a href="gallery.php" class="btn"> Gallery </a>
            <a href="contacts.php" class="btn"> Contact Us </a>
            <a href="logout.php" class="btn"> Log Out </a>
          </div>
      </section>

      <div class="logout">
      <h3>Log out Confirmation</h3><br>

      <p>Are you sure you want to log out?</p>

            <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <button type="submit" name="logout">Yes</button>
            <a href="welcome.php"><button type="button">Go back</button></a>
      </form>
      </div>

    <?php include('templates/footer.html'); ?>


</body>
</html>

