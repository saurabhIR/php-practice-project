<!DOCTYPE html>
<html>
<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="/css/feed.css">
		<title>Password reset</title>
</head>
<body>
	<section class="flex-justify-centre">
		<div>
			<form class="forget-form" action="/Password/requestreset" method="post">
					<h2>Request password reset</h2>
					<label for="inputEmail">Email</label>
					<input type="email" id="inputEmail" name="email" placeholder="Email address" required>
					<input id="reset-button" type="submit" value="Password reset">
					<button> <a href = "/login/new">Back to Login Page</a></button>
			</form>
		</div>
	</section>
</body>
</html>