

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet"/>
      <link rel="stylesheet" href="home.css">

    <link rel="stylesheet" href="fonts/icomoon/style.css" />
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css" />

    <link rel="stylesheet" href="css/tiny-slider.css" />
    <link rel="stylesheet" href="css/aos.css" />
    <link rel="stylesheet" href="css/style.css" />
    <style>
                .video-wrapper video
        {
            height: 10%;
            vertical-align: middle;
            width: 10%;
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
            <li><a href="login.php">Home </a></li>
              <li><a href="register.php">Properties </a></li>
              <li><a href="login.php">Login </a></li>
              <li><a href="register.php">Register </a></li>
              
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
    </nav><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <?php 
    include('functions/userfunctions.php');
    ?>
    <div class="row">
        <div class="col-12">
            <div class="property-slider-wrap">
                <div class="property-slider">
                    <div class="property-item">
                        <h1>Our House</h1>
                        <?php
                            $categories = getAllActive("categories");

                            if(mysqli_num_rows($categories) > 0)
                            {
                                foreach($categories as $item)
                                {
                                    ?>
                                        <h4><?= $item['city']; ?></h4>
                                        <?php
                                }
                            }
                            else
                            {
                                echo "No Data";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
</html>