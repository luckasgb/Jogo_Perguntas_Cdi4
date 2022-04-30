<section class="m-3 d-flex flex-column align-items-center">

    <?= view_cell('App\Libraries\Alerts::AltErro', ['error' => $error]); ?>

    <div class="p-3 d-flex flex-column align-items-center bg-light div-corpo">
        <div>
            <h4  class='m-2'>
                Seja bem vindo ao
            </h4>
        </div>
        <div class="text-center">
            <h1 class='m-4 font-weight-bold text-danger'>
                <?= $nomeSite; ?>
            </h1>
        </div>
        <div>
            <p>Inisira seu nome para começar</p>
        </div>
        <?php 
            helper('form'); 
            echo form_open('Site/IniJogo');
        ?>
        <div class="d-flex flex-column align-items-center form-group">
            <input class="m-3 form-control" type="text" name="nome" id="" placeholder="Insira seu nome" required><br>
            <input class="btn btn-danger" type="submit" value="Começar">
        </div>
        <?php
            echo form_close();
        ?>
    </div>
</section>