


<?php if (isset($_SESSION['user']['id'])): ?>
    <!-- Если пользователь авторизован -->
    <li class="level1 active dropdown">
        <a href="../../home.php"><img src="../../<?php echo $user['avatar'] ?>" style="width: 36px;
	height: 36px;
	object-fit: cover;
	border-radius: 50%;">     <?php echo $user['username'] ?></a>
        <ul class="dropdown-menu menu-level-1">
            <li class="level2">
                <form action="../../src/actions/logout.php" method="post">
                    <button title="Logout">Вийти</button>
                </form>
            </li>
        </ul>
    </li>
<?php else: ?>
    <!-- Если пользователь не авторизован -->
    <li class="level1 active dropdown">
        <a href="../../login.php"><i class="icon-user f-15"></i></a>
    </li>
<?php endif; ?>