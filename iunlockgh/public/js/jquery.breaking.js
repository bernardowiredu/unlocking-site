/*
    jQuery ‌Breaking News is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, version 2 of the License.
 
    jQuery News Ticker is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with jQuery News Ticker.  If not, see <http://www.gnu.org/licenses/>.
*/
;(function($, window, undefined){
	var BreakingNewsObj = {
		init: function(options, el) {
			var that = this;

			that.el = el;
			that.$el = $(el);
			that.$elC = that.$el.attr('class');

			// Use options as a string value , that means passing only url into breakingNews
			that.url = (typeof options === 'string') ? options : options.url;

			// Extend our default options with those provided.
			that.options = $.extend({}, $.fn.breakingNews.options, options);

			// Specify the breakings-news size
			that.$el.addClass('breaking-news').css({
				'height': that.options.feedSize.height,
				'width': that.options.feedSize.width
			});

			// Append for retrieving the feed data
			that.$el.append('<div class="'+ that.$elC +'-entries"/>');

			that.cycle();
		},

		// The heart of the plugin ... 
		cycle: function() {
			var that = this;
			that.fetch().done(function( data ) {

				var feed = data.responseData.feed,
					entries = feed.entries;
					
				that.buildStructure( feed, entries);
				that.display();

				// Create a callback method...
				if ( typeof that.options.onComplete === 'function') {
					that.options.onComplete.apply( that.el, arguments );
				}
			});
		},

		// Use for fetching data from feed url with ajax request
		fetch: function() {
			return $.ajax({
				type: 'GET',
				url: document.location.protocol + '//ajax.googleapis.com/ajax/services/feed/load?v=1.0&num='+ this.options.numberToShow +'&q=' + encodeURIComponent( this.url ),
	    		dataType: 'jsonp'
			});
		},

		// Use for building transition structure and contolling the data
		buildStructure: function( feed, entries ) {
			
			var that = this, i = 0;
			that.dataObj = {
				itemsTransition: function() {

					switch( that.options.effect ) {
						case 'tricker':
							$('.'+that.$elC+'-entries').html('<a href="'+ entries[i].link +'">'+ entries[i].title +'</a>');
							that.effect().tricker('.'+that.$elC+'-entries a', entries[i].title, that.options.effectDuration);
							break;
						case 'fadeToggle':
							that.effect().FadeToggle('.'+that.$elC+'-entries', that.options.effectDuration, entries[i].link, entries[i].title);
							break;
						case 'slideToggle':
							that.effect().SlideToggle('.'+that.$elC+'-entries', that.options.effectDuration, entries[i].link, entries[i].title);
							break;
						case 'scroll':
							$.each(entries, function(i,data) {
								$('.'+that.$elC+'-entries').parent().addClass('scroll-effect').css({
									'height': that.options.scrollInit.height,
									'border': that.options.scrollInit.border
								});
								$('.'+that.$elC+'-entries').append('<a href="'+ entries[i].link +'">'+ entries[i].title +'</a>');
							});
							var an = 0,
								feedEntries = $('.'+that.$elC+'-entries');
							setInterval(function() {
								if ( an < ( feedEntries.prop('scrollHeight') ) ) {
									$('.'+that.$elC+'-entries').css({
										'position': 'absolute',
										'overflow': 'hidden'
									}).animate({
										top: -an
									}, 10 );
								} else {
									an = -( $('.'+that.$elC+'-entries').parent().outerHeight() );
								}								
								an++;
								
							}, that.options.effectDuration );
							break;
						default:
							that.effect().FadeToggle('.'+that.$elC+'-entries', that.options.effectDuration, entries[i].link, entries[i].title);
							break;
					}

					// A condition for showing data repeatedly. if (i) is greater or equal than number of data then to set zero if is not then increase the i.
					i = ( i >= entries.length-1 ) ? 0 : i+1;

				}
			}
		},

		// Display the data that fetch with fetch method and then orgnizing with buildStructure method
		display: function() {
			this.dataObj.itemsTransition();
		},

		// Efect initialization
		effect: function() {
			var that = this;
			return {

				// tricker effect: split the title into letter and then showing theme with setting a timer to delay 
				tricker: function(el, text, speed) {
					var timePlus = text.length;
					$(el).html('');
					$(el).parent().append('<span class="uscore">  _</span>');
					$.each( text.split(''), function(m, letter) {
						setTimeout(function() {
							$(el).html( $(el).html() + letter );
							if ( m >= text.length-2 ) {
								$(el).parent().find('span.uscore').fadeOut(500);
							}
						}, speed * m);
					});
					setTimeout(function() {
						that.dataObj.itemsTransition();
					}, that.options.refresh + (timePlus * speed) );
				},

				// SlideToggle effect like slideToggle jquery's effect
				SlideToggle: function(el, speed, link, title, obj) {
					$(el).slideUp(speed, function() {
						$(this).html('<a href="'+ link +'">'+ title +'</a>').slideDown(speed, function() {
							setTimeout(function() {
								that.dataObj.itemsTransition();
							}, that.options.refresh + speed);
						});
					});
				},

				// FadeToogle effect like fadeToggle jquery's effect
				FadeToggle: function(el, speed, link, title, obj) {
					$(el).fadeOut(speed, function() {
						$(this).html('<a href="'+ link +'">'+ title +'</a>').fadeIn(speed, function() {
							setTimeout(function() {
								that.dataObj.itemsTransition();
							}, that.options.refresh + speed);
						});
					});
				}
			};
		}
	};

	$.fn.breakingNews = function(options) {
 		
  		return this.each( function() {
			var breakingNewsObj = Object.create( BreakingNewsObj );
			breakingNewsObj.init(options, this);
		});

	};


	// plugin defaults - added as a property on our plugin function
	$.fn.breakingNews.options = {
		url: '',
		feedSize: {
			height: '20px',
			width: '600px'
		},
		numberToShow: 5,
		refresh: 1000,
		effect: 'tricker',
		effectDuration: 60,
		scrollInit: {
			height: '30px',
			border: '10px solid transparent'
		},
		onComplete: null
	};
})(jQuery, window);