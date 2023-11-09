$(window).on('load', function(){
    AOS.init(); 

});

$('.pesan-btn').click(() => {
    if($('.none').hasClass('d-none')){
        $('.none').removeClass('d-none')
    }else{
        $('.none').addClass('d-none')
    }
})