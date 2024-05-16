var animating = false;
var axis_map = {
    'x': '0 0 1',
    'y': '1 0 0',
    'z': '0 1 0',
}
var pi = 3.14159;

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

headlight = true;
omnilight = true;
omni_no = 6;

function headLight() {
    headlight = !headlight;
    document.getElementById('model__headlight').setAttribute('headlight', headlight.toString());
}

function omniLight() {
    omnilight = !omnilight;
    for (i = 1; i <= omni_no; i++) {
        omni_id = 'model__omni_' + i;
        document.getElementById(omni_id).setAttribute('enabled', omnilight.toString());
    }
}
