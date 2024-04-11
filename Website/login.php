<?php
    include_once 'dbc.php';
	require_once 'signup-form.php';
?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="loginStyle.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="loginScript.js"></script>
</head>
<body>
<div class="login-form-container">
	<div class="form-container sign-up-container">
		<form action="login.php" id="signup-form" method="post">
			<h1>Create Account</h1>
			<?php if(count($error) > 0): ?>
				<label class="incorrect-input">
					<?php foreach($error as $errors):
						echo $errors;
					endforeach; ?>
				</label>
			<?php endif; ?>	
			<input id="sign-up-form-username" value="<?php echo $username; ?>" type="text" name="username" placeholder="Username" />
			<label class="error-message username-error"></label>
			<input id="sign-up-form-email" value="<?php echo $email; ?>" type="email" name="email" placeholder="Email" />
            <label class="error-message email-error">Enter a valid email address</label>
			<input id="sign-up-form-password" type="password" name="password" placeholder="Password" />
            <label class="error-message Password-error"></label>
			<button type="submit" name="signup-button">SIGN UP</button>
		</form>
	</div>
	<div class="form-container log-in-container">
		<form id="login-form" action="login.php" method="post">
			<h1>Log in</h1>
			<label class="incorrect-input">
				<?php echo $errorUsername?>
			</label>
			<input id="login-form-username" name="login-username" type="text" placeholder="Username" />
			<label class="error-message login-username-error"></label>
			<input id="login-form-password" name="login-password" type="password" placeholder="Password" />
			<label class="error-message login-password-error"></label>
			<a href="#">Forgot your password?</a>
			<button type="submit" name="login-button" >LOG IN</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To connect to your personal account, login your personal credentials</p>
				<button class="ghost" id="Login">LOG IN</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>New user?</h1>
				<p>Enter your personal details to create an account and connecting</p>
				<button class="ghost" id="signUp">SIGN UP</button>
			</div>
		</div>
	</div>
</div>
</body>