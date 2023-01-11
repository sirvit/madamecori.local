<?
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Links */
/* @var $form yii\widgets\ActiveForm */

$this->title = Yii::t('admin', 'Новая роль');
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Управление ролями'), 'url' => ['role']];
$this->params['breadcrumbs'][] = Yii::t('admin', 'Новая роль');
?>

<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="links-form">
        <?
        if (!empty($error)) {
            ?>
            <div class="error-summary">
                <?
                echo implode('<br>', $error);
                ?>
            </div>
        <?
        }
        ?>
        <? $form = ActiveForm::begin(); ?>

        <div class="form-group">
            <?= Html::label(Yii::t('admin', 'Название роли')); ?>
            <?= Html::textInput('name'); ?>
            <?= Yii::t('admin', '* только латинские буквы, цифры и _ -'); ?>
        </div>

        <div class="form-group">
            <?= Html::label(Yii::t('admin', 'Текстовое описание')); ?>
            <?= Html::textInput('description'); ?>
        </div>

        <div class="form-group">
            <?= Html::label(Yii::t('admin', 'Разрешенные доступы')); ?>
            <?= Html::checkboxList('permissions', null, $permissions, ['separator' => '<br>']); ?>
        </div>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('admin', 'Сохранить'), ['class' => 'btn btn-success']) ?>
        </div>

        <? ActiveForm::end(); ?>

    </div>
</div>