<?php
class AuthorFilter extends FilterIterator
{
    protected $author;

    public function __construct($iterator, $author)
    {
        parent::__construct($iterator);
        $this->author = $author;
    }

    public function accept()
    {
        return $this->current()->author == $this->author;
    }
}

$courses = simplexml_load_file('../common/data/courses.xml', 'SimpleXMLIterator');

$powers = new AuthorFilter($courses, 'David Powers');
$peck = new AuthorFilter($courses, 'Jon Peck');
$courses = new AppendIterator($courses);
$courses->append($powers);
$courses->append($peck);
$previous = '';

foreach ($courses as $course) {
    if ($previous != $course->author) {
        echo 'Courses by ' . $course->author . PHP_EOL;
    }
   echo $course->title . PHP_EOL; 
   $previous = (string) $course->author;
}
