// Toggle filter dropdown
$('.filter-toggle').on('click', function(e) {
  e.stopPropagation();
  $(this).toggleClass('active');
  $(this).next('.filter-dropdown').toggleClass('active');

  // Đóng dropdown khác
  $('.filter-toggle').not(this).removeClass('active');
  $('.filter-dropdown').not($(this).next()).removeClass('active');
});

// Ngăn dropdown đóng khi click vào checkbox/radio
$('.filter-dropdown').on('click', function(e) {
  e.stopPropagation();
});

// Đóng dropdown khi click bên ngoài
$(document).on('click', function(e) {
  if (!$(e.target).closest('.shop_content_list_search_left, .shop_content_list_search_right_sortby').length) {
    $('.filter-toggle').removeClass('active');
    $('.filter-dropdown').removeClass('active');
  }
});

// Search functionality
$('.search-input').on('input', function() {
  var searchTerm = $(this).val().toLowerCase();
  console.log('Searching for:', searchTerm);
  // Thêm logic search ở đây
});
