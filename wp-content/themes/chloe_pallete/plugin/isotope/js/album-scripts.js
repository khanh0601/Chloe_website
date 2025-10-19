jQuery(document).ready(function($) {
    var $container_isotope = $("#album_container");
    $container_isotope.append('<div class="preloader"><i class="fa fa-cog fa-spin"></i></div>');
    $container_isotope.imagesLoaded(function($images, $proper, $broken) {
        $container_isotope.isotope({
            itemSelector: ".album-item",
            percentPosition: true,
            masonry: {
                columnWidth: ".grid-sizer"
            }
        });
        $container_isotope.isotope("layout");
        

        $container_isotope.find(".preloader i").css("display", "none");
        $container_isotope.children(".preloader").css("opacity", 0).delay(900).fadeOut();



        //****************************
          // Isotope Load more button
          //****************************
          var initShow = 6; //number of items loaded on init & onclick load more button
          var counter = initShow; //counter for load more button
          var iso = $container_isotope.data('isotope'); // get Isotope instance

          loadMore(initShow); //execute function onload

          function loadMore(toShow) {
            $container_isotope.find(".d-none").removeClass("d-none");

            var hiddenElems = iso.filteredItems.slice(toShow, iso.filteredItems.length).map(function(item) {
              return item.element;
            });
            $(hiddenElems).addClass('d-none');
            $container_isotope.isotope('layout');

            //when no more to load, hide show more button
            if (hiddenElems.length == 0) {
              jQuery("#load-more").hide();
            } else {
              jQuery("#load-more").show();
            };

          }

          //append load more button
          //$container_isotope.after('');

          //when load more button clicked
          $("#load-more").click(function() {
            if ($('.album-filter-list').data('clicked')) {
              //when filter button clicked, set initial value for counter
              counter = initShow;
              $('.album-filter-list').data('clicked', false);
            } else {
              counter = counter;
            };
            counter = counter + initShow;
            loadMore(counter);
            return false;
          });

          //when filter button clicked
          /*$(".album-filter-list").click(function() {
            $(this).data('clicked', true);
            loadMore(initShow);
          });*/

          $(".album-filter-list a").click(function() {
            var selector = $(this).attr("data-filter");
            $container_isotope.isotope({
                filter: selector
            });
            var $parent = $(this).parents(".album-filter-list");
            $parent.find(".active").removeClass("active");
            $(".album-filter-list").not($parent).find("li").removeClass("active").first().addClass("active");
            $(this).parent().addClass("active");

            $(".album-filter-list").data('clicked', true);
            loadMore(initShow);

            return false;
        });
        $(".album-filter-list li:first-child a").trigger("click");

    });
});






 
