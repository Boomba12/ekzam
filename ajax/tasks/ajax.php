<?php

use Bitrix\Main\Context, 
    Ekzam\Tableoperation;

require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

$request = Context::getCurrent()->getRequest();
$event = $request->get('event');

if ($event == 'delete') {
    $id = $request->get('id');
    $table = $request->get('type');
    Tableoperation::Delete($id,$table);
    echo json_encode('Y');
} elseif ($event == 'add') {
    $table = $request->get('type');
    $data = $request->get('data');
    if(Tableoperation::Add($table,$data)) {
        echo json_encode('Y');
    } else {
        echo json_encode('N');
    }
} elseif ($event == 'update') {
    $id = $request->get('id');
    $table = $request->get('type');
    $data = $request->get('data');
    if(Tableoperation::Update($id,$table,$data)) {
        echo json_encode('Y');
    } else {
        echo json_encode('N');
    }
} else {
    $table = $request->get('type');
    echo json_encode($table);
}

