<!DOCTYPE html>
<html>
<head>
	<title>Review App</title>
	<link rel="stylesheet" type="text/css" href="/css/rating-form.css">
</head>
<body>
  <form method="POST" action="/Review/create">
    <input type="hidden" name="app_id" value="<?php echo $app_id;?>">
    <label for="review_text">Review Text:</label>
    <textarea id="review_text" name="review_text" required></textarea>
    <label for="rating">Rating (1-5):</label>
    <input type="number" id="rating" name="rating" min="1" max="5" required>
    <input type="submit" value="Submit Review">
  </form>
</body>
</html>

