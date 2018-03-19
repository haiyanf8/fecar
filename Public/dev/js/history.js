

$(function(){

	// fixPlaceHolder([
	// 	$(".js-historysale-tel")
	// ]);

	initSettingSearchValue();

	initQuickSale(5);

	historyItemImgLazy();

});


function initSettingSearchValue(){
	var $ttBrandEl = $(".js-select-brand .js-tt");
	var $ttSeriesEl = $(".js-select-series .js-tt");

	var $ctBrandEl = $(".js-select-brand .js-ct");
	var $ctSeriesEl = $(".js-select-series .js-ct");

	var brandParam = $("#brand_param").val();
	var seriesParam = $("#series_param").val();

	var letter = $(".jsl-letter");
	var brand = $(".jsl-brand");
	var wpBrand = $(".jsw-brand");
	var wpseries = $(".jsw-series");
	var brandTitle = $(".jsl-brand-title");


	var selectItemBrand = new SelectItemValuate({
		triggerEl : $ttBrandEl,
		targetEl : $ctBrandEl
	});

	var selectItemSeries = new SelectItemValuate({
		triggerEl : $ttSeriesEl,
		targetEl : $ctSeriesEl
		// focusCB : function(){
		// 	if(iptBrand.get() === ""){
		// 		$ttBrandEl.addClass("hint");
		// 	}
		// }
	});
	
	//取得每个自定义form的url
	getNewFormUrl(); 

	function InputOperation(el){
		this.$el = $(el);
	}
	InputOperation.prototype.set = function(val){
		this.$el.val(val);
	};
	InputOperation.prototype.get = function(){
		return this.$el.val();
	};

	var iptBrand = new InputOperation(".js-type-brand");
	var iptSeries = new InputOperation(".js-type-series");
	var iptModel = new InputOperation(".js-type-model");

	var url = getScriptObj(".js-be-api");

	$ttBrandEl.one("click", function(){

		var renderHtml = "";
		$.ajax({
			url: url.getBrand,
			type: "GET",
			dataType: "json",
			data: {}
		}).done(function(data) {
			if(data.status === 0){
				renderHtml = getBrandRenderHtml(data);
			}
		}).fail(function() {
			renderHtml = '<ul><p>获取品牌失败，请重试</p></ul>';
		}).always(function(data){
			$ctBrandEl.html(renderHtml);
	
			var tops = {};
			
			for(var h in data.result){
				if(data.result.hasOwnProperty(h)){
					tops[h] = brand.find("." + h).position().top;
				}
			}

			~function initLetterNav(){
				letter.on("click", "li", function(event){
					var $this = $(this);
					var l = $this.text();
					var t = tops[l];
					brand.scrollTop(t);
				});
			}();
		});
	});

	brand.on("click", "li", function(){
		iptSeries.set("");
		iptModel.set("");
		$ttSeriesEl.text("选择车系").removeClass("hint chosen");
		// $ttModelEl.text("选择型号").removeClass("hint chosen");

		var $this = $(this);
		var name = $this.data("name");

		iptBrand.set(name);
		$ttBrandEl.text(name).addClass("chosen");
		$ctBrandEl.trigger("blur");
	});

	$ctSeriesEl.on("click", "li", function(){
		iptModel.set("");
		$ttModelEl.text("选择型号").removeClass("hint chosen");

		var $this = $(this);
		var name = $this.text();

		iptSeries.set(name);
		$ttSeriesEl.text(name).addClass("chosen");
		$ctSeriesEl.trigger("blur");
	});

	$ttSeriesEl.on("click", function(){
		var $this = $(this);
		var c2 = iptBrand.get();

		var renderHtml = "";
			
		if($ttBrandEl.text() === "品牌选择"){
			selectItemSeries.hide();
			$.ajax({
				url: url.getBrand,
				type: "GET",
				dataType: "json",
				data: {}
			}).done(function(data) {
				if(data.status === 0){
					renderHtml = getBrandRenderHtml(data);
				}
			}).fail(function() {
				renderHtml = '<ul><p>获取品牌失败，请重试</p></ul>';
			}).always(function(data){
				$ctBrandEl.html(renderHtml);
			});
			selectItemBrand.show();
		}

		$.ajax({
			url: url.getSeries,
			type: "GET",
			dataType: "json",
			data: {
				c2 : c2
			}
		}).done(function(data){
			renderHtml = getSeriesRenderHtml(data);
		}).fail(function() {
			renderHtml = '<ul><p>获取系列失败，请重试</p></ul>';
		}).always(function(){
			$ctSeriesEl.html(renderHtml).scrollTop(0);
		});
	});


	function getBrandRenderHtml(data){
		var html = "";
		var alphahtml = "";
		var conthtml = "";
		
		html = "<a href='./history.html? "+ brandParam +"'>全部</a>";

		brandTitle.html(html);

		for(var i in data.result){
		
			if(data.result.hasOwnProperty(i)){
				alphahtml += '<li>' + i + '</li>';
			}
			
			letter.html(alphahtml);
		}

		for(var k in data.result){
			if(data.result.hasOwnProperty(k)){
				conthtml += '<li class="group">' +
						'<p class="init ' + k + '">' + k + '</p>' +
						'<ul class="list">';
				for(var j = 0, len = data.result[k].length; j < len; j++){
					conthtml += '<li data-name="' + data.result[k][j].c2 + '" ' + '>' + 
					'<a href="./history.html?brand=' + data.result[k][j].c2 + "&" + brandParam + '">' +
							 data.result[k][j].c2 + '</a></li>';
				}
				conthtml += '</ul>' + '</li>';
			}
		}

		brand.html(conthtml);
	}

	function getSeriesRenderHtml(data){
		var html = "";
		if(data.status === 0){
			html += "<ul>";
			html += "<li data-name=全部><a href='./history.html? "+ seriesParam +"'>全部</a></li></li>";
			for(var i in data.result){
				html += "<li data-name=" + data.result[i].c4 + " >" +
						"<a href='./history.html?series="+ data.result[i].c4 + "&" + seriesParam + "'>" + data.result[i].c4 +
						"</a></li>";
			}
			html += "</ul>";
			return html;
		}else if(data.status === 1){
			return html;
		}else if(data.status === 2){
			return html;
		}else if(data.status === 3){
			html = '<ul><p>获取数据失败，请重试</p></ul>';
			return html;
		}
	}

	function getModelRenderHtml(data){
		var html = "";
		if(data.status === 0){
			html += "<ul>";
			html += "<li data-name=全部><a href='./history.html? "+ modelParam +"'>全部</a></li></li>";
			for(var i in data.result){
				html += "<li data-name=" + data.result[i].c5 + " >" +
						"<a href='./history.html?model="+ data.result[i].c5 + "&" + modelParam + "'>" + data.result[i].c5 +
						"</a></li>";
			}
			html += "</ul>";
			return html;
		}else if(data.status === 1){
			return html;
		}else if(data.status === 2){
			return html;
		}else if(data.status === 3){
			html = '<ul><p>获取数据失败，请重试</p></ul>';
			return html;
		}
	}

	function getNewFormUrl(){
		var subBtn = $(".form-mile");
		var formAction = "";
		var formName = "";
		var values = "";
		var i = 0;
		var str = "";
		
		subBtn.on("click", ".js-button", function(){
			formAction = $(this).closest('form').attr("action");
			formName = $(this).closest('form').attr("name");

			values = $("form[name="+formName+"]").serializeArray();
			
			for(i in values){
				str += values[i].name + "=" + values[i].value + "&";
			}

			str = str.substring(0,str.length-1);

			window.location.href = formAction + "&" + str;
			
		});
	}
}


function historyItemImgLazy(){
	var imgs = $(".m-history-item .img img");
	var getStyle = $(".js-getStyle").text();

	imgs.each(function(){
		var $this = $(this);

		if($this.data("origin") !== undefined){
			$this.attr("src", $this.data("origin"));
		}
	});


	imgs.error(function(){
	    var $this = $(this);
	    $this.attr("src", getStyle +　"/prd/img/source/pbl/history-detail-default.png");
	});
}

function SelectItemValuate(o){
    this.triggerEl = o.triggerEl;
    this.targetEl = o.targetEl;

	this.showCB = o.showCB;
	this.hideCB = o.hideCB;

	this.active = false;
	this.eventFn = null;

    this.init();
}

SelectItemValuate.prototype.show = function(){
	var _this = this;

	$(_this.targetEl).addClass('active');

	if( _this.active === false ){
		this.eventFn = function(event){

			var i = 0;
			var flag = true;
			var ps = $(event.target).parents();

			for(i = 0; i < ps.length; i++){
				if( ps[i] === _this.targetEl[0] ){
					flag = false;
					break;
				}
			}

			if(flag){
				_this.hide();
			}
		}
		setTimeout(function(){
			$(document).on("click", _this.eventFn);
		},10)		
	}

	this.active = true;

	if( typeof _this.showCB === "function"){
		_this.showCB();
	}
}

SelectItemValuate.prototype.hide = function(){
	var _this = this;

	_this.targetEl.removeClass('active');

	$(document).off("click", _this.eventFn);

	this.active = false;

	if( typeof this.hideCB === "function"){
		this.hideCB();
	}
}

SelectItemValuate.prototype.init =  function(){
    var _this = this;

    _this.triggerEl.on("click", function(){
		if( _this.active === false){
			_this.show();
		}else{
			_this.hide();
		}
    });
};
