

$(function() {

	fixPlaceHolder([
		$(".js-bannersale-tel"),
		$(".js-levitatesale-tel"),
        $(".js-quicksale-tel")
	]);

    serviceFadeIn();

	initIndexQuickSale();

	indexDealScroll();

    indexBannerNumerScroll();

    IndexDealItemImgLazy();

    quicksalepop(1);

});


function initIndexQuickSale(){
	var bannerS = new QuickSale({
		elBtn : $(".js-bannersale-btn"),
		elInput : $(".js-bannersale-tel"),
		elWrong : $(".js-banner-wrong-box"),
		elWrongContent : $(".js-banner-confirm-ct"),
		opt : {
			alertType : "thisAlert",
			upload : {
				origin : 1
			}
		}
	});

	var asideS = new QuickSale({
		elBtn : $(".js-levitatesale-btn"),
		elInput : $(".js-levitatesale-tel"),
		elWrong : $(".js-levitatesale-wrong-box"),
		elWrongContent : $(".js-levitatesale-confirm-ct"),
		opt : {
			alertType : "thisAlert",
			upload : {
				origin : 2
			}
		}
	});
}


function indexDealScroll(){
    var dealScroll = new IndexPixScroll({
        chooseEl: ".js-choosen",
        targetEl: ".js-target"
    });
}


function indexBannerNumerScroll(){
    var options = {
            useEasing : true, 
            useGrouping : true, 
            separator : '', 
            decimal : '', 
            prefix : '', 
            suffix : '' 
    };
    var onlineSaleNumber = new CountUp("js-num01", 0, 3000, 0, 2, options);
    var saleMoreNumber = new CountUp("js-num02", 0, 20, 0, 3.5, options);
    
    if($(window).scrollTop() >= ($(".js-compare-target").offset().top -900)){
            onlineSaleNumber.start();
            saleMoreNumber.start();
    }

    $(window).scroll(function(){
        if($(window).scrollTop() >= ($(".js-compare-target").offset().top -900)){
            onlineSaleNumber.start();
            saleMoreNumber.start();
        }
    });
}

function IndexPixScroll(o){
    this.chooseEl = o.chooseEl;
    this.targetEl = o.targetEl;
    this.chooseSelector = o.chooseSelector || "li";
    this.targetSelector = o.targetSelector || "li";
    this.per = o.per || 4;
    this.speed = o.speed || 5000;

    this.timer = null;
    this.now = 0;
    this.isAuto = true;

    this.chooseElChildrenEl = $(this.chooseEl).find(this.chooseSelector);
    this.targetElChildrenEl = $(this.targetEl).find(this.targetSelector);
    this.targetElChildrenLen = this.targetElChildrenEl.length;
    this.targetElWidth = $(this.targetEl).width();
    this.totalPage = Math.ceil(this.targetElChildrenLen / this.per);
    this.targetElToalWidth = this.targetElWidth * this.totalPage;

    this.init();
}

IndexPixScroll.prototype.init = function(){
    _this = this;
    
    $(_this.targetEl).css({"width": _this.targetElToalWidth + "px"});

    if(_this.isAuto){
        this.timer = setInterval(autoScroll, _this.speed); 
    }

    function autoScroll(){
        _this.now++;
        
        if(_this.now > _this.totalPage-1){
            PageJump(0);
        }else{
            PageJump(_this.now);
        }
    }

    function PageJump(next){

        _this.chooseElChildrenEl.eq(next).addClass('current').siblings().removeClass('current');
       
        $(_this.targetEl).animate({
            "left": -(_this.targetElWidth * next) + "px"
        }, 300);

        _this.now = next;
    }

    !function clickScroll(){
        var index = 0;

        $(_this.chooseEl).on("click", _this.chooseSelector, function(){
            clearInterval(_this.timer);
            index = $(this).index();
            PageJump(index);
            _this.timer = setInterval(autoScroll, _this.speed);
        });

    }();

    $(_this.targetEl).on("mouseover", function(){
        clearInterval(_this.timer);
    });

    $(_this.targetEl).on("mouseout", function(){
       _this.timer = setInterval(autoScroll, _this.speed);
    });
};

function IndexDealItemImgLazy(){
    var imgs = $(".deal-box-item .img img");

    imgs.each(function(){
        var $this = $(this);

        if($this.data("origin") !== undefined){
            $this.attr("src", $this.data("origin"));
        }
    });
}

function serviceFadeIn(){
    var service = $(".js-ourservice");
    var serviceCont = $(".js-ourservice-content");
    var serviceTop = parseInt(service.offset().top);

    if($(window).scrollTop() >= (serviceTop-service.height()-200)){
        serviceCont.addClass('active');
    }
    
    $(window).scroll(function(){
        var b = serviceTop-service.height();
        
        if($(window).scrollTop() >= (serviceTop-service.height()-200)){
           serviceCont.addClass('active');
        }
    });
}
