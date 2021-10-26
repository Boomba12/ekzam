<?php

namespace Ekzam;

use Bitrix\Main\Loader,
	Bitrix\Highloadblock\HighloadBlockTable,
	Bitrix\Main\Entity;

class Tableoperation
{
    public function getFields($id,$type)
    {
        $hbId = self::selectId($type);
        $class = self::getDataClass($hbId);
        return $class::getList(
            [
                'select' => [
                    '*'
                ],
                'order' => [
                    'ID' => 'ASC'
                ]
            ]
        )->Fetch();
    }

    public function getExecutor()
    {
        Loader::includeModule('highloadblock');

        $hlbl = 6; 
        $hlblock = HighloadBlockTable::getById($hlbl)->fetch(); 
        $entity = HighloadBlockTable::compileEntity($hlblock); 
        $entity_data_class = $entity->getDataClass(); 
        $dbResult = $entity_data_class::getList(
            [
                'select' => [
                    '*'
                ],
                'order' => [
                    'ID' => 'ASC'
                ]
            ]
        );
        while($element = $dbResult->Fetch()){
            $arData[$element['ID']] = [
                'NAME' => $element['UF_NAME_EXECUTOR'],
                'POSITION' => $element['UF_POSITION_EXECUTOR'],
            ];
        }
        return $arData;
    }

    public function getState()
    {
        Loader::includeModule('highloadblock');

        $hlbl = 7; 
        $hlblock = HighloadBlockTable::getById($hlbl)->fetch(); 
        $entity = HighloadBlockTable::compileEntity($hlblock); 
        $entity_data_class = $entity->getDataClass(); 
        $dbResult = $entity_data_class::getList(
            [
                'select' => [
                    '*'
                ],
                'order' => [
                    'ID' => 'ASC'
                ]
            ]
        );
        while($element = $dbResult->Fetch()){
            $arData[$element['ID']] = [
                'NAME' => $element['UF_STATE_NAME'],
            ];
        }
        return $arData;
    }

    public function Delete($id,$type)
    {
        Loader::includeModule("highloadblock"); 
        $hbId = self::selectId($type);
        $class = self::getDataClass($hbId);
        $class::Delete($id);
    }
    public function Update($id,$type,$value)
    {
        $hbId = self::selectId($type);
        $class = self::getDataClass($hbId);
        $data = self::decodeData($hbId,$value);
        if ($data) {
            $result = $class::update($id, $data);
            if ($result->isSuccess()) {
                return self::encodeData($hbId,$data);
            } else {
                return $result->getErrors();
            }
        } else {
            return false;
        }
    }
    public function Add($type,$value)
    {
        $hbId = self::selectId($type);
        $class = self::getDataClass($hbId);
        $data = self::decodeData($hbId,$value);
        if ($data) {
            $result = $class::add($data);
            if ($result->isSuccess()) {
                return self::encodeData($hbId,$data);
            } else {
                return $result->getErrors();
            }
        } else {
            return false;
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
    public function decodeData($hlblockID,$value)
    {
        if ($hlblockID == 6) {
            $arResult = [
                'UF_NAME_EXECUTOR' => $value['NAME'],
                'UF_POSITION_EXECUTOR' => $value['POSITION']
            ];
            return $arResult;
        } elseif ($hlblockID == 5) {
            $arResult = [
                'UF_TASK_NAME' => $value['NAME'],
                'UF_TASK_STATE' => $value['STATE'],
                'UF_TASK_EXECUTOR' => $value['EXECUTOR'],
                'UF_TASK_DESCRIPTION' => $value['DESCRIPTION'],
            ];
            return $arResult;
        } else {
            return false;
        }
    }

    public function encodeData($hlblockID,$value)
    {
        if ($hlblockID == 6) {
            $arResult = [
                'NAME' => $value['UF_NAME_EXECUTOR'],
                'POSITION' => $value['UF_POSITION_EXECUTOR'],
            ];
            return $arResult;
        } elseif ($hlblockID == 5) {
            $arResult = [
                'NAME' => $value['UF_TASK_NAME'],
                'STATE' => $value['UF_TASK_STATE'],
                'EXECUTOR' => $value['UF_TASK_EXECUTOR'],
                'DESCRIPTION' => $value['UF_TASK_DESCRIPTION'],
            ];
            return $arResult;
        } else {
            return false;
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