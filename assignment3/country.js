
window.onload = function() {
 prepareListener();
}
function prepareListener() {
 var droppy;
 droppy = document.getElementById("pickacountry");
 droppy.addEventListener("change",getArt);
}
function getcountry() {
 this.form.submit();
}
