<?php

use Bitrix\Main\Loader,
    Bitrix\Highloadblock\HighloadBlockTable,
    Bitrix\Main\Entity,
    Ekzam\Tableoperation,
    Ekzam\Tabletaskoperation,
    Ekzam\Tableexecoperation,
    Ekzam\Tablestateoperation;

class CEkzam extends CBitrixComponent
{
    public function onPrepareComponentParams($arParams)
    {
        return $arParams;
    }
    public function executeComponent()
    {

        $this->arResult['STATES'] = $arState =  Tablestateoperation::getStates();
        $this->arResult['EXECUTORS'] = $arExec = Tableexecoperation::getExecutors();
        $this->arResult['TASKS'] =  $this->builder(
            Tabletaskoperation::getTasks(),
            $arExec,
            $arState
        );

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
}