<?php
require_once __DIR__ . '/../../src/helper.php';
checkAdmin();
?>


<ul class="side-menu top">

    <li >
        <a href="/admin.php">
            <i class='bx bxs-dashboard' ></i>
            <span class="text">Основна панель</span>
        </a>
    </li>


    <li>
        <a href="/components/admin/add_book/content.php">
            <i class='bx bxs-shopping-bag-alt' ></i>
            <span class="text">Товари</span>
        </a>
    </li>
    <li>
        <a href="">
            <i class='bx bxs-doughnut-chart' ></i>
            <span class="text">Розділ "Новини"</span>
        </a>
    </li>
    <li>
        <a href="">
            <i class='bx bxs-group' ></i>
            <span class="text">Користувачі</span>
        </a>
    </li>

    <li >
        <a href="../../../home.php">
            <i class='bx bxs-dashboard' ></i>
            <span class="text">Особистий кабінет</span>
        </a>
    </li>

</ul>
<ul class="side-menu">
    <li>

        <form href="#" class="logout" action="/../../src/actions/logout.php" style="margin-top: 400px" method="POST">
            <button class="button_logout" type="submit" value="Вийти">
                <i class='bx bxs-log-out-circle' style="vertical-align: middle; margin-right: 2px"></i> Вийти
            </button>
        </form>
    </li>
</ul>
