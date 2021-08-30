$(document).ready(function() {
    $('.image-link').magnificPopup({type:'image'});
});

function removeMapa() {

    var el = document.querySelector("[class='1']");
    var pa = el ? el.parentNode : null;

    if (pa) {
        pa.removeChild(el);
    }

};