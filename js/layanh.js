function changeImage(id) {
    let Img = document.getElementById(id).getAttribute('src');

    document.getElementById("img").setAttribute('src', Img);
    document.getElementById("img_fake").setAttribute('src', Img);
    document.getElementById("magnifier").setAttribute("style", "background-image: url(" + Img + "");
    document.getElementById(id).style.border = "1px solid coral";


}




var mau1 = document.getElementById("mau1").value;

if (mau1 == '') {

    document.getElementById("mau1").style.display = "none";
}
var mau2 = document.getElementById("mau2").value;

if (mau2 == '') {

    document.getElementById("mau2").style.display = "none";
}
var mau3 = document.getElementById("mau3").value;

if (mau3 == '') {

    document.getElementById("mau3").style.display = "none";
}
var mau4 = document.getElementById("mau4").value;

if (mau4 === '') {

    document.getElementById("mau4").style.display = "none";
}