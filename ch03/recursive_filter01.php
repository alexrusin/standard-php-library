<?php

class FilterImages extends RecursiveFilterIterator
{
    public function accept()
    {
        if ($this->hasChildren()) {
            return true;
        }

        $images = array('png', 'jpg', 'gif', 'webp');
        return $this->current()->isFile() && in_array(strtolower($this->current()->getExtension()), $images);
    }
}

$files = new RecursiveDirectoryIterator('../common');
$files->setFlags(FilesystemIterator::UNIX_PATHS);

$files = new FilterImages($files);
$files = new RecursiveIteratorIterator($files);

foreach ($files as $file) {
    echo $file->getPathName() . PHP_EOL;
}
