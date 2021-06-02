$(document).ready(() => {
    var num = $('.navbar').innerHeight();

    $(window).bind('scroll', function () {
        // alert(num);
        if ($(window).scrollTop() > num) 
        {
            $('.navbar').addClass('bg-white');
            $('.navbar').addClass('shadow-md');
            $('.navbar .brand h1').addClass('text-black');
            $('.navbar .brand i').addClass('text-red-400');
        } else {
            $('.navbar').removeClass('bg-white text-black');
            $('.navbar').removeClass('shadow-md');
            $('.navbar .brand h1').removeClass('text-black');
            $('.navbar .brand i').removeClass('text-red-400');
        }
    });

    
});



function cart_open() {
    var sidebar =  $('.sidebar-cart');
    var body = $('body');
    var overlay = $('.overlay');
    sidebar.toggleClass('hidden');
    sidebar.toggleClass('-right-96');
    sidebar.toggleClass('right-0');
    overlay.toggleClass('hidden');

    body.toggleClass('overflow-hidden');
}
function cart_close() {
    var sidebar =  $('.sidebar-cart');
    var body = $('body');
    var overlay = $('.overlay');
    sidebar.toggleClass('hidden');
    sidebar.toggleClass('-right-96');
    sidebar.toggleClass('right-0');
    overlay.toggleClass('hidden');
    
    body.toggleClass('overflow-hidden');
}

function pic_drop() {
    $('.dropdown').toggleClass('hidden');

}