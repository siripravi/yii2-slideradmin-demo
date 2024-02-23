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

?>
<!-- Modal -->
<div id="exampleModal" data-backdrop="static" class="modal <?= $options['class'] ?> fade" tabindex="-1" role="dialog" aria-hidden="true" data-modal-size="modal-lg">
  <div class="modal-dialog<?= $center ? ' modal-dialog-centered ' : '' ?> modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-title"><?= Html::tag($titleTag, '', $titleOptions) ?></div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>