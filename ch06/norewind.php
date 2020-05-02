<?php
$sports = new ArrayIterator(array('football', 'baseball', 'cricket'));
$sports = new NoRewindIterator($sports);
echo '<<First run:>>' . PHP_EOL;
foreach ($sports as $sport) {
    echo $sport . PHP_EOL;
}
$sports->rewind();
echo '<<Second run:>>' . PHP_EOL;
foreach ($sports as $sport) {
    echo $sport . PHP_EOL;
}