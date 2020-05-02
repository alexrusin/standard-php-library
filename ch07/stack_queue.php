<?php
$stack = new SplStack();
$stack[] = 'A';
$stack->push('B');
$stack->push('C');
$stack[] = 'D';
$stack[] = 'E';

$queue = new SplQueue();
$queue->enqueue('A');
$queue->enqueue('B');
$queue->push('C');
$queue[] = 'D';
$queue[] = 'E';

echo '<h2>Stack</h2>' . PHP_EOL;
foreach ($stack as $val) {
    echo $val . ' ';
}

echo PHP_EOL;

echo '<h2>Queue</h2>' . PHP_EOL;
foreach ($queue as $val) {
    echo $val . ' ';
}

echo 'This was popped from the stack: ' . $stack->pop() . PHP_EOL;
echo 'This was dequeued from the queue: ' . $queue->dequeue() . PHP_EOL;

$stack->setIteratorMode(SplStack::IT_MODE_DELETE | SplStack::IT_MODE_LIFO);

$queue->setIteratorMode(SplQueue::IT_MODE_DELETE | SplStack::IT_MODE_FIFO);

echo '<h2>Stack</h2>' . PHP_EOL;
foreach ($stack as $val) {
    echo $val . ' ';
}

echo PHP_EOL;

echo '<h2>Queue</h2>' . PHP_EOL;
foreach ($queue as $val) {
    echo $val . ' ';
}

echo PHP_EOL;

if ($stack->isEmpty() && $queue->isEmpty()) {
    echo 'Stack and queue are empty' . PHP_EOL;
}