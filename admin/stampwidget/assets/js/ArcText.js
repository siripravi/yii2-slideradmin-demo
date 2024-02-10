const cos = Math.cos,
    sin = Math.sin,
    pi = Math.PI,
    abs = Math.abs;
	
class ArcText {
	constructor(text,sta, swa, cx = 125,cy = 125,rx = 98,ry = 98,rot = 0,flip = false){		
		this.temporaryId = ArcText.nextAutoIncrementedId;
		ArcText.nextAutoIncrementedId += 1;		
		this.text = text;
		this.flip = flip;
		this.charArr = this.setCharArr(this.text,this.flip) ;
		this.centerX  = parseFloat(cx);
		this.centerY = parseFloat(cy);
		this.radiusX = parseFloat(rx);
		this.radiusY = parseFloat(ry);
		this.sweepAngle = parseFloat(swa);
		this.rotAngle = parseFloat(rot);
		
		this.startAngle =  (sta > 0)? parseFloat(sta) : this.setDefStartAngle(this.flip)
		
	}

	f_matrix_times([[a, b], [c, d]], [x, y]) { 
		return [a * x + b * y, c * x + d * y];
	}

    f_rotate_matrix (x){
        const cosx = cos(x);
        const sinx = sin(x);
        return [[cosx, -sinx], [sinx, cosx]];
    }
    
    f_vec_add([a1, a2], [b1, b2]) { return [a1 + b1, a2 + b2]}
	
	f_svg_text_arc() {
		const txt = this.text;
		const charArr = this.charArr; 
		const cx = this.centerX;
		const cy = this.centerY;
		const rx = this.radiusX;
		const ry = this.radiusY;
		const stan = this.startAngle; 
		const swan = this.sweepAngle;
		const rot = this.rotAngle;
		const flip = this.flip;
		var tvals = [];
		var tl = txt.length;
		var sta = stan / 180 * pi;
		var dd =  (swan / tl ) /180 * pi;
		var swa = swan / 180 * pi;
		swa = swa % (2 * pi); 
        const rotMatrix = this.f_rotate_matrix(rot / 180 * pi);
		
		for(var i=0;i< tl; i++){ 
			 const [sX, sY] = (this.f_vec_add(this.f_matrix_times(rotMatrix, [rx * cos(sta), ry * sin(sta)]), [cx, cy]));
			 var r = (!flip) ? (sta * 180 / pi) + 90 : (sta * 180 / pi) + 270;
			 tvals[i] = [sX, sY, r ,charArr[i]]
			 let f = (!flip) ? 1 : -1;
			 sta = sta + f * dd;
        }
		
		return tvals;
	};	
	
	setDefStartAngle(flip){
		var tl = this.text.length;
		var sta;
		var swa = (this.sweepAngle > 0) ? this.sweepAngle : 360 / tl;
		this.sweepAngle = swa;
		if(!flip)  
           sta = (swa <= 180 ) ? 180 + (180 - swa ) / 2 : 180 - (swa - 180) / 2;
		else
			sta = (swa <= 180 ) ? 180 - (180 - swa ) / 2 : 180 + (swa - 180) / 2;		
		return sta;
	}
	
	setCharArr(text = "", flip = false) {
		return  [...text];
		
	}
}
/*
ArcText.text = "Some text around the circle";
ArcText.centerX = 125;
ArcText.centerY = 125;
ArcText.radiusX = 98;
ArcText.radiusY = 98;
ArcText.rotAngle = 0;
ArcText.charArr = [];
	
ArcText.nextAutoIncrementedId = 0;
ArcText.defaultStyles = {
  fontName: 'Arial',
  fontSize: 12,
  fontColor: 'red'
  
};
*/
//module.exports = ArcText;
