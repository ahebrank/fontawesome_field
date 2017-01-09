<?php
require_once(dirname(__FILE__).'/vendor/autoload.php');

class YamlParser
{
    public static function load($filePath) {
        try {
            $data = file_get_contents($filePath);
            return Symfony\Component\Yaml\Yaml::parse($data);
        }
        catch (Exception $e) {
            throw new YamlParserException(
                $e->getMessage(), $e->getCode(), $e);
        }
    }

    public static function dump($array) {
        try {
            return Symfony\Component\Yaml\Yaml::dump($array);
        }
        catch (Exception $e) {
            throw new YamlParserException(
                $e->getMessage(), $e->getCode(), $e);
        }
    }
}

class YamlParserException extends Exception
{
    public function __construct($message = "", $code = 0, $previous = NULL) {
        if (version_compare(PHP_VERSION, "5.3.0") < 0) {
            parent::__construct($message, $code);
        }
        else {
            parent::__construct($message, $code, $previous);
        }
    }
}
