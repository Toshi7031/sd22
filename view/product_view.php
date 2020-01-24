        <div id="main_area">
            <div id="contents_area">
                <h2>「<?php echo $word ?>」の商品一覧</h2>
                <div class="pager">
                    <ul class="move_page">
                        <li class='before_page'>&lt;</li>
                        <li class='first_page'>&lt;&lt;</li>
                    </ul>
                    <ul class="page_number">
                        <li><?php if($page > 2)echo $page -2 ?></li>
                        <li><?php if($page > 1)echo $page -1 ?></li>
                        <li><?php echo $page ?></li>
                        <li><?php echo $page +1 ?></li>
                        <li><?php echo $page +2 ?></li>
                    </ul>
                    <ul class="move_page">
                        <li class='next_page'>&gt;</li>
                        <li class='last_page'>&gt;&gt;</li>
                    </ul>
                </div><!-- pager -->
                <ul>
<?php  foreach($product_array as $product): ?>
                   <li class="products">
                        <a href="./product_deteals.php?id=<?php echo $product['id'] ?>">
                            <ul>
                                <li class="product_image"><img src="../images/products/product_<? echo $product['id'] ?>_1.jpg" width="180px" height="180px" alt=""></li>
                                <li class="product_name"><?php echo $product['product_name'] ?></li>
                                <li class="product_price"><?php echo $product['price'] ?>円</li>
                                <li class="favorite"><img src="../images/image_materials/hart.jpg" width="30" height="30" alt=""></li>
                            </ul>
                        </a>
                    </li>
<?php  endforeach; ?>
                </ul>
            </div><!-- contents_area -->
            <div class="pager">
                <ul class="move_page">
                    <li class='before_page'>&lt;</li>
                    <li class='first_page'>&lt;&lt;</li>
                </ul>
                <ul class="page_number">
                        <li><?php if($page > 2)echo $page -2 ?></li>
                        <li><?php if($page > 1)echo $page -1 ?></li>
                        <li><?php echo $page ?></li>
                        <li><?php echo $page +1 ?></li>
                        <li><?php echo $page +2 ?></li>
                </ul>
                <ul class="move_page">
                    <li class='next_page'>&gt;</li>
                    <li class='last_page'>&gt;&gt;</li>
                </ul>
            </div><!-- pager -->
        </div>