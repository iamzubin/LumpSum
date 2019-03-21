<!DOCTYPE HTML>

<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<link rel="manifest" href="/manifest.json">
		<link rel="shortcut icon" type="image/png" href="img/3d5f84e1-4ee4-df9f-9478-b8bb866bf2f4.webPlatform.png"/>
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
		<title>Lump Sum Delivery</title>
	</head>
	<body>
		<!-- Wrapper -->
			<div id="wrapper">
				<!-- Header -->
					<header id="header">
						<div class="logo">
							<span><i class="fas fa-boxes"></i></span>
						</div>
						<div class="content">
							<div class="inner">
								<h1>Lump Sum Delvery</h1>
								<p>Get your food delivered to your hand from the tastiest vendors on campus!</p>
								<!-- <p>We are now closed! Thank you for all your support!!</p> -->
							</div>
						</div>
						<nav>
							<ul>
							  <!-- <li><a href="#closed">Closed</a></li> -->
							  <li><a href="#login">Login</a></li>
								<li><a href="#signup">Signup</a></li>
							</ul>
						</nav>
					</header>

				<!-- Main -->
					<div id="main">

						<!-- Login -->
							<article id="login">
								<h2 class="major">Login</h2>
								<form method="post" action="login.php">
									<div class="field half first">
										<label for="demo-email">Email</label>
										<input name="id" type="text" id="email" placeholder="Id" >
									</div>
							
									<div class="field half">
										<label for="demo-password">Password</label>
										<input type="password" name="password" id="demo-email" placeholder="Password" />
									</div>
									<div>
										<input value="submit" class="button" type="submit">
									</div>
								</form>
							</article>

						<!-- Signup -->
							<article id="signup">
								<h2 class="major">Signup</h2>
								<form method="post" action="signup.php">
										<div class="field first">
											<label for="name">Name</label>
											<input name="name" type="text" id="name" placeholder="Your Name" required="required">
										</div>
								
										<div class="field">
											<label for="email">Email</label>
											<input type="email" name="email" id="email" value="" placeholder="...@bennett.edu.in" required="required"/>
										</div>
										<div class="field">
												<label for="phone">Phone No.</label>
												<input type="tel" name="phone" id="phone" value="" placeholder="9876543210" pattern="[789][0-9]{9}"/>
										</div>
										
										<div class="field">
												<label for="">Password</label>
												<input type="password" name="password" id="password" value="" placeholder="123?" required="required"/>
										</div>

										<div class="field">
												<label for="">Referral</label>
												<input type="email" name="referral" id="referral" value="" placeholder="Have a Referral Code?" />
										</div>
										
										<div>
											<input type="submit" value="submit" class="button" >
										</div>
									</form>
								</article>
					</div>

				<!-- Footer -->
					<footer id="footer">
						<p class="copyright"> Made By Ad-venture </p>
					</footer>
			</div>

		<!-- Scripts -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/skel.min.js"></script>
		<script src="assets/js/util.js"></script>
		<script src="assets/js/main.js"></script>

	</body>
</html>
