	
$.jCanvas.extend({
  name: 'arcText',
  props: {
    prop: true
  },
  fn: function(ctx, params) {
	    
       var $canvases = this, e, ctx,
		params, layer,
		lines, line, l,
		fontSize, constantCloseness = 500,
		nchars, chars, ch, c,
		x, y;

	//for (e = 0; e < $canvases.length; e += 1) {
	//	ctx = _getContext($canvases[e]);
		if (ctx) {

			params = new jCanvasObject(args);
			_addLayer($canvases[e], params, args, drawText);
			if (params.visible) {

				// Set text-specific properties
				ctx.textBaseline = params.baseline;
				ctx.textAlign = params.align;

				// Set canvas font using given properties
				_setCanvasFont($canvases[e], ctx, params);

				if (params.maxWidth !== null) {
					// Wrap text using an internal function
					lines = _wrapText(ctx, params);
				} else {
					// Convert string of text to list of lines
					lines = params.text
					.toString()
					.split('\n');
				}

				// Calculate text's width and height
				_measureText($canvases[e], ctx, params, lines);

				// If text is a layer
				if (layer) {
					// Copy calculated width/height to layer object
					layer.width = params.width;
					layer.height = params.height;
				}

				_transformShape($canvases[e], ctx, params, params.width, params.height);
				_setGlobalProps($canvases[e], ctx, params);

				// Adjust text position to accomodate different horizontal alignments
				x = params.x;
				if (params.align === 'left') {
					if (params.respectAlign) {
						// Realign text to the left if chosen
						params.x += params.width / 2;
					} else {
						// Center text block by default
						x -= params.width / 2;
					}
				} else if (params.align === 'right') {
					if (params.respectAlign) {
						// Realign text to the right if chosen
						params.x -= params.width / 2;
					} else {
						// Center text block by default
						x += params.width / 2;
					}
				}

				if (params.radius) {

					fontSize = parseFloat(params.fontSize);

					// Greater values move clockwise
					if (params.letterSpacing === null) {
						params.letterSpacing = fontSize / constantCloseness;
					}
					
					
					// Loop through each line of text
					for (l = 0; l < lines.length; l += 1) {
						ctx.save();
						ctx.translate(params.x, params.y);
						line = lines[l];						
						line +=(String.fromCodePoint(9733));
						console.log("ICON: "+line);
						//Chandra Begin-001
						//var lines = lines[0].match(/./ug);//replace(/\u/g, '');					
					    //Chandra End-001
						if (params.flipArcText) {
							chars = line.split('');
							chars.reverse();
							line = chars.join('');
						}
						nchars = line.length;
						ctx.rotate(-(PI * params.letterSpacing * (nchars - 1)) / 2);
						// Loop through characters on each line
						for (c = 0; c < nchars; c += 1) {
							ch = line[c];
							var charWid = ctx.measureText(ch).width;
							// If character is not the first character
							if (c !== 0) {
								
								// Rotate character onto arc
								ctx.rotate(PI * params.letterSpacing);
								
							}
							ctx.save();
							ctx.translate(0, -params.radius);
							if (params.flipArcText) {
								ctx.scale(-1, -1);
							}
							ctx.fillText(ch, 0, 0);
							// Prevent extra shadow created by stroke (but only when fill is present)
							if (params.fillStyle !== 'transparent') {
								ctx.shadowColor = 'transparent';
							}
							if (params.strokeWidth !== 0) {
								// Only stroke if the stroke is not 0
								ctx.strokeText(ch, 0, 0);
							}
							ctx.restore();
						}
						params.radius -= fontSize;
						params.letterSpacing += fontSize / (constantCloseness * 2 * PI);
						ctx.restore();
					}

				} else {

					// Draw each line of text separately
					for (l = 0; l < lines.length; l += 1) {
						line = lines[l];
						// Add line offset to center point, but subtract some to center everything
						y = params.y + (l * params.height / lines.length) - (((lines.length - 1) * params.height / lines.length) / 2);

						ctx.shadowColor = params.shadowColor;

						// Fill & stroke text
						ctx.fillText(line, x, y);
						// Prevent extra shadow created by stroke (but only when fill is present)
						if (params.fillStyle !== 'transparent') {
							ctx.shadowColor = 'transparent';
						}
						if (params.strokeWidth !== 0) {
							// Only stroke if the stroke is not 0
							ctx.strokeText(line, x, y);
						}

					}

				}

				// Adjust bounding box according to text baseline
				y = 0;
				if (params.baseline === 'top') {
					y += params.height / 2;
				} else if (params.baseline === 'bottom') {
					y -= params.height / 2;
				}

				// Detect jCanvas events
				if (params._event) {
					ctx.beginPath();
					ctx.rect(
						params.x - (params.width / 2),
						params.y - (params.height / 2) + y,
						params.width,
						params.height
					);
					_detectEvents($canvases[e], ctx, params);
					// Close path and configure masking
					ctx.closePath();
				}
				_restoreTransform(ctx, params);

			}
		}
	//}
	// Cache jCanvas parameters object for efficiency
	caches.propCache = params;
	return $canvases;
  }
});

