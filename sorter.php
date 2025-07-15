<?php

$inputFile = 'numbers.txt';
$outputFile = 'numbers.json';

if (!file_exists($inputFile)) {
    die("Input file '{$inputFile}' not found.");
}

$content = file_get_contents($inputFile);
if ($content === false) {
    die("Failed to read '{$inputFile}'.");
}

$lines = array_filter(array_map('trim', explode("\n", $content)), fn($line) => $line !== '');

file_put_contents($outputFile, json_encode(array_values($lines), JSON_PRETTY_PRINT));

echo "Done";