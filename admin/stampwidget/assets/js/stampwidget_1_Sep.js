var layerinfo = wscript;	
console.log(wscript);
const cos = Math.cos;
    const sin = Math.sin;
    const pi = Math.PI;
    const abs = Math.abs;
	var unit = 250 / 100;

var rad = [ 
    {x: 3,  y: 9}, 
    {x: 0,  y: 6}, 
    {x: 0,  y: 3}, 
    {x: 3,  y: 0}, 
    {x: 6,  y: 0}, 
    {x: 9,  y: 3}, 
    {x: 9,  y: 6}, 
    {x: 6,  y: 9}, 
];
	const stPath =  "M16,22.375L7.116,28.83l3.396-10.438l-8.883-6.458l10.979,0.002L16.002,1.5l3.391,10.434h10.981l-8.886,6.457l3.396,10.439L16,22.375L16,22.375z";
    var paper = Raphael(document.getElementById("h-o-l-ds"), 250, 250);	
	paper.setViewBox(0,0,250,250);
	paper.path().attr({fill: "#000", stroke: "none"});
var createAlignedText = function(str, path, style) {
    if (str && stpaper.length > 0 && path) {
        // create PointText object for each glyph
        var glyphTexts = [];
        for (var i = 0; i < stpaper.length; i++) {
            glyphTexts[i] = createPointText(stpaper.substring(i, i+1), style);
            glyphTexts[i].justification = "center";
        }
        // for each glyph find center xOffset
        var xOffsets = [0];
        for (var i = 1; i < stpaper.length; i++) {
            var pairText = createPointText(stpaper.substring(i - 1, i + 1), style);
            pairText.remove();
            xOffsets[i] = xOffsets[i - 1] + pairText.bounds.width - 
                glyphTexts[i - 1].bounds.width / 2 - glyphTexts[i].bounds.width / 2;
        }
        // set point for each glyph and rotate glyph aorund the point
        for (var i = 0; i < stpaper.length; i++) {
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
$(function() { 
		$("a.tab-toggle").on('click',function(){
			$(".tab-pane").hide();
			$($(this).attr("href")).show();
		  });	
		$('.tab-toggle').on('click', function() {
			$(".timeline-thumbnail").removeClass("selected");
			$(this).closest("li").addClass("selected");
		 
		  var indexs = $(this).closest('li').index()
		  
		  $("ol li").not($(this).closest('li')).removeClass("active")
		  
		  $("ol").find("li:eq(" + indexs + ")").not($(this).closest('li')).addClass("active")
		}); 
	    $('.tab-pane:empty').each(function() {
		  $('.nav-tabs a[href="#' + this.id + '"]').closest('li').hide();
		});
		   var bgImgSrc = 'http://localhost:8080/images/circle71.png';
		   var csrfToken = $('meta[name="csrf-token"]').attr("content");
		  
		for (i = 0; i < layerinfo.length; i++) {
			
			$('canvas').setLayer("L"+layerinfo[i]["id"], {
			  fillStyle: '#36b',
			
			  draggable: false,
			  
			})
			.drawLayers();
			drawLayer(layerinfo[i]);
	}

				const position = { x: 0, y: 0 }
			
			var flip = $("#flip").val();					   
						$('button[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
							var id = $(e.target).attr("id");
							var len = id.length;
						 var lid = "L"+id.substring(0, len - 4);
						// alert(lid);
						$('canvas').setLayer(lid, {
		                      bringToFront: true,
						});
					
						})
	});

	   
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
	function editCText(linfo){		
	    
          	var atext = linfo["text"];
			var pathId = "P"+linfo["id"];
			var textId = "#T"+ linfo["id"];
			var fName = linfo["font"];	
			var align = "center";
			var textInside = false;
			var inwardFacing = true;
			var flip = false;
			var startAngle = parseInt(linfo["angleStart"]);		
			var rotate = parseInt(linfo["rotate"]);
			var centerX = parseInt(linfo["centerX"]);
			var centerY = centerX;  //parseInt(linfo["centerY"]);
			var radiusX = parseInt(linfo["radiusX"]);
			var radiusY = radiusX;  //parseInt(linfo["radiusY"]);
			var spacing = parseInt(linfo["spacing"]);			
			var rad = parseInt(linfo["radiusX"]);
			var fSize =  parseInt(linfo["fontSize"]);		
            var type = 	parseInt(linfo["type_id"])		
			//align text on top horizontally
			if(type == 1)  
                startAngle = (spacing < 180 ) ? 180 + (180 - spacing ) / 2 : 180 - (spacing - 180) / 2;
		    if(type  == 3)
			  	startAngle = (spacing < 180 ) ? 180 - (180 - spacing ) / 2 : 180 - (spacing - 180) / 2;
			const canvas = document.getElementById("h-o-l-ds");   
			var bbox = renderedTextSize( atext,fName,fSize );
			console.log("text height: "+bbox.height);
			radiusX = radiusY -= bbox.height;
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
				
			const params = f_svg_ellipse_arc([
							centerX,
							centerY
						], [
							radiusX,
							radiusY
						], [
							startAngle / 180 * pi,
							spacing / 180 * pi
						], rotate / 180 * pi,type);
					
			const params2 = f_svg_text_arc(params, startAngle, spacing, radiusX, radiusY,atext);		
			//const cmdStr1 = params.join(" ");
			const cmdStr2 = params.map(((x) => ((typeof x === "number") ? x.toFixed(0) : x))).join(" ");
				
			const arca = document.getElementById("text"+linfo["id"]);
            arca.setAttribute("font-size", fSize+"px")			
			linfo["pathText"] = cmdStr2;
			document.getElementById("arc"+linfo["id"]).setAttribute("d", cmdStr2);
			if(type == 1)
			document.getElementById("arc2"+linfo["id"]).setAttribute("d", circlePath(centerX,centerY,radiusX - 8));
			var tsp = document.getElementById("tsp"+linfo["id"]);       
			for(var i = 0; i < params2.length; i++){
				  let txt = document.createElementNS("http://www.w3.org/2000/svg", "text");
				  let tr = "translate(" + params2[i][0] + "," + params2[i][1] +")";
				  let rt = "rotate(" + params2[i][2] +" )";
				  tsp.innerHTML = params2[i][3];
				  var el = document.getElementsByTagName('text')[0];
				  
				  console.log(el.getComputedTextLength());
				  var cl = parseFloat(el.getComputedTextLength());
				  var tl = parseInt(atext.length);
				  var al = parseInt(params2[i][4]);		  
				  var sa = spacing;  
				  var rl = Math.abs(((sa) * pi / 180) * radiusX - 5);		  
				  arca.setAttribute("textLength",rl);
				  arca.setAttribute("lengthAdjust","spacing");
		 		  
			}
	}
$("body").on("change",".ttext", function() {
		var clid = $(this).closest('div.tab-pane').attr("id");
		var key = parseInt(clid.substring(1,clid.length));
		var clidx = findLrIndex(wscript,key);
		wscript[clidx]["text"] = this.value;
       // wscript[clidx]["spacing"] = 8 * this.value.length;	
        document.getElementsByClassName('tspacing')[0].value = wscript[clidx]["spacing"];
		 $('form#dynamic-form111').submit();
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
        wscript[clidx]["rotate"]  = 0;
		/*var angle;
		var startAngle  = parseInt(wscript[clidx]["startAngle"]);
		switch(parseInt(wscript[clidx]["type_id"])){
			case 1: angle = 0; break;
			case 2: angle = 0; break;
			case 3: angle = 0;   }*/
		 $('form#dynamic-form111').submit();
		drawLayer(wscript[clidx]);	
				
});	
$("body").on("change",".tcenterx", function() {
    var clid = $(this).closest('div.tab-pane').attr("id");
		var key = parseInt(clid.substring(1,clid.length));
		var clidx = findLrIndex(wscript,key);
		
	wscript[clidx]["centerX"] = this.value;
	wscript[clidx]["centerY"] = this.value;
     $('form#dynamic-form111').submit();
    drawLayer(wscript[clidx]);					
	});	
$("body").on("change",".tcentery", function() {
    var clid = $(this).closest('div.tab-pane').attr("id");
		var key = parseInt(clid.substring(1,clid.length));
		var clidx = findLrIndex(wscript,key);
	//	alert(clid.substring(1,clid.length));
	wscript[clidx]["centerY"] = this.value;
     $('form#dynamic-form111').submit();
    drawLayer(wscript[clidx]);					
	});								
$("body").on("change",".tradiusx", function() {
    var clid = $(this).closest('div.tab-pane').attr("id");
		var key = parseInt(clid.substring(1,clid.length));
		var clidx = findLrIndex(wscript,key);
	
	wscript[clidx]["radiusX"] = this.value;
	wscript[clidx]["radiusY"] = this.value;
	 $('form#dynamic-form111').submit();	
    drawLayer(wscript[clidx]);					
	});	
$("body").on("change",".tradiusy", function() {
    var clid = $(this).closest('div.tab-pane').attr("id");
		var key = parseInt(clid.substring(1,clid.length));
		var clidx = findLrIndex(wscript,key);
	
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
		 $('form#dynamic-form111').submit();
		drawLayer(wscript[clidx]);							
});
$("body").on("change",".tfont", function() {
		var clid = $(this).closest('div.tab-pane').attr("id");
		var key = parseInt(clid.substring(1,clid.length));
		var clidx = findLrIndex(wscript,key);
		wscript[clidx]["font"] = this.value;
        $('form#dynamic-form111').submit();		
		drawLayer(wscript[clidx]);						
});
$("body").on("change",".tfontsz", function() {	
		var clid =  $(this).closest('div.tab-pane').attr("id");
		var key = parseInt(clid.substring(1,clid.length));
		var clidx = findLrIndex(wscript,key);
		wscript[clidx]["fontSize"] = this.value;
		 $('form#dynamic-form111').submit();
		drawLayer(wscript[clidx]);							
});			           
$("body").on("change",".tspacing", function() {	
		var clid = $(this).closest('div.tab-pane').attr("id");
		var key = parseInt(clid.substring(1,clid.length));
		var clidx = findLrIndex(wscript,key); 
		wscript[clidx]["spacing"] = this.value;
		let spacing = this.value;
		let sa = (spacing < 180 ) ? 180 + (180 - spacing ) / 2 : 180 - (spacing - 180 ) / 2;
		wscript[clidx]["startAngle"] = sa;
		wscript[clidx]["rotate"] = 0;
		$('form#dynamic-form111').submit();
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
            $.ajax({
            url    : form.attr('action'),
            type   : 'post',
			data   : form.serialize(),
            success: function (response) 
            {
				console.log(response);            
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
	for(var i = 0; i < arpaper.length; i++) {
   if(arr[i]["id"] === key) {
     return i;
   }
}
}
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
			let svg_image = svg_containepaper.querySelector('.svg-image');			
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
		var tvals = [];
		var degDelta = (157 / txt.length) * (pi / 180);
		var sub_angle = 157  * (pi / 180);		
		var lx = -1 * parseFloat(params[1]);
		var ly = -1 * parseFloat(params[3]);		
		var i =0;
	    for (var i = 0; i < txt.length; i++){
		  var xi = lx + rax*(cos(degDelta));
		  var yi = ly + ray*(sin(degDelta));
		  lx +=xi; ly+=yi;
		  var alen = ( 2 * pi * rax ) * ( sub_angle );		  
		  tvals[i] = [-xi,-yi,-(degDelta * i + degDelta / 2)+90,txt,alen];
		}
		return tvals;
	});	
    const f_svg_ellipse_arc = (([cx, cy], [rx, ry], [sta, swa], rot,type) => {       
        swa = swa % (2 * pi);
        const rotMatrix = f_rotate_matrix(rot);
        const [sX, sY] = (f_vec_add(f_matrix_times(rotMatrix, [rx * cos(sta), ry * sin(sta)]), [cx, cy]));
        const [eX, eY] = (f_vec_add(f_matrix_times(rotMatrix, [rx * cos(sta + swa), ry * sin(sta + swa)]), [cx, cy]));
        const fA = ((swa > pi) ? 1 : 0);
        const fS = ((swa > 0) ? 1 : 0);
		//const fA = ((type == 1) ? 0 : 1);
       // const fS = ((type == 3) ? 0 : 1);
	   if(type == 1)
        return [" M ", sX, " ", sY, " A ", rx, ry, rot / pi * 180, fA, fS, eX, eY];
	    //return [" M ", sX, " ", sY, " A ", rx, ry, rot / pi * 180, 0, 1, eX, eY];
	   if(type == 3)
		return [" M ", sX, " ", sY, " A ", rx, ry, rot / pi * 180, 1, 0, eX, eY];
    });
	
function bboxText( svgDocument, string,font,fontSize ) {
    var data = document.createTextNode( string );
    var svgElement = document.createElementNS( "http://www.w3.org/2000/svg", "text" );
	data.attr('font-family', font);
	data.attr('font-size', fontSize);
    svgElement.appendChild(data);
    svgDocument.documentElement.appendChild( svgElement );
    var bbox = svgElement.getBBox();
    svgElement.parentNode.removeChild(svgElement);
    return bbox.height;
}
function renderedTextSize(string, font, fontSize) {
    var paper = Raphael(0, 0, 0, 0)
    paper.canvas.style.visibility = 'hidden'
    var el = paper.text(0, 0, string)
    el.attr('font-family', font)
    el.attr('font-size', fontSize)
    var bBox = el.getBBox()
    paper.remove()
    return {
        width: bBox.width,
        height: bBox.height
    }
}
this.start = function() {
    if (this.reference.static) return;
    //this.original_x = Raphael.parseTransformString(this.attr("transform"))[0][1];
    //this.original_y = Raphael.parseTransformString(this.attr("transform"))[0][2];
    this.animate({r: 70, opacity: 0.25}, 500, ">");
    this.updated_x = this.original_x;
    this.updated_y = this.original_y;
};

this.move = function(dx, dy) {
    //var ts = Raphael.parseTransformString(this.attr("transform"));
    this.updated_x = this.original_x + dx;
    this.updated_y = this.original_y + dy;
    //ts[0][1] = this.original_x + dx; 
    //ts[0][2] = this.original_y + dy; 
    this.attr({transform: 't' + this.updated_x + ',' + this.updated_y});
};

this.up = function() {
    var ts; 
    
    if(confirm("Shall I update the new position??")) {
		this.original_x = this.updated_x;
		this.original_y = this.updated_y;
	}


    var transformString = "t" + this.original_x + "," + this.original_y;
    this.attr("transform", transformString);
    console.log("transformString: " + transformString);
    console.log("transformAttrib: " + this.attr("transform"));

    this.attr({fill: "#fff"});
    this.animate({r: 50, opacity: 1}, 500, ">");
};

// Forms
function Form(x, y, fid, type) {
    var path;
    if (type == "dom") {
        path = dom;
    } else if (type == "rad") {
        path = rad;
    }   
    // SVG Path
    var svgPath = "M" + unit * path[0].x + "," + unit * path[0].y;
    for (var i = 1; i < path.length; i++) {
        svgPath += "L" + unit * path[i].x + "," + unit * path[i].y;
    }   
    svgPath += "z";
    this.raph = paper.path(svgPath).attr({
        stroke: "hsb(0, 1, 1)",
        fill: "#fff", 
        opacity: 1.0, 
        cx: 100, 
        cy: 900 
    }).transform("t" + x + "," + y); 
    
    this.raph.original_x = x;
    this.raph.original_y = y;

    this.index = fid;
    this.static = false;
    this.type = type;

    var that = this;
    this.raph.reference = that;

}

var forms = [];
forms.push(new Form(unit * 91, unit * 14, 1, "rad"));
forms.push(new Form(unit * 50, unit * 14, 2, "rad"));
for (var i = 0; i < forms.length; i++) {
    paper.set(forms[i].raph).drag(move, start, up);
}
