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


function wInit() {
    wParallax($$('.parallax, .home'));
    logoLoader();
    wAjaxNav();
}

var jaxNavEnabled;
var isFxScroll;

// Ajax navigation
function wAjaxNav() {
    jaxNavEnabled = true;
    isFxScroll = false;
    $$('.main a[target!="_blank"]').each(function(el,i){
        el.addEvent('click', function(e){
            e.preventDefault();

            wAjaxLoad(this.get('href'));
        });
    });
}

function wAjaxLoad(ajaxUrl) {

    if(!document.location.href || ajaxUrl === document.location.href || !jaxNavEnabled) return;

    var jaxContent0 = $$('.js-ajax-content')[0],
        mainCol = $$('.main-col')[0],
        jaxMainCol0 = $$('.main-col-content')[0],
        jaxThumb0 = $$('.single-thumb')[0];

    var jaxRequest = new Request({
        url: ajaxUrl,
        method: 'post',
        data: {'ajax':'1'},
        onRequest: function(){
            jaxNavEnabled = false;
            document.body.addClass('js-ajax-loading');

            jaxContent0.addClass('js-ajax-content-0');

            // Main col
            jaxMainCol0.addClass('js-stack-0');

            // Thumb
            if(jaxThumb0)
                jaxThumb0.morph({'opacity': 0});

        },
        onFailure: function(xhr){

            // 404
            if(xhr.status == 404) {
                jaxNavEnabled = true;
                // TODO 404 url
                wAjaxLoad('/');
            }

            document.body.removeClass('js-ajax-loading');
            jaxContent0.removeClass('js-ajax-content-0');
        },
        onSuccess: function(response){
            if(!response) return;

            var isHome = false,
                titlePage = 'thenew';

            Elements.from(response).each(function(tag) {

                // get the title
                if(tag.get('tag') == 'title') {
                    titlePage = tag.get('html');
                }

                // get the template
                if(tag.get('tag') == 'div' && tag.getElements('.js-ajax-content').length) {
                    wAjaxAnim(tag);
                }

                // if home inject block home
                if(tag.hasClass('front-page-block')) {
                    document.body.addClass('home');
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

            // PushState
            if(!!(window.history && history.pushState)) {
                // stateObject, title, URL
                history.pushState('', titlePage, ajaxUrl);
            }

            // "_trackEvent" is the pageview event,
            if(typeof _gaq != 'undefined')
                _gaq.push(['_trackPageview', ajaxUrl]);

            // Virer block home
            if(!isHome && $$('.front-page-block').length) {
                document.body.removeClass('home');
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
}

function wAjaxAnim(tag) {
    var jaxContent0 = $$('.js-ajax-content')[0],
        mainCol = $$('.main-col')[0],
        mainColPush = $$('.main-col-push')[0],
        jaxMainCol0 = $$('.main-col-content')[0],
        jaxThumb0 = $$('.single-thumb')[0];

    if(!mainColPush)
        mainColPush = new Element('div', {'class': 'main-col-push'}).inject(mainCol, 'before');

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

    // morph layout (push margin top)
    mainColPush.set('morph', {
        'duration': 400,
        onComplete: function() {

            // Main col
            jaxMainCol0.addClass('js-stack-0');
            if(!jaxMainCol1.hasClass('js-stack-0'))
                jaxMainCol1.addClass('js-stack-1');
            jaxMainCol1.inject(jaxMainCol0, 'after');

            document.body.removeClass('js-ajax-loading');

            setTimeout(function() {
                var waitScrollOverPeriodical = (function() {
                    if(!isFxScroll) {
                        $clear(waitScrollOverPeriodical);

                        jaxMainCol0.destroy();
                        jaxMainCol1.removeClass('js-stack-1');
                        if(jaxThumb0)
                            jaxThumb0.destroy();
                    }
                }).periodical(100);
            }, 500);

            wInit();
            jaxNavEnabled = true;

        }
    });

    var layoutPos = (jaxContent1.hasClass('single-layout')) ? 120 : 0;
    mainColPush.morph({'height': layoutPos});

    // Scroll to top
    isFxScroll = true;
    new Fx.Scroll(window, {
        duration: 400,
        transition: Fx.Transitions.Sine.easeOut,
        onComplete: function(){
            isFxScroll = false;
        }
    }).toTop();

}