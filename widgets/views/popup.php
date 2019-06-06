<?php
use yii\helpers\Url;
?>
<div id="popup" class="modal modal-popup" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-body">
            <p class="lead">Congratulations, you won <?= $text ?></p>
            <a class="btn btn-lg btn-success" href="<?=Url::to(['site/' . $alias, 'id' => $id])?>">Get a prize</a>
            <a class="btn btn-lg btn-success" href="<?=Url::to(['/'])?>">I don't want a gift</a>
        </div>
    </div>
</div>
