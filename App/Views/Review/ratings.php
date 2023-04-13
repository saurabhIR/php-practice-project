<?php
  foreach($row as $rows){
    echo "<div class='data-fetch'><h2>". $rows["app_name"] . "</a></h2>";
    echo "<p><strong>reviewed by:</strong> " . $rows["username"] . "</p>";
    echo "<p><strong>rating</strong> " . $rows["rating"] ."/5" ."</p>";
    echo "<p><strong></strong> " . $rows["review text"] . "</p></div>";
  }
  echo "<a href='/Feed/view'>Go back to home page</a>"
?>