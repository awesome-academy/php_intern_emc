$(document).ready(() => {
    const menuItem = document.getElementsByClassName("side-bar__item");

    for (let i = 0; i < menuItem.length; i++) {
        menuItem[i].addEventListener("click", function() {
            this.classList.toggle("active");
            let panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
            }
        });
    }
});
