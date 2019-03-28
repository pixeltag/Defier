jQuery(document).ready(function($) {
jQuery(".mouse-icon").click(function(){
    jQuery("html, body").animate({ scrollTop:  $(".post-content-wrapper").offset().top - 0 }, 1200);
})


jQuery(document).ready(function() {
jQuery(function() {
// Dropdown toggle
jQuery('.dropbtn').click(function(){
 jQuery(this).next('#myDropdown').toggle();
});

jQuery(document).click(function(e) {
  var target = e.target;
  if (!jQuery(target).is('.dropbtn') && !jQuery(target).parents().is('.dropbtn')) {
    jQuery('#myDropdown').hide();
  }
});
});
});
//*******************************************
//* Slider Owl Carusel  Header 1
//*******************************************
jQuery('.tabs-list a').click(function() {

    var tab = jQuery(this).data('tab'),
        tabs_data = jQuery(this).closest('.tabs-list').siblings('.tabs-data'),
        parent = jQuery(this).parent().parent(),
        active = parent.find('.active');

    if (!active.length) {
        active = parent.find('li:first-child');
    }

    active.removeClass('active').addClass('inactive');
    jQuery(this).parent().addClass('active').removeClass('inactive');

    // hide current and show the clicked one
    var active_data = tabs_data.find('.tab-posts.active');
    if (!active_data.length) {
        active_data = tabs_data.find('.tab-posts:first-child');
    }

    active_data.hide();

    tabs_data.find('#recent-tab-' + tab).fadeIn().addClass('active').removeClass('inactive');

    return false;

});






    //*******************************************
    //* Search Panel Open Wrapper
    //*******************************************
    jQuery(".searchOpen").on("click",function() {
        jQuery("html").addClass("fixedScroll");
        jQuery(".searchWrapper").addClass("WrapperVisible");
        jQuery(".searchOpen").fadeOut("100");
        jQuery(".searchclose").fadeIn("500");
        $(".search-field").first().focus();
    })
        jQuery(".searchclose").on("click",function() {
            $(".searchWrapper").removeClass("WrapperVisible");
            $("html").removeClass("fixedScroll");
            jQuery(".searchclose").fadeOut("100");
            jQuery(".searchOpen").fadeIn("500");
        });
    $(document).keyup(function(e) {
        if (e.keyCode == 27) { // escape key maps to keycode `27`
            $(".searchWrapper").removeClass("WrapperVisible");
            $("html").removeClass("fixedScroll");
            jQuery(".searchclose").fadeOut("100");
            jQuery(".searchOpen").fadeIn("500");
        }
    });



    //*******************************************
    //* sliding Menu Panel Open Wrapper
    //*******************************************
    jQuery("#slideMenuButton").on("click",function() {
        jQuery("html").addClass("fixedScroll");
        jQuery(".backWrapperMenu").addClass("backWrapperMenu-o");
        jQuery(".bgMenuSliding").addClass("bgMenuSliding-o");
        jQuery(".slidMenu").addClass("slidMenu-o");
        jQuery(".closeSlidingMenu").show("1500");
        jQuery(".top-container").hide();

    })
        jQuery(".backWrapperMenu , .closeSlidingMenu").on("click",function() {
            jQuery(".closeSlidingMenu").hide("150");
            jQuery("html").removeClass("fixedScroll");
            jQuery(".backWrapperMenu").removeClass("backWrapperMenu-o");
            jQuery(".bgMenuSliding").removeClass("bgMenuSliding-o");
            jQuery(".slidMenu").removeClass("slidMenu-o");

        });

    $(document).keyup(function(e) {
        if (e.keyCode == 27) { // escape key maps to keycode `27`
            jQuery(".closeSlidingMenu").hide("500");
            jQuery("html").removeClass("fixedScroll");
            jQuery(".backWrapperMenu").removeClass("backWrapperMenu-o");
            jQuery(".bgMenuSliding").removeClass("bgMenuSliding-o");
            jQuery(".slidMenu").removeClass("slidMenu-o");

        }
    });


    //*******************************************
    //* Scroll To top
    //*******************************************

	var $topcontrol = jQuery('.top-container');
        $topcontrol.hide();
	jQuery(window).scroll(function(){

		if (jQuery(this).scrollTop() > 300) {
			$topcontrol.slideDown();
		} else {
			$topcontrol.slideUp();
		}
	});
	$topcontrol.click(function(){
		jQuery('html, body').animate({scrollTop: '0px'}, 800);
		return false;
	});


    //*******************************************
    //* sliding Mobile Menu Panel Open Wrapper
    //*******************************************
    jQuery("#mobileMenuButton").on("click",function() {
        jQuery("html").addClass("fixedScroll");
        jQuery("#backWrapperMobile").addClass("backWrapperMenu-o");
        //jQuery(".bgMenuSliding").addClass("bgMenuSliding-o");
        jQuery(".slidMenu2").addClass("slidMenu2-o");
        jQuery("#closeMobileMenu").show("1500");
        jQuery(".top-container").hide();
    })
        jQuery(".backWrapperMenu , .closeSlidingMenu").on("click",function() {
            jQuery("#closeMobileMenu").hide("150");
            jQuery("html").removeClass("fixedScroll");
            jQuery("#backWrapperMobile").removeClass("backWrapperMenu-o");
            //jQuery(".bgMenuSliding").removeClass("bgMenuSliding-o");
            jQuery(".slidMenu2").removeClass("slidMenu2-o");

        });








      //*******************************************
    //* Navigation Style
    //*******************************************
    jQuery(".main-navigation ul.sub-menu , .menu-sub-content").parent().find("a").append("<i class='menuco fa fa-chevron-down'></i>"); //Only shows drop down trigger when js is enabled - Adds empty span tag after ul.subnav
    jQuery(".main-navigation ul.sub-menu li.menu-item a .menuco , .menu-sub-content .menuco").hide(); //Only shows drop down trigger when js is enabled - Adds empty span tag after ul.subnav
    jQuery(".main-navigation ul.sub-menu li.menu-item a").append("<i class='menucol fa fa-minus'></i>"); //Only shows drop down trigger when js is enabled - Adds empty span tag after ul.subnav

    jQuery(".main-navigation ul.sub-menu li.menu-item ul.sub-menu").parent("li").children("a").append("<i class='fa fa-chevron-right'></i>"); //Only shows drop down trigger when js is enabled - Adds empty span tag after ul.subnav

    jQuery(".main-navigation ul.sub-menu li.menu-item ul  li a .menucor").hide(); //Only shows drop down trigger when js is enabled - Adds empty span tag after ul.subnav
    jQuery(".main-navigation ul.sub-menu li.menu-item").append(""); //Only shows drop down trigger when js is enabled - Adds empty span tag after ul.subnav
    jQuery(".main-navigation ul.menu li").hover(function() {
        jQuery(this).addClass("subhover"); //On hover over, add class "subhover"
    }, function(){ //On Hover Out
        jQuery(this).removeClass("subhover"); //On hover out, remove class "subhover"
    });
    jQuery(".menu-toggle").click(function(){
        jQuery(".main-navigation ul").toggle("fast");

    });




    //*******************************************
    //* Navigation Mobile
    //*******************************************
    jQuery("ul.nav-menu-resp > li > ul.sub-menu").css({display: "none"}); // Opera Fix
    jQuery("ul.nav-menu-resp > li > ul.sub-menu").parent().append("<i class='openInde fa fa-plus'></i>");
    jQuery("ul.nav-menu-resp > li > ul.sub-menu").parent().find("a").css("width","85%");
    jQuery(".openInde").click(function() {
        if($(this).hasClass("fa-plus")){
            jQuery(this).parent().find("ul.sub-menu").slideDown('fast').show(100);
            jQuery(this).removeClass("fa-plus");
            jQuery(this).addClass("fa-times");
            jQuery(this).addClass("closeInde");
        }
        else {
            jQuery(this).parent().find("ul.sub-menu").slideUp('fast');
            jQuery(this).addClass("fa-plus");
            jQuery(this).removeClass("fa-times");
            jQuery(this).removeClass("closeInde");
        }
    });

    //*******************************************
    //* Mega Menu
    //*******************************************
//Mega-Menus
    jQuery( "#navwrap li.mega-menu:not(#navwrap li li)" ).hover(function(){
        var menuWidth = jQuery( '.navwrap .container' ).width();
        var menuPosition = jQuery( '#navwrap .container' ).offset();

        var $sublist = jQuery(this).find('.menu-sub-content:first');

        var menuItemPosition = jQuery(this).offset();
    });


//Mega Menus Tabs
    jQuery(".mega-cat-wrapper").each(function(){
        jQuery( this ).find(".mega-cat-content-tab").hide();
        jQuery( this ).find(".mega-cat-sub-categories li:first").addClass("cat-active").show();
        jQuery( this ).find(".mega-cat-content-tab:first").addClass("already-loaded").show();
        jQuery( this ).find(".mega-cat-sub-categories li").click(function( event ) {
            event.preventDefault();
            jQuery( this ).parent().find("li").removeClass("cat-active");
            jQuery( this ).addClass("cat-active");
            jQuery( this ).parent().parent().parent().find(".mega-cat-content-tab").hide();
            var activeTab = jQuery(this).find("a").attr("href");

            if( jQuery(activeTab).hasClass( "already-loaded" ) ){
                jQuery(activeTab).fadeIn();
            }else{
                jQuery(activeTab).addClass("loading-items").fadeIn( 600 , function() {
                    jQuery( this ).removeClass("loading-items").addClass("already-loaded");
                });
            }
            return false;
        });
    });
});

!function ($) {
  $(function () {
    "use strict";
    $.support.transition = (function () {
      var transitionEnd = (function () {
        var el = document.createElement('bootstrap')
          , transEndEventNames = {
               'WebkitTransition' : 'webkitTransitionEnd'
            ,  'MozTransition'    : 'transitionend'
            ,  'OTransition'      : 'oTransitionEnd otransitionend'
            ,  'transition'       : 'transitionend'
            }
          , name

        for (name in transEndEventNames){
          if (el.style[name] !== undefined) {
            return transEndEventNames[name]
          }
        }
      }())
      return transitionEnd && {
        end: transitionEnd
      }
    })()

  });

}(window.jQuery);


jQuery(document).ready(function($) {
  jQuery(".widget-tab").find(".defier-tabs-nav a").click(function(){
       var _href= $(this).attr("data-tab-href");
       _href = "."+_href + "-tab";

       // Change Active Tab
       jQuery(".defier-tabs-nav").find(".active").removeClass("active");
       jQuery(this).parent().addClass("active");

       // Display Active List
       jQuery(".widget-tab .tab").removeClass("show_tab");
       jQuery(".widget-tab").find(_href).addClass("show_tab");
   });

   //init tab
   jQuery(".defier-tabs-nav a").eq(0).click();
});



jQuery(document).ready(function($) {
   /* THEMETICA RECENT TABS */
  jQuery(".widget-tab").find(".defier-tabs-nav a").click(function(){
       var _href= $(this).attr("data-tab-href");
       _href = "."+_href + "-tab";

       // Change Active Tab
       jQuery(".defier-tabs-nav").find(".active").removeClass("active");
       jQuery(this).parent().addClass("active");

       // Display Active List
       jQuery(".widget-tab .tab").removeClass("show_tab");
       jQuery(".widget-tab").find(_href).addClass("show_tab");
   });

   //init tab
   jQuery(".defier-tabs-nav a").eq(0).click();

});

jQuery(document).ready(function($) {
   //portofolio

   jQuery(".expandImg").click(function(){
       $(this).parent().parent().parent().addClass("fixed-gallery-thum");
       $(this).parent().parent().parent().append('<div class="searchclose2"><i class="fa-cross"></i></div>');
              jQuery(".searchclose2").click(function(){
         jQuery(".searchclose2").parent().removeClass("fixed-gallery-thum");
       });
       $(document).keyup(function(e) {
        if (e.keyCode == 27) { // escape key maps to keycode `27`
            jQuery(".searchclose2").parent().removeClass("fixed-gallery-thum");
               }
            });
       });







});




jQuery(document).ready(function() {

    jQuery(".post-like a").click(function(){

        heart = jQuery(this);

        // Retrieve post ID from data attribute
        post_id = heart.data("post_id");

        // Ajax call
        jQuery.ajax({
            type: "post",
            url: ajax_var.url,
            data: "action=post-like&nonce="+ajax_var.nonce+"&post_like=&post_id="+post_id,
            success: function(count){
                // If vote successful
                if(count != "already")
                {
                    heart.addClass("voted");
                    heart.siblings(".count").text(count);
                }
            }
        });

        return false;
    })


});

//*******************************************
//* Handles toggling the navigation menu for small screens.
//*******************************************

( function() {
	var container, button, menu;

	container = document.getElementById( 'site-navigation' );
	if ( ! container ) {
		return;
	}

	button = container.getElementsByTagName( 'button' )[0];
	if ( 'undefined' === typeof button ) {
		return;
	}

	menu = container.getElementsByTagName( 'ul' )[0];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	menu.setAttribute( 'aria-expanded', 'false' );

	if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
		menu.className += ' nav-menu';
	}

	button.onclick = function() {
		if ( -1 !== container.className.indexOf( 'toggled' ) ) {
			container.className = container.className.replace( ' toggled', '' );
			button.setAttribute( 'aria-expanded', 'false' );
			menu.setAttribute( 'aria-expanded', 'false' );
		} else {
			container.className += ' toggled';
			button.setAttribute( 'aria-expanded', 'true' );
			menu.setAttribute( 'aria-expanded', 'true' );
		}
	};
} )();


//*******************************************
//* img load
//*******************************************


[].forEach.call(document.querySelectorAll('noscript'), function(noscript) {
	var img = new Image();
	img.setAttribute('data-src', '');
	img.parentNode.insertBefore(img, noscript);
	img.onload = function() {
		img.removeAttribute('data-src');
	};
	img.src = noscript.getAttribute('data-src');
});



jQuery('img').imagesLoaded();


         jQuery('body').ready(function() {

        jQuery('img').hide();
        jQuery('img').each(function(i) {
            if (this.complete) {
                jQuery(this).fadeIn();
            } else {
                jQuery(this).load(function() {
                    jQuery(this).fadeIn(2000);
                });
            }
        });
    });
