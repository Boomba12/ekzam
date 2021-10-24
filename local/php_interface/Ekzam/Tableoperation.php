<?php

namespace Ekzam;

use Bitrix\Main\Loader,
	Bitrix\Highloadblock\HighloadBlockTable,
	Bitrix\Main\Entity;

class Tableoperation
{
    public function Delete($id,$type)
    {
        Loader::includeModule("highloadblock"); 
        $hbId = self::selectId($type);
        $class = self::getDataClass($hbId);
        $class::Delete($id);
    }
    public function Update($id,$type,$value)
    {
        $hbId = $this->selectId($type);
        $class = $this->getDataClass($hbId);
        $result = $class::update($id, $value);
        if ($result->isSuccess()) {
            return 'Y';
        } else {
            return $result->getErrors();
        } 
    }
    public function Add($id,$type,$value)
    {
        $hbId = $this->selectId($type);
        
        $class = $this->getDataClass($hbId);
        $result = $class::add($value);

        if ($result->isSuccess()) {
            return 'Y';
        } else {
            return $result->getErrors();
        }
    }
    public function selectId($type)
    {
        if ($type == 'exec') {
            return 6;
        } elseif ($type == 'task') {
            return 5;
        }
    }

    public function getDataClass($blockId)
    {
        Loader::includeModule("highloadblock"); 
        $hlblock = HighloadBlockTable::getById($blockId)->fetch();
        $entity = HighloadBlockTable::compileEntity($hlblock); 
        return $entity->getDataClass(); 

    }
}