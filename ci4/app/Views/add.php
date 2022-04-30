<section class="m-5 d-flex flex-column align-items-center bg-light div-corpo">
    <?php 
        helper('form'); 
        echo form_open('Site/AdcPerg');
    ?>
    <div class="d-flex flex-column align-items-center">
        <input class="m-2 form-control" type="text" name="pergunta" id="" placeholder="Pergunta">
        <div class="form-check form-check-inline">
            <input type="radio" name="correta" value="1" id="" checked>
            <input class="m-2 form-control" type="text" name="resposta1" id="" placeholder="Resposta 1">
        </div>
        <div class="form-check form-check-inline">
            
            <input type="radio" name="correta" value="2" id="">
            <input class="m-2 form-control" type="text" name="resposta2" id="" placeholder="Resposta 2">
        </div>
        <div class="form-check form-check-inline">
            <input type="radio" name="correta" value="3" id="">
            <input class="m-2 form-control" type="text" name="resposta3" id="" placeholder="Resposta 3">
        </div>
        <div class="form-check form-check-inline">
            <input type="radio" name="correta" value="4" id="">
            <input class="m-2 form-control" type="text" name="resposta4" id="" placeholder="Resposta 4">
        </div>     
        <input class="btn btn-primary" type="submit" value="Adicionar">
    </div>
    <?php
        echo form_close();
    ?>
</section>