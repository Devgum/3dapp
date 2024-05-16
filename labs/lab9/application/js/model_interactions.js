var animating = false;
var axis_map = {
    'x': '1 0 0',
    'y': '0 1 0',
    'z': '0 0 1',
}
pi = 3.14159

function animate(axis = 'z', key_no = 5) {
    animating = !animating;
    if (!axis_map.hasOwnProperty(axis)) axis = 'z';
    keyframes = []
    for (i = 0; i < key_no; i++) {
        keyframe = axis_map[axis] + ' ' + pi * 0.5 * i;
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