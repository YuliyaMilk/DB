<?php
include('src/youAreHere.php');
include('src/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Doctor Finder : Врачи</title>
    <?php include('src/head.php') ?>
</head>

<body>
    <script>let appdate, data;</script>
    <?php include('src/header.php') ?>
    <?php echo youAreHere("Запись к врачу") ?>

    <section id="appointmentsDoctor">

    <div class="container">
        <div class="row ">
        <div class="col-lg-12 col-md-12">
        <div class="section-heading">
            <h2>Врачи</h2>
            <div class="line"></div>
        </div>
        <div class="service-content">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Врач</th>
                            <th>Цена</th>
                            <th>Запись</th>
                        </tr>
                    </thead>
                            
                    <tbody>
                        <?php
                            $sql = mysqli_query($con, "SELECT DISTINCT Category FROM Doctor");
                            while ($row = mysqli_fetch_array($sql)) {
                        ?>
                        <thead>
                        <tr>
                            <th><?= $row['Category'] ?></th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            
                        <?php
                            $category = $row['Category'];
                            $sql1 = mysqli_query($con, "SELECT * FROM Doctor WHERE Category = '$category' ");
                            
                            
                            while ($row1 = mysqli_fetch_array($sql1)) {
                                
                        ?>
                           
                        <tr>
                            <th scope="row" style = "padding-left: 20px; color: #696969"><?= $row1['Name'] ?></th>
                            <td style = "color: #696969"><?= $row1['Fees'] ?></td>
                            <th>
                                <div class="col-md-6 col-sm-6">
                                <a style= "color: #0a861cde;" href="chooseDateTime.php?id=<?= $row1['Id']; ?>">Записаться</a>
                                    
                                </div>
                            </th>
                           
                        </tr>
                        <?php
                        }
                        ?>
                        </tbody>
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
</section>
    
    <?php include('src/footer.php') ?>
    <?php include('src/connectjs.php') ?>
</body>

</html>
