var xmlHttp = new XMLHttpRequest();
var numberOfColumns = 2;
var htmlCode = "";
var response;

function gallery(gallery_type, column_number) {
    var url = "hook.php";
    var params = "gallery_type=" + gallery_type;
    var send = url + "?" + params
    xmlHttp.open("GET", send, true);
    xmlHttp.send(null);
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4) {
            response = xmlHttp.responseText.split(";");
            htmlCode += '<tr>';
            for (var i=0; i<response.length; i++) {
                htmlCode += '<td id="gallery_cell">';
                htmlCode += '<a href="' + response[i] +  '">';
                htmlCode += '<img src="' + response[i] + '" class="img_thumbnail"/>';
                htmlCode += '</a>';
                htmlCode += '</td>';

                if (((i+1)%numberOfColumns) == 0) {
                    htmlCode += '</tr><tr>';
                }
            }
            htmlCode += '</tr>';
            document.getElementById('gallery_' + gallery_type).innerHTML = htmlCode;
        }
    }
}

$(document).ready(function() {
    var column_number = 2;
    var gallery_types = ['coke', 'sprite', 'pepper'];
    for (var i = gallery_types.length - 1; i >= 0; i--) {
        gallery(gallery_types[i], column_number);
    }
});