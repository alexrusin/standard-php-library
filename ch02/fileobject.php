<?php
$docs = new FilesystemIterator('../common/documents', FilesystemIterator::UNIX_PATHS);
foreach ($docs as $doc) {
    if ($doc->getExtension() == 'txt') {
        $textFile = $doc->openFile('r+');
        $textFile->setFlags(SplFileObject::SKIP_EMPTY | SplFileObject::READ_AHEAD | SplFileObject::DROP_NEW_LINE);
        echo 'Name: ' . $textFile->getFilename() . PHP_EOL;
        foreach($textFile as $line) {
            echo $line . PHP_EOL;
        }

        $textFile->seek(3);
        echo PHP_EOL;
        echo 'This is the forth line: ' . $textFile->current() . PHP_EOL;

        // while(!$textFile->eof()) {
        //     $textFile->next();
        // }

        // $textFile->fwrite("\r\n\r\n This is line 2 that was added dynamically");
    }
}
