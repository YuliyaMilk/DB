<?php
include('src/youAreHere.php');
include('src/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Doctor Finder: Записи</title>
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
    echo youAreHere("Записи");

    $id = $_SESSION['log']['Id'];
    if ($_SESSION['log1'] == "client") {
        ?>
        <section id="service">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="service-area">
                            <!-- Start Service Title -->
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
                                                    <th>Скачать</th>
                                                    <th>Удалить</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $sql = mysqli_query($con, "SELECT * FROM test_appointment WHERE Users_id='$id' ");
                                                    while ($row = mysqli_fetch_array($sql)) {
                                                        $test = $row['Test_id'];
                                                        $sql2 = mysqli_query($con, "SELECT * FROM test WHERE id='$test' ");
                                                        $row2 = mysqli_fetch_array($sql2);
                                                        ?>
                                                    <tr>
                                                        <th scope="row"><?= $row2['test_name'] ?></th>
                                                        <td><?= $row['Test_date'] ?></td>
                                                        <td><?= $row['Test_time'] ?></td>
                                                        <td><a href="<?= $row['Report'] ?>" target="_blank">Скачать</a></td>
                                                        <td><a href="deleteapp.php?data=test&action=delete&id=<?= $row['Id']; ?>">Удалить запись</a></td>
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
                                <h2>Запись в врачу</h2>
                                <div class="line"></div>
                            </div>
                            <div class="service-content">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Врач</th>
                                                    <th>Дата</th>
                                                    <th>Время</th>
                                                    <th>Скачать</th>
                                                    <th>Удалить</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $sql = mysqli_query($con, "SELECT * FROM doctor_app WHERE Users_id='$id' ");
                                                    while ($row = mysqli_fetch_array($sql)) {
                                                        $doc = $row['Doctor_id'];
                                                        $sql2 = mysqli_query($con, "SELECT * FROM doctor WHERE id='$doc' ");
                                                        $row2 = mysqli_fetch_array($sql2);
                                                        $sts = $row['Status'];
                                                        ?>
                                                    <tr>
                                                        <th scope="row"><?= $row2['Name'] ?></th>
                                                        <td><?= $row['App_date'] ?></td>
                                                        <td><?= $row['App_time'] ?></td>
                                                        <?php
                                                                if ($sts == "Rejected") {
                                                                    ?>
                                                            <td>Врач отменил</td>
                                                            <td>
                                                                <a href="deleteapp.php?data=doctor&action=delete&id=<?= $row['Id']; ?>">Удалить запись</a>
                                                            </td>
                                                        <?php
                                                                } else {
                                                                    ?>
                                                            <td><a href="<?= $row['Report'] ?>" target="_blank">Скачать</a></td>
                                                            <td>
                                                                <a href="deleteapp.php?data=doctor&action=delete&id=<?= $row['Id']; ?>">Удалить запись</a>
                                                            </td>
                                                        <?php
                                                                }
                                                                ?>
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
    <?php
    } else if ($_SESSION['log1'] == "doctor") {
        $id = $_SESSION['log']['Id'];
        $status = "Rejected";
        ?>
        <section id="service">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="service-area">
                            <div class="section-heading">
                                <h2>Записи</h2>
                                <div class="line"></div>
                            </div>
                            <div class="service-content">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Пациент</th>
                                                    <th>Дата</th>
                                                    <th>Время</th>
                                                    <th>Услуга</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $sql = mysqli_query($con, "SELECT * FROM doctor_app WHERE Doctor_id='$id' and Status!='$status' ");
                                                    while ($row = mysqli_fetch_array($sql)) {
                                                        $sts = $row['Status'];
                                                        $user = $row['Users_id'];
                                                        $sql2 = mysqli_query($con, "SELECT * FROM client WHERE Id='$user' ");
                                                        $row2 = mysqli_fetch_array($sql2);
                                                        ?>
                                                    <tr>
                                                        <th scope="row"><?= $row2['Name'] ?></th>
                                                        <td><?= $row['App_date'] ?></td>
                                                        <td><?= $row['App_time'] ?></td>
                                                        <td><a href="deleteapp.php?data=doctor&action=reject&id=<?= $row['Id']; ?>">Отменить</a></td>
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
    <?php
    }
    ?>

    <?php include('src/footer.php') ?>
    <?php include('src/connectjs.php') ?>
</body>

</html>
