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


        if (is_file($path) && pathinfo($path, PATHINFO_EXTENSION) === 'php') {
            $files[] = $path;
        }

        elseif (is_dir($path)) {
            $indexFile = $path . DIRECTORY_SEPARATOR . 'index.php';
            if (is_file($indexFile)) {
                $files[] = $indexFile;
            }
        }
    }

    closedir($dirHandle);

    return $files;
}