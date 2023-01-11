<?

namespace app_bars\controllers;
use admin\modules\catalog\api\Catalog;
use yii\helpers\VarDumper;

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
    public function actionPlay() {
        $category = 'tovar';
        $slug = 'smartfon_apple_iphone_x_256gb_seryj_kosmos';
        $category = Catalog::category($category);
//        VarDumper::dump($category->items(),10,true); die();
        if (!$category) {
            throw new NotFoundHttpException(Yii::t('admin/catalog', 'Элемент не найден.'));
        }

        $item = Catalog::item($slug);
        if (!$item) {
            throw new NotFoundHttpException(Yii::t('admin/catalog', 'Элемент не найден.'));
        }

        $addToCartFormClass = '\\' . APP_NAME . '\models\AddToCartForm';
        return $this->render('play', [
            'category' => $category,
            'group' => $item->group,
//            'item' => $item,
            'addToCartForm' => new $addToCartFormClass()
        ]);


//        return $this->render('play');
    }

}
