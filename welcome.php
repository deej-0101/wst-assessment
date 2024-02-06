<?php
   // Start the session
   session_start();

   // Retrieve user information from session
   if (isset($_SESSION['username'])) {
       $username = $_SESSION['username'];

       // Retrieve user data from the database
       include('db.php');
       $con = mysqli_connect("localhost", "root", "root", "login");
       $sql = "SELECT * FROM user WHERE username = '$username'";
       $result = mysqli_query($con, $sql);
       $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
       $fname = $row['fname']; // assuming the column name for the first name is 'fname'
       mysqli_close($con);
   } else {
       $fname = '';
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
        <h2 class="nav-title"> My Page </h2>
          <div class="nav-links">
            <a href="welcome.php" class="btn"> Home </a>
            <a href="profile.php" class="btn"> Profile </a>
            <a href="gallery.php" class="btn"> Gallery </a>
            <a href="contacts.php" class="btn"> Contact Us </a>
            <a href="logout.php" class="btn"> Log Out </a>
          </div>
      </section>

      <div class="welcomepage">
      <h1>Welcome, 
      <?php
          if (!isset($fname) || empty($fname)) {
              echo 'Guest';
          } else {
              echo $fname;
          }
          ?>
      </h1>
      <p>Not logged in? <a href="login.php">Login here.</a>.</p>
      </div>
      

    <?php include('templates/footer.html'); ?>


</body>
</html>

