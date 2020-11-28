<?php
session_start();
if (isset($_SESSION['log']) == "") {
    ?>
    <li><a href="index.php">Главная страница</a></li>
    <li><a href="service.php">Услуги</a></li>
    <li><a href="register.php">Регистрация</a></li>
    <li><a href="login.php">Вход</a></li>
<?php
} else if ($_SESSION['log1'] == "client") {
    ?>
    <li><a href="index.php">Главная страница</a></li>
    <li><a href="service.php">Услуги</a></li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Мой профиль <span class="fa fa-angle-down"></span></a>
        <ul class="dropdown-menu" role="menu">
            <li><a href="viewprofile.php">Посмотреть профиль </a></li>
            <li><a href="editprofile.php">Изменить профиль</a></li>
            <li><a href="appointments.php">Мои записи</a></li>
        </ul>
    </li>
    <li><a href="logout.php">Выйти</a></li>
<?php
} else if ($_SESSION['log1'] == "admin") {
    ?>
    <li><a href="index.php">Главная страница</a></li>
    <li><a href="update.php">Изменить</a></li>
    <li><a href="upload.php">Результаты</a></li>
    <li><a href="stat.php">Статистика</a></li>
    <li><a href="editprofile.php">Изменить профиль</a></li>
    <li><a href="logout.php">Выйти</a></li>
<?php
} else if ($_SESSION['log1'] == "doctor") {
    ?>
    <li><a href="index.php">Главная старница</a></li>
    <li><a href="appointments.php">Мои записи</a></li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Мой профиль <span class="fa fa-angle-down"></span></a>
        <ul class="dropdown-menu" role="menu">
            <li><a href="viewprofile.php">Посмотреть профиль</a></li>
            <li><a href="editprofile.php">Изменить профиль</a></li>
        </ul>
    </li>
    <li><a href="logout.php">Выйти</a></li>
<?php
}
