<?
namespace app_bars\controllers;
use \admin\modules\page\api\Page;

class PageController extends \admin\base\api\Controller { 

    public function actionIndex($slug) {
	    $page = Page::get($slug);
		//$page::get($slug);
        return $this->render('index', ['page'=>$page]);
	
        //return $this->render('index');
    }

}
