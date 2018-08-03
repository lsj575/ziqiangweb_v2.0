


var width1=0;
var width2=0;
var jishu=0;
var width123=parseInt(screen.width);




if (width123>1024) {
    (function(a){a.isScrollToFixed=function(b){return !!a(b).data("ScrollToFixed")};a.ScrollToFixed=function(d,i){var m=this;m.$el=a(d);m.el=d;m.$el.data("ScrollToFixed",m);var c=false;var H=m.$el;var I;var F;var k;var e;var z;var E=0;var r=0;var j=-1;var f=-1;var u=null;var A;var g;function v(){H.trigger("preUnfixed.ScrollToFixed");l();H.trigger("unfixed.ScrollToFixed");f=-1;E=H.offset().top;r=H.offset().left;if(m.options.offsets){r+=(H.offset().left-H.position().left)}if(j==-1){j=r}I=H.css("position");c=true;if(m.options.bottom!=-1){H.trigger("preFixed.ScrollToFixed");x();H.trigger("fixed.ScrollToFixed")}}function o(){var J=m.options.limit;if(!J){return 0}if(typeof(J)==="function"){return J.apply(H)}return J}function q(){return I==="fixed"}function y(){return I==="absolute"}function h(){return !(q()||y())}function x(){if(!q()){var J=H[0].getBoundingClientRect();u.css({display:H.css("display"),width:J.width,height:J.height,"float":H.css("float")});cssOptions={"z-index":m.options.zIndex,position:"fixed",top:m.options.bottom==-1?t():"",bottom:m.options.bottom==-1?"":m.options.bottom,"margin-left":"0px"};if(!m.options.dontSetWidth){cssOptions.width=H.css("width")}H.css(cssOptions);H.addClass(m.options.baseClassName);if(m.options.className){H.addClass(m.options.className)}I="fixed"}}function b(){var K=o();var J=r;if(m.options.removeOffsets){J="";K=K-E}cssOptions={position:"absolute",top:K,left:J,"margin-left":"0px",bottom:""};if(!m.options.dontSetWidth){cssOptions.width=H.css("width")}H.css(cssOptions);I="absolute"}function l(){if(!h()){f=-1;u.css("display","none");H.css({"z-index":z,width:"",position:F,left:"",top:e,"margin-left":""});H.removeClass("scroll-to-fixed-fixed");if(m.options.className){H.removeClass(m.options.className)}I=null}}function w(J){if(J!=f){H.css("left",r-J);f=J}}function t(){var J=m.options.marginTop;if(!J){return 0}if(typeof(J)==="function"){return J.apply(H)}return J}function B(){if(!a.isScrollToFixed(H)||H.is(":hidden")){return}var M=c;var L=h();if(!c){v()}else{if(h()){E=H.offset().top;r=H.offset().left}}var J=a(window).scrollLeft();var N=a(window).scrollTop();var K=o();if(m.options.minWidth&&a(window).width()<m.options.minWidth){if(!h()||!M){p();H.trigger("preUnfixed.ScrollToFixed");l();H.trigger("unfixed.ScrollToFixed")}}else{if(m.options.maxWidth&&a(window).width()>m.options.maxWidth){if(!h()||!M){p();H.trigger("preUnfixed.ScrollToFixed");l();H.trigger("unfixed.ScrollToFixed")}}else{if(m.options.bottom==-1){if(K>0&&N>=K-t()){if(!L&&(!y()||!M)){p();H.trigger("preAbsolute.ScrollToFixed");b();H.trigger("unfixed.ScrollToFixed")}}else{if(N>=E-t()){if(!q()||!M){p();H.trigger("preFixed.ScrollToFixed");x();f=-1;H.trigger("fixed.ScrollToFixed")}w(J)}else{if(!h()||!M){p();H.trigger("preUnfixed.ScrollToFixed");l();H.trigger("unfixed.ScrollToFixed")}}}}else{if(K>0){if(N+a(window).height()-H.outerHeight(true)>=K-(t()||-n())){if(q()){p();H.trigger("preUnfixed.ScrollToFixed");if(F==="absolute"){b()}else{l()}H.trigger("unfixed.ScrollToFixed")}}else{if(!q()){p();H.trigger("preFixed.ScrollToFixed");x()}w(J);H.trigger("fixed.ScrollToFixed")}}else{w(J)}}}}}function n(){if(!m.options.bottom){return 0}return m.options.bottom}function p(){var J=H.css("position");if(J=="absolute"){H.trigger("postAbsolute.ScrollToFixed")}else{if(J=="fixed"){H.trigger("postFixed.ScrollToFixed")}else{H.trigger("postUnfixed.ScrollToFixed")}}}var D=function(J){if(H.is(":visible")){c=false;B()}else{l()}};var G=function(J){(!!window.requestAnimationFrame)?requestAnimationFrame(B):B()};var C=function(){var K=document.body;if(document.createElement&&K&&K.appendChild&&K.removeChild){var M=document.createElement("div");if(!M.getBoundingClientRect){return null}M.innerHTML="x";M.style.cssText="position:fixed;top:100px;";K.appendChild(M);var N=K.style.height,O=K.scrollTop;K.style.height="3000px";K.scrollTop=500;var J=M.getBoundingClientRect().top;K.style.height=N;var L=(J===100);K.removeChild(M);K.scrollTop=O;return L}return null};var s=function(J){J=J||window.event;if(J.preventDefault){J.preventDefault()}J.returnValue=false};m.init=function(){m.options=a.extend({},a.ScrollToFixed.defaultOptions,i);z=H.css("z-index");m.$el.css("z-index",m.options.zIndex);u=a("<div />");I=H.css("position");F=H.css("position");k=H.css("float");e=H.css("top");if(h()){m.$el.after(u)}a(window).bind("resize.ScrollToFixed",D);a(window).bind("scroll.ScrollToFixed",G);if("ontouchmove" in window){a(window).bind("touchmove.ScrollToFixed",B)}if(m.options.preFixed){H.bind("preFixed.ScrollToFixed",m.options.preFixed)}if(m.options.postFixed){H.bind("postFixed.ScrollToFixed",m.options.postFixed)}if(m.options.preUnfixed){H.bind("preUnfixed.ScrollToFixed",m.options.preUnfixed)}if(m.options.postUnfixed){H.bind("postUnfixed.ScrollToFixed",m.options.postUnfixed)}if(m.options.preAbsolute){H.bind("preAbsolute.ScrollToFixed",m.options.preAbsolute)}if(m.options.postAbsolute){H.bind("postAbsolute.ScrollToFixed",m.options.postAbsolute)}if(m.options.fixed){H.bind("fixed.ScrollToFixed",m.options.fixed)}if(m.options.unfixed){H.bind("unfixed.ScrollToFixed",m.options.unfixed)}if(m.options.spacerClass){u.addClass(m.options.spacerClass)}H.bind("resize.ScrollToFixed",function(){u.height(H.height())});H.bind("scroll.ScrollToFixed",function(){H.trigger("preUnfixed.ScrollToFixed");l();H.trigger("unfixed.ScrollToFixed");B()});H.bind("detach.ScrollToFixed",function(J){s(J);H.trigger("preUnfixed.ScrollToFixed");l();H.trigger("unfixed.ScrollToFixed");a(window).unbind("resize.ScrollToFixed",D);a(window).unbind("scroll.ScrollToFixed",G);H.unbind(".ScrollToFixed");u.remove();m.$el.removeData("ScrollToFixed")});D()};m.init()};a.ScrollToFixed.defaultOptions={marginTop:0,limit:0,bottom:-1,zIndex:1000,baseClassName:"scroll-to-fixed-fixed"};a.fn.scrollToFixed=function(b){return this.each(function(){(new a.ScrollToFixed(this,b))})}})(jQuery);

    $('#body_right').scrollToFixed({ marginTop: 60,  zIndex : 60 });
	$("#list_father").show();
	$(window).scroll(function(){
	    var $this =$(this);
	    var scrollTop =$(this).scrollTop();//滚动高度
        var foot_top=$("#foot").offset().top;
	    if(foot_top<scrollTop*30){
            //alert(foot_top);
	    	var height=$("#page_infor").height();
	    	var height1=-height*1.25;
	    	$("#body_right").css("transform","translate(0px,"+height1+"px)");
	    }
	    else{
	    	$("#body_right").css("transform","translate(0px,0px)");
	    }
	});
}

if (width123<1024)
{
	$("#list_father").hide();
	$("#daohang").click(function(){
		$("#list_father").slideToggle();
	});
	
}


// setInterval(jianting2,1000);
// function jianting(){
// 	width1=parseInt(screen.width);
// 	setTimeout(jianting1,500);
// }
// function jianting1(){
// 	width2=parseInt(screen.width);
// }
// function jianting2(){
// 	jianting();
// 	var width_cha=Math.abs(width2-width1);
// 	if(width_cha>10){
// 		delete_list();
// 		list_show();
// 		width1=0;
// 		width2=0;
// 	}
// }
// function list_show(){
// 	var width=parseInt(screen.width);
// 	if (width>1024){
// 		$("#list_father").show();
// 		$("#daohang").click(function(){

// 		});
// 	}
// 	if (width<1024)
// 	{
// 		$("#list_father").hide();
// 		$("#daohang").click(function(){
// 			$("#list_father").slideToggle();
// 		});
// 	}
// }

// function delete_list(){
// 	var width=parseInt(screen.width);
// 	if (width>1024){
// 		$("#daohang").unbind("click");
// 	}
// 	if (width<1024)
// 	{
// 		$("#daohang").unbind("click");
// 	}

// }
var person_name=new Array("chenyahui","gaowenchang","liaoxing","liangshuang",
	"zhangyubin","litongxu","liuyupei","liwentan","luodaipeng","lushuang","shaowei","xiaotian",
	"xiezefeng","zhanghaohao","zhangtairan");

for(var i=0;i<person_name.length;i++){
	var name=person_name[i];
	$("#"+name).hide();
}

$(".person_infor").click(function(){
	var name=this.getAttribute("name");
	for(var i=0;i<person_name.length;i++){
		var name1=person_name[i];
		if(name==name1){
			$("#"+name).slideToggle(400);
		}
	}
});


// setInterval(jianting2,1000);
// function jianting(){
// 	width1=parseInt(screen.width);
// 	setTimeout(jianting1,500);
// }
// function jianting1(){
// 	width2=parseInt(screen.width);
// }
// function jianting2(){
// 	jianting();
// 	var width_cha=Math.abs(width2-width1);
// 	if(width_cha>10){
// 		delete_list();
// 		list_show();
// 		width1=0;
// 		width2=0;
// 	}
// }
// function list_show(){
// 	var width=parseInt(screen.width);
// 	if (width>1024){
// 		$("#list_father").show();
// 		$("#daohang").click(function(){

// 		});
// 	}
// 	if (width<1024)
// 	{
// 		$("#list_father").hide();
// 		$("#daohang").click(function(){
// 			$("#list_father").slideToggle();
// 		});
// 	}
// }

// function delete_list(){
// 	var width=parseInt(screen.width);
// 	if (width>1024){
// 		$("#daohang").unbind("click");
// 	}
// 	if (width<1024)
// 	{
// 		$("#daohang").unbind("click");
// 	}

// }
/*原文(解决渲染问题)
var person_name=new Array("chenyahui","gaowenchang","liaoxing","liangshuang",
	"zhangyubin","litongxu","liuyupei","liwentan","luodaipeng","lushuang","shaowei","xiaotian",
	"xiezefeng","zhanghaohao","zhangtairan");*/
/*var flag=0;
var person_name=new Array("陈亚辉","廖星","骆代鹏","张浩浩","张泰然");

for(var i=0;i<person_name.length;i++){
	var name=person_name[i];
	$("#"+name).hide();
}
$(".person_infor").click(function(){
	var name=this.getAttribute("name");
	for(var i=0;i<person_name.length;i++){
		var name1=person_name[i];
		if(name==name1){
			if((flag%2)==0)
			{
				foot_test(name1);
			}
			else{
				$("#foot").css("top","2000px");
			}
			flag++;
			$("#"+name).slideToggle(400);
		}
	}
});

function foot_test(name){
	$("#"+name).css("display","block");
	$("#"+name).css("visibility","hidden");
	var d_height=$("#"+name).height()+2000;
	$("#"+name).css("display","none");
	$("#"+name).css("visibility","visible");
	$("#foot").css("top",d_height+"px");
}*/



/*$("[href='#list12']").click(function(){
	var top=$("#list12").offset().top-90;
	$("html,body").animate({scrollTop:top},400);
	if (width123<1024){$("#list_father").hide();}
});

$("[href='#list13']").click(function(){
	var top=$("#list13").offset().top-90;
	$("html,body").animate({scrollTop:top},400);
	if (width123<1024){$("#list_father").hide();}
});

$("[href='#list14']").click(function(){
	var top=$("#list14").offset().top-90;
	$("html,body").animate({scrollTop:top},600);
	if (width123<1024){$("#list_father").hide();}
});
$("[href='#list15']").click(function(){
	var top=$("#list15").offset().top-90;
	$("html,body").animate({scrollTop:top},600);
	if (width123<1024){$("#list_father").hide();}
});*/
// var maodian=new Array("#list12","#list13","#list14","#list15",);
// for(var i=0;i<maodian.length;i++){
// 	alert(maodian[i]);
// 	    var t = $(window).scrollTop();
// 	    var height=$(window).height();
// 	    $('body,html').animate({'scrollTop':t+height},800)
// }

// $("#"+chen).hide();
// $(".person_infor").click(function(){
// 	$("#"+chen).slideToggle();
// });

