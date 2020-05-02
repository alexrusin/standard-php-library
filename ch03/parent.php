<?php
$dirs = new RecursiveDirectoryIterator('..');
$dirs = new ParentIterator($dirs);
$dirs = new RecursiveIteratorIterator($dirs, RecursiveIteratorIterator::SELF_FIRST);
foreach ($dirs as $dir) {
    echo $dir->getFilename() . PHP_EOL;
}