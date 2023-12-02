<?php
require_once __DIR__ . '/../../../src/helper.php';
$user = currentUser();
checkAdmin();
include_once __DIR__ . '/../header.php'
?>

<link rel="stylesheet" href="/../../admin-panel/input_image.css">
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

        <a href="#" class="profile">
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
                    <form action="../../../src/actions/create_book.php" method="POST" enctype="multipart/form-data">
                        <h2>Додавання книги</h2>

                        <div class="formWrapper">
                            <div class="formLeft">
                                <div class="inputbox">

                                    <input type="text" name="title" value="<?php echo old('title')?>"
                                        <?php echo validationErrorPrint('title'); ?>
                                    >

                                    <label for="">Введіть назву книги</label>
                                </div>



                                <?php if (hasValidationError('title')): ?>
                                    <label for="" style="color: red"> <?php echo validationErrorMessage('title'); ?></label>
                                    <br>
                                <?php endif; ?>



                                <div class="redactor">
                                    <textarea class="editor" name="content"><?php echo old('content')?></textarea>
                                </div>
                                <br>
                                <?php if (hasValidationError('content')): ?>
                                    <label for="" style="color: red"> <?php echo validationErrorMessage('content'); ?></label>
                                    <br>
                                <?php endif; ?>

                                <button class="button" type="submit">Створити</button>
                            </div>


                            <div class="formRight">
                                <div class="inputbox">

                                    <input type="text" name="price" value="<?php echo old('price')?>">
                                    <label for="">Введіть ціну</label>
                                </div>

                                <?php if (hasValidationError('price')): ?>
                                    <label for="" style="color: red"> <?php echo validationErrorMessage('price'); ?></label>
                                    <br>
                                <?php endif; ?>





                                <div class="inputimagebox">
                                    <div class="container_upload">
                                        <label for="input__image" class="drop-area">
                                            <i class="bx bxs-cloud-upload icon"></i>
                                            <h3>
                                                Перетягніть або клацніть тут, щоб вибрати pdf файл
                                            </h3>
                                            <p>Розмір фото має бути менше ніж <span>2MB</span></p>
                                            <input type="file" accept=".pdf" id="input-file" name="book_file"
                                                   class="input-image"/>
                                        </label>
                                    </div>


                                </div>


                                <label for="images" class="drop-container" id="dropcontainer">
                                    <span class="drop-title">Перетягніть зображення сюди</span>
                                    або
                                    <input type="file" name="avatar" title="Виберіть зображення" id="images" accept="image/*" required>
                                </label>


                            </div>





                                <?php if (hasValidationError('avatar')): ?>

                                    <label for="" style="color: red"> <?php echo validationErrorMessage('avatar'); ?></label>
                                    <br>
                                <?php endif; ?>


                            </div>
                        </div>
                    </form>

                    <?php clearValidation(); ?>

                </div>
            </div>
        </section>


    </main>
    <!-- MAIN -->
</section>
<!-- CONTENT -->
<script src="../../../admin-panel/plugins/ckeditor/build/ckeditor.js"></script>
<script src=" ../../../admin-panel/upload-file.js"></script>
<script src="../../../admin-panel/script.js"></script>
<script>ClassicEditor
        .create( document.querySelector( '.editor' ), {

            licenseKey: '',




        } )
        .then( editor => {
            window.editor = editor;




        } )
        .catch( error => {
            console.error( 'Oops, something went wrong!' );
            console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
            console.warn( 'Build id: ud3tvr17cb86-4kce3iu3c4z9' );
            console.error( error );
        } );
</script>
</body>
</html>