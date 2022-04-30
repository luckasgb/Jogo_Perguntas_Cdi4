<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $nomeSite; ?></title>
    <link rel="stylesheet" href="<?php echo base_url("Assets/css/bootstrap.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("Assets/css/style.css"); ?>">
    <link rel="shortcut icon" href="<?php echo base_url("favicon.ico"); ?>" type="image/x-icon">
</head>
<body>
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" href="<?php echo site_url("Site/ini"); ?>">Jogo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="<?php echo site_url('Site/add'); ?>">Adicionar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="<?php echo site_url('Site/logout'); ?>">Sair</a>
            </li>
        </ul>
    </div>
    
