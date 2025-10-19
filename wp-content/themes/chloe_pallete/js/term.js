( function($) {
  'use strict';

$(function(e) {
     var term_register_key = "";
     function isVietnamesePhoneNumber(number) {
         return /((^(\+84|84|0|0084){1})(3|5|7|8|9))+([0-9]{8})$/.test(number);
     }

     var policyModal = new bootstrap.Modal(document.getElementById('policyModal'), {
          backdrop: 'static',
          keyboard: false  // to prevent closing with Esc button (if you want this too)
      });
     policyModal.show()

      $('.textbox').attr('autocomplete', 'off');
      $(".policy-form .cmdPolicySend").click(function (evt) {
          var mobile = $(".policy-form .txtpolicyMobile").val();

          if (!isVietnamesePhoneNumber(mobile)) {
              bootbox.alert("error_dien_thoai", function () {
                  //fixModal();

              });
          }
          else {
              //Submit form

              var data = new FormData();
              data.append('action', 'policysubmit');
              data.append('mobile', mobile);

              var dSubmitText = $(".policy-form .cmdPolicySend").html();
              $(".policy-form .cmdPolicySend").addClass("inprogress").html('<i class="fa fa-spinner fa-spin fa-2x fa-fw"></i>');

              $.ajax({
                  type: "POST",
                  url: ajaxurl,
                  data: data,
                  processData: false,
                  contentType: false,
                  cache: false,
                  timeout: 600000,
                  success: function (data) {
                    var jObject = jQuery.parseJSON(data);
                    if(jObject && jObject.status==1){
                        term_register_key=jObject.request_id;
                    }
                    $("#policyModal").modal("hide");
                  },
                  error: function (e) {

                      console.log("ERROR : ", e);

                  },
                  complete: function () {
                      $(".policy-form .cmdPolicySend").removeClass("inprogress").html(dSubmitText);
                  }
              });

              $(".policy-form .cmdPolicySend").css('pointer-events', 'none');
          }
      });

      $(".section-policy .cmdPolicySubmit").click(function (evt) {

          if (!$(".cbPolicyConfirm").is(":checked")) {
              bootbox.alert(app.message.term_false);
          }
          else {
              var data = new FormData();
              data.append('action', 'policyupdate');
              data.append('request_id', term_register_key);
              var dSubmitText = $(".section-policy .cmdPolicySubmit").html();
              $(".section-policy .cmdPolicySubmit").addClass("inprogress").html('<i class="fa fa-spinner fa-spin fa-2x fa-fw"></i>');

              $.ajax({
                  type: "POST",
                  url: ajaxurl,
                  data: data,
                  processData: false,
                  contentType: false,
                  cache: false,
                  timeout: 600000,
                  success: function (msg) {
                      bootbox.alert({
                          message: app.message.term_success,
                      buttons: {
                          ok: {
                              label: app.message.term_success_button
                          }
                      },
                      callback: function () {
                          $(".policy-submit-wrapper").remove();
                      }
                  })
              },
              error: function (e) {

                  console.log("ERROR : ", e);

              },
              complete: function () {
                  $(".section-policy .cmdPolicySubmit").removeClass("inprogress").html(dSubmitText);
              }
          });


          }


      });


    

  });
})(jQuery);
