<?php
include('src/config.php');
include('src/youAreHere.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Doctor Finder : Вход</title>
    <?php include('src/head.php') ?>
</head>

<body>

    <?php include('src/header.php') ?>

    <?php
    $email = $pwd = $hash = '';
    if (isset($_POST['ok'])) {
        $email = $_POST['mail'];
        $pwd = $_POST['pwd'];
        $hash=sha1($pwd);
        echo '
                <script>
                    console.log('.$hash.');
                </script>
            ';
        $qry1 = mysqli_query($con, "SELECT * FROM client WHERE Email='$email' and (Password='$pwd' or Password='$hash')") or die(mysqli_error($con));
        $qry2 = mysqli_num_rows($qry1);
        if ($qry2) {
            $row = mysqli_fetch_array($qry1);
            $_SESSION['log'] = $row;
            $_SESSION['log1'] = "client";
            echo '
                <script>
                alert("Добро пожаловать!");
                window.location.href = "index.php";
                </script>
            ';
        } else {
            $qry3 = mysqli_query($con, "SELECT * FROM admin WHERE Email='$email' and (Password='$pwd' or Password ='$hash')");
            $qry4 = mysqli_num_rows($qry3);
            if ($qry4) {
                $row = mysqli_fetch_array($qry3);
                $_SESSION['log'] = $row;
                $_SESSION['log1'] = "admin";
                echo '
            <script>
              alert("Добро пожаловать!");
              window.location.href = "index.php";
            </script>
            ';
            } else {
                $qry5 = mysqli_query($con, "SELECT * FROM doctor WHERE Email='$email' and (Password='$pwd' or Password ='$hash')");
                $qry6 = mysqli_num_rows($qry5);
                if ($qry6) {
                    $row = mysqli_fetch_array($qry5);
                    $_SESSION['log'] = $row;
                    $_SESSION['log1'] = "doctor";
                    echo '
                <script>
                  alert("Добро пожаловать!");
                  window.location.href = "index.php";
                </script>
                ';
                } else {
                    echo '
                <script>
                  alert("Неправильный Email или пароль");
                </script>
                ';
                }
            }
        }
    }
    echo youAreHere("Вход");
    ?>
   
    <section id="service">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="service-area">
                        <div class="section-heading">
                            <h2>Вход</h2>
                            <div class="line"></div>
                        </div>
                        <div class="service-content">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <form class="appointment-form" method="post">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-2"></div>
                                            <div class="col-lg-8 col-md-8 col-sm-6">
                                                <label class="control-label">Email
                                                    <span class="required">*</span>
                                                </label>
                                                <input type="email" class="wp-form-control wpcf7-text" placeholder="Email" name="mail" value="<?= $email ?>" required>
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
                                                <button class="wpcf7-submit button--itzel" name="ok" type="submit">
                                                    <i class="button__icon fa fa-share"></i><span>Войти</span>
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
