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
<title>BOOKSPACE</title>
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


<!-- End cart -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">ПОШУК КНИГИ</h4>
            </div>
            <div class="modal-body">
                <div class="input-group">
                    <form method="get" class="searchform" action="/search" role="search">
                        <input type="hidden" name="type" value="product">
                        <input type="text" name="q" class="form-control control-search">
                        <span class="input-group-btn">
                              <button class="btn btn-default button_search" type="button"><i data-toggle="dropdown" class="fa fa-search"></i></button>
                            </span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--END  Modal content-->
<div class="wrappage">
    <header id="header" class="header-v4 header-top-absolute home-clean">
        <div class="sticky-header border-grey-bottom text-center hidden-xs hidden-sm">
            <div class="text">
                <span class="u-line">Welcome</span> на всі замовлення знижка понад 100₴
            </div>
        </div>
        <div class="topbar">
            <div class="container container-40">
                <div class="topbar-left">
                    <div class="topbar-option">
                        <div class="topbar-account">
                            <?php include_once __DIR__ . '/components/user_head.php' ?>

                        </div>
                        <div class="topbar-wishlist">
                            <a href="#">
                                <i class="icon-heart f-15"></i>
                                <span class="count wishlist-count">0</span>
                            </a>
                        </div>
                    </div>
                    <!--end topbar-option-->
                </div>
                <!--end topbar-left-->
                <div class="topbar-right">
                    <div class="topbar-option">
                        <div class="topbar-search">
                            <div class="search-popup dropdown" data-toggle="modal" data-target="#myModal">
                                <a href="#"><i class="icon-magnifier f-15"></i></a>
                            </div>
                        </div>

                        <div class="topbar-cart">
                            <a href="#" class="icon-cart">
                                <i class="icon-basket f-15"></i>
                                <span class="count cart-count">0</span>
                            </a>
                        </div>
                    </div>
                    <!--end topbar-option-->
                </div>
                <!--end topbar-right-->
                <!-- menu with logo-->
                <div class="topbar-center hidden-xs hidden-sm">
                    <ul class="nav navbar-nav js-menubar" style=" right: 5%;">

                        <li class="level1 dropdown hassub">
                            <a href="#">Партнерство</a>
                            <span class="plus js-plus-icon"></span>
                            <div class="menu-level-1 dropdown-menu">
                                <ul class="level1">
                                    <li class="level2 col-3">
                                        <a href="#">Навчальні заклади</a>
                                        <ul class="menu-level-2">
                                            <li class="level3"><a href="http://kntu.net.ua/ukr" title="About Shop">ХНТУ</a></li>
                                        </ul>
                                    </li>
                                    <li class="level2 col-3">
                                        <a href="#">Клуби</a>
                                        <ul class="menu-level-2">
                                            <li class="level3"><a href="#" title="PANDORA">Клуб "PANDORA"</a></li>
                                        </ul>
                                    </li>

                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </li>

                        <li class="level1"><a href="index.php" title="home-logo"><img src="img/logo.png" alt="logo" class="img-responsive " ></a></li>

                        <li class="level1 active dropdown">
                            <a href="blog_listing.html">Новини</a>
                            <span class="plus js-plus-icon"></span>
                        </li>

                    </ul>
                </div>
                <!-- end menu with logo-->
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="header-top hidden-lg hidden-md">
            <div class="container container-40">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="logo-mobile hidden-lg hidden-md">
                            <a href="index.php" title="home-logo"><img src="img/logo.png" alt="logo" class="img-reponsive"></a>
                        </div>
                        <!--end logo-->
                        <button type="button" class="navbar-toggle icon-mobile" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-menu"></span>
                        </button>
                        <nav class="navbar main-menu">
                            <div class="collapse navbar-collapse" id="myNavbar">
                                <ul class="nav navbar-nav js-menubar">



                                    <li class="level1 dropdown hassub">
                                        <a href="#">Партнерство</a>
                                        <span class="plus js-plus-icon"></span>

                                    </li>
                                    <li class="level1 active dropdown">
                                        <a href="blog_listing.html">Новини</a>
                                        <span class="plus js-plus-icon"></span>

                                    </li>

                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- /header -->
    <!--slide-->
    <div class="wrapper-slider homeclean-slider js-homeclean-slider">
        <div class="slider-img ">
            <img src="img/book2.png" alt="" class="img-responsive">
            <div class="container box-center">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="slider-content text-center">
                            <h1>2023-2024</h1>
                            <a href="shop.php" class="btn-shop">Перейти до покупок</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider-img ">
            <img src="img/book2.png" alt="" class="img-responsive">
        </div>
    </div>
    <!--endslide-->
    <!--banner-->
    <div class="container container-40">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="banner-img">
                    <a class="" href="#"><img src="img/osen.png" alt="banner" class="img-reponsive"></a>
                    <div class="banner-content">
                        <h3 class="banner-title">Осіння колекція</h3>
                        <p>Знижка понад 20%</p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="banner-img">
                    <a class="" href="#"><img src="img/zima.png" alt="banner" class="img-reponsive"></a>
                    <div class="banner-content">
                        <h3 class="banner-title" style="text-stroke: 10px #3213713;">Зимова колекція</h3>
                        <p>Новинки 2023 року</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--en-banner-->
    <!--wrapper product-->
    <div class="wrapper-product space-margin-top-85 ">
        <div class="container container-40">
            <h3 class="heading-v2 text-center">Рекомендовані товари</h3>
            <div class="row">

                <?php
                // Лічильник для обмеження до 5 елементів
                $maxDisplayedItems = 5;
                $displayedItemCount = 0;
                ?>

                <?php
                // Перемішуємо масив книг для випадкового порядку
                shuffle($products);
                ?>

                <?php foreach ($products as $product): ?>
                    <?php if ($displayedItemCount < $maxDisplayedItems): ?>
                        <div class="col-md-15 col-sm-3 col-xs-6 product-item">

                            <form method="post" action="index.php?id=<?= $product['id'] ?>">
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
                                            <button style="background-color: transparent" name="add_to_cart" type="submit" class="addcart">ДОДАТИ У КОШИК</button>

                                        </div>
                                    </div>
                                    <div class="rating-star">
                                        <span class="star star-5"></span>
                                        <span class="star star-4"></span>
                                        <span class="star star-3"></span>
                                        <span class="star star-2"></span>
                                        <span class="star star-1"></span>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <?php $displayedItemCount++; ?>
                    <?php endif; ?>
                <?php endforeach; ?>

            </div>
            <div class="button-v v7 text-center">
                <a class="btn-loadmore" href="shop.php"><i class="icon-refresh f-15"></i>Дивитись більше</a>
            </div>
        </div>
    </div>
    <!--end wrapper product-->
    <!--newsletter-->
    <div class="container container-40">
        <div class="newsletter">

        </div>
    </div>
    <!--end newsletter-->

    <!-- footer -->
    <?php include_once __DIR__ . '/components/footer.php' ?>
</div>
<!--end footer-->
<a href="#" class="scroll_top">ПРОКРУТИТИ ДО ВЕРХУ<span></span></a>
<?php include_once __DIR__ . '/components/script.php' ?>

</body>

</html>