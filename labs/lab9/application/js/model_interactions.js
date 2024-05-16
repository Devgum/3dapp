var animating = false;
var axis_map = {
    'x': '0 0 1',
    'y': '1 0 0',
    'z': '0 1 0',
}
pi = 3.14159

function spin(axis = 'z', key_no = 5) {
    animating = !animating;
    if (!axis_map.hasOwnProperty(axis)) axis = 'z';
    keyframes = []
    for (i = 0; i < key_no; i++) {
        keyframe = axis_map[axis] + ' ' + (pi * 0.5 * i).toFixed(3);
        keyframes.push(keyframe);
    }
    document.getElementById('model__Rotator').setAttribute('keyValue', keyframes);
    document.getElementById('model__RotationTimer').setAttribute('enabled', animating.toString());
}

function stop()
{
    animating = false;
    document.getElementById('model__RotationTimer').setAttribute('enabled', animating.toString());
}