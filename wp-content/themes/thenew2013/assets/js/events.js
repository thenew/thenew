window.addEvent('domready',function(){

    wParallax($$('.parallax'));

    // Preview of links on iframe
    $$('.post-content a').each(function(a,i){
        wOverview(a);
    });

    // Animations focus mode on menu
    setTimeout(function() {
        $('sidenav').addClass('js-focus-mode');
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