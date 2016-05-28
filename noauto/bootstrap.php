<?php
/* mock COREPOS API classes for testing */

if (!class_exists('Plugin', false)) {
    class Plugin 
    {
        public function pluginUrl()
        {
            return '';
        }
    }
}

if (!class_exists('AutoLoader', false)) {
    class AutoLoader
    {
        public static function dispatch(){}
    }
}

if (!class_exists('FooterBox', false)) {
    class FooterBox {}
}

if (!class_exists('NoInputCorePage', false)) {

    class NoInputCorePage 
    {
        protected $page_url = '';
        public function change_page($url){}
        public function addOnloadCommand($str){}
    }
}

if (!class_exists('ReceiptMessage', false)) {
    class ReceiptMessage {}
}

if (!class_exists('Parser', false)) {
    class Parser
    {
        public function default_json()
        {
            return array();
        }
    }
}
if (!class_exists('DisplayLib', false)) {
    class DisplayLib
    {
        public static function boxMsg($msg, $header, $noBeep, $buttons)
        {
            return '';
        }

        public static function standardClearButton()
        {
            return array();
        }
        
        public static function lastpage()
        {
            return '';
        }
    }
}

if (!class_exists('MiscLib', false)) {
    class MiscLib
    {
        public static function baseURL()
        {
            return '';
        }
    }
}

if (!class_exists('TransRecord', false)) {
    class TransRecord
    {
        public static function addRecord($arr)
        {
        }
    }
}

if (!class_exists('ReceiptLib', false)) {

    class ReceiptLib
    {
        public static function bold()
        {
            return '';
        }

        public static function unbold()
        {
            return '';
        }

        public static function centerString($str)
        {
            return $str;
        }
    }
}

if (!class_exists('SQLManager', false)) {
    class SQLManager
    {
        private static $mock = array();

        public function __construct($host, $dbms, $db, $user, $passwd)
        {
        }

        public function table_exists($name)
        {
            return true;
        }

        public static function addResult($row)
        {
            self::$mock[] = $row;
        }

        public static function clear()
        {
            self::$mock = array();
        }

        public function sep()
        {
            return '.';
        }

        public function query($str)
        {
            return true;
        }

        public function numRows($res)
        {
            return count(self::$mock);
        }

        public function fetchRow($res)
        {
            $row = array_shift(self::$mock);
            return $row === null ? false : $row;
        }
    }
}

if (!class_exists('Database', false)) {
    class Database
    {
        public static function setglobalvalue($k, $v){}

        public static function pDataConnect()
        {
            return new SQLManager('', '', '', '', '');
        }

        public static function tDataConnect()
        {
            return new SQLManager('', '', '', '', '');
        }

        public static function mDataConnect()
        {
            return new SQLManager('', '', '', '', '');
        }
    }
}

if (!class_exists('CoreLocal', false)) {
    class CoreLocal
    {
        private static $data = array();
        public static function get($k)
        {
            return isset(self::$data[$k]) ? self::$data[$k] : '';
        }

        public static function set($k, $v)
        {
            self::$data[$k] = $v;
        }
    }
}

if (!class_exists('COREPOS\\pos\\lib\\FormLib', false)) {
    include(__DIR__ . '/mocks/FormLib.php');
}

if (!class_exists('COREPOS\\pos\\lib\\models\\BasicModel', false)) {
    include(__DIR__ . '/mocks/BasicModel.php');
}

include(__DIR__ . '/self.php');

