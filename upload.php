<?php
include('src/config.php');
include('src/youAreHere.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Doctor Finder : Результаты</title>
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
    echo youAreHere("Результаты");
    ?>

    <section id="service">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="service-area">
                        <div class="section-heading">
                            <h2>Анализы</h2>
                            <div class="line"></div>
                        </div>
                        <div class="service-content">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Анализ</th>
                                                <th>Дата</th>
                                                <th>Время</th>
                                                <th>Upload</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = mysqli_query($con, "SELECT * FROM test_appointment ") or die(mysqli_error($con)); 
                                            while ($row = mysqli_fetch_array($sql)) {
                                                $test = $row['Test_id'];
                                                $sql2 = mysqli_query($con, "SELECT * FROM test WHERE id='$test' ") or die(mysqli_error($con)); 
                                                $row2 = mysqli_fetch_array($sql2);
                                                ?>
                                                <tr>
                                                    <th scope="row"><?= $row2['test_name'] ?></th>
                                                    <td><?= $row['Test_date'] ?></td>
                                                    <td><?= $row['Test_time'] ?></td>
                                                    <td><a href="uploadcode.php?data=test&id=<?= $row['Id'] ?>">Загрузить</a></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
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
                            <h2>Запись к врачу</h2>
                            <div class="line"></div>
                        </div>
                        <div class="service-content">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Врач</th>
                                                <th>Пациент</th>
                                                <th>Дата</th>
                                                <th>Время</th>
                                                <th>Upload</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = mysqli_query($con, "SELECT * FROM doctor_app") or die(mysqli_error($con));
                                            while ($row = mysqli_fetch_array($sql)) {
                                                $doc = $row['Doctor_id'];
                                                $sql2 = mysqli_query($con, "SELECT * FROM doctor WHERE id='$doc' ") or die(mysqli_error($con));
                                                $row2 = mysqli_fetch_array($sql2);
                                                $user = $row['Users_id'];
                                                $sql3 = mysqli_query($con, "SELECT * FROM client WHERE Id='$user' ") or die(mysqli_error($con));
                                                $row3 = mysqli_fetch_array($sql3);
                                                ?>
                                                <tr>
                                                    <th scope="row"><?= $row2['Name'] ?></th>
                                                    <td><?= $row3['Name'] ?></td>
                                                    <td><?= $row['App_date'] ?></td>
                                                    <td><?= $row['App_time'] ?></td>
                                                    <td><a href="uploadcode.php?data=doctor&id=<?= $row['Id'] ?>">Загрузить</a></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
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
