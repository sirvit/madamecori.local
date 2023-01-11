<?

namespace app_bars\controllers;

class PublicController extends \admin\base\api\Controller {

    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex() {
        
        return $this->render('index');
    }

}
