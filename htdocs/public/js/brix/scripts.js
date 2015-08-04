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
        jQuery('.formularLayer').removeClass('active');
    });

    //function for ajax validierung
    jQuery('.brix-btn').click(function(e)
    {
        e.preventDefault();
        var form = jQuery('.brix-btn').parents();
        form = form[0];
        var formelements = jQuery(form).children();
        var formdata = [];

        jQuery(formelements).each(function(i){
            formdata[i] = jQuery(formelements[i]).children().val();
        });

        if(formularValidation(formelements))
        {
            jQuery(this).unbind('click').submit()
        }



    });

    function formularValidation(formelements)
    {
        var val = false;
        jQuery(formelements).each(function(i)
        {
            if(jQuery(formelements[i]).hasClass("wrapper"))
            {

                var element = formelements[i];
                jQuery(element).children('.error').remove();

                if(jQuery(element).children('.input-box'))
                {
                    var value = jQuery(element).children('.input-box').val();
                    value = value.replace(/\s+| /gi, '');

                    if (value == '') {
                        jQuery(element).append("<div class='error'>Ausfüllen!!!</div>");
                    }
                    else if(/\d/.test(value)) {
                        jQuery(element).append("<div class='error'>Machen sachen</div>");
                    }
                    else
                    {
                        val = true;
                    }
                }

            }
            if(jQuery(formelements[i]).hasClass("textarea"))
            {
                var element = formelements[i];
                jQuery(element).children('.error').remove();

                if(jQuery(element).children('.description'))
                {
                    var value = jQuery(element).children('.description').val();
                    if (value == '') {
                        jQuery(element).append("<div class='error'>Ausfüllen!!!</div>");
                    }
                    else
                    {
                        val = true;
                    }
                }
            }
            if(jQuery(formelements[i]).hasClass("email-field"))
            {
                var element = formelements[i];
                jQuery(element).children('.error').remove();

                if(jQuery(element).children('.input-box'))
                {
                    var value = jQuery(element).children('.input-box').val();
                    if (value == '') {
                        jQuery(element).append("<div class='error'>Ausfüllen!!!</div>");
                    }
                    else
                    {
                        val = true;
                    }
                }
            }
        });
        return val;
    }

    function kalender(Jahr, Monat)
    {
        //kalenderberreich
        var dayInt = 1;
        var rows = 5; //reihe tr
        var cols = 7; //spalte
        var year = Jahr;
        var month = Monat;
        var MaxDay = getMaxDay(month,year);

        //löschen des inhalts bei erneuten aufruf
        jQuery('.month').empty();
        jQuery('.kalenderberreich').empty();

        var table = jQuery(document.createElement('table'));
            table.addClass('kalender');

        for (var i = 0; i < rows; i++) {
            var tr = jQuery(document.createElement('tr'));
                tr.addClass('trKalender');

            for(var ii = 0; ii < cols; ii++) {
                var td = jQuery(document.createElement('td'));
                    td.addClass('tdKalender');
                    td.append(dayInt);

                //Datum zusammen setzten
                var checkDate = getCheckDate(dayInt,month,year);
                var date = new Date(checkDate +'GMT');
                var dateId = date.getTime() / 1000;
                td.attr('id',dateId);

                tr.append(td);

                if(dayInt < MaxDay)
                {
                    dayInt++;
                }
                else
                {
                    break;
                }

            }
            table.append(tr);
        }
        //erstellen der tabelle
        jQuery('.month').append(getMonthName(month) + ' ' +year);
        jQuery('.kalenderberreich').append(table);
    }

    function getMonthName(MonthNumber)
    {
        var Monate = ['','Januar','Februar','März','April','Mai','Juni','Juli','August','September','Oktober','November','Dezember'];
        var MonthName = Monate[MonthNumber];
        return MonthName;
    }

    function getMaxDay(Month, Year)
    {
        var Monate = ['',31,getFebDay(Year),31,30,31,30,31,31,30,31,30,31];
        var MaxDay = Monate[Month];
        return MaxDay;
    }

    function getFebDay(Year)
    {
        var FebDay = 0;
        var year = Year;

        if((year % 4 == 0 && year % 100 != 0) || year % 400 == 0)
        {
            FebDay = 29;
        }
        else
        {
            FebDay = 28;
        }

        return FebDay;

    }

    function getCheckDate(day,month,year)
    {
        if(day <= 9)
        {
            day = '0' + day;
        }
        if(month <= 9)
        {
            month = '0' + month;
        }

        var checkDate = year +'-'+ month +'-'+ day;

        return checkDate;
    }

    //Function for checking events on current day
    function checkDateEvent(checkDate)
    {
        jQuery.post('kalenderevent', {0:checkDate}, function(data) {
           resultJsonData = JSON.parse(data);
           console.log(resultJsonData);
        });
    }

    //initinial Kalender beim laden der seite
    var InitDatum = new Date();
    var Inityear = InitDatum.getFullYear();
    var Initmonth = InitDatum.getMonth();
    Initmonth++;
    kalender(Inityear, Initmonth);

    //function für as verändern des kalenders
    var year = InitDatum.getFullYear();
    var month = InitDatum.getMonth();
    month++;

    jQuery('.KalenderButtonNext').click(function(){
        var useid = jQuery('.KalenderButtonNext').attr('id');
        NextOrLast(useid);
    });

    jQuery('.KalenderButtonLast').click(function(){
        var useid = jQuery('.KalenderButtonLast').attr('id');
        NextOrLast(useid);
    });

    function NextOrLast(divId)
    {
        var useid = divId;

        if(useid == 'next')
        {
            month++;
            if(month > 12)
            {
                month = 1;
                year++;
            }
            kalender(year, month);
        }
        if(useid == 'last')
        {
            month--;
            if(month < 1)
            {
                month = 12;
                year--;
            }
            kalender(year, month);
        }

    }

    var tdObjecte = jQuery('.tdKalender');
    var tdId = [];
    var i = 0;
    jQuery(tdObjecte).each(function(){
        tdId[i] = jQuery(tdObjecte[i]).attr('id');
        i++;
    });
    checkDateEvent(tdId);

    //Speicherung der ereignisse für kalender
    jQuery('.saveBtn').click(function() {
        jQuery.get('kalendersave', function (data) {
            jQuery('.formularLayer .layer-content').html(data);
            jQuery('.formularLayer').addClass('active');

            var formdata = jQuery('.formular-berreich input');

            jQuery('.formular-berreich').on('submit', function(){
                jQuery.post('kalendersave',{name: jQuery(formdata[0]).val(),datum: jQuery(formdata[1]).val()})
            });
        });
    });
});