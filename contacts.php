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
            <a href="welcome.php" class="btn"> Home </a>
            <a href="profile.php" class="btn"> Profile </a>
            <a href="gallery.php" class="btn"> Gallery </a>
            <a href="contacts.php" class="btn"> Contact Us </a>
            <a href="logout.php" class="btn"> Log Out </a>
          </div>
      </section>

      <h1>Contact Us</h1>

      <div class="contact">
        <form action="contacts.php">
          <label for="fname">Name</label>
          <input type="text" id="fname" name="firstname" placeholder="Your name..">
      
          <label for="lname">Email</label>
          <input type="text" id="lname" name="lastname" placeholder="Your email..">
      
          <label for="subject">Your Message</label>
          <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
      
          <button type="submit">Submit</button>

        </form>
      </div>


      <?php include('templates/footer.html'); ?>

</body>
</html>

