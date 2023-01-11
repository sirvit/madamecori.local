<?

use yii\helpers\Html;
use yii\helpers\Url;
use admin\widgets\Menu;
use admin\modules\catalog\api\Catalog;
use admin\modules\page\api\Page;
use admin\modules\news\api\News;
use admin\modules\carousel\api\Slick;
use admin\modules\block\api\Block;
use yii\widgets\ActiveForm;
use admin\models\Setting;



$page = Page::get('page-shop');

$this->title = $page->seo('title');
$this->params['description'] = $page->seo('description');
$this->params['keywords'] = $page->seo('keywords');
//$category = Catalog::category();
$settings = Yii::$app->getModule('admin')->activeModules['catalog']->settings;
?>
<?php
$j=0;
    foreach ($category->items() as $item){
        $j++;
?>
<div class="row">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-8" style="padding:0 30px 30px 30px;">
                    <a class="display-block p-5" id="mainitem<?= $j; ?>" href="<?= $item->image ?>">
                        <div data-item="0" class="square bgn-center border" style="background-image:url('<?= $item->thumb(360, 360) ?>');">
                        </div>
                    </a>

                    <? if (count($item->photos)) { ?>
                        <div class="row">
                            <?
                            Slick::begin([
                                'lightbox' => true,
                                'clientOptions' => [
                                        'num'=> $j,
                                    'autoplay' => true,
                                    'dots' => false,
                                    'autoplay' => false,
                                    'adaptiveHeight' => false,
                                    'infinite' => true,
                                    'slidesToShow' => 3,
                                    'slidesToScroll' => 3,
                                    'prevArrow' =>
                                        '<button type="button" data-role="none" class="slick-prev slick-arrow" aria-label="' . Yii::t('admin/catalog', 'Предыдущий') . '" role="button" style="display: block;"><i class="fa fa-chevron-left"></i></button>',
                                    'nextArrow' =>
                                        '<button type="button" data-role="none" class="slick-next slick-arrow" aria-label="' . Yii::t('admin/catalog', 'Следующий') . '" role="button" style="display: block;"><i class="fa fa-chevron-right"></i></button>'
                                ],
                            ]);
                            ?>
                            <? foreach ($item->photos as $photo) { ?>
                                <a class="square display-block bgn-center border col-ss-4 col-xs-4 col-sm-4 col-md-4 m-5" href="<?= $photo->image ?>" data-image="<?= $photo->thumb(360, 360) ?>" style="background-image:url('<?= $photo->thumb(90, 90) ?>');">
                                </a>
                            <? } ?>
                            <? Slick::end(); ?>
                        </div>
                    <? } ?>
                    <? if ($item->new != 0) { ?>
                        <div class="new-sticker" style="top:14px;left:45px;">
                            <a href="javascript:void(0);" rel="nofollow" title="<?= Yii::t('admin/catalog', 'Новинка!') ?>" class="no-text-decoration с-second">
                                <i class="fa fa-bookmark fs-20"></i> <?= Yii::t('admin/catalog', 'Новинка!') ?>
                            </a>
                        </div>
                    <? } ?>
                </div>
                <div class="col-md-4">
                    <div class="row mb-10">
                        <div class="col-md-11 col-md-offset-1 col-sm-5 col-xs-9 col-xs-offset-2">
                            <strong><?= Yii::t('admin/catalog', 'Название: ') . $item->name ?></strong>
                            <br><small class="text-muted"><?= Yii::t('admin/catalog', 'Код товара: ') . $item->key ?></small>
                        </div>
<!--                        <div class="col-md-7 col-sm-7 col-xs-7 text-right">-->
<!--                            --><?//
//                            if ($settings['enableRating']) {
//                                ?>
<!--                                <div class="row">-->
<!--                                    <div class="col-md-12">-->
<!--                                        --><?//
//                                        echo admin\modules\comment\widgets\Rating::widget([
//                                            'model' => $item,
//                                        ]);
//                                        ?>
<!--                                    </div>-->
<!--                                </div>-->
<!--                                --><?//
//                            }
//                            ?>
<!--                        </div>-->
                    </div>
                    <div class="row mb-10">
                        <div class="col-md-7 col-sm-7 col-xs-9 col-xs-offset-4 fs-22">
                            <strong><?= $item->price ?> <i class="fas fa-ruble-sign"></i>
                                <? if ($item->discount) : ?>
                                    <del class="small"><?= $item->oldPrice ?></del>
                                <? endif; ?>
                            </strong>
                        </div>
<!--                        <div class="col-md-5 col-sm-5 col-xs-7 text-right">-->
<!--                            Нашли дешевле? <a href="javascript:void(0)" class="dotted" role="button" data-placement="bottom" data-toggle="popover" data-trigger="focus" data-html="true" data-content="Нашли эту модель дешевле?<br/> Позвоните нам <span class='text-nowrap'><strong>--><?php //= Setting::get('contact_telephone') ?><!--</strong></span> и мы дадим вам <strong>скидку</strong>! Или оформите заказ, указав в комментариях меньшую цену и ссылку на источник." data-original-title="" title="">Дадим скидку!</a>-->
<!--                        </div>-->
                    </div>
                    <div class="row mb-20">
                        <? if ($item->available) { ?>
                            <?
                            $form = ActiveForm::begin(['action' => Url::to(['/shopcart/add', 'id' => $item->id]), 'options' => [
                                'class' => 'form_add_to_cart'
                            ]]);
                            ?>
                            <div class="col-md-3 col-sm-3 mb-10 text-nowrap">
                                <span class="text-muted"><?= Yii::t('admin/catalog', 'Кол-во:') ?></span>
                                &nbsp;&nbsp;
                                &nbsp;&nbsp;
                                <a href="javascript:void(0);" id="count_decrease" style="color:#555"><i class="fa fa-minus"></i></a>
                                &nbsp;&nbsp;
                                <strong><span id="count_text"/>1</span></strong>
                                &nbsp;&nbsp;
                                <a href="javascript:void(0);" id="count_increase" style="color:#555"><i class="fa fa-plus"></i></a>
                                &nbsp;&nbsp;
                                &nbsp;&nbsp;
                                <div class="text-muted" style="color:#aaa">
                                    <span id="help_price"><?= $item->price ?></span> x
                                    <span id="help_count">1</span> =
                                    <span id="help_total_price"><?= $item->price ?></span>
                                    <i class="fas fa-ruble-sign"></i>
                                </div>
                                <?= $form->field($addToCartForm, 'count')->label(false)->hiddenInput(['id' => 'count_input']) ?>
                            </div>
                            <? if ($settings['enableFast']) { ?>
                                <div class="col-md-6 col-sm-6 mb-10">
                                    <?= Html::submitButton('<i class="fa fa-shopping-cart"></i> Добавить в корзину', ['class' => 'btn btn-primary btn-block']) ?>
                                </div>
                                <div class="col-md-3 col-sm-3 mb-10 text-right">
                                    <a href="javascript:void(0);" rel="nofollow" title="<?= Yii::t('admin/catalog', 'Купить в один клик') ?>" data-url="<?= Url::to(['/shopcart/fast', 'id' => $item->id]) ?>" class="dotted ajaxModalPopup"><?= Yii::t('admin/catalog', 'Купить в один клик') ?></a>
                                </div>
                            <? } else { ?>
                                <div class="col-md-3 col-sm-3 mb-10">

                                </div>
                                <div class="col-md-6 col-sm-6 mb-10">
                                    <?= Html::submitButton('<i class="fa fa-shopping-cart"></i> Добавить в корзину', ['class' => 'btn btn-primary btn-block']) ?>
                                </div>
                            <? } ?>
                            <? ActiveForm::end(); ?>
                        <? } else { ?>
                            <div class="col-md-12">
<!--                                --><?php //= Yii::t('admin/catalog', 'Под заказ') ?>
                            </div>
                        <? } ?>
                    </div>
                    <div class="row mb-20">
                        <div class="col-md-12">
                            <h3 class="page-header"><?= Yii::t('admin/catalog', 'Описание') ?></h3>
                            <p>
                                <?= $item->description ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr style="background-color: #00a157; height: 2px;">
<?php } ?>