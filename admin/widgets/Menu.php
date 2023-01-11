<?

namespace admin\widgets;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\helpers\Html;

class Menu extends \yii\widgets\Menu {
    public $submenuTemplate = "\n<div id='sub-menu' class=' sfhide'><ul>\n{items}\n</ul></div>\n";
    //public $linkTemplate = '<a href="{url}">{label}</a>';
//    public $activateParents = true;
    public $linkActiveTemplate = '';
    
    protected function renderItem($item) {
        if (isset($item['url'])) {
            if($item['active'])
            {
                $template = ArrayHelper::getValue($item, 'template', $this->linkActiveTemplate);
            }else
            {
                $template = ArrayHelper::getValue($item, 'template', $this->linkTemplate);
            }
            return strtr($template, [
                '{url}' => Html::encode(Url::to($item['url'])),
                '{label}' => $item['label'],
                '{ico}'=> Html::encode(Url::to($item['ico'])),
            ]);
        } else {
            $template = ArrayHelper::getValue($item, 'template', $this->labelTemplate);

            return strtr($template, [
                '{label}' => $item['label'],
            ]);
        }
    }

}
