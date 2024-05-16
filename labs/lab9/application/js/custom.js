function toggle_active_btn(btn_id) {
    var targetButton = document.getElementById(btn_id);
    var buttonGroup = targetButton.parentNode;
    var buttons = buttonGroup.getElementsByClassName("btn");

    Array.from(buttons).forEach(btn => {
        btn.classList.remove("active");
    });

    targetButton.classList.add("active");
}

var animating = false;
var axis_map = {
    'x': 'RotatorX',
    'y': 'RotatorY',
    'z': 'RotatorZ',
}

function animate(axis = 'z') {
    animating = !animating;
    if (!axis_map.hasOwnProperty(axis)) axis = 'z';
    document.getElementById('model__route').setAttribute('fromNode', axis_map[axis]);
    document.getElementById('model__RotationTimer').setAttribute('enabled', animating.toString());
}

function stop()
{
    animating = false;
    document.getElementById('model__RotationTimer').setAttribute('enabled', animating.toString());
}