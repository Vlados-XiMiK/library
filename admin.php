<?php
include_once __DIR__ . '/components/admin/header.php';

$user = currentUser();
checkAdmin();
$all_users = getAllUsers();
?>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="admin.php" class="brand">
			<i class='bx bxs-briefcase'></i>
			<span class="text">Адмін панель</span>
		</a>
        <?php include_once __DIR__ . '/components/admin/sidebar.php' ?>
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

			<a href="home.php" class="profile">
				<img src="<?php echo $user['avatar'] ?>">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Основа панель</h1>
					<ul class="breadcrumb">
						<li>
							<a  href="#">Основна панель</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Головна</a>
						</li>
					</ul>
				</div>

			</div>

			<ul class="box-info">
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3>1020</h3>
						<p>Відвідувачів за весь час</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3>3782</h3>
						<p>Відвідувачі за день</p>
					</span>
				</li>

			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Нещодавні зареєстровані користувачі</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
                    <div class="user-list-container">
                        <table class="user-list">
                            <thead>
                            <tr>
                                <th>Логін</th>
                                <th>Електронна адреса</th>
                                <th>Дата</th>
                                <th>Статус</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (!empty($all_users)) {
                                // Вывод данных каждого пользователя
                                $counter = 0;
                                foreach ($all_users as $user) {
                                    echo "<tr>";
                                    echo "<td><img src='" . $user['avatar'] . "'><p>" . $user['username'] . "</p></td>";
                                    echo "<td>" . $user['email'] . "</td>";
                                    echo "<td>" . $user['date'] . "</td>";
                                    echo "<td><span class='status completed'>Зареєстровано</span></td>";
                                    echo "</tr>";
                                    $counter++;

                                    // Если достигнут лимит в 5 пользователей, выходим из цикла
                                    if ($counter >= 5) {
                                        break;
                                    }
                                }
                            } else {
                                echo "0 results";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
				</div>

			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->


	<script src="admin-panel/script.js"></script>
</body>
</html>