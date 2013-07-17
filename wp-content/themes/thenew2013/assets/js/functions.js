function wOverview(a) {
    a.addEvent('mouseover', function(e){
        var timeout,
            o = $('overview'),
            over = new Element('div'),
            iframe = new Element('iframe', {'src':a.get('href')}),
            title = new Element('span', {'html':a.get('href'), 'class':'title'});

        if(!o) return;
        o.setStyles({
            'top': a.getPosition().y - 30
        }).addClass('active');

        over.grab(iframe)
            .grab(title)
            .inject(o);

        a.addEvent('mouseleave', function(e){
            // o.removeClass('active');
            timeout = window.setTimeout(function() {
                if(!o.hasClass('active')) {
                    // over.destroy();
                }
            }, 1000);
        });

    });
}

function wParallax(els) {
    if(!els) return;
    window.addEvent('scroll', function(e) {
        els.each(function(el,i){
            var gap = window.getScrollTop();
            gap = -(gap/2);
            el.setStyles({
                'background-position': '50% ' + gap +'px'
            });
        });
    });
}

/* This script creates a new CanvasLoader instance and places it in the wrapper div */
function logoLoader() {
    if(!$('canvasloader-container')) return;
    var cl = new CanvasLoader('canvasloader-container');
    cl.setColor('#7258a1'); // default is '#000000'
    cl.setDiameter(150); // default is 40
    cl.setDensity(120); // default is 40
    cl.setRange(0.3); // default is 1.3
    cl.setFPS(40); // default is 24
    cl.show(); // Hidden by default

    // This bit is only for positioning - not necessary
/*    var loaderObj = document.getElementById("canvasLoader");
    loaderObj.style.position = "absolute";
    loaderObj.style["top"] = cl.getDiameter() * -0.5 + "px";
    loaderObj.style["left"] = cl.getDiameter() * -0.5 + "px";*/
}