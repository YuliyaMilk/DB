<?php
include('src/config.php');
include('src/youAreHere.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Doctor Finding : Registration</title>
    <?php include('src/head.php') ?>
</head>

<body>
    <?php include('src/header.php') ?>
    
    <?php
    $fname = $lname = $email = $dob = $gnd = $addr = $phno = $pwd = $repwd = $hash=''; //Имя, Фамилия, почта, Дата рождения, пол, адрес, телефон, пароль, повторение пароля
    if (isset($_POST['ok'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $name = $fname . " " . $lname;
        $email = $_POST['mail'];
        $dob = $_POST['dob'];
        $gnd = $_POST['gnd'];
        $addr = $_POST['addr'];
        $phno = $_POST['phno'];
        $pwd = $_POST['pwd'];
        $repwd = $_POST['repwd'];
        if ($pwd == $repwd) {
            $qry1 = mysqli_query($con, "SELECT * FROM client WHERE Email = '$email'") or die(mysqli_error($con));
            $qry2 = mysqli_num_rows($qry1);
            if ($qry2 == 0) {
                $hash=sha1($pwd);
                $qry3 = mysqli_query($con, "INSERT INTO client (Name, Email, Dob, Gender, Address, Phone, Password) VALUES ('$name', '$email', '$dob', '$gnd', '$addr', '$phno','$hash')") or die(mysqli_error($con));
                echo '
                <script>
                alert("Вы успешно зарегистрированы!");
                window.location.href = "login.php";
                </script>';
            } else {
                echo '
                <script>
                alert("Такая почта уже существует, попробуйте еще раз!");
                </script>';
            }
        } else {
            echo '
            <script>
              alert("Пароли не совпадают!");
            </script>';
        }
    }
    echo youAreHere("Регистрация");
    ?>

    <section id="service">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="service-area">
                        <div class="section-heading">
                            <h2>Регистрация</h2>
                            <div class="line"></div>
                        </div>
                        <div class="service-content">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <form class="appointment-form" method="post">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-2"></div>
                                            <div class="col-lg-4 col-md-4 col-sm-6">
                                                <label class="control-label">Имя <span class="required">*</span>
                                                </label>
                                                <input type="text" class="wp-form-control wpcf7-text" placeholder="Имя" name="fname" value="<?= $fname ?>" required pattern="[A-Za-z-0-9-А-Яа-я]+">
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6">
                                                <label class="control-label">Фамилия <span class="required">*</span>
                                                </label>
                                                <input type="text" class="wp-form-control wpcf7-text" placeholder="Фамилия" name="lname" value="<?= $lname ?>" required pattern="[A-Za-z-0-9-А-Яа-я]+">
                                            </div>
                                            <div class="col-lg-2 col-md-2"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-2 col-md-2"></div>
                                            <div class="col-lg-8 col-md-8 col-sm-6">
                                                <label class="control-label">Email <span class="required">*</span></label>
                                                <input type="email" class="wp-form-control wpcf7-text" placeholder="Email" name="mail" value="<?= $email ?>" required>
                                            </div>
                                            <div class="col-lg-2 col-md-2"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-2 col-md-2"></div>
                                            <div class="col-lg-8 col-md-8 col-sm-6">
                                                <label class="control-label">Дата рождения <span class="required">*</span></label>
                                                <input type="date" class="wp-form-control wpcf7-text" placeholder="dd/mm/yy" max="<?= date("Y-m-d") ?>" name="dob" value="<?= $dob ?>" required>
                                            </div>
                                            <div class="col-lg-2 col-md-2"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-2 col-md-2"></div>
                                            <div class="col-lg-8 col-md-8 col-sm-6">
                                                <label class="control-label">Пол <span class="required">*</span></label>
                                                <select class="wp-form-control wpcf7-text" name="gnd" required>
                                                    <option value="<?= $gnd ?>"><?= $gnd ?></option>
                                                    <option value="Male">М</option>
                                                    <option value="Female">Ж</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-2 col-md-2"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-2 col-md-2"></div>
                                            <div class="col-lg-8 col-md-8 col-sm-6">
                                                <label class="control-label">Адрес <span class="required">*</span></label>
                                                <input type="text" class="wp-form-control wpcf7-text" placeholder="Адрес" name="addr" value="<?= $addr ?>" required>
                                            </div>
                                            <div class="col-lg-2 col-md-2"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-2 col-md-2"></div>
                                            <div class="col-lg-8 col-md-8 col-sm-6">
                                                <label class="control-label">Телефон <span class="required">*</span></label>
                                                <input type="number" class="wp-form-control wpcf7-text" placeholder="Номер телефона" name="phno" value="<?= $phno ?>" required>
                                            </div>
                                            <div class="col-lg-2 col-md-2"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-2 col-md-2"></div>
                                            <div class="col-lg-8 col-md-8 col-sm-6">
                                                <label class="control-label">Пароль <span class="required">*</span></label>
                                                <input type="password" class="wp-form-control wpcf7-text"  name="pwd" value="<?= $pwd ?>" required>
                                            </div>
                                            <div class="col-lg-2 col-md-2"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-2 col-md-2"></div>
                                            <div class="col-lg-8 col-md-8 col-sm-6">
                                                <label class="control-label">Повторите пароль <span class="required">*</span></label>
                                                <input type="password" class="wp-form-control wpcf7-text"  name="repwd" value="<?= $repwd ?>" required>
                                            </div>
                                            <div class="col-lg-2 col-md-2"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-2 col-md-2"></div>
                                            <div class="col-lg-8 col-md-8 col-sm-6">
                                                <button class="wpcf7-submit button--itzel" name="ok" type="submit">
                                                    <i class="button__icon fa fa-share"></i><span>Зарегистрироваться</span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include('src/footer.php') ?>
    <?php include('src/connectjs.php') ?>
</body>

</html>


<!-- Bootstrap .container -для фиксированной ширины
                rows - горизонтальные группы столбцов,всего влезает 12 col- - 1
                .col-lg - большие контейнеры по 940px(комп)
                .col-md -средние 720px (планшет)
 -->