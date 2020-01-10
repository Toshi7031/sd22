        <div id="main_area">
            <div id="contents_area">
                <h2>PC・タブレットの商品一覧</h2>
                <div class="pager">
                    <ul class="move_page">
                        <li class='before_page'>&lt;</li>
                        <li class='first_page'>&lt;&lt;</li>
                    </ul>
                    <ul class="page_number">
                        <li><?php //echo $page -2 ?></li>
                        <li><?php //echo $page -1 ?></li>
                        <li><?php //echo $page ?></li>
                        <li><?php //echo $page +1 ?></li>
                        <li><?php //echo $page +2 ?></li>
                    </ul>
                    <ul class="move_page">
                        <li class='next_page'>&gt;</li>
                        <li class='last_page'>&gt;&gt;</li>
                    </ul>
                </div><!-- pager -->
                <ul>
<?php // for(;;): ?>
                   <li class="products">
                        <a href="./product_deteals.html">
                            <ul>
                                <li class="product_img"><img src="../images/products/61Yyhwxq32L._AC_SL1200_.jpg"
                                        width="180px" height="180px" alt=""></li>
                                <li class="product_name">商品名</li>
                                <li class="product_price">商品価格</li>
                                <li class="favorite"><img src="../images/image_materials/hart.jpg" width="30"
                                        height="30" alt=""></li>
                            </ul>
                        </a>
                    </li>
<?php // endfor; ?>
                </ul>
            </div><!-- contents_area -->
            <div class="pager">
                <ul class="move_page">
                    <li class='before_page'>&lt;</li>
                    <li class='first_page'>&lt;&lt;</li>
                </ul>
                <ul class="page_number">
                    <li><?php //echo $page -2 ?></li>
                    <li><?php //echo $page -1 ?></li>
                    <li><?php //echo $page ?></li>
                    <li><?php //echo $page +1 ?></li>
                    <li><?php //echo $page +2 ?></li>
                </ul>
                <ul class="move_page">
                    <li class='next_page'>&lt;</li>
                    <li class='last_page'>&lt;&lt;</li>
                </ul>
            </div><!-- pager -->
        </div>