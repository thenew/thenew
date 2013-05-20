window.addEvent('domready',function(){

    var viewportHeight = document.documentElement.clientHeight;

    // Go
    $('js-go').setStyles({
        opacity: 0
    });
    setTimeout(function() {
        $('js-go').setStyles({
            opacity: 1,
            top: viewportHeight
        });
    }, 300);

    var pActive = 1;

    $$('.p').set('morph', {
        duration: 600
    });

    window.addEvent('scroll', function(e) {

        var currentScroll = window.getScroll().y;

        // hide Go
        if(currentScroll > 300) {
            $('js-go').setStyles({opacity: 0.05});
        }

        // Diapo
        var active = Math.floor(currentScroll / 260) + 1;
        if(active != pActive) {
            if(active > $$('.p').length)
                active = $$('.p').length;

            $$('.p'+pActive).morph({opacity:0})
                .removeClass('active');
            pActive = active;
            $$('.p'+active).morph({opacity:1})
                .addClass('active');
        }

        // Figures
        $$('.l').each(function(l,i) {

            // Défixer
            if(l.retrieve('breakpointH') && currentScroll < l.retrieve('breakpointH')) {
                l.setStyles({
                    position: 'absolute'
                    // top: '140px'
                });
            }

            // Fixer
            if(l.getPosition().y - currentScroll < 140) {
                l.setStyles({
                    position: 'fixed'
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
