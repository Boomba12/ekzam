<?php

use Bitrix\Main\Loader;
use Bitrix\Highloadblock; 
use Bitrix\Main\Entity;

class CEkzam extends CBitrixComponent
{
    public function onPrepareComponentParams($arParams)
    {
        $result = [
            'CACHE_TYPE' => $arParams['CACHE_TYPE'],
            'CACHE_TIME' => isset($arParams['CACHE_TIME']) ?$arParams['CACHE_TIME']: 36000,
        ];
        return $result;
    }
    public function executeComponent()
    {
        $arTask = self::getTask();
        $arState = self::getState();
        
        $arResult['EXECUTORS'] = $arExec = self::getExecutor();
        $arResult['TASKS'] = self::builder($arTask,$arExec,$arState);

        $this->includeComponentTemplate();
    }

    private function builder($arTask,$arExec,$arState)
    {
        foreach ($arTask as $key => $task) {
            $build[$key] = [
                'NAME' => $task['NAME'],
                'EXECUTOR' => $arExec[$task['EXECUTOR']]['NAME'],
                'STATE' => $arState[$task['STATE']]['NAME'],
                'DESCRIPTION' => $task['DESCRIPTION']
            ];
        }

        return $build;
    }

    private function getTask()
    {
        Loader::includeModule('highloadblock');

        $hlbl = 5; 
        $hlblock = Highloadblock\HighloadBlockTable::getById($hlbl)->fetch(); 

        $entity = Highloadblock\HighloadBlockTable::compileEntity($hlblock); 
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
                'NAME' => $element['US_TASK_NAME'],
                'EXECUTOR' => $element['US_TASK_EXECUTOR'],
                'STATE' => $element['US_TASK_STATE'],
                'DESCRIPTION' => $element['US_TASK_DESCRIPTION']
            ];
        }

        return $arData;
    }

    private function getExecutor()
    {
        Loader::includeModule('highloadblock');

        $hlbl = 6; 
        $hlblock = Highloadblock\HighloadBlockTable::getById($hlbl)->fetch(); 
        $entity = Highloadblock\HighloadBlockTable::compileEntity($hlblock); 
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
                'NAME' => $element['US_EXECUTOR_NAME'],
                'POSITION' => $element['US_EXECUTOR_POSITION'],
            ];
        }
        return $arData;
    }

    private function getState()
    {
        Loader::includeModule('highloadblock');

        $hlbl = 7; 
        $hlblock = Highloadblock\HighloadBlockTable::getById($hlbl)->fetch(); 
        $entity = Highloadblock\HighloadBlockTable::compileEntity($hlblock); 
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
                'NAME' => $element['US_STATE_NAME'],
            ];
        }
        return $arData;
    }
}