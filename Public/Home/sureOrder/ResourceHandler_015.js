﻿(function(a){a.fn.placeHolder=function(c){var b={value:"请输入…",defStyle:{color:"#ccc",fontSize:"14px",border:"1px solid #ccc",background:"#EEF3F8",left:0,top:0,zIndex:0},focStyle:{color:"#000",fontSize:"14px",border:"1px solid #000",background:"#fff",zIndex:0}};var d=a.extend(b,c);return this.each(function(){var f=a(this);var g=f.attr("phdata");d.value=g||d.value;f.parent().css({position:"relative"});f.before('<label for="'+f.attr("name")+'">'+d.value+"</label>");var e=f.prev();if(f.css("display")=="none"||f.val()!=""){e.css("display","none")}e.css({position:"absolute",top:d.defStyle.top,left:d.defStyle.left,cursor:"text",color:d.defStyle.color,"font-size":d.defStyle.fontSize,"line-height":f.outerHeight()+"px","z-index":d.defStyle.zIndex});a("textarea").prev().css({"line-height":"30px"});f.css({border:d.defStyle.border,background:d.defStyle.background});e.click(function(){f.focus()});var h=null;f.focus(function(){var i=function(){if(f.val()!=""){e.css("display")!="none"&&e.hide()}else{}if(f.css("display")=="none"){e.css("display","none")}};h=setInterval(i,100);f.css({"font-size":d.focStyle.fontSize,border:d.focStyle.border,background:d.focStyle.background});if(d.focStyle.display){e.css({display:d.focStyle.display,color:d.focStyle.color,"font-size":d.focStyle.fontSize})}else{e.css({color:d.focStyle.color,"font-size":d.focStyle.fontSize})}}).blur(function(){clearInterval(h);h=null;if(f.val()==""){f.css({"font-size":d.defStyle.fontSize,border:d.defStyle.border,background:d.defStyle.background});if(d.defStyle.display){e.css({display:d.defStyle.display,color:d.defStyle.color,"font-size":d.defStyle.fontSize})}else{e.css({color:d.defStyle.color,"font-size":d.defStyle.fontSize})}}else{f.css({"font-size":d.defStyle.fontSize,border:d.defStyle.border,background:d.defStyle.background})}});if(f.filter(":focus").length>0){f.filter(":focus").trigger("focus")}})}})(jQuery);