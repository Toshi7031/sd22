    <section id="main_area">
      <h2>お知らせ</h2>
<?php if(count($notification)!==0):?>
<?php foreach($notification as $value): ?>
      <ul>
        <li class="notification">
          <p><?php echo $value['notification'];?></p>
          <p><?php echo $value['date'];?></p>
        </li>
<?php endforeach; ?>
      </ul>
<?php else:?>
      <p>お知らせはまだ届いていません。</p>
<?php endif;?>
</section>
  </div>