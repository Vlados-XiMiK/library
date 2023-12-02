<?php
include_once __DIR__ . '/../header.php';

$user = currentUser();
checkAdmin();

$users = getAllUsers();
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
        <form action="admin.php">
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
                <h1>Користувачі</h1>
                <ul class="breadcrumb">
                    <li>
                        <a  class="active" href="#">Основна панель</a>
                    </li>
                    <li><i class='bx bx-chevron-right' ></i></li>
                    <li>
                        <a  href="#">Користувачі</a>
                    </li>
                </ul>
            </div>

        </div>
        <div class="row">
            <div class="col-12">


                <div style="display: flex; justify-content: space-around">



                    <div class="table-responsive">
                        <h3 style="color: white; margin-top: 10px; text-align: center">Список користувачів</h3>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Назва</th>
                                <th colspan="2">Дія</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($users as $listuser): ?>
                                <tr>
                                    <td><?php echo $listuser['id']; ?></td>
                                    <td><?php echo $listuser['username']; ?></td>
                                    <td>
                                        <a href="current.php?user_id=<?php echo $listuser['id']; ?>">
                                            <i class="fa-solid fa-eye" style="color: #024bca;"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="">
                                            <i class="fa-solid fa-pencil" style="color: #024bca;"></i>
                                        </a>
                                    </td>

                                </tr>
                            <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div style="margin-bottom: 600px;"></div>


    </main>
    <!-- MAIN -->
</section>
<!-- CONTENT -->
<script src="../../../admin-panel/plugins/ckeditor/build/ckeditor.js"></script>
<script src=" ../../../admin-panel/upload-image.js"></script>
<script src="../../../admin-panel/script.js"></script>

<script>
    function confirmDelete(bookId, bookTitle) {
        var result = confirm("Ви впевнені, що хочете видалити книгу '" + bookTitle + "'?");
        if (result) {
            document.getElementById('deleteForm' + bookId).submit();
        }
    }
</script>

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