<?php
$courses = simplexml_load_file('../common/data/courses.xml', 'SimpleXMLIterator');
foreach ($courses as $course) {
    echo "$course->title" . PHP_EOL;
    //echo "$course->description" . PHP_EOL;
    $software = $course->software->children();
    $num_software = $software->count();
    echo 'Software covered: ' . PHP_EOL;
    if ($num_software == 1) {
        echo $software . PHP_EOL;
    } elseif ($num_software == 2) {
        echo "$software[0] and $software[1]." . PHP_EOL;
    } else {
        $software = new CachingIterator($software);
        foreach ($software as $type) {
            if($software->hasNext()) {
                echo "$type, ";
            } else {
                echo "and $type" . PHP_EOL;
            }
        }
    }
}