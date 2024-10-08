<?php

use app\admin\components\AjaxCreate;
use app\admin\widgets\CardWidget;
//use app\admin\stampwidget\StampWidget;
use yii\helpers\Html;
use yii\helpers\Url;
?>
<?php
$this->title = 'Starter Page';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <img class="img-thumbnail card-img-top" src="/files/images/versions/large/2a278dd89167d57d7e843190b14ba41a.jpg" alt="" width="100%">
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">


            <?php
         /*   AjaxCreate::begin(
                ['optionsModal' => ['class' => 'modal-sm']]
            );
            echo Html::button('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 250 250" width="24px" height="24px" version="1.0" xmlns:xlink="http://www.w3.org/1999/xlink"><path fill="#ffffff" d="M136 153l-37 0 -10 23 -27 0 49 -102 27 0 27 55c-12,5 -22,13 -29,24zm5 -17l-17 -38 -17 38 34 0zm-21 -126c-61,0 -110,50 -110,111 0,61 49,110 110,110 7,0 13,0 20,-2 -7,-6 -12,-14 -16,-23 -1,0 -2,0 -4,0 -47,0 -85,-38 -85,-85 0,-47 38,-85 85,-85 47,0 85,38 85,85 0,1 0,1 0,2 9,3 18,8 24,15 1,-6 2,-12 2,-17 0,-61 -50,-111 -111,-111zm60 140l15 0 0 30 30 0 0 15 -30 0 0 30 -15 0 0 -30 -30 0 0 -15 30 0 0 -28 0 -2zm2 -15c-30,4 -50,30 -46,58 3,27 27,50 58,46 16,-2 27,-10 34,-18 19,-23 15,-57 -6,-74 -11,-9 -24,-14 -40,-12z"></path></svg>', [
                'data-href' => Url::toRoute(['contact']),
                'class' => 'btn btn-info',
            ]);
            AjaxCreate::end();  */  ?>

            <!--= StampWidget::widget(); ?-->
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 col-sm-6 col-12">
            <?php

            echo CardWidget::widget([
                'type' => 'cardBorder',
                'label' => 'Label',
                'sLabel' => '1000',
                'icon' => 'fa-calendar',
                'body' => 'Hello',
                'options' => [
                    'colSizeClass' => 'col-md-6',
                    'borderColor' => 'primary',
                ]
            ]);
          
            ?>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
      <?php   echo CardWidget::widget([
                'type' => 'cardBox',
                'header' => 'Label',
                'body' => '1000',
                'options' => [
                    'color' => 'primary',
                ]
            ]);  ?>
        </div>
        <div class="col-md-4 col-sm-6 col-12">

        </div>
    </div>

    <div class="row">
        <div class="col-md-4 col-sm-6 col-12">

        </div>
        <div class="col-md-4 col-sm-6 col-12">

        </div>
        <div class="col-md-4 col-sm-6 col-12">

        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">

        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">

        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">

        </div>
    </div>
</div>