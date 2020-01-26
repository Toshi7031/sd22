        <div id="main_area">
            <div id="contents_area">
            <h2><?php if($word != ""){ ?>「<?php echo $word ?>」の商品一覧 <?php } ?></h2>
                <ul>
<?php  foreach($product_array as $product): ?>
                   <li class="products">
                        <a href="./product_deteals.php?id=<?php echo $product['id'] ?>">
                            <ul>
                                <li class="product_image"><img src="../images/products/product_<?php echo $product['id'] ?>_1.jpg" width="180px" height="180px" alt=""></li>
                                <li class="product_name"><?php echo $product['product_name'] ?></li>
                                <li class="product_price">￥<?php echo $product['price'] ?></li>
                                <li class="favorite"><img src="../images/image_materials/hart.jpg" width="30" height="30" alt=""></li>
                            </ul>
                        </a>
                    </li>
<?php  endforeach; ?>
                </ul>
            </div><!-- contents_area -->
        </div>