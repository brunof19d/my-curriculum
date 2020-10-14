function checkBox() {
    if (document.getElementById("check").checked === true) {
        document.getElementById("label_end").style.display = "none"
        document.getElementById("date_end").style.display = "none"
    } else {
        document.getElementById("label_end").style.display = "block"
        document.getElementById("date_end").style.display = "block"
    }
}