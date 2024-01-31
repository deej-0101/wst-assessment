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
      
      <h1>Gallery</h1>
      <br>
      <br>
    
      <div class="all">
      <div class="responsive">
        <div class="gallery">
            <img src="images/1.jpg" alt="pic1">
        </div>
      </div>

      <div class="responsive">
        <div class="gallery">
            <img src="images/2.jpg" alt="pic2">
        </div>
      </div>

      <div class="responsive">
        <div class="gallery">
            <img src="images/3.jpg" alt="pic3">
        </div>
      </div>

      <div class="responsive">
        <div class="gallery">
            <img src="images/4.jpg" alt="pic4">
        </div>
      </div>

      <div class="responsive">
        <div class="gallery">
            <img src="images/5.jpg" alt="pic5">
        </div>
      </div>

      <div class="responsive">
        <div class="gallery">
            <img src="images/6.jpg" alt="pic6">
        </div>
      </div>

      <div class="responsive">
        <div class="gallery">
            <img src="images/7.jpg" alt="pic7">
        </div>
      </div>

      <div class="responsive">
        <div class="gallery">
            <img src="images/8.jpg" alt="pic8">
        </div>
      </div>

      <div class="responsive">
        <div class="gallery">
            <img src="images/9.jpg" alt="pic9">
        </div>
      </div>
      
      <div class="responsive">
        <div class="gallery">
            <img src="images/10.jpg" alt="pic10">
        </div>
      </div>

      <div class="responsive">
        <div class="gallery">
            <img src="images/11.jpg" alt="pic11">
        </div>
      </div>

      <div class="responsive">
        <div class="gallery">
            <img src="images/12.jpg" alt="pic12">
        </div>
      </div>

    </div>

    <?php include('templates/footer.html'); ?>


</body>
</html>

