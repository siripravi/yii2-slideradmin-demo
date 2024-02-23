<?php

/**
 * Created by PhpStorm.
 * User: dench
 * Date: 19.12.17
 * Time: 16:00
 */

namespace app\modules\modal;

use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;

class Modal extends Widget
{
    public $offCanvasId = 'offcanvasCart';
    public $modalClass = "modal-load";
    public $options;

    public $titleTag = 'h5';

    public $titleOptions;

    public $size = 'modal-lg';

    public $close = true;

    public $center = false;

    public $backdrop = 'false'; // 'true'|'false'|'"static"'

    public $keyboard = 'true';

    public $scroll = 'true';

    public function run()
    {
        $view = $this->getView();

        $js = <<<JS
                    function offCanvasLoad(obj, data) {    
                        renderData(obj, data.title, '.offcanvas-title');
                        renderData(obj, data.body, '.offcanvas-body');  
                    obj.setAttribute("class", "offcanvas offcanvas-end");
                    }
                    function renderData(obj, data, sel) {   
                        const elm =  obj.querySelector(sel);   
                        if (data) {       
                            elm.innerHTML = data; elm.display = "block";
                        } else {
                        // elm.display = "none";
                        }    
                    }
                    function openOffCanvas(action = null, config = {}) {   
                        if (action === null) {    
                        } else {  
                            console.log('CONF:',action);
                            $.getJSON(action, function(data){
                                var myOffcanvas = document.getElementById('{$this->offCanvasId}');
                                var bsOffcanvas = new bootstrap.Offcanvas(myOffcanvas);
                                data = $.extend(data, config);
                                offCanvasLoad(myOffcanvas, data);
                                if (!data.backdrop) {
                                    data.backdrop = {$this->backdrop};
                                }
                                if (!data.keyboard) {
                                    data.keyboard = {$this->keyboard};
                                }
                                if (!data.scroll) {
                                    data.scroll = {$this->scroll};
                                }
                            
                            bsOffcanvas.show();
                            });
                        }
                    }       
                    var myOffcanvas = document.getElementById('{$this->offCanvasId}');       
                  /*  $(document).on('click', '.btn-buy', function(e){
                        e.stopPropagation();         
                        var form = $(this).parent().parent().find("form");
                               // var formid = $(this).attr('data-formid');
                                var actionUrl = $(this).attr('href'); //form.attr("action") + '&submit=' + formid; //
                                $.ajax({
                                    type: "POST",
                                    url: actionUrl,
                                    data: {'submit':formid}, // serializes the form's elements.form.serialize(),  //
                                    success: function (data) {
                                        var config = {               
                                            body: $(this).attr('data-modal-body'),
                                            footer: $(this).attr('data-modal-footer'),               
                                        };
                                    // console.log(data); // show response from the php script.
                                        openOffCanvas("/cart/bag/offcanvas", config);
                                        console.log("opening offcanvas...");
                                    }
                                });
                      
                        
                    });*/

                 $(document).on('click', '#{$this->offCanvasId} button[type="submit"]', function(){
                        $('#{$this->offCanvasId} form').trigger('beforeSubmit');
                        console.log('BEFORE...');
                    });
                    $(document).on('beforeSubmit', '#{$this->offCanvasId} form', function(){
                        var form = $(this);
                        $.post(form.attr('action'), form.serialize(), function(data){
                            offCanvasLoad($('#{$this->offCanvasId}'), data);
                        }, 'json');
                        return false;
                    });               
                
        JS;
        //   $view->registerJs($js);

        Html::addCssClass($this->titleOptions, 'modal-title');
        Html::addCssClass($this->options, $this->offCanvasId);

        return $this->render('offcanvas', [
            'offCanvasId' => $this->offCanvasId
        ]);
    }
}
