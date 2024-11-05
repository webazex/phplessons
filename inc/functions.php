<?php

function buildFilesArr(string $directory): array {
    $files = [];

    if (!is_dir($directory)) {
        return $files;
    }

    $dirHandle = opendir($directory);

    while (($item = readdir($dirHandle)) !== false) {
        $path = $directory . DIRECTORY_SEPARATOR . $item;

        if ($item === '.' || $item === '..' || $item === 'index.php') {
            continue;
        }

        // Если это папка, проверяем наличие файла с классом и index.php
        if (is_dir($path)) {
            $classFile = $path . DIRECTORY_SEPARATOR . $item . '.php';
            $indexFile = $path . DIRECTORY_SEPARATOR . 'index.php';

            // Проверяем, существует ли файл index.php
            if (is_file($indexFile)) {
                // Если файл с классом не найден, добавляем сообщение об ошибке
                if (!is_file($classFile)) {
                    echo "Ошибка: Class $item не найден в папке $item.\n";
                } else {
                    // Если файл с классом существует, добавляем путь к index.php
                    $files[] = $indexFile;
                }
            }
        }

        // Если это PHP-файл, добавляем его в массив
        elseif (is_file($path) && pathinfo($path, PATHINFO_EXTENSION) === 'php') {
            $files[] = $path;
        }
    }

    closedir($dirHandle);

    return $files;
}
