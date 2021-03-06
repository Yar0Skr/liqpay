<?php

namespace app\modules\admin\controllers;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\Checkout;
/**
 * Default controller for the `admin` module
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
    public function actionIndex()
    {
        $checkout = Checkout::find()->all();
        return $this->render('index', compact('checkout'));
    }
}
