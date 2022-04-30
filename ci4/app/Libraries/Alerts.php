<?php
namespace App\Libraries;

class Alerts{
    public function AltErro($error){
        
        if($error == "jump"):
            return 
        '<div id="div_alert_erro" class="d-flex alert alert-danger">
        Seus Pulos acabaram!
        </div>';
        elseif($error == "error"):
            return 
            '<div id="div_alert_erro" class="d-flex alert alert-danger">
            Você errou a questão!
            </div>';
        else:
            return '<div></div>';
        endif;
    }
}