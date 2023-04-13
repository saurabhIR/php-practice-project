<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/feed.css">
    <title>OTP validate</title>
</head>
<body>
  <section class="flex-justify-centre">
    <div>
      <form class="forget-form"action="/Password/checkOtp" method="POST">
          <h2>Please check your mail</h2>
          <label for="otp">OTP:</label>
          <input type="text" name="otp" id="otp" required >
          <input id="reset-button" type="submit" value="Check OTP">
      </form>
    </div>
	</section>
</body>
</html>
