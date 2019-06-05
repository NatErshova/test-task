<?php
use app\widgets\Popup;

$this->title = 'Congratulations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">
    <div class="jumbotron">
        <h1>Congratulations!</h1>
            <p class="lead">You can win a prize! Click the button.</p>
            <button data-toggle="modal" data-target="#popup" class="btn btn-lg btn-success">GET A PRIZE</button>
    </div>
</div>
<?= Popup::widget() ?>
