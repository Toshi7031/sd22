  <section id="main_area">
    <h2>お知らせ</h2>
    <ul>
<?php foreach($notification as $value): ?>
      <li><?php echo $value['notification'];?></li>
<?php endforeach; ?>
    </ul>
  </section>