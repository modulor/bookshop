$(function(){
    var url = window.location;
    $('ul.nav a[href="'+ url +'"]').parent().addClass('active');
})