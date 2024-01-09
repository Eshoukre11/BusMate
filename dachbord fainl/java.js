let iframe = document.getElementById("adduniver");
let iframe1 = document.getElementById("addstudemt");
let add2 = document.getElementById("add2");
let dashboard = document.getElementById("dashboard");
let s3=document.getElementById("add3");
let s4=document.getElementById("add4");
let s5=document.getElementById("add5");
let s6=document.getElementById("add6");
add1.onclick = function () {
    iframe.style.display = "none";
    iframe1.style.display = "block"
    add2.style.backgroundColor = "none";

}
add2.onclick = function () {
    iframe.style.display = "block";
    iframe1.style.display = "none"
}
dashboard.onclick = function () {
    iframe.style.display = "none";
    iframe1.style.display = "none"
}
s3.onclick = function () {
    iframe.style.display = "none";
    iframe1.style.display = "none"
}
s4.onclick = function () {
    iframe.style.display = "none";
    iframe1.style.display = "none"
}
s5.onclick = function () {
    iframe.style.display = "none";
    iframe1.style.display = "none"
}
s6.onclick = function () {
    iframe.style.display = "none";
    iframe1.style.display = "none"
}

