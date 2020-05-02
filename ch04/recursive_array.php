<?php
$products = array(
    'Cameras'     => array('DSLR', 'smartphone', 'compact'),
    'Lenses'      => array('telephoto', 'wide angle', 'fisheye'),
    'Accessories' => array('tripod', 'camera bag', 'Filters' =>
        array('polarizing', 'UV', 'neutral density')));

$products = new RecursiveArrayIterator($products);
$products = new RecursiveIteratorIterator($products, RecursiveIteratorIterator::SELF_FIRST);

foreach ($products as $category => $items) {

    echo str_repeat('  ', $products->getDepth());
    if ($products->hasChildren()) {
        echo $category . PHP_EOL;
    } else {
        echo $items . PHP_EOL;
    }
} 