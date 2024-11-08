<?php

namespace Prince\Phpfile;

class FileCSV extends FileCommon
{
    public function getFormat(): string
    {
        return 'CSV';
    }
}
