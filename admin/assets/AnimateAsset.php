<?
namespace admin\assets;

class AnimateAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@vendor/bower-asset/animate.css';
    public $depends = ['yii\web\JqueryAsset'];

    public $css = [
        'animate.css',
    ];
}