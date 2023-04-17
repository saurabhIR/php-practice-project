
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SQuora</title>
  <link rel="icon" type="image/x-icon" href="/image/SQuora.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="/css/feed.css">
  <link rel="stylesheet" href="/css/feed-view.css">
</head>
<body>
  <header>
    <div class="container">
      <nav class="flex-justify-between">
        <div class="head-left">
          <a href="/Feed/new"><img src="/image/playstore.png" alt="logo"></a>
        </div>
        <div class="head-right">
          <a href="/Userprofile/create"><i class="fa-solid fa-user"></i></a>
        </div>
      </nav>
    </div>
  </header>
  <main>
    <?php
    $user=$_SESSION['username'];
    if($user=='kartik.khandelwal@innoraft.com'){
    ?>
    <div class="container">
      <section class="feed-questions">
        <form action="/Edit/create?id=<?php echo $row['app_id'];?>" method="POST" enctype="multipart/form-data">
          <label for="name">Name:</label>
          <input type="text" name="name" value="<?php echo $row['app_name']?>" required>
          <label for="description">Description:</label>
          <textarea name="description" required><?php echo $row['description']?></textarea>
          <label for="image">Image:</label>
          <input type="file" name="photo" accept=".jpg,.jpeg,.png" required>
          <label for="text-file">Text File:</label>
          <input type="file" name="text-file" accept=".txt" required>
          <label for="developer">Developer:</label>
          <input type="text" name="developer" value="<?php echo $row['developer']?>" required>
          <button type="submit">Update App</button>
        </form>
      </section>
    </div>
  </main>
  <?php
  }
  else{
    header('Location:/Feed/view');
  }
  ?>
</body>
</html>
