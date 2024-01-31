<?php
   // Start the session
   include('db.php');
   session_start();

   // Check if user is logged in
   if (!isset($_SESSION['username'])) {
      header("Location: login.php");
      exit;
   }

   // Retrieve user information from session
   $username = $_SESSION['username'];

   // Retrieve user data from the database
   
   $con = mysqli_connect("localhost", "root", "root", "login");
   $sql = "SELECT * FROM user WHERE username = '$username'";
   $result = mysqli_query($con, $sql);
   $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
   $fname = $row['fname']; 
   $lname = $row['lname'];
   $age = $row['age'];
   $gender = $row['gender'];
   $hobbies = $row['hobbies'];
   $image = $row['image'];
   mysqli_close($con);
?>

<!DOCTYPE html>
<php>
<head>
    <title>
        Sample Web
    </title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
<body>
    <!-- Home
    gallery
    Profile
    contact us -->
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

    <h1>Profile</h1>
    <div class="card">
        <div class="card-container">
            <img src="<?php echo $image ; ?>" alt="Profile" style="width:40%" class="profilepic">
            <div class="card_deets">
            <h2><?php echo $fname . " " . $lname; ?></h2>
            <h3> <?php echo $age; ?> years old</h3>
            <h3> <?php echo $gender; ?></h3>
            <h3> Hobbies include: <?php echo $hobbies; ?></h3>
            </div>
        </div>
    </div>

     
    <?php include('templates/footer.html'); ?>



</body>
</html>

