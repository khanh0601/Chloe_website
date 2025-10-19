$(document).ready(function(){
	$(window).scroll();
	$(".partner").slick( {
        slide:'.item', 
		slidesToShow:4,
		slidesToScroll:1,
		dots:false, 
		arrows:false,
		responsive:[ {
            breakpoint:1025, settings: {
                slidesToShow: 5, slidesToScroll: 5,
            }
        }
        , {
            breakpoint:769, settings: {
                slidesToShow: 4, slidesToScroll: 4,
            }
        }
        , {
            breakpoint:600, settings: {
                slidesToShow: 3, slidesToScroll: 3
            }
        }
        , {
            breakpoint:480, settings: {
                slidesToShow: 2, slidesToScroll: 2
            }
        }
        ]
    });
})