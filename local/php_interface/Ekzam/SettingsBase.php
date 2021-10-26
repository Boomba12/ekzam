<?
namespace Ekzam;

use \Bitrix\Main\NotSupportedException;

abstract class SettingsBase	implements \ArrayAccess
{
    protected $settingsArray;
    protected $localSettingsArray = [];

    private $isLocal;

    public function offsetExists($offset)
    {
        return isset($this->settingsArray[$offset]) || array_key_exists($offset, $this->settingsArray);
    }

    public function offsetGet($offset)
    {
        if (isset($this->settingsArray[$offset]) || array_key_exists($offset, $this->settingsArray))
        {
            return $this->settingsArray[$offset];
        }

        return null;
    }

    public function offsetSet($offset, $value)
    {
        throw new NotSupportedException("Can not set settings value");
    }

    public function offsetUnset($offset)
    {
        throw new NotSupportedException("Can not unset settings value");
    }

    protected static $instance = null;
    public static function getInstance()
    {
        if (static::$instance === null)
        {
            static::$instance = new static();
        }

        return static::$instance;
    }

    protected function __construct()
    {
    }
}
