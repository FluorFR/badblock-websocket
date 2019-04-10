<?php
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/Docker.php';
require __DIR__ . '/Matchmaking.php';

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

$loop = React\EventLoop\Factory::create();

$server = new \Ratchet\App('localhost', 8080, '127.0.0.1', $loop);

$server->route('/docker', new Docker($loop), array('*'));
$server->route('/matchmaking', new Matchmaking($loop), array('*'));

echo "[" . date('Y-m-d H:i:s') . "] Server Start \n";

$server->run();