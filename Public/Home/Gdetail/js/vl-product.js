;(function ($) {
/**
* zoom plugin
*
* @namespace VL
* @type {Class}
* @module VL
*/
VL.Zoom = function (jBox, arg) {
	if (!jBox) {return}
	this.jBox = $(jBox);
	this.handleCfg(arg);
	this.ini();
};

VL.Zoom.prototype = {
	handleCfg: function (arg) {
		var jBox = this.jBox,
			smallImg = jBox.data('small-img'),
			bigImg = jBox.data('big-img');
		arg = arg || {};
		if (smallImg) {arg.smallImg = smallImg}
		if (bigImg) {arg.bigImg = bigImg}
		this.cfg = $.extend({
      time: 2,
      c: 620 / 500
    }, arg);
	},
	create: function () {
		var html = 
			'<div class="cmZoom">' + 
				'<div class="small-img-box"><img class="small-img" src="" /><div class="range-box"></div></div>' + 
				'<div class="big-img-box"><div class="zoom-block"><img class="big-img" src="" /></div></div>' +
			'</div>';
		this.jBox.append(html);
		this.jZoomBox = this.jBox.find('.cmZoom');
		this.jSmallBox = this.jBox.find('.small-img-box');
		this.jRangeBox = this.jSmallBox.find('.range-box');
		this.jSmallImg = this.jSmallBox.find('img');
		this.jBigBox = this.jBox.find('.big-img-box');
		this.jBigImg = this.jBigBox.find('img');
		this.jZoomBlock = this.jBigBox.find('.zoom-block');
		this.getXYData();
		this.update();
	},
	getXYData: function () {
		this.smallBoxWidth = this.jSmallBox.width();
		this.smallBoxHeight = this.cfg.c * this.smallBoxWidth;
		this.bigBoxWidth = this.smallBoxWidth;//this.jBigBox.width();
		this.bigBoxHeight = this.smallBoxHeight;//this.jBigBox.height();
		this.zoomBlockWidth = this.bigBoxWidth * this.cfg.time;
		this.zoomBlockHeight = this.bigBoxHeight * this.cfg.time;
    this.jZoomBlock.width(this.zoomBlockWidth);
    this.jZoomBlock.height(this.zoomBlockHeight);
    this.rangeBoxWidth = this.smallBoxWidth / this.cfg.time;
		this.rangeBoxHeight = this.cfg.c * this.rangeBoxWidth;
    this.jRangeBox.width(this.rangeBoxWidth).height(this.rangeBoxHeight);
	},
	update: function (arg) {
		this.cfg = $.extend(this.cfg, arg || {});
		this.jSmallImg.attr('src', this.cfg.smallImg);
		this.jBigImg.attr('src', this.cfg.bigImg);
	},
	move: function (e) {
		e = e || window.event;
		this.smallBoxOffset = this.jSmallBox.offset();
		var xy = [e.clientX - this.smallBoxOffset.left, e.clientY + $(window).scrollTop() - this.smallBoxOffset.top],
			w = this.rangeBoxWidth / 2,
			h = this.rangeBoxHeight / 2,
			left = 0,
			top = 0;
		if (xy[0] - w <= 0) {
			left = 0;
		} else if (xy[0] + w > this.smallBoxWidth) {
			left = this.smallBoxWidth - this.rangeBoxWidth;
		} else {
			left = xy[0] - w;
		}
		
		if (xy[1] - h <= 0) {
			top = 0;
		} else if (xy[1] + h - 1 > this.smallBoxHeight) {
			top = this.smallBoxHeight - this.rangeBoxHeight;
		} else {
			top = xy[1] - h;
		}
		
		this.jRangeBox.css({
			left: left,
			top: top
		});
    
		this.jBigImg.css({
			left: -1 * left * this.cfg.time,
			top: -1 * top * this.cfg.time
		});
		
	},
	bind: function () {
		var that = this;
		this.jBox.hover(function () {
			that.jZoomBox.toggleClass('cmZoom-active');
		});
		this.jBox.on('mousemove', function (e) {
			that.move(e);
		});
	},
  resize: function () {
    this.getXYData();
  },
	ini: function () {
		this.create();
		this.bind();
	}
};

VL.productConfig = function (spConfig, arg) {
	this.cfg = spConfig || {};
	this.basePrice = this.cfg.basePrice;
	this.oldPrice = this.cfg.oldPrice;
	this.pid = this.cfg.productId || $('input[name="product"]').val();
	this.attrs = this.cfg.attributes;
	this.singlePrice = 0;
	this.oldSinglePrice = 0;
	this.handle(arg);
	this.ini();
};

VL.productConfig.prototype = {
	handle: function (arg) {
		arg = arg || {};
		this.cfg = $.extend({}, this.cfg, arg);
	},
	get: function () {
		var p = $('#product_addtocart_form');
		this.jForm = p;
		this.jColor = p.find('.color');
		this.jSize = p.find('.size');
		this.jPrice = p.find('.price-label');
		this.jOldPrice = p.find('.old-price-label');
		this.jDiscount = p.find('.price-off');
		this.jDiscountNumber = this.jDiscount.find('.discount-label');
		this.jListPrice = p.find('.list-price-label');
		this.jBuy = p.find('#to_buy');
    this.jStore = p.find('.to-try');
    this.jProductName = p.find('.product-name');
    this.oldName = this.jProductName.text();
    this.collectBtn = $('.collect');
	},
	_getIdArray: function (arr) {
		var result = [],
			i = 0,
			l = arr.length;
		for (i; i < l; i++) {
			if (arr[i].qty) {
				result.push(arr[i].product_id);
			}
		}
		return result;
	},
	_setSize: function () {
		var selectedColor = this.jColor.find('li').filter('.selected'),
			jSizeBox = this.jSize.find('.attr-values'),
			sizeId = this.jSize.data('attr-id'),
			colorId = this.jColor.data('attr-id'),
			attr = this.attrs,
			i = 0,
			j = 0,
			l = 0,
			len = 0,
			id = '',
			temp = null,
			opt = null,
			currentProducts = [],
			result = 0;
		
    //释放选择尺码时disable的颜色
    this.jColor.find('.attr-values').find('li').removeClass('disabled');
    
    if (!this.attrs) {return}
		/******get big images | get product info*****/
		var opt = this.attrs[colorId].options,
			pImgs = null,
      proInfo = {},
			i = 0,
			j = 0,
			len = 0,
			l = opt.length,
			r = [];
		for (i; i < l; i++) {
			pImgs = opt[i].products;
			j = 0;
			len = pImgs.length;
			if (opt[i].id == selectedColor.data('id')) {
        proInfo.care = opt[i].care || '';
        proInfo.info = opt[i].info || '';
				for (j = 0; j < len; j++) {
					if (pImgs[j].images.length > 0) {
						r = pImgs[j].images;
						break;
					}
				}
			}
		}
    
    this.updateProductInfoContent(proInfo);
    
		i = 0;
		l = r.length;
		var html = '',
        imgLIstObj = null;
		for (i; i < l; i++) {
			html += '<li><div class="i-box"><img src="' + r[i] + '" /></div></li>';
		}
		if (html !== '') {
      imgLIstObj = $('.left-side .img-list');
      imgLIstObj.html(html);
      VL.product.imgCarouseler.to(0);
      VL.product.resizeZoom();
      VL.product.selectFirstZoomImage();
      //set mars_sead_hover on zoom picture
      $('.big-img-box').attr('mars_sead_hover', '220|10|27305|1');
      imgLIstObj.find('li').each(function (i, o) {
        $(o).attr('mars_sead_hover', '220|10|27306|' + (i + 1));
      });
    }
		
		this.jColor.find('.super_attribute_hidden').val(selectedColor.data('id'));
		
    /*get current product array*/
		if (this.jColor[0] && selectedColor[0]) {
			opt = attr[colorId].options;
			id = selectedColor.data('id');
			l = opt.length;
			for (i = 0; i < l; i++) {
				temp = opt[i];
				if (temp.id == id) {
				  currentProducts = temp.products;
          this.currentColorOption = temp;
          this.currentColorProducts = currentProducts;
				  break;
				}
			}
      
			currentProducts = this._getIdArray(currentProducts);
			opt = attr[sizeId].options;
			l = opt.length;
			for (i = 0; i < l; i++) {
				temp = opt[i].products;
				id = opt[i].id;
				len = temp.length;
				for (j = 0; j < len; j++) {
				  if ($.inArray(temp[j].product_id, currentProducts) < 0) {
					result = 0;
				  } else {
					result = 1;
					break;
				  }
				}

				if (result) {
				  jSizeBox.find('li[data-id="' + id + '"]').removeClass('disabled');
				} else {
				  jSizeBox.find('li[data-id="' + id + '"]').removeClass('selected').addClass('disabled');
				}
			}
		}
		
		this.pid = this.getSampleProductId();
		this.setDetailInfo();
	},
  updateProductInfoContent: function (args) {
    var s = $('.product-info');
    s.find('ul').html(args.info);
    s.next().find('.ddl').html(args.care);
  },
	_setColor: function () {
		var selectedSize = this.jSize.find('li').filter('.selected'),
        jColorBox = this.jColor.find('.attr-values'),
        sizeId = this.jSize.data('attr-id'),
        colorId = this.jColor.data('attr-id'),
        attr = this.attrs,
        i = 0,
        j = 0,
        l = 0,
        len = 0,
        id = '',
        temp = null,
        opt = null,
        currentProducts = [],
        result = 0;
		this.jSize.find('.super_attribute_hidden').val(selectedSize.data('id'));
		if (!this.attrs) {return}
		opt = attr[sizeId].options;
		id = selectedSize.data('id');
		l = opt.length;
		for (i = 0; i < l; i++) {
			temp = opt[i];
			if (temp.id == id) {
				currentProducts = temp.products;
				break;
			}
		}
		currentProducts = this._getIdArray(currentProducts);
		
		opt = attr[colorId].options;
		l = opt.length;
		for (i = 0; i < l; i++) {
			temp = opt[i].products;
			id = opt[i].id;
			len = temp.length;
			for (j = 0; j < len; j++) {
				if ($.inArray(temp[j].product_id, currentProducts) < 0) {
					result = 0;
				} else {
					result = 1;
					break;
				}
			}
			//Alex
//			if (result) {
//			  jColorBox.find('li[data-id="' + id + '"]').removeClass('disabled');
//			} else {
//			  jColorBox.find('li[data-id="' + id + '"]').addClass('disabled');
//			}
		}
		
		this.pid = this.getSampleProductId();
		this.setDetailInfo();
	},
  getPriceHtml: function (d) {
    return '<small>¥</small>' + VL.str.numberToFullPrice(d).slice(2).split('.')[0];
  },
	setDetailInfo: function () {
    //预约店铺仅关联在简单产品上
    var obj = this.currentProduct;
    this.jStore.hide();
    if (obj) {
      //show store
      var subs = obj.subscribes;
      if (subs.count === 0) {
        this.jStore.hide();
      } else {
        this.jStore.show().find('.store-num').html(subs.count);
        
        var i = 0,
            l = subs.count,
            html = '',
            temp = null,
            str = '',
            mpl = $('.maplist'),
            tempHtml = '',
            mobj = {},
            list = [];
        for (i; i < l; i++) {
          temp = subs.shops[i];
          mobj = {};
          tempHtml = '';
          str = this._getShopLabel(temp.shop_id);
          tempHtml += '<dl><dt>';
          tempHtml += '<span class="mp_point mp_point_' + str + '" data-addr="' + temp.address + '" data-phone="' + temp.telephone + '" data-storename="' + temp.shop_name + '" data-pointx="' + temp.longitude + '" data-pointy="' + temp.latitude + '" data-id="' + temp.sku + '" data-open="' + temp.opened_time + '" data-shopid="' + temp.shop_id + '">' + str + '</span>' + temp.shop_name;
          tempHtml += '</dt></dl>';
          mobj.label = str;
          mobj.html = tempHtml;
          list.push(mobj);
        }
        mpl.find('dl').remove();
        html = this._getOrderHtml(list);
        mpl.append(html);
        //mpl.find('dl').eq(0).trigger('click');
        
      }
    }
    
    //其他信息可以关联在简单产品或者颜色的第一个产品上
    obj = this.currentProduct || this.currentColorProducts[0];
		if (obj) {
      var oldPrice = obj.msrp,
          finalPrice = obj.price,
          discount = obj.discount
      if (finalPrice === oldPrice) {
        this.jPrice.html(this.getPriceHtml(oldPrice)).parent().removeClass('hide-price');
        this.jDiscount.hide();
        this.jOldPrice.html('');
        //还原查看VIP价
        this.jDiscount.before(this.jPrice)
      } else if (oldPrice === 0) {
        this.jPrice.html(this.getPriceHtml(finalPrice)).parent().removeClass('hide-price');
        this.jDiscount.hide();
        this.jOldPrice.html('');
        //还原查看VIP价
        this.jDiscount.before(this.jPrice)
      } else {
        if (!VL.isLogin) {
          this.jDiscount.hide();
          this.jPrice.html('<span class="not-login">查看VIP价</span>').parent().addClass('hide-price');
          this.jOldPrice.html(this.getPriceHtml(oldPrice));
          //倒装查看VIP价
          $('.market-price').after(this.jPrice)
        } else {
          this.jPrice.html(this.getPriceHtml(finalPrice)).parent().removeClass('hide-price');
          this.jOldPrice.html(this.getPriceHtml(oldPrice));
          if (!obj.hide_discount && discount !== 10) {
            this.jDiscount.show().find('.discount-label').html(discount);
          } else {
            this.jDiscount.hide();
          }
          //还原查看VIP价
          this.jDiscount.before(this.jPrice)
        }
      }
      
      var alexLen = this.currentColorProducts.length;
      var alexFlag = false;
      for (var alex = 0; alex < alexLen; alex++){
    	  if (this.currentColorProducts[alex].isSaleable){
    		  alexFlag = true;
    		  break;
    	  }
      }
    
      //if obj isSaleable === false, disable addToCart button
      //when color's attr 'is_o2o_only' is true, disable button
      if (this.cfg.is_o2o_only) {
        this.jBuy.addClass('disabled');
      } else {
        if (alexFlag === false) {
          this.jBuy.addClass('disabled');
        } else {
          this.jBuy.removeClass('disabled');
        }
      }
      
      //exchange product name
      this.jProductName.text(obj.product_name);
      document.title = $('.brand').text() + '，' + $('.product-name').text() + '|唯风尚';
      
      //售罄状态，颜色可选中，交互显示选中状态，尺码disable状态且不可选中
      //售罄状态，商品图片显示“已售罄”
      if (alexFlag === false) {
        //this.jSize.find('.attr-values').find('li').not('.size-table-btn').addClass('disabled');
        var zoomBox = $('.zoom-box');
        if (!zoomBox.find('out-of-stock')[0]) {
          zoomBox.append('<div class="out-of-stock">已售罄</div>');
        }
      } else {
        $('.zoom-box').find('.out-of-stock').remove();
      }
		}
    
    VL.product.updateShare(this.currentColorOption);
	},
  _getOrderHtml: function (arr) {
    arr = arr.sort(function (a, b) {
      return a.label > b.label ? 1 : -1;
    });
    var html = '',
        i = 0,
        l = arr.length;
    for (i; i < l; i++) {
      html += arr[i].html;
    }
    return html;
  },
  _getShopLabel: function (id) {
    if (window.shopsJson) {
      if (!this.shopObj) {
        var d = shopsJson.data,
            l = d.length,
            i = 0,
            result = {};
        for (i; i < l; i++) {
          result[d[i].shop_id] = d[i].label;
        }
        this.shopObj = result;
      }
      return this.shopObj[id];
    }
  },
	/*_listenLogin: function () {
		var that = this;
		setTimeout(function () {
			if (that.loginStatus !== VL.isLogin) {
				that.setDetailInfo();
        that.loginStatus = VL.isLogin;
        if (VL.isLogin) {
          location.reload();
        }
			}
			that._listenLogin();
		}, 1000);
	},*/
	addToCart: function () {
		var that = this,
			btn = this.jBuy,
			sizeId = this.jSize.data('attr-id'),
			colorId = this.jColor.data('attr-id');
    this.pid = this.getSampleProductId();
    if (btn.hasClass('disabled')) {return}
    if (!VL.isLogin) {
      $('.login-btn').trigger('click');
      return
    }
		if (this.pid === '') {
			this.jBuy.next().text('请选择尺码').show();
			return
		} else {
      this.jBuy.next().text('').hide();
    }
    
		if (btn.hasClass('posting')) {return}
		btn.addClass('posting');
		$('#sample_product_id').val(this.pid);
      $.ajax({
        url: this.jForm.attr('action'),
        type: 'POST',
        dataType: 'json',
        data: this.jForm.serialize(),
        success: function (d) {
          btn.removeClass('posting');
          if (d.status && d.type === 'success') {
            //VL.alert.open('添加成功', 'success');
            VL.header.getCart();
            that.showAddSuccessBox();
          } else {
            //VL.alert.open('添加失败', 'error');
            that.jBuy.next().html(d.msg).show();
          }
        },
        error: function (err) {
          btn.removeClass('posting');
          //VL.alert.open('网络出现问题，添加失败', 'error');
          VL.log(err);
        }
      });
		
	},
	showAddSuccessBox: function () {
		var that = this,
        obj = $('.add-cart-success'),
        top = ($('body').hasClass('middleSize') ? -67 : -40) + ($('.notification')[0] ? 0 : 35);
    $('body').addClass('showAddCartSuccess');
		obj.stop().css({
			top: 0,
			opacity: 0
		}).animate({
			top: top,
			opacity: 1
		}, 300);
		if (this.clearBoxTimer) {clearTimeout(this.clearBoxTimer)}
		this.clearBoxTimer = setTimeout(function () {
			that.hideAddSuccessBox();
		}, 3000);
	},
	hideAddSuccessBox: function () {
		$('.add-cart-success').stop().animate({
			top: -999,
      opacity: 0
		}, 300, function () {
      $('body').removeClass('showAddCartSuccess');
    });
	},
	getSampleProductId: function () {
		var sizeValue = this.jSize.find('li').filter('.selected').data('id'),
        colorValue = this.jColor.find('li').filter('.selected').data('id'),
        sizeId = this.jSize.data('attr-id'),
        colorId = this.jColor.data('attr-id'),
        attr = this.attrs,
        options = null,
        i = 0,
        j = 0,
        l = 0,
        len = 0,
        temp = null,
        currentProducts = [],
        result = '';
		if (!this.attrs) {return}
		if (colorValue !== '' && sizeValue !== '') {
		  options = this.attrs[colorId].options;
		  l = options.length;
		  for (i; i < l; i++) {
        if (options[i].id == colorValue) {
          currentProducts = options[i].products;
          break;
        }
		  }
		  currentProducts = this._getIdArray(currentProducts);
		  options = this.attrs[sizeId].options;
		  i = 0;
		  l = options.length;
		  for (i; i < l; i++) {
        if (options[i].id == sizeValue) {
          temp = options[i].products;
          len = temp.length;
          for (j; j < len; j++) {
            if ($.inArray(temp[j].product_id, currentProducts) >= 0) {
              result = temp[j].product_id;
              this.currentProduct = temp[j];
              break;
            }
          }
        }
		  }
		}
		if (result === '') {this.currentProduct = null}
		return result;
	},
	bind: function () {
		var that = this;
		this.jSize.find('li').on('click', function () {
			var s = $(this);
			if (s.hasClass('out-of-stock') || s.hasClass('disabled') || s.hasClass('size-table-btn')) {return}
			if (s.hasClass('selected')) {
				s.removeClass('selected');
				that.jColor.find('li').removeClass('disabled');
				that.currentProduct = null;
				that.setDetailInfo();
				return
			}
			that.jSize.find('li').removeClass('selected');
			s.addClass('selected');
			that._setColor();
			return false;
		});
		
		this.jColor.find('li').on('click', function () {
			var s = $(this);
			if (s.hasClass('selected')) {return}
			that.jColor.find('li').removeClass('selected');
			s.addClass('selected');
			that._setSize();
			return false;
		});
		
		this.jForm.on('submit', function (e) {
      e.preventDefault();
      if (that.jBuy[0]) {
        that.addToCart();
      }
		});
		
    $('.add-cart-success').hover(function () {
      if (that.clearBoxTimer) {clearTimeout(that.clearBoxTimer)}
    }, function () {
      that.clearBoxTimer = setTimeout(function () {
        that.hideAddSuccessBox();
      }, 3000);
    });
    
    $('.right-side').on('click', '.not-login', function () {
      VL.header.openLoginDialog();
    });
  
    this.collectBtn.on('click', function () {
      var s = $(this);
      if (s.hasClass('disable')) {return}
      s.addClass('disable');
      if (s.hasClass('on')) {
        that.removeCollect();
      } else {
        if (!VL.isLogin) {
          VL.header.openLoginDialog();
        } else {
          that.addCollect();
        }
      }
    });
  },
  removeCollect: function () {
    var btn = this.collectBtn,
        sku = btn.attr('data-sku');
    $.ajax({
      type: 'GET',
      dataType: 'json',
      url: '/vipluxwishlist/index/remove?products=' + sku,
      success: function (d) {
        if (d.code === 0) {
          btn.removeClass('on disable');
        } else {
          btn.removeClass('disable');
        }
      },
      error: function () {
        btn.removeClass('disable');
      }
    })
  },
  addCollect: function () {
    var btn = this.collectBtn,
        sku = btn.attr('data-sku');
    $.ajax({
      type: 'POST',
      dataType: 'json',
      data: {sku: sku},
      url: '/vipluxwishlist/index/add',
      success: function (d) {
        if (d.code === 0) {
          btn.removeClass('disable');
          btn.addClass('on');
        } else {
          btn.removeClass('disable');
        }
      },
      error: function () {
        btn.removeClass('disable');
      }
    })
  },
	setAttr: function () {
		var attrs = this.attrs,
			code = '',
			option = null,
			html = '',
			src = '',
      label = '',
			temp = null,
			i = 0,
			j = 0,
			len = 0,
			l = 0;
			
		for (code in attrs) {
			if (attrs[code].code === 'color') {
				option = attrs[code].options;
				i = 0;
				l = option.length;
				html = '';
				for (i; i < l; i++) {
					temp = option[i];
					len = temp.products ? temp.products.length : 0;
					j = 0;
					for (j; j < len; j++) {
						if (temp.products[j].has_thumbnail) {
							src = temp.products[j].thumbnail;
              label = temp.label || '';
							break;
						}
					}
					html += '<li class="' + (!temp.isSaleable ? 'disabled' : '') + '" data-id="' + temp.id + '"><img title="' + label + '" alt="' + label + '" src="' + src + '"><b title="' + label + '"></b></li>';
				}
        
				html += '<input type="hidden" value="" name="super_attribute[' + code + ']" class="super_attribute_hidden selected" id="super_attribute_' + code + '" />';
				this.jColor.find('.attr-values').append(html);
			}
			if (attrs[code].code === 'size') {
				option = attrs[code].options;
				i = 0;
				l = option.length;
				html = '';
				for (i; i < l; i++) {
					temp = option[i];
					html += '<li class="' + (!temp.isSaleable ? 'disabled' : '') + '" data-id="' + temp.id + '">' + temp.label + '</li>';
				}
        
        //html += '<li class="size-table-btn">尺码表</li>';
        
				html += '<input type="hidden" value="" name="super_attribute[' + code + ']" class="super_attribute_hidden selected" id="super_attribute_' + code + '" />';
				this.jSize.find('.attr-values').prepend(html);
			}
		}
	},
  getFirstProduct: function () {
    var jColor = null;
    if (typeof selectedColorId !== 'undefined') {
      jColor = this.jColor.find('li[data-id="' + selectedColorId + '"]');
    } else {
      jColor = this.jColor.find('li').eq(0);
    }
    jColor.trigger('click');
    
    var jSize = this.jSize.find('li').not('.size-table-btn');
    if (jSize.length === 1 && !jSize.hasClass('disabled') && !jSize.hasClass('out-of-stock')) {
      jSize.trigger('click');
    }
  },
	handleOversea: function () {
    if (this.cfg.is_overseas) {
      var html = 
          '<div class="pop">' +
            '<div class="pop-layout">' +
              '<p class="title">海外直发商品<br/>请在手机客户端直接支付</p>' +
              '<p>扫一扫下载二维码</p>' +
              '<div class="qrcode">' +
                '<a target="_blank" href="//www.viplux.com/site/page?view=client"><img title="扫一扫下载二维码" src="//lux.vipstatic.com/magento/skin/frontend/default/viplux/images/global/qrcode.png" class="code-img"></a>' +
              '</div>' +
              '<span class="arr"></span>' +
            '</div>' +
          '</div>';
      //this.jBuy.addClass('disabled');
      this.jBuy.parent().append(html);
      this.jBuy.hover(function () {
        var s = $(this),
            wh = $(window).height(),
            h = s.height(),
            top = s[0].getBoundingClientRect().top + h;
        if (wh - top < 262) {
          s.parent().find('.pop').addClass('up-pop').toggle();
        } else {
          s.parent().find('.pop').removeClass('up-pop').toggle();
        }
      });
    }
  },
  ini: function () {
		this.get();
		this.setAttr();
		this.bind();
    //this.loginStatus = VL.isLogin;
    //this._listenLogin();
    this.getFirstProduct();
    this.handleOversea();
	}
};

//for page
VL.product = {
	ini: function () {
    var that = this;
    //share
		var obj = $('.share'),
			uid = obj.data('uid'),
			pic = $('#product-images').find('img').eq(0).attr('src'),
			cid = VL.cookie.get('mars_cid'),
			url = obj.data('url');
    
    this.mobileCheck = false;
    ;(function () {
      var ua = navigator.userAgent;
      if (ua.match(/Android/i) || ua.match(/webOS/i) || ua.match(/iPhone/i) || ua.match(/iPad/i) || ua.match(/iPod/i) || ua.match(/BlackBerry/i) || ua.match(/Windows Phone/i)) {
        VL.product.mobileCheck = true;
      }
    }());
    
    //resize
    VL.resizeHandler([{
      size: 1024,
      cla: 'tiny-size',
      onChange: function () {
        var box = $('.items'),
            bw = $('.hot-brand').width(),
            w = 0;
        setTimeout(function () {
          if ($('body').hasClass('tiny-size')) {
            w = Math.floor(bw / 3);
            box.find('li').width(w);
            box.width(bw);
            that.carouseler.refresh();
          } else {
            w = Math.floor(bw / 4);
            box.find('li').width(w);
            box.width(bw);
            that.carouseler.refresh();
          }
        }, 100);
      }
    }]);
    
    //zoomer
    this.zoomer = new VL.Zoom('.zoom-box');
    
    //handle images scroll
    this.imgCarouseler = new VL.Carousel($('.img-list'), {
      unit: 1
    });
    
    //config
		this.handler = new VL.productConfig(window.vipConfigJson);
    
    //event bind
    this.bind();
    
    this.selectFirstZoomImage();
    
    //hot brand scroll init
    this.handleHotBrand();
    
    //store map init
    this.handleMap();
    
    //公告栏埋点
    $('.notification').attr('mars_sead', '292|10|14775|1');
    
	},
  updateShare: function (colorOption) {
    var obj = $('.share'),
        uid = obj.data('uid'),
        cid = VL.cookie.get('mars_cid'),
        p = colorOption || {},
        sku = p.item_color_no || ''
    obj.off();
    VL.shareToSNS.iniStatus = false;
    VL.shareToSNS.isSetedUrls = false;
    VL.shareToSNS.ini(obj, {
      title: '我在@VIPLUX唯风尚 看【' + $.trim($('.brand').text()) + ' ' + $.trim($('.product-name').text()) + '】，分享给大家，快去看看吧！网页链接：' + 'http://m.viplux.com/product/detail?sku=' + sku,
      url: 'http://m.viplux.com/product/detail?sku=' + sku + '&ff=220|10|27296|1',
      pic: 'http://lux.vipstatic.com/images/global/qrcode-weibo.png'//pic
    });
  },
  handleMap: function () {
    var map = null, point = null, _dataMap = {};

    $('.maplist').on('click', 'dl', function(){
        var span = $('span', $(this));
        point = new BMap.Point(parseFloat(span.data('pointx')), parseFloat(span.data('pointy')));
        map.panTo(point);
        
        var i = '';
        for (i in _dataMap) {
          _dataMap[i].setTop(false);
        }
        
        var shopId = parseInt(span.data('shopid'));
        if(_dataMap[shopId]){
            var maker = _dataMap[shopId];
            if(maker) maker.setTop(true);
        }
        
        var mapBox = $('#map_topBox');
        $('.name', mapBox).html(span.data('storename'));
        $('.tel', mapBox).html(span.data('phone'));
        $('.address', mapBox).html(span.data('addr'));
        $('.times', mapBox).html(span.data('open'));
        mapBox.css({'display':'block'});
        $(this).addClass('selected').siblings('dl').removeClass('selected');
    });

    $('.view-map').on('click', function(){
        $.ajax({
          url: 'http://api.map.baidu.com/getscript?v=2.0&ak=adGWV3U3e3XFsLoTBt0OuPOd&services=&t=20140703155230',
          dataType: 'script',
          cache: true,
          success: function(){
            
            VL.dialog.open('#map-block');
            
            map = new BMap.Map("maps_container");                        // 创建Map实例
            point = new BMap.Point(121.21, 31.41);
            map.centerAndZoom(point, 14);
            map.addControl(new BMap.NavigationControl());               // 添加平移缩放控件
            map.addControl(new BMap.ScaleControl());                    // 添加比例尺控件
            map.addControl(new BMap.OverviewMapControl());              //添加缩略地图控件
            map.enableScrollWheelZoom();                            //启用滚轮放大缩小
            map.addControl(new BMap.MapTypeControl());          //添加地图类型控件


            var firstMaker = null;
            if(typeof shopsJson.data != 'undefined' && shopsJson.data.length) {
                for (var i = 0; i < shopsJson.data.length; i++) {
                    var point = new BMap.Point(parseFloat(shopsJson.data[i].longitude), parseFloat(shopsJson.data[i].latitude));
                    var maker = new BMap.Marker(point);
                    var label = new BMap.Label(shopsJson.data[i].label.toUpperCase());
                    label.setStyle({
                        'background':'url(http://lux.vipstatic.com/magento/skin/frontend/default/viplux/images/mdxh.png)',
                        'border':'0',
                        'color':'#FFF',
                        'width':'18px',
                        'height':'25px',
                        'display':'block',
                        'textAlign':'center',
                        'lineHeight':'20px'
                    });
                    maker.setLabel(label);
                    maker.addEventListener('click', function(e){
                        var label = this.getLabel().content.toLowerCase();
                        $('.mp_point_'+label).trigger('click');
                    });
                    maker.addEventListener('mouseover', function(e){
                        var label = this.getLabel().content.toLowerCase();
                        $('.mp_point_'+label).parents('dl').addClass('hover');
                    });
                    maker.addEventListener('mouseout', function(e){
                        var label = this.getLabel().content.toLowerCase();
                        $('.mp_point_'+label).parents('dl').removeClass('hover');
                    });
                    map.addOverlay(maker);
                    if(firstMaker == null){
                        firstMaker = maker;
                    }
                    //_dataMap.set(shopsJson.data[i].shop_id, maker);
                    _dataMap[shopsJson.data[i].shop_id] = maker
                };
            }
            setTimeout(function(){
                $('#map-block .maplist > dl').first().trigger('click');
            },1000);
          }
        });


    }); 
  },
  handleHotBrand: function () {
    var box = $('.items'),
        bw = $('.hot-brand').width(),
        w = 0;
    w = $('body').hasClass('tiny-size') ? Math.floor(bw / 3) : Math.floor(bw / 4);
    box.width(bw);
    box.find('li').width(w);
    this.carouseler = new VL.Carousel(box, {
      unit: 0
    });
    
    var that = this;
    $(window).on('resize', function () {
      var bw = $('.hot-brand').width(),
          w = 0;
      if ($('body').hasClass('tiny-size')) {
        w = Math.floor(bw / 3);
        box.find('li').width(w);
        box.width(bw);
        that.carouseler.resize();
      } else {
        w = Math.floor(bw / 4);
        box.find('li').width(w);
        box.width(bw);
        that.carouseler.resize();
      }
      
    });
  },
  selectFirstZoomImage: function () {
    var s = $('.img-list').find('li').eq(0),
        src = s.find('img').attr('src');
    this.exchangeZoomImage(src);
    s.addClass('on');
  },
  exchangeZoomImage: function (src) {
    this.zoomer.update({
      smallImg: src,
      bigImg: src
    });
  },
  bind: function () {
    var that = this;
    $('.img-list').on('mouseenter', 'li', function () {
      var s = $(this),
          src = s.find('img').attr('src');
      that.exchangeZoomImage(src);
      $('.img-list').find('li').removeClass('on');
      s.addClass('on');
    });
    
    $('.to-try').hover(function () {
      var s = $(this),
          wh = $(window).height(),
          h = s.height(),
          top = s[0].getBoundingClientRect().top + h;
      if (wh - top < 204) {
        s.addClass('up-pop');
      } else {
        s.removeClass('up-pop');
      }
    });
    
    $('.details').on('click', '.section-name', function () {
      var p = $(this).parent(),
          d = $('.details'),
          ddl = p.find('.ddl');
      if (ddl[0]) {
        if (ddl.is(':visible')) {
          p.removeClass('on').find('.ddl').slideUp(function () {
            if (p.next().hasClass('help')) {
              d.find('.section').eq(0).addClass('on').find('.ddl').slideDown();
            } else {
              p.next().addClass('on').find('.ddl').slideDown();
            }
          });
        } else {
          d.find('.section').removeClass('on');
          d.find('.ddl:visible').slideUp(function () {
            p.addClass('on').find('.ddl').slideDown();
          });
        }
      }
    });
    
    $('.details').find('.ddl').eq(0).slideDown();
    
    $('.size-table-btn').on('click', function () {
      VL.dialog.open('.size-box');
    });
            
    this.resizeZoom();
    $(window).on('resize', function () {
      that.resizeZoom();
    });
  
    $('.hot-brand').on('click', '.tip', function () {
      VL.header.openLoginDialog();
    });
    
  },
  resizeZoom: function () {
    var zoom = $('.zoom-box'),
        c = this.zoomer.cfg.c,
        d = 98 / 82,
        w = zoom.width(),
        imgList = $('.img-list'),
        list = imgList.find('li'),
        ww = $('.left-side').find('.img-wrapper').width(),
        lw = Math.floor(ww / 5);
    zoom.height(c * w);
    imgList.width(ww).height(d * lw + 2);
    list.width(lw).height(d * lw * 0.88).find('.i-box').height(d * lw * 0.88);
    this.imgCarouseler.resize();
    this.zoomer.getXYData();
  }
};

$(function () {
	VL.product.ini();
});

}(jQuery));

