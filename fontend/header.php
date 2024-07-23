<?php
	require 'config.php';
	if(empty($_SESSION['username']))
		header('Location: login.php');

if($_SESSION['role'] == 'admin'){
		$stmt = $connect->prepare('SELECT count(*) as register_user FROM users');
		$stmt->execute();
		$count = $stmt->fetch(PDO::FETCH_ASSOC);


		$stmt = $connect->prepare('SELECT count(*) as total_rent FROM room_rental_registrations');
		$stmt->execute();
		$total_rent = $stmt->fetch(PDO::FETCH_ASSOC);

		$stmt = $connect->prepare('SELECT count(*) as total_rent_apartment FROM room_rental_registrations_apartment');
		$stmt->execute();
		$total_rent_apartment = $stmt->fetch(PDO::FETCH_ASSOC);
	}

	$stmt = $connect->prepare('SELECT count(*) as total_auth_user_rent FROM room_rental_registrations WHERE user_id = :user_id');
	$stmt->execute(array(':user_id' => $_SESSION['id']));
	$total_auth_user_rent = $stmt->fetch(PDO::FETCH_ASSOC);

	$stmt = $connect->prepare('SELECT count(*) as total_auth_user_rent_ap FROM room_rental_registrations_apartment WHERE user_id = :user_id');
	$stmt->execute(array(
		':user_id' => $_SESSION['id']
		));
	$total_auth_user_rent_ap = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!--  nav--->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>House Rent</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet"/>
      <link rel="stylesheet" href="home.css">

    <link rel="stylesheet" href="fonts/icomoon/style.css" />
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css" />

    <link rel="stylesheet" href="css/tiny-slider.css" />
    <link rel="stylesheet" href="css/aos.css" />
    <link rel="stylesheet" href="css/style.css" />
    <style>
      .section{background: radial-gradient(#fff,#ffd6d6);}
    .slideshow-container{background: radial-gradient(#fff,#ffd6d6);}
        .video-wrapper video
        {
            height: 10%;
            vertical-align: middle;
            width: 10%;
        }
        .site-nav{
        background: radial-gradient(#fff,#ffd6d6);
        }
    </style>
</head>
<body>
    <nav class="site-nav">
      <div class="container">
        <div class="menu-bg-wrap">
          <div class="site-navigation">
          <div class="video-wrapper">
            <video autoplay loop muted>
              <source src="my shelter.mp4" type="video/mp4" >
            </video>
            <div class="video-description">
            </div>

            <ul
              class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end" >
              <li class="active"><a href="home.php">Home</a></li>
              <li class="has-children">
                <a href="properties.php">Properties</a>
                <ul class="dropdown">
                  <li><a href="#">2BHK</a></li>
                  <li><a href="#">3BHK</a></li>
                  <li class="has-children">
                    <a href="#">Property Type:</a>
                    <ul class="dropdown">
                      <li><a href="#">Full House Rent</a></li>
                      <li><a href="#">Flat Rent</a></li>
                      <li><a href="#">Room Rent</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li><a href="services.html">Services</a></li>
              <li><a href="about.html">Add to Cart</a></li>
              <li><a href="contact.php">Contact Us</a></li>
            <li class="nav-item">
              <a class="nav-link" href="#"><?php echo $_SESSION['fullname']; ?> <?php if($_SESSION['role'] == 'admin'){ echo "(Admin)"; } ?></a>
            </li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div>

              
            </ul>

            <a
              href="#"
              class="burger light me-auto float-end mt-1 site-menu-toggle js-menu-toggle d-inline-block d-lg-none"
              data-toggle="collapse"
              data-target="#main-navbar"
            >
              <span></span>
            </a>
          </div>
        </div>
      </div>
    </nav>
      </body>
      </html>