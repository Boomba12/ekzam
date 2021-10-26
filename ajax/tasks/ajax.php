<?php

use Bitrix\Main\Context, 
    Ekzam\Tableoperation,
    Ekzam\Tabletaskoperation,
    Ekzam\Tableexecoperation;

require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

$request = Context::getCurrent()->getRequest();
$event = $request->get('event');

if ($event == 'delete') {
    
    $id = $request->get('id');
    $table = $request->get('type');
    if ($type=='exec') {
        if (!Tabletaskoperation::getAccessDelete($id)) {
            echo json_encode('Удалить невозможно. Исполнитель занят');
        } else {
            Tableexecoperation::Delete($id);
            echo json_encode('Y');
        }
    } elseif($type=='task') {
        Tabletaskoperation::Delete($id);
        echo json_encode('Y');
    }
  
} elseif ($event == 'add') {

    $table = $request->get('type');
    $data = $request->get('data');

    if ($table=='exec') {
        $answer = Tableexecoperation::Add($data);
    } elseif ($table=='task') {
        $answer = Tabletaskoperation::Add($data);
    }

    if ($answer) {
        echo json_encode($answer);
    } else {
        echo json_encode('N');
    }
} elseif ($event == 'update') {

    $id = $request->get('id');
    $table = $request->get('type');
    $data = $request->get('data');

    if ($table =='exec') {
        $answer = Tableexecoperation::Update($id,$data);
    } elseif ($table == 'task') {
        $answer = Tabletaskoperation::Update($id,$data);
    }

    if ($answer) {
        echo json_encode($answer);
    } else {
        echo json_encode('N');
    }
} else {
    $table = $request->get('type');
    echo json_encode($table);
}

