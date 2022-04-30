<section class="m-5 d-flex flex-column align-items-center">
    <?php 
        helper('form'); 
        echo form_open('Site/Login');
    ?>
    <div class="p-4 container d-flex flex-column align-items-center bg-light div-corpo">
        <input class="m-3 form-control" type="text" name="login" id="" placeholder="Login"><br>
        <input class="m-3 form-control" type="password" name="senha" id="" placeholder="Senha"><br>
        <input class="btn btn-primary" type="submit" value="Logar">
    </div>
    <?php
        echo form_close();
    ?>
</section>