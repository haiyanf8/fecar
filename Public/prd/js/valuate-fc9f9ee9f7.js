function slideAssess(){var t=getScriptObj(".js-be-valuate"),e=($(document),$(".js-assess"),$(".js-model")),a=$(".js-date"),n=$(".js-city"),i=$(".js-mileage"),l=$(".jsl-brand"),s=$(".jsl-series"),r=$(".jsl-model"),o=$(".js-tt--brand"),c=$(".js-tt--series"),d=$(".jsw-brand"),u=$(".jsw-series"),f=$(".jsw-model"),v=$(".js-select-model"),m=($(".js-select-model-close"),$(".jsl-year")),p=$(".jsl-month"),h=$(".jsw-year"),y=$(".jsw-month"),C=$(".js-select-date"),g=$(".jsl-city"),j=$(".jsw-city"),w=$(".js-select-city"),x=$(".js-btn-valuate"),I="",E="",b="",T=0,k=0,V=0,A=$(".jsl-letter");~function(){function a(t,e){var a="";if("model"===e){for(var n in t)if(t.hasOwnProperty(n)){a+='<li class="group"><p class="init">'+n+'</p><ul class="list">';for(var i=0,l=t[n].length;i<l;i++)a+='<li data-id="'+t[n][i].id+'" data-minyear="'+t[n][i].min_year+'" data-maxyear="'+t[n][i].max_year+'" data-price="'+t[n][i].model_price+'" >'+t[n][i].name+"</li>";a+="</ul></li>"}}else for(var s in t)if(t.hasOwnProperty(s)){a+='<li class="group"><p class="init '+s+'">'+s+'</p><ul class="list">';for(var r=0,o=t[s].length;r<o;r++)a+='<li data-id="'+t[s][r].id+'">'+t[s][r].name+"</li>";a+="</ul></li>"}return a}var n=new SelectItemValuate({triggerEl:e,targetEl:v});e.one("click",function(){var e="";$.ajax({url:t.getBrand,type:"GET",dataType:"json",data:{}}).done(function(t){e=a(t,"brand");var n="";for(var i in t)t.hasOwnProperty(i)&&(n+="<li>"+i+"</li>");A.html(n)}).fail(function(){e="<li>获取品牌失败，请重试</li>"}).always(function(t){l.html(e),d.addClass("active");var a={};for(var n in t)t.hasOwnProperty(n)&&(a[n]=l.find("."+n).position().top);~function(){A.on("click","li",function(t){var e=$(this),n=e.text(),i=a[n];l.scrollTop(i)})}()})}),~function(){var e="";l.on("click",".list li",function(){var n=$(this);l.find(".current").removeClass("current"),f.removeClass("active"),n.addClass("current"),T=parseInt(n.data("id")),I=n.text(),$.ajax({url:t.getSeries,type:"GET",dataType:"json",data:{id:T}}).done(function(t){e=a(t,"series")}).fail(function(){e="<li>获取系列失败，请重试</li>"}).always(function(){o.text(I),u.addClass("active"),f.removeClass("active"),s.html(e).scrollTop(0)})})}(),~function(){var e="";s.on("click",".list li",function(){var n=$(this);s.find(".current").removeClass("current"),n.addClass("current"),k=parseInt(n.data("id")),E=n.text(),$.ajax({url:t.getModel,type:"GET",dataType:"json",data:{id:k}}).done(function(t){e=a(t,"model")}).fail(function(){e="<li>获取车型失败，请重试</li>"}).always(function(){c.text(E),f.addClass("active"),r.html(e).scrollTop(0)})})}(),~function(){r.on("click",".list li",function(){var t=$(this);r.find(".current").removeClass("current"),t.addClass("current"),V=t.data("id"),b=E+" "+t.text(),e.text(b).data("upload",t.data("id")).data("minyear",t.data("minyear")).data("maxyear",t.data("maxyear")).removeClass("hint").addClass("chosen"),u.removeClass("active"),f.removeClass("active"),n.hide()})}()}(),~function(){var t=parseInt((new Date).getFullYear()),n=parseInt((new Date).getMonth())+1,i=0,l=0,s=0,r=0,o=null;a.on("click",function(){function t(){for(var t="",e=i;e<=l;e++)t+="<li>"+e+"年</li>";return t}isNaN(parseInt(e.data("upload")))?setTimeout(function(){e.trigger("click")},200):(null===o&&(o=new SelectItemValuate({triggerEl:a,targetEl:C}),o.show()),i=parseInt(e.data("minyear")),l=parseInt(e.data("maxyear")),m.html(t()),y.removeClass("active"),h.addClass("active"))}),m.on("click","li",function(){function e(){for(var t="",e=1;e<=i;e++)t+="<li>"+e+"月</li>";return t}var a=$(this),i=0;m.find(".current").removeClass("current"),a.addClass("current"),s=parseInt(a.text()),i=s===t?n:12,p.html(e()),y.addClass("active")}),p.on("click","li",function(){var t=$(this);p.find(".current").removeClass("current"),t.addClass("current"),r=parseInt(t.text()),a.text(s+"年"+r+"月").addClass("chosen").data("upload-year",s).data("upload-month",r),o.hide()})}(),~function(){var e=new SelectItemValuate({triggerEl:n,targetEl:w});n.one("click",function(){function e(t){var e="";for(var a in t)if(t.hasOwnProperty(a)){e+='<li class="group"><p class="init">'+a+'</p><ul class="list">';for(var n=0,i=t[a].length;n<i;n++)e+='<li data-id="'+t[a][n].zipcode+'">'+t[a][n].city+"</li>";e+="</ul></li>"}return e}var a="";$.ajax({url:t.getCity,type:"GET",dataType:"json",data:{type:3}}).done(function(t){a=e(t)}).fail(function(){a="<li>获取城市失败，请重试</li>"}).always(function(){g.html(a),j.addClass("active")})}),g.on("click",".list li",function(){var t=$(this);g.find(".current").removeClass("current"),t.addClass("current"),n.text(t.text()).addClass("chosen").data("upload",t.data("id")),e.hide()})}(),~function(){function l(){e.text("请选择品牌车型").removeClass("chosen").removeData("upload"),a.text("请选择上牌日期").removeClass("chosen").removeData("upload"),n.text("请选择城市").removeClass("chosen").removeData("upload"),i.val("").trigger("blur")}var s="",r="",o="",c="",d="";x.on("click",function(){s=e.data("upload"),r=a.data("upload-year"),o=a.data("upload-month"),c=n.data("upload"),d=parseFloat(i.val()),void 0===s?newAlert("请选择品牌车型"):void 0===o?newAlert("请选择上牌日期"):void 0===c?newAlert("请选择城市"):isNaN(d)?newAlert("里程数输入错误，请重新输入"):d>=100?newAlert("里程数不能超过100万公里"):$.ajax({url:t.getValuate,type:"GET",dataType:"json",data:{brandName:I,seriesName:E,modelName:b,brandId:T,seriesId:k,d_model:V,expect:s,year:r,month:o,mile:d,city:c}}).done(function(t){0===t.status?(l(),window.location.href=t.url):newAlert(t.msg)}).fail(function(){newAlert("网络好像开了会小差，请刷新重试")})})}()}function SelectItemValuate(t){this.triggerEl=t.triggerEl,this.targetEl=t.targetEl,this.showCB=t.showCB,this.hideCB=t.hideCB,this.active=!1,this.eventFn=null,this.init()}function ValuateCount(){var t=getScriptObj(".js-be-api").getValuateCount;num="",$.ajax({url:t,type:"GET",dataType:"json",data:{}}).done(function(t){num=parseInt(t),$(".mt-number-box").numberAnimate({num:num,speed:2e3,symbol:""})})}function valuateFadeIn(){var t=$(".js-valuate-feature");t.addClass("active")}$(function(){slideAssess(),$(".js-assessnews").slide({mainCell:".js-assessnews-list",effect:"topLoop",autoPlay:!0,interTime:5e3}),ValuateCount(),valuateFadeIn(),fixPlaceHolder([$(".js-mileage")])}),SelectItemValuate.prototype.show=function(){var t=this;$(t.targetEl).addClass("active"),t.active===!1&&(t.eventFn=function(e){var a=0,n=!0,i=$(e.target).parents();for(a=0;a<i.length;a++)if(i[a]===t.targetEl[0]){n=!1;break}n&&t.hide()},$(document).on("click",t.eventFn)),this.active=!0,"function"==typeof t.showCB&&t.showCB()},SelectItemValuate.prototype.hide=function(){var t=this;t.targetEl.removeClass("active"),$(document).off("click",t.eventFn),this.active=!1,"function"==typeof this.hideCB&&this.hideCB()},SelectItemValuate.prototype.init=function(){var t=this;t.triggerEl.on("click",function(){t.active===!1?t.show():t.hide()})};