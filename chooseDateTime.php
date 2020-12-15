<?php
include('src/config.php');
include('src/youAreHere.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Doctor Finder : Запись к врачу</title>
    <?php include('src/head.php') ?>
</head>

<body>

    <?php include('src/header.php'); ?>
    
    <?php
    // if (!isset($_SESSION['log']) || $_SESSION['log'] == '') {
    //     echo '
    //     <script>
    //       alert("Сначала войдите!");
    //       window.location.href = "index.php";
    //     </script>
    //     ';
    // }
    echo youAreHere("Запись в к врачу");
    

    $id = $_GET['id'];
    if (isset($_SESSION['log']) == "" or $_SESSION['log1'] == "client") {
        if (isset($_POST['ok'])) {
        if (isset($_SESSION['log']) == "") {
            echo '
            <script>
              alert("Sign in First");
              window.location.href = "login.php";
            </script>
            ';
        } else {
               
                $name = $_SESSION['log']['Name'];
                $user_id = $_SESSION['log']['Id'];
                $doc = $id;
                $appdate = $_POST['appdate'];
                $apptime = date('H:i:s', strtotime($_POST['apptime']));
                $qry = mysqli_query($con, "INSERT INTO doctor_app (Doctor_id,App_date,App_time,Users_id,User_name,Report,Status) VALUES ('$doc','$appdate','$apptime','$user_id','$name','','Accepted')") or die(mysqli_error($con));
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
        $sql = mysqli_query($con, "SELECT * FROM Doctor WHERE Id = '$id' ") or die(mysqli_error($con));
        $row = mysqli_fetch_array($sql)
     ?>

    
        <section id="service">
        <div class="section-heading">
            <h2><?= $row['Category'] ?></h2>
            <h3><?= $row['Name'] ?></h3>
            <div class="line"></div>
        </div>
        <form class="appointment-form" method="post">
            <div class="col-md-6 col-sm-6">
                <label class="control-label">Дата <span class="required">*</span>
                </label>
                <input type="Date" class="wp-form-control wpcf7-text" placeholder="mm/dd/yy" name="appdate" min="<?= date("Y-m-d"); ?>" max="<?= date("Y-m+1-d"); ?>" required>
            </div>
            <div class="col-md-6 col-sm-6" id="time1" >
        
                <label class="control-label">Время <span class="required">*</span></label>
                <select class="wp-form-control wpcf7-text" name="apptime"  required>
                        <?php $timeMinutes = array(
                            0 => "00",
                            1 => "30",
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
                            for ($j = 0; $j <= 1; $j++) {
                                $doctor = $row1['Id'];
                                $sql3 = mysqli_query($con, "SELECT * FROM doctor_app WHERE Doctor_id=$id");
                                $taken = false;
                                $data = date('H:i:s', strtotime($timeHours[$i] . ":" . $timeMinutes[$j]));

                                while ($row3 = mysqli_fetch_array($sql3)) {

                                    if ($row3['App_time'] == $data  and $row3['App_date'] == $_POST['appdate']) {
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

                                      const  appdate = document.getElementsByName("appdate")[0];
                                       let data = "appdate=" + appdate.value;
                                    console.log(appdate);
                                    $.ajax({
                                        url: "chooseDateTime.php?id=<?= $id ?>",
                                        type: "POST",
                                        data: data,
                                        success: function(response) {
                                            $('#time1').replaceWith($('#time1', response));
                                            
                                        },
                                    })
                                    appdate.addEventListener("change", () => {
                                        let data = "appdate=" + appdate.value;
                                        $.ajax({ 
                                            url: "chooseDateTime.php?id=<?= $id ?>",
                                            type: "POST",
                                            data: data,
                                            success: function(result) {
                                                $('#time1').replaceWith($('#time1', result));
                                            }
                                        });
                                    });
                                </script>

                <div class="row">
                <div class="col-lg-2 col-md-2"></div>
                <div class="col-lg-8 col-md-8 col-sm-6">
                    <button class="wpcf7-submit button--itzel" name="ok" type="submit">
                        <i class="button__icon fa fa-share"></i><span>Взять талон</span>
                    </button>
                </div>
            </div>
            </form>
        </section>


    <?php include('src/footer.php') ?>
    <?php include('src/connectjs.php') ?>
</body>

</html>
