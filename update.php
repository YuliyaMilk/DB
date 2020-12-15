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

    <?php include('src/header.php'); 
    if (!isset($_SESSION['log']) || $_SESSION['log'] == '') {
        echo '
        <script>
          alert("Сначала войдите!");
          window.location.href = "index.php";
        </script>
        ';
    }
    echo youAreHere("Изменить");
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
                                                <th>Стоимость</th>
                                                <th>Изменить</th>
                                                <th>Удалить</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = mysqli_query($con, "SELECT * FROM test");
                                            while ($row = mysqli_fetch_array($sql)) {
                                                ?>
                                                <tr>
                                                    <th scope="row"><?= $row['test_name'] ?></th>
                                                    <td><?= $row['test_cost'] ?></td>
                                                    <td><a href="edit.php?data=test&id=<?= $row['id']; ?>">Изменить</a></td>
                                                    <td><a href="delete.php?data=test&id=<?= $row['id']; ?>">Удалить</a></td>
                                                </tr>
                                            <?php
                                            } 
                                            ?>
                                        </tbody>
                                    </table>
                                    <div class="readmore_area">
                                        <a data-hover="Добавить" href="insert.php?data=test"><span>Добавить</span></a>
                                    </div>
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
                            <h2>Врачи</h2>
                            <div class="line"></div>
                        </div>
                        <div class="service-content">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Врач</th>
                                                <th>Стоимость</th>
                                                <th>Изменить</th>
                                                <th>Удалить</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = mysqli_query($con, "SELECT * FROM doctor");
                                            while ($row = mysqli_fetch_array($sql)) {
                                                ?>
                                                <tr>
                                                    <th scope="row"><?= $row['Name'] ?></th>
                                                    <td><?= $row['Fees'] ?></td>
                                                    <td><a href="edit.php?data=doctor&id=<?= $row['Id']; ?>">Изменить</a></td>
                                                    <td><a href="delete.php?data=doctor&id=<?= $row['Id']; ?>">Удалить</a></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <div class="readmore_area">
                                        <a data-hover="Добавить" href="insert.php?data=doctor"><span>Добавить</span></a>
                                    </div>
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
