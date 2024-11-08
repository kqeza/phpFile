<?php

namespace Prince\Phpfile;

use Exception;

abstract class FileCommon
{
    private string $fileName;
    private string $data;

    public function __construct(string $fileName, string $data)
    {
        $this->fileName = $fileName;
        $this->data = $data;
    }

    abstract public function getFormat(): string;

    public function readFile(string $fileName): void
    {
        try {
            if (!file_exists(filename: $fileName)) {
                throw new Exception(message: "Файл $fileName не существует.");
            }

            $fileHandle = fopen(filename: $fileName, mode: 'r');
            if (!$fileHandle) {
                throw new Exception(message: "Не удалось открыть файл $fileName для чтения.");
            }

            while (!feof(stream: $fileHandle)) {
                $str = htmlentities(string: fgets(stream: $fileHandle));
                echo $str;
            }
            fclose(stream: $fileHandle);
        } catch (Exception $e) {
            echo "Ошибка при чтении файла: " . $e->getMessage();
        }
    }

    public function writeFile(string $fileName, string $data): void
    {
        try {
            $fileHandle = fopen(filename: $fileName, mode: 'w');
            if (!$fileHandle) {
                throw new Exception(message: "Не удалось открыть файл $fileName для записи.");
            }

            if (fwrite(stream: $fileHandle, data: $data) === false) {
                throw new Exception(message: "Ошибка при записи в файл $fileName.");
            }
            fclose(stream: $fileHandle);
        } catch (Exception $e) {
            echo "Ошибка при записи файла: " . $e->getMessage();
        }
    }
}
