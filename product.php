<?php
require_once __DIR__ . '/src/helper.php';

$user = currentUser();

$bookId = isset($_GET['book_id']) ? $_GET['book_id'] : null;


if (!$bookId) {
    echo "Помилка: Ідентифікатор книги не надіслано.";
    redirect('404.php');
    exit;
}

if (isset($_POST['add_to_cart'])) {
    $productId = $_GET['id'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $avatar = $_POST['avatar'];

    addToCart($productId, $title, $price, $avatar);
}


// Получаем информацию о книге из базы данных
$product = currentProduct($bookId);
?>

<!DOCTYPE html>
<html lang="en">
<title>BOOKSPACE - Детально</title>
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
<div class="wrappage">
    <?php include_once __DIR__ . '/components/header.php' ?>
    <!-- /header -->
    <div class="container container-42">
        <ul class="breadcrumb">
            <li><a href="/shop.php">Магазин</a></li>
            <li class="active"><a href="#"><?php echo $product['title']; ?></a></li>
        </ul>
    </div>
    <div class="container">
        <div class="single-product-detail product-bundle single-product-space v3">
            <div class="row">
                <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>?book_id=<?= $bookId ?>"">
                <div class="col-xs-12 col-sm-5 col-md-6">


                    <div class="product-images">
                        <div class="main-img js-product-slider">
                            <a href="#" class="hover-images effect"><img src="<?php echo $product['avatar']; ?>" alt="photo" class="img-reponsive"></a>

                        </div>
                        <div class="cosre-btn">

                        </div>
                    </div>
                    <div class="multiple-img-list-ver2 js-click-product">
                        <div class="product-col">
                            <div class="img active">
                                <img src="<?php echo $product['avatar']; ?>" alt="images" class="img-responsive">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-xs-12 col-sm-7 col-md-6">
                    <div class="single-product-info">
                        <div class="rating-star">
                            <div class="icon-rating">
                                <span class="star star-5"></span>
                                <span class="star star-4"></span>
                                <span class="star star-3"></span>
                                <span class="star star-2"></span>
                                <span class="star star-1"></span>
                            </div>
                            <span class="review"><br></span>
                        </div>
                        <h3 class="product-title"><a href="#"><?php echo $product['title']; ?></a></h3>
                        <div class="product-price">
                            <span>₴<?php echo $product['price']; ?></span>
                        </div>
                        <p class="product-desc"><?php echo $product['content']; ?></p>
                        <input type="hidden" name="title" value="<?= $product['title'] ?>">
                        <input type="hidden" name="price" value="<?= $product['price'] ?>">
                        <input type="hidden" name="avatar" value="<?= $product['avatar'] ?>">
                        <div class="action v6">
                            <div class="quantity">
                                <button type="button" class="quantity-left-minus btn btn-number js-minus" data-type="minus" data-field="" disabled>
                                    <span class="minus-icon">-</span>
                                </button>
                                <input type="text" name="number" value="1" class="product_quantity_number js-number" readonly>
                                <button type="button" class="quantity-right-plus btn btn-number js-plus" data-type="plus" data-field="" disabled>
                                    <span class="plus-icon">+</span>
                                </button>
                            </div>
                            <button type="submit" name="add_to_cart" class="link-ver1 add-cart">Додати у кошик</button>
                            <a href="#" class="link-ver1 wish"><i class="icon-heart f-15"></i></a>
                            <div class="clearfix"></div>
                        </div>
                        <div class="share-social">
                            <span>Поділитися :</span>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        </div>
                    </div>

                </div>
                </form>
            </div>
        </div>
        <!--single-product-detail-->

        <!--single-product-tab-->
    </div>
    <div class="information">
        <ul>
            <li class="info-center text-center"><span>Код товару :</span>
                <a href=""><?php echo $product['id']; ?></a>
            </li>
            <li class="info-center text-center"><span>Жанр :</span>
                <a href="">Тест</a>
            </li>
        </ul>
    </div>


    <?php include_once __DIR__ . '/components/footer.php' ?>
</div>
<a href="#" class="scroll_top">ПРОКРУТИТИ ДО ВЕРХУ<span></span></a>
<?php include_once __DIR__ . '/components/script.php' ?>

</body>

</html>