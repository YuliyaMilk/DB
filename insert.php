<?php
include('src/config.php');
include('src/youAreHere.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Doctor Finder : Добавление</title>
    <?php include('src/head.php') ?>
</head>

<body>

    <?php include('src/header.php') ?>
    <?php
    $hash='';
    echo youAreHere("Добавление");
    if (!isset($_SESSION['log']) || $_SESSION['log'] == '') {
        echo '
        <script>
          alert("Сначала войдите!");
          window.location.href = "index.php";
        </script>
        ';
    }

    $data = $_GET['data'];
    if (isset($_POST['ok'])) {
        $res;
        if ($data == 'test') {
            $testname = $_POST['testname'];
            $testfee = $_POST['testfee'];
            $res = mysqli_query($con, "INSERT INTO test (test_name,test_cost) VALUES ('$testname','$testfee')") or die(mysqli_error($con));
        } else if ($data == "doctor") {
            $name = $_POST['fname'] . " " . $_POST['lname'];
            $email = $_POST['mail'];
            $dob = $_POST['dob'];
            $gnd = $_POST['gnd'];
            $addr = $_POST['addr'];
            $phno = $_POST['phno'];
            $pwd = $_POST['pwd'];
            $fee = $_POST['fee'];
            $cat = $_POST['category'];
            $hash=sha1($pwd);
            $res = mysqli_query($con, "INSERT INTO doctor (Name, Email, Dob, Gender, Address, Phone, Password, Fees, Category) VALUES ('$name','$email','$dob','$gnd','$addr','$phno','$hash','$fee','$cat')") or die(mysqli_error($con));
        }
        if ($res == 1) {
            echo '
                <script>
                window.location.href = "update.php";
                </script>
                ';
        } else {
            echo '
                <script>
                alert("База данных не найдена");
                </script>
                ';
        }
    }
    if ($data == 'test') {
        ?>
        <section id="service">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="service-area">
                            <div class="section-heading">
                                <h2>Добавить анализы</h2>
                                <div class="line"></div>
                            </div>
                            <div class="service-content">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <form class="appointment-form" method="post">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-6">
                                                    <label class="control-label">Название <span class="required">*</span></label>
                                                    <input type="text" class="wp-form-control wpcf7-text" name="testname" required value="<?php if(isset($_POST['$testname'])){echo $_POST['$testname']; }?>">
                                                </div>
                                                <div class="col-lg-2 col-md-2"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-6">
                                                    <label class="control-label">Стоимость <span class="required">*</span></label>
                                                    <input type="number" class="wp-form-control wpcf7-text" name="testfee" required value="<?php if(isset($_POST['$testfee'])){echo $_POST['$testfee']; }?>">
                                                </div>
                                                <div class="col-lg-2 col-md-2"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-6">
                                                    <button class="wpcf7-submit button--itzel" name="ok" type="submit">
                                                        <i class="button__icon fa fa-share"></i><span>Добавить</span>
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
    <?php
    } else if ($data == 'doctor') {
        ?>
        <section id="service">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="service-area">
                         
                            <div class="section-heading">
                                <h2>Добавить врача</h2>
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
                                                    <input type="text" class="wp-form-control wpcf7-text" placeholder="Имя" name="fname" required pattern="[A-Za-z-0-9-А-Яа-я]+" value="<?php if(isset($_POST['$fname'])){echo $_POST['$fname']; }?>">
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-6">
                                                    <label class="control-label">Фамилия <span class="required">*</span>
                                                    </label>
                                                    <input type="text" class="wp-form-control wpcf7-text" placeholder="Фамилия" name="lname" required pattern="[A-Za-z-0-9-А-Яа-я]+" value="<?php if(isset($_POST['$lname'])){echo $_POST['$lname']; }?>">
                                                </div>
                                                <div class="col-lg-2 col-md-2"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-6">
                                                    <label class="control-label">Email <span class="required">*</span></label>
                                                    <input type="email" class="wp-form-control wpcf7-text" placeholder="Email" name="mail" required value="<?php if(isset($_POST['$mail'])){echo $_POST['$mail']; }?>">
                                                </div>
                                                <div class="col-lg-2 col-md-2"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-6">
                                                    <label class="control-label">Дата рождения <span class="required">*</span></label>
                                                    <input type="date" class="wp-form-control wpcf7-text" placeholder="dd/mm/yy" max="<?= date("Y-m-d") ?>" name="dob" required value="<?php if(isset($_POST['$dob'])){echo $_POST['$dob']; }?>">
                                                </div>
                                                <div class="col-lg-2 col-md-2"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-6">
                                                    <label class="control-label">Пол <span class="required">*</span></label>
                                                    <select class="wp-form-control wpcf7-text" name="gnd" required>
                                                        <option value="<?php if(isset($_POST['$gnd'])){echo $_POST['$gnd']; }?>"><?php if(isset($_POST['$gnd'])){echo $_POST['$gnd']; }?></option>
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
                                                    <input type="text" class="wp-form-control wpcf7-text" placeholder="Адрес" name="addr" required value="<?php if(isset($_POST['$addr'])){echo $_POST['$addr']; }?>">
                                                </div>
                                                <div class="col-lg-2 col-md-2"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-6">
                                                    <label class="control-label">Телефон <span class="required">*</span></label>
                                                    <input type="number" class="wp-form-control wpcf7-text" placeholder="Телефон" name="phno" required value="<?php if(isset($_POST['$phno'])){echo $_POST['$phno']; }?>">
                                                </div>
                                                <div class="col-lg-2 col-md-2"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-6">
                                                    <label class="control-label">Пароль <span class="required">*</span></label>
                                                    <input type="password" class="wp-form-control wpcf7-text" placeholder="Пароль" name="pwd" required value="<?php if(isset($_POST['$pwd'])){echo $_POST['$pwd']; }?>">
                                                </div>
                                                <div class="col-lg-2 col-md-2"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-6">
                                                    <label class="control-label">Стоимость <span class="required">*</span></label>
                                                    <input type="text" class="wp-form-control wpcf7-text" placeholder="Стоимость" name="fee" required value="<?php if(isset($_POST['$fee'])){echo $_POST['$fee']; }?>">
                                                </div>
                                                <div class="col-lg-2 col-md-2"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-6">
                                                    <label class="control-label">Категория <span class="required">*</span></label>
                                                    <input type="text" class="wp-form-control wpcf7-text" placeholder="Категория" name="category" required value="<?php if(isset($_POST['$category'])){echo $_POST['$category']; }?>">
                                                </div>
                                                <div class="col-lg-2 col-md-2"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-6">
                                                    <button class="wpcf7-submit button--itzel" name="ok" type="submit">
                                                        <i class="button__icon fa fa-share"></i><span>Добавить</span>
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
    <?php
    }
    ?>
    <?php include('src/footer.php') ?>
    <?php include('src/connectjs.php') ?>
</body>

</html>
