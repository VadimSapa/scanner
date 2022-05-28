<?php

use Scanner\Terminal;

require_once 'autoload.php';

echo "Scan:";
$resource = fopen("php://stdin", "r");
$input = fgets($resource);
$inputProducts = trim($input);
echo 'Basket: ' . $inputProducts . PHP_EOL;

$terminal = new Terminal();
$terminal->scan($inputProducts);

echo 'Invoice: $' . number_format($terminal->getTotal(), 2) . PHP_EOL;





