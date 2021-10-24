<?php

use Bitrix\Main\Application, 
    Bitrix\Main\Context, 
    Bitrix\Main\Request, 
    Bitrix\Main\Server,
    Ekzam\Tableoperation;

require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

$request = Context::getCurrent()->getRequest();
$type = $request->get('event');

if ($type == 'delete') {
    $id = $request->get('id');
    $table = $request->get('type');
    Tableoperation::Delete($id,$table);
    echo json_encode('Y');
} elseif ($type == 'add') {
    $table = $request->get('type');
    echo json_encode($answer);
} elseif ($type == 'update') {
    $table = $request->get('type');
    echo json_encode($answer);
} else {
    $table = $request->get('type');
    echo json_encode($table);
}


/*
$type = $_GET['event'];

if ($type == 'delete') {
    $id = $request['id'];
    $table = $request['type'];
    Tableoperation::Delete($id,$table)
    echo json_encode('Y');
   
} elseif ($type == 'add') {
    $table = $request->getPost('type');
   
    echo json_encode($answer);
    
} elseif ($type == 'update') {
    $table = $request->getPost('type');
    echo json_encode($answer);
    
} else {
    $table = $_GET['type'];
    echo json_encode($_GET);
    
}
*/