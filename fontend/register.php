<?php
	require 'config.php';

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'PHPMailer/src/Exception.php';
	require 'PHPMailer/src/PHPMailer.php';
	require 'PHPMailer/src/SMTP.php';

	if(isset($_POST['register'])) {
		$errMsg = '';

		// Get data from FROM
		$username = $_POST['username'];
		$mobile = $_POST['mobile'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$fullname = $_POST['fullname'];

		// $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
		// try {
		//     //Server settings
		//     $mail->SMTPDebug = 2;                                 // Enable verbose debug output
		//     $mail->isSMTP();                                      // Set mailer to use SMTP
		//     $mail->Host = 'ssl://smtp.gmail.com:465';  // Specify main and backup SMTP servers
		//     $mail->SMTPAuth = true;                               // Enable SMTP authentication
		//     $mail->Username = 'xxxx@gmail.com';                 // SMTP username
		//     $mail->Password = 'xxxx';                           // SMTP password
		//     $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
		//     $mail->Port = 465;                                    // TCP port to connect to

		//     //Recipients
		//     $mail->setFrom('xxxxx@gmail.com', 'Mailer');
		// 	$mail->addAddress($email, 'Name Of the person');     // Add a recipient

		//     //Content
		//     $mail->isHTML(true);                                  // Set email format to HTML
		//     $mail->Subject = "Registration successfull $fullname";
		//     $mail->Body    = "Credentials To login into our site <br> Name: $fullname <br>Email : $email<br> Username: $username <br>Password: $password";

		//    	$mail->send();
		//    // echo 'Message has been sent';
		// } catch (Exception $e) {
		//    // echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
		// }	

			try {
				$stmt = $connect->prepare('INSERT INTO users (fullname, mobile, username, email, password) VALUES (:fullname, :mobile, :username, :email, :password)');
				$stmt->execute(array(
					':fullname' => $fullname,
					':username' => $username,
					':password' => md5($password),
					':email' => $email,
					':mobile' => $mobile,
					));
				header('Location: register.php?action=joined');
				exit;
			}
			catch(PDOException $e) {
				echo $e->getMessage();
			}
	}

	if(isset($_GET['action']) && $_GET['action'] == 'joined') {
		$errMsg = 'Registration successfull. Now you can login';
	}
?>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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
	<!-- <nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="../index.php">WebSiteName</a>
	    </div>
	    <ul class="nav navbar-nav navbar-right">
			<li><a href="login.php">Login</a></li>
			<li><a href="register.php">Register</a></li>
	    </ul>
	  </div>
	</nav> -->
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
              <a class="nav-link" href="login.php">Login</a>
            </li>
            <li class="nav-item">
              <!-- <a class="nav-link" href="register.php">Register</a> -->
            </li>
          </ul>
        </div>
      </div>
    </nav><br><br>
<!-- <section> --><br>
	<div class="container">
		<div class="row">				
			  <div class="col-md-8 mx-auto">
			  	<div class="alert alert-info" role="alert">
			  		<?php
						if(isset($errMsg)){
							echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errMsg.'</div>';
						}
					?>
			  		<h2 class="text-center">Register</h2>
				  	<form action="" method="post">
				  		<div class="row">
					  	    <div class="col-6">
						  	  <div class="form-group">
							    <label for="fullname">Full Name</label>
							    <input type="text" class="form-control" id="fullname" placeholder="Full Name" name="fullname" required>
							  </div>
							</div>
							<div class="col-6">
							  <div class="form-group">
							    <label for="username">User Name</label>
							    <input type="text" class="form-control" id="username" placeholder="User Name" name="username" required>
							  </div>
						    </div>
					   </div>
					   <div class="row">
					  	    <div class="col-6">
							  <div class="form-group">
							    <label for="mobile">Mobile</label>
							    <input type="text" class="form-control" pattern="^(\d{10})$" id="mobile" title="10 digit mobile number" placeholder="10 digit mobile number" name="mobile" required>
							  </div>
							 </div>
							<div class="col-6">					  
							  <div class="form-group">
							    <label for="email">Email</label>
							    <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
							  </div>
							 </div>
						</div>

					  <div class="form-group">
					    <label for="password">Password</label>
					    <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
					  </div>

					  <div class="form-group">
					    <label for="c_password">Confirm Password</label>
					    <input type="password" class="form-control" id="c_password" placeholder="Confirm Password" name="c_password" required>
					  </div>
					  <br><br>
					  <button type="submit" class="btn btn-primary" name='register' value="register">Submit</button>
					</form>				
				</div>
			</div>
		</div>
	</div>
<!-- </section> -->

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