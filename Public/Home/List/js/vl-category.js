"use strict"
var VL = window.VL || {};
VL.category = {
  bind: function () {
    var that = this;
    $(document).on('click', '.no-login .tip', function () {
      $('.login-btn').trigger('click');
    });
    
    $(window).on('scroll', function () {
      if (VL.category.scrollTimer) {clearTimeout(VL.category.scrollTimer)}
      VL.category.scrollTimer = setTimeout(function () {
        if (!VL.category.isLoading && !$('ul.items').hasClass('complete')) {
          VL.category.productList.post();
        }
      }, 100);
    });
  },
  productList: {
    post: function () {
      if (!this.isOk) {return}
      var jBox = $('.vl-category'),
          jList = $('.product-list'),
          jLoading = $('.p-loading');
      if (-1 * jList[0].getBoundingClientRect().top + $(window).height() + 478 >= jList.height()) {
        VL.category.isLoading = true;
        jLoading.show();
        var page = $('.vl-pager')[0] ? (parseInt($('.vl-pager').find('.on').text()) * 2) : '2';
        $.ajax({
					url: location.pathname + '?page=' + page,
					dataType: 'json',
          cache: false,
					type: 'GET',
					success: function (data) {
						$('ul.items').append(data).addClass('complete');
            VL.category.isLoading = false;
            jLoading.hide();
					},
          error: function () {
            VL.category.isLoading = false;
            jLoading.hide();
          }
        });
      }
    },
    ini: function () {
      this.isOk = $('.product-list')[0] ? true : false;
    }
  },
  ini: function () {
    this.productList.ini();
    this.bind();
    VL.resizeHandler([{
      size: 1024,
      cla: 'tiny-size'
    }]);
  }
};

;(function ($) {
  $(function () {
    VL.category.ini();
  });
}(window.jQuery));