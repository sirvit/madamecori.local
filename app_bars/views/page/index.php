<?
//use admin\modules\page\api\Page;

// var_dump($page);
// die();
//$page = Page::get('page-opt');
$this->title = $page->seo('title');
$this->params['description'] = $page->seo('description');
$this->params['keywords'] = $page->seo('keywords');
$this->params['breadcrumbs'][] = $page->title;
?>
<h1><?php //echo $page->seo('h1') ?></h1>


<div class="row">
    <div class="col-md-12">
        <?= $page->text ?>
    </div>    
</div>

