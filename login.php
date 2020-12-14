<!DOCTYPE html>
<html>
	<head>
		<title> Login </title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	</head>

	<body class="login-body">
		<div class="card-login">
			<div class="content">
			
				<div class="title">
					<h2> LOGIN </h2>
					<div class="underline"> </div>
				</div>

				<form method="post" class="form-login">
					<label for="username" style="padding-top:13px" class="label-login">&nbsp;Username</label>
	  				<input id="username" class="form-content" type="text" name="username" autocomplete="on" required />
	  				<div class="form-border"></div>

	  				<label for="user-password" style="padding-top:22px" class="label-login">&nbsp;Password</label>
	  				<input id="user-password" class="form-content" type="password" name="password" required />
	  				<div class="form-border"></div>

	  				<a href="#" class="a-login"><legend id="forgot-pass">Forgot password?</legend></a>
	  				<button type="button" name="submit" class="button-login"> LOGIN </button>

	  				<p class="p-login"> Dont Have Account? <a href="register.html" class="a-login"> Sign in here </a> </p>
				</form>
				
			</div>
		</div>

	</body>
</html>