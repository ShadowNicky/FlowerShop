window["log"] = function (str) {
    console.log(str);
};
window["updatevalue"] = function (val, url) {
    $el_min = jQuery('#m0');
    $el_max = jQuery('#m1');
    $el_count = jQuery('#m2');
    if (typeof val[0] != "undefined") {
        $el_min.html(val[0]);
        $el_count.html('<span  class="glyphicon glyphicon-refresh"></span>');
        url = url + '&' + $.param({'range': val.join(',')});
        $.getJSON(url, function (json) {
            $el_count.html('count' in json ? json.count : '<span class text-danger>' + json.error + '</span>')
        })


    }
};