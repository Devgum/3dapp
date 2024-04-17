counter = 0;

function changeLook(num) {
    num %= 5;
    if (num < 0) num += 5;
    bodyElement = document.getElementById('body');
    headerElement = document.getElementById('header');
    footerElement = document.getElementById('footer');
    switch (num) {
        case 0:
            document.body.style.backgroundColor = 'rgb(218, 216, 148)';
            bodyElement.style.backgroundColor = 'rgb(218, 216, 148)';
            headerElement.style.backgroundColor = '#760003';
            footerElement.style.backgroundColor = '#760003';
            break;
        case 1:
            document.body.style.backgroundColor = 'lightblue';
            bodyElement.style.backgroundColor = 'lightblue';
            headerElement.style.backgroundColor = '#FF0000';
            footerElement.style.backgroundColor = '#FF9900';
            break;
        case 2:
            document.body.style.backgroundColor = '#FF6600';
            bodyElement.style.backgroundColor = '#FF6600';
            headerElement.style.backgroundColor = '#FF9999';
            footerElement.style.backgroundColor = '#996699';
            break;
        case 3:
            document.body.style.backgroundColor = 'coral';
            bodyElement.style.backgroundColor = 'coral';
            headerElement.style.backgroundColor = 'darkcyan';
            footerElement.style.backgroundColor = 'darksalmom';
            break;
        case 4:
            document.body.style.backgroundColor = 'lightgrey';
            bodyElement.style.backgroundColor = 'lightgrey';
            headerElement.style.backgroundColor = 'chocolate';
            footerElement.style.backgroundColor = 'dimgrey';
            break;
        default:
            break;
    }
}
