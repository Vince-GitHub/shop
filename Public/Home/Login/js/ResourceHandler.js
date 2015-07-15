﻿(function(d,a,c){var b=(function(){var e=(function(){var h={};return function(j){if(typeof h[j]=="undefined"){h[j]=[]}var i=h[j];return{add:function(l){var k=new g(l,this);i.push(k);return k},preventAll:function(){for(var k=0,l=i.length;k<l;k++){i[k].prevent=true}},promiseAll:function(){for(var k=0,l=i.length;k<l;k++){i[k].prevent=false}},checkAll:function(){var k;for(var l=0,n=i.length;l<n;l++){k=i[l];k.trySubmit=true;k.init()}for(var m=0;m<n;m++){k=i[m];k.check&&k.check()}},each:function(k){for(var l=0,m=i.length;l<m;l++){if(!i[l].isResolve()){return false}}k&&k.call(this,i);return true},submit:function(k){if(!this.submitLock){this.submited=false;this.submitLock=true;this.onsubmit=k;this.checkAll()}},onsubmit:null,submitLock:false,submited:false}}})(),f=function(h,i){h=h instanceof a?h:a(h);if(i&&h.length==0){return null}return h},g=function(i,h){this.elem=f(i.elem,true);this.value=i.value||function(){return this.elem.val()};this.eventType=i.event||"blur";this.check=i.check||null;this.done=i.done||null;this.fail=i.fail||null;this.message=null;this.status=-2;this.prevent=false;this.parent=h||null;this.trySubmit=false;this.bind()};g.prototype={constructor:g,init:function(h){this.status=-1;this.message=h||null},resolve:function(h){this.status=1;this.message=h||null;this.done&&this.done.call(this);if(this.trySubmit&&!this.parent.submited){if(this.parent.each()){this.parent.onsubmit&&this.parent.onsubmit.call(parent);this.parent.submitLock=false;this.parent.submited=true}}this.trySubmit=false},reject:function(h){this.status=0;this.message=h||null;this.fail&&this.fail.call(this);this.trySubmit=false;this.parent.submitLock=false},bind:function(){var i=this,h=this.elem;if(h&&h.length>0){h.bind(this.eventType,function(){if(i.prevent===false){return i.check&&i.check.call(i)}})}},isPrepare:function(){return this.status===-2},isChecking:function(){return this.status===-1},isReject:function(){return this.status===0},isResolve:function(){return this.status===1}};return{group:e}})();c.plug.formcheck=b})(window,jQuery,SP,undefined);(function(d,a,b){var c=(function(){var e={email:/^([\w]+[_|\_|\-|\.]?)*[\w]+@([\w]+[_|\_|\-|\.]?)*[\w]+\.[a-zA-Z]{2,3}$/,mobile:/^1\d{10}$/,isnumber:/^\d+$/,postcode:/^[0-9]{6}$/,phone:/^(0[0-9]{2,3}(\-)?)?([2-9][0-9]{6,7})+((\-|\*){1}[0-9]{1,6})?$/,ChsAndEnChar:/^[0-9a-zA-Z\u4E00-\u9FA5]$/},f=function(l,k,h,g){var i=e[k]||null,j=false;h=a.isFunction(h)?h:null;g=g||d;if(i){j=i.test(l)}else{j=true}if(j&&h){return h.call(g,l)}return j};return f})();b.plug.valid=c})(window,jQuery,SP,undefined);(function(a){a.fn.shortPass="太短";a.fn.badPass="弱";a.fn.goodPass="中";a.fn.strongPass="强";a.fn.samePassword="Username and Password identical.";a.fn.resultStyle="";a.fn.passStrength=function(c){var b={shortPass:"shortPass",badPass:"badPass",goodPass:"goodPass",strongPass:"strongPass",baseStyle:"testresult",userid:"",messageloc:1,wrap:null};var d=a.extend(b,c);return this.each(function(){var e=a(this);a(e).on("keyup",function(){var f;if(d.wrap){f=a(this).closest(d.wrap)}else{f=a(this)}var g=a.fn.teststrength(a(this).val(),a(d.userid).val(),d);if(d.messageloc===1){f.next("."+d.baseStyle).remove();f.after('<div class="'+d.baseStyle+'"><div class="inlb"></div></div>');f.next("."+d.baseStyle).addClass(a(this).resultStyle).find("div").text(g)}else{f.prev("."+d.baseStyle).remove();f.before('<div class="'+d.baseStyle+'"><div class="inlb"></div></div>');f.prev("."+d.baseStyle).addClass(a(this).resultStyle).find("div").text(g)}});a.fn.teststrength=function(g,i,f){var h=0;h+=g.length*4;h+=(a.fn.checkRepetition(1,g).length-g.length)*1;h+=(a.fn.checkRepetition(2,g).length-g.length)*1;h+=(a.fn.checkRepetition(3,g).length-g.length)*1;h+=(a.fn.checkRepetition(4,g).length-g.length)*1;if(g.match(/(.*[0-9].*[0-9].*[0-9])/)){h+=5}if(g.match(/(.*[!,@,#,$,%,^,&,*,?,_,~].*[!,@,#,$,%,^,&,*,?,_,~])/)){h+=5}if(g.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)){h+=10}if(g.match(/([a-zA-Z])/)&&g.match(/([0-9])/)){h+=15}if(g.match(/([!,@,#,$,%,^,&,*,?,_,~])/)&&g.match(/([0-9])/)){h+=15}if(g.match(/([!,@,#,$,%,^,&,*,?,_,~])/)&&g.match(/([a-zA-Z])/)){h+=15}if(g.match(/^\w+$/)||g.match(/^\d+$/)){h-=10}if(h<0){h=0}if(h>100){h=100}if(h<43){this.resultStyle=f.badPass;return a(this).badPass}if(h<100){this.resultStyle=f.goodPass;return a(this).goodPass}this.resultStyle=f.strongPass;return a(this).strongPass}})}})(jQuery);$.fn.checkRepetition=function(c,f){var e="";for(var a=0;a<f.length;a++){var d=true;for(var b=0;b<c&&(b+a+c)<f.length;b++){d=d&&(f.charAt(b+a)==f.charAt(b+a+c))}if(b<c){d=false}if(d){a+=c-1;d=false}else{e+=f.charAt(a)}}return e};(function(d,a,b){var c=(function(){var g=function(j){return j instanceof a?j:(function(){var k=a(j);return k.length==0?null:k})()},i=function(k,j){this.last(k);this.current(j)},f={wrapper:null,contentWrapper:null,first:null,trigger:"click",effector:"direct",curClass:"cur",onchange:null,auto:false,autotime:3000},e={direct:function(){var k=this.last(),j=this.current();this.getContent(k).stop(true).hide();this.getContent(j).show()},fade:function(){var k=this.last(),j=this.current();this.getContent(k).stop(true).hide();this.getContent(j).fadeIn(200)}},h=function(n){var j=a.extend({},f,n),l=null,k=null,m=j.onchange;this.getSetting=function(){return a.extend({},j,true)};this.last=function(o){if(typeof o!=="undefined"){l=o}return l};this.current=function(o){if(typeof o!=="undefined"){k=o}return k};this.onchange=function(o){if(Object.prototype.toString.call(o)==="Function"){m=o}return m};this.init()};h.prototype={constructor:h,init:function(){var r=this.getSetting(),y=g(r.wrapper),l=g(r.contentWrapper),x=r.trigger,q=r.onchange,v=this,u=y.find("*[tabid]"),n,t=u.length,o=r.auto,w=null,p=0;this.wrapper=function(){return y};this.contentWrapper=function(){return l};if(t>0&&y!=null){n=r.first||u.eq(0).attr("tabid");v.change(n);y.delegate("[tabid]",x,function(){var z=a(this),s=z.attr("tabid"),k=l.find("[tabcontent='"+s+"']");v.change(s);p=z.index();if(z.attr("rel")&&k.attr("changed")!="true"){j(k,z)}});var j=function(k,z){var s=k;var A=z.attr("rel");if(A){a.ajax({url:A,cache:false,success:function(B){s.html(B);s.attr("changed","true")},error:function(){s.html("数据加载错误，请重试！")}})}};if(o){var m=function(){alert("");var k=u.eq(p).attr("tabid"),s=y.find("[tabid='"+k+"']");$conWrp=l.find("[tabcontent='"+k+"']");v.change(k);if(s.attr("rel")&&$conWrp.attr("changed")!="true"){j($conWrp,s)}p++;if(p==t){p=0}};w=setInterval(m,r.autotime);a(l).hover(function(){clearInterval(w)},function(){w=setInterval(m,r.autotime)})}}},change:function(n){var p=this.getSetting(),j=p.contentWrapper,o=this.onchange(),l=this.current(),m,k=p.curClass;if(l!==n){m=p.effector;this.getIndexer(n).addClass(k).siblings().removeClass(k);i.call(this,l,n);o&&o.call(this);if(typeof m=="string"&&typeof e[m]!="undefined"){e[m].call(this)}else{if(a.isFunction(m)){m.call(this)}}}},getIndexer:function(j){return this.wrapper().find("[tabid='"+j+"']")},getContent:function(j){return this.contentWrapper().find("[tabcontent='"+j+"']")}};return h})();b.plug.tab={create:function(e){return new c(e)}}})(window,jQuery,SP,undefined);(function(e,a,d){var b=(function(){var f=a("<iframe>").attr({id:"sp_framefix",name:"sp_framefix",frameborder:0,marginwidth:0,marginheight:0,scrolling:"no"}).css({position:"absolute",display:"none","z-index":999}),g,h=function(){if(g){return true}a("body").append(f);return g=true};return{get:function(){return f},hide:function(){f.hide();return this},bindTo:function(m,i){if(!g){h()}if(!m){return this}var n=m,l=0,q=0,r=0,k=0,p,j=f,s=1000;if(n&&n.size()==1){p=n.offset();l=p.left;q=p.top;r=m.width();k=m.height();j.css({left:l+"px",top:q+"px",height:k+"px",width:r+"px",opacity:0}).show();if(i){s=Math.floor(new Date().getTime()/1000);n.css({"z-index":s+10})}}return this}}})();var c=(function(){var j={id:null,style:{wrapper:null,title:null,content:null,bottom:null},html:{title:null,content:null,bottom:null},position:{init:"center",relat:{top:null,left:0}},animation:{init:function(){this.hide()},show:function(){this.show()},close:function(){this.hide()}},drag:false,backover:false},l={center:function(q,v){var y=a(e),p=a(document),s=q.outerWidth(),r=q.outerHeight(),A=y.width(),z=y.height(),x=y.scrollTop(),w=y.scrollLeft(),o=z/2-r/2,n=A/2-s/2,u=o+x+(v.top||0),t=n+w+(v.left||0);if(u<0){u=0}if(t<0){t=0}q.css({position:"absolute",left:t,top:u})},nearby:function(n,q,u){var t=q.offset(),s=t.top,r=t.left,p=s+(u.top||0),o=r+(u.left||0);if(p<0){p=0}if(o<0){o=0}n.css({position:"absolute",left:o,top:p})}},i=function(o,p,r){var q=a("<"+p+">")[(function(s){return !s?"data":"attr"})(o)]("id",o),n;if(r){n=typeof r==="string"?"addClass":"css";q[n](r)}return q},g=(function(){var n;g=function(p,o){o.bind("mousedown",function(r){var s=p.offset(),q=a(document);if(n){n=null}p.data({dragable:true,top:s.top,left:s.left,mousetop:r.pageY,mouseleft:r.pageX,relatX:r.pageX-s.left,relatY:r.pageY-s.top,mintop:0,minleft:0,maxtop:q.innerHeight()-p.outerHeight(),maxleft:q.innerWidth()-p.outerWidth()});n=p;return false})};a(document).bind("mousemove",function(q){if(n&&n.data("dragable")){var v=q.pageX,w=q.pageY,x=n.data("relatX"),y=n.data("relatY"),o=v-x,p=w-y,u=n.data("mintop"),t=n.data("minleft"),s=n.data("maxtop"),r=n.data("maxleft");if(o<t){o=t}if(o>r){o=r}if(p<u){p=u}if(p>s){p=s}n.css({left:o+"px",top:p+"px"});return false}}).bind("mouseup",function(o){if(n){n=null}});return g})(),f,h=function(){var n=Math.floor(new Date().getTime()/1000);backover=a("<div>").css({position:"absolute","background-color":"#333",opacity:0.8,"z-index":n});a("body").append(backover);return backover},m=function(n){var o=Math.floor(new Date().getTime()/1000)+1;n.css("z-index",o)},k=function(o){var n=a.extend(true,{},j,o);this.init(n)};k.prototype={constructor:k,applyWindow:function(){var q=this.getWrapper(),p=this.getTitle(),o=this.getContent(),n=this.getBottom();this.setHTML();this._animation.init.call(q);a("body").append(q.append(p).append(o).append(n));this.drag();this._binder&&this._binder.call(this);return this},setHTML:function(){var r=this.getTitle(),p=this.getContent(),n=this.getBottom(),s=this.getTitleHTML(),q=this.getContentHTML(),o=this.getBottomHTML();r.html(a.isFunction(s)?s.call(this):s);p.html(a.isFunction(q)?q.call(this):q);n.html(a.isFunction(o)?o.call(this):o);return this},init:function(A){var y=A.id,B=A.style,x=A.html,z=A.position,n=A.animation,w=A.drag,o=A.backover,p=A.binder,H=B.wrapper,F=B.title,v=B.content,s=B.bottom,E=x.title,u=x.content,r=x.bottom,G=i(y,"div",H),D=i(null,"div",F),t=i(null,"div",v),q=i(null,"div",s),C=this;this._position=z;this._animation=n;this._dragable=w;this._backover=o;this._binder=p;this.getWrapper=function(){return G};this.getTitle=function(){return D};this.getContent=function(){return t};this.getBottom=function(){return q};this.getTitleHTML=function(){return E};this.setTitleHTML=function(I){E=I};this.getContentHTML=function(){return u};this.setContentHTML=function(I){u=I};this.getBottomHTML=function(){return r};this.setBottomHTML=function(I){r=I};this.applyWindow()},position:function(){var o=this._position,n=o.init,p=arguments[0]||o.relat,q=this.getWrapper();if(n instanceof a){l.nearby.call(this,q,n,p)}else{if(!a.isFunction(n)){n=l[n]||null}n&&n.call(this,q,p)}return this},reposition:function(n){this._position=a.extend(true,{},this._position,n);return this},resize:function(y,q,p){var v=this.getWrapper(),s=parseFloat(v.css("left")),t=parseFloat(v.css("top")),u=v.width(),r=v.height(),n=(u-y)/2+s,o=(r-q)/2+t,x=this;v.animate({width:y+"px",height:q+"px",left:n+"px",top:o+"px"},function(){p&&p.call(x)});return this},show:function(n){var o=this._animation.show,p=this.position().getWrapper();this.backover();m(p);setTimeout(function(){b.bindTo(a("body"),false);o&&o.call(p);n&&n.call(p)},0);return this},close:function(o){var n=this._animation.close,p=this.getWrapper();n&&n.call(p);b.hide();if(f){if(typeof o==="undefined"){if(f.data("bindto")==p){f.fadeOut(200).data("bindto",null)}}else{if(o===false){if(f.data("bindto")==p){f.data("bindto",null)}}else{f.fadeOut(200).data("bindto",null)}}}return this},setContent:function(p,n){var o=this;this.getContent().html(p);if(n){setTimeout(function(){o.position(n)},0)}},drag:function(n){if(this._dragable){var q=this.getWrapper(),o=this.getTitle(),r=this,p=n?(function(){return a.isFunction(n)?n.call(r):o})():o;g(q,p)}return this},backover:function(t){var n=this._backover=typeof t=="undefined"?this._backover:!!t;if(n){var u=a(e),q=a(document),w=u.width(),v=u.height(),s=q.width(),r=q.height(),p=w>s?w:s,o=v>r?v:r;if(!f){f=h()}if(!f.data("bindto")){f.data("bindto",this.getWrapper())}f.css({top:0,left:0,width:p+"px",height:o+"px"}).show()}return n}};return k})();d.plug.modeWindow=function(f){return new c(f)};d.plug.modeWindowCollection=(function(){var f={};return{add:function(g,h){if(!f[g]){f[g]=new c(h)}return f[g]},get:function(g){return f[g]||null}}})()})(window,jQuery,SP,undefined);