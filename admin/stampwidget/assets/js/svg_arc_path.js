"use strict";
{
	const layerinfo = wscript;
	console.log(wscript);
    // Â© 2019 Xah Lee
    // version 2019-06-26
	const textA = document.getElementById("text");
    const center_x_slider = document.getElementById("center_x_slider");
    const center_y_slider = document.getElementById("center_y_slider");
    const centerX = document.getElementById("centerX");
    const centerY = document.getElementById("centerY");
    const rx_slider = document.getElementById("rx_slider");
    const ry_slider = document.getElementById("ry_slider");
    const rx = document.getElementById("rx");
    const ry = document.getElementById("ry");
    const sweepStart_slider = document.getElementById("sweepStart_slider");
    const sweepStart = document.getElementById("sweepStart");
    const sweepDelta_slider = document.getElementById("sweepDelta_slider");
    const sweepDelta = document.getElementById("sweepDelta");
    const rot_slider = document.getElementById("rot_slider");
    const rot = document.getElementById("rot");
    const canvas08788 = document.getElementById("canvas08788");
    const textDisplay50572 = document.getElementById("textDisplay50572");
	const textDisplay50573 = document.getElementById("textDisplay50573");
    const cos = Math.cos;
    const sin = Math.sin;
    const pi = Math.PI;
    const abs = Math.abs;
    const f_matrix_times = (([[a, b], [c, d]], [x, y]) => [a * x + b * y, c * x + d * y]);
    const f_rotate_matrix = ((x) => {
        const cosx = cos(x);
        const sinx = sin(x);
        return [[cosx, -sinx], [sinx, cosx]];
    });
    
    const f_vec_add = (([a1, a2], [b1, b2]) => [a1 + b1, a2 + b2]);
	
	const f_svg_text_arc = ((params, txt) => {
            console.log(params);	    
		var tvals = [];
		var sa = parseFloat(sweepStart.value);
		var t1 = parseFloat(sweepDelta.value);
		var rax = parseFloat(rx.value);
		var ray = parseFloat(ry.value);
		var sba = abs( sa - t1);
		var sub_angle = sba  * (pi / 180);
		var degDelta = 360 / txt.length;
		var lx = -1 * parseFloat(params[1]);
		var ly = -1 * parseFloat(params[3]);
		console.log(rax);
		var i =0;
	    //for (var i = 0; i < txt.length; i++){
		  var xi = lx + rax*(cos(degDelta));
		  var yi = ly + ray*(sin(degDelta));
		  // now plot green point at (xi, yi)
		  console.log("x:"+xi+" "+yi);
		  rax += degDelta;
		  ray += degDelta;
		//  tvals[i] = [xi,yi,-(degDelta * i + degDelta / 2)+90,txt[i]];
		  var alen = ( 2 * pi * rax ) * ( sba / 360 );
		  console.log("arc len: "+ alen);
		  tvals[i] = [-lx,-ly,-(degDelta * i + degDelta / 2)+90,txt,alen];
		//}
		return tvals;
	 });	
    const f_svg_ellipse_arc = (([cx, cy], [rx, ry], [sta, swa], rot) => {
        /* [
        returns a a array that represent a ellipse for SVG path element d attribute.
        cx,cy - center of ellipse.
        rx,ry - major minor radius.
        sta - start angle, in radian.
        swa -angle to sweep, in radian. positive.
        rot - rotation on the whole, in radian.
        url: SVG Circle Arc http://xahlee.info/js/svg_circle_arc.html
        Version 2019-06-19
         ] */
        swa = swa % (2 * pi);
        const rotMatrix = f_rotate_matrix(rot);
        const [sX, sY] = (f_vec_add(f_matrix_times(rotMatrix, [rx * cos(sta), ry * sin(sta)]), [cx, cy]));
        const [eX, eY] = (f_vec_add(f_matrix_times(rotMatrix, [rx * cos(sta + swa), ry * sin(sta + swa)]), [cx, cy]));
        const fA = ((swa > pi) ? 1 : 0);
        const fS = ((swa > 0) ? 1 : 0);
        return [" M ", sX, " ", sY, " A ", rx, ry, rot / pi * 180, fA, fS, eX, eY];
    });
    const svg1 = document.getElementById("h-o-l-ds");
    //svg1.setAttribute('style', "stroke:red; fill:none; stroke-width:2");
    //svg1.setAttribute('width', "400");
    //svg1.setAttribute('height', "400");
    //canvas08788.appendChild(svg1);
	//svg1.innerHTML = "";
    const f_update = (() => {
        const params = f_svg_ellipse_arc([
            parseFloat(centerX.value),
            parseFloat(centerY.value)
        ], [
            parseFloat(rx.value),
            parseFloat(ry.value)
        ], [
            parseFloat(sweepStart.value) / 180 * pi,
            parseFloat(sweepDelta.value) / 180 * pi
        ], parseFloat(rot.value) / 180 * pi);
		
		const params2 = f_svg_text_arc(params, textA.value);
		
        const cmdStr1 = params.join(" ");
        const cmdStr2 = params.map(((x) => ((typeof x === "number") ? x.toFixed(0) : x))).join(" ");
		
		//const cmdStr3 = params2.join(" ");
		//const cmdStr4 = params2.map(((x) => ((typeof x === "number") ? x.toFixed(0) : x))).join(" ");
      
		const arca = document.getElementById("topText");
		document.getElementById("arc1").setAttribute("d", cmdStr2);;
					
		
        var canvas = document.getElementById("RangText1");   
		var tsp = document.getElementById("tsp1");
       //  canvas.innerHTML = "";		
		
        textDisplay50572.textContent = `<path d="${cmdStr2}" />`;
		//textDisplay50573.innerHTML = '<p>'+ cmdStr4 +'</p>';
		for(var i = 0; i < params2.length; i++){
		  let txt = document.createElement("text");
		  let tr = "translate(" + params2[i][0] + "," + params2[i][1] +")";
		  let rt = "rotate(" + params2[i][2] +" )";
		  txt.setAttribute("transform", tr + " " + rt);
		  //txt.setAttribute("x",params2[i][0]);
		  //txt.setAttribute("y",params2[i][1]);
		  txt.innerHTML = params2[i][3];
		  tsp.innerHTML = params2[i][3];
		    console.log(params2[i][3]);
		    var el = document.getElementsByTagName('text')[0];
             console.log(el.getComputedTextLength());
			 var cl = parseFloat(el.getComputedTextLength());
			 var tl = 28;
			 var al = parseInt(params2[i][4]);
			 var rl = (al - cl ) ;//+ (2 * tl);
		    arca.setAttribute("textLength",rl);
			arca.setAttribute("lengthAdjust","spacing")
		}
    });
	textA.addEventListener("change",f_update, false);
    center_x_slider.addEventListener("input", (() => { centerX.value = center_x_slider.value; }), false);
    center_y_slider.addEventListener("input", (() => { centerY.value = center_y_slider.value; }), false);
    centerX.addEventListener("input", (() => { center_x_slider.value = centerX.value; }), false);
    centerY.addEventListener("input", (() => { center_y_slider.value = centerY.value; }), false);
    rx_slider.addEventListener("input", (() => { rx.value = rx_slider.value; }), false);
    ry_slider.addEventListener("input", (() => { ry.value = ry_slider.value; }), false);
    rx.addEventListener("input", (() => { rx_slider.value = rx.value; }), false);
    ry.addEventListener("input", (() => { ry_slider.value = ry.value; }), false);
    sweepStart_slider.addEventListener("input", (() => { sweepStart.value = sweepStart_slider.value; }), false);
    sweepStart.addEventListener("input", (() => { sweepStart_slider.value = sweepStart.value; }), false);
    sweepDelta_slider.addEventListener("input", (() => { sweepDelta.value = sweepDelta_slider.value; }), false);
    sweepDelta.addEventListener("input", (() => { sweepDelta_slider.value = sweepDelta.value; }), false);
    rot_slider.addEventListener("input", (() => { rot.value = rot_slider.value; }), false);
    rot.addEventListener("input", (() => { rot_slider.value = rot.value; }), false);
	
    [
        center_x_slider,
        center_y_slider,
        centerX, centerY,
        rx_slider,
        ry_slider,
        rx, ry,
        sweepStart_slider,
        sweepStart,
        sweepDelta_slider,
        sweepDelta,
        rot_slider,
        rot
    ].map(((x) => { x.addEventListener('input', f_update, false); }));
	
	const event = new Event('change');  
    textA.dispatchEvent(event);
    f_update();
}
	function drawLineAlongArc(context, str, center, radius, startAngle, endAngle, fontSize, alignment) {
			
            
    }
		
 