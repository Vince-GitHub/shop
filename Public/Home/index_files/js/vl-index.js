;(function ($) {
	VL.home = {
		kv: {
			get: function () {
				this.jCanvas = $('.kv');
				this.jItems = this.jCanvas.find('li');
			},
			change: function (idx) {
				this.scroll.moveTo(idx);
			},
			setScroll: function () {
				this.scroll = new VL.UnlimitScroller(this.jCanvas, {
					autoPlay: true,
          intervalTime: 5000,
          animateTime: 500
				});
			},
			ini: function () {
				this.get();
				this.setScroll();
			}
		},
		brands: {
			get: function () {
				this.jCanvas = $('.brand-list');
				this.jItems = this.jCanvas.find('li');
			},
			setScroll: function () {
				this.scroll = new VL.Carousel(this.jCanvas, {
					unit: 0
				});
			},
			bind: function () {
				var that = this;
				this.jCanvas.on('click', 'li', function () {
					that.jCanvas.find('li').removeClass('current');
					$(this).addClass('current');
				});
			},
			ini: function () {
				this.get();
				this.setScroll();
				this.bind();
			}
		},
		colArea: {
			setTrace: function () {
				$('.block-banners').find('a').each(function (i, o) {
					var s = $(o),
            url = s.attr('href');
          s.attr('href', 'javascript:;').removeAttr('target');
          if (s.data('type') === 'video') {
            //mars seed
            s.data('url', url);
            s.parent().attr('mars_sead', '218|10|10162|' + (i + 1));
          } else {
            //ff
            if (url.indexOf('?') > -1) {
              s.attr('data-href', url + '&ff=218|10|10162|' + (i + 1));
            } else {
              s.attr('data-href', url + '?ff=218|10|10162|' + (i + 1));
            }
          }
				});
			},
      handleSWF: function () {
        $('.block-banners').on('click', '.col1, .col2', function () {
          var p = $(this),
              s = p.find('a');
          if (s.data('type') === 'video') {
            if (!p.find('iframe')[0]) {
              p.append('<iframe scrolling="no" src="' + s.data('url') + '"></iframe>');
            }
          } else {
            window.open(s.data('href'));
          }
        });
      },
			ini: function () {
				this.setTrace();
        this.handleSWF();
			}
		},
		resize: {
			resizeHandler: function () {
				var w = $(window).width();
				if (w <= 1024) {
					$('html').addClass('resized');
				} else {
					$('html').removeClass('resized');
				}
				
				this.resizeScrolls(w);
				
			},
			resizeScrolls: function (w) {
				var kvScroll = VL.home.kv.scroll,
					kvCurrent = kvScroll.currentIdx,
					brandScroll = VL.home.brands.scroll,
					brandCurrent = brandScroll.currentStep,
					w = w || $(window).width(),
					sw = 0,
					lh = 0;
				if (w > 1260) {
					w = 1260;
				} else if (w < 1024) {
					w = 1024;
				}
				sw = parseInt(w / 5 - 1, 10);
				lh = sw * 113 / 251;
				VL.home.kv.jCanvas.find('li').width(w);
				VL.home.kv.jCanvas.width(w).height(w * 587 / 1260);
				kvScroll.refresh();
				kvScroll.to(kvCurrent);
				
				VL.home.brands.jItems.width(sw).css('line-height', lh + 'px').find('a').css('line-height', lh + 'px');
				VL.home.brands.jCanvas.width(w).height(lh);
				brandScroll.refresh();
				brandScroll.to(brandCurrent);
			},
			bindResize: function () {
				var that = this;
				$(window).on('resize', function () {
					clearTimeout(that.timer || '');
					that.timer = setTimeout(function () {
						that.resizeHandler();
					}, 50);
				});
			},
			ini: function () {
				this.bindResize();
				this.resizeHandler();
			}
		},
		ini: function () {
			this.kv.ini();
			this.brands.ini();
			this.colArea.ini();
			this.resize.ini();
		}
	};
	
	$(function () {
		VL.home.ini();
	})
}(jQuery));