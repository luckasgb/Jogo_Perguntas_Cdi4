<?php

function CalcPontos($pts, $jumps, $id){
    $params = [
        'pontos' => $pts,
        'pulos' => $jumps,
        'idplayer' => $id
    ];

    $db = db_connect();
        $dados = $db->query("Select * from jogos where id=:idplayer:", $params)->getRow();
    $db->close();

    $pts += $dados->pontos;
    $jumps += $dados->pulos;

    $paramsUP = [
        'pontos' => $pts,
        'pulos' => $jumps,
        'idplayer' => $id
    ];

    $db = db_connect();
        $db->query("update jogos set pulos=:pulos:, pontos=:pontos: where id=:idplayer:", $paramsUP);
    $db->close();

    if($jumps < -1){
        session()->destroy();
        session()->set([
            'jumps' => "empty"
        ]);
    }
}

function ConvDate($dt){
    $DataOld = strtotime($dt);
    return date('d/m/Y',$DataOld);
}