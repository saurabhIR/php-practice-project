
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PlayStore Add App</title>
  <link rel="icon" type="image/x-icon" href="/image/SQuora.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="/css/feed-view.css">
  <link rel="stylesheet" href="/css/feed.css">
</head>
<body>
  <header>
    <div class="container">
      <nav class="flex-justify-between">
        <div class="head-left">
          <a href="/Feed/view"><img src="/image/playstore.png" alt="logo"></a>
        </div>
        <div class="head-right">
          <a href="/Userprofile/create"><i class="fa-solid fa-user"></i></a>
        </div>
      </nav>
    </div>
  </header>
  <main>
    <div class="container">
      <section class="feed-questions">
        <form method="POST" action="/Feed/create" enctype="multipart/form-data">
          <label for="name">Name:</label>
          <input type="text" name="name" required>
          <label for="description">Description:</label>
          <textarea name="description" required></textarea>
          <label for="image">Image:</label>
          <input type="file" name="photo" accept=".jpg,.jpeg,.png" required>
          <label for="text-file">Text File:</label>
          <input type="file" name="text-file" accept=".txt" required>
          <label for="developer">Developer:</label>
          <input type="text" name="developer" required>
          <button type="submit">Add App</button>
        </form>
      </section>
      <section class="feed-display">
		    <button><a href="/Feed/view">View Apps</a></button>
      </section>
    </div>
  </main>
</body>
</html>