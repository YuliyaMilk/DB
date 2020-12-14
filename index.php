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
                    $apptime = date('H:i:s', strtotime($_POST['apptime1']));
                    $qry = mysqli_query($con, "INSERT INTO test_appointment (Test_id,Test_time,Test_date,Users_id,Report) VALUES ('$test','$apptime','$appdate','$id','')");
                    if ($qry) {
                        echo '
                        <p>
                        alert("Appointment set Sucessfully");
                        window.location.href = "appointments.php";
                        </p>
                        ';
                    } else {
                        // echo "Error: " . mysqli_error($con);
                        echo '
                        <script>
                        alert("Appointment set Unsucessful RETRY!");
                        </script>
                        ';
                    }
                } else if ($type == 'doctor') {
                    $name = $_SESSION['log']['Name'];
                    $doc = $_POST['docname'];
                    $appdate = $_POST['appdate'];
                    $apptime = date('H:i:s', strtotime($_POST['apptime']));
                    $qry = mysqli_query($con, "INSERT INTO doctor_app (Doctor_id,App_date,App_time,Users_id,User_name,Report,Status) VALUES ('$doc','$appdate','$apptime','$id','$name','','Accepted')");
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
        <section id="topFeature">
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
                                <div class="modal-content">
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
                                                    <div class="col-md-6 col-sm-6">
                                                        <label class="control-label">Время <span class="required">*</span>
                                                        </label>
                                                        <input type="time" class="wp-form-control wpcf7-text" placeholder="hh:mm" name="apptime1" required>
                                                    </div>
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
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                            &times;
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel">Запись к врачу</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="appointment-area">
                                            <form class="appointment-form" method="post">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6">
                                                        <label class="control-label">Выберите врача <span class="required">*</span>
                                                        </label>
                                                        <?php $sql1 = mysqli_query($con, "SELECT * FROM doctor"); ?>

                                                        <select class="wp-form-control wpcf7-select" name="docname" required>
                                                            <?php while ($row1 = mysqli_fetch_array($sql1)) { ?>
                                                                <option value="<?= $row1['Id'] ?>"><?= $row1['Name'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6">
                                                        <label class="control-label">Дата <span class="required">*</span>
                                                        </label>
                                                        <input type="date" value="2020-11-27" class="wp-form-control wpcf7-text" placeholder="dd/mm/yy" name="appdate" min="<?= date("Y-m-d"); ?>" max="<?= date("Y-m+1-d"); ?>" required>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6" id="time">
                                                        <label class="control-label">Время <span class="required">*</span>
                                                        </label>
                                                        <select class="wp-form-control wpcf7-text" name="apptime" required>
                                                            <?php $timeMinutes = array(
                                                                0 => "00",
                                                                1 => "15",
                                                                2 => "30",
                                                                3 => "45"
                                                            );

                                                            $timeHours = array(
                                                                0 => "09",
                                                                1 => "10",
                                                                2 => "11",
                                                                3 => "12",
                                                                4 => "13",
                                                                5 => "14",
                                                                6 => "15",
                                                                7 => "16"
                                                            );
                                                            ?>
                                                            <?php for ($i = 0; $i <= 7; $i++) {
                                                                for ($j = 0; $j <= 3; $j++) {
                                                                    $sql = mysqli_query($con, "SELECT * FROM doctor_app");
                                                                    $taken = false;
                                                                    $data = date('H:i:s', strtotime($timeHours[$i] . ":" . $timeMinutes[$j]));

                                                                    while ($row = mysqli_fetch_array($sql)) {

                                                                        if ($row['App_time'] == $data and $row['Doctor_id'] == $_POST['docname'] and $row['App_date'] == $_POST['appdate']) {
                                                                            $taken = true;
                                                                            break;
                                                                        }
                                                                    }
                                                                    if (!$taken) {
                                                            ?>
                                                                        <option value="<?= $timeHours[$i] . ":" . $timeMinutes[$j]; ?>"><?= $timeHours[$i] . ":" . $timeMinutes[$j]; ?></option>
                                                            <?php }
                                                                }
                                                            } ?>
                                                        </select>
                                                    </div>
                                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
                                                    <script type="text/javascript">
                                                        const docname = document.getElementsByName("docname")[0];
                                                        const appdate = document.getElementsByName("appdate")[0];
                                                        let data = "docname=" + docname.value + "&" + "appdate=" + appdate.value;

                                                        $.ajax({
                                                            url: "index.php",
                                                            type: "POST",
                                                            data: data,
                                                            success: function(response) {
                                                                $('#time').replaceWith($('#time', response));
                                                            },
                                                        })
                                                        docname.addEventListener("change", () => {
                                                            let data = "docname=" + docname.value + "&" + "appdate=" + appdate.value;
                                                            $.ajax({
                                                                url: "index.php",
                                                                type: "POST",
                                                                data: data,
                                                                success: function(result) {
                                                                    $('#time').replaceWith($('#time', result));
                                                                }
                                                            });
                                                        });
                                                        appdate.addEventListener("change", () => {
                                                            let data = "docname=" + docname.value + "&" + "appdate=" + appdate.value;
                                                            $.ajax({ 
                                                                url: "index.php",
                                                                type: "POST",
                                                                data: data,
                                                                success: function(result) {
                                                                    $('#time').replaceWith($('#time', result));
                                                                }
                                                            });
                                                        });
                                                    </script>
                                                </div>
                                                <input type="hidden" name="type" value="doctor">
                                                <button class="wpcf7-submit button--itzel" name="ok" type="submit">
                                                    <i class="button__icon fa fa-share"></i><span>Взять талон</span>
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