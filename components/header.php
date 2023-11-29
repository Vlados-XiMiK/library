<header id="header" class="header-v1">
    <div class="sticky-header text-center hidden-xs hidden-sm">
        <div class="text">
            <span class="u-line">WELCOME</span> НА ВСІ ЗАМОВЛЕННЯ ЗНИЖКА ПОНАД 100₴
        </div>
    </div>
    <div class="topbar">
        <div class="container container-40">
            <div class="topbar-left">
                <div class="topbar-option">
                    <div class="topbar-account">

                        <?php include_once __DIR__ . '/user_head.php' ?>
                    </div>
                    <div class="topbar-wishlist">
                        <a href="#">
                            <i class="icon-heart f-15"></i>
                            <span class="count wishlist-count">0</span>
                        </a>
                    </div>
                    <div class="topbar-language dropdown">
                        <a id="label1" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">

                            <span>UA</span>
                            <span class="fa fa-caret-down f-10"></span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="label1">
                            <li><a href="#">Ukraine</a></li>
                            <li><a href="#">English</a></li>
                        </ul>
                    </div>
                </div>
                <!--end topbar-option-->
            </div>
            <!--end topbar-left-->
            <div class="logo hidden-xs hidden-sm">
                <a href="../../index.php" title="home-logo"><img src="../../img/logo.png" alt="logo" class="img-responsive" style="height: 60px"></a>
            </div>
            <!--end logo-->
            <div class="topbar-right">
                <div class="topbar-option">
                    <div class="topbar-currency dropdown">
                        <a id="label2" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">

                            <span>UAH</span>
                            <span class="fa fa-caret-down f-10"></span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="label2">
                            <li><a href="#">UAH</a></li>
                            <li><a href="#">USD</a></li>
                        </ul>
                    </div>
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
        </div>
    </div>
    <div class="header-top">
        <div class="container container-40">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="logo-mobile hidden-lg hidden-md">
                        <a href="index.php" title="home-logo"><img src="../img/logo.png" alt="logo" class="img-responsive" style="height: 60px"></a>
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
                                    <a href="/news.php">Новини</a>
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