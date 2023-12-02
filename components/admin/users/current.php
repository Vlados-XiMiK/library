<?php
require_once __DIR__ . '/../../../src/helper.php';

include_once __DIR__ . '/../header.php';

$userId = isset($_GET['user_id']) ? $_GET['user_id'] : null;

if (!$userId) {
    echo "Помилка: Ідентифікатор користувача не надіслано.";
    redirect('../../../404.php');
    exit;
}

$user = currentUser();
checkAdmin();
// Получаем информацию о пользователе из базы данных
$selectedUser = currentUser($userId);
?>

<body>

<!-- SIDEBAR -->
<section id="sidebar">
    <a href="../../../admin.php" class="brand">
        <i class='bx bxs-briefcase'></i>
        <span class="text">Адмін панель</span>
    </a>
    <?php include_once __DIR__ . '/../sidebar.php' ?>
</section>
<!-- SIDEBAR -->

<!-- CONTENT -->
<section id="content">
    <!-- NAVBAR -->
    <nav>
        <i class='bx bx-menu' ></i>
        <form action="../../../admin.php">
            <div class="form-input">
                <button type="submit" class=""><i class='bx bxs-shield-alt-2'></i></button>
            </div>
        </form>
        <input type="checkbox" id="switch-mode" hidden>
        <label for="switch-mode" class="switch-mode"></label>
        <a href="../../../home.php" class="profile">
            <img src="../../../<?php echo $user['avatar'] ?>">
        </a>
    </nav>
    <!-- NAVBAR -->

    <!-- MAIN -->
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Інформація про користувача</h1>
                <ul class="breadcrumb">
                    <li>
                        <a  class="active" href="content.php">Користувачі</a>
                    </li>
                    <li><i class='bx bx-chevron-right' ></i></li>
                    <li>
                        <a  href="#"><?php echo $selectedUser['username']?></a>
                    </li>
                </ul>
            </div>
        </div>
        <section>
            <div class="form-box">
                <div class="form-value">
                    <form action="" method="POST" enctype="multipart/form-data" disabled="">
                        <h2>Інформація про користувача</h2>
                        <div class="formWrapper">
                            <div class="formLeft">
                                <div class="inputbox">
                                    <input type="text" name="name" value="" disabled>
                                    <label for=""><?php echo $selectedUser['name']; ?></label>
                                </div>
                                <div class="inputbox">
                                    <input type="text" name="username" value="" disabled>
                                    <label for=""><?php echo $selectedUser['username']; ?></label>
                                </div>
                                <div class="inputbox">
                                    <input type="text" name="email" value="" disabled>
                                    <label for=""><?php echo $selectedUser['email']; ?></label>
                                </div>
                                <br>
                            </div>
                            <div class="formRight">
                                <div class="inputbox">
                                    <input type="text" name="role" value="" disabled>
                                    <?php
                                    $role = $selectedUser['role'];
                                    if ($role == 1) {
                                        echo '<label for="">Адміністратор</label>';
                                    } elseif ($role == 0) {
                                        echo '<label for="">Користувач</label>';
                                    } else {
                                        echo '<label for="">Невідома роль, помилка</label>';
                                    }
                                    ?>
                                </div>
                                <div class="inputimagebox" style="text-align: center;">
                                    <img style="max-width: 250px; max-height: 300px; margin: auto; display: block;" src="../../../<?php echo $selectedUser['avatar']; ?>" alt="">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <!-- MAIN -->
</section>
<!-- CONTENT -->

<script src="../../../admin-panel/plugins/ckeditor/build/ckeditor.js"></script>
<script src="../../../admin-panel/upload-image.js"></script>
<script src="../../../admin-panel/script.js"></script>

<script>
    // Ваш JavaScript код
</script>
</body>
</html>
