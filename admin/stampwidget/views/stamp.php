<?php
use yii\web\View;
use yii\helpers\Html;
use yii\bootstrap\Tabs;

use yii\helpers\Url;
use yii\helpers\Json;

use app\models\Layer;

use kartik\editable\Editable;

use yii\web\JsExpression;
use yii\bootstrap\ActiveForm;

use kartik\range\RangeInput;
use app\stampwidget\helpers\AjaxCreate;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php $this->registerJs(
'$("document").ready(function(){
	if (typeof(Storage) !== "undefined") {
				
		var dash_localVar = localStorage.getItem("dash_activ_tab"+getUrlPath());
		if(dash_localVar){

			$(".dashboard_tabs_cl > li").removeClass("active");
			$(".tab-content > div").removeClass("active");

			var hrefAttr = "a[href=\'"+dash_localVar+"\']";
			if( $(hrefAttr).parent() ){
				$(hrefAttr).parent().addClass("active");
				$(""+dash_localVar+"").addClass("active");
			}
				
		}

		$(".dashboard_tabs_cl a").click(function (e) {
			//alert(window.location.pathname);					
			e.preventDefault();
			localStorage.setItem("dash_activ_tab"+getUrlPath(), $( this ).attr( "href" ));
		});
		function getUrlPath(){
			var returnVar = "_indexpg";
			var splitStr = window.location.href;
			var asdf = splitStr.split("?r=");
			if(asdf[1]){
				var furthrSplt = asdf[1].split("&");
				if(furthrSplt[0]){
					returnVar = furthrSplt[0];
				}else{
					returnVar = asdf[1];
				}
			}
			return returnVar;
		}
	}
	});'
); ?>
<script type="text/javascript">
</script>

<?php
   $session = Yii::$app->session;
   //echo $session['wgt_key'];	
?>
<?php 
   $script = "var wscript =".$jslrs.";";
   $this->registerJs($script,View::POS_HEAD);
   $lrs = Json::decode($jslrs);
?> 
<div id="const_box_mobile">
					
<div id="c-c-ds">
    <div class="t-t-ds">Create your own stamp &copy; <a href="https://mystampready.com/"  target="parent">mySTAMPready.com</a> </div>
    <div id="c-b-sl-ds">
<div id="pt-cb-ds" >
	<div class="c-t-m-ds">
		<div class="ri-m-ds">
	        	<div id="const_but_patt" class="const_but bu-t-ds bu-t-g-ds">Go to edit&nbsp;&nbsp;&nbsp;&gt;</div>
		</div>
		<div class="a-e-c-ds a-e-cp-ds" align="center">
		     <div class="a-e-p-ds" id="tp-r-ds" title="Round">
		     	<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 250 250" width="24px" height="24px" version="1.0" fill-rule="evenodd"  xmlns:xlink="http://www.w3.org/1999/xlink"><path fill="#ffffff" d="M128 17c61,0 109,49 109,109 0,61 -48,109 -109,109 -60,0 -109,-48 -109,-109 0,-60 49,-109 109,-109zm0 30c44,0 79,36 79,79 0,44 -35,79 -79,79 -43,0 -79,-35 -79,-79 0,-43 36,-79 79,-79z"/></svg>
   		     </div>
		     <div class="a-e-p-ds" id="tp-t-ds" title="Triangle">
		     	<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 250 250" width="24px" height="24px" version="1.0" fill-rule="evenodd" xmlns:xlink="http://www.w3.org/1999/xlink"><path fill="#ffffff" stroke="black" stroke-width="0.900003" d="M125 30l57 100 57 101 -114 0 -114 0 57 -101 57 -100zm0 56l37 61 37 61 -74 0 -74 0 37 -61 37 -61z"/></svg>
			</div>
		     <div class="a-e-p-ds" id="tp-re-ds" title="Rectangle">
		     	<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 250 250" width="24px" height="24px" version="1.0" fill-rule="evenodd" xmlns:xlink="http://www.w3.org/1999/xlink">  <path fill="#ffffff" d="M1 19l249 0 0 210 -249 0 0 -210zm27 31l193 0 0 149 -193 0 0 -149z"/></svg>
			</div>
		</div>
		<div id="pt-v-b-ds" class="a-e-p-ds" title="Big size">
			
		</div>
		<div id="pt-v-m-ds" class="a-e-p-ds" title="Small size">
			
	    </div>
	</div>
	<div class="c-l-l-ds">
			<div id="cpl-s-l-ds"></div>
			<div id="cpl-c-ds">
				<div id="cpl-b-ds">
					
				</div>
			</div>
			<div id="cpl-s-r-ds"></div>
	</div>	
	<div class="pt-c-b-ds">
		<div id="pt-c-g-ds">
			<div id="pt-c-gc-ds"></div>
		</div>
        <div id="pt-ct-ds">
        	<div id="pt-ctc-ds"></div>
			<div id='lb_c' class='lb_c'>
	        	<div id='lb_b' class='lb_b'>
	        		<div id='lb_bi' class='lb_bi'></div>
	        		<div id='lb_bt' class='lb_bt'>Load more</div>
	        	</div>
	        </div>
        </div>
        <div class="b-m-ds">
        	<div class="m-in-ds">
			    <input class="menu_input" name="s-e-p-ds" id="s-e-p-ds" type="text" value="" placeholder="Example">
				<label for="s-e-p-ds">Template name</label>
			</div>
			<div id="s-ic-ds"></div>
			<div id="s-e-er-ds"></div>
			<div class="bu-t-ds bu-t-w-ds" id="s-e-c-ds">Cancel search</div>
		</div>
	</div>
</div>

<div id="c-cb-ds">
	<div class="c-t-m-ds">
		<div class="a-e-c-ds" align="center">
		     <div class="a-e-ds" id="a-tr-ds" title="Text around the circle">
			     <?php
					  AjaxCreate::begin(
					    ['optionsModal' => ['class' =>'modal-sm']]
					  
					  );
					echo Html::button('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 250 250" width="24px" height="24px" version="1.0" xmlns:xlink="http://www.w3.org/1999/xlink"><path fill="#ffffff" d="M136 153l-37 0 -10 23 -27 0 49 -102 27 0 27 55c-12,5 -22,13 -29,24zm5 -17l-17 -38 -17 38 34 0zm-21 -126c-61,0 -110,50 -110,111 0,61 49,110 110,110 7,0 13,0 20,-2 -7,-6 -12,-14 -16,-23 -1,0 -2,0 -4,0 -47,0 -85,-38 -85,-85 0,-47 38,-85 85,-85 47,0 85,38 85,85 0,1 0,1 0,2 9,3 18,8 24,15 1,-6 2,-12 2,-17 0,-61 -50,-111 -111,-111zm60 140l15 0 0 30 30 0 0 15 -30 0 0 30 -15 0 0 -30 -30 0 0 -15 30 0 0 -28 0 -2zm2 -15c-30,4 -50,30 -46,58 3,27 27,50 58,46 16,-2 27,-10 34,-18 19,-23 15,-57 -6,-74 -11,-9 -24,-14 -40,-12z"></path></svg>', [
						'data-href' => Url::toRoute(['create']),
						//'class' => 'btn btn-success',
					]);
					AjaxCreate::end();
					?>
		     	 
    		</div>
		     
		</div>
		<div class="le-m-ds">
        	<div id="pat_but" class="bu-t-ds bu-t-g-ds bu-t-tw-ds" title="***">&lt;&nbsp;&nbsp;&nbsp;Templates</div>
        </div>
        <div class="ri-m-ds">
        	<div id="add_sh" class="bu-t-ds bu-t-g-ds bu-t-tw-ds">New stamp +</div>
        </div>
	</div>
	<div class="c-l-l-ds">
		<div id="cll-s-l-ds"></div>
		<div id="cll-c-ds">
			<div id="cll-b-ds"></div>
			<ul class="dashboard_tabs_cl" id="stageTabs" role="tablist">
			  <?php foreach ($layers as $index => $layer) : ?>
              <li draggable="true" data-index="<?= $index;?>" class="cll-e-ds ">
                <a class="tab-toggle" id="<?= $layer->id;?>-tab" data-toggle="tab" href="#L<?=$layer->id;?>" role="tab" aria-controls="L<?=$layer->id;?>">
				Text #<?=$index;?></a>
				<div id="i-c-l-ds" class="ic-c-ds" style="display:none;">X</div>
              </li>
			  <?php endforeach; ?>
            </ul>
		</div>
		<div id="cll-s-r-ds"></div>
	</div>
	<div class="c-c-b-ds">
	  	<div id="c-l-m-c">
	  		<div id="c-l-m-ds" style="height: 1142px; ">	
                          <div class="c-lm-c-ds">    
						   <?= $this->render('_tbForms', [
								'layers' => $layers,
								'types' => $types
							]) ?>
						  </div>
	  		</div>
	  	</div>	  	
		<div id="c-h-color_icon-ds2"  title="Change stamp color">
			<label for="color_inp">
				<div id="color_inp_icon" class="inp_icon" style=" border-color: #427fed;">
					
				</div>
			<input class="inp_icon_input" type="color" value="#427fed" id="color_inp" name="color_inp" >
			</label>
		</div>
		<div id="c-h-star_icon-ds2"  title="Shabby (old) stamp, click on the icon to activate. &#013;Additional PNG version will be available upon download" >
			<label for="star_inp">
				<div id="star_inp_icon" class="inp_icon" style="border-color: #427fed;">
					
				</div>
			<input class="inp_icon_input" type="checkbox"  id="star_inp" name="star_inp" >
			</label>
		</div>	
		<div id="guide-show" class="inp_icon " title="Help" style="border-color: #427fed;">
						
		</div>	
		<div id="c-inf-ds4"  class="c-inf-ds"></div>
		<div id="c-h-ds">
			 <?= $this->render('_svg', [
                'layers' => $layers,
				'types' => $types
            ]) ?>
		</div>
		<div id="c-muh-ds">
			<div id="vi_inp_icon" class="inp_icon" style="border-color: #427fed;" title="Sample">
				
			</div>				
			<div id="save_m_icon_b" class="inp_icon save_m_icon" title="Save" style="border-color: #427fed;left: 16px;">
							
			</div>			
		</div>
		<div id="yn-p-ds">
			<div id="yn-p-f-ds"></div>
			<div id="yn-p-c-ds">
				<div id="yn-p-ct-ds"></div>
				<div class="bu-t-ds bu-t-w-ds" id="n-p-ds">Cancel</div>
				<div id="yn-p-cl-ds"></div>
			</div>
		</div>
		<div class="b-m-ds" id="b-m-ds">
                
					    
                  		<div class="bo-cn-ds bo-cnr-ds"><div style="padding: 9px 0px 9px 9px;width: 165px;height: 28px;"></div></div>
                  		<div id="c-bc-pr-inf-ds">
						<div id="c-bc-inf-ds" style="float: none;display: inline-block;margin-left:0;">
							<div class="c-bc-infd-ds">Plate size:</div>
							<div class="c-bc-infd-ds si-inf-t-ds" id="si-inf-t-ds"><span>38</span> <sup>/mm</sup></div>
							   
						</div></div>
						<div class="bo-cn-ds"><div class="bu-t-ds bu-t-b-ds bu-t-tb-ds" id="stamp_sav"><span>Download layout</span></div></div> 

		</div>
	</div>
	
</div>
<div id="m-cb-ds">
	
</div>

<div id="ot-cb-ds" >
	
	<div class="c-t-m-ds">
		<div class="le-m-ds">
	        	<div id="const_but2" class="const_but bu-t-ds bu-t-g-ds">&lt;&nbsp;&nbsp;&nbsp;Go to edit</div>
		</div>		<div class="le-m-ds" id="manu_but2">
	        	<div  class="bu-t-ds bu-t-g-ds">&lt;&nbsp;&nbsp;&nbsp;Manufacturer</div>
		</div>
		<div class="a-e-c-ds a-e-cp-ds" align="center">
		</div>
	</div>
	<div class="ot-c-b-ds">
        <div id='c-or-inf-ds'>
			<div class="c-infc-ds">
				<div class="c-infl-ds">Size:</div>
				<div class="c-infr-ds si-inf-t-ds"><span>38</span> <sup>/mm</sup></div>
			</div>
		    <div class="c-infc-ds">
		    	<div class="c-infl-ds">Plate of stamp:</div>
		    	<div class="c-infr-ds pl-inf-t-ds"> + <span></span> <sup>/</sup></div>
		    </div>
		    <div class="c-infc-ds">
		    	<div class="c-infl-ds">Handle:</div>
		    	<div class="c-infr-ds" id='eq-inf-t-ds'><span>no</span> <sup>/</sup></div>
		    </div>
        	<div class="c-infc-ds">
		    	<div class="c-infl-ds">Time of making:</div>
		    	<div class="c-infr-ds" id='urg-inf-t-ds'>
		    		<div class="s-w-ds" title="Time of making">
			       		<div class="s-t-ds"></div>
				       	<div class="s-c-ds">
				        		<label for="s-w-ds-2">
				        			<input id="s-w-ds-2" class="s-c-i-ds" name="urgensy" type="checkbox" value="ON">
				        			<div class="m-s-tr-ds"></div>
				        			<div class="m-s-t-ds"></div>
				        			<div class="m-s-t-h-ds"></div>
				        		</label>
				       	</div>
			       		<div class="s-t-ds"></div>
		    	    </div>
		    	</div>
		    </div>
		 	<div class="c-infc-ds" id='pr-infl-ds'>
		 		<div class="c-infl-ds" >Price:</div>
		 		<div class="c-infr-ds pl-inf-t-ds" id='pr-inf-t-ds' ><span></span> <sup>/</sup></div>
		 	</div>
        </div>
        <div id="e-q-x-ds">
				<input name="e-q-i" id="e-q-i" type="hidden" value="">
				<div id='eq-ok-g-ds'></div>
				<div id="e-q-bx-ds">
					<div class="e-q-l-e-ds" aeq="1" >
		    			<input id="e-q-id0" class="e-q-id" type="hidden" value="0">
		    			<input id="e-q-pr0" class="e-q-pr" type="hidden" value="0">
		    			<div class='e-q-l-ett-ds'>Without handle </div>
		    			<img src="https://mystampready.com/image/no_equipment.svg" style="margin-left:10px"  height="110" alt="No equipment needed" title="No equipment needed" border="0">
		    		</div>
				</div>
		</div>
        <div class="b-m-ds">
        	<div class="m-in-ds">
		        	<input  name="name_u" id="name_u" type="text" value="" placeholder="Address">
		        	<label for="name_u">Your Address</label>
		    </div>
		   	<div class="b-m-po-ds"></div>
		    <div class="m-in-ds">
		        	<input class="menu_input" name="phone_u" id="phone_u" type="text" value="" placeholder="+40 7927 789164">
		        	<label for="phone_u">Your phone</label>
		    </div>
            <div class="b-m-po-ds"></div>
            <div class="m-in-ds">
		        	<input class="menu_input" name="mail_u" id="mail_u" type="text" value="" placeholder="info@mystampready.com">
		        	<label for="mail_u">Your e-mail</label>
		    </div>
		    <div class="bo-cn-ds"><div class="bu-t-ds bu-t-g-ds" id="order_on"><span>Order</span></div></div>
		</div>
	</div>
</div>
</div>
	
    
<div id="in-siz-s-ds" class="in-s2-ds">		
	<div class="in-s-t-ds"><div>Size</div></div>	
	<div class="m-in-ds m-inns-ds" id="l-size-m-1">
		<input class="m-in-a-ds" id="resize-m-r" type="number" min="10" max="150" value="38" placeholder="38">
		<label for="size_sh_r" class="a-l-ds">Diameter(mm)</label>
	</div>
	<div class="m-in-ds m-inns-ds" id="l-size-m-2">
		<input class="m-in-a-ds" id="resize-m-t" type="number" min="10" max="150" value="43" placeholder="43">
		<label for="size_sh_t" class="a-l-ds">Side(mm)</label>
	</div>
	<div class="m-in-ds m-inns-ds" id="l-size-m-31">
		<input class="m-in-a-ds" id="resize-m-re1" type="number" min="10" max="150" value="47" placeholder="47" >
		<label for="ss-re-ds1" class="a-l-ds">Width in(mm)</label>
	</div>
	<div class="m-in-ds m-inns-ds" id="l-size-m-32">
		<input class="m-in-a-ds" id="resize-m-re2" type="number" min="10" max="150" value="18" placeholder="18">
		<label for="ss-re-ds2" class="a-l-ds">High in(mm)</label>
	</div>	
	<div class="bo-cn-sn-ds l-size-m-3">
		<div class="bu-t-ds bu-t-w-ds" id="l_size_c">Cancel</div>
		<div class="bu-t-ds bu-t-b-ds" id="l_size">Continue</div>
	</div>
</div>

	
<div id="im-p-c-ds" >
	
</div>
	
<div id='dord_mak_m'>
	<div id='cn-p-cl-ds' class='cn-p-cl-ds'  onclick="document.getElementById('in-sf-di-ds').style.display='none'; document.getElementById('dord_mak_m').style.display='none'; return false;" ></div>
	<div id='dord_mak_m-t-ds'><div>You want to download the print layout</div></div>
    <div id='dord_box_ram_ordm'>		
		<div id='ram_ordm0' class='ram_ordm'>
			<div class='ram_ord'>
				<ul>
					<li id='typ_d_png'><b>PROMO (<strike style="font-weight: normal;">75</strike>) <span>2.50 $</span></b></li>
					<li>Format <b>PNG</b></li>
					<li>High Quality</li>
					<li>Transparent background</li>
				</ul>
				<div  id='temp_PNG_vi'class='bu-t-ds bu-t-w-ds ' >Sample</div>
				<div class='bu-t-ds bu-t-g-ds bd-osh-no-ds' id='bd1-osh-no-ds' >Download</div>
			</div>
			<div class='ram_ord'>
				<ul>
					<li id='typ_d_svg'><b>ECONOM (<strike style="font-weight: normal;">135</strike>) <span>3.50 $</span></b></li>
					<li>Format <b>SVG</b> + PNG</li>
					<li>High Quality</li>
					<li>Transparent background</li>
					<li>Scalability (Vector)</li>
				</ul>
				<div class='bu-t-ds bu-t-b-ds bd-osh-no-ds' id='bd2-osh-no-ds'>Download</div>
			</div>
			<div class='ram_ord'>
				<ul>
					<li id='typ_d_pdf'><b>PREMIUM (<strike style="font-weight: normal;">185</strike>) <span>4.50 $</span></b></li>
					<li><b>PDF</b> + SVG + PNG</li>
					<li>High Quality</li>
					<li>Transparent background</li>
					<li>Scalability (Vector)</li>
				</ul>
				<div class='bu-t-ds bu-t-g-ds bd-osh-no-ds' id='bd3-osh-no-ds'>Download</div>
			</div>
			<div class='ram_ord'>
				<ul>
					<li id='typ_d_docx'><b>VIP Word (<strike style="font-weight: normal;">235</strike>) <span>5.50 $</span></b></li>
					<li><b>DOCX</b>+PDF+SVG+PNG</li>
					<li>High Quality</li>
					<li>Transparent background</li>
					<li>Scalability (Vector)</li>
				</ul>
				<div class='bu-t-ds bu-t-b-ds bd-osh-no-ds' id='bd4-osh-no-ds'>Download</div>
			</div>
			<input type="hidden" name="pay_typ_doc" id="pay_typ_doc" value="0" />
			<input type="hidden" name="pci_c" id="pci_c" value="1" />					
		</div>
		<div id='ram_ordm' class='ram_ordm'>
			<div id='dord_mak_m-tbx-ds' class='dord_mak_m-tbx-ds'>				
				<div class="ram_ordm_row ram_ordm_row_l">
					<div class="ordm_row_tit">Options</div>
					<div class='dop_usl' title='An additional version for PNG and DOCX formats will be available during download.'>							
						<input type="checkbox" id="star_inp" name="happy" value="yes" checked>	
						<label for="star_inp">Shabby (old)</label>										
					</div>								
				</div>
				<div class="ram_ordm_row">
					<div class="ordm_row_tit">Specify your e-mail</div>
					<div class='m-in-ds m-inns-ds ' style='display: block;float:left;width:100%;'>
						<input name="d-oshn-mail-ds" id="d-oshn-mail-ds" class="m-in-a-ds" type="email"  placeholder="example@mail.com">						
					</div>	
					<div id="order_send_inf">						
						The stamp layout will be sent to the specified email. Also, after payment, the button you will see in the stamp maker <img src="../image/ic_file_download_grey600_24dp.png" alt="stamp layout download button" /> for downloading a stamp layout <b>(If the button does not appear, refresh the page with F5)</b>.

					</div>		
					<div class='bo-cn-sn-ds but-cn-box'>           
						<div class='bu-t-ds bu-t-g-ds' id='go_pay_svg'>Continue</div>
						<div class='bu-t-ds bu-t-w-ds d-osh-no-ds' >Back</div>
					</div>					
				</div>					
			</div>
		</div>
		<div id='ram_ordm5' class='ram_ordm' >
					
		</div>
		
		<div id='ram_ordm2' class='ram_ordm'>
			<div id='dord_mak_m-tbx-ds' class='dord_mak_m-tbx-ds'>
				<div id="in-sfsl3-ds" class='dord_mak_load-ds'></div>	    	
				<div id='dord_mak2_m-t2-ds' class='dord_mak_m-t2-ds'>
					
				</div>			
			</div>					
		</div>
	</div></div>
	<div id='ya_form_re_box' style='display:none;'>
		<form  id='ya_form_re'  method='POST' target='_parent' action='#'>
			<input name='shopId2' value='99123' type='hidden'>		
		</form>       
	</div>
	
<div id="dord_mak_save" class="in-s2-ds">
	<div id="dord_mak_save_box" >	
		<div class="in-s-t-ds"><div>You want to save the stamp layout</div></div>
		<div class="in-soo-ds">The link of your layout will be sent to you by email.
			<div class="m-in-ds">
				<input name="d-save-mail-ds" class="m-in-a-ds" id="d-save-mail-ds" type="email" placeholder="primer@mail.ru" style="width:275px;">
				<label for="d-save-mail-ds" class="a-l-ds">Your e-mail</label>
			</div>
		</div>
		<div class="bo-cn-sn-ds" ">				
			<div class="bu-t-ds bu-t-g-ds" id="save_maket_go"><span>Save</span></div>
			<div class="bu-t-ds bu-t-w-ds" onclick="document.getElementById('in-sf-di-ds').style.display='none'; document.getElementById('dord_mak_save').style.display='none'; return false;" >Cancel</div>
		</div>
	</div>	
	
</div>

	
	<input id="h-p-ds" name="h-p-ds" type="hidden" value="">
	<ul class="dd-m-ds" id="dd-e-ds"></ul>
	
</div>

<?php
		$script = <<< JS
			

		JS;
		$this->registerJs($script,View::POS_READY);
	?>