<?php
/**
 * User: TheCodeholic
 * Date: 12/12/2020
 * Time: 7:04 PM
 */

namespace app\admin\components;


use common\models\CartItem;
use frontend\models\Search;

/**
 * Class Controller
 *
 * @author  Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package frontend\base
 */
class BaseController extends \yii\web\Controller
{
	//public $searchModel;
	//public $searchForm;
	//public $searchDataProvider;
	
	public $secClass = "container my-2 my-md-3";
	public $bannerTitle = "Some Title";
    public function beforeAction($action)
    {

       /* $this->searchModel = new Search();
		
        $this->searchDataProvider = $this->searchModel->search(\Yii::$app->request->queryParams);

        $this->view->params['cartItemCount'] = CartItem::getTotalQuantityForUser(currUserId());
	  */	
        return parent::beforeAction($action);
    }
}
?>