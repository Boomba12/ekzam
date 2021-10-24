<?php
use Bitrix\Main\Application, 
    Bitrix\Main\Context, 
    Bitrix\Main\Request, 
    Bitrix\Main\Server,
    Ekzam\Prepareform;


require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

$request = Context::getCurrent()->getRequest();
$type = $request->get('event');
$table = $request->get('type');
if ($type == 'delete') {
    $answer = Prepareform::getDeleteForm();
    echo json_encode($answer);
} elseif ($type == 'add') {
    $answer = Prepareform::getAddForm($table);
    echo json_encode($answer);
} elseif ($type == 'update') {
    $answer = Prepareform::getUpdateForm($table);
    echo json_encode($answer);
} elseif ($type == 'test') {
    $answer = '1';
    echo json_encode($answer);
}?>
