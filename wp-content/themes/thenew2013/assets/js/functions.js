function wOverview(a) {
    a.addEvent('mouseover', function(e){
        var timeout,
            o = $('overview'),
            over = new Element('div'),
            iframe = new Element('iframe', {'src':a.get('href')}),
            title = new Element('span', {'html':a.get('href'), 'class':'title'});

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