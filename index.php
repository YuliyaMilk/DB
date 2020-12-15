<?php include('src/config.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Doctor Finder : Главная страница</title>
    <?php include('src/head.php') ?>
    
</head>

<body>
    <?php include('src/header.php') ?>
    <?php include('src/slider.php') ?>

    <?php if (isset($_SESSION['log']) == "" or $_SESSION['log1'] == "client") {
        if (isset($_POST['ok'])) {
            if (isset($_SESSION['log']) == "") {
                echo '
                <script>
                  alert("Sign in First");
                  window.location.href = "login.php";
                </script>
                ';
            } else {
                $id = $_SESSION['log']['Id'];
                $type = $_POST['type'];
                if ($type == 'test') {
                    $test = $_POST['test'];
                    $appdate = $_POST['appdate1'];
                    // $apptime = date('H:i:s', strtotime($_POST['apptime1']));
                    $qry = mysqli_query($con, "INSERT INTO test_appointment (Test_id,Test_date,Users_id) VALUES ('$test','$appdate','$id')");
                    if ($qry) {
                        echo '
                        <script>
                        alert("Appointment set Sucessfully");
                        window.location.href = "appointments.php";
                        </script>
                        ';
                    } else {
                        // echo "Error: " . mysqli_error($con);
                        echo '
                        <script>
                        alert("Appointment set Unsucessful RETRY!");
                        </script>
                        ';
                    }
                } 
            }
        }
    ?>
        <section id="topFeature" >
            <div class="col-lg-4 col-md-4">
                <div class="row">
                    <div class="col-lg-4"> </div>
                    <div class="single-top-feature">
                        <h3>Запись</h3>
                        <p>Теперь запись на прием находится на расстоянии одного клика, поэтому просто нажмите кнопку ниже и сразу же приступайте к записи на прием.</p>
                        <div class="readmore_area">
                            <a data-hover="Запись" data-target="#myModal" data-toggle="modal" href="#">
                                <span>Запись</span>
                            </a>
                        </div>
                        <div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="myModal" role="dialog" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content"  style = "margin-top: 150px;">
                                    <div class="modal-header">
                                        <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                                            &times;
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel">Анализы</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="appointment-area">
                                            <form class="appointment-form" method="post">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6">
                                                        <label class="control-label">Дата <span class="required">*</span>
                                                        </label>
                                                        <input type="Date" class="wp-form-control wpcf7-text" placeholder="mm/dd/yy" name="appdate1" min="<?= date("Y-m-d"); ?>" max="<?= date("Y-m+1-d"); ?>" required>
                                                    </div>
                                                    <!-- <div class="col-md-6 col-sm-6">
                                                        <label class="control-label">Время <span class="required">*</span>
                                                        </label>
                                                        <input type="time" class="wp-form-control wpcf7-text" placeholder="hh:mm" name="apptime1" required>
                                                    </div> -->
                                                    <div class="col-md-6 col-sm-6">
                                                        <label class="control-label">Выберите анализ <span class="required">*</span>
                                                        </label>
                                                        <?php $sql = mysqli_query($con, "SELECT * FROM test") ?>
                                                        <select class="wp-form-control wpcf7-select" name="test" required>
                                                            <?php while ($row = mysqli_fetch_array($sql)) { ?>
                                                                <option value="<?= $row['id']; ?>"><?= $row['test_name']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="type" value="test">
                                                <button class="wpcf7-submit button--itzel" name="ok" type="submit">
                                                    <i class="button__icon fa fa-share"></i><span>Записаться</span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                   
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                    </div>
                </div>
            </div>
            </div>
        </section>
    <?php } ?>
    <?php include('src/footer.php') ?>
    <?php include('src/connectjs.php') ?>

</body>

</html>