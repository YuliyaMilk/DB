<?php
include('src/config.php');
include('src/youAreHere.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Doctor Finder : Изменить</title>
    <?php include('src/head.php') ?>
</head>

<body>

    <?php include('src/header.php'); ?>
    
    <?php
    if (!isset($_SESSION['log']) || $_SESSION['log'] == '') {
        echo '
        <script>
          alert("Сначала войдите!");
          window.location.href = "index.php";
        </script>
        ';
    }
    echo youAreHere("Редактировать");
    

    $id = $_GET['id'];
    $data = $_GET['data'];
    if (isset($_POST['btn'])) {
        if ($data == 'test') {
            $testname = $_POST['testname'];
            $testfee = $_POST['testfee'];
            $res1 = mysqli_query($con, "UPDATE test SET test_name = '$testname', test_cost = '$testfee' WHERE id = '$id' ") or die(mysqli_error($con));
            if ($res1 == 1) {
                echo '
            <script>
              alert("Успешно!");
              window.location.href="update.php";
            </script>
            ';
            } else {
                echo '
            <script>
              alert("Что-то пошло не так");
            </script>
            ';
            }
        } else if ($data == 'doctor') {
            $testname = $_POST['name'];
            $testfee = $_POST['fee'];
            $res1 = mysqli_query($con, "UPDATE doctor SET Name = '$testname', Fees = '$testfee' WHERE id = '$id' ") or die(mysqli_error($con));
            if ($res1 == 1) {
                echo '
            <script>
              alert("Успешно");
              window.location.href="update.php";
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
    }
    if ($data == 'test') {
        $res = mysqli_query($con, "SELECT * FROM test WHERE id = '$id' ");
        $row = mysqli_fetch_array($res);
        ?>
        <section id="service">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="service-area">
                            <div class="section-heading">
                                <h2>Изменить анализ</h2>
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
                                                    <input type="text" class="wp-form-control wpcf7-text" name="testname" value="<?= $row['test_name'] ?>" required>
                                                </div>
                                                <div class="col-lg-2 col-md-2"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-6">
                                                    <label class="control-label">Стоимость <span class="required">*</span></label>
                                                    <input type="number" class="wp-form-control wpcf7-text" name="testfee" value="<?= $row['test_cost'] ?>" required>
                                                </div>
                                                <div class="col-lg-2 col-md-2"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-6">
                                                    <button class="wpcf7-submit button--itzel" name="btn" type="submit">
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
    <?php
    } else if ($data == 'doctor') {
        $res = mysqli_query($con, "SELECT * FROM doctor WHERE id = '$id' ");
        $row = mysqli_fetch_array($res);
        ?>
        <section id="service">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="service-area">
                         
                            <div class="section-heading">
                                <h2>Изменить данные врача</h2>
                                <div class="line"></div>
                            </div>
                            <div class="service-content">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <form class="appointment-form" method="post">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-6">
                                                    <label class="control-label">Имя <span class="required">*</span></label>
                                                    <input type="text" class="wp-form-control wpcf7-text" name="name" value="<?= $row['Name'] ?>" required>
                                                </div>
                                                <div class="col-lg-2 col-md-2"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-6">
                                                    <label class="control-label">Стоимость <span class="required">*</span></label>
                                                    <input type="number" class="wp-form-control wpcf7-text" name="fee" value="<?= $row['Fees'] ?>" required>
                                                </div>
                                                <div class="col-lg-2 col-md-2"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-6">
                                                    <button class="wpcf7-submit button--itzel" name="btn" type="submit">
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
    <?php
    }
    ?>


    <?php include('src/footer.php') ?>
    <?php include('src/connectjs.php') ?>
</body>

</html>
