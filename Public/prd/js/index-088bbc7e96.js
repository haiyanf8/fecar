function initIndexQuickSale(){new QuickSale({elBtn:$(".js-bannersale-btn"),elInput:$(".js-bannersale-tel"),elWrong:$(".js-banner-wrong-box"),elWrongContent:$(".js-banner-confirm-ct"),opt:{alertType:"thisAlert",upload:{origin:1}}}),new QuickSale({elBtn:$(".js-levitatesale-btn"),elInput:$(".js-levitatesale-tel"),elWrong:$(".js-levitatesale-wrong-box"),elWrongContent:$(".js-levitatesale-confirm-ct"),opt:{alertType:"thisAlert",upload:{origin:2}}})}function indexDealScroll(){new IndexPixScroll({chooseEl:".js-choosen",targetEl:".js-target"})}function indexBannerNumerScroll(){var t={useEasing:!0,useGrouping:!0,separator:"",decimal:"",prefix:"",suffix:""},e=new CountUp("js-num01",0,3e3,0,2,t),i=new CountUp("js-num02",0,20,0,3.5,t);$(window).scrollTop()>=$(".js-compare-target").offset().top-900&&(e.start(),i.start()),$(window).scroll(function(){$(window).scrollTop()>=$(".js-compare-target").offset().top-900&&(e.start(),i.start())})}function IndexPixScroll(t){this.chooseEl=t.chooseEl,this.targetEl=t.targetEl,this.chooseSelector=t.chooseSelector||"li",this.targetSelector=t.targetSelector||"li",this.per=t.per||4,this.speed=t.speed||5e3,this.timer=null,this.now=0,this.isAuto=!0,this.chooseElChildrenEl=$(this.chooseEl).find(this.chooseSelector),this.targetElChildrenEl=$(this.targetEl).find(this.targetSelector),this.targetElChildrenLen=this.targetElChildrenEl.length,this.targetElWidth=$(this.targetEl).width(),this.totalPage=Math.ceil(this.targetElChildrenLen/this.per),this.targetElToalWidth=this.targetElWidth*this.totalPage,this.init()}function IndexDealItemImgLazy(){var t=$(".deal-box-item .img img");t.each(function(){var t=$(this);void 0!==t.data("origin")&&t.attr("src",t.data("origin"))})}function serviceFadeIn(){var t=$(".js-ourservice"),e=$(".js-ourservice-content"),i=parseInt(t.offset().top);$(window).scrollTop()>=i-t.height()-200&&e.addClass("active"),$(window).scroll(function(){i-t.height();$(window).scrollTop()>=i-t.height()-200&&e.addClass("active")})}$(function(){fixPlaceHolder([$(".js-bannersale-tel"),$(".js-levitatesale-tel"),$(".js-quicksale-tel")]),serviceFadeIn(),initIndexQuickSale(),indexDealScroll(),indexBannerNumerScroll(),IndexDealItemImgLazy(),quicksalepop(1)}),IndexPixScroll.prototype.init=function(){function t(){_this.now++,e(_this.now>_this.totalPage-1?0:_this.now)}function e(t){_this.chooseElChildrenEl.eq(t).addClass("current").siblings().removeClass("current"),$(_this.targetEl).animate({left:-(_this.targetElWidth*t)+"px"},300),_this.now=t}_this=this,$(_this.targetEl).css({width:_this.targetElToalWidth+"px"}),_this.isAuto&&(this.timer=setInterval(t,_this.speed)),!function(){var i=0;$(_this.chooseEl).on("click",_this.chooseSelector,function(){clearInterval(_this.timer),i=$(this).index(),e(i),_this.timer=setInterval(t,_this.speed)})}(),$(_this.targetEl).on("mouseover",function(){clearInterval(_this.timer)}),$(_this.targetEl).on("mouseout",function(){_this.timer=setInterval(t,_this.speed)})};