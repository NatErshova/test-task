<?php
use yii\helpers\Url;

$this->title = 'You won!';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">
    <div class="jumbotron">
        <?php if ($category == 1) { ?>
            <h1 class="lead">You can get <?= $prize->val ?> rub!</h1>
        <?php } elseif ($category == 2) { ?>
            <h1 class="lead">You can get <?= $prize->val ?> loyalty points!</h1>
        <?php } else { ?>
            <h1 class="lead">You can get <?= $prize->val ?>!</h1>
        <?php } ?>
            <a class="btn btn-lg btn-success" href="#">Send me this prize</a>
            <a class="btn btn-lg btn-danger" href="<?=Url::to(['/'])?>">I don't want this prize</a>
    </div>
    <?php if ($category == 1) { ?>
        <div class="jumbotron">
            <a class="btn btn-lg btn-warning" href="#">I want to convert my money to loyalty points</a>
        </div>
    <?php } ?>
</div>
