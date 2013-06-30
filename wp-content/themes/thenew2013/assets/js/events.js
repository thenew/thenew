window.addEvent('domready',function(){

    wParallax($$('.parallax, .home'));

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

    var jaxNavEnabled = true;

    // Ajax navigation
    function fonJaxNav() {
        $$('a[target!="_blank"]').each(function(el,i){
            el.addEvent('click', function(e){
                e.preventDefault();

                var jaxUrl = this.get('href');
                if(!document.location.href || jaxUrl === document.location.href || !jaxNavEnabled) return;

                var jaxContent0 = $$('.js-ajax-content')[0],
                    mainCol = $$('.main-col')[0],
                    jaxMainCol0 = $$('.main-col-content')[0],
                    jaxThumb0 = $$('.single-thumb')[0];

                var jaxRequest = new Request({
                    url: jaxUrl,
                    method: 'post',
                    data: {'ajax':'1'},
                    onRequest: function(){
                        jaxNavEnabled = false;

                        if($('top'))
                            new Fx.Scroll(window, { duration: 200 }).toElement($('top'));

                        document.body.addClass('js-ajax-loading');
                        jaxContent0.addClass('js-ajax-content-0');

                        // Main col
                        setTimeout(function() {
                            jaxMainCol0.addClass('js-stack-0');
                        }, 200);

                        // Thumb
                        if(jaxThumb0)
                            jaxThumb0.morph({'opacity': 0});

                    },
                    onProgress: function(event, xhr){
                    },
                    onFailure: function(xhr){
                        document.body.removeClass('js-ajax-loading');
                        jaxContent0.removeClass('js-ajax-content-0');
                    },
                    onSuccess: function(response){
                        if(!response) return;

                        var isHome = false;
                        Elements.from(response).each(function(tag) {
                            if(tag.get('tag') == 'title') {
                                // PushState
                                if(!!(window.history && history.pushState)) {
                                    // stateObject, title, URL
                                    history.pushState('', tag.get('html'), jaxUrl);
                                }
                            }
                            if(tag.getElements('.js-ajax-content').length) {
                                gogo(tag);
                            }

                            // if home inject block home
                            if(tag.hasClass('front-page-block')) {
                                isHome = true;
                                tag.setStyles({
                                    'max-height': 0,
                                    'opacity': 0,
                                    'overflow': 'hidden'
                                })
                                    .inject($('top'), 'after')
                                    .morph({
                                        'max-height': 350,
                                        'opacity': 1
                                    });
                            }
                        });

                        // Virer block home
                        if(!isHome && $$('.front-page-block').length) {
                            var blockHome = $$('.front-page-block')[0];

                            blockHome.set('morph', {
                                'duration': 200,
                                onComplete: function() {
                                    blockHome.destroy();
                                }
                            });
                            blockHome.morph({
                                'height': 0,
                                'opacity': 0
                            });


                        }

                    }
                }).send();
            });
        });
    }

    fonJaxNav();


    function gogo(tag) {
        var jaxContent0 = $$('.js-ajax-content')[0],
            mainCol = $$('.main-col')[0],
            jaxMainCol0 = $$('.main-col-content')[0],
            jaxThumb0 = $$('.single-thumb')[0];


        var jaxContent1 = tag.getElements('.js-ajax-content')[0];
        var jaxThumb1 = jaxContent1.getElements('.single-thumb')[0];
        var jaxMainCol1 = jaxContent1.getElements('.main-col-content')[0];

        // Thumb
        if(jaxThumb1) {
            jaxThumb1.setStyles({'opacity': 0});
            if(jaxThumb0)
                jaxThumb1.inject(jaxThumb0, 'after');
            else
                jaxThumb1.inject(jaxContent0, 'top');
            jaxThumb1.morph({'opacity': 1});
        }

        // morph layout
        mainCol.set('morph', {
            'duration': 200,
            onComplete: function() {

                // Main col
                // console.log(jaxMainCol1);
                jaxMainCol0.addClass('js-stack-0');
                if(!jaxMainCol1.hasClass('js-stack-0'))
                    jaxMainCol1.addClass('js-stack-1');
                jaxMainCol1.inject(jaxMainCol0, 'after');

                setTimeout(function() {
                    jaxMainCol0.destroy();
                    jaxMainCol1.removeClass('js-stack-1');
                    if(jaxThumb0)
                        jaxThumb0.destroy();
                    document.body.removeClass('js-ajax-loading');
                }, 500);

                fonJaxNav();
                jaxNavEnabled = true;
            }
        });

        var layoutPos = (jaxContent1.hasClass('single-layout')) ? 120 : 0;
        mainCol.morph({'top': layoutPos});
    }


});