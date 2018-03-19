

$(function(){
	
	slideAssess();

	$(".js-assessnews").slide({
		mainCell: ".js-assessnews-list",
		effect: "topLoop",
		autoPlay: true,
		interTime: 5000
	});

	ValuateCount();

	valuateFadeIn();

	fixPlaceHolder([
		$(".js-mileage")
	]);
});


function slideAssess(){
	var urls = getScriptObj(".js-be-valuate");

	var doc = $(document);
	var elAssess = $(".js-assess");

	var elModel = $(".js-model");
	var elDate = $(".js-date");
	var elCity = $(".js-city");
	var elMileage = $(".js-mileage");

	var lsBrand = $(".jsl-brand");
	var lsSeries = $(".jsl-series");
	var lsModel = $(".jsl-model");
	var ttBrand = $(".js-tt--brand");
	var ttSeries = $(".js-tt--series");
	var wpBrand = $(".jsw-brand");
	var wpSeries = $(".jsw-series");
	var wpModel = $(".jsw-model");
	var wpModelSelect = $(".js-select-model");
	var elsCloseSelect = $(".js-select-model-close");

	var lsYear = $(".jsl-year");
	var lsMonth = $(".jsl-month");
	var wpYear = $(".jsw-year");
	var wpMonth = $(".jsw-month");
	var wpDateSelect = $(".js-select-date");

	var lsCity = $(".jsl-city");
	var wpCity = $(".jsw-city");
	var wpCitySelect = $(".js-select-city");

	var elSubmit = $(".js-btn-valuate");

	var brandName = "";
	var seriesName = "";
	var modelName = "";
	var brandId = 0;
	var seriesId = 0;
	var modelId = 0;

	var lsLetter = $(".jsl-letter");

	~function initBrandSelect(){
		var slideSelectModel = new SelectItemValuate({
			triggerEl : elModel,
			targetEl : wpModelSelect
		});

		elModel.one("click", function(){
			var brandRenderHtml = "";

			$.ajax({
				url: urls.getBrand,
				type: "GET",
				dataType: "json",
				data: {}
			}).done(function(data) {
				brandRenderHtml = getGroupRenderHtml(data, "brand");

				var letterHtml = "";
				for(var k in data){
					if(data.hasOwnProperty(k)){
						letterHtml += '<li>' + k + '</li>';
					}
				}
				lsLetter.html(letterHtml);

			}).fail(function() {
				brandRenderHtml = '<li>获取品牌失败，请重试</li>';
			}).always(function(data){
				lsBrand.html(brandRenderHtml);
				wpBrand.addClass("active");

				var tops = {};

				for(var k in data){
					if(data.hasOwnProperty(k)){
						tops[k] = lsBrand.find("." + k).position().top;
					}
				}

				~function initLetterNav(){
					lsLetter.on("click", "li", function(event){
						var $this = $(this);
						var l = $this.text();

						var t = tops[l];

						lsBrand.scrollTop(t);
					});
				}();
			});
		});

		~function brandItemsEvent(){
			var seriesRenderHtml = "";

			lsBrand.on("click", ".list li", function(){
				var $this = $(this);
				lsBrand.find(".current").removeClass("current");
				wpModel.removeClass("active");

				$this.addClass("current");
				brandId = parseInt($this.data("id"));
				brandName = $this.text();

				$.ajax({
					url: urls.getSeries,
					type: "GET",
					dataType: "json",
					data: {
						id : brandId
					}
				}).done(function(data) {
					seriesRenderHtml = getGroupRenderHtml(data, "series");
				}).fail(function() {
					seriesRenderHtml = '<li>获取系列失败，请重试</li>';
				}).always(function() {
					ttBrand.text(brandName);
					wpSeries.addClass("active");
					wpModel.removeClass("active");
					// lsSeries.html(seriesRenderHtml);
					lsSeries.html(seriesRenderHtml).scrollTop(0);
				});
			});
		}();

		~function seriesItemsEvent(){
			var modelRenderHtml = "";

			lsSeries.on("click", ".list li", function(){
				var $this = $(this);
				lsSeries.find(".current").removeClass("current");

				$this.addClass("current");
				seriesId = parseInt($this.data("id"));
				seriesName = $this.text();

				$.ajax({
					url: urls.getModel,
					type: "GET",
					dataType: "json",
					data: {
						id : seriesId
					}
				}).done(function(data) {
					modelRenderHtml = getGroupRenderHtml(data, "model");
				}).fail(function() {
					modelRenderHtml = '<li>获取车型失败，请重试</li>';
				}).always(function() {
					ttSeries.text(seriesName);
					// wpSeries.removeClass("active");
					wpModel.addClass("active");
					// lsModel.html(modelRenderHtml);
					lsModel.html(modelRenderHtml).scrollTop(0);
				});
			});
		}();

		~function modelItemsEvent(){
			var modelRenderHtml = "";

			lsModel.on("click", ".list li", function(){
				var $this = $(this);
				lsModel.find(".current").removeClass("current");

				$this.addClass("current");
				modelId = $this.data("id");
				modelName = seriesName + " " + $this.text();

				elModel.text(modelName).data(
					"upload", $this.data("id")
				).data(
					"minyear", $this.data("minyear")
				).data(
					"maxyear", $this.data("maxyear")
				).removeClass("hint").addClass("chosen");
				wpSeries.removeClass("active");
				wpModel.removeClass("active");
				slideSelectModel.hide();
			});
		}();

		// ~function selectItemsClose(){
		//
		// 	elsCloseSelect.on("click", function(){
		// 		$(this).parents(".ct-wrap").removeClass("active");
		// 	});
		// }();

		function getGroupRenderHtml(data, type){
			var html = "";
			if(type === "model"){
				for(var i in data){
					if(data.hasOwnProperty(i)){
						html += '<li class="group">' +
								'<p class="init">' + i + '</p>' +
								'<ul class="list">';
						for(var j = 0, len = data[i].length; j < len; j++){
							html += '<li data-id="' + data[i][j].id + '" ' +
									'data-minyear="' + data[i][j].min_year + '" ' +
									'data-maxyear="' + data[i][j].max_year + '" ' +
									'data-price="' + data[i][j].model_price + '" ' +
									'>' +
									data[i][j].name + '</li>';
						}
						html += '</ul>' + '</li>';
					}
				}
			}else{
				for(var k in data){
					if(data.hasOwnProperty(k)){
						html += '<li class="group">' +
								'<p class="init ' + k + '">' + k + '</p>' +
								'<ul class="list">';
						for(var l = 0, len2 = data[k].length; l < len2; l++){
							html += '<li data-id="' + data[k][l].id + '">' +
									data[k][l].name + '</li>';
						}
						html += '</ul>' + '</li>';
					}
				}
			}
			return html;
		}
	}();

	~function initDateSelect(){
		var thisYear = parseInt((new Date()).getFullYear());
		var thisMonth = parseInt((new Date()).getMonth()) + 1;
		var minYear = 0;
		var maxYear = 0;
		var selectYear = 0;
		var selectMonth = 0;
		var slideSelectDate = null;

		elDate.on("click", function(){
			var yearRenderHtml = "";

			if(isNaN(parseInt(elModel.data("upload")))){
				setTimeout(function(){
					elModel.trigger("click");
				}, 200);
			}else{
				if( slideSelectDate === null ){
					slideSelectDate = new SelectItemValuate({
						triggerEl : elDate,
						targetEl : wpDateSelect
					});
					slideSelectDate.show();
				}

				minYear = parseInt(elModel.data("minyear"));
				maxYear = parseInt(elModel.data("maxyear"));

				lsYear.html(getYearRenderText());
				wpMonth.removeClass("active");
				wpYear.addClass("active");
			}

			function getYearRenderText(){
				var html = "";

				for(var i = minYear; i <= maxYear; i++){
					html += '<li>' + i + "年" + '</li>';
				}
				return html;
			}
		});

		lsYear.on("click", "li", function(){
			var $this = $(this);
			var maxMonth = 0;

			lsYear.find(".current").removeClass("current");
			$this.addClass("current");

			selectYear = parseInt($this.text());
			maxMonth = (selectYear === thisYear) ? thisMonth : 12;
			lsMonth.html(getMonthRenderText());

			wpMonth.addClass("active");

			function getMonthRenderText(){
				var html = "";

				for(var i = 1; i <= maxMonth; i++){
					html += '<li>' + i + "月" + '</li>';
				}
				return html;
			}
		});

		lsMonth.on("click", "li", function(){
			var $this = $(this);

			lsMonth.find(".current").removeClass("current");
			$this.addClass("current");
			selectMonth = parseInt($this.text());

			elDate.text(selectYear + "年" + selectMonth + "月").addClass("chosen")
			.data("upload-year", selectYear)
			.data("upload-month", selectMonth);
			slideSelectDate.hide();
		});

	}();

	~function initCitySelect(){
		var slideSelectCity = new SelectItemValuate({
			triggerEl : elCity,
			targetEl : wpCitySelect
		});

		elCity.one("click", function(){
			var cityRenderHtml = "";

			$.ajax({
				url: urls.getCity,
				type: "GET",
				dataType: "json",
				data: {
					type : 3
				}
			}).done(function(data) {
				cityRenderHtml = getRenderHtml(data);
			}).fail(function() {
				cityRenderHtml = '<li>获取城市失败，请重试</li>';
			}).always(function(){
				lsCity.html(cityRenderHtml);
				wpCity.addClass("active");
			});

			function getRenderHtml(data){
				var html = "";
				for(var k in data){
					if(data.hasOwnProperty(k)){
						html += '<li class="group">' +
								'<p class="init">' + k + '</p>' +
								'<ul class="list">';
						for(var l = 0, len2 = data[k].length; l < len2; l++){
							html += '<li data-id="' + data[k][l].zipcode + '">' +
									data[k][l].city + '</li>';
						}
						html += '</ul>' + '</li>';
					}
				}
				return html;
			}
		});

		lsCity.on("click", ".list li", function(){
			var $this = $(this);
			lsCity.find(".current").removeClass("current");
			$this.addClass("current");

			elCity.text($this.text()).addClass("chosen").data(
				"upload", $this.data("id")
			);

			slideSelectCity.hide();
		});
	}();

	~function submitData(){
		var mileRegStrict = /^[1-9]\d?(\.\d?[1-9]$)?$|^0\.\d?[1-9]$/;
		var mileReg = /^\d?\d*(\.\d*\d$)?$|^0\.\d*\d$/;

		var expect = "";
		var date = "";
		var year = "";
		var month ="";
		var cityId = "";
		var mileage = "";

		elSubmit.on("click", function(){

			expect = elModel.data("upload");
			year = elDate.data("upload-year");
			month = elDate.data("upload-month");
			cityId = elCity.data("upload");
			mileage = parseFloat(elMileage.val());

			if(expect === undefined){
				newAlert("请选择品牌车型");
			}else if(month === undefined){
				newAlert("请选择上牌日期");
			}else if(cityId === undefined){
				newAlert("请选择城市");
			}else if(isNaN(mileage)){
				newAlert("里程数输入错误，请重新输入");
			}else if(mileage >= 100){
				newAlert("里程数不能超过100万公里");
			}else{
				$.ajax({
					url: urls.getValuate,
					type: "GET",
					dataType: "json",
					data: {
						brandName : brandName,
						seriesName : seriesName,
						modelName : modelName,
						brandId : brandId,
						seriesId : seriesId,
						d_model : modelId,
						expect : expect,
						year : year,
						month : month,
						mile : mileage,
						city : cityId
					}
				}).done(function(data) {
					if(data.status === 0){
						reset();
						window.location.href = data.url;
					}else{
						newAlert(data.msg);
					}
				}).fail(function() {
					newAlert("网络好像开了会小差，请刷新重试");
				});
			}
		});

		function reset(){
			elModel.text("请选择品牌车型").removeClass("chosen").removeData("upload");
			elDate.text("请选择上牌日期").removeClass("chosen").removeData("upload");
			elCity.text("请选择城市").removeClass("chosen").removeData("upload");
			elMileage.val("").trigger("blur");
		}
	}();
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
		// avoid event adding before offing in prototype.hide
		_this.eventFn = function(event){
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

		$(document).on("click", _this.eventFn);
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

//估价页面数字滚动
function ValuateCount(){
	var url = getScriptObj(".js-be-api").getValuateCount;
	num = "";
	$.ajax({
	   url: url,
	   type: "GET",
	   dataType: "json",
	   data: {}
	}).done(function(data){
		num = parseInt(data);
		$(".mt-number-box").numberAnimate({ num: num, speed:2000, symbol: ""});
	});
}

function valuateFadeIn(){
    var assessnews = $(".js-valuate-feature");
    assessnews.addClass('active');
}
