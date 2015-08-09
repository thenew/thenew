$(document.html).removeClass('no-js').addClass('js');

window.addEvent('domready',function(){

    random_shapes($('bg'), {
        shape: "square",
        min: 1,
        max: 3,
        blackAndWhite: true,
        sizeRatio: 60
    });

    randomGradient($('bg'), {
        blackAndWhite: true,
        nbMin: 2,
        nbMax: 6
    });

    random_style_text($$('.box.piouf')[0]);

    $('primary').addClass('liffect-pageLeft');

});

window.addEvent('load',function(){

    $('primary').masonry({
        columnWidth: 110,
        itemSelector: '.box'
    });
    $('primary').addClass('play');

});