
$(function(){

	switchCheck();

	// testingImgLoad();

	overviewSlide();

	initCheckMore();

	overviewBigImgLazy();

	detailInfoPicBigView();

	configureSwitchTabs();

	isOneWord();

});

//检测情况图片加载
function testingImgLoad(){
	var testingBtn = $(".js-testing-btn");
	var testingImgs = $(".js-testing-lazy .testing-img-in img");

	testingBtn.on("click", function(){
		testingImgs.each(function(){
			var $this = $(this);

			if($this.data("origin") !== undefined){
				$this.attr("src", $this.data("origin"));
			}
		});
	});
}


function switchCheck(){
	var switchTabs = new SwitchTabs({
		reference : ".js-switch-chosen",
		referencesSelector : ".item--chosen",
		target : ".js-switch-target",
		targetsSelector : ".item--target"
	});
}

//图片轮播
function overviewSlide(){
	function G(s){
		return document.getElementById(s);
	}

	function getStyle(obj, attr){
		if(obj.currentStyle){
			return obj.currentStyle[attr];
		}else{
			return getComputedStyle(obj, false)[attr];
		}
	}

	function Animate(obj, json){
		if(obj.timer){
			clearInterval(obj.timer);
		}
		obj.timer = setInterval(function(){
			for(var attr in json){
				var iCur = parseInt(getStyle(obj, attr));
				iCur = iCur ? iCur : 0;
				var iSpeed = (json[attr] - iCur) / 5;
				iSpeed = iSpeed > 0 ? Math.ceil(iSpeed) : Math.floor(iSpeed);
				obj.style[attr] = iCur + iSpeed + 'px';
				if(iCur == json[attr]){
					clearInterval(obj.timer);
				}
			}
		}, 30);
	}

	var oPic = G("picBox");
	var oList = G("listBox");

	var oPrev = G("prev");
	var oNext = G("next");
	var oPrevTop = G("prevTop");
	var oNextTop = G("nextTop");

	var oPicLi = oPic.getElementsByTagName("li");
	var oListLi = oList.getElementsByTagName("li");
	var len1 = oPicLi.length;
	var len2 = oListLi.length;

	var oListLiHeight = len2 * 10;

	var oPicUl = oPic.getElementsByTagName("ul")[0];
	var oListUl = oList.getElementsByTagName("ul")[0];
	var w1 = oPicLi[0].offsetHeight;
	var w2 = oListLi[0].offsetHeight + 10;

	oPicUl.style.height = w1 * len1 + "px";
	oListUl.style.height = w2 * len2 + "px";


	var index = 0;

	var num = 6;
	var num2 = Math.ceil(num / 2);

	function Change(){
		
		Animate(oPicUl, {top: - index * w1});

		if(index < num2){
			Animate(oListUl, {top: 0});
		}else if(index + num2 < len2){

			Animate(oListUl, {top: - (index - num2 + 1) * w2});
		}else{
			Animate(oListUl, {top: - (len2 - num) * w2});
		}

		for (var i = 0; i < len2; i++) {
			oListLi[i].className = "";
			if(i == index){
				oListLi[i].className = "on";
			}
		}
	}

	oNextTop.onclick = oNext.onclick = function(){
		index ++;
		index = index == len2 ? 0 : index;
		Change();
	};

	oPrevTop.onclick = oPrev.onclick = function(){
		index --;
		index = index == -1 ? len2 -1 : index;
		Change();
	};

	for (var i = 0; i < len2; i++) {
		oListLi[i].index = i;

		oListLi[i].onclick = function(){
			index = this.index;
			Change();
		};
	}
}


function initCheckMore(){
	var $elLsCheck = $(".js-ls-check-more");
	var $elBoxCheckMore = $(".js-box-check-more");

	var $elTipSlide = $(".js-tip-slide");
	var $elTipDescTt = $(".js-tip-desc-tt");
	var $elTipDescCt = $(".js-tip-desc-ct");

	var fullPageBoxCheckMore = new FullPage({
		el : $elBoxCheckMore
	});

	$elLsCheck.on("click", ".js-item-check-more", function(){
		var $this = $(this);
		var ct = JSON.parse($this.find(".js-check-more").text());
		var imgHtml = "";

		imgHtml = getImgRenderHTML(ct.img);

		$elTipSlide.html(imgHtml);

		$elTipDescTt.text(ct.text.name);
		$elTipDescCt.text(ct.text.desc);

		var $overviewLis = $(".js-tip-slide-overview ul li");
		var $mainLis = $(".js-tip-slide-main ul li");

		$(".js-tip-slide-overview").slide({
			mainCell: "ul",
			effect: "top",
			vis: 3,
			mouseOverStop: false,
			prevCell: ".btn-top",
			nextCell: ".btn-down",
			startFun: function(i,c){
				$overviewLis.eq(i).addClass("active").siblings().removeClass("active");
				$mainLis.eq(i).addClass("active").siblings().removeClass("active");
			}
		});

		fullPageBoxCheckMore.show();
	});

	function getImgRenderHTML(img){
		var html = "";
		if(img.length === 0){
			return html;
		}
		html += '<div class="tip-slide-overview js-tip-slide-overview">' +
			'<div class="btn btn-top"></div>' +
			'<ul>';
		for(var i = 0; i < img.length; i++ ){
			html += '<li><img src="' +
				img[i] +
				'" /></li>';
		}
		html += '</ul>' +
				'<div class="btn btn-down"></div>' +
			'</div>';
		html +=	'<div class="tip-slide-main js-tip-slide-main">' +
				'<ul>';
		for(var j = 0; j < img.length; j++ ){
			html += '<li><img src="' +
				img[j] +
				'" /></li>';
		}
		html +=	'</ul>' +
			'</div>';

		return html;
	}
}


function overviewBigImgLazy(){
	var imgs = $(".js-overview-lazy img");

	imgs.each(function(){
		var $this = $(this);

		if($this.data("origin") !== undefined){
			$this.attr("src", $this.data("origin"));
		}
	});
}


function detailInfoPicBigView(){
    var $mainEl = $(".js-overview-pic-big");
	var $mainSlideEl = $("#picBox ul");

    var clickNow = 1;

    var slideOverviewPicBig = new SlideItems({
        box: ".js-overview-slide-box",
		itemsSelector : "li",
        prev: ".js-overview-slide-prev",
        next: ".js-overview-slide-next"
    });

    var fullPageOverviewPicBig = new FullPage({
		el: $mainEl,
		hideClassHad: ["js-close", "js-btn--no", "js-overview-pic-big"],
        showCallBack: function(trigger){
            clickNow = $(trigger).index();
            slideOverviewPicBig.jump(clickNow);
        },
        hideCallBack: null
    });

    $mainSlideEl.on("click", "li", function(){
        fullPageOverviewPicBig.show(this);
    });

}


//主要配置和基本配置切换
function configureSwitchTabs(){
	var articleLists = new SwitchTabs({
		reference: ".js-switch-chosen",
		target: ".js-switch-target",
		referencesSelector: ".item--chosen",
		targetsSelector: ".item--target"
	});
}

//检查备注的文字是否是一个字

function isOneWord(){
	var oneWord = $(".js-one-word");
	var oneWordLen = oneWord.find("span").text().length;

	if(oneWordLen <= 1){
		oneWord.addClass('aligncenter');
	}
}


