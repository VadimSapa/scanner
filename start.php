<?php

require_once 'autoload.php';
require_once 'products_example.php';

echo "Scan:";

$resource = fopen("php://stdin", "r");
$input = fgets($resource);
$inputProducts = trim($input);

$terminal = new \SapaVadim\Terminal();

$terminal->setProducts($stock); // IN
$totals = $terminal->scan($inputProducts);

echo 'Invoice: $' . number_format($totals, 2) . PHP_EOL;
