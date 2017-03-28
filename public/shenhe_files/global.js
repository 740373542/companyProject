//获得action的访问地址
function getActionURL(action, controller) {
    var currentURL = location.href;
    if (currentURL.indexOf("localhost") >= 0 || currentURL.indexOf("127.0.0.1") >= 0) {
        return "/" + controller + ".mvc/" + action;
    } else {
        return "/EbookingNew/" + controller + ".mvc/" + action;
    }
}
//在线客服
function onlineCustomerService() {
//    var url = getActionURL("Index", "NewCustomerService");
	var url="http://ebooking.elong.com/EbookingNew/NewCustomerService.mvc/Index";
    window.open(url, '', 'height=460,width=690,left=200,top=100,resizable=yes');
}
$(function () {
    //分页控件跳转到某一页
    $("#goconfirmUrl").click(function () {
        var reg = /^\d+$/;
        var url = $(this).attr("url");
        var txt = $("#goPageindex").val();
        var max = $(this).attr("max");
        if (txt == 0) {
            $error($("#goPageindex"), "页索引无效");
            return false;
        }
        if (!reg.test(txt)) {
            $error($("#goPageindex"), "页索引无效");
            return false;
        }
        if (parseInt(txt) > parseInt(max)) {
            $error($("#goPageindex"), "页索引超出范围");
            return false;
        }
        url = url.substr(0, url.length - 1);
        window.location.href = url + txt;
        return false;
    });
});