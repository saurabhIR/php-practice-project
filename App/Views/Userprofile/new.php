<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SQuora</title>
  <link rel="stylesheet" href="/css/feed-view.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<header>
    <div class="container">
      <nav class="flex-justify-between">
        <div class="head-left">
          <a href="/Feed/view"><img src="/image/playstore.png" alt="logo"></a>
        </div>
        <div class="head-right">
          <button><a href="/Feed/new">Post New Question</a></button>
          <button><a href="/Logout/new">Logout</a></button>
          <a href="/Userprofile/create"><i class="fa-solid fa-user"></i></a>
        </div>
      </nav>
    </div>
  </header>
  <section class="section-first">
    <div class="details">
      <h3><?php echo $row[0]["fullname"]?></h3>
      <h3>All of your Posts</h3>
    </div>
  <div class="view-all">
  <?php
        foreach($row as $rows){
          echo "<div class='data-fetch'><h2><a href='/Feed/question?id=" . $rows["id"] . "'>" . $rows["title"] . "</a></h2>";
          echo "<p><strong>Asked by:</strong> " . $rows["username"] . "</p>";
          echo "<p>" . $rows["description"] . "</p>";
          echo "<p><strong>Interest:</strong> " . $rows["interest"] . "</p>";
          echo "<p><strong>Date:</strong> " . $rows["date"] . "</p></div>";
        }
  ?>
  </div>
  <div class="link">
  <a href="/Feed/view">Go back to home page</a>
  </div>
  </section>
</body>
</html>