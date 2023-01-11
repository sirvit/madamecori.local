<?

namespace app_bars\assets;

class AppAsset extends \admin\base\Asset {

    public $sourcePath = '@app/media';
    public $css = [
        'css/main.css',
        'css/bunner.css',
        'css/sm-core-css.css',
        'css/sm-clean/sm-clean.css'
    ];
    public $js = [
        'js/main.js',
        'js/jquery.smartmenus.js',
    ];
    public $depends = [
        'admin\assets\FontAwesomeAsset',
        'admin\assets\HelpersAsset',
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
