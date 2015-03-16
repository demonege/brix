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
        var picture = jQuery('.slider-content').children();
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
            }
            else
            {
                jQuery(el).removeClass('show');
            }
        });
        return index;
    };

/*        for(var i = 0; i < picture.length; i++)
        {
            console.log(picture[i]);
            if(i == index )
            {
                picture[i].addClass('show');
            }
            else
            {
                picture[i].removeClass('show');
            }

        }
*/

});
