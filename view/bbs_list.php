<body>
<div class="wrapp">
  <div class="contents">
    <ul class='bbs_list'>
      <?php foreach($array_thred as $thred): ?>
      <li><a href="./bbs.php?id=<?php echo $thred['id'] ?>"><h2><?php echo $thred['name'] ?></h2><p><?php echo $thred_genre[$thred['genre']] ?></p></a></li>
      <?php endforeach; ?>
    </ul>
  </div>
</div>
</body>
</html>