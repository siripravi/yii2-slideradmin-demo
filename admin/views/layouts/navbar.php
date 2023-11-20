<?php
use yii\bootstrap5\ButtonDropdown;
use yii\helpers\Html;
use yii\bootstrap5\Nav;
use app\admin\models\Order;
use app\admin\models\Question;
use app\admin\models\Review;

?>
<?php 
if ($unread = Question::unread()) {
    $unread_question = ' <span class="badge badge-danger">' . $unread . '</span>';
} else {
    $unread_question = '';
}

if ($unread = Review::unread()) {
    $unread_review = ' <span class="badge badge-danger">' . $unread . '</span>';
} else {
    $unread_review = '';
}

if ($unread = Order::unread()) {
    $unread_order = ' <span class="badge badge-danger">' . $unread . '</span>';
} else {
    $unread_order = '';
}
?>
<nav class="navbar navbar-expand-lg navbar-light border-0 py-0 fixed-top bg-dark-800">
  <div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center flex-grow-1 navbar-actions">

      <!-- Menu Toggle-->
      <div class="menu-toggle cursor-pointer me-4 text-primary-hover transition-color disable-child-pointer">
        <i class="ri-menu-fold-line ri-lg fold align-middle" data-bs-toggle="tooltip" data-bs-placement="right"
          title="Close menu"></i>
        <i class="ri-menu-unfold-line ri-lg unfold align-middle" data-bs-toggle="tooltip" data-bs-placement="right"
          title="Open Menu"></i>
      </div>
      <!-- / Menu Toggle-->

      <!-- Navbar Actions-->
      <div class="d-flex align-items-center">

        <!-- Search-->
        <button class="btn-icon btn-hover-dark btn-search me-2">
          <i class="ri-search-2-line align-bottom lh-1 text-body"></i>
        </button>
        <div class="dropdown me-2">
        <?php echo ButtonDropdown::widget([
                'options'  => ['class' => 'btn-icon btn-hover-dark', 'title'=>'Blog Content'],
                'label' => '<i class="fas fa-file"></i>',
                'encodeLabel'=> false,                
                'dropdown' => [
                    'items' => [
                      [ 'label' => 'Categories','url' => ['/admin/page/page-category']  ],
                      ['label' => 'Pages','url' => ['/admin/page'],  ],
                      [    'label' => 'Comments', 'url' => ['/admin/page/page-comment'], ],
                      [ 'label' => 'Tags',  'url' => ['/admin/page/page-tag'],  ],
                    ],
                ],
            ]);  ?>

        </div>
        <div class="dropdown me-2">
        <?php echo ButtonDropdown::widget([
                'options'  => ['class' => 'btn-icon btn-hover-dark', 'title'=>'Site Content'],
                'label' => '<i class="fas fa-file"></i>',
                'encodeLabel'=> false,                
                'dropdown' => [
                    'items' => [
                      ['label' => Yii::t('app', 'Blocks'), 'url' => ['/admin/block/default/index']],
                      ['label' => Yii::t('app', 'Menu'), 'url' => ['/admin/menu/index']],                
                      ['label' => Yii::t('app', 'Selection'), 'url' => ['/admin/podbor/index']],
                      ['label' => Yii::t('app', 'Questions') . $unread_question, 'url' => ['/admin/question/index']],
                      ['label' => Yii::t('app', 'Reviews') . $unread_review, 'url' => ['/admin/review/index']],
                      ['label' => Yii::t('app', 'Brands'), 'url' => ['/admin/products/brand/index']],                
                      ['label' => Yii::t('app', 'Statuses'), 'url' => ['/admin/products/product-status/index']],
                      [
                        'label' =>'Features', 
                        'encodeLabel'=> false,
                        'url' => ['/admin/products/feature/index'],
                        
                    ],
              
                    ], 
                    
                    
                ],
            ]);  ?>

        </div>
        <div class="dropdown me-2">
        <?php echo ButtonDropdown::widget([
                'options'  => ['class' => 'btn-icon btn-hover-dark', 'title'=>'master data'],
                'label' => '<i class="fas fa-file"></i>',
                'encodeLabel'=> false,
                
                'dropdown' => [
                    'items' => [
                     
                        ['label' => Yii::t('app', 'Currencies'), 'url' => ['/admin/products/currency/index']],
                        ['label' => Yii::t('app', 'Units'), 'url' => ['/admin/products/unit/index']],
                        ['label' => Yii::t('app', 'Upload price'), 'url' => ['/admin/excel/index']],
                        ['label' => Yii::t('app', 'Delivery methods'), 'url' => ['/admin/delivery/index']],
                        ['label' => Yii::t('app', 'Payment methods'), 'url' => ['/admin/payment/index']],
                    ], 
                    
                    
                ],
            ]);  ?>

        </div>
       
        <!-- Search navbar overlay-->
        <div class="navbar-search d-none">
          <div class="input-group mb-3 h-100">
            <span class="input-group-text px-4 bg-transparent"><i class="ri-search-line ri-lg"></i></span>
            <input type="text" class="form-control text-body bg-transparent border-0" placeholder="Enter your search terms...">
            <span class="input-group-text px-4 cursor-pointer disable-child-pointer close-search bg-transparent"><i class="ri-close-circle-line ri-lg text-primary"></i></span>
          </div>
        </div>
        <!-- / Search navbar overlay-->

        <!-- / Search-->

        <!-- Region -->
        <div class="dropdown me-2">
          <button class="btn-icon btn-hover-dark" type="button" id="regionDropdown"
            data-bs-toggle="dropdown" aria-expanded="false">
            <span class="flag-icon flag-icon-gb"></span>
          </button>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="regionDropdown">
            <li><a class="dropdown-item d-flex justify-content-between align-items-center" href="#">United Kingdom <span class="text-muted ms-5"><span class="flag-icon flag-icon-gb"></span></span></a></li>
            <li><a class="dropdown-item d-flex justify-content-between align-items-center" href="#">United States<span class="text-muted ms-5"><span class="flag-icon flag-icon-us"></span></span></a></li>
          </ul>
        </div>
        <!-- /Region -->

        <!-- Language-->
        <div class="dropdown me-2">
          <button class="btn-icon btn-hover-dark" type="button" id="language"
            data-bs-toggle="dropdown" aria-expanded="false">
            <i class="ri-global-line align-bottom text-body lh-1"></i>
          </button>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="language">
            <li>
              <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">English 
                <span class="text-muted ms-5">EN</span></a></li>
            <li><a class="dropdown-item d-flex justify-content-between align-items-center" href="#">French<span class="text-muted ms-5">FR</span></a></li>
            <li><a class="dropdown-item d-flex justify-content-between align-items-center" href="#">Espanol<span class="text-muted ms-5">ES</span></a></li>
            <li><a class="dropdown-item d-flex justify-content-between align-items-center" href="#">Turkish<span class="text-muted ms-5">TR</span></a></li>
            <li><a class="dropdown-item d-flex justify-content-between align-items-center" href="#">Russian<span class="text-muted ms-5">RU</span></a></li>
          </ul>
        </div>
        <!-- / Language-->

        <!-- Notifications-->
        <a class="btn-icon btn-hover-dark position-relative p-2 disable-child-pointer" data-bs-toggle="offcanvas" href="#offcanvasNotifications" role="button"
        aria-controls="offcanvasNotifications">
          <i class="ri-notification-fill align-bottom text-body lh-1"></i>
          <span class="badge bg-primary text-white position-absolute top-0 end-0">3</span>
        </a>
        <!-- / Notifications-->

      </div>
      <!-- / Navbar Actions-->
    
    </div>
  </div>
</nav>