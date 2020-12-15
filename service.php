<?php
include('src/youAreHere.php');
include('src/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Doctor Finder : Услуги</title>
    <?php include('src/head.php') ?>
</head>

<body>
    <?php include('src/header.php') ?>
    <?php echo youAreHere("Услуги") ?>

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
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = mysqli_query($con, "SELECT * FROM test") or die(mysqli_error($con));
                                            while ($row = mysqli_fetch_array($sql)) {
                                                ?>
                                                <tr>
                                                    <th scope="row"><?= $row['test_name'] ?></th>
                                                    <td><?= $row['test_cost'] ?></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                    <div class="readmore_area">
                                        <a data-hover="Запись" href="index.php"><span>Запись</span></a>
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
