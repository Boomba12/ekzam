<?php
use Bitrix\Main\Application, 
    Bitrix\Main\Context, 
    Bitrix\Main\Request, 
    Bitrix\Main\Server,
    Ekzam\Prepareform;


require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

$request = Context::getCurrent()->getRequest();
$event = $request->get('event');
$type = $request->get('type');
if ($event == 'delete') {
    $answer = Prepareform::getForm($type,$event);
    echo json_encode($answer);
} elseif ($event == 'add') {
    $answer = Prepareform::getForm($type,$event);
    echo json_encode($answer);
} elseif ($event == 'update') {
    $answer = Prepareform::getForm($type,$event);
    echo json_encode($answer);
} elseif ($event == 'test') {
    $answer = '1';
    echo json_encode($answer);
}?>
