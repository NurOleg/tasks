<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="styles.css"/>
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css"/>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,700"/>
    <link rel="stylesheet" href="http://daneden.github.io/animate.css/animate.min.css"/>
</head>
<body>
<p>Simple todo-"app". Try hover and drag todo items.</p>

<div class='container'>
    <div class='add'>
        <i class='fa fa-plus'></i>
    </div>
    <div class='title'>
        <h1>Things to do</h1>
    </div>
    <div class='new-task'>
        <a class='add-new' href='#'>
            <i class='fa fa-plus'></i>
        </a>
        <input id='todo-text' placeholder='New task'>
    </div>
    <ul>
        <?php
        $connection = new mysqli("localhost", "root", ""); //выбираем парамерты подключения
        $create = "CREATE DATABASE IF NOT EXISTS tasks;
        CREATE TABLE tasks.task (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                                 text VARCHAR(100),
                                 cond BOOLEAN NOT NULL DEFAULT 1)";
        $connection->query($create);
        $query = "SELECT * FROM task";
        $result = $connection->query($query);
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <li class='row <? if ($row['cond'] != 1)
                echo 'done'; ?>'
                data-id="<?= $row['id']; ?>">
                <a class='remove' href='#'>
                    <i class='fa fa-trash-o'></i>
                </a>
                <a class='completed' href='#'>
                    <i class='fa fa-check'></i>
                </a>
                <?= $row['text']; ?>
            </li>
        <?php } ?>
    </ul>
</div>
</body>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script src="script.js"></script>
</html>
