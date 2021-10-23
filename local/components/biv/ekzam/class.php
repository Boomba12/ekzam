<?php

class CEkzam extends CBitrixComponent
{
    public function onPrepareComponentParams($arParams)
    {
        $result = [
            "CACHE_TYPE" => $arParams["CACHE_TYPE"],
            "CACHE_TIME" => isset($arParams["CACHE_TIME"]) ?$arParams["CACHE_TIME"]: 36000,
        ];
        return $result;
    }
    public function executeComponent()
    {

        $this->includeComponentTemplate();
    }
}