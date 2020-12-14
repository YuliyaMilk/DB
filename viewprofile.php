<?php include('src/youAreHere.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Doctor Finder : Просмотр профиля</title>
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
    
    echo youAreHere("Мой профиль");
    ?>

    <section id="service">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="service-area">
                        <div class="section-heading">
                            <h2>Мой профиль</h2>
                            <div class="line"></div>
                        </div>
                        <div class="service-content">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <form class="appointment-form" action="editprofile.php" method="post">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="single-testimonial">
                                                    <div class="testimonial-img">
                                                        <?php if ($_SESSION['log']['Dp'] != NULL) { ?>
                                                            <img class="testimonial-img" src="<?= $_SESSION['log']['Dp'] ?>">
                                                        <?php } ?>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-2 col-md-2"></div>
                                            <div class="col-lg-8 col-md-8 col-sm-6">
                                                <label class="control-label">Имя <span class="required">*</span></label>
                                                <input type="text" class="wp-form-control wpcf7-text" value="<?= $_SESSION['log']['Name'] ?>" readonly>
                                            </div>
                                            <div class="col-lg-2 col-md-2"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-2 col-md-2"></div>
                                            <div class="col-lg-8 col-md-8 col-sm-6">
                                                <label class="control-label">Email <span class="required">*</span></label>
                                                <input type="email" class="wp-form-control wpcf7-email" value="<?= $_SESSION['log']['Email'] ?>" readonly>
                                            </div>
                                            <div class="col-lg-2 col-md-2"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-2 col-md-2"></div>
                                            <div class="col-lg-8 col-md-8 col-sm-6">
                                                <label class="control-label">Дата рождения<span class="required">*</span></label>
                                                <input type="email" class="wp-form-control wpcf7-email" value="<?= $_SESSION['log']['Dob'] ?>" readonly>
                                            </div>
                                            <div class="col-lg-2 col-md-2"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-2 col-md-2"></div>
                                            <div class="col-lg-8 col-md-8 col-sm-6">
                                                <label class="control-label">Пол <span class="required">*</span></label>
                                                <input type="email" class="wp-form-control wpcf7-email" value="<?= $_SESSION['log']['Gender'] ?>" readonly>
                                            </div>
                                            <div class="col-lg-2 col-md-2"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-2 col-md-2"></div>
                                            <div class="col-lg-8 col-md-8 col-sm-6">
                                                <label class="control-label">Адрес <span class="required">*</span></label>
                                                <input type="text" class="wp-form-control wpcf7-email" value="<?= $_SESSION['log']['Address'] ?>" readonly>
                                            </div>
                                            <div class="col-lg-2 col-md-2"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-2 col-md-2"></div>
                                            <div class="col-lg-8 col-md-8 col-sm-6">
                                                <label class="control-label">Телефон <span class="required">*</span></label>
                                                <input type="number" class="wp-form-control wpcf7-text" value="<?= $_SESSION['log']['Phone'] ?>" readonly>
                                            </div>
                                            <div class="col-lg-2 col-md-2"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-2 col-md-2"></div>
                                            <div class="col-lg-8 col-md-8 col-sm-6">
                                                <button class="wpcf7-submit button--itzel" type="submit">
                                                    <i class="button__icon fa fa-share"></i><span>Редактировать</span>
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
