(function ($) {
  'use strict';

  // Xử lý hiển thị attribute khi chọn variant (dùng jQuery)
  $('input[name="size"]').on('change', function () {
    const $displayEl = $('#sizeDisplay');
    if ($displayEl.length) {
      $displayEl.text($(this).val());
    }
  });

  // Xử lý cho Cake Flavour
  $('input[name="flavor"]').on('change', function () {
    const $displayEl = $('#flavorDisplay');
    if ($displayEl.length) {
      $displayEl.text($(this).val());
    }
  });

  // Xử lý cho tất cả variation selectors
  $('.variation-selector').on('change', function () {
    const attrName = $(this).data('attribute-name') || $(this).attr('data-attribute-name');
    const attrId = attrName.replace('attribute_', '');
    const $displayEl = $('#' + attrId + 'Display');
    if ($displayEl.length) {
      $displayEl.text($(this).val());
    }
  });

  // Xử lý quantity buttons
  const $quantityInput = $('.productdetail_quantity_input_value');
  const $quantityHidden = $('input[name="quantity"]');
  const $minusBtn = $('.productdetail_quantity_button.minus');
  const $plusBtn = $('.productdetail_quantity_button.plus');

  if ($minusBtn.length && $plusBtn.length && $quantityInput.length && $quantityHidden.length) {
    let currentQuantity = parseInt($quantityInput.text()) || 1;
    const minQty = parseInt($quantityHidden.attr('min')) || 1;
    const maxQty = parseInt($quantityHidden.attr('max')) || 100;

    $minusBtn.on('click', function (e) {
      e.preventDefault();
      if (currentQuantity > minQty) {
        currentQuantity--;
        $quantityInput.text(currentQuantity);
        $quantityHidden.val(currentQuantity);
      }
    });

    $plusBtn.on('click', function (e) {
      e.preventDefault();
      if (currentQuantity < maxQty) {
        currentQuantity++;
        $quantityInput.text(currentQuantity);
        $quantityHidden.val(currentQuantity);
      }
    });
  }

  // Hàm tìm variation ID dựa trên các attributes đã chọn
  function findVariationId(selectedAttributes, variationsData) {
    if (!variationsData || variationsData.length === 0) {
      return 0;
    }

    // Tìm variation khớp với các attributes đã chọn
    for (let i = 0; i < variationsData.length; i++) {
      const variation = variationsData[i];
      let match = true;
      const variationAttr = variation.attributes || {};

      // Kiểm tra số lượng attributes phải khớp
      const selectedAttrCount = Object.keys(selectedAttributes).length;
      const variationAttrCount = Object.keys(variationAttr).length;

      if (selectedAttrCount !== variationAttrCount) {
        continue;
      }

      // Kiểm tra từng attribute đã chọn
      for (const attrName in selectedAttributes) {
        const selectedValue = selectedAttributes[attrName];

        // Kiểm tra xem variation có attribute này không
        if (!variationAttr.hasOwnProperty(attrName)) {
          match = false;
          break;
        }

        // So sánh giá trị (case-insensitive và trim whitespace)
        const variationValue = String(variationAttr[attrName]).trim();
        const selectedValueTrimmed = String(selectedValue).trim();

        if (variationValue !== selectedValueTrimmed &&
          variationValue.toLowerCase() !== selectedValueTrimmed.toLowerCase()) {
          match = false;
          break;
        }
      }

      if (match) {
        return variation.variation_id;
      }
    }

    return 0;
  }

  function getSelectedAttributes() {
    const attributes = {};
    const $variationSelectors = $('.variation-selector:checked');

    $variationSelectors.each(function () {
      const attrName = $(this).data('attribute-name') || $(this).attr('data-attribute-name');
      if (attrName) {
        attributes[attrName] = $(this).val();
      }
    });

    return attributes;
  }

  // Xử lý Add to Cart
  $('.productdetail_cart_button').on('click', function (e) {
    e.preventDefault();

    const $button = $(this);
    const productId = $('#product_id').val();
    const quantity = parseInt($('input[name="quantity"]').val()) || 1;
    const variationsData = $('#variations_data').val();

    // Kiểm tra product ID
    if (!productId) {
      if (window.Popup) {
        window.Popup.error('Error', 'Product ID not found');
      } else {
        alert('Product ID not found');
      }
      return;
    }

    // Disable button để tránh double click
    $button.prop('disabled', true).addClass('loading');

    let data = {
      product_id: productId,
      quantity: quantity
    };

    // Nếu là variable product, tìm variation ID
    if (variationsData && variationsData.trim() !== '') {
      try {
        const variations = JSON.parse(variationsData);
        const selectedAttributes = getSelectedAttributes();

        // Kiểm tra nếu có variation selectors thì phải chọn đủ
        const $variationSelectors = $('.variation-selector');
        if ($variationSelectors.length > 0) {
          if (Object.keys(selectedAttributes).length === 0) {
            if (window.Popup) {
              window.Popup.warning('Selection Required', 'Please select product options');
            } else {
              alert('Please select product options');
            }
            $button.prop('disabled', false).removeClass('loading');
            return;
          }

          const variationId = findVariationId(selectedAttributes, variations);

          if (variationId > 0) {
            data.variation_id = variationId;
            data.variation = selectedAttributes;
          } else {
            if (window.Popup) {
              window.Popup.warning('Selection Required', 'Please select all product options. The selected combination may not be available.');
            } else {
              alert('Please select all product options. The selected combination may not be available.');
            }
            $button.prop('disabled', false).removeClass('loading');
            return;
          }
        }
      } catch (e) {
        console.error('Error parsing variations data:', e);
        // Nếu lỗi parse, vẫn cho phép add simple product
      }
    }

    // Kiểm tra wc_add_to_cart_params
    if (typeof wc_add_to_cart_params === 'undefined') {
      if (window.Popup) {
        window.Popup.error('Configuration Error', 'WooCommerce is not properly configured');
      } else {
        alert('WooCommerce is not properly configured');
      }
      $button.prop('disabled', false).removeClass('loading');
      return;
    }

    // Gửi AJAX request
    const ajaxUrl = wc_add_to_cart_params.wc_ajax_url.toString().replace('%%endpoint%%', 'add_to_cart');

    $.ajax({
      type: 'POST',
      url: ajaxUrl,
      data: data,
      beforeSend: function () {
        $button.find('.productdetail_cart_button_txt').text('Adding...');
      },
      success: function (response) {
        if (response.error && response.product_url) {
          window.location = response.product_url;
          return;
        }

        // Trigger event để WooCommerce cập nhật fragments
        $(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash, $button]);

        // Hiển thị thông báo thành công
        $button.find('.productdetail_cart_button_txt').text('Added!');

        setTimeout(function () {
          $button.find('.productdetail_cart_button_txt').text('Add to cart');
          $button.prop('disabled', false).removeClass('loading');
        }, 2000);

        // Redirect nếu cần
        if (wc_add_to_cart_params.cart_redirect_after_add === 'yes') {
          window.location = wc_add_to_cart_params.cart_url;
        }
      },
      error: function () {
        if (window.Popup) {
          window.Popup.error('Error', 'Error adding product to cart. Please try again.');
        } else {
          alert('Error adding product to cart. Please try again.');
        }
        $button.find('.productdetail_cart_button_txt').text('Add to cart');
        $button.prop('disabled', false).removeClass('loading');
      },
      dataType: 'json'
    });
  });

  // Swiper cho related products
  var swiper1 = new Swiper(".home_seller_silder", {
    slidesPerView: 1.5,
    spaceBetween: parseRem(10),
    loop: true,
    speed: 4000,
    autoplay: {
      delay: 0,
      disableOnInteraction: false,
    },
    breakpoints: {
      768: {
        slidesPerView: 2.7,
        spaceBetween: parseRem(15),
      },
      991: {
        slidesPerView: 4.3,
        spaceBetween: parseRem(20),
      },
    },
  });

})(jQuery);