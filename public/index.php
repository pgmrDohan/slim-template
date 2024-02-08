<?php
require '../bootstrap/app.php';
require '../bootstrap/container.php';
require '../routes/web.php';
$app->getContainer()->get("db");
$app->run();