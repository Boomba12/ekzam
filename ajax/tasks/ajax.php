<?php

use Ekzam\Tableoperation;

require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$request = Application::getInstance()->getContext()->getRequest(); 
$type = $request->getPost('event');
if ($type == 'delete') {
    $id = $request->getPost('id');
    $table = $request->getPost('type');
    TableOperation::Delete($id,$table)

    echo json_encode('Y');
    die();
} elseif ($type == 'add') {
    $table = $request->getPost('type');
   
    echo json_encode($answer);
    die();
} elseif ($type == 'update') {
    $table = $request->getPost('type');
    echo json_encode($answer);
    die();
}?>