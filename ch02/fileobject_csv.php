<?php
$csvfile = new SplFileObject('../common/data/cars_tab.csv');
$csvfile->setFlags(SplFileObject::READ_CSV);
$csvfile->setCsvControl("\t");
foreach ($csvfile as $line) {
    $cars[] = $line;
}

print_r($cars);
