<?php

namespace Ekzam;
use Bitrix\Main\Loader,
	Bitrix\Highloadblock\HighloadBlockTable,
    Ekzam\Tablestateoperation,
    Ekzam\Tableexecoperation,
	Bitrix\Main\Entity;

class Tabletaskoperation
{
    public function getDataClass()
    {
        $settings = Settings::getInstance();
        Loader::includeModule("highloadblock"); 
        $hlblock = HighloadBlockTable::getById($settings['taskHLBlockId'])->Fetch();
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

    public function getTasks()
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
                'NAME' => $element['UF_TASK_NAME'],
                'EXECUTOR' => $element['UF_TASK_EXECUTOR'],
                'STATE' => $element['UF_TASK_STATE'],
                'DESCRIPTION' => $element['UF_TASK_DESCRIPTION']
            ];
        }
        return $arData;
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
                $value['EXECUTOR_NAME'] = Tableexecoperation::getExecutorName(
                    $value['EXECUTOR']
                );
                $value['STATE_NAME'] = Tablestateoperation::getStateName(
                    $value['STATE']
                );
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
                $value['EXECUTOR_NAME'] = Tableexecoperation::getExecutorName(
                    $value['EXECUTOR']
                );
                $value['STATE_NAME'] = Tablestateoperation::getStateName(
                    $value['STATE']
                );
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
            'UF_TASK_NAME' => $value['NAME'],
            'UF_TASK_STATE' => $value['STATE'],
            'UF_TASK_EXECUTOR' => $value['EXECUTOR'],
            'UF_TASK_DESCRIPTION' => $value['DESCRIPTION'],
        ];
        return $arResult;
    }

    public function encodeData($value)
    {
        $arResult = [
            'NAME' => $value['UF_TASK_NAME'],
            'STATE' => $value['UF_TASK_STATE'],
            'EXECUTOR' => $value['UF_TASK_EXECUTOR'],
            'DESCRIPTION' => $value['UF_TASK_DESCRIPTION'],
        ];
        return $arResult;

    }
}