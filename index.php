<?php
$version = time();
session_start();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edu Sphere</title>
    <link rel="stylesheet" href="assets/css/global.css?v=<?= $version ?>"/>
    <link rel="stylesheet" href="assets/css/style.css?v=<?= $version ?>"/>
</head>
<body>
<!--HERO SECTION-->
<section class="section-hero">
    <header class="top-bar">
        <a href="index.php" class="logo">EDU SPHERE</a>
        <nav>
            <ul>
                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="index.php">About</a></li>
                <li><a href="index.php">How it Works</a></li>
                <li><a href="index.php">FAQ</a></li>
            </ul>
        </nav>
        <div class="cta">
            <?php if($_SESSION && $_SESSION['auth']) { ?>
                <a href=""></a>
                <a href="<?=$_SESSION['role']?>/dashboard.php">Dashboard &rarr;</a>
            <?php }else { ?>
            <a href="login.php">Login</a>
            <a href="register.php">Join Us &rarr;</a>
            <?php } ?>
        </div>
    </header>
    <div class="hero-text-block">
        <span>Online training</span>
        <h1>25K+ STUDENTS TRUST US</h1>
        <p>Our goal is to make online education work for everyone</p>
        <div class="cta">
            <a href="#">Get Quote Now</a>
            <a href="#">Learn More &rarr;</a>
        </div>
    </div>
    <div class="hero-cards">
        <div class="hero-card">
            <img src="assets/icons/school.svg" alt="icon of a school" width="72" height="72"/>
            <span>2,769 online courses	</span>
            <div class="card-separator"></div>
            <p>The gradual accumulation of
                information about atomic and
                small-scale behaviour...</p>
        </div>
        <div class="hero-card">
            <img src="assets/icons/book.svg" alt="icon of a school" width="72" height="72"/>
            <span>Expert instruction	</span>
            <div class="card-separator"></div>
            <p>The gradual accumulation of
                information about atomic and
                small-scale behaviour...</p>
        </div>
        <div class="hero-card">
            <img src="assets/icons/consultation.svg" alt="icon of a school" width="72" height="72"/>
            <span>Training Courses	</span>
            <div class="card-separator"></div>
            <p>The gradual accumulation of
                information about atomic and
                small-scale behaviour...</p>
        </div>
    </div>
</section>

<!--STATS-->
<section class="section-stats">
    <img src="assets/img/about-home.svg" alt="image of children with stats">
    <div class="text-box">
        <div class="separator"></div>
        <h2>Our Experts Teacher</h2>
        <p>Problems trying to resolve the conflict between
the two major realms of Classical physics:
Newtonian mechanics </p>
        <a href="#">Learn More &rarr;</a>
    </div>
</section>

<!--SECTION VIDEO-->
<section class="section-video">
    <div class="text-box">
        <div class="separator"></div>
        <h2>Approachable Packages</h2>
        <p>Problems trying to resolve the conflict between
the two major realms of Classical physics:
Newtonian mechanics </p>
        <a href="#">Learn More &rarr;</a>
    </div>
    <img src="assets/img/video.svg" alt="image of children with stats">
</section>

<!--FOOTER-->
<footer>
    <ul>
        <li>Company Info</li>
        <li>About Us</li>
        <li>Carrier</li>
        <li>We are hiring</li>
        <li>Blog</li>
    </ul>
    <ul>
        <li>Legal</li>
        <li>About Us</li>
        <li>Carrier</li>
        <li>We are hiring</li>
        <li>Blog</li>
    </ul>
    <ul>
        <li>Features</li>
        <li>Business Marketing</li>
        <li>User Analytic</li>
        <li>Live Chat</li>
        <li>Unlimited Support</li>
    </ul>
    <ul>
        <li>Resources</li>
        <li>IOS & Android</li>
        <li>Watch a Demo</li>
        <li>Customers</li>
        <li>API</li>
    </ul>
    <ul>
        <li>Get In Touch</li>
        <li>(480) 555-0103</li>
        <li>4517 Washington Ave. Manchester,
            Kentucky 39495</li>
        <li>debra.holt@example.com</li>
    </ul>
</footer>
</body>
</html>