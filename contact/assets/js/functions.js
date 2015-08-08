
// TODO: don't loop whitin prefixes

function randomGradient(el, options) {
    if(!el) return;
    if(!options) options = {};
    blackAndWhite = (options.blackAndWhite) ? options.blackAndWhite : false;
    nbMin = (options.nbMax) ? options.nbMax : 2;
    nbMax = (options.nbMax) ? options.nbMax : 40;
    var nb = Number.random(nbMin, nbMax),
        prefixes = ['-webkit-', '-moz-', '-o-'],
        colors = ['rgba(255,255,255,0.05)', 'rgba(0,0,0,0.05)'],
        bgColor = fon_color_rand({blackAndWhite: blackAndWhite});

    prefixes.each(function(prefix,i){
        var grad = "",
            count = 0;
        for (count; count < nb ; count++) {
            var deg = Number.random(2, 358),
                to = Number.random(0, 100),
                color = colors[Number.random(0, 1)];
            // -130deg pour webkit qui utilise l'ancien angle polaire (0deg = est)
            if(prefix === '-webkit-') deg = (deg.toInt()-130).toString();
            // avoid horizontal and vertical lines
            if(deg > 80 && deg < 100 || deg > 170 && deg < 190 || deg > 260 && deg < 280) deg = (deg.toInt()+Number.random(30, 60)).toString();
            grad += prefix+'linear-gradient('+deg+'deg,'+color+' '+to+'%, transparent '+to+'%),';
        }
        grad += bgColor;
        el.setStyles({
            'background': grad
        });
    });
}

function fon_color_rand(options){
    if(!options) options = {};
    blackAndWhite = (options.blackAndWhite) ? options.blackAndWhite : false;

    if(blackAndWhite) {
        var r = Number.random(150,240);
        return 'rgb('+r+','+r+','+r+')';
    } else {
        return "#" + Math.random().toString(16).slice(2, 8);
    }
}

function random_shapes(el, options) {
    if(!el) el = document.body;
    if(!options) options = {};
    var shape = (options.shape) ? options.shape : "square",
        min = (options.min) ? options.min : 42,
        max = (options.max) ? options.max : 100,
        sizeRatio = (options.sizeRatio) ? options.sizeRatio : 100,
        blackAndWhite = (options.blackAndWhite) ? options.blackAndWhite : false;

    var w = el.getWidth();
    var h = el.getHeight();
    var nb = Number.random(min, max);

    // Defaults and shapes styles
    var shape_style_default = {};
    if("triangle" == shape) {
        shape_style_default = {
            'height': 0,
            'border': '20px solid transparent',
            'border-right-color': '#fff'
        };
    } else if("round" == shape) {
        shape_style_default = {
            '-webkit-border-radius': '50%',
            '-moz-border-radius': '50%',
            'border-radius': '50%'
        };
    }

    // generated divs
    while(nb > 0) {
        var width = (sizeRatio)*(Number.random(10, 100)/10),
            height = (1.5*sizeRatio)*(Number.random(10, 100)/10),
            left = w*(Number.random(0, 100)/100)-width,
            bottom = h*(Number.random(0, 100)/100),
            color = fon_color_rand({blackAndWhite: blackAndWhite}),
            special_shape_style = {};
            console.log(left);

        var shape_style = {
            'position': 'absolute',
            'bottom': bottom,
            'left': left,
            '-webkit-transform': 'rotate('+Number.random(0, 179)+'deg)',
            '-moz-transform': 'rotate('+Number.random(0, 179)+'deg)',
            '-ms-transform': 'rotate('+Number.random(0, 179)+'deg)',
            '-o-transform': 'rotate('+Number.random(0, 179)+'deg)',
            'transform': 'rotate('+Number.random(0, 179)+'deg)',
            'opacity': Number.random(2, 8)/10
        };

        if("triangle" == shape) {
            special_shape_style = {
                'border-width': width,
                'border-right-color': color
            };
        } else {
            special_shape_style = {
                'width': width,
                'height': height,
                'background': color
            };
        }
        shape_style = Object.merge(shape_style, special_shape_style);

        var div = new Element('div')
                     .addClass('e404-shape '+shape)
                     .setStyles(shape_style_default)
                     .setStyles(shape_style);
        div.inject(el);
        nb--;
    }
}

function random_style_text(el){
    var l = el.getElements('span');
    var fStyle = ['normal', 'italic'];
    var fWeight = ['normal', 'bold'];
    var fFamily = ['Comic Sans MS', 'Copperplate Gothic Bold', 'Arial', 'Consolas', 'Corbel', 'Georgia', 'Times New Roman'];
    var tTransform = ['uppercase', 'lowercase', 'none'];
    l.each(function(el,i){
        el.setStyles({
            'font-size': Number.random(19, 30),
            'font-style': fStyle[Number.random(0, fStyle.length)],
            'font-weight': fWeight[Number.random(0, fWeight.length)],
            'font-family': fFamily[Number.random(0, fFamily.length)],
            'text-transform': tTransform[Number.random(0, tTransform.length)]
            // 'color': fon_color_rand()
        });
    });
}