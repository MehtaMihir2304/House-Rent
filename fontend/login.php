<?php
	require 'config.php';
	
	if(isset($_POST['login'])) {

		// Get data from FORM
		$username = $_POST['username'];
		$email = $_POST['username'];
		$password = $_POST['password'];

		try {
			$stmt = $connect->prepare('SELECT * FROM users WHERE username = :username OR email = :email');
			$stmt->execute(array(
				':username' => $username,
				':email' => $email
				));
			$data = $stmt->fetch(PDO::FETCH_ASSOC);

			if($data == false){
				$errMsg = "User $username not found.";
			}
			else {
				if(md5($password) == $data['password']) {
					$_SESSION['id'] = $data['id'];
					$_SESSION['username'] = $data['username'];
					$_SESSION['fullname'] = $data['fullname'];
					$_SESSION['role'] = $data['role'];
					header('Location: home.php');
					exit;
				}
				else
					$errMsg = 'Password not match.';
			}
		}
		catch(PDOException $e) {
			$errMsg = $e->getMessage();
		}
	}
?>
<!--------nav--------->
<head>
    <link
      href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet"/>

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
    </nav>

    <!----end----->
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<!-- Services -->
	<nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#212529;" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="../index.php">Logo/Home</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <!-- <a class="nav-link" href="login.php">Login</a> -->
            </li>
            <li class="nav-item">
              <a class="nav-link" href="register.php">Register</a>
            </li>
          </ul>
        </div>
      </div>
    </nav><br><br>

    <section id="services">
		<div class="container">
			<div class="row">				
			  <div class="col-md-4 mx-auto">
			  	<div class="alert alert-info" role="alert">
			  		<?php
						if(isset($errMsg)){
							echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errMsg.'</div>';
						}
					?>
			  		<h2 class="text-center">Login</h2>
				    <form action="" method="post">
					  <div class="form-group">
					    <label for="exampleInputEmail1">Email Address/User Name</label>
					    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Email" name="username" required>
					  </div><br>
					  <div class="form-group">
					    <label for="exampleInputPassword1">Password</label>
					    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required>
					  </div><br>
					  <button type="submit" class="btn btn-primary" name='login' value="Login">Submit</button>
					</form>				 
				 </div>
			</div>
			</div>
		</div>
	</section>
	<style>
    .section{background: radial-gradient(#fff,#ffd6d6);}
    .slideshow-container{background: radial-gradient(#fff,#ffd6d6);}
    .video-wrapper1 video
        {
            height: 85%;
            vertical-align: middle;
            width: 85%;
        }
  </style>
	    <!--footer-->
		<div class="site-footer">
			<div class="container">
				<div class="row">
				<div class="col-lg-4">
					<div class="widget">
					<h3>About House Rent</h3>
					<p>Renting, also known as hiring or letting, is an agreement where a payment is made for the use of a good, 
						service or property owned by another over a fixed period of time. To maintain such an agreement, a rental agreement 
						is signed to establish the roles and expectations of both the tenant and landlord.</p>
						<br>
						<ul class="list-unstyled social">
						<li>
						<a href="#"><span class="icon-instagram"></span></a>
						</li>
						<li>
						<a href="#"><span class="icon-twitter"></span></a>
						</li>
						<li>
						<a href="#"><span class="icon-facebook"></span></a>
						</li>
						<li>
						<a href="#"><span class="icon-linkedin"></span></a>
						</li>
						<li>
						<a href="#"><span class="icon-pinterest"></span></a>
						</li>
						<li>
						<a href="#"><span class="icon-dribbble"></span></a>
						</li>
					</ul>
					
					</div>
					<!-- /.widget -->
				</div>
				<!-- /.col-lg-4 -->
				<div class="col-lg-4">
					<div class="widget">
					</div>
				</div>


					<div class="col-lg-4">
					<div class="widget">
					<div class="video-wrapper1">
					<video autoplay loop muted>
					<source src="my shelter.mp4" type="video/mp4" >
					</video>
					<div class="video-description">
					</div>
					</div>
					<!-- /.widget -->
				</div>
				<!-- /.col-lg-4 -->
				</div>
				<!-- /.row -->

			</div>
      		<!-- /.container -->
    	</div>
    	<!-- /.site-footer -->