window.addEvent('domready',function(){

    var viewportHeight = document.documentElement.clientHeight;

    $('js-go').setStyles({
        top: viewportHeight
    });

    var pActive = 1;

    $$('.p').set('morph', {
        duration: 600
    });

    window.addEvent('scroll', function(e) {

        var currentScroll = window.getScroll().y;

        var active = Math.floor(currentScroll / 325) + 1;
        if(active != pActive) {
            pActive = active;
            $$('.p').morph({opacity:0});
            $$('.p'+active).morph({opacity:1})
                .addClass('active');
        }

        $$('.l').each(function(l,i) {

            // Défixer
            if(l.retrieve('breakpointH') && currentScroll < l.retrieve('breakpointH')) {
                l.setStyles({
                    position: 'absolute',
                    // top: '140px'
                });
            }

            // Fixer
            if(l.getPosition().y - currentScroll < 140) {
                l.setStyles({
                    position: 'fixed',
                    // top: '100px'
                });
                l.store('breakpointH', currentScroll);
            }
        });

        // Paralax
        $$('.hexa').each(function(el,i){
            gap =  - ( currentScroll * (0.2 + i/5) );
            el.setStyles({
                'background-position': '50% ' + gap +'px'
            });
        });

    });

});
