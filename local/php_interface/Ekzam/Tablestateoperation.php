<?php

namespace Ekzam;

use Bitrix\Main\Loader,
	Bitrix\Highloadblock\HighloadBlockTable,
	Bitrix\Main\Entity;

class Tablestateoperation
{
    public function getDataClass()
    {
        $settings = Settings::getInstance();
        Loader::includeModule("highloadblock"); 
        $hlblock = HighloadBlockTable::getById($settings['stateHLBlockId'])->Fetch();
        $entity = HighloadBlockTable::compileEntity($hlblock); 
        return $entity->getDataClass(); 
    }
    public function getFields($id)
    {
        Loader::includeModule('highloadblock');
        $class = self::getDataClass();
        return $class::getList(
            [
                'select' => [
                    '*'
                ],
                'order' => [
                    'ID' => 'ASC'
                ],
                'filter' => [
                    'ID' => $id
                ]
            ]
        )->Fetch();
    }
    public function getStates()
    {
        Loader::includeModule('highloadblock');
        $class = self::getDataClass();
        $dbResult = $class::getList(
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

    public function getStateName($id)
    {
        Loader::includeModule('highloadblock');
        $class = self::getDataClass();
        $arData = $class::getList(
            [
                'select' => [
                    'ID',
                    'UF_STATE_NAME'
                ],
                'order' => [
                    'ID' => 'ASC'
                ],
                'filter' => [
                    'ID' => $id
                ]
            ]
        )->Fetch();
        return $arData['UF_STATE_NAME'];
    }
}