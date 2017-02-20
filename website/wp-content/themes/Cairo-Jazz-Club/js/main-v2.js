var Init = (function($) {

    var Init = {};

    /**
     * run all the necessary init functions
     * add you new function here to be automaticly run on each page load
     */
    Init.AutoRun = function() {
        $(document).ready(function() {

            Init.ResponsiveMenu();
            Init.MagnificPopup();
            Init.HomeParallaxSlider();
            Init.Footer();
            Init.Header();

        });
    }

    Init.ResponsiveMenu = function() {
        $(".main-menu").mmenu({
            offCanvas: {
                position: "right",
                zposition: "front"
            }
        }, { // configuration
            clone: true
        });
    }

    Init.MagnificPopup = function() {
        // init Magnific Popup on each element with "modal-link" class
        $('body').magnificPopup({
            delegate: '.modal-link',
            type: 'ajax',

            /**
             * Remove and re-add the class to fix a scroll bug.
             * open(): Will fire when the popup is OPENED
             * afterClose():Will fire when the popup is COMPLETELY CLOSED 
             */
            callbacks: {
                open: function() {
                    $('body').removeClass('hide-horizontal-scrollbar');
                },
                afterClose: function() {
                    $('body').addClass('hide-horizontal-scrollbar');
                }
            }
        }).addClass('hide-horizontal-scrollbar'); // Add the class for the first time in init.

        // init inline Magnific Popup on each element with "modal-link-inline" class which is inside a containter with "social-icons" class
        $('.social-icons').magnificPopup({
            delegate: '.modal-link-inline',
            type: 'inline',

            /**
             * Remove and re-add the class to fix a scroll bug.
             * open(): Will fire when the popup is OPENED
             * afterClose():Will fire when the popup is COMPLETELY CLOSED 
             */
            callbacks: {
                open: function() {
                    $('body').removeClass('hide-horizontal-scrollbar');
                },
                afterClose: function() {
                    $('body').addClass('hide-horizontal-scrollbar');
                }
            }
        })

    }

    Init.HomeParallaxSlider = function() {
        // build controller
        var controller = new ScrollMagic.Controller({ vertical: true });
        var tween;
        // build scene
        var scene = new ScrollMagic.Scene({ duration: 10000 });
        scene.addTo(controller);

        var pararezize = function() {

            var buttonStart = 182;
            var winWidth = $(window).width();

            if (winWidth <= 600) {
                buttonStart = 70;
            } else if (winWidth <= 768) {
                buttonStart = 60;
            } else if (winWidth <= 1024) {
                buttonStart = 110;
            };

            tween = TweenMax.fromTo(".parallax", 1, { bottom: buttonStart }, { bottom: 7975 });
            scene.setTween(tween);

        };

        pararezize();

        $(window).bind("resize", pararezize);


        // Events Slider
        $('.events-slider').slick({
            centerMode: true,
            arrows: false,
            centerPadding: '20px',
            slidesToShow: 3,
            responsive: [{
                breakpoint: 680,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '0',
                    slidesToShow: 3
                }
            }, {
                breakpoint: 580,
                settings: {
                    arrows: true,
                    centerMode: true,
                    centerPadding: '0',
                    slidesToShow: 1
                }
            }]
        });
    }



    Init.Event = function(ApiURL) {
        // Calendar
        var thisMonth = moment().format('YYYY-MM');

        // Events to load into calendar
        $.getJSON(ApiURL, function(data) {
            var eventArray = data;

            $('.calendar').clndr({
                daysOfTheWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                events: eventArray,
                multiDayEvents: {
                    singleDay: 'date',
                    endDate: 'endDate',
                    startDate: 'startDate'
                },
                showAdjacentMonths: true,
                adjacentDaysChangeMonth: false,
                template: $('#template-calendar').html(),
            });
        });
    };

    Init.Footer = function() {
        var footermenuheight = $(".bottom-footer").outerHeight();
        $(".bottom-footer").css({ "bottom": -footermenuheight });
        $(".footer-container").css({ "padding-bottom": footermenuheight });
        $(window).scroll(function() {
            if ($(window).scrollTop() + $(window).height() > $(document).height() - 100) {
                $(".bottom-footer").css({ "bottom": 0 });
            } else {
                $(".bottom-footer").css({ "bottom": -footermenuheight });
            }
        });
    }

    Init.Header = function() {
        $(window).on('scroll', function() {
            var scrollTop = $(window).scrollTop();
            if (scrollTop > 100) {
                //$('header').css({"height": "70px"});
                $('header .logo img').css({ "height": "60px", "transition": "all 0.3s ease-in-out" });
                $('div:not([id^="mm-"]) .main-menu ul').css({ "margin-top": "2rem", "transition": "all 0.3s ease-in-out" });
                $('.top-icons .social-icons').css({ "margin-top": "0rem", "transition": "all 0.3s ease-in-out" });
            } else {
                //$('header').css({"height": "auto"}); 
                $('header .logo img').css({ "height": "100", "transition": "all 0s ease-in-out" });
                $('div:not([id^="mm-"]) .main-menu ul').css({ "margin-top": "4rem", "transition": "all 0s ease-in-out" });
                $('.top-icons .social-icons').css({ "margin-top": "2rem", "transition": "all 0s ease-in-out" });
            }
        });

        /*
        var secfixedheight = $('.entry-content .vc_row-fluid:last-child').height();
        $('.entry-content .vc_row-fluid:last-child').css({ "height": secfixedheight });
        var topspacebeforfixed = $('.vc_row wpb_row vc_row-fluid:first-child').height() + $('header').height();
        $(window).on('scroll', function () {
        	var scrollTop = $(window).scrollTop();
        	if (scrollTop > topspacebeforfixed) {
        		$('.entry-content .vc_row-fluid:last-child .vc_column_container').css({ "position": "fixed", "top": "0" });
        	} else {
        		$('.entry-content .vc_row-fluid:last-child .vc_column_container').css({ "position": "fixed", "top": "0" });
        	}

        });
        */
    }

    return Init;
})(jQuery);

Init.AutoRun();


var Forms = (function($) {
    var Forms = {};

    Forms.ReserveEvent = function(form_submit_to) {

        var form = $("#form_reserve_ticket");
        var respon = $("#form_reserve_ticket_responce");

        $.post(form_submit_to, form.serialize())
            .done(function() {
                form.hide('slow');
                respon.text('thank you, your request is beeing processed');
            })
            .fail(function() {
                form.hide('slow');
                respon.text('an error happened pls try again later');
            })
            .always(function() {

            });
        return false;
    };

    Forms.PrefsClick = function() {
        $('#form_prefs').submit(function(evt) {
            evt.preventDefault();
            //window.history.back();
        });
    }

    Forms.Prefs = function(form_submit_to) {
        var form = $("#form_prefs");
        var respon = $("#form_prefs_responce");

        var data = { checkBoxes: [], userFields: {} };

        $('input[name="user_fields"]').each(function() {
            if (this.value) {
                data.userFields[this.id] = this.value;
            }
        });

        var CheckBoxes = document.getElementsByName("pref_check");

        for (var key in CheckBoxes) {
            if (CheckBoxes.hasOwnProperty(key)) {
                var element = CheckBoxes[key];
                if (element.checked) {
                    data.checkBoxes.push(element.id);
                }
            }
        }

        $.ajax({
                type: 'POST',
                url: form_submit_to,
                data: JSON.stringify(data),
                contentType: "application/json",
                dataType: 'json'
            })
            .done(function() {
                form.hide('slow');
                respon.text('thank you, your preference have been saved');
            })
            .fail(function() {
                form.hide('slow');
                respon.text('an error happened pls try again later');
            })
            .always(function() {

            });

        return false;
    };

    return Forms;
})(jQuery);