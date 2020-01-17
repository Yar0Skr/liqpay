<?php

namespace app\modules\user\controllers;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\Item;
/**
 * Default controller for the `user` module
 */
class DefaultController extends Controller
{

    public function behaviors()
    {

        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ]
        ];
    }
    /**
     * Renders the index view for the module
     * @return string
     */


    public function actionIndex($id)
    {
        $item = Item::findOne(['id' => $id]);
        return $this->render('index', compact('item'));
    }
}
