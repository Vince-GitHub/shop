
/* E:\Shangpin\img.shangpincdn.com\shangpin\Scripts\live\dev\core\plug\menu.js */
/**
 * @author Macrox
 */

; (function (window, $, SP) {

    var menu = (function () {

        var defaultSetting = {
            title: {
                obj: null,
                on: null,
                off: null
            },
            content: {
                obj: null,
                fix: null
            }
        },
			lastMenu,
			menu = function (setting) {
			    setting = $.extend(true, {}, defaultSetting, setting);

			    title = setting.title || defaultSetting.title;
			    content = setting.content || defaultSetting.content;
			    var titleObj = title.obj,
					contentObj = content.obj;

			    this.titleObj = titleObj instanceof $ ? titleObj : ($.isFunction(titleObj) ? titleObj.call(this) : ($(titleObj) || null));
			    this.titleOn = title.on;
			    this.titleOff = title.off;
			    this.contentObj = contentObj instanceof $ ? contentObj : ($.isFunction(contentObj) ? contentObj.call(this) : ($(contentObj) || null));
			    this.titleObj
			    this.contentFix = content.fix instanceof $ ? content.fix : ($(content.fix) || null);
			    this.isshow = 0;
			    this.offset = $.extend({
			        left: 0,
			        top: 0
			    }, setting.offset || {});
			};

        menu.prototype = {
            constructor: menu,

            show: function (e) {
                var titleObj,
					contentObj,
					offset,
					left,
					top,
					width,
					contentFix,
					fixed,
					zindex;

                if (this.isshow !== 1) {
                    this.isshow = 1;
                    lastMenu = this;
                    titleObj = this.titleObj;
                    contentObj = this.contentObj;
                    contentFix = this.contentFix;

                    this.titleOn && this.titleOn.call(titleObj, e);

                    offset = titleObj.offset();
                    left = offset.left + this.offset.left;
                    top = offset.top + titleObj.outerHeight() - 1 + this.offset.top;
                    width = contentObj.width();
                    zindex = Math.floor(new Date().getTime() / 1000);

                    fixed = (contentFix.offset().left + contentFix.innerWidth()) - (left + width) - 2;
                    if (fixed < 0) {
                        left += fixed;
                    }

                    titleObj.css({
                        position: "relative",
                        "z-index": zindex + 1
                    });

                    contentObj.css({
                        top: top + "px",
                        left: left + "px",
                        display: "block",
                        width: width + "px",
                        "z-index": zindex
                    })
                }

                return this;
            },

            hide: function (e) {
                if (this.isshow == 2) {
                    this.isshow = 0;
                    this.titleOff && this.titleOff.call(this.titleObj, e);
                    this.titleObj.css({ "z-index": 1 });
                    this.contentObj.hide();
                }

                return this;
            },

            rending: function (render) {
                var titleObj = this.titleObj,
					contentObj = this.contentObj,
					that = this;
                titleObj.hover(
					function (e) {
					    var $this = $(this);
					    lastMenu && lastMenu.hide();

					    render.before && render.before.call(that);
					    if (!$this.data("$$beforeOne")) {
					        render.beforeOne && render.beforeOne.call(that);
					        $this.data("$$beforeOne", 1);
					    }

					    that.show(e);

					    render.after && render.after.call(that);
					    if (!$this.data("$$afterOne")) {
					        render.afterOne && render.afterOne.call(that);
					        $this.data("$$afterOne", 1);
					    }
					},
					function (e) {
					    that.isshow = 2;
					    setTimeout(function () {
					        that.hide(e);
					    }, 100)
					}
				);

                contentObj.hover(
					function (e) {
					    lastMenu && lastMenu.hide();
					    that.show(e);
					},
					function (e) {
					    that.isshow = 2;
					    setTimeout(function () {
					        that.hide(e);
					    }, 100)
					}
				);

                return this;
            }
        }

        return menu;

    })();

    SP.plug.menu = function (setting) {
        var titleObj = setting.title.obj || null,
			contentObj = setting.content.obj || null,
			render = setting.render || { before: null, after: null, beforeOne: null, afterOne: null },
			ret = [];
        if ($.isArray(titleObj) && $.isArray(contentObj) && titleObj.length == contentObj.length) {
            for (var i = 0, len = titleObj.length; i < len; i++) {
                (function (s, t, c) {
                    s.title.obj = t;
                    s.content.obj = c;
                    ret.push(new menu(s).rending(render));
                })(setting, titleObj[i], contentObj[i]);
            }
        }
        else {
            return new menu(setting).rending(render);
        }
    };

})(window, jQuery, SP, undefined);

/* E:\Shangpin\img.shangpincdn.com\shangpin\Scripts\live\dev\core\plug\shopcart.js */
/**
 * @author Macrox
 */
;(function(window, $, SP){
	
	var config,
		init,
		Shopcart = (function(){
			var Shopcart = function(setting){
					var _setting = $.extend(true, {}, config, setting);
					
					this.getSetting = function(){
						return _setting;
					};
					
					this.init();

			        this._ = {
			            data: null,
			            onload: null,
			            onfail: null,
			            attach: null
			        };
				};
			
			Shopcart.prototype = {
				constructor : Shopcart,
				init : function(){
					var setting = this.getSetting(),
						container = setting.container instanceof $ ? setting.container : ($(setting.container) || null),
						uri = setting.uri || null,
						render = setting.render || null;

					this.isinited = false;
					
					if(!container){
						container = $("<div>").attr("id", "spPlug_shopcart");
						$("body").append(container);
					}
						
					this.container = container;
					this.isinited = true;
					
					render.init.call(this);
					return this;
				},
				setData: function (data, vararg, jsoned) {
				    this._.data = jsoned ? $.parseJSON(data) : data;
				    if(typeof vararg === "boolean") {
				        this.trigger("onload");
				    }
				    else if($.isFunction(vararg)) {
				        vararg.call(this);
				    }
				    return this;
				},
				trigger: function (eventName) {
				    this._[eventName] && this._[eventName].call(this);
				},
				getPrivate: function (name) {
				    return this._[name] || null;
				},
				get : function(uri, onget, onload, onfail, attach){
					var setting = this.getSetting(),
						render = setting.render,
						onget = onget || render.onget,
						onload = onload || render.onload,
						onfail = onfail || render.onfail,
						geturi = uri || setting.URI.get,
						that = this,
						ajax,
                        ud = new Date().getTime();
					
					onget && onget.call(this);
				    this._.onload = onload;
				    this._.onfail = onfail;
				    this._.attach = attach;

				    SP.core.using(geturi + "?ud=" + ud);
					
                    /*
					ajax = $.ajax({
						url: geturi+"?ud="+ud,
						type: "GET",
                        cache: false
					});

                    SP.core.using(geturi+"?ud="+ud).excute(function())
					
					ajax.done(function(data){
						if(!data){
							ajax.reject();
							return;
						}
						onload && onload.call(that, data, attach);
					});
					
					ajax.fail(function(){
						onfail && onfail.call(that);
					});
                    */
				},
				add : function(){
					
				},
				remove : function(){
					
				},
				clear : function(){
					
				}
			};
			
			return Shopcart;
		})();
	
	SP.plug.shopcart = function(setting){
		if(!init){
			init = new Shopcart(setting);
		}
		return init;
	};
	
	SP.plug.shopcart.config = function(setting){
		config = setting;
		return;
	};
	
})(window, jQuery, SP, undefined);


/* E:\Shangpin\img.shangpincdn.com\shangpin\Scripts\live\dev\core\plug\scroller.js */
/**
 * @author Macrox
 */
(function(window, $, SP){
    var scroller = function(container, scroller, subelem){
        this.__container = container instanceof $ ? container : ($(container) || null);
        this.__scroller = scroller instanceof $ ? scroller : ($(scroller) || null);
        this.__elems = subelem instanceof $ ? subelem : ($(subelem) || null);
        
        var type, current = 0, stepper;
        
        this.type = function(t){
            if (arguments.length == 0) {
                return type || "h";
            }
            type = t === "vertical" ? "v" : "h";
            return this;
        };
        
        this.current = function(c){
            if (arguments.length == 0) {
                return current;
            }
            current = isFinite(c) ? c : 0;
            return current;
        };
        
        this.onStep = function(fn){
            stepper = fn;
            return this;
        };
        
        this.triggerStep = function(){
            if (stepper) {
                var index = this.current(), cursor = this.cursor();
                return stepper && stepper.call(this, index, cursor);
            }
            return null;
        }
        
        this.init();
    };
    
    scroller.prototype = {
        constructor: scroller,
        init: function(){
            var totalWidth = 0;
            
            this.__container && this.__container.css("position", "relative");
            this.__scroller && this.__scroller.css("position", "absolute");
            
            if(this.type() === "h"){
                this.__elems.each(function(){
                    return totalWidth += $(this).outerWidth();
                });
                
                this.__scroller.width(totalWidth);
            }
        },
        count: function(){
            return this.__elems && this.__elems.size();
        },
        max: function(){
            if (this.type() == "v") {
                var containerHeight = this.__container.height(), scrollerHeight = this.__scroller.height();
                return scrollerHeight - containerHeight;
            }
            else{
                var containerWidth = this.__container.width(), scrollerWidth = this.__scroller.width();
                return scrollerWidth - containerWidth;
            }
        },
        cursor: function(index){
            if (typeof index != "number") {
                return this.__elems.eq(this.current());
            } else {
                this.current(index);
                this.triggerStep();
                return this;
            }
        },
        find: function(sel){
            return this.__elems.find(sel);
        },
        screenCount : function(count, relat){
            this.screenCount = count || 1;
            var elem = this.__elems[0],
                height = $(elem).outerHeight();
            this.__container.height(height * count + relat);
            return this;
        },
        scrollTo: function(){
            var args = arguments, 
                argsLen = args.length, 
                step, 
                type = this.type(), 
                elems = this.__elems, 
                elemslen, 
                elem, 
                animate, 
                sec, 
                max = this.max(),
                center,
                centerPosition,
                fnscrollend,
                that = this,
                cancenter;
            if (argsLen > 0) {
                step = args[0];
                sec = args[1] || 0;
                center = args[2] || false;
                fnscrollend = args[3] || null;
                //window.getSelection ? window.getSelection().removeAllRanges() : document.selection.empty();
                if (isFinite(step) && elems) {
                    elemslen = elems.size();
                    if (elemslen - 1 < step || step < 0) {
                        step = 0;
                    }
                    this.current(step);
                    elem = elems.eq(step);
                    if(!elem || elem.length === 0){
                        return this;
                    }
                    this.triggerStep();
                    step = type === "h" ? elem.position().left : elem.position().top;
                    
                    if(center){
                        cancenter = type == "h" ? this.__container.width() < this.__scroller.width() : this.__container.height() < this.__scroller.height();
                        if (cancenter) {
                            centerPosition = type === "h" ? this.__container.width() / 2 : this.__container.height() / 2;
                            centerPosition = centerPosition - elem.height() / 2;
                            var _step = step - centerPosition;
                            if (_step >= 0) {
                                step = _step;
                            }
                            else {
                                step = 0;
                            }
                        }
                        else{
                            step = 0;
                        }
                    }
                }
                else 
                    if (typeof step == "string" &&
                    (function(s){
                        var len = s.length;
                        return s.substring(len - 2, len) == "px" ? 1 : 0;
                    })(step)) {
                        step = parseInt(step);
                        if (isNaN(step)) {
                            return this;
                        }
                    }
                if (max > 0 && step > max) {
                    step = max;
                }
                step = (step * -1) + "px";
                animate = type === "h" ? {
                    "left": step
                } : {
                    "top": step
                };
                
                this.__scroller.stop(false, true).animate(animate, sec, function(){
                    fnscrollend && fnscrollend.call(that);
                });
            }
            return this;
        },
        up: function(el, step, type, fnpre, fnback, fnscrollend, center){
            var that = this;
            if (!el) {
                return this;
            }
            step = step || 1;
            type = type || "click";
            center = center || false;
            
            this.elup = $(el).bind(type, function(){
                if (!fnpre || (fnpre && fnpre.call(that, $(this)))) {
                    that.scrollTo(that.current() - step, 400, center, fnscrollend);
                    fnback && fnback.call(that, $(this));
                }
            });
            
            return this;
        },
        down: function(el, step, type, fnpre, fnback, fnscrollend, center){
            var that = this;
            
            if (!el) {
                return this;
            }
            step = step || 1;
            type = type || "click";
            center = center || false;
            
            this.eldown = $(el).bind(type, function(){
                if (!fnpre || (fnpre && fnpre.call(that, $(this)))) {
                    that.scrollTo(that.current() + step, 400, center, fnscrollend);
                    fnback && fnback.call(that, $(this));
                }
            });
            
            return this;
        },
        left: this.up,
        right: this.down,
        give: function(type, fn){
            var that = this, elems = that.__elems;
            this.__elems.bind(type, function(){
                var $that = $(this);
                fn && fn.call(that, $that, elems.index($that[0]));
            });
            return this;
        },
        auto: function(sec, stoper, center, fnscrollend){
            stoper = stoper ? $(stoper) : this.__container;
            var that = this;
            
            that.startauto(sec, center, fnscrollend);
            
            stoper.hover(function(){
                that.stopauto();
            }, function(){
                that.startauto(sec, center, fnscrollend);
            });
            
            return this;
        },
        startauto: function(sec, center, fnscrollend){
            sec = sec || 5;
            var that = this;
            
            this.stopauto();
            this.__auto = true;
            this.__autotimer = setInterval(function(){
                if (that.__auto) {
                    var max = that.count() - (that.screenCount || 1), index = that.current() + that.screenCount;

                    if (index > max) {
                        index = 0;
                    }
                    that.current(index);
                    that.scrollTo(that.current(), 400, center, fnscrollend);
                }
            }, sec * 1000);
        },
        stopauto: function(){
            this.__scroller.stop(false, true);
            this.__auto = false;
            this.__autotimer = clearInterval(this.__autotimer);
            this.__autotimer = null;
        }
    };
    
    scroller.create = function(container, scrolla, subelem){
        return new scroller(container, scrolla, subelem);
    };
    
    SP.plug.scroller = scroller;
    
})(window, jQuery, SP, undefined);


/* E:\Shangpin\img.shangpincdn.com\shangpin\Scripts\live\dev\core\plug\search.js */
/**
 * @author Macrox
 */
;(function(window, $, SP){
	
	var Search = (function(){
		var Search = function(setting){

			return new Search.fn.init(setting);
		};

		Search.fn = Search.prototype = {
			constructor: Search,
			
			init: function(setting){
				if(!setting){
					return this;
				}
				var _setting = setting,
					_keyword,
                    _cateid = 0,
                    _brandno,
					elem = setting.elem instanceof $ ? setting.elem : ($(setting.elem || null)),
					initText = (setting.text && setting.text.init) || "",
					spaceText = (setting.text && setting.text.placeholder) || "",
					triggerElem = (setting.triggerSearch && setting.triggerSearch.elem) instanceof $ ?
						setting.triggerSearch.elem : ($(setting.triggerSearch.elem) || null),
					triggerKeycode = (setting.triggerSearch && setting.triggerSearch.keyCode) || [13],
					render = setting.render || {};
				
				this.input = elem;
				this.initText = initText;
				this.spaceText = spaceText;
				this.triggerElem = triggerElem;
				this.triggerKeycode = triggerKeycode;
				this.render = render;
				
				this.getSetting = function(){
					return _setting;
				};
				this.setKeyword = function(text, cateid, brandno){
                    if(typeof text == "undefined"){
                        _keyword = this.filter(this.input.val());
					}
					if(typeof text == "string"){
                        _keyword = this.filter(text);
					}
                    //二级分类目录标记                      
					if(typeof cateid != "undefined"){                     
						_cateid = cateid;
					}
					//品牌编号                      
					if(typeof brandno != "undefined"){                     
						_brandno = brandno;
					}
                    //console.log(_cateid); 
					return this;
				};
				this.getKeyword = function(text){
					return _keyword || null;
				};
                this.getCateid = function(cateid){
                    return _cateid || null;
                } 
                this.getBrandno = function(brandno){
                    return _brandno || null;
                } 
                
				this.bindEvent();
				
				return this;
			},
			
			clearVal: function(clearCurrent, clearInit, clearSpace){
				var keyword = this.getKeyword();
				
				if(clearCurrent){
					this.setKeyword("").val();
				}
				if(clearInit && (keyword == this.initText)){
					this.setKeyword("").val();
				}
				if(clearSpace && (keyword == "")){
					this.val();
				}
				
				return this;
			},
			
			resetVal: function(){
				var keyword = this.getKeyword();
				
				if (!keyword) {
					return this.initKeyword();
				}
				
				return this;
			},
			
			initKeyword: function(){
				return this.setKeyword(this.initText).val();
			},

			val: function(){
				this.input.val(this.getKeyword());
				return this;
			},
			
			search: function(){
				var render = this.render;
				this.setKeyword();
				render.onsearch && render.onsearch.call(this);
			},
			
            filter:function (text, fn) {
                if (typeof text !== "string") {
                    return "";
                }
                fn = fn || function (t) {
                    //t = t.replace("'", " ");
                    t = t.replace('"', ' ');
                    t = t.replace("?", " ");
                    t = t.replace("\/", " ");
                    t = t.replace("\\", " ");
                    t = t.replace("<", "&lt;");
                    t = t.replace(">", "&gt;");

                    return $.trim(t);
                };
                return fn.call(this, text);
            },
			bindEvent: function(){
				var input = this.input,
					render = this.render,
					placehoder = this.spaceText,
					focus = this.render.focus || null,
					blur = this.render.blur || null,
					that = this;
				
//				if(placehoder){
//					input.attr("placeholder", placehoder);
//				}
				
				input.focus(function(){
					focus && focus.call(that);
				})
				.blur(function(){
					that.setKeyword();
					blur && blur.call(that);
				})
				.keypress(function(e){
					var currentKey = e.keyCode,
						triggerKey = that.triggerKeycode;
					if(triggerKey && $.inArray(currentKey, triggerKey) > -1){
						that.search();
					}
				});
				
				this.triggerElem && this.triggerElem.bind("click", function(){
					that.search();
				});
			}
		};
		
		Search.fn.init.prototype = Search.fn;
		
		return Search;
	})();
	
	SP.plug.search = function(setting){
		return Search(setting).initKeyword();
	};
	
})(window, jQuery, SP, undefined);


/* E:\Shangpin\img.shangpincdn.com\shangpin\Scripts\live\dev\core\plug\autocomplete.js */
/**
 * @author Macrox
 */
(function(window, $, SP){
    var autoComplete = function(bindObject, relat){
        if (typeof autoComplete.__list == "undefined") {
            var __list = function(){
                var list = [];
                this.get = function(){
                    return list;
                };
                this.set = function(arrlist){
                    list = arrlist
                    return this;
                };
                this.remove = function(index){
                    list.splice(index, 1);
                    return this;
                };
            };
            
            __list.prototype.add = function(elem){
                this.get().push(elem);
                return this;
            };
            
            __list.prototype.clear = function(){
                this.set([]);
                return this;
            };
            
            autoComplete.__list = __list;
        }
        
        if (typeof autoComplete.__constructor == "undefined") {
            var __constructor = function(bindObject, relat){
                this._bindObject = bindObject;
                this._focusObject = null;
                this._focusData = null;
                this._firstData = null;
                this._lastData = null;
                this._mouseBind = false;
                this._keyBind = false;
				this.cateid = 0;
				this.brandno = 0;
                this.uuid = null;
                this.lock = {
                    ajax: false,
                    input: false
                };
                this.timer = {
                    ajax: null,
                    input: null
                };
                this.memorize = {
                    on: false,
                    content: {},
                    indexer: [],
                    maxcount: 100
                };
				this.relat = relat || {left: 0, width: 0};
                this.list = new autoComplete.__list();
                this.dom = {
                    outer: {
                        obj: null,
                        lable: "ul",
                        css: {
                            "position": "absolute",
                            "border": "1px solid #aaa",
                            "background-color": "#fff",
							"margin-top":"4px",
							"overflow":"hidden"
                        }
                    },
                    inner: {
                        lable: "li",
                        css: {
                            "line-height": "25px",
                            "height": "25px",
                            "font-size": "12px",
                            "padding": "0 6px",
                            "border-bottom": "0",
                            "position": "relative",
                            "cursor": "default",
                            "overflow": "hidden",
							"font-weight": "700",
							"font-family": "Arial, '宋体'"
                        },
                        focus: {
                            "background-color": "#e2eaff"
                        },
                        blur: {
                            "background-color": ""
                        }
                    },
                    em: {
                        lable: "em",
                        css: {
                            "font-size": "14px",
                            "color": "#333",
                            "line-height": "24px",
                            "cursor": "default"
                        }
                    },
                    count: {
                        lable: "i",
                        css: {
                            "font-size": "10px",
                            "color": "#999",
                            "position": "absolute",
                            "right": "8px",
                            "top": "0"
                        }
                    }, 
                    brand: {
                    	lable: "i",
                        css: {
                            "font-size": "11px",
                            "font-weight" : "bold",
                            "color": "#000",
                            "position": "absolute",
                            "right": "8px",
                            "top": "0"
                        }
                    }
                };
                this.config = {
                    listStruct: {
                        //keyword: "Keyword",
						keyword: "kw",
						subcate: "sub",
						count: "count",
						category: "cate",
                        searchCount: "SearchCount",
                        resultCount: "ResultCount", 
                        isBrand: "isBrand", 
                        brandno: "brandNo"
                    },
					geturi: "http://search.shangpin.com/search/suggest"
                };
                
                var input = "";
                this.getInput = function(){
                    return input;
                };
                this.setInput = function(text){
                    input = text;
                    return this;
                };
                
                var html = null;
                this.getHTML = function(){
                    return html;
                };
                this.setHTML = function(text){
                    html = text;
                    return this;
                };
                
                this._focusEvent = null;
                
                var userInput = "";
                this.getUserInput = function(){
                    return userInput;
                };
                this.setUserInput = function(text){
                    userInput = text;
                    return this;
                };
				
				var pause = false;
				this.pause = function(){
					pause = true;
				};
				this.isPaused = function(){
					if(pause){
						pause = false;
						return true;
					}
					return false;
				}
            };
            
            __constructor.prototype._focus = function(jqo){
                this._focusObject = jqo.css(this.dom.inner.focus);
                return this;
            };
            
            __constructor.prototype._blur = function(jqo){
                if (!jqo) {
                    return this;
                }
                jqo.css(this.dom.inner.blur);
                return this;
            };
            
            __constructor.prototype._focusUserInput = function(){
                this._focusObject = null;
                this._focusData = this.getUserInput();
                this._bindObject.val(this._focusData).focus();
                this.setInput(this._focusData);
            };
            
            __constructor.prototype._focusBatch = function(data,isData){
                this._focus(data);
                if(isData){
					this._focusData = this._focusObject.data("FOCUSDATA");
                	this._bindObject.val(this._focusData).focus();
                	this.setInput(this._focusData);
				}else{
					var firstData = this._firstData.data("FOCUSDATA");
					this._bindObject.val(firstData).focus();
					this.setInput(firstData);
				}
            };
            
            __constructor.prototype._clear = function(){
                this._focusObject = null;
                this._focusData = null;
                this._firstData = null;
                this._lastData = null;
            };
            
            __constructor.prototype._makeLable = function(o){
                var lable = o.lable, css = o.css, lableCSS = "";
                for (var i in css) {
                    lableCSS += i + ":" + css[i] + ";";
                }
                return {
                    start: "<" + lable + " style=\"" + lableCSS + "\">",
                    end: "<\/" + lable + ">"
                };
            };
            
            __constructor.prototype.makeUUID = function(){
                this.uuid = "autocomp" + new Date().getTime();
                return this.uuid;
            };
            
            __constructor.prototype.makeItem = function(_item, structor, fn){
                if (typeof fn == "function") {
                    return fn.call(this, _item, structor);
                }
                else {
                    var inner = this.dom.inner, lable = inner.lable, css = inner.css, em = this.dom.em, count = this.dom.count, brand=this.dom.brand, input = this.getInput();
                    
                    if (typeof structor == "undefined") {
                        structor = this.config.listStruct;
                    }
                    
                    var keywordKey, searchCountKey, resultCountKey, keyword = null, searchCount = null, resultCount = null, data = null;
                    if (structor != null) {
                        keywordKey = structor.keyword || null;
						/*
                        searchCountKey = structor.searchCount || null;
                        resultCountKey = structor.resultCount || null;
                        
                        keyword = keywordKey && _item.hasOwnProperty(keywordKey) ? _item[keywordKey] : null;
                        searchCount = searchCountKey && _item.hasOwnProperty(searchCountKey) ? _item[searchCountKey] : null;
                        resultCount = resultCountKey && _item.hasOwnProperty(resultCountKey) ? _item[resultCountKey] : null;
						*/
						countKey = structor.count || null;
						
						keyword = keywordKey && _item.hasOwnProperty(keywordKey) ? _item[keywordKey] : null;
						resultCount = countKey && _item.hasOwnProperty(countKey) ? _item[countKey] : null;
                    }
                    else {
                        keyword = _item.toString();
                    }
                    data = keyword;
                    
                    if (typeof em.string == "undefined") {
                        em.string = this._makeLable(em);
                    }
					
                    var inputRegex = "^(\\s*", _input = input, inputWithoutSpace = _input.replace(/\s/g, "");
                    var hash = {
                        "+": "\\+",
                        "*": "\\*",
                        "?": "\\?",
                        "^": "\\^",
                        "$": "\\$",
                        "(": "\\(",
                        ")": "\\)",
                        "[": "\\[",
                        "]": "\\]",
                        "{": "\\{",
                        "}": "\\}"
                    };
                    var curChar = "";
                    for (var i = 0, len = inputWithoutSpace.length; i < len; i++) {
                        curChar = inputWithoutSpace.charAt(i);
                        if(hash[curChar]){
                            curChar = curChar.replace(curChar, hash[curChar]);
                        }
                        inputRegex += curChar + "\\s*";
                    }
                    
                    inputRegex += ")";
                    
                    var re = new RegExp(inputRegex, "i");
                    
                    // 提示词html文本
                    var keywordHtml = "";
                    var keywordTitle;
                    if(keyword.length > 17) {
                    	keywordHtml = keyword.substring(0, 17);
                    	keywordHtml = keywordHtml + '...';
                    	keywordTitle = keyword;
                    } else {
                    	keywordHtml = keyword;
                    }
                    keywordHtml = keywordHtml.replace(re, em.string.start + "$1" + em.string.end);
                    //keyword = keyword.replace(re, em.string.start + "$1" + em.string.end);
					
                    if (resultCount != null) {
                        if (typeof count.string == "undefined") {
                            count.string = this._makeLable(count);
                        }
                        resultCount = count.string.start +"约"+ resultCount +"个结果"+ count.string.end;
                    }
                    else {
                        resultCount = "";
                    }
                    
                    var final;
                    var _final_attach = "";
                    // 判断是否品牌词
                    if(_item.hasOwnProperty(structor.isBrand) && _item.hasOwnProperty(structor.brandno)) {
                        var isbrand = _item[structor.isBrand];
                        var brandNo = _item[structor.brandno];
                        if(isbrand == 1 && brandNo) {
                        	if (typeof brand.string == "undefined") {
                        		brand.string = this._makeLable(brand);
                            }
                            brandOutHTML = keywordHtml + brand.string.start +"进入品牌店"+ brand.string.end;
                            final = $("<" + lable + " brandno=\"" + brandNo + "\">");
                            if(keywordTitle) {
                                final.attr("title",keyword);
                                keywordTitle = null;
                            }
                            final.html(brandOutHTML).css(css).data("FOCUSDATA", data);
                            if(keyword.length > 13) {
                                keyword = keyword.substring(0, 13);
                                keyword = keyword + '...';
                            }
                            _final_attach += "<li class=\"subcate_item\" style=\"font-size: 11px;\">搜索\"<em style=\"font-size: 11px;\">" + keyword + "</em>\""+ resultCount +"</li>";
                        } else {
                            var outHTML = keywordHtml + resultCount;
                            final = $("<" + lable + ">");
                            if(keywordTitle) {
                                final.attr("title",keyword);
                                keywordTitle = null;
                            }
                            final.html(outHTML).css(css).data("FOCUSDATA", data);
                    }
                    } else {
                        var outHTML = keywordHtml + resultCount;
                        final = $("<" + lable + ">");
                        if(keywordTitle) {
                            final.attr("title",keyword);
                            keywordTitle = null;
                        }
                        final.html(outHTML).css(css).data("FOCUSDATA", data);
                    }
                    
                    //var outHTML = keyword + resultCount;
                    //var final = $("<" + lable + ">").html(outHTML).css(css).data("FOCUSDATA", data);
					
					var subcate;
					// 是否有分类
					if(_item.hasOwnProperty(structor.subcate)){
						subcate = _item[structor.subcate];
						if(subcate && subcate.length){
							//var _final_attach =  "", _cateitem;
							var _cateitem;
							for(var subi = 0, sublen = subcate.length; subi < sublen; subi++){
								_cateitem = subcate[subi];
								_final_attach += (function(items){
									var id = items["id"],
                                    cate = items["cate"],
                                    count = items["count"];
	                                if(cate.length > 7) {
	                                    cate = cate.substring(0, 7);
	                                    cate = cate + '...';
	                                }
	                                return "<li class=\"subcate_item\" cateid=\"" + id + "\" style=\"font-size: 11px;\">在\"<em style=\"font-size: 11px;\">" + cate + "</em>\"中搜索<i>约" + count + "个商品</i></li>";
								})(_cateitem);
							};
						}
					}
					
					return {final: final, attach: _final_attach};
                }
            };
            
            __constructor.prototype.makeOuter = function(){
                var outer = this.dom.outer, lable = outer.lable, css = outer.css, uuid = this.uuid, bindObject = this._bindObject;
                var jqo = $("<" + lable + ">").attr("id", uuid).css(css);
                var zindex = Math.floor(new Date().getTime() / 1000);
				var relat = this.relat,
				    relatLeft = relat.left || 0,
					relatWidth = relat.width || 0;
                $("body").append(jqo.css({
                    "z-index": zindex,
                    "width": (bindObject.outerWidth() + relatWidth + 23) + "px",
                    "left": (bindObject.offset().left + relatLeft) + "px",
                    "top": (bindObject.offset().top + bindObject.outerHeight()) + "px"
                }));
                if (jqo.length == 1) {
                    this.dom.outer.obj = jqo;
                }
                
                $(window).resize(function(){
                    jqo.css({
                        "left": bindObject.offset().left + "px",
                        "top": (bindObject.offset().top + bindObject.outerHeight()) + "px"
                    });
                });
                
                return jqo;
            };
            
            __constructor.prototype.makeStrong = function(){
                this._focusObject.html();
            };
            
            __constructor.prototype.makeList = function(){
                this._clear();
                var list = this.list.get(), html = null;
                var outer = this.dom.outer.obj;
                if (outer == null) {
                    var uuid = this.uuid;
                    if (this.uuid == null) {
                        uuid = this.makeUUID();
                    }
                    outer = this.makeOuter();
                    this.bindMouse();
                    this.bindKey();
                }
                
                outer.html("");
                
                if (list == null) {
                    this.hideOuter();
                    return this;
                }
                
                var len = list.length;
                if (len == 0) {
                    this.hideOuter();
                    return this;
                }
                
                this.showOuter();
                for (var i = 0, s = false, itm = null; i < len; i++) {
                    itm = this.makeItem(list[i]);
                    if (itm == null) {
                        continue;
                    }
                    var jqo = jqo = itm["final"],
						jqa = itm["attach"];
                    if (!s) {
                        this._firstData = jqo;
                        s = true;
                    }
                    outer.append(jqo);
					if(jqa){
						outer.append(jqa);
					}
                }
                if (jqo != null) {
                    this._lastData = jqo;
                }
				
				//最后一条二级菜单添加下边框
				$(".subcate_item:last").addClass("subcate_line");
				
                return this;
            };
            
            __constructor.prototype.hideOuter = function(){
                var outer = this.dom.outer.obj;
                if (outer != null && outer.length == 1) {
                    outer.hide();
                }
            };
            
            __constructor.prototype.showOuter = function(){
                var outer = this.dom.outer.obj;
                if (outer != null && outer.length == 1) {
                    outer.show();
                }
            }
            
            __constructor.prototype.ajax = function(ismem){
                var input = this.getInput(),
					geturi = this.config.geturi;
					that = this;
                if ($.trim(input) == "") {
                    this.list.clear();
                    this.makeList();
                    return;
                }
                if (typeof ismem == "undefined" || ismem) {
                    this.memorize.on = true;
                    var m = this.memorize.content;
                    if (typeof m[input] != "undefined") {
                        this.list.set(m[input]);
                        this.makeList();
                        return;
                    }
                }
                //$.LT_AJAX("get_auto_complete", input, this.ajaxHandler(input), "user_search", this);
				
				var ajax = $.ajax({
					url: geturi,
					type: "GET", 
					dataType: 'jsonp', 
				   	jsonp: 'jsoncallback',
					data: {keyword:input},
					cache: false
				});
				
				ajax.done(function(data){
					(that.ajaxHandler(input)).call(that, data);
				});
				
				ajax.fail(function(){
					return false;
				});
            };
            
            __constructor.prototype.ajaxHandler = function(inputHandler){
                if (!inputHandler) {
                    return null;
                }
                
                return function(ret){
                	ret = ret.suggestModel;
					//ret = $.parseJSON(ret);
                    if (!$.isArray(ret)) {
                        this.list.clear();
                        this.makeList();
                        return;
                    }
                    this.list.clear();
                    for (var i = 0, len = ret.length; i < len; i++) {
                        //这里特殊处理一下
						/*
                        this.list.add({
                            "Keyword": ret[i]
                        });
						*/
						this.list.add(ret[i]);
                    }
                    if (this.memorize.on) {
                        var input = inputHandler;
                        this.memorize.content[input] = this.list.get();
                        var maxcount = this.memorize.maxcount;
                        if (maxcount > 0) {
                            var indexer = this.memorize.indexer;
                            indexer.push(input);
                            if (indexer.length > maxcount) {
                                var f = indexer.shift();
                                delete this.memorize.content[f];
                            }
                        }
                    }
                    this.makeList();
                    return;
                };
            };
            
            __constructor.prototype.callback = function(ret){
                if (!$.isArray(ret)) {
                    this.list.clear();
                    this.makeList();
                    return;
                }
                var status = ret[0];
                this.list.clear();
                if (status == "SUCCESS") {
                    for (var i = 1, len = ret.length; i < len; i++) {
                        //这里特殊处理一下
                        this.list.add({
                            "Keyword": ret[i]
                        });
                    }
                }
                if (this.memorize.on) {
                    var input = this.getInput();
                    this.memorize.content[input] = this.list.get();
                    var maxcount = this.memorize.maxcount;
                    if (maxcount > 0) {
                        var indexer = this.memorize.indexer;
                        indexer.push(input);
                        if (indexer.length > maxcount) {
                            var f = indexer.shift();
                            delete this.memorize.content[f];
                        }
                    }
                }
                this.makeList();
                return;
            };
            
            __constructor.prototype.listener = function(obj, sec, fn){
                var _this = this, _sec = typeof sec == "number" ? sec : 25, _fn = typeof fn == "function" ? fn : function(){
                    var lastInput = _this.getInput(), currentInput = _this._bindObject.val();
                    if (lastInput != currentInput && !_this.isPaused()) {
                        clearTimeout(_this.timer.input);
                        _this.setInput(currentInput);
                        _this.setUserInput(currentInput);
                        _this.timer.input = null;
                        _this.timer.input = setTimeout(function(){
                            _this.ajax();
                        }, 380);
                    }
                };
                var timer = null;
                obj.focus(function(){
                    timer = setInterval(_fn, _sec);
                }).blur(function(e){
                    clearInterval(timer);
                    timer = null;
                });
                
                $(document).bind("click", function(e){
                    var e = e || window.event;
                    var inner = _this.dom.inner, lable = inner.lable.toLowerCase(), emlable = _this.dom.em.lable, tar = e.target || e.srcElement, tagname = tar.tagName.toLowerCase() || tar.nodeName.toLowerCase();
                    if (tagname != lable && tagname != emlable) {
                        _this.hideOuter();
                    }
                });
                return this;
            };
            
            __constructor.prototype.run = function(){
                if (this._bindObject == null) {
                    return this;
                }
                return this.listener(this._bindObject);
            };
            
            __constructor.prototype.bindMouse = function(){
                var outer = this.dom.outer.obj;
                if (outer == null || this._mouseBind) {
                    return;
                }
                var _this = this, inner = this.dom.inner, lable = inner.lable.toLowerCase(), focus = inner.focus, blur = inner.blur, emlable = this.dom.em.lable;
                outer.mouseover(function(event){
                    var e = event || window.event, tar = e.target || e.srcElement, tagname = tar.tagName.toLowerCase() || tar.nodeName.toLowerCase();
                    var $tar = $(tar);
                    if (tagname != lable) {
                        if (tagname == emlable) {
                            $tar = $tar.parent();
                        }
                        else {
                            return false;
                        }
                    }
                    if ($tar == _this._focusObject) {
                        return false;
                    }
                    else {
                        _this._blur(_this._focusObject);
                        _this._focus($tar);
                    }
                    return false;
                });
                outer.mouseout(function(){
                    _this._blur(_this._focusObject);
                });
                outer.click(function(event){
                    var e = event || window.event, tar = e.target || e.srcElement;
                    tagname = tar.tagName.toLowerCase() || tar.nodeName.toLowerCase(), $tar = $(tar);
                    if (tagname != lable) {
                        if (tagname == emlable) {
                            $tar = $tar.parent();
                        }
                        else {
                            return false;
                        }
                    }
					var $cateid = $tar.attr("cateid");
					if($cateid){
						_this.cateid = $cateid;
					}
					else{
						_this.cateid = 0;
					}
					
					var $brandno = $tar.attr("brandno");
                    if($brandno) {
                        _this.brandno = $brandno;
                        //window.location.href = "http://www.shangpin.com/women/brand/" + $brandno + "?suggest";
                        //return;
                    } else {
                        _this.brandno = 0;

                    }
					
					_this._focusData = $tar.data("FOCUSDATA");
					if(_this._focusData == undefined){
						_this._bindObject.val(_this._firstData.data("FOCUSDATA")).focus();
					}else{
						_this._bindObject.val(_this._focusData).focus();
					}
					_this._focusEvent && _this._focusEvent.call(_this);
                    
                    return false;
                });
                this._mouseBind = true;
            };
            
            __constructor.prototype.bindKey = function(){
                if (this._keyBind) {
                    return;
                }
                var _this = this;
                $(document).bind("keydown", function(event){
                    
					//console.log(_this.cateid);
					
					var list = _this.list.get();
                    if (list == null || list.length == 0) {
                        return;
                    }
                    else {
                        var e = event || window.event, keycode = e.keyCode || e.charCode;
                        //Down
                        if (keycode == "40") {
                            if ((_this._focusObject == null || _this._focusObject.length == 0) && _this._firstData != null) {
                                _this._focusBatch(_this._firstData,true);
                                return;
                            }
                            _this._blur(_this._focusObject);
                            var nextObject = _this._focusObject.next();
                            if (nextObject.length == 0) {
                                _this._focusUserInput();
                                return;
                            }
							//_this._focusBatch(nextObject);
							if(nextObject.data("FOCUSDATA") == undefined){
								_this._focusBatch(nextObject,false);
							}else{
								_this._focusBatch(nextObject,true);
							}
							
							var $cateid = $(_this._focusObject).attr("cateid");
							if($cateid){
								_this.cateid = $cateid;
							}
							else{
								_this.cateid = 0;
							}
							
							var $brandno = $(_this._focusObject).attr("brandno");
                            if($brandno) {
                                _this.brandno = $brandno;
                            } else {
                                _this.brandno = 0;
                            }
							
							_this._keyEvent && _this._keyEvent.call(_this);
                            
                            return;
                        }
                        //Up
                        if (keycode == "38") {
                            if ((_this._focusObject == null || _this._focusObject.length == 0) && _this._lastData != null) {
                                _this._focusBatch(_this._lastData,true);
                                return;
                            }
                            _this._blur(_this._focusObject);
                            var prevObject = _this._focusObject.prev();
                            if (prevObject.length == 0) {
                                _this._focusUserInput();
                                return;
                            }
                            //_this._focusBatch(prevObject);
							if(prevObject.data("FOCUSDATA") == undefined){
								_this._focusBatch(prevObject,false);
							}else{
								_this._focusBatch(prevObject,true);
							}
							
							
							var $cateid = $(_this._focusObject).attr("cateid");
							if($cateid){
								_this.cateid = $cateid;
							}
							else{
								_this.cateid = 0;
							}
							
							var $brandno = $(_this._focusObject).attr("brandno");
                            if($brandno) {
                                _this.brandno = $brandno;
                            } else {
                                _this.brandno = 0;
                            }
							
							_this._keyEvent && _this._keyEvent.call(_this);
							
                            return;
                        }
                        
                        return;
                    }
					
                });
                
                this._keyBind = true;
            };
            
            __constructor.prototype.bindFocusEvent = function(fn){
                this._focusEvent = fn;
				return this;
            };
			
			__constructor.prototype.bindKeyEvent = function(fn){
                this._keyEvent = fn;
				return this;
            };
            
            autoComplete.__constructor = __constructor;
        }
        
        return new autoComplete.__constructor(bindObject, relat);
    };
	
	SP.plug.autocomplete = function(inputel, relat, fn, fn2){
		return autoComplete(inputel, relat).bindFocusEvent(fn).bindKeyEvent(fn2).run();
	};
	
})(window, jQuery, SP, undefined);


/* E:\Shangpin\img.shangpincdn.com\shangpin\Scripts\live\dev\core\plug\lazyload.js */
/**
 * @author Macrox
 */
;
(function(window, $, SP){
    var extension = (function(){
        return {
            isInter: function(rec1, rec2){
                var lp1 = rec1.left + rec1.width / 2, lp2 = rec2.left + rec2.width / 2, tp1 = rec1.top + rec1.height / 2, tp2 = rec2.top + rec2.height / 2, w1 = (rec1.width + rec2.width) / 2, h1 = (rec1.height + rec2.height) / 2;
                return Math.abs(lp1 - lp2) < w1 && Math.abs(tp1 - tp2) < h1;
            },
            area: function(el){
                if (el == document) {
                    return {
                        left: document.documentElement.scrollLeft || document.body.scrollLeft,
                        top: document.documentElement.scrollTop || document.body.scrollTop,
                        width: document.documentElement.clientWidth || document.body.clientWidth,
                        height: document.documentElement.clientHeight || document.body.clientHeight
                    }
                }
                else {
                    return {
                        left: el.offset().left,
                        top: el.offset().top,
                        width: el.outerWidth(),
                        height: el.outerHeight()
                    }
                }
            }
        };
    })(), lazyIndex = 0, __lazyload__, Lazyload = function(el, fn, option){
        this.__indexer = lazyIndex++;
        this.__uid = new Date().getTime();
        this.lazy = [];
		var group = {};
		
        if (arguments.length > 0) {
            this.add(el, fn, option);
        }
		
		this.grouper = function(id, fn){
            if(typeof id === "undefined"){
                return group;
            }
            id = id || 0;
			if(typeof fn === "undefined"){
				return group[id] || null;
			}
            else{
                group[id] = fn;
                return fn;
            }
		};
    };
    
    Lazyload._defaultFunction = function(index){
        var el = this.elem, lazy = this.lazy, callback = this.callback, option = this.option, ext = extension, oel = ext.area(el), od = ext.area((option && option._container) && $(option._container) || document), that = this;
		if (ext.isInter(oel, od)) {
            setTimeout(function(){
                if (!that.loaded) {
                    that.loaded = true;
                    var tag = (el.attr("tagName") || el.prop("tagName") || "NT").toLowerCase();
                    if (lazy) {
                        if (tag == "img") {
                            el.bind("load", function(){
                                var o = $(this);
                                if (option && option.end) {
                                    option.end.call(o);
                                }
                            }).attr("src", lazy)
                        }
                        else {
                            $("<img>").bind("load", function(){
                                el.css({
                                    "background-image": "url(" + lazy + ")"
                                })
                                if (option && option.end) {
                                    option.end.call(el);
                                }
                            }).attr("src", lazy);
                        }
                    }
                    if (option && option.start) {
                        option.start.call(el);
                    }
                    if (!lazy) {
                        if (option && option.end) {
                            option.end.call(el);
                        }
                    }
                    callback && callback.call(that);
                }
            }, 0);
        }
    };
    
    Lazyload.prototype = {
    
        constructor: Lazyload,
        
        give: function(adder){
            this.lazy = this.lazy.concat(adder);
            return this;
        },
        
        add: function(el, fn, option){
            var that = this, container;
            if (option && option.container && $(option.container).length > 0) {
                container = option.container;
                delete option.container;
                option._container = container;
                this.add(container, function(){
                    that.__innerlazy__ = new that.constructor(el, fn, option).run(container);
					return that.__innerlazy__;
                });
                return this;
            }
            $(el).each(function(){
                var elem = $(this), lazy = elem.attr("lazy"), callback = fn;
                (lazy || callback) &&
                that.lazy.push({
                    "elem": elem,
                    "lazy": lazy,
                    "callback": callback,
                    "loaded": false,
                    "option": option
                });
                elem.removeAttr("lazy").data("LAZY_UID", that.__indexer + "_" + (++that.__uid));
            });
            return this;
        },
        
        group: function(container, el, id){
            var lazy = this.lazy, len = lazy.length, adder = [], o, that = this;
            $(el).each(function(){
                var that = $(this);
                for (var i = 0; i < len; i++) {
                    if (!(function(_i, _lazy){
                        var cur = _lazy[_i], sp;
                        if (cur && that.data("LAZY_UID") == cur.elem.data("LAZY_UID")) {
                            sp = _lazy.splice(_i, 1)[0];
                            sp.option = $.extend({}, sp.option, {
                                _container: container
                            });
                            adder.push(sp);
                            return false;
                        }
                        return true;
                    })(i, lazy)) {
                        return;
                    };
                }
            });
            
            this.add(container, function(){
                return that.grouper(id, new that.constructor().give(adder).run(container));
            });
            
            return this;
        },
        
        addFlash: function(el){
            return this.add(el, function(){
                var elem = this.elem, flashsrc = elem.attr("flashsrc");
                elem.append("<embed src=\"" + flashsrc + "\"></embed>");
            });
        },
        
        filter: function(){
            return this.lazy = $.grep(this.lazy, function(o){
                return !o.loaded;
            });
        },
        
        each: function(fn){
            var lazy = this.filter(), len = lazy.length, fn = fn || Lazyload._defaultFunction;
            if (len > 0) {
                for (var i = 0; i < len; i++) {
                    fn.call(lazy[i], i);
                }
            }
            return this;
        },
        
        run: function(container){
            var that = this;
            container = container || window;
            $(container).bind("scroll resize", function(){
                that.each();
            });
            that.each();
            return this;
        }
        
    };
    
    SP.plug.lazyload = function(el, fn, option){
        if (typeof __lazyload__ == "undefined") {
            __lazyload__ = new Lazyload(el, fn, option);
            setTimeout(function(){
                __lazyload__.run();
            }, 0);
        }
        else {
            __lazyload__.add(el, fn, option);
        }
        return __lazyload__;
    };
	
	SP.plug.lazyload.startNew = function(el, fn, option){
		var _lazyload = new Lazyload(el, fn, option);
        setTimeout(function(){
            _lazyload.run();
        }, 0);
		return _lazyload;
	};
	
})(window, jQuery, SP, undefined);


/* E:\Shangpin\img.shangpincdn.com\shangpin\Scripts\live\dev\core\plug\formcheck.js */
;(function(window, $, SP){
	var formcheck = (function(){
			var group = (function(){
					var col = {};
					return function(id){
						if(typeof col[id] == "undefined"){
							col[id] = [];
						}
						var group = col[id];
						return {
							add: function(setting){
								var ret = new single(setting, this);
								group.push(ret);
								return ret;
							},
							preventAll: function(){
								for(var i = 0, len = group.length; i < len; i ++){
									group[i].prevent = true;
								}
							},
							promiseAll: function(){
								for(var i = 0, len = group.length; i < len; i ++){
									group[i].prevent = false;
								}
							},
							checkAll: function(){
								var el;
								for(var i = 0, len = group.length; i < len; i ++){
									el = group[i];
									el.trySubmit = true;
									el.init();
								}
								for(var j = 0; j < len; j ++){
									el = group[j];
									el.check && el.check();
								}
							},
							each: function(fn){
								for(var i = 0, len = group.length; i < len; i ++){
									if(!group[i].isResolve()){
										return false;
									}
								}
								fn && fn.call(this, group);
								return true;
							},
							submit: function(fn){
								if (!this.submitLock) {
									this.submited = false;
									this.submitLock = true;
									this.onsubmit = fn;
									this.checkAll();
								}
							},
							onsubmit: null,
							submitLock: false,
							submited: false
						};
					}
				})(),
				jqWrap = function(el, isCheck){
					el = el instanceof $ ? el : $(el);
					if(isCheck && el.length ==0){
						return null;
					}
					return el;
				},
				single = function(setting, parent){
					this.elem = jqWrap(setting.elem, true);
					this.value = setting.value || function(){
						return this.elem.val();
					};
					this.eventType = setting.event || "blur";
					this.check = setting.check || null;
					this.done = setting.done || null;
					this.fail = setting.fail || null;
					this.message = null;
					this.status = -2;
					this.prevent = false;
					this.parent = parent || null;
					
					this.trySubmit = false;
					
					this.bind();
				};
			
			single.prototype = {
				constructor: single,
				
				init: function(msg){
					this.status = -1;
					this.message = msg || null;
				},
				
				resolve: function(msg){
					this.status = 1;
					this.message = msg || null;
					this.done && this.done.call(this);
					if(this.trySubmit && !this.parent.submited){
						if(this.parent.each()){
							this.parent.onsubmit && this.parent.onsubmit.call(parent);
							this.parent.submitLock = false;
							this.parent.submited = true;
						}
					}
					this.trySubmit = false;
				},
				
				reject: function(msg){
					this.status = 0;
					this.message = msg || null;
					this.fail && this.fail.call(this);
					this.trySubmit = false;
					this.parent.submitLock = false;
				},
				
				bind: function(){
					var that = this,
                        elem = this.elem;
					if (elem && elem.length > 0) {
						elem.bind(this.eventType, function(){
							if (that.prevent === false) {
								return that.check && that.check.call(that);
							}
						});
					}
				},
				
				isPrepare: function(){
					return this.status === -2;
				},
				
				isChecking: function(){
					return this.status === -1;
				},
				
				isReject: function(){
					return this.status === 0;
				},
				
				isResolve: function(){
					return this.status === 1;
				}
			};
			
			return {
				group: group
			}
		})();
	
	SP.plug.formcheck = formcheck;
})(window, jQuery, SP, undefined);

/*
 * todo
 * 
var group = SP.plug.formcheck.group("test");
group.add({
	elem: "#username",
	value: function(){
		return this.elem.val();
	},
	event: "blur",
	check: function(){
		this.init();
		var val = $.trim(this.value()),
			that = this;
		if (val == "") {
			this.reject("用户名不能为空");
		}
		else {
			setTimeout(function(){
				if (val == "macrox") {
					that.resolve("成功！");
				}
				else {
					that.reject("用户名不正确");
				}
			}, 2000);
		}
	},
	done: function(){
		console.log(this.message);
	},
	fail: function(){
		console.log(this.message);
	}
});
 */


/* E:\Shangpin\img.shangpincdn.com\shangpin\Scripts\live\dev\core\plug\valid.js */
;(function(window, $, SP){
	var valid = (function(){
		var reg = {
				email:  /^([\w]+[_|\_|\-|\.]?)*[\w]+@([\w]+[_|\_|\-|\.]?)*[\w]+\.[a-zA-Z]{2,3}$/,
				mobile: /^1\d{10}$/,
				isnumber: /^\d+$/,
                postcode: /^[0-9]{6}$/,
                phone: /^(0[0-9]{2,3}(\-)?)?([2-9][0-9]{6,7})+((\-|\*){1}[0-9]{1,6})?$/,
                ChsAndEnChar: /^[0-9a-zA-Z\u4E00-\u9FA5]$/
                
			},
			valid = function(val, type, fn, context){
				var regex = reg[type] || null,
					status = false;
					
				fn = $.isFunction(fn) ? fn : null;
				context = context || window;
				
				if(regex){
					status = regex.test(val);
				}
				else{
					status = true;
				}
				
				if(status && fn){
					return fn.call(context, val);
				}
				
				return status;
			};
		
		return valid;
	})();
	
	SP.plug.valid = valid;
})(window, jQuery, SP, undefined);


/* E:\Shangpin\img.shangpincdn.com\shangpin\Scripts\live\dev\core\plug\tabs.js */
// JavaScript Document
/* <![CDATA[ */
(function($) {
	function cur(ele,currentClass,tag) {
		ele= $(ele)? $(ele):ele;
		if(!tag) {
			ele.addClass(currentClass).siblings().removeClass(currentClass);
		} else {
			ele.addClass(currentClass).siblings(tag).removeClass(currentClass);
		}
	}

	$.fn.spTabs = function(options) {
		var org= {
			tabId: "",	//选择卡id
			tabTag: "",	//选择卡子标签 eg:li
			conId: "",	//内容id
			conTag: "",	//内容子标签 eg:div
			curClass: "cur",	//选择卡hover className
			loadTxt: '数据加载中...', //ajax等待字符串
			act: "click",	//鼠标事件 eg:mouseover
			dft: 0,	//默认初始显示位置 index
			effact: null,	//切换效果 eg:scrolly,scrollx,fade等，默认为show
			auto: false,	//自动轮播
			autotime: 3000,	//轮播间隔时间
			aniSpeed: 500	//动画执行时间
		};
		$.extend(org,options);
		var t=false;
		var k=0;
		var _this=$(this);
		var tagwrp=$(org.tabId);
		var conwrp=$(org.conId);
		var tag=tagwrp.find(org.tabTag);
		var con=conwrp.find(org.conTag);
		var len=tag.length;
		var taght=parseInt(tagwrp.css("height"));
		var conwh=conwrp.get(0).offsetWidth;
		var conht=conwrp.get(0).offsetHeight;
		var curtag=tag.eq(org.dft);
		//prepare
		cur(curtag,org.curClass);
		con.eq(org.dft).show().siblings(org.conTag).hide();
		if(org.effact=="scrollx") {
			var padding=parseInt(con.css("padding-left"))+parseInt(con.css("padding-right"));
			_this.css({
				"position" :"relative",
				"height" :taght+conht+"px",
				"overflow" :"hidden"
			});
			conwrp.css({
				"width" :len*conwh+"px",
				"height" :conht+"px",
				"position" :"absolute",
				"top" :taght+"px"
			});
			con.css({
				"float" :"left",
				"width" :conwh-padding+"px",
				"display" :"block"
			});
		}
		if(org.effact=="scrolly") {
			var padding=parseInt(con.css("padding-top"))+parseInt(con.css("padding-bottom"));
			_this.css({
				"position" :"relative",
				"height" :taght+conht+"px",
				"overflow" :"hidden"
			});
			tagwrp.css({
				"z-index" :100
			})
			conwrp.css({
				"width" :"100%",
				"height" :len*conht+"px",
				"position" :"absolute",
				"z-index" :99
			})
			con.css({
				"height" :conht-padding+"px",
				"float" :"none",
				"display" :"block"
			});
		}
		tag.each( function(i) {
			tag.eq(i).bind(org.act, function() {
				cur(this,org.curClass);
				k=i;
				
				function ajax(div, li) {
					var i = div; //当前div
					var rel = li.attr("rel"); //ajax请求url
					
					if (rel) { //如果ajax请求url不为空
						i.html(org.loadTxt);
						$.ajax({
							url: rel,
							cache: false,
							success: function (html) {
								i.html(html);
								i.attr("changed","true");
							},
							error: function () {
								i.html("数据加载错误，请重试！");
							}
						});
					}
				}
				
				if (tag.eq(i).attr("rel")){
					ajax(con.eq(i), tag.eq(i));
				}
				
				if(con.eq(i).attr("changed")=="true"){
					tag.eq(i).removeAttr("rel");//只加载一次
				}
				
				switch(org.effact) {
					case "slow" :
						con.eq(i).show("slow").siblings(org.conTag).hide("slow");
						break;
					case "fast" :
						con.eq(i).show("fast").siblings(org.conTag).hide("fast");
						break;
					case "scrollx" :
						conwrp.animate({
							left:-i*conwh+"px"
						},org.aniSpeed);
						break;
					case "scrolly" :
						conwrp.animate({
							top:-i*conht+taght+"px"
						},org.aniSpeed);
						break;
					case "fade" :
						con.eq(i).fadeIn(org.aniSpeed).siblings(org.conTag).hide("fast");
						break;
					default :
						con.eq(i).show().siblings(org.conTag).hide();
						break;
					//End of switch
				}
			}
			)
		})

		if(org.auto) {
			var drive= function() {
				if(org.act=="mouseover") {
					tag.eq(k).mouseover();
				} else if(org.act=="click") {
					tag.eq(k).click();
				}
				k++;
				if(k==len)
					k=0;
			}
			t = setInterval(drive,org.autotime);
			//鼠标滑过停止滚动
			$(org.conTag).hover(function(){
				clearInterval(t);
			},function(){
				t = setInterval(drive,org.autotime);
			});
		}
		//End of $.fn.spTabs
	}
})(jQuery);
/* ]]> */

/* E:\Shangpin\img.shangpincdn.com\shangpin\Scripts\live\dev\statistics.js */
//var gStatHost = "http://img20.shangpin.com";
//var urlReferere = document.referrer;
//var rawUrl = window.location;

////document.write("<iframe style='display:none' src='" + gStatHost + "/st.aspx?url="+ escape(rawUrl) +"&ref="+ escape(urlReferere) +"' width=\"0\" height=\"0\" marginwidth=\"0\" marginheight=\"0\"></iframe>");



/* E:\Shangpin\img.shangpincdn.com\shangpin\Scripts\live\dev\core\plug\storage.js */
/**
 * Created with JetBrains WebStorm.
 * User: MacroXing
 * Date: 12-12-13
 * Time: 下午2:47
 * To change this template use File | Settings | File Templates.
 */
(function (window, $, SP) {
    var storage = (function () {
        var isSupport = "localStorage" in window,
            storage = function () {
                this._data = isSupport ? window.localStorage : (function () {
                    try {
                        var host = window.location.hostname,
                            sto = document.createElement("input");
                        sto.type = "hidden";
                        sto.style.display = "none";
                        sto.style.position = "absolute";
                        sto.addBehavior("#default#userData");
                        document.body.appendChild(sto);
                        return {
                            getItem: function (key) {
                                sto.load(host);
                                return sto.getAttribute(key);
                            },
                            setItem: function (key, value) {
                                sto.load(host);
                                sto.setAttribute(key, value);
                                sto.save(host);
                                return true;
                            },
                            removeItem: function (key) {
                                sto.load(host);
                                sto.removeAttribute(key);
                                sto.save(host);
                                return true;
                            }
                        };
                    }
                    catch (ex) {
                        return { getItem: function (key) { return ""; }, setItem: function (key, value) { return false; }, removeItem: function (key) { return false; } };
                    }
                })();
            };
        storage.prototype = {
            constructor: storage,
            get: function (key) {
                return this._data.getItem(key);
            },
            set: function () {
                var key = arguments[0] || false,
                    val,
                    argslen = arguments.length;
                if (argslen == 2) {
                    val = arguments[1];
                }
                if (Object.prototype.toString.call(key) === "[object Object]") {
                    for (var k in key) {
                        this.set(k, key[k]);
                    }
                    return true;
                }
                else {
                    if (typeof key === "string" && typeof val === "string") {
                        return this._data.setItem(key, val);
                    }
                }
                return false;
            },
            remove: function (key) {
                return this._data.removeItem(key);
            }
        };

        return function () {
            return new storage();
        };
    })();

    SP.plug.storage = storage;
})(window, jQuery, SP, undefined);

/* ERROR: missing variable name */