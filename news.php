<?php
require_once __DIR__ . '/src/helper.php';

$user = currentUser();

?>

<!DOCTYPE html>
<html lang="en">

<?php include_once __DIR__ . '/components/head.php' ?>

<body>
<!--push menu cart -->
<?php include_once __DIR__ . '/components/cart.php' ?>
<!--END  Modal content-->
<div class="wrappage">
    <?php include_once __DIR__ . '/components/header.php' ?>
    <!-- /header -->
    <!--hero-section-->
    <div class="container container-fullwidth">
        <div class="hero-section" style="background: url(img/about/news.png) no-repeat center;">
            <div class="box-center v2">
                <h1 class="page-title">Новини</h1>
            </div>
        </div>
    </div>
    <!--end hero-section-->
    <div class="main-container blog--listing">
        <div class="container">
            <div class="row">
                <div class="col-md-12 blog-post-item-list">
                    <div class="blog-post-item v2">
                        <div class="blog-img">
                            <a class="hover-images" href="">
                                <img src="img/blog/blog1.jpg" alt="" class="img-reponsive">
                            </a>
                        </div>
                        <div class="blog-post-info">
                            <div class="post-metas ver-list">
                                <div class="post-date">22 лютого 2022 року</div>
                                <span class="post-comments-number">3</span>
                            </div>
                            <div class="clearfix"></div>
                            <h3 class="post-name "><a href="#">Lorem ipsum dolor sit amet.</a></h3>
                            <p class="post-desc">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores consectetur distinctio eius harum minima quam saepe sit, suscipit temporibus voluptatem.
                            </p>
                            <div class="categories">
                                <a href="#" rel="category tag">НОВИНКИ</a>,
                                <a href="#" rel="category tag">2023</a>
                            </div>
                            <a href="#" class="readmore--ver2">Дізнатись більше</a>
                        </div>
                    </div>
                </div>


            </div>
            <div class="pagination-container button-v v6">
                <nav>
                    <ul class="pagination">
                        <li><a class="active" href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li>
                            <a href="#" aria-label="Previous">
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<?php include_once __DIR__ . '/components/footer.php' ?>
<a href="#" class="scroll_top">ПРОКРУТИТИ ДО ВЕРХУ<span></span></a>
<?php include_once __DIR__ . '/components/script.php' ?>
</body>

</html>