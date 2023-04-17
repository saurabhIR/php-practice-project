<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>play store</title>
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
          <?php 
            if(!isset($_SESSION['username'])):
          ?>
            <button><a href="/Signup/new">Signup</a></button>
		        <button><a href="/Login/new">Login</a></button>
          <?php 
             endif;
          ?>
          <?php if (isset($_SESSION['username'])){
            if($_SESSION['username']=='kartik.khandelwal@innoraft.com'):
          ?>
            <button><a href="/Feed/new">Upload New App</a></button>
          <?php 
             endif; }
          ?>
            <a href="/Userprofile/create"><i class="fa-solid fa-user"></i></a>
        </div>
      </nav>
    </div>
  </header>
  <section class="section-first">
    <div class="view-all">
      <?php
        foreach ($row as $rows) { ?>
          <div class='data-fetch'><h2><a href='/Feed/app?id=<?php echo$rows["app_id"]?>'><?php echo$rows["app_name"]?></a></h2>
          <p><strong>Created by:</strong><?php echo $rows["developer"]?></p>
          <p><?php echo$rows["description"] ?></p>
          <img src="<?php echo$rows["image"]?>" alt='img'></div>
      <?php }
      ?>
    </div>
  </section>
</body>
</html>