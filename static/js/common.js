
$(document).ready(function() {
   $("#div_menu_list ul").delegate(
        'li',
    'click',
    function() {
        // alert($(this).text());
        //alert($(this).find('a').attr('href'));
        if ($(this).attr('class') != ('nav-header') && $(this).attr('class') != ('divider')) 
        {
            var this_id = $(this).attr('id');
            menu_active_id(this_id);
            pUrl = $(this).find('a').attr('href');
            if (pUrl != '#')
            {
                ajax_get_main_data(pUrl);
            }
        //alert(this_id);
        }

        return false; // 不传递响应href事件
    });

    menu_select_active();

});


menu_select_active = function() {
        var active_id = '';
        $("#menu_list li").each(
                function(i, obj) {
                    // alert(i);
                    if ($(this).attr('class') != ('nav-header')
                            && $(this).attr('class') != ('divider')) {
                        var this_id = $(this).attr('id');
                        if ($(this).attr('class') == 'active') {
                            menu_active_id(this_id);
                            pUrl = $(this).find('a').attr('href');
                            if (pUrl != '#')
                            {
                                ajax_get_main_data(pUrl);
                            }
                        }
                    }
            });      
}




ajax_callback_default = function(callerId, type, obj, extra_paramas) {
            switch (type) {
            case 1:
                    break;
            case 2:
                    if (obj != null) {
                            $(callerId).html("页面加载中...");
                            if (obj.indexOf("Login_Error_No_Login") >= 0) {
                                    location.href = "./index.php?c=index";
                            } else {
                                    $(callerId).html(obj);
                            }
                    } else {
                            $(callerId).html("页面加载失败！");
                            alert("页面加载失败！");
                    }
                    break;
            case 3:
                    break;
            default:
                    break;
            }
    }

ajax_request = function(callerId, pUrl, pData, type, async,
                    cache, callback, extraParamsArr, enctype) {
            if(!arguments[7]) extraParamsArr = new Array();
            if(!arguments[8]) enctype = "application/x-www-form-urlencoded";

            $.ajax({
                    type : type,
                    data : pData,
                    async : async,
                    enctype : enctype,
                    url : pUrl,
                    cache : cache,
                    beforeSend : function(XMLHttpRequest) {
                            callback(callerId, 1, XMLHttpRequest, extraParamsArr);
                    },
                    success : function(data) {
                            callback(callerId, 2, data, extraParamsArr);
                    },
                    complete : function(XMLHttpRequest, textStatus, extraParamsArr) {
                            callback(callerId, 3, textStatus, extraParamsArr);
                    }
            });
}

ajax_callback_alert = function(callerId, type, obj, extra_paramas)
{
    switch (type) {
            case 1:
                    break;
            case 2:
                    alert(obj);
                    break;
            case 3:
                    break;
            default:
                    break;
            }

}

ajax_get_main_data = function(pUrl, data)
{
   if(!arguments[1]) data = '';
   ajax_request("#main", pUrl, data, 'POST', false, true, ajax_callback_default, false);
}

menu_active_id = function(id) {
    var parent_id = id.substring(0, id.lastIndexOf('_'));
    $('.accordion-toggle').removeClass("t1_color");
    $("#" + parent_id).addClass("t1_color");

    $("#menu_list li").each(
        function(i, obj) {
            if ($(this).attr('class') != ('nav-header')
            && $(this).attr('class') != ('divider')) {
                var this_id = $(this).attr('id');
                if (id == this_id) {
                    $(this).attr('class', 'active');
                    $(this).find("span").css("color", "");
                } else {
                    $(this).attr('class', '');
                    $(this).find("span").css("color", "black");
                }
            }
    });

}

render_highchart_callback = function(callId, ajaxType, data, extraParams) {
    if (ajaxType != 2) {
        return false;       
    }
    var title = extraParams['title'];
    var chartType = extraParams['chartType'];
    if (chartType == null) chartType = 'column';
    var data = eval('(' + data + ')');
    
    createChart(callId, chartType, title, data['categories'], data['series']);
   
}


createChart =  function(render, chartType, title, coord_x, series) {
    $(render).highcharts({
        chart: {
            type: chartType
        },
        title: {
            text: title
        },
        xAxis: {
            categories: coord_x
        },
        yAxis: {
            min: 0,
            title: {
                text: title
            },
            stackLabels: {
                enabled: true,
                style: {
                    fontWeight: 'bold',
                    color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                }
            }
        },
        legend: {
            align: 'right',
            x: -30,
            verticalAlign: 'top',
            y: 25,
            floating: true,
            backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
            borderColor: '#CCC',
            borderWidth: 1,
            shadow: false
        },
        tooltip: {
            formatter: function () {
                return '<b>' + this.x + '</b><br/>' +
                    this.series.name + ': ' + this.y + '%';
            }
        },
        plotOptions: {
            column: {
                stacking: 'percent',
                dataLabels: {
                    enabled: true,
                    color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                    style: {
                        textShadow: '0 0 3px black'
                    }
                }
            }
        },
        series: series
    });
}





