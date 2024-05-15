function getXMLHttp() {
    var xmlHttp = null;
    try {
        xmlHttp = new XMLHttpRequest();
    } catch (e) {
        try {
            xmlHttp = new ActiveXObject("Msxml2.xmlHTTP");
        } catch (e) {
            try {
                xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
                return xmlHttp;
            }
        }
    }
    return xmlHttp;
}

var base_php = "index.php/";
var home_content = "homeContent";
var model_content = "modelContent";

function switch_to(content_api, brand_id = 0) {
    var xmlHttp = getXMLHttp();
    var htmlCode = "";
    var response;
    var send = base_php + content_api;
    if (brand_id > 0) {
        send = send + '?brand_id=' + brand_id;
    }
    xmlHttp.open("GET", send, true);
    xmlHttp.send(null);
    xmlHttp.onreadystatechange = function() {
        if(xmlHttp.readyState == 4) {
            response = xmlHttp.responseText;
            document.getElementById('content').innerHTML = response;
            x3dom.reload();
        }
    }
}

$(document).ready(function() {
    switch_to(home_content);
});
