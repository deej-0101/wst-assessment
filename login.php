
<?php
    include('db.php');
    session_start();

    function validation() {
        if (empty($_POST['username']) || empty($_POST['password'])) {
            echo "<h1> Login failed. Invalid username or password.</h1>";
            return false;
        }
        return true;
    }

    if (isset($_POST['username']) && isset($_POST['password']) && validation()) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $con = mysqli_connect("localhost", "root", "root", "login");

        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        //to prevent from mysqli injection  
        $username = stripcslashes($username);
        $password = stripcslashes($password);
        $username = mysqli_real_escape_string($con, $username);
        $password = mysqli_real_escape_string($con, $password);

        $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        if ($count > 0) {
            $_SESSION['username'] = $username;

            header('Location: welcome.php');
            exit();

        } else {
            echo "<p>Invalid username or password.</p>";
        }

        mysqli_close($con);
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
    <!-- Home
    gallery
    Profile
    contact us -->
    <section class="navbar">
        <h2 class="nav-title"> My Page </h2>
          <div class="nav-links">
            <a href="login.php" class="btn"> Log In </a>
            <a href="gallery.php" class="btn"> Gallery </a>
            <a href="contacts.php" class="btn"> Contact Us </a>
          </div>
      </section>

      <h1>Login</h1>

      <form action="login.php" method="post">
        <div class="container">
          <label for="username"><b>Username</b></label>
          <input type="text" placeholder="Enter Username" name="username" required>
      
          <label for="password"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="password" required>
              
          <button type="submit">Login</button>

          <p class="forspace">Don't have an account? <a href="register.php">Register here</a>.</p>
        </div>
      </form>

      <?php include('templates/footer.html'); ?>

</body>
</html>