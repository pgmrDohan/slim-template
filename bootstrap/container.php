<?php
use App\Factory\DatabaseFactory;
use Psr\Container\ContainerInterface;
use Illuminate\Database\Capsule\Manager;
use Dotenv\Dotenv;

$container = $app->getContainer();
$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

$container->set('db', function (ContainerInterface $container) {
    $dbSettings = [
        'driver' => $_ENV["DB_ADAPTER"],
        //'host' => $_ENV["DB_HOST"],
        'database' => $_ENV["DB_NAME"],
        //'username' => $_ENV["DB_USER"],
        //'password' => $_ENV["DB_PASS"],
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci'
    ];

    $manager = new Manager;
    $manager->addConnection($dbSettings);

    $manager->getConnection()->enableQueryLog();

    $manager->setAsGlobal();
    $manager->bootEloquent();

    return $manager;
});