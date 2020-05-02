<?php
$eol = PHP_EOL;
$courses = simplexml_load_file('../common/data/courses.xml', 'SimpleXMLIterator');

$courses = new CallbackFilterIterator($courses, function($current, $key, $iterator) {
    return strtolower($current->level) == "intermediate";
});

foreach ($courses as $course) {
    echo "$course->title with $course->author (level: $course->level)$eol";
}