
$(function(){

	initCitySwitch();

	initSwitch();

});


function initCitySwitch(){
	var map = new BMap.Map("m-map-baidu");
	var point = {}, marker = {}, label = {}, labelText = {};
	var store_coord_url = getScriptObj(".js-be-api").getStoreCoord;
	var store_info_url = getScriptObj(".js-be-api").getStoreInfo;
	var html = "";
	var wrap = $(".js-map-wrap");

	$('.js-map-chosen').on("click", ".js-item--chosen", function(){
		var cityname = $(this).data("city");
		var index = $(this).index();

		$.ajax({
			url: store_info_url,
			type: "post",
			dataType: "json",
			data:{}
		}).done(function(data){
			var html = rendStoreInfo(index,data.data);
			wrap.html(html);
		});

		$.ajax({
			url: store_coord_url,
			type: "post",
			dataType: "json",
			data:{
				city: cityname
			}
		}).done(function(data){
			var address = $(".js-item--target").find(".address").text();
			
			if(data.status === 0){
				for(var i in data.data){
					point[cityname] = new BMap.Point(data.data[i].lot, data.data[i].lat);
				}

				marker[cityname] = new BMap.Marker(point[cityname]);

				var labelOpt = {
					offset : new BMap.Size(-70, -72),
					style : {
						width : "120px",
						padding : "5px 10px",
						fontSize : "12px",
						color : "#fff",
						lineHeight : "18px",
						whiteSpace : "normal",
						backgroundColor : "rgba(75, 75, 75, 0.7)",
						border : "none",
						outline : "none",
						borderRadius : "5px"
					}
				};

				labelText[cityname] = address;

				label[cityname] = new BMap.Label(labelText[cityname], {
					position : point[cityname],
					offset : labelOpt.offset
				});


				label[cityname].setStyle(labelOpt.style);

				map.centerAndZoom(point[cityname], 15);

				map.addControl(new BMap.ScaleControl());

				map.enableScrollWheelZoom(true);

				map.addOverlay(marker[cityname]);

				// map.addOverlay(label.fuzhou);

				map.panTo(point[cityname]);
			}
		});
	});
}


function initSwitch(){
	var switchTabs = new SwitchTabs({
		reference : ".js-map-chosen",
		target: ".js-map-target",
		referencesSelector: ".js-item--chosen",
		targetsSelector: ".js-item--target"
	});
}


function rendStoreInfo(index,data){
	var html = "";
		html += "<li class='item js-item--target'>";
		html += "<img  class='img' src='"+ data[index].image +"'>";
		html +=	"<div class='txt'>";
		html +=	"<p class='icon'></p>";
		html +=	"<p class='address'><span>地址："+ data[index].address + "</span></p>";
		html +=	"</div>";
		html += "</li>";

	return html;

	
}
