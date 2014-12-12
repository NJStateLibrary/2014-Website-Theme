/**
 * Eliminate vertical gaps on Bootstrap 3.x columns
 * call tileColumns( selector ) onDOMReady and on resize
 * 
 * Dual licensed under the MIT and GPL licenses:
 *	http://www.opensource.org/licenses/mit-license.php
 *	http://www.gnu.org/licenses/gpl.html
 */

tileColumns = (function($) {
	return function( selector ) {

		var lastRowOffsets;
		
		selector = ( typeof(selector) === 'undefined' ? '.row' : selector );
	
		$( selector ).each( function( idx, el ) {
			
			var offsets = Array();
			var offMax = 0;
			
			$.each( $(el).children(':visible'), function( cidx, col ) {
				
				height = $(col).height();
				
				if( 'undefined' != typeof( lastRowOffsets ) ) {
					
					/** Quick hack for single column */
					if( $(col).width() > 0.7 * $(window).width() ) {
						$(col).css('margin-top', 'inherit' );
					} else if( 0 != lastRowOffsets[cidx] ) {
						$(col).css('margin-top', -1 * lastRowOffsets[cidx] );
						height -= lastRowOffsets[cidx];
					}
				}
				
				offsets.push( height );
				if( height > offMax )
					offMax = height;
				
			});
			
			$.each( offsets, function( idx, el ) {
				offsets[idx] = offMax - el;
			});
			
			lastRowOffsets = offsets.slice(0);
			
		});
	}

})(jQuery);
