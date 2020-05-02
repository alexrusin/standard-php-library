<?php
class FilterByExtension extends RecursiveFilterIterator
{
    protected $images;

    public function __construct(RecursiveIterator $files, $images)
    {
        parent::__construct($files);

        $this->images = $images;
    }

    public function accept()
    {
        if ($this->hasChildren()) {
            return true;
        }
        
        return $this->current()->isFile() &&
        in_array(strtolower($this->current()->getExtension()), $this->images);
    }

    public function getChildren()
    {
        return new self($this->getInnerIterator()->getChildren(), $this->images);
    }
}



$files = new RecursiveDirectoryIterator('../common');
$files->setFlags(FilesystemIterator::UNIX_PATHS);
$images = array('docx','csv', 'txt');
$files = new FilterByExtension($files, $images);
$files = new RecursiveIteratorIterator($files);
foreach ($files as $file) {
    echo $file->getPathname() . PHP_EOL;
}