var xmlHttp = new XMLHttpRequest();
var numberOfColumns = 2;
var htmlCode = "";
var response;

function gallery(gallery_type) {
    var url = "scripts/php/hook.php";
    var params = "gallery_type=" + gallery_type;
    var send = url + "?" + params
    xmlHttp.open("GET", send, true);
    xmlHttp.send(null);
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4) {
            response = xmlHttp.responseText.split(";");
            for (var i=0; i<response.length; i++) {
                htmlCode += '<a href="' + response[i] +  '">';
                htmlCode += '<img src="' + response[i] + '" class="card-img-top img-thumbnail"/>';
                htmlCode += '</a>';
            }
            document.getElementById('gallery_' + gallery_type).innerHTML = htmlCode;
        }
    }
}

$(document).ready(function() {
    var gallery_types = ['coke', 'sprite', 'pepper'];
    for (var i = gallery_types.length - 1; i >= 0; i--) {
        gallery(gallery_types[i]);
    }
});