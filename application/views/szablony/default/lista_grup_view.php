<?php 
    if($grupy == NULL) {
        $tab = array('0'=>'Brak');
        echo json_encode($tab);
    }
    else {
        $tab = array();
        foreach($grupy as $grupa) {
            $tab[$grupa["idLigi"]] = $grupa["grupa"];
        }
        echo json_encode($tab);
    }
?>