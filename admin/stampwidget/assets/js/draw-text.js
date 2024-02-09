// Draws text on canvas
(function(){
			// Store a reference to the original remove method.
			//var x = $.jCanvas.fn.drawText;

			// Define overriding method.
			$.jCanvas.extend({
				name: 'drawText',
				// Log the fact that we are calling our override.
				fn: function(){
					console.log( "Override method" );

				// Execute the original method.
			//	x.apply( this, arguments );
			}
			});
		})();
