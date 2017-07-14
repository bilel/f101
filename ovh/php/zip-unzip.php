//Unzip a big file

<?php 
ini_set('max_execution_time', 600);
ini_set('memory_limit','1024M');
$source = "/home/user/www/file.zip";
$destination = "/home/user/www/folder7";
$zip = new ZipArchive;
$res = $zip->open($source);
if ($res === TRUE) {
  $zip->extractTo($destination);
  $zip->close();
  echo 'Done';
} else {
  echo 'Failed';
}
?>

//Recursively Zip a Directory

<?php

ini_set('max_execution_time', 600);
ini_set('memory_limit','1024M');

zipData('/home/user/www/wp-content/uploads', '/home/user/www/wp-content/pix.zip');
echo 'Done!.';


    function zipData($source, $destination) {
        if (extension_loaded('zip')) {
            if (file_exists($source)) {
                $zip = new ZipArchive();
                if ($zip->open($destination, ZIPARCHIVE::CREATE)) {
                    $source = realpath($source);
                    if (is_dir($source)) {
                        $iterator = new RecursiveDirectoryIterator($source);
                        // skip dot files while iterating 
                        $iterator->setFlags(RecursiveDirectoryIterator::SKIP_DOTS);
                        $files = new RecursiveIteratorIterator($iterator, RecursiveIteratorIterator::SELF_FIRST);
                        foreach ($files as $file) {
                            $file = realpath($file);
                            if (is_dir($file)) {
                                $zip->addEmptyDir(str_replace($source . '/', '', $file . '/'));
                            } else if (is_file($file)) {
                                $zip->addFromString(str_replace($source . '/', '', $file), file_get_contents($file));
                            }
                        }
                    } else if (is_file($source)) {
                        $zip->addFromString(basename($source), file_get_contents($source));
                    }
                }
                return $zip->close();
            }
        }
        return false;
    }
?>
