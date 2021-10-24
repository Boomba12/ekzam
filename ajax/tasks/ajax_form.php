<?php
use Bitrix\Main\Application; 
use Ekzam\Prepareform;

require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
CJSCore::Init(array('ajax'));
$request = Application::getInstance()->getContext()->getRequest(); 
$type = $request->getPost('event');
$table = $request->getPost('type');
if ($type == 'delete') {
    $answer = Prepareform::getDeleteForm();
    echo json_encode($answer);
    die();
} elseif ($type == 'add') {
    $answer = Prepareform::getAddForm($table);
    echo json_encode($answer);
    die();
} elseif ($type == 'update') {
    $answer = Prepareform::getUpdateForm($table);
    echo json_encode($answer);
    die();
}?>
