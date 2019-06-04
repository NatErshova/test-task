<?php
use yii\helpers\Url;

$this->title = 'Main';
?>
<div class="site-index">
    <div class="jumbotron">
        <h1>Good day!</h1>
        <p class="lead">Log in to win a prize.</p>
        <p>
            <a class="btn btn-lg btn-success" href="<?=Url::to(['site/prize'])?>">
                Get a prize
           </a>
        </p>
    </div>
</div>
