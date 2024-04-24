function generateHtmlContent(tag, content) {
    tag_start = '<' + tag + '>';
    tag_end = '</' + tag + '>';
    return tag_start + content + tag_end;
}

$(document).ready(function() {
    $.getJSON('./data/data.json', function(jsonObj) {
        console.log(jsonObj);
        $('#title_home').html(generateHtmlContent('h2', jsonObj.pageTextData[0].title));
        $('#subtitle_home').html(generateHtmlContent('h3', jsonObj.pageTextData[0].subtitle));
        $('#description_home').html(generateHtmlContent('p', jsonObj.pageTextData[0].description));

        $('#title_left').html(generateHtmlContent('h2', jsonObj.pageTextData[1].title));
        $('#subtitle_left').html(generateHtmlContent('h3', jsonObj.pageTextData[1].subtitle));
        $('#description_left').html(generateHtmlContent('p', jsonObj.pageTextData[1].description));

        $('#title_centre').html(generateHtmlContent('h2', jsonObj.pageTextData[2].title));
        $('#subtitle_centre').html(generateHtmlContent('h3', jsonObj.pageTextData[2].subtitle));
        $('#description_centre').html(generateHtmlContent('p', jsonObj.pageTextData[2].description));

        $('#title_right').html(generateHtmlContent('h2', jsonObj.pageTextData[3].title));
        $('#subtitle_right').html(generateHtmlContent('h3', jsonObj.pageTextData[3].subtitle));
        $('#description_right').html(generateHtmlContent('p', jsonObj.pageTextData[3].description));

        $('#title_left_bottom').html(generateHtmlContent('h2', jsonObj.pageTextData[1].title));
        $('#subtitle_left_bottom').html(generateHtmlContent('h3', jsonObj.pageTextData[1].subtitle));
        $('#description_left_bottom').html(generateHtmlContent('p', jsonObj.pageTextData[1].description));

        $('#title_centre_bottom').html(generateHtmlContent('h2', jsonObj.pageTextData[2].title));
        $('#subtitle_centre_bottom').html(generateHtmlContent('h3', jsonObj.pageTextData[2].subtitle));
        $('#description_centre_bottom').html(generateHtmlContent('p', jsonObj.pageTextData[2].description));

        $('#title_right_bottom').html(generateHtmlContent('h2', jsonObj.pageTextData[3].title));
        $('#subtitle_right_bottom').html(generateHtmlContent('h3', jsonObj.pageTextData[3].subtitle));
        $('#description_right_bottom').html(generateHtmlContent('p', jsonObj.pageTextData[3].description));

        $('#model_description_coke').html(generateHtmlContent('p', jsonObj.pageTextData[4].model_description));
        $('.camera_title').html(generateHtmlContent('h5', jsonObj.pageTextData[5].camera_title));
        $('.camera_description').html(generateHtmlContent('p', jsonObj.pageTextData[5].camera_description));
    });
});