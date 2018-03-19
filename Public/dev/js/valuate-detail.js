

$(function(){

    fixPlaceHolder([
        $(".js-tel")
    ]);

    valuateSaleCar();

    initQuickSale(15);

});


function valuateSaleCar(){
    var msg = $(".js-accurate-valuation");
    var salebtn = $(".js-salebtn");
    var url = getScriptObj(".js-be-api").quickSale;
    var valuateAppointUrl = getScriptObj(".js-be-api").valuateAppoint;
    var wechatSrc = $(".js-ft-wechat").attr("src");
    var currentPage = window.location.search;
    var msgFullPage = new FullPage({
        el : $(".valuate-salecar-wrap")
    });

    msg.on("click",function(){
        msgFullPage.show();
        $.ajax({
            url: valuateAppointUrl,
            type: "POST",
            dataType: "json",
            data: {
                page: currentPage
            }
        });
    });
    
    salebtn.on("click", function(){
        var tel = $(".js-tel").val();
        $.ajax({
            url: url,
            type: "POST",
            dataType: "json",
            data: {
                tel: tel,
                origin: 9
            }
        }).done(function(data) {
            if(data.status === 0 || data.status === 2){
                initSuccessAlert();
                reset();
                msgFullPage.hide();
            }else{
                newAlert(data.msg);
            }
        }).fail(function() {
            newAlert("网络好像开了会小差，请刷新重试");
        });
    });
}


function reset(){
    $(".js-tel").val("");
}

