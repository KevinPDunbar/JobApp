<html>

<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<script src="js/jquery-1.11.0.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

</head>
<body>

	<div class="header" id="home">
		<div class="container">
			<div class="head">
			<div class="logo">
                            <h1>Logo here</h1>
			</div>
			<div class="navigation">
				 <span class="menu"></span> 
					<ul class="navig">
						<li><a href="index.php">Home</a></li>
                                                <li><a href="about.html">About</a></li>
						<li><a href="contact.html"  class="active">Contact</a></li>
                                                <li><a href="login.php">Log In</a></li>
					</ul>
			</div>
				<div class="clearfix"></div>
			</div>
			</div>
		</div>	
	
    
	<!-- script-for-menu -->
		 <script>
				$("span.menu").click(function(){
					$(" ul.navig").slideToggle("slow" , function(){
					});
				});
		 </script>
	
                 <!--start-contact-->
	 <div class="contact">
	 	<div class="container">
	 		<div class="contact-mian">
	 			<h3>Create Account</h3>
	 			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vulputate velit a velit consectetur luctus. Etiam in malesuada turpis. Praesent at accumsan elit.</p>
	 			<div class="contact-top">
                                    <form action = "register.php" method = "post">
                  <label>First Name:</label> <input type = "text" id="firstName" class = "box" /><br/><br />
                  <label>Last Name:</label> <input type = "text" id="lastName" class = "box" /><br/><br />
                  <label>Username:</label> <input type = "text" id="username" class = "box" /><br/><br />
                  <label>Password:</label>n<input type = "password" id="password" class = "box" /><br/><br />
                  <label>Email:</label> <input type = "text" id="email" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
	 				
						</div>
	 			</div>
	 		</div>
                    
                    
                    
	 	</div>
	 </div>

	 

						 
</body>
</html>