<?php

namespace Prince\Phpfile;

use Prince\Phpfile\FileFormatInterface;

interface FileManager extends FileFormatInterface
{
    public function readFile(string $fileName);
    public function writeFile(string $fileName, string $data);
}
