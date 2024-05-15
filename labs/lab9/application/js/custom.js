function toggle_active_btn(btn_id) {
    var targetButton = document.getElementById(btn_id);
    var buttonGroup = targetButton.parentNode;
    var buttons = buttonGroup.getElementsByClassName("btn");

    Array.from(buttons).forEach(btn => {
        btn.classList.remove("active");
    });

    targetButton.classList.add("active");
}