/**
 * 基础组件库
 * @namespace VL
 * @author jian<jian05.chen@vipshop.com>
 * @version 0.1
 */
"use strict" 
;(function ($) {
/**
 * @desc		文档根元素
 * @property	rootElem
 * @type 		{Object}
 */
VL.rootElem = document.compatMode && document.compatMode === 'CSS1Compat' ? document.documentElement : document.body;
jQuery(function () {  //document.body maybe not ready when this js running.
	/**
	 * @desc		文档的滚动元素
	 * @property	rootScrollingElem
	 * @type 		{Object}
	 */
	VL.rootScrollingElem = (VL.ua.isWebKit) ? document.body : VL.rootElem;
});

/**
 * @desc		阴影遮罩层
 * @property	mask
 * @type 		{Object}
 * @example		
 *				VL.mask.show();
 *				VL.mask.show(fn); //with callback
 *				VL.mask.hide();
 *				VL.mask.hide(fn); //with callback
 */
VL.mask = {
	/**
	 * @desc		遮罩层是否已经初始化
	 * @property	isReady
	 * @type 		{Boolean}
	 */
	isReady: false,
	/**
	 * @desc		遮罩层是否显示出
	 * @property	isVisible
	 * @type 		{Boolean}
	 */
	isVisible: false,
	/**
	 * @desc		初始化函数，产生遮罩层DOM
	 * @method		_ini
	 */
	_ini: function () {
		if (!this.isReady) {
			this.jMask = jQuery('<div class="cmMask"></div>').appendTo(document.body);
			jQuery(window).resize(function (){
				if (VL.mask.isVisible) {
					VL.mask.pos();
				}
			});
			this.isReady = true;
		}
	},
	/**
	 * @desc		处理遮罩层的重定位
	 * @method		pos
	 */
	pos: function () {
		this.jMask.css({
			width: VL.rootElem.scrollWidth + 'px',
			height: VL.rootElem.scrollHeight + 'px'
		});
	},
	/**
	 * @desc		显示遮罩层，callback将在显示后执行
	 * @method		show
	 * @param		{Function} 
	 */
	show: function (callback) {
		if (VL.mask.isVisible) {return false; }
		this._ini();
		this.pos();
		this._hideSelect();
		this.jMask.css('visibility', 'visible');
		this.isVisible = true;
		if (jQuery.isFunction(callback)) {callback(); }
	},
	/**
	 * @desc		隐藏遮罩层，callback将在显示后执行
	 * @method		hide
	 * @param		{Function} 
	 */
	hide: function (callback) {
		if (!VL.mask.isVisible) {return false; }
		this.jMask.css({
			visibility: 'hidden',
			width: '0',
			height: '0'
		});
		this._showSelect();
		this.isVisible = false;
		if (jQuery.isFunction(callback)) {callback(); }
	},
	/**
	 * @desc		显示遮罩层时执行，IE6下会隐藏select元素
	 * @method		_hideSelect
	 * @param		{Function} 
	 */
	_hideSelect: function () {
		if (VL.ua.isIE6) {
			jQuery('select').css('visibility', 'hidden');
		}
	},
	/**
	 * @desc		隐藏遮罩层后，IE6下会显示select元素
	 * @method		_showSelect
	 * @param		{Function} 
	 * @todo		这里会产生BUG，原本按需设置不可视的select也会被设置为可视
	 */
	_showSelect: function () {
		if (VL.ua.isIE6) {
			jQuery('select').css('visibility', 'visible');
		}
	}
};

/**
 * @desc		模态弹出层
 * @property	dialog
 * @type 		{Object}
 * @example		
 *				VL.dialog.open('#id');
 *				VL.dialog.open('.foo .bar'); //open dialog with selector
 *				VL.dialog.open({s: '#id', autoClose: true}); //open dialog with some config
 *				VL.dialog.close(); //close current dialog, if dialog.queue.length > 0, popup next dialog
 *				VL.dialog.close({afterClose: fn}); //close dialog with a callback
 */
VL.dialog = {
	/**
	 * @desc		弹出层是否已经初始化
	 * @property	isReady
	 * @type 		{Boolean}
	 */
	isReady: false,
	/**
	 * @desc		弹出层是否显示中
	 * @property	isVisible
	 * @type 		{Boolean}
	 */
	isVisible: false,
	/**
	 * @desc		弹出层是否自动关闭计时中
	 * @property	isTiming
	 * @type 		{Boolean}
	 */
	isTiming: false,  //for autoClose
	/**
	 * @desc		存储setTimeout对象
	 * @property	timer
	 * @type 		{Object}
	 */
	timer: null,
	/**
	 * @desc		弹出层队列
	 * @property	queue
	 * @type 		{Array}
	 */
	queue: [],
	/**
	 * @desc		弹出层的配置列表
	 * @property	cfgArray
	 * @type 		{Array}
	 */
  cfgArray: [],
  /**
	 * @desc		当前弹出层的配置
	 * @property	cfgCurrent
	 * @type 		{Object}
	 */
	cfgCurrent: null,  //temp var
	/**
	 * @desc		弹出层的默认配置
	 * @property	cfgDefault
	 * @type 		{Object}
	 */
	cfgDefault: {
		/**
		 * @desc		弹出层的selector string
		 * @property	s
		 * @type 		{String}
		 */
		s: null,
		/**
		 * @desc		弹出层的jQuery对象
		 * @property	j
		 * @type 		{Object}
		 */
		j: null,
		/**
		 * @desc		配置弹出层是否具有关闭按钮
		 * @property	closeBtn
		 * @type 		{Boolean}
		 */
		closeBtn: true,
		/**
		 * @desc		配置弹出层是否自动关闭
		 * @property	autoClose
		 * @type 		{Boolean}
		 */
		autoClose: false,
		/**
		 * @desc		配置弹出层自动关闭延时
		 * @property	autoCloseDelay
		 * @type 		{Number}
		 */
		autoCloseDelay: 3000
	},
	/**
	 * 将所有cmDialog类的DOM存放在body下面
	 * @desc		弹出层初始化函数
	 * @method		ini
	 */
	ini: function () {
		var jDialog = jQuery('.cmDialog');
		jDialog.appendTo(document.body).addClass('cmDialogReady').removeClass('cmDialog');
		jQuery(window).on('resize, scroll', function () {
			if (!VL.dialog.isVisible) {return}
			clearTimeout(VL.dialog.winResizeTimer);
			VL.dialog.winResizeTimer = setTimeout(function () {
				VL.dialog._pos(VL.dialog.cfgCurrent.j);
			}, 100);
		});
	},
	/**
	 * @desc		弹出指定弹出层
	 * @method		open
	 * @param		{Object, String} arg 传入一个selector字符串或者一个配置对象
	 */
	open: function (arg) {
		if (this._handleCfg(arg)) {
			this._ini();
			this._iniCloseBtn();
			this._setAutoClose();
			this._open(this.cfgCurrent.j);
		}
	},
	/**
	 * @desc		关闭当前的弹出层
	 * @method		close
	 */
	close: function () {
		//if (this.isTiming) {return false; }
		if (this.isTiming) {
			clearTimeout(this.timer);
			this.isTiming = false;
		}
		//var j = jQuery(s);
		this._hide(this.queue.shift());
    this.cfgArray.shift();
		if (this.queue.length === 0) {
			VL.mask.hide();
			this.isVisible = false;
		} else {
      this.cfgCurrent = this.cfgArray[0]
			this._pos(this.queue[0]);
		}
		if (this.cfgCurrent && this.cfgCurrent.afterClose) {
			this.cfgCurrent.afterClose();
		}
		VL.log(this.queue);
	},
	/**
	 * @desc		初始化弹出层关闭按钮
	 * @method		_iniCloseBtn
	 */
	_iniCloseBtn: function () {
		var j = this.cfgCurrent.j;
		if (this.cfgCurrent.closeBtn) {
			if (!j.has('a.close-dialog').length) {
				var jCloseBtn = jQuery('<a class="close-dialog icon" href="#close-dialog"></a>').appendTo(j);
				jCloseBtn.click(function () {
					//alert('close');
					VL.dialog.close(this);
					this.blur();
					return false;
				});
			} else {
				j.find('a.close-dialog').show();
			}
		} else {
			if (j.has('a.close-dialog').length) {
				j.find('a.close-dialog').hide();
			}
		}
	},
	/**
	 * @desc		设置弹出层自动关闭
	 * @method		_setAutoClose
	 */
	_setAutoClose: function () {
		var j = this.cfgCurrent.j;
		if (this.cfgCurrent.autoClose) {
			this.isTiming = true;
			this.timer = setTimeout(function () {
				VL.dialog.isTiming = false;
				clearTimeout(VL.dialog.timer);
				VL.dialog.close(j);
			}, this.cfgCurrent.autoCloseDelay);
		}
	},
	/**
	 * @desc		打开一个弹出层
	 * @method		_open
	 * @param		{Object} j jQuery Object
	 */
	_open: function (j) {
		if (this.queue.length === 0) {
			VL.mask.show();
			this.queue.unshift(j);
			this._pos(j);
		} else {
			this._hide(this.queue[0]);
			this.queue.unshift(j);
			this._pos(j);
		}
		VL.log(this.queue);
	},
	/**
	 * @desc		处理配置信息
	 * @method		_handleCfg
	 * @param		{Object} arg 传入一个selector字符串或者一个配置对象
	 */
	_handleCfg: function (arg) {
		var result;
		var cfg = {};
		this.cfgCurrent = {};
		if (typeof arg === 'string' && arg) {
			cfg.s = arg;
			cfg.j = jQuery(arg);
		} else if (!jQuery.isEmptyObject(arg) && jQuery.isPlainObject(arg) && arg.s) {
			cfg = arg;
			cfg.j = jQuery(arg.s);
		}
		//VL.log(cfg);
		if (!jQuery.isEmptyObject(cfg) && cfg.j.hasClass('cmDialogReady')) {
			this.cfgCurrent = {};
			jQuery.extend(this.cfgCurrent, this.cfgDefault);
			jQuery.extend(this.cfgCurrent, cfg);
			//VL.log(this.cfgCurrent);
			result = true;
		} else {
			result = false;
		}
    this.cfgArray.unshift(this.cfgCurrent)
		return result;
	},
	/**
	 * @desc		重置ready状态
	 * @method		_ini
	 */
	_ini: function () {
		if (!this.isReady) {
			this.isReady = true;
		}
	},
	/**
	 * @desc		隐藏弹出层
	 * @method		_hide
	 * @param		{Object} j jQuery Object
	 */
	_hide: function (j) {
		//var jDialog = j || this.queue[0] || [];
		if (j && j.length) {
			j.closest('.cmDialogReady').stop().css({left:'-999px',top:'-999px'});
		}
		//VL.mask.hide();
	},
	/**
	 * @desc		重定位弹出层
	 * @method		_pos
	 * @param		{Object} j jQuery Object
	 */
	_pos: function (j) {
		var l = (VL.rootElem.clientWidth - j.outerWidth())/2;
		var t = (VL.rootElem.clientHeight * 0.95 - j.outerHeight())/2;
		var dl, dt;
		l = (l < 5) ? 5 : l;
		t = (t < 5) ? 5 : t;
		dl = l + (document.documentElement.scrollLeft || document.body.scrollLeft);
		dt = t + (document.documentElement.scrollTop || document.body.scrollTop);
		j.css({
			left: dl + 'px'
		}).stop().animate({
			top: dt + 'px'
		});
		this.isVisible = true;
	}
};

/**
 * @desc		无关闭按钮的模态弹出层，模拟alert
 * @property	alert
 * @type 		{Object}
 * @example		
 *				VL.alert.open('Some info.');
 *				VL.alert.open({type: 'error', msg: 'Something wrong.'});
 *				VL.alert.open(msg, type, delay);
 *				VL.alert.open('some text', {type: 'error', delay: 500});
 */
VL.alert = {
	/**
	 * @desc		alert层是否已经初始化
	 * @property	isReady
	 * @type 		{Boolean}
	 */
	isReady: false,
	/**
	 * @desc		alert层的当前配置信息
	 * @property	cfgCurrent
	 * @type 		{Object}
	 */
	cfgCurrent: null,
	/**
	 * @desc		alert层的默认配置信息
	 * @property	cfgDefault
	 * @type 		{Object}
	 */
	cfgDefault: {
		type: 'normal',
		msg: 'MsgTxt'
	},
	/**
	 * @desc		alert层的className
	 * @property	className
	 * @type 		{String}
	 */
	className: 'cmDialogReady alert-box',
	/**
	 * 产生alert的DOM结构并存放在body下面
	 * @desc		alert层初始化函数
	 * @method		ini
	 */
	ini: function () {
		if (!this.isReady) {
			var html = [
				'<div class="' + this.className + '">',
					'<div class="alert-box-inner clearfix"><p class="alert-title">提示框</p>',
						'<div class="icon"></div>',
						'<div class="text"></div>',
					'</div>',
				'</div>'
			].join('');
			this.jAlertBox = jQuery(html).appendTo(document.body);
			this.jTxtWrapper = this.jAlertBox.find('.text');
			this.isReady = true;
		} else {
			this.clear();
		}
	},
	/**
	 * @desc		清空alert层的文案以及还原默认type
	 * @method		clear
	 */
	clear: function () {
		this.jAlertBox.attr('class', this.className);
		this.jTxtWrapper.text('');
	},
	/**
	 * @desc		关闭alert层
	 * @method		close
	 */
	close: function () {
		VL.dialog.close(this.jAlertBox.selector);
	},
	/**
	 * @desc		打开alert层
	 * @method		close
	 * @param		{Object, String} args 一个配置对象或者一个字符串
	 */
	open: function (args) {
		this.handleCfg(args);
		if (this.cfgCurrent) {
			this.ini();
			this.jAlertBox.addClass(this.cfgCurrent.type);
			this.jTxtWrapper.html(this.cfgCurrent.msg);
			VL.dialog.open({
				//closeBtn: false,
				autoClose: true,
				autoCloseDelay: this.cfgCurrent.delay || this.getDelay(this.cfgCurrent),
				s: VL.alert.jAlertBox
			});
		}
	},
	/**
	 * @desc		获取不同type下的关闭时间
	 * @method		getDelay
	 * @param		{Object} cfg 一个配置对象
	 */
	getDelay: function (cfg) {
		var result = 8000;
		switch (cfg.type) {
			case 'success':
				result = 3000;
				break;
			case 'error':
				result = 3000;
				break;
			case 'normal':
				result = 8000;
				break;
			case 'delete':
				result = 3000;
				break;
			case 'noClose':
				result = 1000000;
				break;
		}
		return result;
	},
	/**
	 * @desc		处理alert层的配置信息
	 * @method		handleCfg
	 * @param		{Object, String} cfg 一个配置对象或者字符串
	 */
	handleCfg: function (arg) {
		var cfg = {},
			len = arguments.length,
			temp = null;
		this.cfgCurrent = null;
		if (len === 1) {
			temp = arg;
			if (typeof temp === 'string' && temp) {
				cfg.msg = temp;
			} else if (!jQuery.isEmptyObject(temp) && jQuery.isPlainObject(temp)) {
				cfg = temp;
			}
		} else {
			cfg.msg = arg[0];
			temp = arg[1];
			if (typeof temp === 'string' && temp) {
				cfg.type = temp;
			} else if (!jQuery.isEmptyObject(temp) && jQuery.isPlainObject(temp)) {
				jQuery.extend(cfg, temp);
			}
			if (arg[2]) {
				temp = arg[2];
				if (!isNaN(temp)) {
					cfg.delay = parseInt(temp, 10);
				} else if (!jQuery.isEmptyObject(temp) && jQuery.isPlainObject(temp)) {
					jQuery.extend(cfg, temp);
				}
			}
		}
		if (!jQuery.isEmptyObject(cfg)) {
			this.cfgCurrent = {};
			jQuery.extend(this.cfgCurrent, cfg);
		}
	}
};

/**
 * @desc		模拟confirm的弹出层
 * @property	confirm
 * @type 		{Object}
 * @example		
 *				VL.confirm.open('Some info.');
 *				VL.confirm.open('Some info.', callback, args);
 *				VL.confirm.open({msg: 'Some info.', callback: callback});
 */
VL.confirm = {
	isReady: false,
	cfgCurrent: null,
	cfgDefault: {
		okText: '确定',
		cancelText: '取消',
		msg: 'MsgTxt'
	},
	className: 'cmDialogReady confirm-box',
	ini: function () {
		if (!this.isReady) {
			var html = [
				'<div class="' + this.className + '">',
					'<div class="alert-box-inner clearfix"><p class="alert-title">提示框</p>',
						'<div class="text"></div>',
						'<div class="confirm-btn-box"><a class="confirm-ok-btn" href="javascript:;">' + this.cfgCurrent.okText + '</a><a class="confirm-cancel-btn" href="javascript:;">' + this.cfgCurrent.cancelText + '</a></div>',
					'</div>',
				'</div>'
			].join('');
			this.jConfirmBox = jQuery(html).appendTo(document.body);
			this.jTxtWrapper = this.jConfirmBox.find('.text');
			this.okBtn = this.jConfirmBox.find('.confirm-ok-btn');
			this.cancelBtn = this.jConfirmBox.find('.confirm-cancel-btn');
			this.isReady = true;
		} else {
			this.clear();
		}
	},
	_iniBtns: function () {
		if (!this._isIniBtns) {
			this.okBtn.on('click', function () {
				VL.confirm.close();
        if (VL.confirm.cfgCurrent.callback) {
					VL.confirm.cfgCurrent.callback(true);
				}
				return false;
			});
			this.cancelBtn.on('click', function () {
				if (VL.confirm.cfgCurrent.callback) {
					VL.confirm.cfgCurrent.callback(false);
				}
				VL.confirm.close();
				return false;
			});
			this._isIniBtns = true;
		}
	},
	clear: function () {
		this.jConfirmBox.attr('class', this.className);
		this.jTxtWrapper.text('');
	},
	close: function () {
		VL.dialog.close(this.jConfirmBox.selector);
	},
	open: function () {
		this.handleCfg(arguments);
		if (this.cfgCurrent) {
			this.ini();
			this._iniBtns();
			this.jConfirmBox.addClass(this.cfgCurrent.type);
			this.jTxtWrapper.html(this.cfgCurrent.msg);
			VL.dialog.open({
				s: VL.confirm.jConfirmBox
			});
		}
	},
	handleCfg: function (arg) {
		var cfg = {},
			len = arg.length,
			cb = null,
			temp = null;
		this.cfgCurrent = this.cfgDefault;
		if (len === 1) {
			temp = arg[0];
			if (typeof temp === 'string' && temp) {
				cfg.msg = temp;
			} else if (!jQuery.isEmptyObject(temp) && jQuery.isPlainObject(temp)) {
				cfg = temp;
			}
		} else {
			cfg.msg = arg[0];
			cfg.callback = arg[1];
			if (arg[2]) {
				temp = arg[2];
				if (!jQuery.isEmptyObject(temp) && jQuery.isPlainObject(temp)) {
					jQuery.extend(cfg, temp);
				}
			}
		}
		if (!jQuery.isEmptyObject(cfg)) {
			jQuery.extend(this.cfgCurrent, cfg);
		}
	}
};

//loading
//VL.loading.show();
//VL.loading.hide();
VL.loading = {
	isReady: false,
	isVisible: false,
	jSelect: [],
	ini: function () {
		if (!this.isReady) {
			this.jLoading = jQuery('<div class="cmLoading"><p></p></div>').appendTo(document.body);
			jQuery(window).resize(function (){
				if (VL.loading.isVisible) {
					VL.loading._pos();
				}
			});
			this.isReady = true;
		}
	},
	_pos: function () {
		var l = (VL.rootElem.clientWidth - this.jLoading.outerWidth())/2;
		var t = (VL.rootElem.clientHeight * 0.95 - this.jLoading.outerHeight())/2;
		l = (l < 0) ? 0 : l;
		t = (t < 0) ? 0 : t;
		this.jLoading.css({
			left: l + (document.documentElement.scrollLeft || document.body.scrollLeft) + 'px',
			top: t + (document.documentElement.scrollTop || document.body.scrollTop) + 'px'
		});
	},
	show: function (t) {
		var text = '';
		if (this.isVisible) {return false; }
		VL.mask.show();
		this.ini();
		this._hideSelect();
		this._pos();
		text = t ? t : '页面正在努力加载中...';
		text = text === 'none' ? '' : text;
		this.jLoading.find('p').text(text);
		this.isVisible = true;
	},
	hide: function () {
		if (!this.isVisible) {return false; }
		VL.mask.hide();
		this.jLoading.css({left:'-999px',top:'-999px'});
		this._showSelect();
		this.isVisible = false;
	},
	_hideSelect: function () {
		if (VL.ua.isIE6) {
			this.jSelect = jQuery('select');
			this.jSelect.css('visibility', 'hidden');
		}
	},
	_showSelect: function () {
		if (VL.ua.isIE6) {
			this.jSelect.css('visibility', 'visible');
		}
	}
};

//placeholder
//VL.placeholder.ini();
//VL.placeholder.hide(s|e|j);  //to avoid submit placeholder as data
//VL.placeholder.show(s|e|j);  //show placeholder manually
VL.placeholder = {
	ini: function () {
		var jInput = jQuery('input:text.cmPlaceholder, textarea.cmPlaceholder');
		jInput.each(function () {
			var sTitle = this.title;
			if (sTitle) {
				var jThis = jQuery(this);
				jThis.data('placeholderTxt', sTitle).removeAttr('title');
				if (!this.value || this.value === jThis.data('placeholderTxt')) {  //handle autocomplete and multiple ini.
					this.value = sTitle;
					jThis.addClass('cmPlaceholderBlur');
				}
				VL.placeholder._bind(this);
			}
		});
	},
	_bind: function (e) {
		jQuery(e).focus(function () {
			var jThis = jQuery(this);
			if (this.value === jThis.data('placeholderTxt')) {
				this.value = '';
				jThis.removeClass('cmPlaceholderBlur');
			}
		}).blur(function () {
			var jThis = jQuery(this);
			//VL.log('blur: ' + this.value);
			//VL.log('blur: ' + jThis.data('placeholderTxt'));
			if (!this.value) {
				this.value = jThis.data('placeholderTxt');
				jThis.addClass('cmPlaceholderBlur');
			}
		});
	},
	hide: function (s) {
		var j = s ? jQuery(s) : [];
		if (j.length) {
			var jInput = j.hasClass('cmPlaceholder') ? j : j.find('.cmPlaceholder');
			jInput.each(function () {
				jQuery(this).triggerHandler('focus');
			});
		}
	},
	show: function (s) {
		var j = s ? jQuery(s) : [];
		if (j.length) {
			var jInput = j.hasClass('cmPlaceholder') ? j : j.find('.cmPlaceholder');
			jInput.each(function () {
				jQuery(this).triggerHandler('blur');
			});
		}
	},
	updateTxt: function (s, sTxt) {
		var j = s ? jQuery(s) : [];
		if (j.length && typeof sTxt === 'string') {
			var jInput = j.hasClass('cmPlaceholder') ? j : j.find('.cmPlaceholder');
			jInput.each(function () {
				var jItem = jQuery(this);
				var sOldTxt = jItem.data('placeholderTxt');
				jItem.data('placeholderTxt', sTxt);
				if (this.value === sOldTxt) {
					this.value = sTxt;
				}
			});
		}
	}
};

//blurLink
//VL.blurLink.ini();
VL.blurLink = {
	ini: function () {
		this._bind();
	},
	_bind: function () {
		jQuery(document).on('click', 'a[href]' ,function () {
			this.blur();
		});
	}
};

//scrollTo
VL.scrollTo = function (s, fn) {
	if (s && typeof s === 'string') {
		var j = jQuery(s);
		if (j.length) {
			var top = j.offset().top;
			//VL.log('scrollTo: ' + top);
			var duration = 300;
			jQuery(VL.rootScrollingElem).animate({
				scrollTop: top
			}, duration, 'swing', fn);
		}
	}
};

//Carousel
VL.Carousel = function (container, args) {
  this.content = container;
  this.items = container.children();
  this.params = {
    type: "h",
    unit: 1,
    speed: "slow",
    position: 0,
    autoPlay: false,
    intervalTime: 8000,
    offset: 0
  };
  if (args) {
    $.extend(this.params, args);
  }
  this.ini();
  this.content.data('carousel', this);
};

VL.Carousel.prototype = {
  move: function() {
    var that = this, css = {};
    css[this.params.cssName] = '-' + this.params.position + 'px';
    this.content.stop().animate(css, this.params.speed, function() {
      that.complete();
    });
  },
  stepToggle: function (idx) {
    this.steps.removeClass('current').eq(idx).addClass('current');
    this.currentStep = idx;
  },
  refresh: function (args) {
    var conWidth,
      conHeight;
    jQuery.extend(this.params, args);
    this.items = this.content.children();
    this.currentStep = 0;
    if (this.params.type === "h") {
      this.wrap.css({
		width: this.content.width(),
        height: this.content.height()
      });
      this.wrap.find('.carousel-content').css({
		width: this.content.width(),
        height: this.content.height()
      });
      conWidth = this.items.outerWidth(true) * this.items.length + "px";
      conHeight = "100%";
    } else {
      this.wrap.css({
        width: this.content.width(),
		height: this.content.height()
      });
      this.wrap.find('.carousel-content').css({
        width: this.content.width(),
		height: this.content.height()
      });
      conWidth = "100%";
      conHeight = this.items.outerHeight(true) * this.items.length + "px";
    }
    this.content.css({
      width: conWidth,
      height: conHeight
    });
    this.config();
    var steps = '',
      i = 0,
      items = this.items,
      l = this.params.unit > 0 ? Math.ceil(this.params.scope / this.params.moveUnit + 1) : Math.ceil(this.items.outerWidth(true) * this.items.length / this.canvas.width());
    steps += '<span class="steps">';
    for (i; i < l; i++) {
      steps += '<span data-step="' + i + '" class="step">' + (i + 1) + '</span>';
    }
    steps += '</span>';
    this.wrap.find('.steps').remove();
    this.controlPrev.after(steps);
    this.steps = this.wrap.find(".carousel-control .step");
    this.reset();
  },
  resize: function () {
    var conWidth,
      conHeight;
    this.items = this.content.children();
    if (this.params.type === "h") {
      this.wrap.css({
        width: this.content.width(),
        height: this.content.height()
      });
      this.wrap.find('.carousel-content').css({
        width: this.content.width(),
        height: this.content.height()
      });
      conWidth = this.items.outerWidth(true) * this.items.length + "px";
      conHeight = "100%";
    } else {
      this.wrap.css({
        width: this.content.width(),
        height: this.content.height()
      });
      this.wrap.find('.carousel-content').css({
        width: this.content.width(),
        height: this.content.height()
      });
      conWidth = "100%";
      conHeight = this.items.outerHeight(true) * this.items.length + "px";
    }
    this.content.css({
      width: conWidth,
      height: conHeight
    });
    this.config();
    this.moveTo(this.currentStep);
  },
  moveTo: function (idx) {
    if (idx < 0) {return}
    idx = parseInt(idx, 10);
    var target = idx * this.params.moveUnit - this.params.offset;
    this.params.position = target < this.params.scope ? target : (this.params.scope > 0 ? this.params.scope : 0);
    //this.params.position = target > 0 ? target : 0;
    var that = this, css = {};
    css[this.params.cssName] = (-1 * this.params.position) + 'px';
    this.content.stop().animate(css, this.params.speed, function() {
      that.complete();
    });
    this.stepToggle(idx);
    this._autoPlay();
  },
  complete: function() {
    if (this.params.position === this.params.scope) {
      this.controlNext.addClass("not");
    } else {
      this.controlNext.removeClass("not");
    }
    if (this.params.position === -1 * this.params.offset) {
      this.controlPrev.addClass("not");
    } else {
      this.controlPrev.removeClass("not");
    }
    if (this.items.outerWidth(true) * this.items.length < this.canvas.width() && !this.params.offset) {
      this.controlNext.addClass("not");
      this.controlPrev.addClass("not");
      this.wrap.addClass('not-work');
    } else {
      this.wrap.removeClass('not-work');
    }
    this.status = false;
    if (this.params.onScrollEnd) {
      this.params.onScrollEnd.call(this);
    }
  },
  next: function() {
    if (this.status || this.params.position === this.params.scope) {return;}
    this.status = true;
    /*var target = this.params.position + this.params.moveUnit;
    this.params.position = target < this.params.scope ? target : this.params.scope;
    this.move();
    this.stepToggle(this.currentStep + 1);*/
    this.moveTo(this.currentStep + 1);
    this._autoPlay();
  },
  prev: function() {
    if (this.status || this.params.position === this.offset) {return; }
    this.status = true;
    /*var target = (this.currentStep - 1) * this.params.moveUnit;
    this.params.position = target > 0 ? target : 0;
    this.move();
    this.stepToggle(this.currentStep - 1);*/
    this.moveTo(this.currentStep - 1);
    this._autoPlay();
  },
  reset: function() {
    this.content.stop().css({
      top: this.params.type === "v" ? this.params.offset : 0,
      left: this.params.type === "h" ? this.params.offset : 0
    });
    this.params.position = 0;
    this.complete();
    this.stepToggle(0);
  },
  to: function (idx) {
	if (idx < 0) {return}
    idx = parseInt(idx, 10);
    var target = idx * this.params.moveUnit - this.params.offset;
    this.params.position = target < this.params.scope ? target : this.params.scope;
    //this.params.position = target > 0 ? target : 0;
    var that = this, css = {};
    css[this.params.cssName] = (-1 * this.params.position) + 'px';
    this.content.css(css);
	that.complete();
    this.stepToggle(idx);
    this._autoPlay();
  },
  bind: function() {
    var that = this;
    this.controlNext.click(function() {
      if ($(this).hasClass('not')) {return}
      that.next();
    });
    this.controlPrev.click(function() {
      if ($(this).hasClass('not')) {return}
      that.prev();
    });
    this.wrap.on('click', '.step', function () {
      var s = jQuery(this),
        idx = s.data('step');
      that.moveTo(idx);
    });
  },
  create: function() {
    var conWidth,
      conHeight,
      html = [
        "<div class='carousel-wrap' style='width:" + this.content.width() + "px;height:" + this.content.height() + "px;'>",
          "<div class='carousel-content' style='position:relative;width:" + this.content.width() + "px;height:" + this.content.height() + "px;'></div>",
          "<div class='carousel-control'>",
            "<span class='prev not'><span class='prev-s'></span></span>",
            "<span class='next'><span class='next-s'></span></span>",
          "</div>",
        "</div>"
      ].join('');
    
    if (this.params.type === "h") {
      conWidth = this.items.outerWidth(true) * this.items.length + "px";
      conHeight = "100%";
    } else {
      conWidth = "100%";
      conHeight = this.items.outerHeight(true) * this.items.length + "px";
    }
    this.content.wrap(html).css({
      position: "absolute",
      top: this.params.type === "v" ? this.params.offset : 0,
      left: this.params.type === "h" ? this.params.offset : 0,
      width: conWidth,
      height: conHeight,
      overflow: "visible"
    });
    this.wrap = this.content.parents(".carousel-wrap");
    this.canvas = this.content.parent();
    this.controlNext = this.wrap.find(".carousel-control .next");
    this.controlPrev = this.wrap.find(".carousel-control .prev");
    this.config();
    var steps = '',
      i = 0,
      items = this.items,
      l = this.params.unit > 0 ? Math.ceil(this.params.scope / this.params.moveUnit + 1) : Math.ceil(this.items.outerWidth(true) * this.items.length / this.canvas.width());
    steps += '<span class="steps">';
    for (i; i < l; i++) {
      steps += '<span data-step="' + i + '" class="step">' + (i + 1) + '</span>';
    }
    steps += '</span>';
    this.controlPrev.after(steps);
    this.steps = this.wrap.find(".carousel-control .step");
    this.steps.eq(0).addClass('current');
    this.currentStep = 0;
  },
  config: function() {
    if (this.params.type === "h") {
      this.params.cssName = "left";
      this.params.scope = this.params.offset + this.content.width() - this.canvas.width();
      this.params.moveUnit = this.params.unit > 0 ? this.items.outerWidth(true) * this.params.unit : this.canvas.width();
    } else {
      this.params.cssName = "top";
      this.params.scope = this.params.offset + this.content.height() - this.canvas.height();
      this.params.moveUnit = this.params.unit > 0 ? this.items.outerHeight() * this.params.unit : this.canvas.height();
    }
    
  },
  _autoPlay: function () {
    if (this.params.autoPlay) {
      if (this.timer) {clearTimeout(this.timer)}
      var that = this;
      this.timer = setTimeout(function () {
        that.moveTo(that.currentStep + 1 >= that.steps.length ? 0 : (that.currentStep + 1));
        that._autoPlay();
      }, this.params.intervalTime);
    }
  },
  ini: function() {
    /*if (this.params.type === "h") {
      if (this.content.width() >= this.items.outerWidth(true) * this.items.length) {return; }
    } else {
      if (this.content.height() >= this.items.outerHeight() * this.items.length) {return; }
    }*/
    this.create();
    this.bind();
    this.complete();
    this._autoPlay();
  }
};

VL.niceSelect = function (select, cfg) {
  this.select = jQuery(select);
  this.cfg = {
    noArr: false,
    placeholder: '请选择'
  };
  this.extend(cfg);
  this.ini();
};
VL.niceSelect.prototype = {
  extend: function (cfg) {
    cfg = cfg || {};
    this.cfg = jQuery.extend(this.cfg, cfg);
  },
  createHtml: function () {
    var html = 
        '<div class="select-box">' +
          '<span class="show-text"></span><a class="arr"><b></b></a>' +
        '</div>' +
        '<ul class="option-list"></ul>',
      select = this.select;
    this.wrapper = jQuery('<div class="cmNiceSelect"></div>');
    select.after(this.wrapper);
    select.hide();
    
    this.wrapper.html(html);
    this.selectBox = this.wrapper.find('.select-box');
    this.showText = this.selectBox.find('.show-text');
    this.arr = this.selectBox.find('.arr');
    this.optionList = this.wrapper.find('.option-list');
    
    this.setList();
  },
  setList: function () {
    var select = this.select,
      option = select.find('option'),
      l = option.length,
      i = 0,
      temp = null,
      html = '';
    
    for (i; i < l; i++) {
      temp = option.eq(i);
      html += '<li data-value="' + (temp.attr('value') || '') + '">' + temp.html() + '</li>';
    }
    this.optionList.html(html);
    this.lists = this.optionList.find('li');
    this._iniValue();
  },
  _iniValue: function () {
    var select = this.select;
    if (select.attr('placeholder') || this.cfg.placeholder) {
      this.showText.addClass('place-holder').html(select.attr('placeholder') || this.cfg.placeholder);
      select.val('').trigger('change');
      return
    }
    if (this.select.val() !== '') {
      this.handleSelectEvent(this.lists.filter('[data-value="' + this.select.val() + '"]'));
    }
  },
  handleCfg: function () {
    var cfg = this.cfg;
    if (cfg.placeholder && this.showText.html() === '') {
      this.showText.addClass('place-holder').html(cfg.placeholder);
    }
    if (cfg.noArr) {
      this.arr.hide();
    }
    if (cfg.afterIni) {
      cfg.afterIni.call(this);
    }
  },
  update: function () {
    this.setList();
  },
  toggleList: function () {
    var optionList = this.optionList;
    if (optionList.hasClass('on')) {
      optionList.removeClass('on');
      this.wrapper.removeClass('on');
    } else {
      //show up or down
      if (this.wrapper.offset().top + this.optionList.height() + this.wrapper.height() >= $(window).scrollTop() + $(window).height()) {
        this.wrapper.addClass('up');
      } else {
        this.wrapper.removeClass('up');
      }
      optionList.addClass('on');
      this.wrapper.addClass('on');
    }
  },
  hideList: function () {
    this.optionList.removeClass('on');
    this.selectBox.removeClass('on');
  },
  handleSelectEvent: function (jEle) {
    this.showText.removeClass('place-holder').html(jEle.html());
    this.select.val(jEle.attr('data-value')).trigger('change');
    this.hideList();
    if (this.cfg.afterSelect) {
      this.cfg.afterSelect.call(this, jEle);
    }
  },
  bind: function () {
    var that = this;
    this.selectBox.on('click', function () {
      that.toggleList();
    });
    this.optionList.on('click', 'li', function () {
      that.handleSelectEvent(jQuery(this));
    });
    jQuery(document).on('click', function (e) {
      if (!jQuery(e.target).parents('.cmNiceSelect')[0]) {
        //that.toggleList();
        that.hideList();
      }
    });
  },
  ini: function () {
    this.createHtml();
    this.handleCfg();
    this.bind();
  }
};

/**
 * VL.UnlimitScroller
 */
VL.UnlimitScroller = function (obj, args) {
  this.box = $(obj);
  this.items = obj.children();
  this.handleCfg(args || {});
  this.ini();
};

VL.UnlimitScroller.prototype = {
  handleCfg: function (args) {
    this.cfg = this.cfg || {
      offset: 0,
      idx: 0,
      autoPlay: false,
      intervalTime: 3000,
      animateTime: 300
    };
    
    $.extend(this.cfg, args);
  },
  create: function () {
    var html = [
      "<div class='carousel-wrap'>",
        "<div class='carousel-content' style='position:relative;'></div>",
        "<div class='carousel-control'>",
          "<span class='prev'><span class='prev-s'></span></span>",
          "<span class='next'><span class='next-s'></span></span>",
        "</div>",
      "</div>"
    ].join('');
    this.box.wrap(html);
    this.wrap = this.box.parents('.carousel-wrap');
    this.content = this.wrap.find('.carousel-content');
    this.controlNext = this.wrap.find('.next');
    this.controlPrev = this.wrap.find('.prev');
    
    if (this.items.length > 1) {
	  this.createSteps();
      this.box.append(this.items.clone());
      this.time = 2;
      if (this.items.length === 2 && this.cfg.offset !== 0) {
        this.box.append(this.items.clone());
        this.time = 3;
      }
      this.items = this.box.children();
      this.itemWidth = this.items.outerWidth(true);
      this.box.width(this.itemWidth * this.items.length);
      this.boxWidth = this.box.width() / this.time;
      this.box.css({
        left: -1 * this.boxWidth + this.cfg.offset
      });
      this.moveTo(this.cfg.idx);
      this.content.height(this.box.height());
    } else {
      this.wrap.addClass('no-effect');
	  this.disable = true;
    }
  },
  createSteps: function () {
	var i = 0,
		l = this.items.length,
		html = '<ol class="steps">',
		that = this;
	for (i; i < l; i++) {
		html += '<li class="step" data-step="' + i + '">' + i + '</li>';
	}
	html += '</ol>';
	this.wrap.find('.carousel-control').append(html);
	this.steps = this.wrap.find('.steps');
	this.steps.on('click', 'li', function () {
		that.moveTo(parseInt($(this).data('step'), 10) + that.items.length / 2);
	});
	this.currentIdx = 0;
  },
  moveTo: function (idx, isNoAnimate) {
	if (this.disable) {return}
	idx = parseInt(idx, 10);
    var l = this.items.length;
	if (l === 0) {return}
	var li =this.steps.find('li');
	li.removeClass('current').eq(idx % li.length).addClass('current');

    if (idx === 0) {
      idx = l / this.time + idx;
      this.box.css({
        left: -1 * (idx + 1) * this.itemWidth + this.cfg.offset
      });
    } else if (idx === l - 1) {
      idx = idx - l / this.time;
      this.box.css({
        left: -1 * (idx - 1) * this.itemWidth + this.cfg.offset
      });
    }
	
    if (isNoAnimate) {
		this.box.stop().css({
			left: -1 * idx * this.itemWidth + this.cfg.offset
		})
	} else {
		this.box.stop().animate({
		  left: -1 * idx * this.itemWidth + this.cfg.offset
		}, this.cfg.animateTime);
	}
	this.stepToggle(idx);
	this._autoPlay();
  },
  stepToggle: function (idx) {
    this.steps.removeClass('current').eq(idx).addClass('current');
    this.currentIdx = idx;
  },
  toNext: function () {
    this.moveTo(this.currentIdx + 1);
  },
  toPrev: function () {
    this.moveTo(this.currentIdx - 1);
  },
  to: function (idx) {
	idx = parseInt(idx, 10);
	idx = (idx >= this.items.length / 2) ? idx : (idx  + this.items.length / 2);
	this.moveTo(idx, 1);
  },
  _autoPlay: function () {
    if (this.cfg.autoPlay) {
      if (this.timer) {clearTimeout(this.timer)}
      var that = this;
      this.timer = setTimeout(function () {
        that.moveTo(that.currentIdx + 1);
        that._autoPlay();
      }, this.cfg.intervalTime);
    }
  },
  refresh: function (args) {
    this.handleCfg(args || {});
    this.wrap.removeClass('no-effect');
	this.disable = false;
    if (this.items.length > 1) {
	  this.items = this.box.children().slice(0, this.box.children().length / 2);
	  var copy = this.items.clone();
	  this.box.html('').append(copy);
	  this.steps.remove();
	  this.createSteps();
      this.box.append(copy.clone());
      this.time = 2;
      if (this.items.length === 2 && this.cfg.offset !== 0) {
        this.box.append(copy.clone());
        this.time = 3;
      }
      this.items = this.box.children();
      this.itemWidth = this.items.outerWidth(true);
      this.box.width(this.itemWidth * this.items.length);
      this.boxWidth = this.box.width() / this.time;
      this.box.css({
        left: -1 * this.boxWidth + this.cfg.offset
      });
      this.moveTo(this.cfg.idx);
      this.content.height(this.box.height());
    } else {
      this.wrap.addClass('no-effect');
	  this.disable = true;
    }
  },
  bind: function () {
    var that = this;
  
    this.controlNext.on('click', function () {
      that.toNext();
      return false;
    });
    
    this.controlPrev.on('click', function () {
      that.toPrev();
      return false;
    });
  },
  ini: function () {
    this.create();
    this.bind();
	this._autoPlay();
  }
};

/**
 * VL.Template
 */
VL.Template = function (args) {
	return this._init(args);
};

VL.Template.prototype = {
	 /**
	 * 缺省配置
	 * @property defaults
	 * @type {Object}
	 * @default {
	 * 	templateElement : null,
	 *	callback : null,
	 *	replace : false
	 * }
	 */
	defaults: {
		templateElement : null,
		callback : null,
		replace : false
	},
	template: null,
	clTemp: '',
	/**
	 * 初始化
	 * @method _init
	 * @param {Object} option 自定义配置
	 * @chiainable
	 */
	_init: function(option) {
		var that = this,
			options,
			target;

		//合并配置选项,并注册到options
		options = that.options =  $.extend({}, this.defaults, option);

		if ($.type(options.templateElement) === 'object') {
			if ($(options.templateElement).length) {
				that.template = $(options.templateElement).html();
			}
			else {
				VL.log('缺少目标template', options);
				that.template = '';
				return false;
			}
		}
		else {
			that.template = options.templateElement;
		}

		return this;
	},
	/*
	 * 按特定标签切割模板
	 * @method
	 * @param {template String} block 模板片断
	 * @param {tag String} tag HTML元素标签
	 * @returns {Object} Object
	 */
	_CutTemplate: function (block, tag) {
		var start = block.indexOf('{#'+ tag + '}') + 3 + tag.length;
		var end = block.indexOf('{#/'+ tag + '}', start);
		
		if (end != -1) {
			var tt = block.slice(start, end);
			block = block.substr(0, start - 3 - tag.length)  + "{#"+ tag +"}" + block.substr(end + 4 + tag.length);
		}
		else {
			var tt = '';
		}

		return {
			"block" : block,
			"section" : tt
		};
	},
	/*
	 * 按表格渲染
	 * @method
	 * @param {template String} block 模板片断
	 * @param {tag String} tag table元素标签
	 * @param {json Object} lists 用于渲染模板的JSON数据
	 * @returns {String} Table Format String
	 */
	_Table: function (block, tag, lists) {
		var that = this,
			blocks = [],
			block = that._CutTemplate.call(this, block, tag);

		for (var i = 0, len = lists.length; i < len; i++) {
			blocks.push(that._Replace(block['section'], lists[i]) );
		}
		return block['block'].replace("{#"+ tag +"}", blocks.join(''));
	},
	/*
	 * 按表单渲染
	 * @method
	 * @param {template String} block 模板片断
	 * @param {tag String} tag Form元素标签
	 * @param {json Object} form 用于渲染模板的JSON数据
	 * @returns {String} Form Format String
	 */
	_Form: function (block, tag, form) {
		var vv = this._CutTemplate.call(this.options.node, block, tag);
		return vv['block'].replace("{#"+ tag +"}", this._Replace(vv['section'], form));
	},
	/*
	 * 普通渲染
	 * @method
	 * @param {template String} block 模板片断
	 * @param {json Object} json 用于渲染模板的JSON数据
	 * @returns {String} template Object
	 */
	_Replace: function (block, json) {
		var that = this,
			options = that.options,
			element;

		for (element in json) {
			if (typeof json[element] == 'object') {
				//复合节点
				if ( $.isArray(json[element]) ) {
					block = that._Table.call(this, block, element, json[element]);
				} else {
					block = that._Form.call(this, block, element, json[element]);
				}
			}
			else {
				//普通节点
				var reg = RegExp('{\\$' + element + '}', 'g');
				block = block.replace(reg, json[element]); 
				//block = block.replace(eval("/{\\$" + element + "}/g"), json[element]);
				//delete json[element];
			}
		}
		return block;
	},
	/**
	 * 执行模版处理方法
	 * <pre>如果节点是数组形式，则按table方式处理；如是对象形式，则按form方式处理。最外层亦同样以form方式处理
	 * @method process
	 * @param {Object} json 用于渲染模板的JSON数据
	 * @returns {String} HTML String
	 */
	process : function (json) {
		var that = this,
			options = that.options,
			node = $(options.node),
			clTemp = that.template;
		
		clTemp = that._Replace(clTemp, json);

		if (options.callback != null) {
			clTemp = options.callback(clTemp, json);
		}

		if (options.replace === true) {
			node.html(clTemp);
		}
		else if (options.replace === false) {
			node.append(clTemp);
		}
		else {
			return clTemp;
		}
	}
}

/**
 * VL.shareToSNS
 */
VL.shareToSNS = {
	iniStatus: false,
	setUrls: function() {
		if (this.isSetedUrls) { return; }
		var title = encodeURIComponent(this.title);
		var url = encodeURIComponent(this.url);
		var pic = encodeURIComponent(this.pic);
		this.urls = {
			douban: "http://www.douban.com/share/service?bm=1&image=" + pic + "&href=" + url + "&updated=&name=" + title,
			weibo: "http://v.t.sina.com.cn/share/share.php?url=" + url + "&title=" + title + "&pic=" + pic + "&appkey=",
			tengxun: "http://share.v.t.qq.com/index.php?c=share&a=index&url=" + url + "&appkey=appkey&site=&pic=" + pic + "&title=" + title
		};
		this.isSetedUrls = true;
	},
	open: function(name) {
		this.setUrls();
		var t = (window.screen.height - 540) / 2,
			l = (window.screen.width - 640) / 2;
		if (this.urls[name]) {
			window.open(this.urls[name], 'shareWindow', 'height=540,width=640,top=' + t + ',left=' + l);
		}
	},
	bind: function() {
		var that = this;
		this.btns.click(function() {
      var s = jQuery(this);
      s.attr('href', '#');
			that.open(s.data('share'));
		});
	},
	ini: function(btns, args) {
		args = args || {};
		this.btns = btns;
		this.title = args.title;
		this.url = args.url;
		this.pic = args.pic;
		if (!this.iniStatus) {
			this.bind();
			this.iniStatus = true;
		}
	}
};

/**
 * VL.resizeHandler
 */
VL.resizeHandler = function (args) {
  if (Object.prototype.toString.call(args).toLowerCase() !== '[object array]') {return}
  
  //less thah width, return 1
  var handleSize = function (w, cla) {
    var result = 0;
    if ($(window).width() <= w) {
      $('body').addClass(cla);
      result = 1;
    } else {
      $('body').removeClass(cla);
      result = 0;
    }
    return result;
  };
  
  var i = 0,
      l = args.length,
      temp = null;
  for (i; i < l; i++) {
    temp = args[i];
    (function (temp) {
      var currentSize = handleSize(temp.size, temp.cla);
      $(window).on('resize', function () {
        var d = handleSize(temp.size, temp.cla);
        if (currentSize !== d) {
          currentSize = d;
          if (temp.onChange) {temp.onChange(d)}
        }
      });
    }(temp));
  }
};
 
 
/* VIPLUX header*/
VL.header = {
	get: function () {
		this.jWelcome = $('.header .welcome');
		this.items = $('.header .nav-item, .header .customer-banner li');
	},
	ddlIni: function () {
		var jDdl = $('.header').find('.cols'),
        i = 0,
        s = null,
        li = null,
        l = 0,
        col = 0;
    jDdl.each(function (i, o) {
      s = $(o);
      li = s.find('li');
      l = li.length;
			col = Math.ceil(l / 10);
      s.addClass('col' + col);
      
      for (i; i < col; i++ ) {
        $('<div class="one-col"></div>').appendTo(s).append(li.slice(i * 10, (i + 1)* 10));
      }
    });
	},
	hover: function (jObj) {
		this.items.removeClass('hover');
    if (!jObj.hasClass('mini-basket')) {
      jObj.addClass('hover');
    }
		//show dropdown list
		if (jObj.find('.ddl')[0]) {
			jObj.find('.ddl').stop().slideDown(200);
		}
	},
	out: function () {
		this.items.removeClass('hover').find('.ddl').stop().slideUp(200);
	},
  bind: function () {
		var that = this;
		this.items.hover(function () {
			var jObj = $(this);
			that.timer = setTimeout(function () {
				VL.header.hover(jObj);
			}, 300);
		}, function () {
			clearTimeout(that.timer || '');
			that.out();
		});
		
		this.jWelcome.on('click', '.login-btn', function () {
			that.login();
		});
		
		this.jWelcome.on('click', '.login-out', function () {
			that.logout();
		});
		
		$('.mini-basket .cart-num').parent().on('click', function () {
			var text = $(this).find('.cart-num').text();
			if (text === '') {return false;}
			var num = '';
			num = text.slice(1);
			num = num.slice(0, num.length - 1);
      if (!VL.isLogin) {
        $('.login-btn').trigger('click');
        return false;
      }
			if (parseInt(num, 10) <= 0) {
				return false;
			}
		});
	
  },
	login: function () {
		var that = this;
		$.ajax({
			url: (window.ready ? ready.srcDir : '') + '/js/messenger.js',
			dataType: 'script',
			cache: true,
      success: function () {
        that.openLoginDialog();
      },
      error: function () {
        VL.log('load messenger.js failed.');
      }
		});
	},
	loginSuccess: function(args) {
		var data = typeof args === 'string' ? $.parseJSON(args).data : args,
			cookies = data.cookies,
			key = '';
		for (key in cookies) {
			if (key === 'username') {
        ready.username = cookies[key];
			}
		}
		VL.isLogin = true;
		ready.isLogin = true;
    this.handleWelcome();
		this.getCart();
		VL.dialog.close();
    
    var reg = /brand_id/ig;
    if (reg.test(location.href)) {
			window.location.reload();
		}
    reg = /category\/list/ig;
    if (reg.test(location.href)) {
			window.location.reload();
		}
    
    if (VL.product) {
      window.location.reload();
    }
	},
	noAccountHandler: function () {
		location.href = '/#no-account-link';
	},
	handleWelcome: function () {
		var name = ready.username || '';
      //VL.cookie.get('username'),
			//ssid = VL.cookie.get('PASSPORTSSID'),
			//frontend = VL.cookie.get('frontend');
		name = name.length > 11 ? name.substr(0, 11) + '...' : name;
		if (/*ssid !== '' && frontend !== '' && */ready.isLogin) {
			this.jWelcome.find('.login-btn').hide();
			this.jWelcome.find('.account-info').show().find('.username').html(name);
		} else {
			this.jWelcome.find('.login-btn').show().find('.username').html(name);
			this.jWelcome.find('.account-info').hide().find('.username').html('');
		}
	},
	handleHighlight: function () {
		var jNavItems = $('.nav-item');
		if (VL.home) {
			jNavItems.eq(0).find('a').eq(0).css('font-weight', 'bold');
		} else if (VL.url.getParam('brand_id') !== '' && VL.url.path === '/brand/index') {
			jNavItems.eq(1).find('a').eq(0).css('font-weight', 'bold');
		} else if (VL.url.getParam('view') === 'client') {
			jNavItems.eq(2).find('a').eq(0).css('font-weight', 'bold');
		}
	},
	logout: function () {    
    var that = this;
    
    $.ajax({
      url: 'http://shop.viplux.com/vipluxcustomer/account/logout',
      dataType: "jsonp",
      type: 'get',
      async: false
    }).then(function(data) {
      if (data.code === 0) {
        that.logoutSuccess();
      } else {
        VL.alert.open('退出失败');
      }
    });
	},
  logoutSuccess: function () {
     //account center
		var reg = /member/ig;
		var url = location.href;
		if (reg.test(url)) {
			window.location.href = '/';
		}
    
    //cart
    reg = /checkout\/cart/ig;
		var url = location.href;
		if (reg.test(url)) {
			window.location.href = '/';
		}
    
    //brand page
    reg = /brand_id/ig;
    if (reg.test(url)) {
			window.location.reload();
		}
    reg = /category\/list/ig;
    if (reg.test(location.href)) {
			window.location.reload();
		}
    
    //product page
    if (VL.product) {
      window.location.reload();
    }
    
		this.getCart(0);
		VL.isLogin = false;
		ready.isLogin = false;
    //$('#logout-iframe').remove();
		this.handleWelcome();
  },
  loopCheckLogin: function () {
    var that = this;
    $.ajax({
      url: 'http://shop.viplux.com/vipluxcustomer/account/isLogin',
      dataType: 'jsonp',
      type: 'get',
      async: false
    }).then(function(data) {
      if (data.code === 0 && data.data.islogin) {
        that.loginSuccess(data.data);
      } else {
        if (that.isLoginIframePopup) {
          that.loopLogin = setTimeout(function () {
            that.loopCheckLogin();
          }, 2000);
        }
      }
    });
  },
	getCart: function (num) {
		if (num !== 0 && VL.isLogin) {//if login, get minibasket
			$.ajax({
				url: window.ready ? ready.ajaxurl.shopbag : '',
				dataType: "jsonp",
				type: 'get',
				async: false
			}).then(function(data) {
				if (data.code === 0) {
					var jNum = $('.header .cart-num'),
						num = data.data.items_count || 0,
						basket = $('.mini-basket'),
						html = '';
					if (num === 0) {
						jNum.html('0').hide();
						basket.find('.ddl').remove();
					} else {
						html = new VL.Template({
							templateElement: $('#nav_shopping_tmp'),
							replace: 0
						}).process(data.data);
						jNum.html(num).show();
						if (basket.find('.ddl')[0]) {
							basket.find('.ddl').html(html);
						} else {
							basket.append($('<div class="ddl"></div>').addClass('cart-ddl').append(html));
						}
					}
				} else {
					VL.log(data.message);
					//VL.alert.open(data.message);
				}
			});
		} else {// clear cart
			var jNum = $('.header .cart-num'),
          basket = $('.mini-basket');
			jNum.html('0').hide();
			basket.find('.ddl').remove();
			basket.unbind('click');
		}
	},
	closeDialog: function () {
		VL.dialog.close();
	},
	openLoginDialog: function () {
		var that = this;
    this.isLoginIframePopup = true;
    $('.login-frame').find('iframe').remove();
    $('.login-frame').append('<iframe src="' + (window.ready ? ready.loginUrl : '404') + '" frameborder="0" width="418" height="346"></iframe>');
    if (window.Messenger && 'postMessage' in window) {
      VL.dialog.open({
        s: '.login-frame'
      });
      var messenger = new Messenger('loginDialog', 'parent');
      messenger.listen(function(msg) {
        var queryObj = VL.url.queryStringToJSON(msg);
        var method = queryObj['method'];
        var args = queryObj.args;
        if (method === 'loginSuccess') {
          that[method].call(that, args);
        }
      });
    } else {
      VL.dialog.open({
        s: '.login-frame',
        afterClose: function () {
          clearTimeout(that.loopLogin);
        }
      });
      that.loopCheckLogin();
    }
	},
	checkLogin: function () {
		if (window.ready && ready.isLogin === true) {
			VL.isLogin = true;
		} else {
			VL.isLogin = false;
		}
	},
	ini: function () {
		this.get();
		this.ddlIni();
		this.bind();
		this.checkLogin();
		//this.handleHighlight();
		this.handleWelcome();
		this.getCart();
	}
};

$(function () {
	VL.actionBtn.ini();
	VL.dialog.ini();
	VL.header.ini();
  VL.resizeHandler([{
    size: 1366,
    cla: 'middleSize'
  }]);
});

}(jQuery));


