<?php
    include('db.php');

    if (isset($_POST['username']) && isset($_POST['password']) && isset($_FILES['image'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $mobilenum = $_POST['mobilenum'];
        $hobbies = $_POST['hobbies'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];

        // Handle file upload
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if file is an actual image or fake image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check === false) {
            echo "File is not an image.";
            exit();
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "File already exists.";
            exit();
        }

        // Check file type
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            exit();
        }

        // Move uploaded file to target directory
        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "Sorry, there was an error uploading your file.";
            exit();
        }

        $image = $target_file;

        $con = mysqli_connect("localhost", "root", "root", "login");
        //to prevent from mysqli injection  
        $username = stripcslashes($username);
        $password = stripcslashes($password);
        $fname = stripcslashes($fname);
        $lname = stripcslashes($lname);
        $email = stripcslashes($email);
        $mobilenum = stripcslashes($mobilenum);
        $image = stripcslashes($image);
        $hobbies = stripcslashes($hobbies);
        $age = stripcslashes($age);
        $gender = stripcslashes($gender);

        $username = mysqli_real_escape_string($con, $username);
        $password = mysqli_real_escape_string($con, $password);
        $fname = mysqli_real_escape_string($con, $fname);
        $lname = mysqli_real_escape_string($con, $lname);
        $email = mysqli_real_escape_string($con, $email);
        $mobilenum = mysqli_real_escape_string($con, $mobilenum);
        $image = mysqli_real_escape_string($con, $image);
        $hobbies = mysqli_real_escape_string($con, $hobbies);
        $age = mysqli_real_escape_string($con, $age);
        $gender = mysqli_real_escape_string($con, $gender);

        $sql = "INSERT INTO user (username, password, fname, lname, email, mobilenum, image, hobbies, age, gender) 
        VALUES ('$username', '$password', '$fname', '$lname', '$email', '$mobilenum', '$image', '$hobbies', '$age', '$gender')";
        $result = mysqli_query($con, $sql);

        if ($result) {
            header('Location: profile.php');
            exit();

        } else {
            echo "Error: " . mysqli_error($con);
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
            <a href="login.php" class="btn"> Login </a>
            <a href="welcome.php" class="btn"> Home </a>
            <a href="gallery.php" class="btn"> Gallery </a>
            <a href="contacts.php" class="btn"> Contact Us </a>
          </div>
      </section>

      <h1>Create Account</h1>


      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
      
        <div class="container">
          <label for="fname"><b>First Name</b></label>
          <input type="text" placeholder="Enter your First Name" name="fname" maxlength="50" required>
              
          <label for="lname"><b>Last Name</b></label>
          <input type="text" placeholder="Enter Your Last Name" name="lname" maxlength="50" required>
              
          <label for="age"><b>Age</b></label>
          <input type="number" placeholder="Enter Your Age" name="age" maxlength="3" required>
          
          <label for="gender"><b>Gender</b></label>
          <select name="gender" id="gender" required>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
          </select>
 
          <label for="mobilenum"><b>Mobile Number</b></label>
          <input type="number" placeholder="Enter Your Mobile Number" name="mobilenum" maxlength="11" required>

          <label for="subject">Hobbies</label>
          <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
      
                
          <label for="username"><b>Username</b></label>
          <input type="text" placeholder="Enter Username" name="username" required>

          <label for="password"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="a_password" pattern="(?=.*[A-Z]).{6,}.*[!@#$%^&*()]" required>
          
          <label for="password"><b>Confirm Password</b></label>
          <input type="password" placeholder="Enter Password" name="password" required>

          <label for="image"><b>Profile Photo</b></label><br>
          <input type="file" name="image" value="" required><br>

          <button type="submit">Sign Up</button>

          <p class="forspace"> Already have an account? <a href="login.php"> Login Here</a>
        </p>

        </div>
      </form>

      <?php include('templates/footer.html'); ?>


</body>
</html>

