<?php
require_once __DIR__ . '/../../../src/helper.php';

include_once __DIR__ . '/../header.php';


$bookId = isset($_GET['book_id']) ? $_GET['book_id'] : null;


if (!$bookId) {
    echo "Помилка: Ідентифікатор книги не надіслано.";
    redirect('../../../404.php');
    exit;
}

$user = currentUser();
checkAdmin();
// Получаем информацию о книге из базы данных
$product = currentProduct($bookId);
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
                <h1>Додавання книг</h1>
                <ul class="breadcrumb">
                    <li>
                        <a  class="active" href="content.php">Товари</a>
                    </li>
                    <li><i class='bx bx-chevron-right' ></i></li>
                    <li>
                        <a  href="#">Додавання книг</a>
                    </li>
                </ul>
            </div>

        </div>
        <section>
            <div class="form-box">

                <div class="form-value">
                    <form action="" method="POST" enctype="multipart/form-data" disabled="">
                        <h2>Інформація про книгу</h2>

                        <div class="formWrapper">
                            <div class="formLeft">
                                <div class="inputbox">

                                    <input type="text" name="title" value="" disabled>

                                    <label for=""><?php echo $product['title']; ?></label>
                                </div>


                                <div class="redactor">
                                    <textarea class="editor" name="content" readonly disabled><?php echo $product['content']; ?></textarea>
                                </div>
                                <br>

                            </div>
                            <div class="formRight">
                                <div class="inputbox">

                                    <input type="text" name="price" value="" disabled>
                                    <label for=""><?php echo $product['price']; ?></label>
                                </div>



                                <div class="selectbox">
                                    <select class="form-select" id="category" name="category_id" required disabled>

                                        <option>Оберіть категорію</option>

                                    </select>
                                </div>
                                <div class="inputimagebox" style="text-align: center;">
                                    <img style="max-width: 250px; max-height: 300px; margin: auto; display: block;" src="../../../<?php echo $product['avatar']; ?>" alt="">
                                </div>

                                <a class="button" href="/<?= $product['book_file']; ?>" download>Завантажити</a>


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
<script src=" ../../../admin-panel/upload-image.js"></script>
<script src="../../../admin-panel/script.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('.editor'), {
            licenseKey: ''
        })
        .then(editor => {
            window.editor = editor;

            // Отключаем редактирование
            editor.editing.view.change(writer => {
                writer.setStyle('user-select', 'none');
            });

            // Отключаем весь интерактив для редактора
            editor.editing.view.document.on('keydown', (event, data) => {
                data.preventDefault();
            });
            editor.editing.view.document.on('mousedown', (event, data) => {
                data.preventDefault();
            });

            // Блокируем событие dblclick
            editor.editing.view.document.on('dblclick', (event, data) => {
                data.preventDefault();
            });

        })
        .catch(error => {
            console.error('Oops, something went wrong!');
            console.error('Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:');
            console.warn('Build id: ud3tvr17cb86-4kce3iu3c4z9');
            console.error(error);
        });
</script>
</body>
</html>