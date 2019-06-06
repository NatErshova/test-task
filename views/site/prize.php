<?php
use yii\helpers\Url;

$this->title = 'Congratulations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">
    <div class="jumbotron">
        <h1>Congratulations!</h1>
            <p class="lead">You can win a prize! Click the button.</p>
            <a class="btn btn-lg btn-success" href="<?=Url::to(['site/win'])?>">Get a prize</a>
    </div>
</div>
