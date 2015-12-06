(function ($) {
	$.fn.newsTicker = function(options) {
		if($(this).length < 1) return this;

		var opt = $.extend(true,{
			base : {
				width : 2100,
				time : 40000
			},
			itemWidth : "auto",
			ticker : ".ti_news",
			tickerColne : "ti_clone",
			wrapper : ".ti_wrapper",
			slide : ".ti_slide",
			content : ".ti_content",

			callbacks : {
				beforeLoad : function($Ticker){},
				onLoad : function($current,$Ticker){},
				beforeAnimation : function($old,$current){},
				completeAnimation : function($old,$current){}
			},

			core : {
				_getTime : function(w){
					return opt.base.time * (w / opt.base.width);
				},

				_contentWidth : function($tickers){
					var w = 0;
					if(opt.itemWidth !== "auto" && opt.itemWidth !== 0){
						w = $tickers.length * opt.itemWidth;
						$tickers.width(opt.itemWidth);
					}else{
						$tickers.each(function(){w = w + $(this).width()});
					}
					return Math.ceil(w+2);
				}
			}

		},options); 

		$(this).each(function(){
			var $Ticker = $(this);

			opt.callbacks.beforeLoad($(this));

			var $notizieTicker = $Ticker.find(opt.ticker),
			$wrapperTicker = $Ticker.find(opt.wrapper),
			$ti_slide = $Ticker.find(opt.slide),
			$contentTicker = $Ticker.find(opt.content);

			var width_content = opt.core._contentWidth($notizieTicker),
			wrapper_width = $wrapperTicker.width(),
			$current,
			$old = $();

			if(width_content < wrapper_width){
				var x = Math.ceil(width_content/wrapper_width);
				for (var i = 0; i < x; i++) {
					$contentTicker.append($contentTicker.children().clone());
				}

				width_content = ($contentTicker.children().length * opt.itemWidth);
			}

			if(width_content * 3 > $ti_slide.width()) $ti_slide.width((width_content*3)+100);

			$ti_slide.append($contentTicker.clone().addClass(opt.tickerColne));
			$ti_slide.append($contentTicker.clone().addClass(opt.tickerColne));

			$contentTickers = $Ticker.find(opt.content);
			$contentTickers.width(width_content);

			$current = $contentTickers.first();

			opt.callbacks.onLoad($current,$(this));

			var animateTicker = function(){
				$ti_slide.append($old);
				$old.css("margin-left",0);

				opt.callbacks.beforeAnimation($old,$current);

				this.tickerAnimation = $current.animate({
					"margin-left" : -width_content,
				},{
					easing : "linear",
					duration : opt.core._getTime(width_content),
					complete : function(){
						$old = $current;
						$current = $current.next();
						opt.callbacks.completeAnimation($old,$current);
						animateTicker.call($Ticker);
					}
				});
			}

			animateTicker.call(this);
		});
		
		return this;
	};

	$.fn.stopTicker = function(){
		$(this).each(function(){
			this.tickerAnimation.stop();
		});
	}

}( jQuery ));