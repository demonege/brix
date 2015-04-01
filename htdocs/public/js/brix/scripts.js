jQuery(document).ready(function(){
    //test js
    function ScriptTest(){
            jQuery('.picture').click(function(){
                jQuery('#pic-1').css('color', 'red');
            });
    }

    jQuery('#einaus').click(function(){
       this.toggle(100,
       function callback(){
            alert('ist cool');
       });
    });

    //Slider Element container and picture width
    var cotainerwidth = jQuery('.slider-content .wrapper .container').children();
    cotainerwidth = cotainerwidth.length * jQuery(cotainerwidth[0]).width();
    jQuery('.slider-content .wrapper .container').css({"width": cotainerwidth + 'px'})


    var picturewidth = jQuery('.wrapper').width();
    var sliderElemen = jQuery('.slider-content .wrapper .container').children();
    var translateValue = picturewidth;
    var i = 0;
    jQuery(sliderElemen).each(function(){
        jQuery(sliderElemen[i]).css({"width": picturewidth + 'px'});
        i++;
    });

    //Slider element
    var sliderIndex = 0;
    jQuery('.btn-back').click(function(){
        sliderIndex = changePic(--sliderIndex)
    });

    jQuery('.btn-next').click(function(){
        sliderIndex = changePic(++sliderIndex)
    });

    function changePic(index) {
        console.log(index);
        var picture = jQuery('.slider-content .wrapper .container').children();
        if(index >=  picture.length)
        {
            index = 0;
        }
        else if(index < 0)
        {
            index = picture.length-1;
        }

        picture.each(function(i, el){
            if(i == index )
            {
                jQuery(el).addClass('show');

                var translateX = translateValue * (i);
                jQuery('.slider-content .wrapper .container').css({"transform": "translateX(" + -translateX + 'px)'});
            }
            else
            {
                jQuery(el).removeClass('show');
            }
        });
        return index;
    };

    //portfolio elements
    function portfolio(event)
    {
        var buttonId = event.currentTarget.getAttribute('id');
        var pictures = jQuery('.row').children();
        pictures.each(function(index){
                if(jQuery(pictures[index]).hasClass(buttonId))
                {
                    jQuery(pictures[index]).css("display","block");
                }
                else
                {
                    if(buttonId == 'alle')
                    {
                        jQuery(pictures[index]).css("display","block");
                    }
                    else
                    {
                        jQuery(pictures[index]).css("display","none");
                    }
                }
            }
        )
    }

    var buttons =  jQuery('.contentVerkauf').children();
        buttons.each(function(i,el){
            jQuery(el).click(portfolio);
        });

    //function for fullsizeLayer
    var pictureNames = jQuery('.portfolio');
    jQuery(pictureNames).each(function(i,el){
        jQuery(el).click(function(){
            jQuery.post('mainpage/layer',{plant: jQuery(pictureNames[i]).attr('id')}).done(function(data) {
                jQuery('.layer .layer-content').html(data);
                jQuery('.layer').addClass('active');

            });
        });
    });

    //function for close layer
    jQuery('.close-layer').click(function(){
        jQuery('.layer').removeClass('active');
    });
});



