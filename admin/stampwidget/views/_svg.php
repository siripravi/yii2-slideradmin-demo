<?php
use yii\helpers\JSON;
$charPath = [];  $arr = [];
foreach($layers as $index => $layer){
	$arr[$layer->id] = JSON::decode($layer->pathText);
	
	if(!empty($arr[$layer->id])){
		foreach($arr[$layer->id] as $i => $a){
	$trans = "translate(" . $a[0] . "," . $a[1] .") " . "rotate(" . $a[2] ." )";
	$charPath[$layer->id.$i] = $trans;
		}
	}
	
}  
?>

<svg class="draggables" xmlns:osb="http://www.openswatchbook.org/uri/2009/osb" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" id="h-o-l-ds" width="250" height="250" viewBox="0 0 250 250" version="1.1" style="display: inline;" sodipodi:docname="cons_stamp.svg" inkscape:version="1.0.2-2 (e86c870879, 2021-01-15)">
	    <style type="text/css">
			<![CDATA[
			  .red {fill: #b1bd8c; }
			 
			  .y567 { stroke-linecap: round }
			]]>
		</style>
	 <defs>  
	  <g id="GrpText1"
		 layer="1"
		 font-size="14"
		 font-style="normal"
		 font-family="Arial"
		 fill="#000"
		 stroke="none"
		 position="absolute"
		 font-weight="normal"
		 in="0"
		 rad="116"
		 cut="-90"
		 len="192"
		> 
		<pattern id="smallGrid" width="8" height="8" patternUnits="userSpaceOnUse">
			<path d="M 8 0 L 0 0 0 8" fill="none" stroke="gray" stroke-width="0.5"/>
		</pattern>
		<pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse">
			<rect width="40" height="40" fill="url(#smallGrid)"/>
			<path d="M 40 0 L 0 0 0 40" fill="none" stroke="gray" stroke-width="1"/>
		</pattern>
	</defs>
	 <symbol viewBox="0 0 16 16" id="icon-star">
        <path d="M16 6.216l-6.095-.02L7.98.38 6.095 6.196 0 6.215h.02l4.912 3.57-1.904 5.834h.02l4.972-3.59 4.932 3.59-1.904-5.815L16 6.215" />
    </symbol>
   <!--  <use class="red" xlink:href="#icon-star"/>	-->
   <!-- <rect width="100%" height="100%" fill="url(#grid)" />	-->
   <rect xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="url(#g34r76i4d)" id="g34r76i4d_r"></rect>
	<circle class="Rang" layer="0" id="Rang0" cx="125" cy="125" r="123" fill="none" stroke="#2f69c2" stroke-width="2"></circle>
    	</g>
    <?php foreach ($layers as $index => $layer):?>	 
    <g id="RangText<?= $layer['id'];?>" layer="<?= $index;  ?>" font-size="<?= $layer['fontSize'];?>px" font-style="bold" font-family="<?= $layer['font'];?>" fill="#000" stroke="#000" font-weight="normal">
	<?php foreach (str_split($layer['text']) as $i => $t):  ?>
	  <?php $cPath = (!empty($charPath[$layer['id'].$i])) ? $charPath[$layer['id'].$i] : "";  ?>
	<text id="txt<?= $layer['id'].$i;?>" transform="<?= $cPath;?>"><tspan id="tsp<?= $layer['id'].$i;?>"><?= $t;?></tspan></text>
    <?php endforeach; ?> 
   </g>	
	<?php endforeach; ?>
     <!--
	<g class="draggable" id="star1" transform="translate(50,220)" data-dragstyle="slippery" data-slip-radius="20">
	  <g transform="translate(-38.25,-170.43)">
	    <path d="M16,22.375L7.116,28.83l3.396-10.438l-8.883-6.458l10.979,0.002L16.002,1.5l3.391,10.434h10.981l-8.886,6.457l3.396,10.439L16,22.375L16,22.375z" />
	  </g>
	</g>
	<g class="draggable" id="star2" transform="translate(240,220)" data-dragstyle="slippery" data-slip-radius="20">
	  <g transform="translate(-38.25,-170.43)">
	    <path d="M16,22.375L7.116,28.83l3.396-10.438l-8.883-6.458l10.979,0.002L16.002,1.5l3.391,10.434h10.981l-8.886,6.457l3.396,10.439L16,22.375L16,22.375z" />
	  </g>
	</g> --> 
	</svg>	