<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="conteiner">
<?php
foreach($model as $bot)
{
?>
    <div class="card">
        <img src="https://img.icons8.com/ios/1600/bot-filled.png" alt="Avatar" width="100" height="100">
        <div class="container">
            <h4><b><?=Html::encode("{$bot->name}")?></b></h4>
            <a href="/product" class="btn btn-primary">Edit products</a>
        </div>
    </div>
<?php }?>
    <div class="card">
        <div class="container">
            <h4><a href="/personoffice/createbot" class="btn btn-success">Create new bot</a></h4> 
        </div>
    </div>
</div>