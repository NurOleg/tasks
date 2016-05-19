<?php
print_r($_POST['data']);
$db = mysqli_connect('localhost', 'root', '', 'tasks');
$string=mysqli_real_escape_string($db, $_POST['data']);
mysqli_query($db, "UPDATE task SET cond = cond ^ 1 WHERE id='$string';");