<?php
include('src/config.php');
$id = $_GET['id'];
$data = $_GET['data'];
if ($data == 'doctor') {
  $res = mysqli_query($con, "DELETE FROM doctor WHERE id = '$id'") or die(mysqli_error($con));
} else if ($data == 'test') {
  $res = mysqli_query($con, "DELETE FROM test WHERE id = '$id'") or die(mysqli_error($con));
}
if ($res == 1) {
  echo '
    <script>
      alert("Успешно");
    </script>
    ';
  header("location:update.php");
} else {
  echo '
    <script>
      alert("Что-то пошло не так");
    </script>
    ';
  header("location:update.php");
}