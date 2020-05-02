<?php
$data = simplexml_load_file('../common/data/courses.xml');
$courses = new SplDoublyLinkedList();

function getLastName($author) {
    $pos = strrpos($author, ' ');
    return substr($author, $pos + 1);
}

foreach ($data as $item) {
    if ($courses->isEmpty()) {
        $courses->push($item);
    } else {
        $last_name = getLastName($item->author);
        $courses->rewind();
        while ($courses->valid() && getLastName($courses->current()->author) <= $last_name) {
            $courses->next();
        }
        $courses->add($courses->key(), $item);
    }
}

foreach ($courses as $course) {
    echo $course->author . ': ' . $course->title . ' (duration: ' . $course->duration . ')' . PHP_EOL;
}

echo '<<Reverse Order>>' . PHP_EOL;

$courses->setIteratorMode(SplDoublyLinkedList::IT_MODE_LIFO | SplDoublyLinkedList::IT_MODE_DELETE);

foreach ($courses as $course) {
    echo $course->author . ': ' . $course->title . ' (duration: ' . $course->duration . ')' . PHP_EOL;
}

var_dump($courses->isEmpty());