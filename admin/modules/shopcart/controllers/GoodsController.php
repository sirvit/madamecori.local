<?
namespace admin\modules\shopcart\controllers;

use Yii;

use admin\modules\shopcart\models\Good;

class GoodsController extends \admin\base\admin\Controller
{
    public function actionDelete($id)
    {
        if(($model = Good::findOne($id))){
            $model->delete();
        } else {
            $this->error = Yii::t('admin', 'Запись не найдена');
        }
        return $this->formatResponse(Yii::t('admin/shopcart', 'Позиция удалена из заказа'));
    }
}