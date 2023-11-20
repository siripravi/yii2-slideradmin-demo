<?php
use yii\bootstrap5\Breadcrumbs;

?>
<nav class="mb-4 pb-2 border-bottom" aria-label="breadcrumb">
    <!--<ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{webRoot}}/index.html"><i class="ri-home-line align-bottom me-1"></i> Dashboard</a></li>
      {{#if page}}
        <li class="breadcrumb-item active" aria-current="page">{{ page }}</li>
      {{/if}}
    </ol> -->
    <?php echo Breadcrumbs::widget([
          'links' => [
               $this->params['breadcrumbs']
                //  'label' => 'the item label', // required
                //  'url' => 'the item URL', // optional, will be processed by `Url::to()`
                //  'template' => 'own template of the item', // optional
              ],
              //['label' => 'the label of the active item']
          //],
        // 'options' => [...],
      ]);
    ?>
  </nav>