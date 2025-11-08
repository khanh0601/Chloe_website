$('#file-upload').on('change', function (e) {
        var fileName = e.target.files[0]?.name;

        if (fileName) {
          // Ẩn nội dung ban đầu
          $('.home_contact_form_upload_img').hide();
          $('.home_contact_form_upload_icon').hide();
          $('.upload-label span').hide();
          $('.upload-info').hide();

          // Hiện tên file
          if ($('.file-name-display').length === 0) {
            $('.upload-label').append('<div class="file-name-display txt_14">' + fileName + '</div>');
          } else {
            $('.file-name-display').text(fileName);
          }

          // Thêm nút xóa (optional)
          if ($('.remove-file').length === 0) {
            $('.upload-label').append('<button type="button" class="remove-file">×</button>');
          }
        }
      })
      $(document).on('click', '.remove-file', function (e) {
        e.preventDefault();
        e.stopPropagation();

        // Reset input file
        $('#file-upload').val('');

        // Hiện lại nội dung ban đầu
        $('.home_contact_form_upload_img').show();
        $('.home_contact_form_upload_icon').show();
        $('.upload-label span').show();
        $('.upload-info').show();

        // Xóa tên file và nút xóa
        $('.file-name-display').remove();
        $('.remove-file').remove();
      });