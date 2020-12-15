<?php
include('src/config.php');
include('src/youAreHere.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Doctor Finder : Редактировать профиль</title>
    <?php include('src/head.php') ?>
</head>

<body>
    <?php include('src/header.php') ?>

    <?php
    if (!isset($_SESSION['log']) || $_SESSION['log'] == '') {
        echo '
        <script>
          alert("Сначала войдите!");
          window.location.href = "index.php";
        </script>
        ';
    }
    if (isset($_POST['ok'])) {
        $id = $_SESSION['log']['Id'];
        $email = $_POST['mail'];
        $phno = $_POST['phno'];
        if ($_SESSION['log1'] == "client") {
            $name = $_POST['nam'];
            $addr = $_POST['addr'];
            $res = mysqli_query($con, "UPDATE client SET Name = '$name',Email = '$email',Address = '$addr',Phone = '$phno' WHERE Id = '$id' ");
            $qry1 = mysqli_query($con, "SELECT * FROM client WHERE Email='$email'");
            $qry2 = mysqli_num_rows($qry1);
            $row = mysqli_fetch_array($qry1);
            $_SESSION['log'] = $row;
        } else if ($_SESSION['log1'] == "admin") {
            $res = mysqli_query($con, "UPDATE admin SET Email = '$email',Phone = '$phno' WHERE Id = '$id' ");
            $qry3 = mysqli_query($con, "SELECT * FROM admin WHERE Email='$email'");
            $qry4 = mysqli_num_rows($qry3);
            $row = mysqli_fetch_array($qry3);
            $_SESSION['log'] = $row;
        } else if ($_SESSION['log1'] == "doctor") {
            $addr = $_POST['addr'];
            $res = mysqli_query($con, "UPDATE doctor SET Address = '$addr',Email = '$email',Phone = '$phno' WHERE Id = '$id' ");
            $qry5 = mysqli_query($con, "SELECT * FROM doctor WHERE Email='$email'");
            $qry6 = mysqli_num_rows($qry5);
            $row = mysqli_fetch_array($qry5);
            $_SESSION['log'] = $row;
        }
        if ($res == 1) {
            echo '
        <script>
          alert("Успешно обновлено");
        </script>
        ';
        } else {
            echo '
        <script>
          alert("Что-то пошло не так");
        </script>
        ';
        }
    }
    if (isset($_POST['okpass'])) {
        $pwd = $_POST['pwd'];
        $repwd = $_POST['repwd'];
        if ($pwd == $repwd) {
            if ($_SESSION['log1'] == "client") {
                $res = mysqli_query($con, "UPDATE client SET Password='$pwd' WHERE Id='$id' ");
            } else if ($_SESSION['log1'] == "admin") {
                $res = mysqli_query($con, "UPDATE admin SET Password='$pwd' WHERE Id='$id' ");
            } else if ($_SESSION['log1'] == "doctor") {
                $res = mysqli_query($con, "UPDATE doctor SET Password='$pwd' WHERE Id='$id' ");
            }
            if ($res == 1) {
                echo '
            <script>
              alert("Пароль успешно изменен!");
            </script>
            ';
            } else {
                echo '
            <script>
              alert("Что-то пошло не так");
            </script>
            ';
            }
        } else {
            echo '
        <script>
          alert("Пароли не совпадают");
        </script>
        ';
        }
    }
    echo youAreHere("Редактировать профиль");
    ?>

    <section id="service">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="service-area">
                        <div class="section-heading">
                            <h2>Редактировать профиль</h2>
                            <div class="line"></div>
                        </div>
                        <div class="service-content">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <form class="appointment-form" method="post">
                                        <?php if ($_SESSION['log1'] == "client") { ?>
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-6">
                                                    <label class="control-label">Имя <span class="required">*</span></label>
                                                    <input type="text" class="wp-form-control wpcf7-text" value="<?php echo $_SESSION['log']['Name'] ?>" name="name" required>
                                                </div>
                                                <div class="col-lg-2 col-md-2"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-6">
                                                    <label class="control-label">Email <span class="required">*</span>
                                                    </label>
                                                    <input type="email" class="wp-form-control wpcf7-email" value="<?php echo $_SESSION['log']['Email'] ?>" name="mail" required>
                                                </div>
                                                <div class="col-lg-2 col-md-2"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-6">
                                                    <label class="control-label">Адрес <span class="required">*</span>
                                                    </label>
                                                    <input type="text" class="wp-form-control wpcf7-email" value="<?php echo $_SESSION['log']['Address'] ?>" name="addr" required>
                                                </div>
                                                <div class="col-lg-2 col-md-2"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-6">
                                                    <label class="control-label">Телефон <span class="required">*</span>
                                                    </label>
                                                    <input type="number" class="wp-form-control wpcf7-text" value="<?php echo $_SESSION['log']['Phone'] ?>" name="phno" required>
                                                </div>
                                                <div class="col-lg-2 col-md-2"></div>
                                            </div>
                                        <?php } else if ($_SESSION['log1'] == "admin") { ?>
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-6">
                                                    <label class="control-label">Email <span class="required">*</span></label>
                                                    <input type="email" class="wp-form-control wpcf7-email" value="<?php echo $_SESSION['log']['Email'] ?>" name="mail" required>
                                                </div>
                                                <div class="col-lg-2 col-md-2"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-6">
                                                    <label class="control-label">Телефон <span class="required">*</span></label>
                                                    <input type="number" class="wp-form-control wpcf7-text" value="<?php echo $_SESSION['log']['Phone'] ?>" name="phno" required>
                                                </div>
                                                <div class="col-lg-2 col-md-2"></div>
                                            </div>
                                        <?php } else if ($_SESSION['log1'] == "doctor") { ?>
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-6">
                                                    <label class="control-label">Email <span class="required">*</span></label>
                                                    <input type="email" class="wp-form-control wpcf7-email" value="<?php echo $_SESSION['log']['Email'] ?>" name="mail" required>
                                                </div>
                                                <div class="col-lg-2 col-md-2"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-6">
                                                    <label class="control-label">Адрес <span class="required">*</span></label>
                                                    <input type="text" class="wp-form-control wpcf7-email" value="<?php echo $_SESSION['log']['Address'] ?>" name="addr" required>
                                                </div>
                                                <div class="col-lg-2 col-md-2"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-6">
                                                    <label class="control-label">Телефон <span class="required">*</span>
                                                    </label>
                                                    <input type="number" class="wp-form-control wpcf7-text" value="<?php echo $_SESSION['log']['Phone'] ?>" name="phno" required>
                                                </div>
                                                <div class="col-lg-2 col-md-2"></div>
                                            </div>
                                        <?php } ?>
                                        <div class="row">
                                            <div class="col-lg-2 col-md-2"></div>
                                            <div class="col-lg-8 col-md-8 col-sm-6">
                                                <button class="wpcf7-submit button--itzel" name="ok" type="submit">
                                                    <i class="button__icon fa fa-share"></i><span>Сохранить</span>
                                                </button>
                                            </div>
                                            <div class="col-lg-2 col-md-2"></div>
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

    <section id="service">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="service-area">
                        <div class="section-heading">
                            <h2>Изменить пароль</h2>
                            <div class="line"></div>
                        </div>
                        <div class="service-content">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <form class="appointment-form" method="post">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-2"></div>
                                            <div class="col-lg-8 col-md-8 col-sm-6">
                                                <label class="control-label">Пароль <span class="required">*</span></label>
                                                <input type="password" class="wp-form-control wpcf7-text"  name="pwd" required>
                                            </div>
                                            <div class="col-lg-2 col-md-2"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-2 col-md-2"></div>
                                            <div class="col-lg-8 col-md-8 col-sm-6">
                                                <label class="control-label">Повторите пароль <span class="required">*</span></label>
                                                <input type="password" class="wp-form-control wpcf7-text" name="repwd" required>
                                            </div>
                                            <div class="col-lg-2 col-md-2"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-2 col-md-2"></div>
                                            <div class="col-lg-8 col-md-8 col-sm-6">
                                                <button class="wpcf7-submit button--itzel" name="okpass" type="submit">
                                                    <i class="button__icon fa fa-share"></i><span>Сохранить</span>
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
