<?php
$animals = array('horse', 'aardvark', 'monkey', 'zebra',
    'giraffe', 'dog', 'cat');

$min = new SplMinHeap();
foreach ($animals as $animal) {
    $min->insert($animal);
}

// echo $min->top() . PHP_EOL;
// echo $min->next() . PHP_EOL;
// echo $min->current() . PHP_EOL;

foreach ($min as $item) {
    echo $item . PHP_EOL;
}

$max = new SplMaxHeap();
foreach ($animals as $animal) {
    $max->insert($animal);
}
echo '<pre>';
print_r($min);
print_r($max);
echo '</pre>';