<?php

use Bitrix\Main\Loader;
use Bitrix\Highloadblock\HighloadBlockTable; 
use Bitrix\Main\Entity;

class CEkzam extends CBitrixComponent
{
    public function onPrepareComponentParams($arParams)
    {
        $arParams = [
            'CACHE_TYPE' => $arParams['CACHE_TYPE'],
            'CACHE_TIME' => isset($arParams['CACHE_TIME']) ?$arParams['CACHE_TIME']: 36000,
        ];
        return $arParams;
    }
    public function executeComponent()
    {

        $this->arResult['STATES'] = $arState =  $this->getState();
        $this->arResult['EXECUTORS'] = $arExec =  $this->getExecutor();
        $this->arResult['TASKS'] =  $this->builder($this->getTask(),$arExec,$arState);

        $this->includeComponentTemplate();
    }

    public function builder($arTask,$arExec,$arState)
    {
        foreach ($arTask as $key => $task) {
            $build[$key] = [
                'NAME' => $task['NAME'],
                'EXECUTOR' => [
                    'NAME' => $arExec[$task['EXECUTOR']]['NAME'],
                    'ID' => $task['EXECUTOR']
                ],
                'STATE' => [
                    'NAME' => $arState[$task['STATE']]['NAME'],
                    'ID' => $task['STATE']
                ],
                'DESCRIPTION' => $task['DESCRIPTION']
            ];
        }
        return $build;
    }

    public function getTask()
    {
        Loader::includeModule('highloadblock');

        $hlbl = 5; 
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
                'NAME' => $element['UF_TASK_NAME'],
                'EXECUTOR' => $element['UF_TASK_EXECUTOR'],
                'STATE' => $element['UF_TASK_STATE'],
                'DESCRIPTION' => $element['UF_TASK_DESCRIPTION']
            ];
        }

        return $arData;
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
}