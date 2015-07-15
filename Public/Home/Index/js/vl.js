/**
 * 基础API库
 * @namespace VL
 * @author jian<jian05.chen@vipshop.com>
 * @version 0.1
 */
"use strict" 
//jQuery.noConflict();//del $ from jQuery, now prototype is using it
var VL = window.VL || (function ($) {

	var VL = {};

	/**
	 * @desc		临时变量传递区
	 * @property	temp
	 * @type 		{Object}
	 */
	VL.temp = VL.temp || {};
	
	/**
	 * @desc		是否是debug状态，建议在production环境下设置为false
	 * @property	isDebug
	 * @type 		{Boolean}
	 */
	VL.isDebug = true;
	
	/**
	 * @desc		控制台输出工具
	 * @method		log
	 * @param 		{String, Number} input
	 */
	VL.log = function (input) {
		if (!VL.isDebug) {return}
		if (window.console) {
			if (console.log.apply) {
                console.log.apply(console, arguments);
            } else {
				//IE10 以下的浏览器不支持console.log的apply方法
				console.log(input);
			}
		} else {
			//if browser haven't console to output, use title to show message
			if (document.title.length + input.length > 90) {
				document.title = input;
			} else {
				document.title += '|' + input;
			}
		}
	};

	/**
	 * @desc		字符串处理工具
	 * @property	str
	 * @type 		{Object}
	 */
	VL.str = VL.str || {};
	/**
	 * @desc		人民币符号
	 * @property	symbol
	 * @type 		{String}
	 */
	VL.str.symbol = VL.str.rmb = '\xA5';  //'\xA5' means CNY (RMB) symbol.
	/**
	 * @desc		格式化价格 '[symbol] 12,345.60' to 12345.6
	 * @method		priceToNumber
	 * @param 		{String} s
	 * @return		{Number}
	 */
	VL.str.priceToNumber = function (s) {  //formats '[symbol] 12,345.60' to 12345.6
		return s ? parseFloat(s.replace('\uffe5', '').replace(VL.str.symbol, '').replace(/\,/g, '').replace(/\-\s+/, '-')) : 0;
		//'\uffe5' means [symbol] in full-width chinese char
	};
	/**
	 * @desc		格式化价格 12345.6789 to '[symbol] 12,345.68'
	 * @method		numberToFullPrice
	 * @param 		{Number} n
	 * @return		{String}
	 */
	VL.str.numberToFullPrice = function (n) {  //formats 12345.6789 to '[symbol] 12,345.68', -1234.567 to '- [symbol] 1,234.57'
		return (n < 0 ? '- ' : '') + VL.str.symbol + ' ' + Math.abs(n).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,');
		//this regexp formats '1234.56' to '1,234.56', decimal point is necessary in source string
	};
	/**
	 * @desc		判断是否为字符串
	 * @method		isString
	 * @param 		{String} s
	 * @return		{Boolean}
	 */
	VL.str.isString = function(s) {return Object.prototype.toString.call(s) === '[object String]'; };
	/**
	 * @desc		判断字符串是否包含子字符串
	 * @method		ifHas
	 * @param 		{String} sA
	 * @param 		{String} sB
	 * @return		{Boolean}
	 */
	VL.str.ifHas = function(sA, sB) {return (sA.indexOf(sB) > -1); };
	/**
	 * @desc		判断字符串是否起始于子字符串
	 * @method		ifStartsWith
	 * @param 		{String} sA
	 * @param 		{String} sB
	 * @return		{Boolean}
	 */
	VL.str.ifStartsWith = function(sA, sB) {return (sA.indexOf(sB) === 0); };
	/**
	 * @desc		判断字符串是否是hash
	 * @method		isHash
	 * @param 		{String} s
	 * @return		{Boolean}
	 */
	VL.str.isHash = function(s) {return VL.str.ifStartsWith(s, '#'); };
	/**
	 * @desc		合并多个空格为1个
	 * @method		trimInner
	 * @param 		{String} s
	 * @return		{String}
	 */
	VL.str.trimInner = function (s) {return s.replace(/\s{2,}/g, ' '); };
	/**
	 * @desc		转义文本，防止脚本注入
	 * @method		escapeHTML
	 * @param 		{String} text
	 * @return		{String}
	 */
	VL.str.escapeHTML = function (text) {
		var htmlLabel = {
			'<': '&lt;',
			'>': '&gt;'
		};
		return text.replace(/[<>]/g, function (match) {
			return htmlLabel[match];
		});
	};

	/**
	 * @desc		URL处理工具
	 * @property	url
	 * @type 		{Object}
	 */
	VL.url = VL.url || {};
	/**
	 * @desc		判断网站是否在iframe中打开
	 * @property	isInFrame
	 * @type		{Boolean}
	 */
	VL.url.isInFrame = window.self !== window.top;
	/**
	 * @desc		网站URL字符串
	 * @property	str
	 * @type		{Boolean}
	 */
	VL.url.str = location.href;
	/**
	 * @desc		网站host字符串
	 * @property	host
	 * @type		{String}
	 */
	VL.url.host = location.hostname.toLowerCase();  //without port number
	/**
	 * @desc		网站path字符串
	 * @property	path
	 * @type		{String}
	 */
	VL.url.path = location.pathname;
	/**
	 * @desc		解析URL工具
	 * @method		parseUrl
	 * @param 		{String} url
	 * @return		{Object}
	 */
	VL.url.parseUrl = function (url) {
		var a =  document.createElement('a');
		a.href = url;
		return {
			/**
			 * @desc		网站URL字符串
			 * @property	source
			 * @type		{String}
			 */
			source: url,
			/**
			 * @desc		网站使用的协议
			 * @property	protocol
			 * @type		{String}
			 */
			protocol: a.protocol.replace(':',''),
			/**
			 * @desc		网站host字符串
			 * @property	hostname
			 * @type		{String}
			 */
			host: a.hostname,
			/**
			 * @desc		网站端口号
			 * @property	port
			 * @type		{String}
			 */
			port: a.port,
			/**
			 * @desc		URL中的search字符串
			 * @property	search
			 * @type		{String}
			 */
			query: a.search,
			/**
			 * @desc		params对象存放了解析后的search键值对
			 * @property	params
			 * @type		{Object}
			 */
			params: (function(){
				var ret = {},
					seg = a.search.replace(/^\?/,'').split('&'),
					len = seg.length, i = 0, s;
				for (;i<len;i++) {
					if (!seg[i]) { continue; }
					s = seg[i].split('=');
					ret[decodeURIComponent(s[0]).toLowerCase()] = decodeURIComponent(s[1]);
				}
				return ret;
			})(),
			/**
			 * @desc		返回params对象中的一个值
			 * @method		getParam
			 * @param 		{String} s
			 * @return		{String}
			 */
			getParam: function (s) {
				return (s && typeof s === 'string') ? this.params[s.toLowerCase()] : '';
			},
			/**
			 * @desc		返回URL中的hash字符串
			 * @property	hash
			 * @type		{String}
			 */
			hash: a.hash.replace('#',''),
			/**
			 * @desc		返回URL中的path字符串
			 * @property	path
			 * @type		{String}
			 */
			path: a.pathname.replace(/^([^\/])/,'/$1')
		};
	};
	/**
	 * @desc		网站的params
	 * @property	params
	 * @type		{Object}
	 */
	VL.url.params = (function () {
		return VL.url.parseUrl(location.href).params;
	});
	/**
	 * @desc		返回网站params中的一个值
	 * @method		getParam
	 * @param 		{String} s
	 * @return		{String}
	 */
	VL.url.getParam = function (s) {
		return VL.url.parseUrl(location.href).getParam(s);
	};
	/**
	 * @desc		解析search字符串为对象
	 * @method		queryStringToJSON
	 * @param 		{String} searchString
	 * @return		{Object}
	 */
	VL.url.queryStringToJSON = function (searchString) {
        if (searchString === '') {return '';}
        var pairs = (searchString || location.search).replace(/^\?/,'').split('&');
        var result = {},
			i = 0,
			len = pairs.length,
			pair = '';
        for (i; i < len; i++) {
            pair = pairs[i].split('=');
            if (!!pair[0]) {
                result[decodeURIComponent(pair[0]).toLowerCase()] = decodeURIComponent(pair[1]);
            }
        }
        return result;
    }
	
	/**
	 * @desc		ua的处理工具
	 * @property	ua
	 * @type		{Object}
	 */
	VL.ua = VL.ua || {};
	/**
	 * @desc		ua的字符串
	 * @property	str
	 * @type		{String}
	 */
	VL.ua.str = navigator.userAgent;
	/**
	 * @desc		判断是否是IE6
	 * @property	isIE6
	 * @type		{Boolean}
	 */
	VL.ua.isIE6 = navigator.appVersion.indexOf("MSIE 6") > -1;
	/**
	 * @desc		判断是否是移动设备
	 * @property	isMobile
	 * @type		{Boolean}
	 */
	VL.ua.isMobile = 'createTouch' in document && !('onmousemove' in document.documentElement) || /(iPhone|iPad|iPod)/i.test(navigator.userAgent);
	
	/**
	 * @desc		click事件处理对象
	 * @property	actionBtn
	 * @type		{Object}
	 */
	VL.actionBtn = {
		/**
		 * @desc		actionBtn是否已经初始化完成
		 * @property	isReady
		 * @type		{Boolean}
		 */
		isReady: false,
		/**
		 * @desc		事件堆栈，存储事件名及其事件处理函数
		 * @property	actionList
		 * @type		{Object}
		 */
		actionList: {},
		/**
		 * @desc		初始化函数
		 * @method		ini
		 * @param 		{String} s 指定的selector，默认是a.cmAction
		 */
		ini: function (s) {
			if (!this.isReady) {
				this._bind(s);
				this.isReady = true;
			}
		},
		/**
		 * @desc		在DOM上绑定统一处理函数
		 * @method		_bind
		 * @param 		{String} s 指定的selector，默认是a.cmAction
		 */
		_bind: function (s) {
			var sSelector = s || 'a.cmAction';
			jQuery(document).on('click', sSelector, function (e) {
				var s = this.getAttribute('href', 2);
				s = VL.str.ifHas(s, '#') ? '#' + s.split('#')[1] : s;
				if (VL.str.isHash(s)) {
					e.preventDefault();
					VL.actionBtn._handle(s.slice(1), this);
				}
			});
		},
		/**
		 * @desc		执行堆栈中的对应函数
		 * @method		_handle
		 * @param 		{String} s DOM节点上href属性的hash值，即事件名
		 * @param 		{Object} btn DOM节点自身
		 */
		_handle: function (s, btn) {
			VL.log('action: ' + s);
			var fn = VL.actionBtn.actionList[s];
			if (jQuery.isFunction(fn)) {
				fn(btn);
			}
		},
		/**
		 * @desc		合并新加入的对象至事件堆栈中
		 * @method		extend
		 * @param 		{Object} o 新的事件，形如{事件名：事件函数}
		 */
		extend: function (o) {
			if (jQuery.isPlainObject(o)) {
				jQuery.extend(this.actionList, o);
			}
		},
		/**
		 * @desc		触发指定事件
		 * @method		trigger
		 * @param 		{String} s 指定的事件名
		 */
		trigger: function (s) {
			if (s) {
				this._handle(s);
			}
		}
	};

	/**
	 * @desc		处理cookie工具
	 * @property	cookie
	 * @type		{Object}
	 */
	VL.cookie = VL.cookie || {};
	/**
	 * @desc		设置cookie
	 * @method		set
	 * @param 		{String} name 
	 * @param 		{String} value 
	 * @param 		{String} domain 默认为网站的domain
	 * @param 		{String} path 
	 * @param 		{String} hour cookie过期时间，以小时为单位
	 */
	VL.cookie.set = function(name, value, domain, path, hour) {
        if (hour) {
            var today = new Date();
            var expire = new Date();
            expire.setTime(today.getTime() + 3600000 * hour);
        }

        document.cookie = name + "=" + escape(value) + "; " + (hour ? ("expires=" + expire.toGMTString() + "; ") : "") + (path ? ("path=" + path + "; ") : "path=/; ") + (domain ? ("domain=" + domain + ";") : '.vip.com;');
        return true;
    }
	/**
	 * @desc		获取cookie
	 * @method		set
	 * @param 		{String} sName cookie名
	 * @return		{String} cookie的值
	 */
	VL.cookie.get = function(sName) {
		var sCookie = document.cookie;
		var sValue = '';
		if (sCookie.length > 0) {
			var nStart = sCookie.indexOf(sName + '=');
			var nEnd;
			if (nStart > -1) {
				nStart = nStart + sName.length + 1;
				nEnd = sCookie.indexOf(';', nStart);
				if (nEnd < 0) {
					nEnd = sCookie.length;
				}
				sValue = unescape(sCookie.substring(nStart, nEnd));
			}
		}
		return sValue;
	};
	/**
	 * @desc		删除cookie
	 * @method		del
	 * @param 		{String} sName 
	 * @param 		{String} sDomain 
	 * @param 		{String} sPath 
	 */
	VL.cookie.del = function(sName, sDomain, sPath) {
		var sV = VL.cookie.get(sName);
		if (sV) {
			VL.cookie.set(sName, 'null', sDomain || '', sPath || '', -1);
		}
	};
	
	/**
	 * @desc		产生随机字符串，类似“dsj21hg3h43gh2g”
	 * @method		generateRandomAlphaNum
	 * @param 		{String} len 设定字符串长度
	 * @return		{String}
	 */
	VL.generateRandomAlphaNum = function (len) {
		var rdmString = "";
		for (; rdmString.length < len; rdmString += Math.random().toString(36).substr(2));
		return rdmString.substr(0, len);
	}
	
	/**
     * 把组件添加到jQuery的fn上
     * @method bridgeTojQuery
     * @param {string} methodName 用于定义组件名字
     * @param {object} widget 对应的类
     * @return {function}
     */
    VL.bridgeTojQuery = function(methodName, widget){
        var methodArray = $.trim(methodName).split(",");
        jQuery.each(methodArray, function(i, n){
            jQuery.fn[n] = function(config, args){
                var args = Array.prototype.slice.call(arguments, 1),
                    Obj,
                    R,
                    _widget,
                    method,
                    getWidgetData;

                //调用方法时,如果DOM对象之前有绑定相同组件,则销毁前一个
                var hasWidget = jQuery(this).data("widget_" + n);
                if(typeof config != 'string' && hasWidget){
                    hasWidget.destroy && hasWidget.destroy();
                    jQuery(this).removeData("widget_" + n);
                }
                if (config == "destroy") {
                    getWidgetData = jQuery(this).data('widget_' + n);
                    if (getWidgetData) {
                        getWidgetData.destroy && getWidgetData.destroy();
                        $(this).removeData("widget_" + n);
                        return;
                    } else {
                        return true;
                    }
                } else if (typeof config == 'string'){
                    if(config.indexOf('_') == 0){
                        VL.log('不能调用私有方法');
                        return false;
                    }
                    _widget = $(this).data('widget_' + n);
                    method = _widget ? _widget[config] : null;
                    if(method){
                        R = method.apply(_widget, args);
                        if (R === _widget || typeof R == 'undefined') {
                            return this;
                        }
                        else {
                            return R;
                        }
                     }
                } else {
                    config = $.extend({}, config, {
                        node: this
                    });
                        Obj = new widget(config);
                    //增强链式调用
                    Obj[n] = function (func) {
                        var args = Array.prototype.slice.call(arguments, 1);
                        var R = Obj[func](args);
                        return R;
                    }
                    $(this).data('widget_' + n, Obj);
                    return this;
                }
            };
            $[n] = function(options){
                return new widget(options);
            };
        });
    };
	
	return VL;
}(jQuery));


