window.addEventListener("scroll", function(event) {

    var scroll_y = this.scrollY;
    console.log(scroll_y);

    if (scroll_y > 800) {
        document.getElementById("Name").style.position = "relative";
        document.getElementById("Name").style.width = "300px";
        document.getElementById("Vay").style.display = "inline";
        document.getElementById("Vay").style.right = "-500px";


    }
});