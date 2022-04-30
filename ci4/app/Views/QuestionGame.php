<section class="m-5 d-flex flex-column align-items-center">
    <div class="p-4 d-flex flex-column align-items-center bg-light div-corpo">
        <?php 
            helper('form'); 
            echo form_open("Site/RespQuest/".$p['id']);
        ?>
        <div>
            <div class="progress mb-3">
                <div id="myBar" class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <h2 class="font-weight-bold mb-5"><?= $p['pergunta'];  ?></h2>
            <div id="r1" class="JS-resp mb-1 alert alert-secondary" onclick="selectRadio(1)" onmouseover="hover(1)" onmouseleave="leave(1)">
                <input type="radio" name="resp" id="rad1"  value="1" required>
                <?= $p['resp1'];  ?>
            </div>
            <div id="r2" class="JS-resp mb-1 alert alert-secondary" onclick="selectRadio(2)" onmouseover="hover(2)" onmouseleave="leave(2)">
                <input type="radio" name="resp" id="rad2"  value="2">
                <?= $p['resp2'];  ?>
            </div>
            <div id="r3" class="JS-resp mb-1 alert alert-secondary" onclick="selectRadio(3)" onmouseover="hover(3)" onmouseleave="leave(3)">
                <input type="radio" name="resp" id="rad3"  value="3">
                <?= $p['resp3'];  ?>
            </div>
            <div id="r4" class="JS-resp mb-1 alert alert-secondary" onclick="selectRadio(4)" onmouseover="hover(4)" onmouseleave="leave(4)">
            <input type="radio" name="resp" id="rad4" value="4">
            <?= $p['resp4'];  ?>
            </div>
            <div class="m-2 d-flex flex-row justify-content-between">
                <div class="m-2 ">
                    <a class="btn btn-danger" href="<?php echo site_url("Site/RunJogo"); ?>"><?= $u['pulos'] + 1;  ?> Pulos (-85 pts)</a>
                </div>
                <div class="m-2 alert alert-secondary font-weight-bold">
                    <?= $u['pontos'];  ?> pts
                </div>
                <div class="m-2">
                    <input class="btn btn-success" type="submit" value="Confirmar (+150 pts)">
                </div>
            </div>
        </div>
    </div>
</section>