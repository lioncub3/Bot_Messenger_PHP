<?php ?>
<div class="row">
    <div class="col-lg-6">
        <h3>Personal office</h3>
        <span class="text-info"><h4>Login: <span><?=Yii::$app->user->identity->username?></span></h4></span>
        <span class="text-info"><h4>Email: <span><?=Yii::$app->user->identity->email?></span></h4></span>
        <a href="/personoffice/managebot" class="btn btn-success">Manage bots</a>
    </div>
    <div class="col-lg-6"></div>
</div>