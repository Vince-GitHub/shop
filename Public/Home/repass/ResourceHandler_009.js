﻿(function(){$.fn.extend({MXRand:function(f){var e=$(this),g=e.length;return f?(function(){var h=parseInt(Math.random()*g),j;while(!f.call((j=e.eq(h)))){h=parseInt(Math.random()*g)}return j})():e.eq(parseInt(Math.random()*g))}});$.extend({MXCodeAjaxSetting:{url:"/account/GetCode?ran="+Math.random(),type:"GET",dataType:"json",cache:false,expireMinutes:0},MXCodeCache:{data:null,timer:new Date().getTime()}});var c=0,a,b,d=function(f,g,e){return f.data("codebinded")===1?f:f.data({codebinded:1,MXEnterCode:[],uuid:new Date().getTime()+""+(Math.floor(Math.random()*1000))}).on("keypress",function(){return false}).on("focus",function(){var h=$(this);a=h;b=g;h.blur();var i=d.ajax(e);i(function(j){j.show();j.css({position:"absolute","z-index":2147483647,left:(h.offset().left+h.outerWidth())+"px",top:(((h.offset().top+j.height()<$("body").height())||($("body").height()<400))?h.offset().top:(h.offset().top-j.height()))+"px"});if(j.data("MXEvents")===1){return false}j.data("MXEvents",1);j.delegate("[mxcodetype='code-numb']","click",function(k){a.data("MXEnterCode").push($(this).data("MXCode"));a.val(a.val()+"*");b&&(b.onCodeClick&&b.onCodeClick.call(this,k));return false}).delegate("[mxcodetype='code-del']","click",function(k){a.data("MXEnterCode").pop();a.val(a.val().substr(0,a.val().length-1));b&&(b.onDelClick&&b.onDelClick.call(this,k));return false}).delegate("[mxcodetype='code-confirm']","click",function(k){j.hide();b&&(b.onConfirmClick&&b.onConfirmClick.call(this,k));return false})});return false})};d.setting={wrapper:"sp-code-wrapper",numb:"sp-code-numb",del:"sp-code-del",confirm:"sp-code-confirm"};d.create=function(e){return(e&&e.call(this))||(d._create||(function(){var j=d.setting,k=$("<div>").attr("mxcodetype","code-wrapper").addClass(j.wrapper),g=$("<a>").attr({mxcodetype:"code-del",href:"#"}).addClass(j.del).text("&nbsp;"),f=$("<a>").attr({mxcodetype:"code-confirm",href:"#"}).addClass(j.confirm).text("&nbsp;"),h=0;for(;h<10;h++){k.append($("<a>").attr({mxcodetype:"code-numb",href:"#"}).addClass(j.numb))}k.append(g).append(f);$("body").append(k);return d._create=k})())};d.hide=function(){if(d._create){d._create.hide()}};d.ajax=function(e){e=e||{};e=$.extend(true,{},$.MXCodeAjaxSetting,e);var h=e.expireMinutes,f=$.MXCodeCache.data,g=$.MXCodeCache.timer;return function(i,j){var m,l,k;if(h&&f){m=new Date().getTime();l=h*60000;if((m-g)<l){k=d.excute(f);i&&i.call(j,k);return}}$.ajax(e).done(function(n){if(n&&n.length){$.MXCodeCache.data=n;$.MXCodeCache.timer=new Date().getTime();var o=d.excute(n);i&&i.call(j,o)}})}};d.excute=function(f){var k,g=0,h=f.length,e=d.create(),j=e.find("[mxcodetype='code-numb']");c++;for(;g<h;g++){j.MXRand(function(){return $(this).data("MXCodeReady")!==c}).data({MXCodeReady:c,MXCode:f[g]}).removeAttr("class").addClass("sp-code-numb code-numb-"+g).text("&nbsp;")}return e};$.extend({MXCode:d});$.fn.extend({MXCode:function(){var e=Array.prototype.slice.call(arguments);e.unshift($(this));return d.apply(null,e)}});$.fn.extend({MXCodeVal:function(){return $(this).data("MXEnterCode")&&$(this).data("MXEnterCode").join("")}});$.fn.extend({MXCodeValClear:function(){return $(this).data({MXEnterCode:[]})}});$(document).on("click",function(g){var f=$(g.target),h=f.closest(".sp-code-wrapper").length,i=f.data("uuid");if(!(h||i)){d.hide()}})})();