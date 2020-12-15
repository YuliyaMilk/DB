<?php
include('src/config.php');
include('src/youAreHere.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Doctor Finder: Загрузка результатов</title>
    <?php include('src/head.php') ?>
</head>

<body>

    <?php include('src/header.php') ?>

    <?php
    echo youAreHere("Результаты");
    if (!isset($_SESSION['log']) || $_SESSION['log'] == '') {
        echo '
        <script>
          alert("Сначала войдите!");
          window.location.href = "index.php";
        </script>
        ';
    }

    $id = $_GET['id'];
    $data = $_GET['data'];
    if (isset($_POST['btn'])) {
        $server_path = '';
        if ($data == 'doctor') {
            $server_path = "docreports";
        } else if ($data == 'test') {
            $server_path = "testreports";
        }
        $file_name = $_POST['file_name'];
        #file type
        $file_o_name = $_FILES['img']['name'];
        $file_size = $_FILES['img']['size'];
        $file_type = $_FILES['img']['type'];
        if ($file_size > 1572864) {
            echo '
        <script>
        alert("Превышен размер файла!!!");
        window.location.href = "upload.php";
        </script>
        ';
        }
        if ($file_type == "application/pdf") {
            # после того, как файл будет проверен, давайте загрузим 
            # давайте создадим путь к серверу перед загрузкой

            if (!file_exists($server_path)) {
                mkdir($server_path);
            }
      
            $server_path = $server_path . "/" . rand(1000, 9999) . "_" . $file_o_name;
            $upload = move_uploaded_file($_FILES['img']['tmp_name'], $server_path) or die($_FILES['img']['error']);
            if ($upload) {
              
                $saveData = mysqli_query($con, "UPDATE doctor_app SET Report='$server_path' WHERE Id='$id' ") or die(mysqli_error($con));
                if ($saveData) {
                    echo '
                <script>
                  window.location.href = "upload.php";
                </script>
                ';
                }
            }
        } else {
            echo '
        <script>
        alert("Что-то пошло не так");
        window.location.href = "upload.php";
        </script>
        ';
        }
    }
    ?>
    <section id="service">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="service-area">
                        <div class="section-heading">
                            <h2>Результаты</h2>
                            <div class="line"></div>
                        </div>
                        <div class="service-content">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <form class="appointment-form" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-2"></div>
                                            <div class="col-lg-8 col-md-8 col-sm-6">
                                                <label class="control-label">Имя <span class="required">*</span></label>
                                                <input type="text" class="wp-form-control wpcf7-text" name="file_name" required>
                                            </div>
                                            <div class="col-lg-2 col-md-2"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-2 col-md-2"></div>
                                            <div class="col-lg-8 col-md-8 col-sm-6">
                                                <label class="control-label">Файл: <span class="required">*</span></label>
                                                <input type="file" class="wp-form-control wpcf7-text" name="img" required>
                                            </div>
                                            <div class="col-lg-2 col-md-2"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-2 col-md-2"></div>
                                            <div class="col-lg-8 col-md-8 col-sm-6">
                                                <button class="wpcf7-submit button--itzel" name="btn" type="submit">
                                                    <i class="button__icon fa fa-share"></i><span>Загрузить</span>
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
