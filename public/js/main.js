(function($) { 
	'use strict';
    var magnificPopup = $.magnificPopup.instance;
	/**
	 * Product Quick View
	 */
	
	$('.wpdshortcode').magnificPopup({
		type:'inline',
		midClick: true,
		gallery:{
			enabled:true
		},
		delegate: 'a.wpb_wl_preview',
		removalDelay: 500, //delay removal by X to allow out-animation
		callbacks: {
		    beforeOpen: function() {
		       this.st.mainClass = this.st.el.attr('data-effect');
		    }
		},
	  	closeOnContentClick: false,
	});

	/**
	 * product image lightbox
	 */

	$("[data-fancybox]").fancybox();

$('#close--popup-f').click(function(){
  magnificPopup.close();
 });	
 
 
	$('.wpd-quick-view').magnificPopup({
                 closeOnBgClick: false,
                 callbacks: {
                          beforeOpen: function() {
                                        $('#wpd-quick-search-popup .wpd_data_insert_here').html(''); // fhfghfgh
                                         // console.log(this.st.el.attr('p-id')); 
                                          let pid = this.st.el.attr('p-id');
                                          
                                         // $('#wpd-quick-search-popup .wpd_data_insert_here').LoadingOverlay("show");
                                              $('#wpd-quick-search-popup .wpd_data_insert_here').LoadingOverlay("show",{ 
                                                    background      : "rgba(255, 255, 255, 0.5)",
                                                    image           : myAjax.SiteUrl+"/wp-content/plugins/wpd-styles/public/js/Rolling.svg",
                                                  // imageAnimation  : "1.5s fadein",
                                                    imageColor      : "transparent"
                                                });                                           
                                      jQuery.ajax({
                                             type : "post",
                                             dataType : "html",
                                             url : myAjax.ajaxurl, 
                                             data : {action: "append_popup_data_product",pid:pid }, 
                                             success: function(response) {
                                                // alert('sdfsdfsdf');
                                                $('#wpd-quick-search-popup .wpd_data_insert_here').LoadingOverlay("hide",true); 
                                                 $('#wpd-quick-search-popup .wpd_data_insert_here').html(response); // fhfghfgh
                                             }
                                          })                             
                            }
                      }
    });



  $('#wpd-quick-search-popup').on('click','#add_item_btn',function(event){
      
                                         event.preventDefault();
                                          $('#wpd-quick-search-popup .wpd_data_insert_here .wpd-ecommerce-single-notifications').remove();
                                              var ptype = $('#wpd-quick-search-popup select').attr('id');
                                              var variation = $('#wpd-quick-search-popup select option:selected').val();
                                               var qty = $('#wpd-quick-search-popup input#qtty').val();
                                               
                                              if(variation == ''){
                                                  alert('Please select product weight...');
                                                  return false;
                                              }
                                              if(qty == '' || qty ==0){
                                                  alert('Please add product quantity at least 1...');
                                                  return false;
                                              }
                                              
                                             
                                              var pid = $('#wpd-quick-search-popup main > div').attr('id');
                                              //alert(pid);
                                             pid = pid.split('-')[1];
                                              
                                              var data = {};
                                              if(ptype =='wpd_ecommerce_flowers_prices'){
                                                   data = {action:'wpd_ecommerce_add_to_cart_form1',wpd_ecommerce_flowers_prices:variation,qtty:qty, add_me: 'Add to cart',pid : pid }
                                              }else if(ptype =='wpd_ecommerce_concentrates_prices'){
                                                   data = {action:'wpd_ecommerce_add_to_cart_form1',wpd_ecommerce_concentrates_prices:variation,qtty:qty, add_me: 'Add to cart',pid : pid }
                                              }else if(ptype == 'wpd_ecommerce_product_prices'){
                                                  data = {action:'wpd_ecommerce_add_to_cart_form1',wpd_ecommerce_product_prices:variation,qtty:qty, add_me: 'Add to cart',pid : pid }
                                              }else{
                                                  data = {action:'wpd_ecommerce_add_to_cart_form1',qtty:qty, add_me: 'Add to cart',pid : pid }
                                              }
                                              
                                              $('#wpd-quick-search-popup ').LoadingOverlay("show",{ 
                                                    background      : "rgba(0, 0, 0, 0.5)",
                                                    image           : myAjax.SiteUrl+"/wp-content/plugins/wpd-styles/public/js/cart.svg",
                                                    imageAnimation  : "1.5s fadein",
                                                    imageColor      : "#ffcc00"
                                                });
                                               jQuery.ajax({
                                                 type : 'post',
                                                 dataType : "html",
                                                 url : myAjax.ajaxurl, 
                                                 data : data, 
                                                 success: function(response) {
                                                    // alert('sdfsdfsdf');
                                                     $('#wpd-quick-search-popup').LoadingOverlay("hide",true); 
                                                   var  data = jQuery.parseJSON(response);
                                                    
                                                    $('#wpd-quick-search-popup .wpd_data_insert_here').prepend(data.notification);
                                                    

                                                    // $('#wpd-quick-search-popup .wpd_data_insert_here').html(response); // fhfghfgh
                                                 }
                                              })     

  });
  



})(jQuery);

(function($) { 
	'use strict';

	/**
	 * Product Quick View
	 */
	
	$('.carousel-item').magnificPopup({
		type:'inline',
		midClick: true,
		gallery:{
			enabled:true
		},
		delegate: 'a.wpb_wl_preview',
		removalDelay: 500, //delay removal by X to allow out-animation
		callbacks: {
		    beforeOpen: function() {
		       this.st.mainClass = this.st.el.attr('data-effect');
		    }
		},
	  	closeOnContentClick: false,
	});

	/**
	 * product image lightbox
	 */

	$("[data-fancybox]").fancybox();

})(jQuery);

