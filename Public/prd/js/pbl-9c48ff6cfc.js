function FullPage(e){this.el=$(e.el),this.ctrlClass=e.ctrlClass||"active",this.hideClassHad=e.hideClassHad||["js-close","js-btn--no",this.ctrlClass],this.showCallBack=e.showCallBack,this.hideCallBack=e.hideCallBack,this.init()}function SwitchTabs(e){this.$lsReference=$(e.reference),this.$lsTarget=$(e.target),this.referencesSelector=e.referencesSelector,this.targetsSelector=e.targetsSelector,this.$itemsReference=this.$lsReference.find(this.referencesSelector),this.$itemsTarget=this.$lsTarget.find(this.targetsSelector),this.eventType=e.eventType||"click",this.callBack=e.callBack,this.$itemsReference.length>=2&&this.init()}function SlideItems(e){this.$elBox=$(e.box),this.itemsSelector=e.itemsSelector,this.$elItems=this.$elBox.find(this.itemsSelector),this.$elPrev=$(e.prev),this.$elNext=$(e.next),this.speed=e.speed||3e3,this.isAuto=void 0!==e.isAuto&&null!==e.isAuto&&e.isAuto,this.isHoverStop=void 0===e.isHoverStop||null===e.isHoverStop||e.isHoverStop,this.callBack=e.callBack,this.slideFinal=this.$elItems.length-1,this.slideNow=0,this.autoCounter=0,this.$elItems.length>0&&this.init()}function ScrollSwitching(e){this.$elReference=$(e.reference),this.$elFinishReference=$(e.finishReference),this.$elTarget=$(e.target),this.callBack=e.callBack,this.referenceScrollTop=0,this.finishReferenceScrollTop=0,this.isTargetActive=!1,this.init()}function initPblMsgAlertBox(){function e(e,t,o,a){var c=e||s.ct,r=t||s.tt;l.html(c),i.html(r),"function"==typeof o&&(n.showCallBack=function(){o(),n.showCallBack=null}),"function"==typeof a&&(n.hideCallBack=function(){a(),n.hideCallBack=null}),n.show()}var t=$(".js-pbl-msg-alert"),i=t.find(".js-title"),l=t.find(".js-content"),s={ct:"",tt:"温馨提示"},n=new FullPage({el:t,showCallBack:null,hideCallBack:null});window.newAlert=e}function initGReg(){var e={};e.phone=/^1\d{10}$/,e.posFloat=/^[1-9]\d*\.?\d*[1-9]$|^0\.\d*[1-9]$/,window.gReg=e}function getScriptObj(e){return $.parseJSON($(e).text())}function ChangeRadioStyle(e){var t=$(e);t.click(function(){t.removeClass("checked"),$(this).addClass("checked")})}function QuickSale(e){this.$elBtn=$(e.elBtn),this.$elInput=$(e.elInput),this.$elWrong=$(e.elWrong),this.$elWrongContent=$(e.elWrongContent),this.opt={upload:{},src:"",alertType:""},this.opt.alertType=e.opt.alertType||"newAlert",this.opt.upload.city=this.city,this.opt.upload=$.extend(this.opt.upload,e.opt.upload),this.alert=null,this.init()}function initQuickSale(e){new QuickSale({elBtn:$(".js-historysale-btn"),elInput:$(".js-historysale-tel"),opt:{alertType:"newAlert",upload:{origin:e}}})}function fixPlaceHolder(e){function t(e){var t=$(e),i=t.attr("placeholder");t.val(i).css({color:"#808080"}),t.on("focus",function(){t.val()===i&&t.val("").css({color:"inherit"})}),t.on("blur",function(){""===t.val()&&t.val(i).css({color:"#808080"})})}var i=!0;if(i=function(){var e=document.createElement("input");return"placeholder"in e}(),!i)for(var l=e.length;l-- >0;)t(e[l])}function quicksalepop(e){var t=$(".js-quicksale-close"),i=$(".js-quicksale"),l=($(".js-quicksale-pop"),$(".js-quicksale-salebtn")),s=$(".js-quicksale-tel"),n=$(".js-ipt-info"),o=$(".js-quicksale-error"),a=getScriptObj(".js-be-api").quickSale;$(".js-ft-wechat").attr("src");i.addClass("active"),i.animate({left:"0"},1200),l.on("click",function(){var t=$(".js-quicksale-tel").val();$.ajax({url:a,type:"POST",dataType:"json",data:{tel:t,origin:e}}).done(function(e){0===e.status||2===e.status?(initSuccessAlert(),s.val("").trigger("onblur")):(s.val(e.msg),n.addClass("active"),s.css("color","red"),s.on("click",function(){s.val("").css("color","").trigger("onblur"),n.removeClass("active")}),o.on("click",function(){s.val(""),n.removeClass("active"),s.css("color","").val("").trigger("onblur")}))}).fail(function(){newAlert("网络好像开了会小差，请刷新重试")})}),t.on("click",function(){i.removeClass("now"),i.animate({left:"-2000px"},1200,function(){i.removeClass("active,now").addClass("hidden")})})}function hiddenFriendLink(){var e=!0;$(".js-hidden-friendlink").on("click",function(){e===!0?($(".js-hidden-friendlink").addClass("show"),e=!1):($(".js-hidden-friendlink").removeClass("show"),e=!0)})}function asideNavService(){var e=!0,t=$(".js-service-icon"),i=$(".js-service-content"),l=$(".js-service-head");$(".js-service-chatwindow");t.on("click",function(){e===!0?(i.addClass("active"),e=!1):(i.removeClass("active"),e=!0)}),i.on("click",function(e){e.stopPropagation()}),l.find("span").click(function(){i.removeClass("active"),e=!0})}function pyecIM(){var e="http://www.fecar.com/register.php";$.ajax({url:e,type:"GET",dataType:"json",data:{}}).done(function(e){200===e.code&&WKIT.init({uid:e.data.userid,appkey:e.data.key,credential:e.data.password,touid:e.data.touid,theme:"orange",msgBgColor:"",width:444,height:429,sendBtn:!0,placeholder:"您可以问小迈，例如：你们有免费提供上门检测吗？",avatar:"http://test.www.fecar.com/Public/dev/img/pbl/avatar-consult-user.png",toAvatar:"http://test.www.fecar.com/Public/dev/img/pbl/avatar-consult-call.png",container:document.getElementById("J_lightDemoWrapMain"),sendMsgToCustomService:!0,onLoginSuccess:function(){document.getElementById("J_wkitChatWrap").style.borderRadius="0 0 4px 4px"}})})}function initSuccessAlert(){var e=$(".js-success-alert"),t=new FullPage({el:e,showCallBack:null,hideCallBack:null});t.show()}$(function(){initPblMsgAlertBox(),hiddenFriendLink(),fixPlaceHolder([$(".js-historysale-tel")]),asideNavService(),pyecIM()}),FullPage.prototype.show=function(e){this.el.addClass(this.ctrlClass),"function"==typeof this.showCallBack&&this.showCallBack(e)},FullPage.prototype.hide=function(e){this.el.removeClass(this.ctrlClass),"function"==typeof this.hideCallBack&&this.hideCallBack(e)},FullPage.prototype.init=function(){var e=this;e.el.on("click",function(t){for(var i=$(t.target),l=e.hideClassHad.length;l-- >0;)if(i.hasClass(e.hideClassHad[l]))return void e.hide()})},SwitchTabs.prototype.init=function(){var e=this;e.$lsReference.on(e.eventType,e.referencesSelector,function(){var t=$(this).index();e.$itemsReference.eq(t).addClass("current").siblings().removeClass("current"),e.$itemsTarget.eq(t).addClass("active").siblings().removeClass("active"),"function"==typeof e.callBack&&e.callBack(t)}),$(e.$itemsReference).eq(0).trigger("click")},SlideItems.prototype={jump:function(e){this.$elItems.eq(e).addClass("active").siblings().removeClass("active"),this.slideNow=e,"function"==typeof this.callBack&&this.callBack(this.slideNow)},leftJump:function(){0===this.slideNow?this.jump(this.slideFinal):this.jump(this.slideNow-1)},rightJump:function(){this.slideNow===this.slideFinal?this.jump(0):this.jump(this.slideNow+1)},autoJump:function(e){var t=this;t.isAuto===!0&&(t.autoCounter=setInterval(function(){"left"===e?t.leftJump():t.rightJump()},t.speed))},init:function(){var e=this;e.$elPrev.on("click",function(){e.isAuto===!0&&(clearInterval(e.autoCounter),e.isHoverStop===!1&&e.autoJump()),e.leftJump()}),e.$elNext.on("click",function(){e.isAuto===!0&&(clearInterval(e.autoCounter),e.isHoverStop===!1&&e.autoJump()),e.rightJump()}),e.isHoverStop===!0&&e.isAuto===!0&&(e.$elBox.on("mouseover",function(){clearInterval(e.autoCounter)}),e.$elBox.on("mouseout",function(){clearInterval(e.autoCounter),e.autoJump()})),e.jump(0),e.autoJump()}},ScrollSwitching.prototype.init=function(){function e(){i=$(window).scrollTop(),i>t.referenceScrollTop&&i<t.finishReferenceScrollTop?t.isTargetActive===!1&&(t.$elTarget.addClass("active"),t.isTargetActive=!0):t.isTargetActive===!0&&(t.$elTarget.removeClass("active"),t.isTargetActive=!1),"function"==typeof t.callBack&&t.callBack(i)}var t=this,i=0,l=$(t.$elReference).offset(),s=$(t.$elFinishReference).offset();t.referenceScrollTop=l?Math.floor(l.top):1e6,t.finishReferenceScrollTop=s?Math.floor(s.top)-$(t.targetEl).height():1e6,$(window).on("scroll",e),e()},QuickSale.prototype={url:getScriptObj(".js-be-api").quickSale,wechatSrc:$(".js-ft-wechat").attr("src"),city:$(".js-hd-city").text(),init:function(){function e(e,t,i){function l(e){var t=i;t.html(e),s.show(),setTimeout(function(){s.hide()},3e3)}var s={$el:t,show:function(){this.$el.addClass("active")},hide:function(){this.$el.removeClass("active")}};return"thisAlert"===e?l:"newAlert"===e?newAlert:void 0}var t=this;t.alert=e(t.opt.alertType,t.$elWrong,t.$elWrongContent),t.$elBtn.on("click",function(){var e=/^1\d{10}$/,i=t.opt.upload.tel=t.$elInput.val();e.test(i)?$.ajax({url:t.url,type:"POST",dataType:"json",data:t.opt.upload}).done(function(e){0===e.status||2===e.status?(initSuccessAlert(),t.$elInput.val("")):1===e.status&&t.alert("填写正确的手机号码")}).fail(function(){newAlert("网络好像开了会小差，请刷新重试")}):t.alert("请填写正确的手机号码")})}};