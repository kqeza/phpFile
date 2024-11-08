<?php

namespace Prince\Phpfile;

use Exception;
use Prince\Phpfile\FileTxt;
use Prince\Phpfile\FileCSV;
use Prince\Phpfile\FileJSON;

class FileFactory
{
    public string $failType;

    public function createFail(string $failType, string $failName, string $data): FileCSV|FileJSON|FileTxt
    {
        switch ($failType) {
            case 'txt':
                return new FileTxt(fileName: $failName, data: $data);
            case 'JSON':
                return new FileJSON(fileName: $failName, data: $data);
            case 'CSV':
                return new FileCSV(fileName: $failName, data: $data);
            default:
                throw new Exception(message: "Неподдерживаемый тип файла: $failType");
        }
    }
}