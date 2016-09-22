<<?php

class AutoLoader {

    static private $classNames = array();

    /**
     * Store the filename (sans extension) & full path of all ".php" files found
     */
    public static function registerDirectory($dirName) {

        $di = new DirectoryIterator($dirName);
        foreach ($di as $file) {

            if ($file->isDir() && !$file->isLink() && !$file->isDot()) {
                // recurse into directories other than a few special ones
                self::registerDirectory($file->getPathname());
            } elseif (substr($file->getFilename(), -4) === '.php') {
                // save the class name / path of a .php file found
                $className = substr($file->getFilename(), 0, -4);
                AutoLoader::registerClass($className, $file->getPathname());
            }
        }
    }

    public static function registerClass($className, $fileName) {
        $namespace = AutoLoader::extract_namespace($fileName);
        AutoLoader::$classNames[$namespace.'\\'.$className] = $fileName;
    }

    public static function loadClass($className) {
        if (isset(AutoLoader::$classNames[$className])) {
            require_once(AutoLoader::$classNames[$className]);
        }
     }

     private static function extract_namespace($file) {
         $ns = NULL;
         $handle = fopen($file, "r");
         if ($handle) {
             while (($line = fgets($handle)) !== false) {
                 if (strpos($line, 'namespace') === 0) {
                     $parts = explode(' ', $line);
                     $ns = rtrim(trim($parts[1]), ';');
                     break;
                 }
             }
             fclose($handle);
         }
         return $ns;
     }
}

spl_autoload_register(array('AutoLoader', 'loadClass'));
