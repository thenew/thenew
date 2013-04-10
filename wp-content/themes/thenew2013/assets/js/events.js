window.addEvent('domready',function(){

    // $$('.post-content a').each(function(a,i){
    //     wOverview(a);
    // });

    wParallax($$('.parallax'));

    setTimeout(function() {
        $('menu').addClass('fx-closed');
    }, 3000);

    $('menu').getElements('> li').addEvents({
        mouseover: function(e) {
            this.addClass('fx-over');
        },
        mouseleave: function(e) {
            var mask = this;
            setTimeout(function() {
                mask.removeClass('fx-over');
            }, 400);
        }
    });


});