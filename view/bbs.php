<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>掲示板</title>
    <link rel="stylesheet" href="../css/bbs.css">
</head>
<body>
<div class="wrapp">
   <div class="bbs_top">
       <ul>
           <li><button class="history_back" type="button" onclick="history.back()"><img src="../images/image_materials/arrow.png" alt=""></button><span>掲示板</span></li>
           <li><h2 class="bbs_name"><?php echo $thred[$thred_id - 1]['name']; ?></h2></li>
           <li><img class="title" src="../images/image_materials/logo.png" alt="まさる堂"></li>
       </ul>
   </div>
   <div class="bbs_contents">
        <ul>
        <?php for($i = 0;$talk[$i];$i++): ?>
            <li class="<?php echo $talk[$i]['class']; ?>"><img class="talk_image" src="../images/icons/<?php echo $talk[$i]['member_id'] ?>.jpeg" alt=""><span><?php echo $talk[$i]['name']; ?></span><p class="talk"><?php echo $talk[$i]['comment']; ?></p></li>
        <?php endfor; ?>
        </ul>
        <div class="talk_send">
            <form action="" method="get" class='flex'>
                    <textarea class="send_text" name="comment" cols="30"></textarea>
                    <button type="submit"><img src="../images/image_materials/plane.png" alt=""></button>
            </form>
        </div>
   </div>
</div>
</body>
</html>