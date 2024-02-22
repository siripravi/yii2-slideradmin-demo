<?php
/* @var $content string */

use yii\bootstrap5\Breadcrumbs;
use app\admin\widgets\Alert;
?>
<div class="content-wrapper" style="background-color: rgb(217 255 244 / 11%);min-height: 189px;" >
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid" >
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="card-header">
                    <h2 class="display-6">
                        <?php
                        if (!is_null($this->title)) {
                            echo \yii\helpers\Html::encode($this->title);
                        } else {
                            echo \yii\helpers\Inflector::camelize($this->context->id);
                        }
                        ?>
                    </h2>
                    </div> 
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <?php
                    echo Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        'options' => [
                            'class' => 'breadcrumb float-sm-right'
                        ]
                    ]);
                    ?>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <!-- Main content -->
    <div class="content" style="min-height:423px;">
        <div class="container-fluid">
            <?= Alert::widget() ?>
            <?= $content ?><!-- /.container-fluid -->
        </div>
    </div>
    <!-- /.content -->
   
</div>