window.addEvent('domready',function(){

  $$('body').addClass('js');

  var i = 1;
  var imax = 24;
  var motion;
  var nb;
  var pastNb = new Array();
  var pastFrame = '';
  var allowClick = true;

  // call images
  setTimeout(function(){
    clearInterval(callImg);
  }, 500);
  var callImg = window.setInterval(function(){
    var frame = getNb();
    $$('.h').removeClass('f-'+pastFrame);
    $$('.h').addClass('f-'+frame);
    pastFrame = frame;
  }, 20);

  setTimeout(function(){
    $$('body').addClass('domready');
    $$('body').removeClass('no-js');
    $$('.l').removeClass('l');

    // mouse events on 24
    $$('.vin').addEvents({
        mouseenter: function(e){
          motion = window.setInterval(animation, 42);
          $$('.a').addClass('active');
        },
        mouseleave: function(e){
          clearInterval(motion);
          $$('.q').removeClass('f-'+pastFrame);
          $$('.a').removeClass('active');
        },
        mousedown: function(e){
          if(allowClick){
            allowClick = false;
            clearInterval(motion);
            setTimeout(function(){
              motion = window.setInterval(animation, 42);
              allowClick = true;
            }, 200);
          }
        }
    });

    var y = $$('.n span').get('html');
    var countup = window.setInterval(function(){
      if(y != '8766'){
        $$('.n span').set('html', y++);
        $$('.n').setStyle('left', 95);
        $$('.ncurrent').setStyle('width', 190);
      }else if (y === '8766') {
        clearInterval(countup);
      }
    }, 5);


  }, 500);

  var animation = function(){
    var frame = getNb();
    $$('.q').removeClass('f-'+pastFrame);
    $$('.q').addClass('f-'+frame);
    pastFrame = frame;
  }

  var getNb = function(){
    // si le tableau n'est pas plein
    if(pastNb.length < imax){
      nb = Math.floor ( Math.random() * imax ) + 1;
      var verif = pastNb.some(isInArray);
      // tant que nb est dans le tableau
      while (verif) {
        nb = Math.floor ( Math.random() * imax ) + 1;
        var verif = pastNb.some(isInArray);
      }
      // sinon on l'ajoute au tableau
      if(!verif){
        pastNb.push(nb);
      }
    // si le tableau est plein, vider
    } else {
      pastNb.length = 0;
      nb = Math.floor ( Math.random() * imax ) + 1;
      pastNb.push(nb);
    }
    return nb;
  }

  var isInArray = function(element, index, array){
    return (element == nb);
  }


});