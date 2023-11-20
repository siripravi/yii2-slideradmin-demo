<?php

namespace app\widgets;
use Yii;
use yii\bootstrap5\Html;
use yii\bootstrap5\Widget;
use yii\helpers\ArrayHelper;

class Carousel extends \yii\bootstrap5\Carousel
{
    public $thumbnails = [];
	/*$model = Slider ::find()-> one();
		$slides = $model->slides;
		foreach($slides as $sld){
			if (($image = SliderImage::find()->where(['id' => $sld->id])->multilingual()->one()) !== null) {
			$this->items[] = [
        'content' => '<div class="home_slider_container">
		                <div class="row p-0"><div class="mx-auto">'.
		       $image->render($sld->filename,"large",["class" => "slider-img"]).	
                        '</div>',
        'caption' => '<div class="col-12">'.
		                Html::tag('h1', $image->title,['class'=>'h1 text-success']).
                       '<h3 class="h2"></h3><p>'.$image->html.'</p></div></div></div>',		
		'captionOptions' => ['class' => ['col-lg-12 mb-0 d-flex align-items-center']],
		
    ];  */

    public function init()
    {
        parent::init();
       /* Yii::$app->assetManager->bundles['yii\bootstrap5\BootstrapAsset'] = [
            'basePath'   => '@web',
           // 'sourcePath' => [],
           // 'css'        => ['css/styles.css'],
            'js'  => []
        ];*/
        Html::addCssClass($this->options, ['data-bs-ride' => 'carousel']);
        if ($this->crossfade) {
            Html::addCssClass($this->options, ['animation' => 'carousel-fade']);
        }
    }
   
	/**
     * Renders carousel indicators.
     * @return string the rendering result
     */
    public function renderIndicators(): string
    {
        if ($this->showIndicators === false){
            return '';
        }
        $indicators = [];
        for ($i = 0, $count = count($this->items); $i < $count; $i++){
            $options = [
                'data' => [
                    'bs-target' => '#' . $this->options['id'],
                    'bs-slide-to' => $i
                ],
                'type' => 'button',
				'thumb' => $this->thumbnails[$i]['thumb']
            ];
            if ($i === 0){
                Html::addCssClass($options, ['activate' => 'active']);
                $options['aria']['current'] = 'true';
            }
          //  $indicators[] = Html::tag('button', '', $options);
			
			 $indicators[] = Html::tag('li',Html::img($options['thumb']), $options);
        }
        return Html::tag('ol', implode("\n", $indicators), ['class' => ['carousel-indicators']]);
    }
 }

 /*
  <section>
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="/img/slides/1.png" class="d-block" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h3 class="display-3 w100"><span class="w900">First</span> slide <span class="w400 text-primary">label</span></h3>
                  <p>Some representative placeholder content for the first slide.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="/img/slides/2.png" class="d-block" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h3 class="display-3 w100"><span class="w900">Second</span> slide <span class="w400 text-secondary">label</span></h3>
                  <p>Some representative placeholder content for the second slide.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="/img/slides/3.png" class="d-block" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h3 class="display-3 w100"><span class="w900">Third</span> slide <span class="w400 text-warning">label</span></h3>
                  <p>Some representative placeholder content for the third slide.</p>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    </section>
    */
 