<!DOCTYPE html>
<html>
<head>
	<title>play store Login Page</title>
	<link rel="stylesheet" type="text/css" href="/css/login-signup.css">
</head>
<body>
	<div class="login-container">
		<h1>Login</h1>
		<form action="/Login/create" method="post">
			<label for="username">Email:</label>
			<input type="text" id="username" name="username" required>
			<label for="password">Password:</label>
			<input type="password" id="password" name="password" required>
			<input type="submit" value="Login">
		</form>
		<p>Don't have an account? <a href="/Signup/new">Register here</a></p>
	</div>
</body>
</html>
