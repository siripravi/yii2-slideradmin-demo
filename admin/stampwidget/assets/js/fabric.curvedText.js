(function(fabric) {
/*
 * CurvedText object for fabric.js
 * @author Arjan Haverkamp (av01d)
 * @date January 2018
 */

fabric.CurvedText = fabric.util.createClass(fabric.Object, {
   type: 'curved-text',
   diameter: 250,
   kerning: 0,
   text: '',
   flipped: false,
   fill: '#000',
   fontFamily: 'Times New Roman',
   fontSize: 24, // in px
   fontWeight: 'normal',
   fontStyle: '', // "normal", "italic" or "oblique".
    cacheProperties: fabric.Object.prototype.cacheProperties.concat('diameter', 'kerning', 'flipped', 'fill', 'fontFamily', 'fontSize', 'fontWeight', 'fontStyle', 'strokeStyle', 'strokeWidth'),
   strokeStyle: null,
   strokeWidth: 0,

   initialize: function(text, options) {
      options || (options = {});
      this.text = text;

      this.callSuper('initialize', options);
      this.set('lockUniScaling', true);

      // Draw curved text here initially too, while we need to know the width and height.
      var canvas = this.getCircularText();
      this.cropCanvas(canvas);
      this.set('width', canvas.width);
      this.set('height', canvas.height);
   },

   _getFontDeclaration: function()
   {
      return [
         // node-canvas needs "weight style", while browsers need "style weight"
         (fabric.isLikelyNode ? this.fontWeight : this.fontStyle),
         (fabric.isLikelyNode ? this.fontStyle : this.fontWeight),
         this.fontSize + 'px',
         (fabric.isLikelyNode ? ('"' + this.fontFamily + '"') : this.fontFamily)
      ].join(' ');
   },

   cropCanvas: function(canvas)
   {
      var ctx = canvas.getContext('2d'),
         w = canvas.width,
         h = canvas.height,
         pix = {x:[], y:[]}, n,
         imageData = ctx.getImageData(0,0,w,h),
         fn = function(a,b) { return a-b };

      for (var y = 0; y < h; y++) {
         for (var x = 0; x < w; x++) {
            if (imageData.data[((y * w + x) * 4)+3] > 0) {
               pix.x.push(x);
               pix.y.push(y);
            }
         }
      }
      pix.x.sort(fn);
      pix.y.sort(fn);
      n = pix.x.length-1;

      w = pix.x[n] - pix.x[0];
      h = pix.y[n] - pix.y[0];
      var cut = ctx.getImageData(pix.x[0], pix.y[0], w, h);

      canvas.width = w;
      canvas.height = h;
      ctx.putImageData(cut, 0, 0);
   },

   // Source: http://jsfiddle.net/rbdszxjv/
   getCircularText: function()
   {
      var text = this.text,
         diameter = this.diameter,
         flipped = this.flipped,
         kerning = this.kerning,
         fill = this.fill,
         inwardFacing = true,
         startAngle = 0,
         canvas = fabric.util.createCanvasElement(),
         ctx = canvas.getContext('2d'),
         cw, // character-width
         x, // iterator
         clockwise = -1; // draw clockwise for aligned right. Else Anticlockwise

      if (flipped) {
         startAngle = 180;
         inwardFacing = false;
      }

      startAngle *= Math.PI / 180; // convert to radians

      // Calc heigt of text in selected font:
      var d = document.createElement('div');
      d.style.fontFamily = this.fontFamily;
      d.style.fontSize = this.fontSize + 'px';
      d.style.fontWeight = this.fontWeight;
      d.style.fontStyle = this.fontStyle;
      d.textContent = text;
      document.body.appendChild(d);
      var textHeight = d.offsetHeight;
      document.body.removeChild(d);

      canvas.width = canvas.height = diameter;
      ctx.font = this._getFontDeclaration();

      // Reverse letters for center inward.
      if (inwardFacing) { text = text.split('').reverse().join('') };

      // Setup letters and positioning
      ctx.translate(diameter / 2, diameter / 2); // Move to center
      startAngle += (Math.PI * !inwardFacing); // Rotate 180 if outward
      ctx.textBaseline = 'middle'; // Ensure we draw in exact center
      ctx.textAlign = 'center'; // Ensure we draw in exact center

      // rotate 50% of total angle for center alignment
      for (x = 0; x < text.length; x++) {
         cw = ctx.measureText(text[x]).width;
         startAngle += ((cw + (x == text.length-1 ? 0 : kerning)) / (diameter / 2 - textHeight)) / 2 * -clockwise;
      }

      // Phew... now rotate into final start position
      ctx.rotate(startAngle);

      // Now for the fun bit: draw, rotate, and repeat
      for (x = 0; x < text.length; x++) {
         cw = ctx.measureText(text[x]).width; // half letter
         // rotate half letter
         ctx.rotate((cw/2) / (diameter / 2 - textHeight) * clockwise);
         // draw the character at "top" or "bottom"
         // depending on inward or outward facing

         // Stroke
         if (this.strokeStyle && this.strokeWidth) {
            ctx.strokeStyle = this.strokeStyle;
            ctx.lineWidth = this.strokeWidth;
            ctx.miterLimit = 2;
            ctx.strokeText(text[x], 0, (inwardFacing ? 1 : -1) * (0 - diameter / 2 + textHeight / 2));
         }

         // Actual text
         ctx.fillStyle = fill;
         ctx.fillText(text[x], 0, (inwardFacing ? 1 : -1) * (0 - diameter / 2 + textHeight / 2));

         ctx.rotate((cw/2 + kerning) / (diameter / 2 - textHeight) * clockwise); // rotate half letter
      }
      return canvas;
   },

   _set: function(key, value) {
      switch(key) {
         case 'scaleX':
            this.fontSize *= value;
            this.diameter *= value;
            this.width *= value;
            this.scaleX = 1;
            if (this.width < 1) { this.width = 1; }
            break;

         case 'scaleY':
            this.height *= value;
            this.scaleY = 1;
            if (this.height < 1) { this.height = 1; }
            break;

         default:
            this.callSuper('_set', key, value);
            break;
      }
   },

   _render: function(ctx)
   {
      var canvas = this.getCircularText();
      this.cropCanvas(canvas);

      this.set('width', canvas.width);
      this.set('height', canvas.height);

      ctx.drawImage(canvas, -this.width / 2, -this.height / 2, this.width, this.height);

      this.setCoords();
   },

   toObject: function(propertiesToInclude) {
      return this.callSuper('toObject', ['text', 'diameter', 'kerning', 'flipped', 'fill', 'fontFamily', 'fontSize', 'fontWeight', 'fontStyle', 'strokeStyle', 'strokeWidth'].concat(propertiesToInclude));
   }
});

fabric.CurvedText.fromObject = function(object, callback, forceAsync) {
   return fabric.Object._fromObject('CurvedText', object, callback, forceAsync, 'curved-text');
};

})(typeof fabric !== 'undefined' ? fabric : require('fabric').fabric);