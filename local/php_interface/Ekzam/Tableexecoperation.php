<?php

namespace Ekzam;
use Bitrix\Main\Loader,
	Bitrix\Highloadblock\HighloadBlockTable,
	Bitrix\Main\Entity;

class Tableexecoperation
{
    public function getDataClass()
    {
        $settings = Settings::getInstance();
        Loader::includeModule("highloadblock"); 
        $hlblock = HighloadBlockTable::getById($settings['execHLBlockId'])->Fetch();
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

    public function getExecutors()
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
                'NAME' => $element['UF_NAME_EXECUTOR'],
                'POSITION' => $element['UF_POSITION_EXECUTOR'],
            ];
        }
        return $arData;
    }

    public function getExecutorName($id)
    {
        Loader::includeModule('highloadblock');
        $class = self::getDataClass(); 
        $arData = $class::getList(
            [
                'select' => [
                    'ID',
                    'UF_NAME_EXECUTOR'
                ],
                'order' => [
                    'ID' => 'ASC'
                ],
                'filter' => [
                    'ID' => $id
                ]
            ]
        )->Fetch();
        return $arData['UF_NAME_EXECUTOR'];
    }

    public function Delete($id)
    {
        Loader::includeModule("highloadblock"); 
        $class = self::getDataClass();
        $class::Delete($id);
    }
    public function Update($id,$value)
    {
        Loader::includeModule("highloadblock"); 
        $class = self::getDataClass();
        $data = self::decodeData($value);
        if ($data) {
            $result = $class::update(
                $id, 
                $data
            );
            if ($result->isSuccess()) {
                $value = self::encodeData($data);
                $value['ID'] = $result->getId();
                return $value;
            } else {
                return $result->getErrors();
            }
        } else {
            return false;
        }
    }
    public function Add($value)
    {
        Loader::includeModule("highloadblock"); 
        $class = self::getDataClass();
        $data = self::decodeData($value);
        if ($data) {
            $result = $class::add($data);
            if ($result->isSuccess()) {
                $value = self::encodeData($data);
                $value['ID'] = $result->getId();
                return $value;
            } else {
                return $result->getErrors();
            }
        } else {
            return false;
        }
    }

    public function decodeData($value)
    {
        $arResult = [
            'UF_NAME_EXECUTOR' => $value['NAME'],
            'UF_POSITION_EXECUTOR' => $value['POSITION']
        ];
        return $arResult;
    }

    public function encodeData($value)
    {
        $arResult = [
            'NAME' => $value['UF_NAME_EXECUTOR'],
            'POSITION' => $value['UF_POSITION_EXECUTOR'],
        ];
        return $arResult;
    }
}