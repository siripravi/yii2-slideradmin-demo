<?php

use yii\widgets\Menu;
use siripravi\ecommerce\models\Group;
?>

<div class="mega-content px-4" data-bs-theme="light">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 col-sm-4 col-md-3 py-4">
        <h5>Pages</h5>
        <?php
        /** @var $categories Category[] */
        $categories =[];// Group::getMain(); //!Yii::$app->cache->exists('_categories-' . Yii::$app->language) ? Category::getMain() : [];
        $items = [];
        foreach ($categories as $category) {
          $items[$category->id] = [
            'label' => $category->name,
            'url' => (count($category->categories)) ? ['/menu/' . $category->slug] : ['/menu/' . $category->slug],
            'options' => [
              'tag' => false,
            ],
          ];
        }
        echo Menu::widget([
          'items' => $items,
          'linkTemplate' => '<a class="list-group-item" href="{url}">{label}</a>',
          'itemOptions' => ['class' => 'list-group-item'],
          'options' => [
            'tag' => 'div',
            //'class' => 'dropdown-menu rounded-0 w-100',
            'class' => 'list-group',
            // 'aria-labelledby' => "dropdownButton"
          ],
        ]);
        ?>
      </div>
      <div class="col-12 col-sm-4 col-md-3 py-4">
        <h5>Card</h5>
        <div class="card">
          <img src="/img/featur-2.jpg" class="img-fluid" alt="image">
          <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-4 col-md-3 py-4">
        <h5>About CodeHim</h5>
        <p><b>CodeHim</b> is one of the BEST developer websites that provide web designers and developers with a simple way to preview and download a variety of free code &amp; scripts.</p>
      </div>
      <div class="col-12 col-sm-12 col-md-3 py-4">
        <h5>Damn, so many</h5>
        <div class="list-group">
          <a class="list-group-item" href="#">Accomodations</a>
          <a class="list-group-item" href="#">Terms &amp; Conditions</a>
          <a class="list-group-item" href="#">Privacy</a>
        </div>
      </div>

    </div>
  </div>
</div>