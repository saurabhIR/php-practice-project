<!DOCTYPE html>
<html>
<head>
	<title>Signup Page</title>
	<link rel="stylesheet" type="text/css" href="/css/login-signup.css">
</head>
<body>
	<div class="login-container">
		<h1>Signup
    </h1>
		<form action="/Signup/create" method="post">
			<label for="username">Email:</label>
			<input type="text" id="username" name="username" required>
			<label for="password">Password:</label>
			<input type="password" id="password" name="password" required>
			<input type="submit" value="Login">
		</form>
		<p>Already have an account? <a href="/Login/new">Login here</a></p>
	</div>
</body>
</html>
