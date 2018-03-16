<?php

class Autoloader
{

    protected static $dirs = []; 
   
    public function __construct(array $dirs = [])
    {
        self::init($dirs);
    }
 
    protected static function init($dirs = [])
    {
        if (!empty($dirs)) {
            self::addDirs($dirs);
        }
        spl_autoload_register(__CLASS__ . '::autoload');
    }

    protected static function addDirs($dirs)
    {
        if (is_array($dirs)) {
            self::$dirs = array_merge(self::$dirs, $dirs);
        } else {
            self::$dirs[] = $dirs;
        }
    }
 
   
    public static function autoLoad($class)
    {
        $success = false;
        
     
        $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php'; 
        
        foreach (self::$dirs as $dir) {
            $file = implode(DIRECTORY_SEPARATOR,[$dir,$fileName]);

            if (file_exists($file)) {
                require_once $file;
                $success = true;
                break;
            }
        }
        
        if (!$success) {
            throw new \Exception('Unable to find class ' . $class);
        }
    }
}