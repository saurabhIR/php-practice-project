<?php use App\Flash; ?>
<!DOCTYPE html>
<html>
<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="/css/feed.css">
		<title>onfirm password</title>
</head>
<body>
	<section class="flex-justify-centre">
		<div>
			<form class="forget-form" action="/Password/reset" method="POST"> 
			<h2>Enter password carefully</h2>
				<label for="repeat_password">Password</label>
				<input type="password" name="password" id="password" required pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$" title="Minimum 6 chars, at least one letter and number">
				<label for="confirmpassword">Repeat Password</label>
				<input type="password" name="confirmpassword" id="confirmpassword" required>
				<input id="reset-button" type="submit" value="Reset password">
			</form>
			<script src="/js/forget-password.js"></script>
		</div>
	</section>
</body>
</html>