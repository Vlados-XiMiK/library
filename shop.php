<?php
require_once __DIR__ . '/src/helper.php';




$user = currentUser();
$products = getAllProducts();


if (isset($_POST['add_to_cart'])) {
    $productId = $_GET['id'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $avatar = $_POST['avatar'];

    addToCart($productId, $title, $price, $avatar);
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>BOOKSPACE</title>
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slick-theme.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="shortcut icon" href="img/favicon.png" type="image/png">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
<!--push menu cart -->
<?php include_once __DIR__ . '/components/cart.php' ?>
<!--END  Modal content-->
<?php include_once __DIR__ . '/components/header.php' ?>
<!-- /header -->
<div class="page-heading">
    <div class="banner-heading">
        <img src="img/about/shop3.jpg" alt="" class="img-reponsive">
        <div class="heading-content text-center">
            <div class="container container-42">
                <h1 class="page-title white">BOOKSPACE</h1>
                <ul class="breadcrumb white">
                    <li><a href=""></a></li>
                    <li><a href=""></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="nav nav-tabs nav-justified nav-filter white">
        <ul class="owl-carousel owl-theme js-owl-category">
            <li class="active"><a data-toggle="pill" href="#all">Все</a></li>
            <li><a data-toggle="pill" href="#">НОВИНКИ 2023</a></li>
            <li><a data-toggle="pill" href="#">ОСІННЯ КОЛЕКЦІЯ</a></li>
            <li><a data-toggle="pill" href="#">ЗИМОВА КОЛЕКЦІЯ</a></li>
            <li><a data-toggle="pill" href="#">НОВИНКИ 2024</a></li>
            <li><a data-toggle="pill" href="#">НОВИНКИ 2024</a></li>
        </ul>
    </div>
</div>
<div class="wrap-filter">
    <div class="wrap-filter-box wrap-filter-number">
        <ul class="pagination">
            <li class="active"><a href="">4</a></li>
            <li><a href="">5</a></li>
            <li><a href="">6</a></li>
        </ul>
        <span class="total-count">Показано 1-12 із 30 товарів</span>
    </div>
    <div class="wrap-filter-box text-center view-mode">
        <a class="col" href="#"><span class="icon-grid-img"></span></a>
    </div>
    <div class="wrap-filter-box text-center js-filter"><a href="#" class="filter-title"><i class="icon-equalizer"></i></a>
        <form action="#" method="get" class="form-filter-product js-filter-open">
            <span class="close-left js-close"><i class="icon-close f-20"></i></span>
            <div class="product-filter-wrapper">
                <div class="product-filter-inner text-left">
                    <div class="product-filter">
                        <div class="form-group">
                            <span class="title-filter">Автор</span>
                            <button class="dropdown-toggle form-control" type="button" data-toggle="dropdown">Оберіть автора
                            </button>
                            <ul class="dropdown-menu">
                                <li>Стівен Кінг</li>
                                <li>Леся Українка</li>
                                <li>Тарас Шевченко</li>
                            </ul>
                        </div>
                    </div>

                    <div class="product-filter">
                        <div class="form-group">
                            <span class="title-filter">Ціна</span>
                            <div class="filter-content">
                                <div class="price-range-holder">
                                    <input type="text" class="price-slider" value="">
                                </div>
                                <span class="min-max">
                                    Ціна: ₴30 — ₴3450
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="product-filter-button-group clearfix">
                    <div class="product-filter-button">
                        <a href="" class="btn-submit">Фільтрувати </a>
                    </div>
                    <div class="product-filter-button">
                        <a href="" class="btn-submit">Очистити </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="wrap-filter-box text-center view-mode">
        <a class="list" href="#" onClick="return false;"><span class="icon-list-img"></span></a>
    </div>
    <div class="wrap-filter-box wrap-filter-sorting">
        <button class="dropdown-toggle" type="button" data-toggle="dropdown" id="menu2">Сортувати за новизною
        </button>
        <ul class="dropdown-menu" role="menu" aria-labelledby="menu2">
            <li><a href="#" title="">Сортувати за новизною</a></li>
            <li><a href="#" title="">Найкращі продажі</a></li>
            <li><a href="#" title="">Найнижча ціна</a></li>
            <li><a href="#" title="">Найвища ціна</a></li>
        </ul>
    </div>
    <div class="clearfix"></div>
</div>
<div class="product-standard product-grid">
    <div class="container container-42">
        <div class="tab-content">
            <div id="all" class="tab-pane fade in active">
                <div class="row">


                    <?php foreach ($products as $product): ?>
                        <div class="col-md-15 col-sm-3 col-xs-6 product-item">

                            <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>?id=<?= $product['id'] ?>" id="cart">
                                <div class="product-images">
                                    <a href="#" class="hover-images effect">
                                        <img src="<?php echo $product['avatar']; ?>" alt="photo" class="img-responsive img-book">
                                    </a>
                                    <a href="#" class="btn-add-wishlist ver2"><i class="icon-heart"></i></a>
                                    <a href="product.php?book_id=<?php echo $product['id']; ?>" class="btn-quickview">ШВИДКИЙ ПЕРЕГЛЯД</a>
                                </div>
                                <div class="product-info-ver2">
                                    <h3 class="product-title"><a href="#"><?php echo $product['title']; ?></a></h3>
                                    <div class="product-after-switch">
                                        <div class="product-price"><?php echo '₴' . $product['price']; ?></div>
                                        <input type="hidden" name="title" value="<?= $product['title'] ?>">
                                        <input type="hidden" name="price" value="<?= $product['price'] ?>">
                                        <input type="hidden" name="avatar" value="<?= $product['avatar'] ?>">
                                        <div class="product-after-button">
                                            <button  style="background-color: transparent" name="add_to_cart" type="submit" class="addcart">ДОДАТИ У КОШИК</button>
                                        </div>
                                    </div>
                                    <div class="rating-star">
                                        <span class="star star-5"></span>
                                        <span class="star star-4"></span>
                                        <span class="star star-3"></span>
                                        <span class="star star-2"></span>
                                        <span class="star star-1"></span>
                                    </div>
                                    <p class="product-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi, eius.</p>
                                    <div class="product-price"><?php echo '₴' . $product['price']; ?></div>
                                    <div class="button-group">
                                        <button name="add_to_cart"  type="submit" class="button add-to-cart">Додати у кошик</button>
                                        <a href="product.php?book_id=<?php echo $product['id']; ?>" class="button add-view">Переглянути</a>
                                    </div>
                                </div>

                            </form>

                        </div>
                    <?php endforeach; ?>











                </div>
                <div class="pagination-container pagination-blog button-v text-center">
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
</div>
<footer>
    <div class="container container-42">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="menu-footer">
                    <ul>
                        <li><a href="#">Правила та умови</a></li>
                        <li><a href="#">Політика конфіденційності</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="newletter-form">
                    <h3 class="footer-title text-center">ОТРИМУВАТИ НОВИНИ НА ЕЛЕКТРОННУ АДРЕСУ</h3>
                    <form action="#">
                        <input type="text" name="s" placeholder="Введіть електронну адресу..." class="form-control">
                        <button type="submit" class="btn btn-submit">
                            <i class="fa fa-angle-right"></i>
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                <div class="social">
                    <a href="#" title="twitter">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a href="#" title="facebook">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a href="#" title="google plus">
                        <i class="fa fa-google-plus"></i>
                    </a>
                    <a href="#" title="Pinterest">
                        <i class="fa fa-pinterest-p"></i>
                    </a>
                    <a href="#" title="rss">
                        <i class="fa fa-rss"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>
</footer>

<a href="#" class="scroll_top">ПРОКРУТИТИ ДО ВЕРХУ<span></span></a>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/bootstrap-slider.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/masonry.pkgd.min.js"></script>
<script src="js/main.js"></script>
</body>

</html>