<?php
$db = mysqli_connect('localhost', 'root', '', 'tasks');
$string=mysqli_real_escape_string($db, $_POST['data']);
mysqli_query($db, "DELETE FROM task WHERE id='$string';");