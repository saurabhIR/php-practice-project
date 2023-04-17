<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>play store</title>
  <link rel="stylesheet" href="/css/feed-view.css">
  <link rel="stylesheet" href="/css/viewApp.css">
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
          <a href="/Userprofile/create"><i class="fa-solid fa-user"></i></a>
        </div>
      </nav>
    </div>
  </header>
  <section class="section-first">
    <div class="view-all">
      <div class='data-fetch'>
        <h2><?php echo $row["app_name"];?></h2>
        <img src="<?php echo $row['image'];?>" alt='img'>
        <p><strong>Created by: </strong><?php echo $row["developer"];?></p>
        <p><?php echo $row["description"] ;?></p>
        <button id="toggle-button">Toggle Reviews</button>
      </div>
    </div>
    <div class="reviews">
      <?php foreach($reviews as $review){ ?>
        <div class="sig-review">
          <h4><?php echo $review['username'];?></h4>
          <p>rating:<?php echo $review['rating'];?></p><span><?php echo $review['created_at'];?></span>
          <p><?php echo $review['review_text'];?></p>
        </div>  
      <?php }?>
      <script src="/js/viewApp.js"></script>
    </div>
    <div class="link">
      <form class="download-form" action="/Edit/download" method="post">
        <input type="hidden" name="app_id" value='<?php echo $row["app_id"];?>'>
        <input type="submit" value="Download">
      </form>
      <button class="review-button"><a href="/Review/new?id=<?php echo $row["app_id"];?>">Review this app</a></button>
    </div>
    <div class="link">
      <a href="/Feed/view">Go back to home page</a>
    </div>
    <?php
      $user=$_SESSION['username'];
      if($user=="kartik.khandelwal@innoraft.com"):
    ?>
    <div class="buttons">
      <button><a href="/Edit/new?id=<?php echo$row["app_id"];?>">Edit</a></button>
      <button><a href="/Edit/delete?id=<?php echo$row["app_id"];?>">Delete</a></button>
    </div>
    <?php
    endif;
    ?>
  </section>
</body>
</html>
