<?php
/*
 * Created on Mon Nov 20 2023
 *
 * Copyright (c) 2023 Your Company
 */

/** @var yii\web\View $this */

use siripravi\slideradmin\models\Slider;
use siripravi\slideradmin\models\SliderImage;
use yii\bootstrap5\Html;
use app\widgets\Carousel;
use iutbay\yii2pnotify\PNotify;


$this->title = 'My Yii Application';

$model = Slider::find()->one();
$slides = $model->slides;
foreach ($slides as $sld) {
    if (($image = SliderImage::find()->where(['id' => $sld->id])->multilingual()->one()) !== null) {
        $sitems[] = [
            'content' => '<div class="home_slider_container">
                     <div class="text-center p-0"><div class="">' .
                $image->render($sld->filename, "large", ["class" => "slider-img"]) .
                '</div>',
            'caption' => '<div class="slide-text">' .
                Html::tag('h1', $image->title, ['class' => 'h1 text-light']) .
                '<h3 class="h2"></h3><p>' . $image->html . '</p></div></div></div>',
            'captionOptions' => ['class' => ['mb-0 d-flex align-items-center']],

        ];
    }
}
?>
<?php
/* echo PNotify::widget(
    [
        "title" => "Welcome to SliderAdmin Demo Site!",
        "type" => "",
        "text" => "Awesome Sliders based on Bootstrap 5",
        //"notifications" => ["welcome"]
    ]
); */
?>
<div class="site-index">
    <?php
    echo Carousel::widget([
        'id' => 'home-slider',
        'items' => $sitems,
        'showIndicators' => false,
        /* 'controls' => [
                            '<span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="visually-hidden">Previous</span>',
                            '<span class="carousel-control-next-icon" aria-hidden="true"></span><span class="visually-hidden">Next</span>',
                        ],  */
        'options' => [
            'data-interval' => 8,
            'data-bs-ride' => 'scroll'
        ],
        'controls' => [
            '<span class="carousel-control-prev-icon"></span>',
            '<span class="carousel-control-next-icon"></span>',
        ],
    ]) ?>
    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="/admin">Slider Admin</a></p>
    </div>

    <div class="body-content">
   

    <div class="row">
        <div class="col-lg-4 mb-3">
            <h2>Heading</h2>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur.</p>

            <p><a class="btn btn-outline-secondary" href="https://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
        </div>
        <div class="col-lg-4 mb-3">
            <h2>Heading</h2>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur.</p>

            <p><a class="btn btn-outline-secondary" href="https://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
        </div>
        <div class="col-lg-4">
            <h2>Heading</h2>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur.</p>

            <p><a class="btn btn-outline-secondary" href="https://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
        </div>
    </div>

</div>
</div>