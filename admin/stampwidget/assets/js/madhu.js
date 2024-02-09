$.jCanvas.extend({
  name: 'drawHeart',
  type: 'heart',
  props: {},
  fn: function(ctx, params) {
    // Just to keep our lines short
    var p = params;
    // Enable layer transformations like scale and rotate
    $.jCanvas.transformShape(this, ctx, p);
	//$.jCanvas.setCanvasFont(p.fName);
	
    // ctx.fillRect(0, 0, mainCanvas.width, mainCanvas.height);            
     var clockwise = p.align == "right" ? 1 : -1; // draw clockwise for aligned right. Else Anticlockwise
     var startAngle = p.startAngle * (Math.PI / 180); // convert to radians

     // calculate height of the font. Many ways to do this
     // you can replace with your own!
     var div = document.createElement("div");
     div.innerHTML = p.text;
     div.style.position = 'absolute';
     div.style.backgroundcolor = 'transparent';
     div.style.top = '-10000px';
     div.style.left = '-10000px';
     div.style.fontFamily = p.fName;
     div.style.fontSize = p.fSize;
     document.body.appendChild(div);
     var textHeight = div.offsetHeight;
     document.body.removeChild(div);
        ctx.beginPath();
    // in cases where we are drawing outside diameter,
    // expand diameter to handle it
       if (!p.textInside)
          p.diameter += textHeight * 2;
        this.width = p.diameter ;
        this.height = p.diameter ;
            // omit next line for transparent background
            //    this.style.backgroundColor = 'lightgray';
          //  mainCanvas.style.top = "20px;";
         this.style.position = "absolute";
         this.style.border = "1px solid green";
            ctx.fillStyle = 'black';
            ctx.font = p.fSize + ' ' + p.fName;
            //alert(ctx.font);
            // Reverse letters for align Left inward, align right outward 
            // and align center inward.
            if (((["left", "center"].indexOf(p.align) > -1) && p.inwardFacing) || (p.align == "right" && !p.inwardFacing))
                p.text = p.text.split("").reverse().join("");

            // Setup letters and positioning
						
            ctx.translate(p.diameter / 2 , p.diameter / 2 ); // Move to center
            startAngle += (Math.PI * !p.inwardFacing); // Rotate 180 if outward
            ctx.textBaseline = 'middle'; // Ensure we draw in exact center
            ctx.textAlign = 'center'; // Ensure we draw in exact center

            // rotate 50% of total angle for center alignment
            if (p.align == "center") {
                for (var j = 0; j < p.text.length; j++) {
                    var charWid = ctx.measureText(p.text[j]).width;
                    startAngle += ((charWid + (j == p.text.length - 1 ? 0 : 1)) / (p.diameter / 2 - textHeight)) / 2 * -clockwise;
                }
            }

            // Phew... now rotate into final start position
            ctx.rotate(startAngle);

            // Now for the fun bit: draw, rotate, and repeat
            for (var j = 0; j < p.text.length; j++) {
                var charWid = ctx.measureText(p.text[j]).width; // half letter
                // rotate half letter
                ctx.rotate((charWid / 2) / (p.diameter / 2 - textHeight) * clockwise);
                // draw the character at "top" or "bottom" 
                // depending on inward or outward facing
                ctx.fillText(p.text[j], 0, (p.inwardFacing ? 1 : -1) * (0 - p.diameter / 2 + textHeight / 2));
               /*  $('canvas').drawText({
					layer:true,
					name: p.layerid + '-' + text[j],
					draggable:true,
					  fillStyle: 'black',
					 fontFamily: 'Ubuntu, sans-serif',
					  fontSize: p.fSize,
					  text: p.text[j],
					  x: 202, y: 202,
					  lineHeight: 20,
					  rotate: (flip) ? 180 : p.startAngle,
					  radius: p.diameter / 2,
					 // letterSpacing: kerning,
					 // flipArcText: flip
					}).drawLayers();*/
                ctx.rotate((charWid / 2 + p.kerning) / (p.diameter / 2 - textHeight) * clockwise); // rotate half letter
            }
	
    
    // Call the detectEvents() function to enable jCanvas events
    // Be sure to pass it these arguments, too!
    $.jCanvas.detectEvents(this, ctx, p);
    // Call the closePath() functions to fill, stroke, and close the path
    // This function also enables masking support and events
    // It accepts the same arguments as detectEvents()
    $.jCanvas.closePath(this, ctx, p);
  }
});

function getCircularText(layer, text, diameter,  startAngle, align, textInside, inwardFacing, fName, fSize, kerning) {
        // text:         The text to be displayed in circular fashion
        // diameter:     The diameter of the circle around which the text will
        //               be displayed (inside or outside)
        // startAngle:   In degrees, Where the text will be shown. 0 degrees
        //               if the top of the circle
        // align:        Positions text to left right or center of startAngle
        // textInside:   true to show inside the diameter. False to show outside
        // inwardFacing: true for base of text facing inward. false for outward
        // fName:        name of font family. Make sure it is loaded
        // fSize:        size of font family. Don't forget to include units
        // kearning:     0 for normal gap between letters. positive or
        //               negative number to expand/compact gap in pixels
        //------------------------------------------------------------------------

            // declare and intialize canvas, reference, and useful variables
            align = align.toLowerCase();
            
            //remove existing div
            var thisLayer = document.getElementById(layer);
           
		    var PIXEL_RATIO = (function () {
			var ctx = document.createElement("canvas").getContext("2d"),
				dpr = window.devicePixelRatio || 1,
				bsr = ctx.webkitBackingStorePixelRatio ||
					  ctx.mozBackingStorePixelRatio ||
					  ctx.msBackingStorePixelRatio ||
					  ctx.oBackingStorePixelRatio ||
					  ctx.backingStorePixelRatio || 1;

				return dpr / bsr;
			})();

		createHiDPICanvas = function(w, h, ratio) {
			if (!ratio) { ratio = PIXEL_RATIO; }
			var can = document.createElement("canvas");
			can.width = w * ratio;
			console.log("width: "+w);
			console.log("ratio: "+ratio);
			can.height = h * ratio;
			can.style.width = w + "px";
			can.style.height = h + "px";
			can.getContext("2d").setTransform(ratio, 0, 0, ratio, 0, 0);
			return can;
		}
		//Create canvas with the device resolution.
		//var mainCanvas = createHiDPICanvas(500, 250);

		//Create canvas with a custom resolution.
		var mainCanvas = createHiDPICanvas(diameter, diameter, 4);
            var mainCanvas = document.createElement('canvas');
            mainCanvas.id = layer;
            
                /* var exists = !!document.getElementById('topTextLayer');
                if(exists === "true"){
                   var canvas = document.getElementById(layer);
                  var ctx = canvas.getContext("2d");
                    ctx.fillStyle = '#fff';
                   ctx.fillRect(0, 0, canvas.width, canvas.height);
                }*/
            var ctxRef = mainCanvas.getContext('2d');
            ctxRef.fillRect(0, 0, mainCanvas.width, mainCanvas.height);            
            var clockwise = align == "right" ? 1 : -1; // draw clockwise for aligned right. Else Anticlockwise
            startAngle = startAngle * (Math.PI / 180); // convert to radians

            // calculate height of the font. Many ways to do this
            // you can replace with your own!
            var div = document.createElement("div");
            div.innerHTML = text;
            div.style.position = 'absolute';

            div.style.backgroundcolor = 'transparent';
            div.style.top = '-10000px';
            div.style.left = '-10000px';
            div.style.fontFamily = fName;
            div.style.fontSize = fSize;
            document.body.appendChild(div);

            var textHeight = div.offsetHeight;
            document.body.removeChild(div);

            // in cases where we are drawing outside diameter,
            // expand diameter to handle it
            if (!textInside)
                diameter += textHeight * 2;

            mainCanvas.width = diameter;
            mainCanvas.height = diameter;
            // omit next line for transparent background
            //    mainCanvas.style.backgroundColor = 'lightgray';
          //  mainCanvas.style.top = "20px;";
            mainCanvas.style.position = "absolute";
            mainCanvas.style.border = "1px solid green";
            ctxRef.fillStyle = 'black';
            ctxRef.font = fSize + ' ' + fName;

            // Reverse letters for align Left inward, align right outward 
            // and align center inward.
            if (((["left", "center"].indexOf(align) > -1) && inwardFacing) || (align == "right" && !inwardFacing))
                text = text.split("").reverse().join("");

            // Setup letters and positioning
						
            ctxRef.translate(diameter / 2 , diameter / 2 ); // Move to center
            startAngle += (Math.PI * !inwardFacing); // Rotate 180 if outward
            ctxRef.textBaseline = 'middle'; // Ensure we draw in exact center
            ctxRef.textAlign = 'center'; // Ensure we draw in exact center

            // rotate 50% of total angle for center alignment
            if (align == "center") {
                for (var j = 0; j < text.length; j++) {
                    var charWid = ctxRef.measureText(text[j]).width;
                    startAngle += ((charWid + (j == text.length - 1 ? 0 : 1)) / (diameter / 2 - textHeight)) / 2 * -clockwise;
                }
            }

            // Phew... now rotate into final start position
            ctxRef.rotate(startAngle);

            // Now for the fun bit: draw, rotate, and repeat
            for (var j = 0; j < text.length; j++) {
                var charWid = ctxRef.measureText(text[j]).width; // half letter
                // rotate half letter
                ctxRef.rotate((charWid / 2) / (diameter / 2 - textHeight) * clockwise);
                // draw the character at "top" or "bottom" 
                // depending on inward or outward facing
                ctxRef.fillText(text[j], 0, (inwardFacing ? 1 : -1) * (0 - diameter / 2 + textHeight / 2));
                
                ctxRef.rotate((charWid / 2 + kerning) / (diameter / 2 - textHeight) * clockwise); // rotate half letter
            }

            // Return it
            return (mainCanvas);
        }
    function download_image(bgImgSrc) {
            var background = new Image();    
          
            var topTextCanvas = document.getElementById('topTextLayer');
            var ctx1 = topTextCanvas.getContext('2d');
          //  ctx1.globalCompositeOperation = 'destination-over';
            var top = ctx1.getImageData(0, 0, 150, 105);
         //   var bottomTextCanvas = document.getElementById('bottomTextLayer');
         //   var ctx2 = bottomTextCanvas.getContext('2d');
         //   var bottom = ctx2.getImageData(0, 75, 150, 150);

            // var merged = mergeData(top, bottom);
            // ctx2.putImageData(merged, 0, 0);
            var merged = document.getElementById('merged');
            ctx3 = merged.getContext('2d');
            
            
             background.onload = function(){
                   ctx3.drawImage(background,0,0);  
               
              }
		 background.src = bgImgSrc;
            ctx3.putImageData(top, 10, 12);
            
            
          //  ctx3.putImageData(bottom, 20, 98);
            var link = document.createElement('a');
            link.download = "prov-round-stamp.png";
            link.href = merged.toDataURL("image/png").replace("image/png", "image/octet-stream");
            link.click();
        }    
        function encodeUnicode(str) {
  // first we use encodeURIComponent to get percent-encoded UTF-8,
  // then we convert the percent encodings into raw bytes which
  // can be fed into btoa.
  return btoa(encodeURIComponent(str).replace(/%([0-9A-F]{2})/g,
      function toSolidBytes(match, p1) {
          return String.fromCharCode('0x' + p1);
  }));
}
function addCTextLayer(container,width,height, parant = null){
	layer1 = new CanvasLayers.Layer(0, 0, width, height);
	if(parant)
	 parant.children.add(layer1);
    else
		container.children.add(layer1);
	layer1.raiseToTop();
	layer1.onRender = function(layer, rect, context){
					context.clearRect(0,0,width, height);
					editCText(layer,rect,context);
	}				
}		
function addTextLayer(container,width,height){
	layer1 = new CanvasLayers.Layer(0, 0, width, height);
	container.children.add(layer1);
	layer1.raiseToTop();
	layer1.onRender = function(layer, rect, context){
					context.clearRect(0,0,width, height);
					//editCText(layer,rect,context);
					context.fillStyle = '#0f0';
		context.fillRect(0, 0, 400, 400);
	}	
}
//function editCText(layer, rect, context) {
	function editCText(layerid, flip = false) {				
				//	context.strokeStyle = '#000'
				var text = $("#dynamicmodel-text").val();
					//var fName = "Arial";
					var fName = "MagnoliaScript";
					var align = "center";
					var textInside = false;
					var inwardFacing = true;
					/*var radius = flip ? $("#radiusb").val() : $("#radius").val();				
					var fSize = flip ? parseInt($("#fontSizeb").val()) : parseInt($("#fontSize").val());
					var startAngle = flip ? parseInt($("#anglestb").val()) : parseInt($("#anglest").val());
					var kerning = flip ? parseFloat($("#kerningb").val()) : parseFloat($("#kerning").val());*/
					var fName = $("#dynamicmodel-font").val();
					var radius = $("#dynamicmodel-radius").val() ;				
					var fSize =  parseInt($("#dynamicmodel-fontsz").val());
					var startAngle = parseInt($("#dynamicmodel-anglest").val());
					var kerning = parseFloat($("#dynamicmodel-spacing").val());
					$('canvas').drawText({
					layer:true,
					name: layerid,
					draggable:true,
					  fillStyle: 'black',
					  fontFamily: 'MangolianScript',
					  fontSize: fSize,
					  text: text,
					  x: 202, y: 202,
					  lineHeight: 20,
					  rotate: (flip) ? 180 - startAngle : startAngle,
					  radius: radius,
					  letterSpacing: kerning,
					  flipArcText: flip,
					  click: function(layer) {
					  // Click a star to spin it
					  /*$(this).animateLayer(layer, {
						rotate: '+=144'
					  });*/
					},
					mouseover: function(layer) {
						$(this).animateLayer(layer, {
						  fillStyle: '#c33'
						}, 500);
					  },
					   mouseout: function(layer) {
						$(this).animateLayer(layer, {
						  fillStyle: 'black'
						}, 500);
					  },
					}).drawLayers();
					/*$('canvas').drawHeart({
					  layer: true,
					  draggable: true,
					  bringToFront: true,
					  fillStyle: '#c33',
					  layerid:layerid,
					  text:text,
					  diameter: radius,
					  fName: 'Ubuntu sans-serif',
					  font: 'Ubuntu sans-serif',
					  fSize: fSize + 'pt',
					  fontSize: fSize,
					  startAngle: startAngle,
					  textInside:textInside,
					  inwardFacing: true,
					  align: align,
					  kerning: kerning
				    });*/
			}		
			
function saveStamp(){
	         
							var canvas = document.getElementById('CStamp');
							var img=new Image();
							img.src= 'http://localhost:8080/images/circle7.png'; //document.getElementById('bgimage').src;
							var ocanvas = document.getElementById('canvas1');
							//$("#canvas1").attr("width", "110px");
							//$("#canvas1").attr("height", "110px");
							var octx = ocanvas.getContext('2d');
							octx.clearRect(0,0,ocanvas.width, ocanvas.height,false);
							octx.drawImage(img,0,0);
							var style = window.getComputedStyle(canvas);
							var matrix = new WebKitCSSMatrix(style.transform);
							console.log('translateX: ', matrix.m41);
							/*var wrh = canvas.width / canvas.height;
							var newWidth = canvas.width;
							var newHeight = newWidth / wrh;
							if (newHeight > canvas.height) {
								newHeight = canvas.height;
								newWidth = newHeight * wrh;
							}*/
							octx.drawImage(canvas, matrix.m41, matrix.m42);
							
							var cText = canvas.toDataURL("image/png"); 
							//octx.putImageData(cText, matrix.m41, 0);
							
							var link = document.createElement('a');
							link.download = "bottle-design.png";
							link.href = ocanvas.toDataURL("image/png").replace("image/png", "image/octet-stream");
							link.click();
						}
 