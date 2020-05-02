<?php
$files = new RecursiveDirectoryIterator('../common');
$files->setFlags(RecursiveDirectoryIterator::SKIP_DOTS | RecursiveDirectoryIterator::UNIX_PATHS);
$files = new RecursiveTreeIterator($files);

foreach ($files as $file) {
    echo str_replace('..', '', $file) . PHP_EOL;
}
