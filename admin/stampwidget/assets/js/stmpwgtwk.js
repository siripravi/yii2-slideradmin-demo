$.extend($.jCanvas.defaults, {
 // fromCenter: false,
 // inDegrees: false
   //measureText: 'abc'
});
var layerinfo = wscript;
	console.log(wscript);
	//console.log("Session Font0"+wscript[0]['font']);
const cos = Math.cos;
    const sin = Math.sin;
    const pi = Math.PI;
    const abs = Math.abs;
var createAlignedText = function(str, path, style) {
    if (str && str.length > 0 && path) {
        // create PointText object for each glyph
        var glyphTexts = [];
        for (var i = 0; i < str.length; i++) {
            glyphTexts[i] = createPointText(str.substring(i, i+1), style);
            glyphTexts[i].justification = "center";
        }
        // for each glyph find center xOffset
        var xOffsets = [0];
        for (var i = 1; i < str.length; i++) {
            var pairText = createPointText(str.substring(i - 1, i + 1), style);
            pairText.remove();
            xOffsets[i] = xOffsets[i - 1] + pairText.bounds.width - 
                glyphTexts[i - 1].bounds.width / 2 - glyphTexts[i].bounds.width / 2;
        }
        // set point for each glyph and rotate glyph aorund the point
        for (var i = 0; i < str.length; i++) {
            var centerOffs = xOffsets[i];
            if (path.length < centerOffs) {
                if (path.closed) {
                    centerOffs = centerOffs % path.length;
                }  else {
                    centerOffs = undefined;
                }
            }
            if (centerOffs === undefined) {
                glyphTexts[i].remove();
            } else {
                var pathPoint = path.getPointAt(centerOffs);
                glyphTexts[i].point = pathPoint;
                var tan = path.getTangentAt(centerOffs); 
                glyphTexts[i].rotate(tan.angle, pathPoint);
            }
        }
    }
}

// create a PointText object for a string and a style
var createPointText = function(str, style) {
    var text = new PointText();
    text.content = str;
    if (style) {
        if (style.font) text.font = style.font;
        if (style.fontFamily) text.fontFamily = style.fontFamily;
        if (style.fontSize) text.fontSize = style.fontSize;
        if (style.fontWieght) text.fontWeight = style.fontWeight;
    }
    return text;
}

$(function() {  //alert(JSON.stringify(wscript));
           // Get a reference to the canvas object	
          /* document.getElementById("arc2").setAttribute("d", describeArc(150, 150, 100, 0, 270));
  document.getElementById("arc1").setAttribute("d", circlePath(150,150,90)
  );*/
		$("a.tab-toggle").on('click',function(){
			$(".tab-pane").hide();
			$($(this).attr("href")).show();
		  });	
		$('.tab-toggle').on('click', function() {
			$(".timeline-thumbnail").removeClass("selected");
			$(this).closest("li").addClass("selected");
		  //get index of li which is clicked
		  var indexs = $(this).closest('li').index()
		  //remove class from others
		  $("ol li").not($(this).closest('li')).removeClass("active")
		  //add class where indexs same
		  $("ol").find("li:eq(" + indexs + ")").not($(this).closest('li')).addClass("active")
		}); 
	    $('.tab-pane:empty').each(function() {
		  $('.nav-tabs a[href="#' + this.id + '"]').closest('li').hide();
		});
		   var bgImgSrc = 'http://localhost:8080/images/circle71.png';
		   var csrfToken = $('meta[name="csrf-token"]').attr("content");
		  /* $('canvas').drawImage({
			  source: bgImgSrc,
			  x: 150, y: 150
			}).drawLayer();*/
		console.log(wscript);
		/*$.ajax({ url: "http://localhost:8080/site/update-layers",
			type: "POST",    
			data: wscript,
			success: function (data) {
            var x = JSON.stringify(data);
                    console.log(x);
            },
  
            // Error handling 
            error: function (error) {
                    console.log("Error ${error}");
            }		
    });*/
		for (i = 0; i < layerinfo.length; i++) {
			console.log("L"+layerinfo[i]["id"]);
			$('canvas').setLayer("L"+layerinfo[i]["id"], {
			  fillStyle: '#36b',
			 // rotate: 30,
			 // x: '+=100',
			//  y: '-=100',
			  draggable: false,
			  
			})
			.drawLayers();
			drawLayer(layerinfo[i]);
	}

				const position = { x: 0, y: 0 }
			
			var flip = $("#flip").val();
				   //   drawLayer("L"+layerinfo[0]["id"], false);
				//	  drawLayer(canvasid2, true); 
					   
						$('button[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
							var id = $(e.target).attr("id");
							var len = id.length;
						 var lid = "L"+id.substring(0, len - 4);
						// alert(lid);
						$('canvas').setLayer(lid, {
		                      bringToFront: true,
						});
						//alert($('canvas').getLayerIndex(lid));
						// e.relatedTarget.dispose(); // previous active tab
						})
	});//document ready

	   
		function drawLayer(layerinfo){ 
				$('canvas').removeLayer("L"+layerinfo["id"]);		
				editCText(layerinfo);
		}		
			
		function flipText(){
			var flip = false;
			var checkBox = document.getElementById("flip");							 
			if (checkBox.checked == true){
				flip = true;
			} else {
				flip = false;
			}
			
	}
	function editCText(linfo) {		
            //canvas = new fabric.Canvas("L"+linfo["id"]);	
			//	context.strokeStyle = '#000'
				
			var atext = linfo["text"];
			var pathId = "P"+linfo["id"];
			var textId = "#T"+ linfo["id"];
			var fName = linfo["font"];	
			var align = "center";
			var textInside = false;
			var inwardFacing = true;
			var flip = false;
			var startAngle = parseInt(linfo["angleStart"]);
		//	var endAngle = startAngle + ;//parseInt(linfo["angleEnd"]);
			var rotate = parseInt(linfo["rotate"]);
			var centerX = parseInt(linfo["centerX"]);
			var centerY = centerX;  //parseInt(linfo["centerY"]);
			var radiusX = parseInt(linfo["radiusX"]);
			var radiusY = radiusX;  //parseInt(linfo["radiusY"]);
			var spacing = parseInt(linfo["spacing"]);
			//var kerning = parseFloat(linfo["spacing"]);
			//var length = atext.length * 10 + kerning;
			/*!switch(parseInt(linfo['type_id'])){
				case 1: break;
				case 2: break;
				case 3: startAngle = 180 - startAngle;
			            flip = true;break; 
			}*/
					var rad = parseInt(linfo["radiusX"]);  //$("#dynamicmodel-radius").val() ;
                   
                    console.log("Font:"+fName)	;
					var fSize =  parseInt(linfo["fontSize"]);					
					//var endAngle = startAngle + (parseInt(atext.length*spacing))*180.0/Math.PI;
					//spacing	= (endAngle - startAngle) / 
					$('canvas').drawText({					
					layer:true,
					name: "L"+linfo["id"],
					draggable:false,
					  fillStyle: 'black',
					  fontFamily: fName,
					  fontSize: fSize,
					  text: atext,					  
					  x: 170, y: 170,
					  lineHeight: 20,					  
					  rotate: startAngle,
					  radius: rad,
					  letterSpacing: spacing,
					  flipArcText: flip,
					  click: function(layer) {
                             
                      },					
					}).drawLayers();  
				/*** SVG ***/
				/*$(textId).find('textPath').html(atext);
					if(flip){
				   document.getElementById(pathId).setAttribute("d", describeArc(98, 98,rad ,startAngle,270));
				  //http://complexdan.com/svg-circleellipse-to-path-converter/
				   $(textId).attr('dx',startAngle);
				   $(textId).attr('textLength',length);
				   $(textId).attr("style", 'font-size:'+fSize+'px');
				    }else{
				   document.getElementById(pathId).setAttribute("d", circlePath(98,98,rad ));
				   $(textId).attr('dx',startAngle);
				    $(textId).attr('textLength',length);
					$(textId).attr("style", 'font-size:'+fSize+'px');
					}
					***/
					const params = f_svg_ellipse_arc([
							centerX,
							centerY
						], [
							radiusX,
							radiusY
						], [
							startAngle / 180 * pi,
							spacing / 180 * pi
						], rotate / 180 * pi);
					
					const params2 = f_svg_text_arc(params, startAngle, spacing, radiusX, radiusY,atext);		
					const cmdStr1 = params.join(" ");
					const cmdStr2 = params.map(((x) => ((typeof x === "number") ? x.toFixed(0) : x))).join(" ");
					//const cmdStr2 = describeArc(centerX,centerY,radiusX,startAngle,180);
					console.log("tPath : "+ cmdStr2);
					const arca = document.getElementById("topText");
					
					
					document.getElementById("arc1").setAttribute("d", cmdStr2);
					var canvas = document.getElementById("h-o-l-ds");   
		var tsp = document.getElementById("tsp1");
        console.log(params2);
		for(var i = 0; i < params2.length; i++){
		  let txt = document.createElementNS("http://www.w3.org/2000/svg", "text");
		  let tr = "translate(" + params2[i][0] + "," + params2[i][1] +")";
		  let rt = "rotate(" + params2[i][2] +" )";		  
		  txt.setAttribute("transform", tr + " " + rt);
		  txt.setAttribute("x",params2[i][0]);
		  txt.setAttribute("y",params2[i][1]);
		  txt.innerHTML = atext[i];  //params2[i][3];
		  console.log(atext[i]);
		  canvas.appendChild(txt);
		 // tsp.innerHTML = params2[i][3];
		 /* console.log(params2[i][3]);
		  var el = document.getElementsByTagName('text')[0];
          console.log(el.getComputedTextLength());
		  var cl = parseFloat(el.getComputedTextLength());
		  var tl = parseInt(atext.length);
		  var al = parseInt(params2[i][4]);
		  
		  var sa = spacing;  
		  var rl = ((sa) * pi / 180) * radiusX - 5; //(al - cl ) ;//+ (2 * tl);
		  console.log("p5 : "+ rl);
		  arca.setAttribute("textLength",rl);
		  arca.setAttribute("lengthAdjust","spacing");*/
		 		  
	    }
	}
$("body").on("change",".ttext", function() {
		var clid = $(this).closest('div.tab-pane').attr("id");
		var key = parseInt(clid.substring(1,clid.length));
		var clidx = findLrIndex(wscript,key);
		wscript[clidx]["text"] = this.value;
       // wscript[clidx]["spacing"] = 8 * this.value.length;	
        document.getElementsByClassName('tspacing')[0].value = wscript[clidx]["spacing"];
		drawLayer(wscript[clidx]);						
});

$("body").on("change",".ttype", function() {
		var clid = $(this).closest('div.tab-pane').attr("id");
		var key = parseInt(clid.substring(1,clid.length));
		var clidx = findLrIndex(wscript,key);
		var ipid = "#layer-"+ clidx +"-anglestart";
		var ipids = "#layer-"+ clidx +"-anglestart-source";
		var key = parseInt(clid.substring(1,clid.length));		
		wscript[clidx]["type_id"] = parseInt(this.value);		
		var angle;
		var startAngle  = parseInt(wscript[clidx]["startAngle"]);
		switch(parseInt(wscript[clidx]["type_id"])){
			case 1: angle = 0;			      
				//	$(ipids).attr("min", -90);
				//	$(ipids).attr("max", 270);
					//$(this).attr("value", 0);
					break;
			case 2: angle = 0; break;
			case 3: angle = 0;// - startAngle; 
			      //  $(ipids).attr("min",0);
				//	$(ipids).attr("max", 360);
					//$(this).attr("value", 180);break; 
		}
	//	wscript[clidx]["startAngle"] = angle;
		//$(ipid).val(angle);$(ipids).val(angle);
		//console.log("Value:" + (ipid));
		console.log(wscript[clidx]["type_id"]);
		 $('form#dynamic-form111').submit();
		drawLayer(wscript[clidx]);						
});	
$("body").on("change",".tcenterx", function() {
    var clid = $(this).closest('div.tab-pane').attr("id");
		var key = parseInt(clid.substring(1,clid.length));
		var clidx = findLrIndex(wscript,key);
		
	wscript[clidx]["centerX"] = this.value;
	wscript[clidx]["centerY"] = this.value;

    drawLayer(wscript[clidx]);					
	});	
$("body").on("change",".tcentery", function() {
    var clid = $(this).closest('div.tab-pane').attr("id");
		var key = parseInt(clid.substring(1,clid.length));
		var clidx = findLrIndex(wscript,key);
	//	alert(clid.substring(1,clid.length));
	wscript[clidx]["centerY"] = this.value;

    drawLayer(wscript[clidx]);					
	});								
$("body").on("change",".tradiusx", function() {
    var clid = $(this).closest('div.tab-pane').attr("id");
		var key = parseInt(clid.substring(1,clid.length));
		var clidx = findLrIndex(wscript,key);
	//	alert(clid.substring(1,clid.length));
	wscript[clidx]["radiusX"] = this.value;
	wscript[clidx]["radiusY"] = this.value;
    drawLayer(wscript[clidx]);					
	});	
$("body").on("change",".tradiusy", function() {
    var clid = $(this).closest('div.tab-pane').attr("id");
		var key = parseInt(clid.substring(1,clid.length));
		var clidx = findLrIndex(wscript,key);
	//	alert(clid.substring(1,clid.length));
	wscript[clidx]["radiusY"] = this.value;

    drawLayer(wscript[clidx]);					
	});		
$("body").on("change",".tangles", function() {	
		var clid = $(this).closest('div.tab-pane').attr("id");
		var key = parseInt(clid.substring(1,clid.length));
		var clidx = findLrIndex(wscript,key);
		wscript[clidx]["angleStart"] = this.value;	
		drawLayer(wscript[clidx]);							
});
$("body").on("change",".tanglee", function() {	
		var clid = $(this).closest('div.tab-pane').attr("id");
		var key = parseInt(clid.substring(1,clid.length));
		var clidx = findLrIndex(wscript,key);
		wscript[clidx]["angleEnd"] = this.value;	
		drawLayer(wscript[clidx]);							
});
$("body").on("change",".trotate", function() {	
		var clid = $(this).closest('div.tab-pane').attr("id");
		var key = parseInt(clid.substring(1,clid.length));
		var clidx = findLrIndex(wscript,key);
		wscript[clidx]["rotate"] = this.value;	
		drawLayer(wscript[clidx]);							
});
$("body").on("change",".tfont", function() {
		var clid = $(this).closest('div.tab-pane').attr("id");
		var key = parseInt(clid.substring(1,clid.length));
		var clidx = findLrIndex(wscript,key);
		wscript[clidx]["font"] = this.value;		
		drawLayer(wscript[clidx]);						
});
$("body").on("change",".tfontsz", function() {	
		var clid =  $(this).closest('div.tab-pane').attr("id");
		var key = parseInt(clid.substring(1,clid.length));
		var clidx = findLrIndex(wscript,key);
		wscript[clidx]["fontSize"] = this.value;
		drawLayer(wscript[clidx]);							
});			           
$("body").on("change",".tspacing", function() {	
		var clid = $(this).closest('div.tab-pane').attr("id");
		var key = parseInt(clid.substring(1,clid.length));
		var clidx = findLrIndex(wscript,key); 
		wscript[clidx]["spacing"] = this.value;
		drawLayer(wscript[clidx]);							
});						
$('body').on('beforeSubmit', 'form#dynamic-form111', function () {
            var form = $(this);
            // return false if form still have some validation errors
			console.log(wscript);
            if (form.find('.has-error').length) 
            {
                return false;
            }
            // submit form
            $.ajax({
            url    : form.attr('action'),
            type   : 'post',
			data   : form.serialize(),
            success: function (response) 
            {
				console.log(response);
              //  var getupdatedata = $(response).find('#filter_id_test');
               
               // $('#yiiikap').html(getupdatedata);
                //console.log(getupdatedata);
            },
            error  : function () 
            {
                console.log('internal server error');
            }
            });
            return false;
         });
	 
function download_image() {	
	    $('form#dynamic-form111').submit(function(e){
			e.preventDefault();
            e.stopImmediatePropagation(); 
		});
		
			$.ajax({
                url    : '/site/ajax-save-img',
                type   : 'post',
                data:{
                    img : $('#stampDesign').getCanvasImage(),
				},
                success: function (response){
                },
                error  : function (){
                  console.log('internal server error');
                }
            });  
		
 }
function findLrIndex(arr,key){
	for(var i = 0; i < arr.length; i++) {
   if(arr[i]["id"] === key) {
     return i;
   }
}
}
//M 540,0 S 150, 460, 150, 540
//M 150,540 C 150,540, 150,460, 540,0
//M 202.9752498258397 49.427893362836784 A 125 125 0 0 0 86.35867420514272 77.10689681532573
//M 202.9752498258397,49.427893362836784 A 125 125 0 0 0 86.35867420514272,77.10689681532573
//M 202.9752498258397,49.427893362836784 A 125 125 0 0 0 86.35867420514272,77.10689681532573

//M 202.9752498258397 49.427893362836784 A 125 125 0 0 0 86.35867420514272 77.10689681532573
function polarToCartesian(centerX, centerY, radius, angleInDegrees) {
  var angleInRadians = (angleInDegrees-90) * Math.PI / 180.0;

  return {
    x: centerX + (radius * Math.cos(angleInRadians)),
    y: centerY + (radius * Math.sin(angleInRadians))
  };
}

function describeArc(x, y, radius, startAngle, endAngle){

    var start = polarToCartesian(x, y, radius, endAngle);
    var end = polarToCartesian(x, y, radius, startAngle);

    var largeArcFlag = endAngle - startAngle <= 180 ? "0" : "1";

    var d = [
        "M", start.x, start.y, 
        "A", radius, radius, 0, largeArcFlag, 0, end.x, end.y
    ].join(" ");

    return d;       
}
/*** works for top circle text  ***/
function circPath(x,y,r){return['M',x,y,'m',-r,'0a',r,r,0,1,1,r*2,'0a',r,r,0,1,1,-r*2,0].join(' ')}
function circlePath(cx, cy, r){
    return 'M '+cx+' '+cy+' m -'+r+', 0 a '+r+','+r+' 0 1,1 '+(r*2)+',0 a '+r+','+r+' 0 1,1 -'+(r*2)+',0';}
/*const SVG_XML_HEADER = '<?xml version="1.0" encoding="UTF-8" standalone="no"?>';
			// The default SVG filename in case the data-filename attribute isn't set.
			const DEFAULT_SVG_FILENAME = 'cake.svg';			
			let svg_container = document.querySelector('.svg-container');			
			let svg_image = svg_container.querySelector('.svg-image');			
			let svg_filename = svg_image.getAttribute('data-filename') || DEFAULT_SVG_FILENAME;			
			let svg_code = SVG_XML_HEADER + "\n" + svg_image.innerHTML.trim();
			let download_button = document.querySelector('#svg_download');			
			download_button.addEventListener('click', function (event) {			
			var a = document.createElement('a');			
			a.setAttribute('href', 'data:image/svg+xml;charset=utf-8,' + encodeURIComponent(svg_code));			
			a.setAttribute('download', svg_filename);			
			a.style.display = 'none';			
			document.body.appendChild(a);			
			a.click();			
			document.body.removeChild(a);  
  
}); */
    
    const f_matrix_times = (([[a, b], [c, d]], [x, y]) => [a * x + b * y, c * x + d * y]);
    const f_rotate_matrix = ((x) => {
        const cosx = cos(x);
        const sinx = sin(x);
        return [[cosx, -sinx], [sinx, cosx]];
    });
    
    const f_vec_add = (([a1, a2], [b1, b2]) => [a1 + b1, a2 + b2]);
	
	const f_svg_text_arc = ((params,swa,sta,rax,ray,txt) => {
            console.log(params);	    
		var tvals = [];
		//var swa = parseFloat(sweepStart.value);
		//var sta = parseFloat(sweepDelta.value);
		//var rax = parseFloat(rx.value);
		//var rax = parseFloat(ry.value);
	//	var sba = abs( swa - sta);
	       var degDelta = (157 / txt.length) * (pi / 180);
		var sub_angle = 157  * (pi / 180);
		
		var lx = -1 * parseFloat(params[1]);
		var ly = -1 * parseFloat(params[3]);
		
		var i =0;
	    for (var i = 0; i < txt.length; i++){
		  var xi = lx + rax*(cos(degDelta));
		  var yi = ly + ray*(sin(degDelta));
		   console.log("[lx:"+xi+", ly:"+yi+"]"+degDelta);
		  // now plot green point at (xi, yi)
		  console.log("x:"+xi+" "+yi);
		//  rax += degDelta;
		//  ray += degDelta;
		//  tvals[i] = [xi,yi,-(degDelta * i + degDelta / 2)+90,txt[i]];
		lx +=xi; ly+=yi;
		  var alen = ( 2 * pi * rax ) * ( sub_angle );
		  console.log("arc len: "+ alen);
		  tvals[i] = [-xi,-yi,-(degDelta * i + degDelta / 2)+90,txt,alen];
		}
		return tvals;
	 });	
    const f_svg_ellipse_arc = (([cx, cy], [rx, ry], [sta, swa], rot) => {       
        swa = swa % (2 * pi);
        const rotMatrix = f_rotate_matrix(rot);
        const [sX, sY] = (f_vec_add(f_matrix_times(rotMatrix, [rx * cos(sta), ry * sin(sta)]), [cx, cy]));
        const [eX, eY] = (f_vec_add(f_matrix_times(rotMatrix, [rx * cos(sta + swa), ry * sin(sta + swa)]), [cx, cy]));
        const fA = ((swa > pi) ? 1 : 0);
        const fS = ((swa > 0) ? 1 : 0);
        return [" M ", sX, " ", sY, " A ", rx, ry, rot / pi * 180, fA, fS, eX, eY];
    });