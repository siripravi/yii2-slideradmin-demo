<?php

/**
 * Created by PhpStorm.
 * User: dench
 * Date: 19.12.17
 * Time: 15:05
 *
 * @var $options array
 * @var $titleTag string
 * @var $titleOptions string
 * @var $size string
 * @var $close boolean
 * @var $center boolean
 */

use yii\helpers\Html;
use yii\bootstrap5\Offcanvas;
?>
<!-- Offcanvas -->
<!--<h4>OffCanvas Test</h4> -->
<?php Offcanvas::begin([
   'id' => $offCanvasId,
   'placement' => Offcanvas::PLACEMENT_END,
   'closeButton' => ['id' => 'closeCartOffcanvas'],
   'title' => "Your Cart Items",
   'backdrop' => false,
   'scrolling' => true
]); ?>
<!--= app\modules\shopcart\widgets\CartWidget::widget();  ?-->
<?php Offcanvas::end();
?>