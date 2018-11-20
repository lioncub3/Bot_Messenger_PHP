<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Bot;

/**
 * Bot controller
 */
class PersonofficeController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [];
    }
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;

        return parent::beforeAction($action);
    }
    /**
     * Index.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Manage bot
     *
     * @return string
     */
    public function actionManagebot()
    {
        $model = Bot::find()->where('iduser = 1')->all();
        
        return $this->render('managebot.php',[ 'model' => $model]);
    }

    public function actionCreatebot()
    {
        return $this->render('createbot.php');
    }
}
