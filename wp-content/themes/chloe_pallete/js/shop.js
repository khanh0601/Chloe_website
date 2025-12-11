$('.filter-toggle').on('click', function(e) {
  e.stopPropagation();
  $(this).toggleClass('active');
  $(this).next('.filter-dropdown').toggleClass('active');

  $('.filter-toggle').not(this).removeClass('active');
  $('.filter-dropdown').not($(this).next()).removeClass('active');
});

$('.filter-dropdown').on('click', function(e) {
  e.stopPropagation();
});

$(document).on('click', function(e) {
  if (!$(e.target).closest('.shop_content_list_search_left, .shop_content_list_search_right_sortby').length) {
    $('.filter-toggle').removeClass('active');
    $('.filter-dropdown').removeClass('active');
  }
});
$('.shop_category input[type="checkbox"]').on('change', function() {
        $(this).parent('label').toggleClass('active', this.checked);
    });
$('.search-input').on('input', function() {
  var searchTerm = $(this).val().toLowerCase();
  console.log('Searching for:', searchTerm);
});
