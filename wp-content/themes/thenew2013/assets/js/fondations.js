window.addEvent('domready',function(){

    function fonBodyClass() {
        bod = document.body.className.split(' ');
        var nav = navigator.userAgent.toLowerCase();

        // Detect capacities
        if(('ontouchstart' in window) || window.DocumentTouch && document instanceof DocumentTouch)
            bod.push('is_touchscreen');
        else
            bod.push('no_touchscreen');

        document.body.className = bod.join(' ');
    }

});