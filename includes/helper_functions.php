<?php  

    /****************************************************************************************/ 
    add_action("wp_ajax_append_popup_data_product","append_popup_data_product");
    add_action("wp_ajax_nopriv_append_popup_data_product","append_popup_data_product");  
    
    function append_popup_data_product()
    {
        do_action( 'wpd_ecommerce_templates_single_items_wrap_before' );
        extract($_POST);
?>

    <?php 

    $loop = new wp_query(array('post__in'=>array($pid),'post_type' =>get_post_type( $pid)));  
   // print_r( $loop);
    while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <?php do_action( 'wpd_ecommerce_templates_single_items_entry_header_before' ); ?>

            <div class="entry-header wpd-ecommerce-shelfItem">

                <div class="image-wrapper">
                    <?php //wpd_product_image( get_the_ID(), 'wpd-medium' ); ?>
                    <a><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>" alt="Sour Diesel"></a>
                </div><!-- // .image-wrapper -->

                <div class="product-details">

                    <?php do_action( 'wpd_ecommerce_templates_single_items_entry_title_before' ); ?>

                    <header class="entry-header">
                        <h1 class="item_name"><?php the_title(); ?></h1>
                          <?php do_action( 'wpd_ecommerce_templates_single_items_entry_content_before' ); ?>

                            <div class="entry-content wpd-ecommerce-shelfContent">
                                <?php
                                    do_action( 'wpd_ecommerce_single_item_content_before' );
                                   echo  get_the_content();
                                    do_action( 'wpd_ecommerce_single_item_content_after' );
                                ?>
                            </div><!-- / wpd-ecommerce-shelfContent -->
                
                            <?php do_action( 'wpd_ecommerce_templates_single_items_entry_content_after' ); ?>
                    </header>

                    <?php
                    do_action( 'wpd_ecommerce_templates_single_items_entry_title_after' );

                    do_action( 'wpd_ecommerce_item_types_before' );

                    // Display Item types.
                    echo '<div class="wpd-ecommerce item-types">';

                    do_action( 'wpd_ecommerce_item_types_inside_before' );

					// Display Strain Type.
					
					$terms12 = get_the_terms (get_the_ID(), 'strain_type');
					  if ( !is_wp_error($terms12)) : 
						$strain_typename = wp_list_pluck($terms12, 'name'); 
						$atags = []; 
						if(!empty($strain_typename)){
							foreach($strain_typename as $dtgs){
								$atags[]  = '<a>'.$dtgs.'</a>';
							}
						}


						$skills_yo = implode(", ", $atags);
                   
					echo '<span class="wpd-ecommerce strain-type">' .$skills_yo. '</span>';
					endif;
                    // Display Shelf Type.
                    echo '<span class="wpd-ecommerce shelf-type">' . get_the_term_list( get_the_ID(), 'shelf_type', '', '' ) . '</span>';
                    // Display Edibles Category.
                    echo '<span class="wpd-ecommerce category edibles">' . get_the_term_list( get_the_ID(), 'edibles_category', '', '' ) . '</span>';
                    // Display Topicals Category.
                    echo '<span class="wpd-ecommerce category topicals">' . get_the_term_list( get_the_ID(), 'topicals_category', '', '' ) . '</span>';

                    do_action( 'wpd_ecommerce_item_types_inside_after' );

                    // End item-types div.
                    echo '</div>';

                    do_action( 'wpd_ecommerce_item_types_after' );

                    do_action( 'wpd_ecommerce_item_details_before' );

                    echo '<div class="wpd-ecommerce item-details">';

                    do_action( 'wpd_ecommerce_item_details_inside_before' );

                    // Get compounds.
                    $compounds = get_wpd_compounds_simple( get_the_ID(), $type = '%', array( 'thc', 'cbd' ) );

                    // Show compounds.
                    if ( $compounds ) {
                        echo $compounds;
                    }

                    do_action( 'wpd_ecommerce_item_details_inside_after' );

                    echo '</div>';

                    do_action( 'wpd_ecommerce_item_details_after' );
                    ?>

                </div><!-- / .product-details -->
            </div><!-- / .wpd-ecommerce-shelfItem -->

            <?php do_action( 'wpd_ecommerce_templates_single_items_entry_header_after' ); ?>

           

        </div>
    <?php endwhile; ?>
<?php do_action( 'wpd_ecommerce_templates_single_items_wrap_after' ); ?>

<style>
.s-hidden {
    visibility:hidden;
    padding-right:10px;
}
.wpd_data_insert_here .select {
    cursor: pointer;
    display: inline-block;
    position: relative;
    font: normal 11px/22px Arial, Sans-Serif;
    color: black;
    border: 1px solid #ccc;
    border-radius: 3px;
    float: left;
    font-size: .85em;
    margin-right: 2%;
    padding: 0 10px !IMPORTANT;
    width: 45%;
    height: 40px;
    line-height: 35px;
    BORDER-RADIUS: 5PX !IMPORTANT;
	border: none;
}
.wpd_data_insert_here .select:before,
.wpd_data_insert_here .select:after{
	top: -1px !important;
    right: 6px !important;
	font-size: 28px!important;
	width: 40px!important;
    height: 43px!important;
	color: #717a8f !important;
}
.styledSelect {
    position:absolute;
    top:0;
    right:0;
    bottom:0;
    left:0;
    background-color: #f3f7fa !important;
    padding:0 10px;
    font-weight:bold;
	border-radius: 4px;
	color: #717a8f;
}

.styledSelect:active, .styledSelect.active {
    background-color: #f3f7fa !important;
}
.options {
    display:none;
    position:absolute;
    top:100%;
    right:0;
    left:0;
    z-index:999;
    margin:0 0;
    padding:0 0;
    list-style:none;
    border:1px solid #ccc;
    background-color:white;
    -webkit-box-shadow:0 1px 2px rgba(0, 0, 0, 0.2);
    -moz-box-shadow:0 1px 2px rgba(0, 0, 0, 0.2);
    box-shadow:0 1px 2px rgba(0, 0, 0, 0.2);
}
.options li {
    padding:0 6px;
    margin:0 0;
    padding:0 10px;
}
.options li:hover {
    background-color:#33cc99;
    color:white;
}

@media(max-width:1024px){
	.wpd_data_insert_here .select{
		width: 70%;
	}
	.wpd_data_insert_here span.wpd-ecommerce.strain-type a:after{
		width:99%;
	}
}
@media(max-width:767px){
	.wpd_data_insert_here .select{
		width: 70%;
	}
	.wpd_data_insert_here span.wpd-ecommerce.strain-type a:after{
		width:99%;
	}
}
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
// Iterate over each select element
$('select').each(function () {

// Cache the number of options
var $this = $(this),
	numberOfOptions = $(this).children('option').length;

// Hides the select element
$this.addClass('s-hidden');

// Wrap the select element in a div
$this.wrap('<div class="select"></div>');

// Insert a styled div to sit over the top of the hidden select element
$this.after('<div class="styledSelect"></div>');

// Cache the styled div
var $styledSelect = $this.next('div.styledSelect');

// Show the first select option in the styled div
$styledSelect.text($this.children('option').eq(0).text());

// Insert an unordered list after the styled div and also cache the list
var $list = $('<ul />', {
	'class': 'options'
}).insertAfter($styledSelect);

// Insert a list item into the unordered list for each select option
for (var i = 0; i < numberOfOptions; i++) {
	$('<li />', {
		text: $this.children('option').eq(i).text(),
		rel: $this.children('option').eq(i).val()
	}).appendTo($list);
}

// Cache the list items
var $listItems = $list.children('li');

// Show the unordered list when the styled div is clicked (also hides it if the div is clicked again)
$styledSelect.click(function (e) {
	e.stopPropagation();
	$('div.styledSelect.active').each(function () {
		$(this).removeClass('active').next('ul.options').hide();
	});
	$(this).toggleClass('active').next('ul.options').toggle();
});

// Hides the unordered list when a list item is clicked and updates the styled div to show the selected list item
// Updates the select element to have the value of the equivalent option
$listItems.click(function (e) {
	e.stopPropagation();
	$styledSelect.text($(this).text()).removeClass('active');
	$this.val($(this).attr('rel'));
	$list.hide();
	/* alert($this.val()); Uncomment this for demonstration! */
});

// Hides the unordered list when clicking outside of it
$(document).click(function () {
	$styledSelect.removeClass('active');
	$list.hide();
});

});
</script>
<?php wp_reset_query(); 
       
        die();
    }
    
    
     add_action("wp_ajax_wpd_ecommerce_add_to_cart_form1","wpd_ecommerce_add_to_cart_form1");
    add_action("wp_ajax_nopriv_wpd_ecommerce_add_to_cart_form1","wpd_ecommerce_add_to_cart_form1");   
    
    
    function wpd_ecommerce_add_to_cart_form1() {
      
      
      extract($_POST);

       $notification =  wpd_ecommerce_notifications1($pid);
	// Get WPD settings from General tab.
	$wpdas_general = get_option( 'wpdas_general' );

	// Check if user is required to be logged in to shop.
	if ( isset( $wpdas_general['wpd_ecommerce_cart_require_login_to_shop'] ) ) {
		$login_to_shop = $wpdas_general['wpd_ecommerce_cart_require_login_to_shop'];
	} else {
		$login_to_shop = NULL;
	}

	// Set prices.
	if ( in_array( get_post_type( $pid ), array( 'edibles', 'prerolls', 'growers', 'gear', 'tinctures' ) ) ) {
		$regular_price = esc_html( get_post_meta( $pid, '_priceeach', true ) );
		$pack_price    = esc_html( get_post_meta( $pid, '_priceperpack', true ) );
		$pack_units    = esc_html( get_post_meta( $pid, '_unitsperpack', true ) );
	} elseif ( 'topicals' === get_post_type($pid) ) {
		$regular_price = esc_html( get_post_meta( $pid, '_pricetopical', true ) );
		$pack_price    = esc_html( get_post_meta( $pid, '_priceperpack', true ) );
		$pack_units    = esc_html( get_post_meta( $pid, '_unitsperpack', true ) );
	} elseif ( 'flowers' === get_post_type($pid) ) {
		$flower_names = array();
		foreach ( wpd_flowers_weights_array() as $key=>$value ) {
			$flower_names[$key] = esc_html( get_post_meta( $pid, $value, true ) );
		}
		$regular_price = $flower_names;
		$pack_price    = '';
		$pack_units    = '';
	} elseif ( 'concentrates' === get_post_type($pid) ) {
		$concentrate_names = array();
		foreach ( wpd_concentrates_weights_array() as $key=>$value ) {
			$concentrate_names[$key] = esc_html( get_post_meta( $pid, $value, true ) );
		}
		$regular_price = $concentrate_names;
		$pack_price    = '';
		$pack_units    = '';
	} else {
		$regular_price = '';
		$pack_price    = '';
		$pack_units    = '';
	}

    // Out of stock warning.
    $out_of_stock = '';

    // Variables.
    $price_each     = get_post_meta( $pid, '_priceeach', true );
    $price_topical  = get_post_meta( $pid, '_pricetopical', true );
    $price_per_pack = get_post_meta( $pid, '_priceperpack', true );

    // Flowers out of stock.
    if ( 'flowers' == get_post_type( $pid ) ) {
        // Add out of stock notice to output string.
        if ( ! get_post_meta( $pid, '_inventory_flowers', true ) ) {
            $out_of_stock .= '<span class="wpd-inventory warning">' . __( 'out of stock', 'wpd-inventory' ) . '</span>';
        }
    }

    // Concentrates out of stock.
    if ( 'concentrates' == get_post_type( $pid ) ) {
        // Add out of stock notice to output string.
        if ( '' != $price_each ) {
            if ( ! get_post_meta( $pid, '_inventory_concentrates_each', true ) ) {
                $out_of_stock .= '<span class="wpd-inventory warning">' . __( 'out of stock', 'wpd-inventory' ) . '</span>';
            }
        } else {
            if ( ! get_post_meta( $pid, '_inventory_concentrates', true ) ) {
                $out_of_stock .= '<span class="wpd-inventory warning">' . __( 'out of stock', 'wpd-inventory' ) . '</span>';
            }
        }
    }

    // Edibles out of stock.
    if ( 'edibles' == get_post_type( $pid ) ) {
        // Add out of stock notice to output string.
        if ( ! get_post_meta( $pid, '_inventory_edibles', true ) ) {
            $out_of_stock .= '<span class="wpd-inventory warning">' . __( 'out of stock', 'wpd-inventory' ) . '</span>';
        }
    }

    // Pre-rolls out of stock.
    if ( 'prerolls' == get_post_type( $pid ) ) {
        // Add out of stock notice to output string.
        if ( ! get_post_meta( $pid, '_inventory_prerolls', true ) ) {
            $out_of_stock .= '<span class="wpd-inventory warning">' . __( 'out of stock', 'wpd-inventory' ) . '</span>';
        }
    }

    // Topicals out of stock.
    if ( 'topicals' == get_post_type( $pid ) ) {
        // Add out of stock notice to output string.
        if ( ! get_post_meta( $pid, '_inventory_topicals', true ) ) {
            $out_of_stock .= '<span class="wpd-inventory warning">' . __( 'out of stock', 'wpd-inventory' ) . '</span>';
        }
    }

    // Growers out of stock.
    if ( 'growers' == get_post_type( $pid ) ) {
        // Add out of stock notice to output string.
        if ( get_post_meta( $pid, '_clonecount', true ) ) {
            if ( ! get_post_meta( $pid, '_inventory_clones', true ) ) {
                $out_of_stock .= '<span class="wpd-inventory warning">' . __( 'out of stock', 'wpd-inventory' ) . '</span>';
            }
        } elseif ( get_post_meta( $pid, '_seedcount', true ) ) {
            if ( ! get_post_meta( $pid, '_inventory_seeds', true ) ) {
                $out_of_stock .= '<span class="wpd-inventory warning">' . __( 'out of stock', 'wpd-inventory' ) . '</span>';
            }
        }
    }

    // Tinctures out of stock.
    if ( 'tinctures' == get_post_type( $pid ) ) {
        // Add out of stock notice to output string.
        if ( ! get_post_meta( $pid, '_inventory_tinctures', true ) ) {
            $out_of_stock .= '<span class="wpd-inventory warning">' . __( 'out of stock', 'wpd-inventory' ) . '</span>';
        }
    }

    // Gear out of stock.
    if ( 'gear' == get_post_type( $pid ) ) {
        // Add out of stock notice to output string.
        if ( ! get_post_meta( $pid, '_inventory_gear', true ) ) {
            $out_of_stock .= '<span class="wpd-inventory warning">' . __( 'out of stock', 'wpd-inventory' ) . '</span>';
        }
    }

    // Out of stock warning(s).
    $out_of_stock = apply_filters( 'wpd_inventory_oos_shortcode_warnings', $out_of_stock );



    $html = '';
	?>

	

	<?php
	  $html .= '<form name="add_to_cart" class="wpd-ecommerce" method="post">';
	// Generate display price HTML.
	$display_price = '<p class="wpd-ecommerce price">' . get_wpd_all_prices_simple( $pid, FALSE ) . '</p>';

	// Display filtered single price.
	$html .= apply_filters( 'wpd_ecommerce_single_item_price', $display_price );

	// Check if user is required to login to shop.
	if ( ! is_user_logged_in() && 'on' == $login_to_shop ) {
		$str_login  = '<div class="wpd-ecommerce-notifications">';
		$str_login .= '<div class="wpd-ecommerce-notifications failed">You must be <a href="' . wpd_ecommerce_account_url() . '">logged in</a> to place an order</div>';
		$str_login .= '</div>';

		// Display login notification.
		echo $str_login;
	} elseif ( $out_of_stock ) {
		// Display out of stock notification.
		echo $out_of_stock;
	} else { 

$html .='	<fieldset>';
	    
	?>

	<?php if ( ! empty( $regular_price ) ) { ?>
        
		<?php if ( 'flowers' === get_post_type($pid ) )
		{
		?>
			<?php

			// Select a weight.
			$html .= ( '<select name="wpd_ecommerce_flowers_prices" id="wpd_ecommerce_flowers_prices" class="widefat">' );
			$html .= ( '<option value="" disabled selected>' . __( 'Choose a weight', 'wpd-ecommerce' ) . '</option>' );
			foreach ( $regular_price as $name => $price ) {
				if ( '' != $price ) {
					$html .=( '<option value="'. esc_html( $price ) . '">' . CURRENCY . esc_html( $price ) . ' - ' . esc_html( $name ) . '</option>' );
				}
			}
			$html .=( '</select>' );

			// Flower prices.
			$weight_gram      = get_post_meta( $pid, '_gram', true );
			$weight_twograms  = get_post_meta( $pid, '_twograms', true );
			$weight_eighth    = get_post_meta( $pid, '_eighth', true );
			$weight_fivegrams = get_post_meta( $pid, '_fivegrams', true );
			$weight_quarter   = get_post_meta( $pid, '_quarter', true );
			$weight_halfounce = get_post_meta( $pid, '_halfounce', true );
			$weight_ounce     = get_post_meta( $pid, '_ounce', true );

			// Heavyweight prices.
			$weight_twoounces        = get_post_meta( $pid, '_twoounces', true );
			$weight_quarterpound     = get_post_meta( $pid, '_quarterpound', true );
			$weight_halfpound        = get_post_meta( $pid, '_halfpound', true );
			$weight_onepound         = get_post_meta( $pid, '_onepound', true );
			$weight_twopounds        = get_post_meta( $pid, '_twopounds', true );
			$weight_threepounds      = get_post_meta( $pid, '_threepounds', true );
			$weight_fourpounds       = get_post_meta( $pid, '_fourpounds', true );
			$weight_fivepounds       = get_post_meta( $pid, '_fivepounds', true );
			$weight_sixpounds        = get_post_meta( $pid, '_sixpounds', true );
			$weight_sevenpounds      = get_post_meta( $pid, '_sevenpounds', true );
			$weight_eightpounds      = get_post_meta( $pid, '_eightpounds', true );
			$weight_ninepounds       = get_post_meta( $pid, '_ninepounds', true );
			$weight_tenpounds        = get_post_meta( $pid, '_tenpounds', true );
			$weight_elevenpounds     = get_post_meta( $pid, '_elevenpounds', true );
			$weight_twelvepounds     = get_post_meta( $pid, '_twelvepounds', true );
			$weight_thirteenpounds   = get_post_meta( $pid, '_thirteenpounds', true );
			$weight_fourteenpounds   = get_post_meta( $pid, '_fourteenpounds', true );
			$weight_fifteenpounds    = get_post_meta( $pid, '_fifteenpounds', true );
			$weight_twentypounds     = get_post_meta( $pid, '_twentypounds', true );
			$weight_twentyfivepounds = get_post_meta( $pid, '_twentyfivepounds', true );
			$weight_fiftypounds      = get_post_meta( $pid, '_fiftypounds', true );

			// Set Flower weight meta key.
			if ( ! empty( $_POST['wpd_ecommerce_flowers_prices'] ) ) {
				if ( $weight_gram === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_gram';
				} elseif ( $weight_twograms === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_twograms';
				} elseif ( $weight_eighth === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_eighth';
				} elseif ( $weight_fivegrams === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_fivegrams';
				} elseif ( $weight_quarter === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_quarter';
				} elseif ( $weight_halfounce === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_halfounce';
				} elseif ( $weight_ounce === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_ounce';
				} elseif ( $weight_twoounces === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_twoounces';
				} elseif ( $weight_quarterpound === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_quarterpound';
				} elseif ( $weight_halfpound === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_halfpound';
				} elseif ( $weight_onepound === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_onepound';
				} elseif ( $weight_twopounds === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_twopounds';
				} elseif ( $weight_threepounds === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_threepounds';
				} elseif ( $weight_fourpounds === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_fourpounds';
				} elseif ( $weight_fivepounds === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_fivepounds';
				} elseif ( $weight_sixpounds === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_sixpounds';
				} elseif ( $weight_sevenpounds === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_sevenpounds';
				} elseif ( $weight_eightpounds === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_eightpounds';
				} elseif ( $weight_ninepounds === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_ninepounds';
				} elseif ( $weight_tenpounds === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_tenpounds';
				} elseif ( $weight_elevenpounds === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_elevenpounds';
				} elseif ( $weight_twelvepounds === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_twelvepounds';
				} elseif ( $weight_thirteenpounds === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_thirteenpounds';
				} elseif ( $weight_fourteenpounds === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_fourteenpounds';
				} elseif ( $weight_fifteenpounds === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_fifteenpounds';
				} elseif ( $weight_twentypounds === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_twentypounds';
				} elseif ( $weight_twentyfivepounds === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_twentyfivepounds';
				} elseif ( $weight_fiftypounds === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_fiftypounds';
				} else {
					$wpd_flower_meta_key = '';
				}
			} else {
				// Do nothing.
			}
			?>
		<?php } elseif ( 'concentrates' === get_post_type( $pid )) 
		
		{ ?>
			<?php
			
			

			// Price each (not a weight based price).
			$price_each = get_post_meta( $pid, '_priceeach', true );

			// If price_each is empty.
			if ( '' === $price_each ) {
				// Select a weight.
				$html .=( '<select name="wpd_ecommerce_concentrates_prices" id="wpd_ecommerce_concentrates_prices" class="widefat">' );
				$html .=( '<option value="" disabled selected>Choose a weight</option>' );
				foreach ( $regular_price as $name => $price ) {
					if ( '' != $price ) {
						$html .=( '<option value="'. esc_html( $price ) . '">' . CURRENCY . esc_html( $price ) . ' - ' . esc_html( $name ) . '</option>' );
					}
				}
				$html .=( '</select>' );

				$weight_halfgram   = get_post_meta( $pid, '_halfgram', true );
				$weight_gram       = get_post_meta( $pid, '_gram', true );
				$weight_twograms   = get_post_meta( $pid, '_twograms', true );
				$weight_threegrams = get_post_meta( $pid, '_threegrams', true );
				$weight_fourgrams  = get_post_meta( $pid, '_fourgrams', true );
				$weight_fivegrams  = get_post_meta( $pid, '_fivegrams', true );
				$weight_sixgrams   = get_post_meta( $pid, '_sixgrams', true );
				$weight_sevengrams = get_post_meta( $pid, '_sevengrams', true );
				$weight_eightgrams = get_post_meta( $pid, '_eightgrams', true );
				$weight_ninegrams  = get_post_meta( $pid, '_ninegrams', true );
				$weight_tengrams   = get_post_meta( $pid, '_tengrams', true );

				if ( ! empty( $_POST['wpd_ecommerce_concentrates_prices'] ) ) {
					if ( $weight_halfgram === $_POST['wpd_ecommerce_concentrates_prices'] ) {
						$wpd_concentrate_meta_key = '_halfgram';
					} elseif ( $weight_gram === $_POST['wpd_ecommerce_concentrates_prices'] ) {
						$wpd_concentrate_meta_key = '_gram';
					} elseif ( $weight_twograms === $_POST['wpd_ecommerce_concentrates_prices'] ) {
						$wpd_concentrate_meta_key = '_twograms';
					} elseif ( $weight_threegrams === $_POST['wpd_ecommerce_concentrates_prices'] ) {
						$wpd_concentrate_meta_key = '_threegrams';
					} elseif ( $weight_fourgrams === $_POST['wpd_ecommerce_concentrates_prices'] ) {
						$wpd_concentrate_meta_key = '_fourgrams';
					} elseif ( $weight_fivegrams === $_POST['wpd_ecommerce_concentrates_prices'] ) {
						$wpd_concentrate_meta_key = '_fivegrams';
					} elseif ( $weight_sixgrams === $_POST['wpd_ecommerce_concentrates_prices'] ) {
						$wpd_concentrate_meta_key = '_sixgrams';
					} elseif ( $weight_sevengrams === $_POST['wpd_ecommerce_concentrates_prices'] ) {
						$wpd_concentrate_meta_key = '_sevengrams';
					} elseif ( $weight_eightgrams === $_POST['wpd_ecommerce_concentrates_prices'] ) {
						$wpd_concentrate_meta_key = '_eightgrams';
					} elseif ( $weight_ninegrams === $_POST['wpd_ecommerce_concentrates_prices'] ) {
						$wpd_concentrate_meta_key = '_ninegrams';
					} elseif ( $weight_tengrams === $_POST['wpd_ecommerce_concentrates_prices'] ) {
						$wpd_concentrate_meta_key = '_tengrams';
					} else {
						$wpd_concentrate_meta_key = '';
					}
				} else {
					// Do nothing.
				}
			} else {
				// Do nothing.
			}
			?>
		<?php } else {
			if ( ! empty( $pack_price ) ) {
				// Select a quantity.
				$html .=( '<select name="wpd_ecommerce_product_prices" id="wpd_ecommerce_product_prices" class="widefat">' );
				$html .=( '<option value="" disabled selected>' . __( 'Choose a quantity', 'wpd-ecommerce' ) . '</option>' );
				$html .=( '<option value="'. esc_html( $regular_price ) . '">' . CURRENCY . esc_html( $regular_price ) . ' - ' . __( 'each', 'wpd-ecommerce' ) . '</option>' );
				$html .=( '<option value="'. esc_html( $pack_price ) . '">' . CURRENCY . esc_html( $pack_price ) . ' - ' . esc_html( $pack_units ) . ' ' . __( 'pack', 'wpd-ecommerce' ) . '</option>' );
				$html .=( '</select>' );

				$price_each     = get_post_meta( $pid, '_priceeach', true );
				$price_topical  = get_post_meta( $pid, '_pricetopical', true );
				$price_per_pack = get_post_meta( $pid, '_priceperpack', true );

				if ( ! empty( $_POST['wpd_ecommerce_product_prices'] ) ) {
					if ( $price_each === $_POST['wpd_ecommerce_product_prices'] ) {
						$wpd_product_meta_key = '_priceeach';
					} elseif ( $price_topical === $_POST['wpd_ecommerce_product_prices'] ) {
						$wpd_product_meta_key = '_pricetopical';
					} elseif ( $price_per_pack === $_POST['wpd_ecommerce_product_prices'] ) {
						$wpd_product_meta_key = '_priceperpack';
					} else {
						$wpd_product_meta_key = '_priceeach';
					}
				}
			} else {
				// Do nothing.
			}
		} ?>

	<?php } ?>

	<?php

	global $post;
	/**
	 * Add Items to Cart
	 */

	if ( get_post_type( $pid ) == 'flowers' && isset( $_POST['qtty'] ) && ! empty( $_POST['qtty'] ) && isset( $_POST['add_me'] ) && isset( $_POST['wpd_ecommerce_flowers_prices'] ) ) {
		$qtty = $_POST['qtty'];



		/**
		 * ID's
		 */
		$old_id = $pid;
		$new_id = $pid . $wpd_flower_meta_key;

		/**
		 * Prices 
		 */
		 $new_price = $_POST['wpd_ecommerce_flowers_prices'];   
		$old_price = get_post_meta( $old_id, $new_price, true );   

		// Get inventory.
		$inventory = get_post_meta( $old_id, '_inventory_flowers',  TRUE);

		// Quantity X weight amount.
		$inventory_reduction = get_option( 'wpd_ecommerce_weight_flowers' . $wpd_flower_meta_key ) * $qtty;

		if ( $inventory < $inventory_reduction ) {
			// Do nothing.
		} else {
			// Add items to cart.
			
			///echo $new_id.'  ==new_id== '.$qtty.' ==$qtty== '.$old_id.' ==$old_id== '.$new_price.' ==$new_price== '.$old_price;
			
			wpd_ecommerce_add_items_to_cart( $new_id, $qtty, $old_id, $new_price, $old_price );
		}

	} elseif ( get_post_type( $pid ) == 'concentrates'  && isset( $_POST['qtty'] ) && ! empty( $_POST['qtty'] ) && isset( $_POST['add_me'] ) && isset( $_POST['wpd_ecommerce_concentrates_prices'] ) ) {
		$qtty = $_POST['qtty'];

		/**
		 * ID's
		 */
		$old_id = $pid;
		$new_id = $pid . $wpd_concentrate_meta_key;

		/**
		 * Prices
		 */
		$new_price = $_POST['wpd_ecommerce_concentrates_prices'];
		$old_price = get_post_meta( $old_id, $new_price, true );

		// Get inventory.
		$inventory = get_post_meta( $old_id, '_inventory_concentrates',  TRUE );

		// Quantity X weight amount.
		$inventory_reduction = get_option( 'wpd_ecommerce_weight_concentrates' . $wpd_concentrate_meta_key ) * $qtty;

		if ( $inventory < $inventory_reduction ) {
			// Do nothing.
		} else {
			// Add items to cart.
		//	echo $new_id.'  ==new_id== '.$qtty.' ==$qtty== '.$old_id.' ==$old_id== '.$new_price.' ==$new_price== '.$old_price;
			wpd_ecommerce_add_items_to_cart( $new_id, $qtty, $old_id, $new_price, $old_price );
		}

	} elseif ( in_array(get_post_type( $pid ), array( 'edibles', 'prerolls', 'topicals', 'growers', 'gear', 'tinctures' ) ) && isset( $_POST['qtty'] ) && ! empty( $_POST['qtty'] ) && isset( $_POST['add_me'] ) && isset( $_POST['wpd_ecommerce_product_prices'] ) ) {
		$qtty = $_POST['qtty']; 

		// Prices.
		$price_each     = get_post_meta( $pid, '_priceeach', true );
		$price_topical  = get_post_meta( $pid, '_pricetopical', true );
		$price_per_pack = get_post_meta( $pid, '_priceperpack', true );
		$units_per_pack = get_post_meta( $pid, '_unitsperpack', true );

		if ( $price_each === $_POST['wpd_ecommerce_product_prices'] ) {
			$wpd_product_meta_key = '_priceeach';
		} elseif ( $price_topical === $_POST['wpd_ecommerce_product_prices'] ) {
			$wpd_product_meta_key = '_pricetopical';
		} elseif ( $price_per_pack === $_POST['wpd_ecommerce_product_prices'] ) {
			$wpd_product_meta_key = '_priceperpack';
		} else {
			$wpd_product_meta_key = '_priceeach';
		}

		/**
		 * ID's
		 */
		$old_id = $pid;
		$new_id = $old_id . $wpd_product_meta_key;

		/**
		 * Prices
		 */
		$new_price = $_POST['wpd_ecommerce_product_prices'];
		$old_price = get_post_meta( $old_id, $wpd_product_meta_key, true );

		// Get post type name.
		$post_type = get_post_type( $old_id );

		// Set inventory variable.
		if ( 'growers' === $post_type ) {
			if ( get_post_meta( $old_id, '_inventory_seeds', TRUE ) ) {
				// Get inventory.
				$inventory = get_post_meta( $old_id, '_inventory_seeds', TRUE );
			} else {
				// Get inventory.
				$inventory = get_post_meta( $old_id, '_inventory_clones', TRUE );
			}
		} else {
			// Get inventory.
			$inventory = get_post_meta( $old_id, '_inventory_' . $post_type,  TRUE );
		}

		// Set inventory reduction number.
		if ( '_priceperpack' === $wpd_product_meta_key ) {
			// Quantity X unit amount.
			$inventory_reduction = $qtty * $units_per_pack;
		} else {
			$inventory_reduction = $qtty;
		}

		if ( $inventory < $inventory_reduction ) {
			// Do nothing.
		} else {
			// Add items to cart.
			wpd_ecommerce_add_items_to_cart( $new_id, $qtty, $old_id, $new_price, $old_price );
		}

	} elseif ( isset( $_POST['qtty'] ) && ! empty( $_POST['qtty'] ) && isset( $_POST['add_me'] ) ) {
		$qtty = $_POST['qtty'];

		// ID.
		$old_id = $pid;

		// Setup ID if SOMETHING is not done.
		// This is where the check for adding to cart should come into play.
		if ( empty( $new_id ) ) {
			if ( 'topicals' === get_post_type() ) {
				$new_id = $pid . '_pricetopical';
			} else {
				$new_id = $pid . '_priceeach';
			}
		} else {
			$new_id = $pid . $wpd_product_meta_key;
		}

		// Pricing.
		if ( isset( $_POST['wpd_ecommerce_product_prices'] ) ) {
			$new_price = $_POST['wpd_ecommerce_product_prices'];
		} else {
			$new_price = NULL;
		}
		if ( isset( $_POST['wpd_ecommerce_concentrates_prices'] ) ) {
			$concentrates_prices = $_POST['wpd_ecommerce_concentrates_prices'];
		} else {
			$concentrates_prices = NULL;
		}

		if ( empty( $new_price ) ) {
			if ( 'topicals' === get_post_type($pid) ) {

				// Get post type name.
				$post_type = get_post_type( $old_id );

				$old_price    = get_post_meta( $old_id, '_pricetopical', true );
				$single_price = get_post_meta( $old_id, '_pricetopical', true );
				$pack_price   = get_post_meta( $old_id, '_priceperpack', true );

				// Get inventory.
				$inventory = get_post_meta( $old_id, '_inventory_' . $post_type,  TRUE);

				// Quantity X weight amount.
				$inventory_reduction = $qtty;

				if ( $inventory < $inventory_reduction ) {
					// Do nothing.
				} else {
					// Add items to cart.
					if ( '' !== $single_price && NULL == $pack_price && NULL == $new_price ) {
						wpd_ecommerce_add_items_to_cart( $new_id, $qtty, $old_id, $new_price, $old_price );
					}
				}
			} elseif ( in_array(get_post_type($pid), array( 'concentrates', 'edibles', 'prerolls', 'topicals', 'growers', 'gear', 'tinctures' ) ) ) {

				// Get post type name.
				$post_type = get_post_type( $old_id );

				$price_each     = get_post_meta( $pid, '_priceeach', true );
				$price_topical  = get_post_meta( $pid, '_pricetopical', true );
				$price_per_pack = get_post_meta( $pid, '_priceperpack', true );

				if ( ! empty( $_POST['wpd_ecommerce_product_prices'] ) ) {
					if ( $price_each === $_POST['wpd_ecommerce_product_prices'] ) {
						$wpd_product_meta_key = '_priceeach';
					} elseif ( $price_topical === $_POST['wpd_ecommerce_product_prices'] ) {
						$wpd_product_meta_key = '_pricetopical';
					} elseif ( $price_per_pack === $_POST['wpd_ecommerce_product_prices'] ) {
						$wpd_product_meta_key = '_priceperpack';
					} else {
						$wpd_product_meta_key = '_priceeach';
					}
				} else {
					$wpd_product_meta_key = '_priceeach';
				}

				$old_price    = get_post_meta( $old_id, $wpd_product_meta_key, true );
				$single_price = get_post_meta( $old_id, '_priceeach', true );
				$pack_price   = get_post_meta( $old_id, '_priceperpack', true );

				// Set inventory variable.
				if ( 'growers' === $post_type ) {
					if ( get_post_meta( $old_id, '_inventory_seeds', TRUE ) ) {
						// Get inventory.
						$inventory = get_post_meta( $old_id, '_inventory_seeds', TRUE );
					} else {
						// Get inventory.
						$inventory = get_post_meta( $old_id, '_inventory_clones', TRUE );
					}
				} else {
					// Get inventory.
					$inventory = get_post_meta( $old_id, '_inventory_' . $post_type,  TRUE );
				}

				if ( 'concentrates' === $post_type ) {
					if ( get_post_meta( $old_id, '_inventory_concentrates_each', TRUE ) ) {
						// Get inventory.
						$inventory = get_post_meta( $old_id, '_inventory_concentrates_each', TRUE );
					}
				}

				// Quantity.
				$inventory_reduction = $qtty;

				if ( $inventory < $inventory_reduction ) {
					// Do nothing.
				} else {
					// Add items to cart.
					if ( '' !== $single_price && NULL == $pack_price && NULL == $new_price && NULL == $concentrates_prices ) {
						wpd_ecommerce_add_items_to_cart( $new_id, $qtty, $old_id, $new_price, $old_price );
					}
				}
			}
		} else {
			$old_price = get_post_meta( $old_id, $wpd_product_meta_key, true );
			// wpd_ecommerce_add_items_to_cart( $new_id, $qtty, $old_id, $new_price, $old_price );
		}

	} else {
		$qtty = 1;
	}
	
		$html .='<input type="text" name="qtty" id="qtty" value="1" class="item_Quantity" />
		<input type="submit" class="item_add" id="add_item_btn" value="'.__( 'Add to cart', 'wpd-ecommerce' ).'" name="add_me" />
	</fieldset>';
	} 
	$html .='</form>';
 
 
 
 wp_send_json(array('html'=>$html,'notification'=>$notification));
        
        exit();
    }



function wpd_ecommerce_notifications1($pid) {

	global $post;

	// Get WPD settings from General tab.
	$wpdas_general = get_option( 'wpdas_general' );

	// Require login to shop?
	$login_to_shop = NULL;

	// Check if user needs to be logged in to shop.
	if ( isset( $wpdas_general['wpd_ecommerce_cart_require_login_to_shop'] ) ) {
		$login_to_shop = $wpdas_general['wpd_ecommerce_cart_require_login_to_shop'];
	}

	// Begin data.
	$str = '';

	if ( in_array( get_post_type($pid), apply_filters( 'wpd_ecommerce_box_notifications_array', wpd_menu_types_simple( TRUE ) ) ) ) {

		// Check if cart widget is active.
		if ( ! is_active_widget( false, false, 'wpd_cart_widget', true ) ) {
			$view_cart_button = '<a href="' . wpd_ecommerce_cart_url() . '" class="button">' . __( 'View Cart', 'wpd-ecommerce' ) . '</a>';
		} else {
			$view_cart_button = '';
		}

		// Please select a weight notification for flowers.
		if (get_post_type($pid) == 'flowers' && isset( $_POST['add_me'] ) && ! isset( $_POST['wpd_ecommerce_flowers_prices'] ) ) {
			// Begin wrapper around notifications.
			$str .= '<div class="wpd-ecommerce-single-notifications">';
			$str .= '<div class="wpd-ecommerce-notifications failed">' . __( 'Please select a weight in order to add the product to your cart', 'wpd-ecommerce' ) . '</div>';
			$str .= '</div>';
		}

		// Please select a weight notification for concentrates.
		if (get_post_type($pid) == 'concentrates'  && isset( $_POST['add_me'] ) && ! get_post_meta( $pid, '_priceeach', TRUE ) && ! isset( $_POST['wpd_ecommerce_concentrates_prices'] ) ) {
			// Begin wrapper around notifications.
			$str .= '<div class="wpd-ecommerce-single-notifications">';
			$str .= '<div class="wpd-ecommerce-notifications failed">' . __( 'Please select a weight in order to add the product to your cart', 'wpd-ecommerce' ) . '</div>';
			$str .= '</div>';
		}

		// Please select a quantity notification for edibles.
		if (get_post_type($pid) == 'edibles'  && isset( $_POST['add_me'] ) && get_post_meta( $pid, '_priceperpack', TRUE ) && ! isset( $_POST['wpd_ecommerce_product_prices'] ) ) {
			// Begin wrapper around notifications.
			$str .= '<div class="wpd-ecommerce-single-notifications">';
			$str .= '<div class="wpd-ecommerce-notifications failed">' . __( 'Please select a quantity in order to add the product to your cart', 'wpd-ecommerce' ) . '</div>';
			$str .= '</div>';
		}

		// Please select a quantity notification for prerolls.
		if (get_post_type($pid) == 'prerolls'  && isset( $_POST['add_me'] ) && get_post_meta( $pid, '_priceperpack', TRUE ) && ! isset( $_POST['wpd_ecommerce_product_prices'] ) ) {
			// Begin wrapper around notifications.
			$str .= '<div class="wpd-ecommerce-single-notifications">';
			$str .= '<div class="wpd-ecommerce-notifications failed">' . __( 'Please select a quantity in order to add the product to your cart', 'wpd-ecommerce' ) . '</div>';
			$str .= '</div>';
		}

		// Please select a quantity notification for topicals.
		if (get_post_type($pid) == 'topicals'  && isset( $_POST['add_me'] ) && get_post_meta( $pid, '_priceperpack', TRUE ) && ! isset( $_POST['wpd_ecommerce_product_prices'] ) ) {
			// Begin wrapper around notifications.
			$str .= '<div class="wpd-ecommerce-single-notifications">';
			$str .= '<div class="wpd-ecommerce-notifications failed">' . __( 'Please select a quantity in order to add the product to your cart', 'wpd-ecommerce' ) . '</div>';
			$str .= '</div>';
		}

		// Please select a quantity notification for growers.
		if (get_post_type($pid) == 'growers'  && isset( $_POST['add_me'] ) && get_post_meta( $pid, '_priceperpack', TRUE ) && ! isset( $_POST['wpd_ecommerce_product_prices'] ) ) {
			// Begin wrapper around notifications.
			$str .= '<div class="wpd-ecommerce-single-notifications">';
			$str .= '<div class="wpd-ecommerce-notifications failed">' . __( 'Please select a quantity in order to add the product to your cart', 'wpd-ecommerce' ) . '</div>';
			$str .= '</div>';
		}

		// Please select a quantity notification for gear.
		if ( get_post_type($pid) == 'gear'  && isset( $_POST['add_me'] ) && get_post_meta( $pid, '_priceperpack', TRUE ) && ! isset( $_POST['wpd_ecommerce_product_prices'] ) ) {
			// Begin wrapper around notifications.
			$str .= '<div class="wpd-ecommerce-single-notifications">';
			$str .= '<div class="wpd-ecommerce-notifications failed">' . __( 'Please select a quantity in order to add the product to your cart', 'wpd-ecommerce' ) . '</div>';
			$str .= '</div>';
		}

		// Please select a quantity notification for tinctures.
		if (get_post_type($pid) == 'tinctures' && isset( $_POST['add_me'] ) && get_post_meta( $pid, '_priceperpack', TRUE ) && ! isset( $_POST['wpd_ecommerce_product_prices'] ) ) {
			// Begin wrapper around notifications.
			$str .= '<div class="wpd-ecommerce-single-notifications">';
			$str .= '<div class="wpd-ecommerce-notifications failed">' . __( 'Please select a quantity in order to add the product to your cart', 'wpd-ecommerce' ) . '</div>';
			$str .= '</div>';
		}

		// Successfully added item to cart.
		if (get_post_type($pid) == 'flowers'  && isset( $_POST['qtty'] ) && ! empty( $_POST['qtty'] ) && isset( $_POST['add_me'] ) && isset( $_POST['wpd_ecommerce_flowers_prices'] ) ) {

			$qtty = $_POST['qtty'];

			// Flower prices.
			$weight_gram      = get_post_meta( $pid, '_gram', true );
			$weight_twograms  = get_post_meta( $pid, '_twograms', true );
			$weight_eighth    = get_post_meta( $pid, '_eighth', true );
			$weight_fivegrams = get_post_meta( $pid, '_fivegrams', true );
			$weight_quarter   = get_post_meta( $pid, '_quarter', true );
			$weight_halfounce = get_post_meta( $pid, '_halfounce', true );
			$weight_ounce     = get_post_meta( $pid, '_ounce', true );

			// Heavyweight prices.
			$weight_twoounces        = get_post_meta( $pid, '_twoounces', true );
			$weight_quarterpound     = get_post_meta( $pid, '_quarterpound', true );
			$weight_halfpound        = get_post_meta( $pid, '_halfpound', true );
			$weight_onepound         = get_post_meta( $pid, '_onepound', true );
			$weight_twopounds        = get_post_meta( $pid, '_twopounds', true );
			$weight_threepounds      = get_post_meta( $pid, '_threepounds', true );
			$weight_fourpounds       = get_post_meta( $pid, '_fourpounds', true );
			$weight_fivepounds       = get_post_meta( $pid, '_fivepounds', true );
			$weight_sixpounds        = get_post_meta( $pid, '_sixpounds', true );
			$weight_sevenpounds      = get_post_meta( $pid, '_sevenpounds', true );
			$weight_eightpounds      = get_post_meta( $pid, '_eightpounds', true );
			$weight_ninepounds       = get_post_meta( $pid, '_ninepounds', true );
			$weight_tenpounds        = get_post_meta( $pid, '_tenpounds', true );
			$weight_elevenpounds     = get_post_meta( $pid, '_elevenpounds', true );
			$weight_twelvepounds     = get_post_meta( $pid, '_twelvepounds', true );
			$weight_thirteenpounds   = get_post_meta( $pid, '_thirteenpounds', true );
			$weight_fourteenpounds   = get_post_meta( $pid, '_fourteenpounds', true );
			$weight_fifteenpounds    = get_post_meta( $pid, '_fifteenpounds', true );
			$weight_twentypounds     = get_post_meta( $pid, '_twentypounds', true );
			$weight_twentyfivepounds = get_post_meta( $pid, '_twentyfivepounds', true );
			$weight_fiftypounds      = get_post_meta( $pid, '_fiftypounds', true );

			// Set Flower weight meta key.
			if ( ! empty( $_POST['wpd_ecommerce_flowers_prices'] ) ) {
				if ( $weight_gram === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_gram';
				} elseif ( $weight_twograms === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_twograms';
				} elseif ( $weight_eighth === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_eighth';
				} elseif ( $weight_fivegrams === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_fivegrams';
				} elseif ( $weight_quarter === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_quarter';
				} elseif ( $weight_halfounce === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_halfounce';
				} elseif ( $weight_ounce === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_ounce';
				} elseif ( $weight_twoounces === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_twoounces';
				} elseif ( $weight_quarterpound === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_quarterpound';
				} elseif ( $weight_halfpound === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_halfpound';
				} elseif ( $weight_onepound === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_onepound';
				} elseif ( $weight_twopounds === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_twopounds';
				} elseif ( $weight_threepounds === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_threepounds';
				} elseif ( $weight_fourpounds === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_fourpounds';
				} elseif ( $weight_fivepounds === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_fivepounds';
				} elseif ( $weight_sixpounds === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_sixpounds';
				} elseif ( $weight_sevenpounds === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_sevenpounds';
				} elseif ( $weight_eightpounds === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_eightpounds';
				} elseif ( $weight_ninepounds === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_ninepounds';
				} elseif ( $weight_tenpounds === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_tenpounds';
				} elseif ( $weight_elevenpounds === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_elevenpounds';
				} elseif ( $weight_twelvepounds === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_twelvepounds';
				} elseif ( $weight_thirteenpounds === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_thirteenpounds';
				} elseif ( $weight_fourteenpounds === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_fourteenpounds';
				} elseif ( $weight_fifteenpounds === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_fifteenpounds';
				} elseif ( $weight_twentypounds === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_twentypounds';
				} elseif ( $weight_twentyfivepounds === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_twentyfiveepounds';
				} elseif ( $weight_fiftypounds === $_POST['wpd_ecommerce_flowers_prices'] ) {
					$wpd_flower_meta_key = '_fiftypounds';
				} else {
					$wpd_flower_meta_key = '';
				}
			}

			// Get inventory.
			$inventory = get_post_meta( $pid, '_inventory_flowers',  TRUE );

			// Quantity X weight amount.
			$inventory_reduction = get_option( 'wpd_ecommerce_weight_flowers' . $wpd_flower_meta_key ) * $qtty;

			if ( $inventory < $inventory_reduction ) {
				// Begin wrapper around notifications.
				$str .= '<div class="wpd-ecommerce-single-notifications">';
				$str .= '<div class="wpd-ecommerce-notifications failed">' . __( 'There is not enough available inventory for your purchase. Available inventory', 'wpd-ecommerce' ) . ': ' . $inventory . ' grams</div>';
				$str .= '</div>';
			} else {
				// Begin wrapper around notifications.
				$str .= '<div class="wpd-ecommerce-single-notifications">';
				$str .= '<div class="wpd-ecommerce-notifications success">' . __( 'This product has been successfully added to your cart', 'wpd-ecommerce' ) . ' ' . $view_cart_button . '</div>';
				$str .= '</div>';
			}
		} elseif ( get_post_type($pid) == 'concentrates'  && isset( $_POST['qtty'] ) && ! empty( $_POST['qtty'] ) && isset( $_POST['add_me'] ) && isset( $_POST['wpd_ecommerce_concentrates_prices'] ) ) {

			$qtty = $_POST['qtty'];

			// Price each (not a weight based price).
			$price_each = get_post_meta( $pid, '_priceeach', true );

			// If price_each is empty.
			if ( '' === $price_each ) {

				$weight_halfgram   = get_post_meta( $pid, '_halfgram', true );
				$weight_gram       = get_post_meta( $pid, '_gram', true );
				$weight_twograms   = get_post_meta( $pid, '_twograms', true );
				$weight_threegrams = get_post_meta( $pid, '_threegrams', true );
				$weight_fourgrams  = get_post_meta( $pid, '_fourgrams', true );
				$weight_fivegrams  = get_post_meta( $pid, '_fivegrams', true );
				$weight_sixgrams   = get_post_meta( $pid, '_sixgrams', true );
				$weight_sevengrams = get_post_meta( $pid, '_sevengrams', true );
				$weight_eightgrams = get_post_meta( $pid, '_eightgrams', true );
				$weight_ninegrams  = get_post_meta( $pid, '_ninegrams', true );
				$weight_tengrams   = get_post_meta( $pid, '_tengrams', true );

				if ( ! empty( $_POST['wpd_ecommerce_concentrates_prices'] ) ) {
					if ( $weight_halfgram === $_POST['wpd_ecommerce_concentrates_prices'] ) {
						$wpd_concentrate_meta_key = '_halfgram';
					} elseif ( $weight_gram === $_POST['wpd_ecommerce_concentrates_prices'] ) {
						$wpd_concentrate_meta_key = '_gram';
					} elseif ( $weight_twograms === $_POST['wpd_ecommerce_concentrates_prices'] ) {
						$wpd_concentrate_meta_key = '_twograms';
					} elseif ( $weight_threegrams === $_POST['wpd_ecommerce_concentrates_prices'] ) {
						$wpd_concentrate_meta_key = '_threegrams';
					} elseif ( $weight_fourgrams === $_POST['wpd_ecommerce_concentrates_prices'] ) {
						$wpd_concentrate_meta_key = '_fourgrams';
					} elseif ( $weight_fivegrams === $_POST['wpd_ecommerce_concentrates_prices'] ) {
						$wpd_concentrate_meta_key = '_fivegrams';
					} elseif ( $weight_sixgrams === $_POST['wpd_ecommerce_concentrates_prices'] ) {
						$wpd_concentrate_meta_key = '_sixgrams';
					} elseif ( $weight_sevengrams === $_POST['wpd_ecommerce_concentrates_prices'] ) {
						$wpd_concentrate_meta_key = '_sevengrams';
					} elseif ( $weight_eightgrams === $_POST['wpd_ecommerce_concentrates_prices'] ) {
						$wpd_concentrate_meta_key = '_eightgrams';
					} elseif ( $weight_ninegrams === $_POST['wpd_ecommerce_concentrates_prices'] ) {
						$wpd_concentrate_meta_key = '_ninegrams';
					} elseif ( $weight_tengrams === $_POST['wpd_ecommerce_concentrates_prices'] ) {
						$wpd_concentrate_meta_key = '_tengrams';
					} else {
						$wpd_concentrate_meta_key = '';
					}
				} else {
					// Do nothing.
				}
				// Get inventory.
				$inventory = get_post_meta( $pid, '_inventory_concentrates',  TRUE );

				// Quantity X weight amount.
				$inventory_reduction = get_option( 'wpd_ecommerce_weight_concentrates' . $wpd_concentrate_meta_key ) * $qtty;
			} else {
				// Do nothing.
			}

			// Display message for concentrates.
			if ( $inventory < $inventory_reduction ) {
				// Begin wrapper around notifications.
				$str .= '<div class="wpd-ecommerce-single-notifications">';
				$str .= '<div class="wpd-ecommerce-notifications failed">' . __( 'There is not enough available inventory for your purchase. Available inventory', 'wpd-ecommerce' ) . ': ' . $inventory . ' grams</div>';
				$str .= '</div>';
			} else {
				// Begin wrapper around notifications.
				$str .= '<div class="wpd-ecommerce-single-notifications">';
				$str .= '<div class="wpd-ecommerce-notifications success">' . __( 'This product has been successfully added to your cart', 'wpd-ecommerce' ) . ' ' . $view_cart_button . '</div>';
				$str .= '</div>';
			}
		} elseif ( in_array(get_post_type($pid), array( 'edibles', 'prerolls', 'topicals', 'growers', 'gear', 'tinctures' ) ) && isset( $_POST['qtty'] ) && ! empty( $_POST['qtty'] ) && isset( $_POST['add_me'] ) && isset( $_POST['wpd_ecommerce_product_prices'] ) ) {

			$qtty = $_POST['qtty'];

			// ID.
			$old_id = $pid;

			$price_each     = get_post_meta( $pid, '_priceeach', true );
			$price_topical  = get_post_meta( $pid, '_pricetopical', true );
			$price_per_pack = get_post_meta( $pid, '_priceperpack', true );
			$units_per_pack = get_post_meta( $pid, '_unitsperpack', true );

			if ( $price_each === $_POST['wpd_ecommerce_product_prices'] ) {
				$wpd_product_meta_key = '1';
			} elseif ( $price_topical === $_POST['wpd_ecommerce_product_prices'] ) {
				$wpd_product_meta_key = '1';
			} elseif ( $price_per_pack === $_POST['wpd_ecommerce_product_prices'] ) {
				$wpd_product_meta_key = $units_per_pack;
			} else {
				$wpd_product_meta_key = '1';
			}

			// Get post type name.
			$post_type = get_post_type( $pid );

			if ( 'growers' === $post_type ) {
				if ( get_post_meta( $old_id, '_inventory_seeds', TRUE ) ) {
					// Get inventory.
					$inventory = get_post_meta( $old_id, '_inventory_seeds', TRUE );
				} else {
					// Get inventory.
					$inventory = get_post_meta( $old_id, '_inventory_clones', TRUE );
				}
			} else {
				// Get inventory.
				$inventory = get_post_meta( $old_id, '_inventory_' . $post_type, TRUE );
			}

			// Quantity X weight amount.
			$inventory_reduction = $qtty * $wpd_product_meta_key;

			if ( $inventory < $inventory_reduction ) {
				// Begin wrapper around notifications.
				$str .= '<div class="wpd-ecommerce-single-notifications">';
				$str .= '<div class="wpd-ecommerce-notifications failed">' . __( 'There is not enough available inventory for your purchase. Available inventory', 'wpd-ecommerce' ) . ': ' . $inventory . ' units</div>';
				$str .= '</div>';
			} else {
				// Begin wrapper around notifications.
				$str .= '<div class="wpd-ecommerce-single-notifications">';
				$str .= '<div class="wpd-ecommerce-notifications success">' . __( 'This product has been successfully added to your cart', 'wpd-ecommerce' ) . ' ' . $view_cart_button . '</div>';
				$str .= '</div>';
			}
		} elseif ( isset( $_POST['qtty'] ) && ! empty( $_POST['qtty'] ) && isset( $_POST['add_me'] ) ) {
			// ID.
			$old_id = $pid;

			// Setup ID if SOMETHING is not done.
			// This is where the check for adding to cart should come into play.
			if ( empty( $new_id ) ) {
				if ( 'topicals' === get_post_type() ) {
					$new_id = $pid . '_pricetopical';
				} else {
					$new_id = $pid . '_priceeach';
				}
			} else {
				$new_id = $pid . $wpd_product_meta_key;
			}

			// Pricing.
			if ( isset( $_POST['wpd_ecommerce_product_prices'] ) ) {
				$new_price = $_POST['wpd_ecommerce_product_prices'];
			} else {
				$new_price = NULL;
			}
			if ( isset( $_POST['wpd_ecommerce_concentrates_prices'] ) ) {
				$concentrates_prices = $_POST['wpd_ecommerce_concentrates_prices'];
			} else {
				$concentrates_prices = NULL;
			}

			if ( empty( $new_price ) ) {
				$qtty = $_POST['qtty'];

				if ( 'topicals' === get_post_type($pid) ) {
					$old_price    = get_post_meta( $old_id, '_pricetopical', true );
					$single_price = get_post_meta( $old_id, '_pricetopical', true );
					$pack_price   = get_post_meta( $old_id, '_priceperpack', true );

					// Get post type name.
					$post_type = get_post_type( $pid );

					// Get inventory.
					$inventory = get_post_meta( $old_id, '_inventory_' . $post_type,  TRUE);

					// Quantity X weight amount.
					$inventory_reduction = $qtty;

					if ( $inventory < $inventory_reduction ) {
						// Begin wrapper around notifications.
						$str .= '<div class="wpd-ecommerce-single-notifications">';
						$str .= '<div class="wpd-ecommerce-notifications failed">' . __( 'There is not enough available inventory for your purchase. Available inventory', 'wpd-ecommerce' ) . ': ' . $inventory . ' units</div>';
						$str .= '</div>';
					} else {
						if ( '' !== $single_price && NULL == $pack_price && NULL == $new_price ) {
							// Begin wrapper around notifications.
							$str .= '<div class="wpd-ecommerce-single-notifications">';
							$str .= '<div class="wpd-ecommerce-notifications success">' . __( 'This product has been successfully added to your cart', 'wpd-ecommerce' ) . ' ' . $view_cart_button . '</div>';
							$str .= '</div>';
						}
					}
				} elseif ( in_array(get_post_type($pid), array( 'concentrates', 'edibles', 'prerolls', 'topicals', 'growers', 'gear', 'tinctures' ) ) ) {
					$qtty = $_POST['qtty'];

					$single_price   = get_post_meta( $old_id, '_priceeach', true );
					$pack_price     = get_post_meta( $old_id, '_priceperpack', true );
					$units_per_pack = get_post_meta( $old_id, '_unitsperpack', true );

					// Get post type name.
					$post_type = get_post_type( $pid );

					if ( 'growers' === $post_type ) {
						if ( get_post_meta( $old_id, '_inventory_seeds', TRUE ) ) {
							// Get inventory.
							$inventory = get_post_meta( $old_id, '_inventory_seeds', TRUE );
						} else {
							// Get inventory.
							$inventory = get_post_meta( $old_id, '_inventory_clones', TRUE );
						}
					} else {
						// Get inventory.
						$inventory = get_post_meta( $old_id, '_inventory_' . $post_type,  TRUE );
					}

					if ( 'concentrates' === $post_type ) {
						if ( get_post_meta( $old_id, '_inventory_concentrates_each', TRUE ) ) {
							// Get inventory.
							$inventory = get_post_meta( $old_id, '_inventory_concentrates_each', TRUE );
						}
					}

					// Quantity X weight amount.
					$inventory_reduction = $qtty;

					if ( $inventory < $inventory_reduction ) {
						// Begin wrapper around notifications.
						$str .= '<div class="wpd-ecommerce-single-notifications">';
						$str .= '<div class="wpd-ecommerce-notifications failed">' . __( 'There is not enough available inventory for your purchase. Available inventory', 'wpd-ecommerce' ) . ': ' . $inventory . ' units</div>';
						$str .= '</div>';
					} else {
						if ( '' !== $single_price && NULL == $pack_price && NULL == $new_price && NULL == $concentrates_prices ) {
							// Begin wrapper around notifications.
							$str .= '<div class="wpd-ecommerce-single-notifications">';
							$str .= '<div class="wpd-ecommerce-notifications success">' . __( 'This product has been successfully added to your cart', 'wpd-ecommerce' ) . ' ' . $view_cart_button . '</div>';
							$str .= '</div>';
						}
					}
				}
			} else {
				$old_price = get_post_meta( $old_id, $wpd_product_meta_key, true );
				// wpd_ecommerce_add_items_to_cart( $new_id, $qtty, $old_id, $new_price, $old_price );
			}

		} else {
			// Do nothing.
		}

	}

	// Display failed login message.
	if ( ! empty( $_GET['login'] ) ) {
		if ( 'failed' === $_GET['login'] ) {
			$str .= '<div class="wpd-ecommerce-notifications failed"><strong>' . __( 'Error', 'wpd-ecommerce' ) . ':</strong> ' . __( 'The username or password you entered is incorrect.', 'wpd-ecommerce' ) . '</div>';
		}
	}

	// Display failed register message.
	if ( ! empty( $_GET['register'] ) ) {
		if ( 'failed' === $_GET['register'] ) {
			$str .= '<div class="wpd-ecommerce-notifications failed"><strong>' . __( 'Error', 'wpd-ecommerce' ) . ':</strong> ' . __( 'The registration info you entered is incorrect.', 'wpd-ecommerce' ) . '</div>';
		}
	}

	// Display order thank you message.
	if ( ! empty( $_GET['order'] ) ) {
		if ( 'thank-you' === $_GET['order'] ) {
			$str .= '<div class="wpd-ecommerce-notifications success"><strong>' . __( 'Thank You', 'wpd-ecommerce' ) . ':</strong> Your order #' . $pid . ' has been submitted.</div>';
		}
	}

	// Remove an item from the cart
	if ( ! empty( $_GET['remove_item'] ) ) {
		$_SESSION['wpd_ecommerce']->remove_item( $_GET['remove_item'] );
		$str .= '<div class="wpd-ecommerce-notifications success"><strong>' . __( 'Item removed', 'wpd-ecommerce' ) . ':</strong> ' . __( 'The item has been successfully removed.', 'wpd-ecommerce' ) .'</div>';
	}

	// Add an item to the cart
	if ( ! empty( $_GET['add_item'] ) ) {
		if ( empty( $_SESSION['wpd_ecommerce'] ) || ! isset( $_SESSION['wpd_ecommerce'] ) ):
			$c = new Cart;
			$c->add_item( $_GET['add_item'], 1, '', '', '' );
			$_SESSION['wpd_ecommerce'] = $c;
		else:
			$_SESSION['wpd_ecommerce']->add_item( $_GET['add_item'], 1, '', '', '' );
		endif;
		$str .= '<div class="wpd-ecommerce-single-notifications">';
		$str .= '<div class="wpd-ecommerce-notifications success"><strong>' . __( 'Item added', 'wpd-ecommerce' ) . ':</strong> ' . __( 'The item has been successfully added to your cart.', 'wpd-ecommerce' ) . '</div>';
		$str .= '</div>';
	}

	/**
	 * If a user clicks to clear the cart.
	 */
	if ( isset( $_GET['clear_cart'] ) ) {
		wpd_ecommerce_clear_cart();
	}

	/**
	 * Coupon Codes
	 * 
	 * If coupon code is added to the cart, do something specific.
	 * 
	 * @since 1.0
	 */
	if ( isset( $_POST['coupon_code'] ) && ! empty( $_POST['coupon_code'] ) && isset( $_POST['add_coupon'] ) ) {

		 // Loop through coupons.
		$coupons_args = array(
			'numberposts' => 1,
			'meta_key'    => 'wpd_coupon_code',
			'meta_value'  => $_POST['coupon_code'],
			'post_type'   => 'coupons'
		);
		$coupons_loop = get_posts( $coupons_args );

		//print_r( $coupons_loop );

		if ( 0 == count( $coupons_loop ) ) {
			$str = '<div class="wpd-ecommerce-notifications failed"><strong>' . __( 'Error', 'wpd-ecommerce' ) . ':</strong> Coupon code "' . $_POST['coupon_code'] . '" does not exist</div>';
		}

		foreach( $coupons_loop as $coupon ) : setup_postdata( $coupon );

		$coupon_code   = get_post_meta( $coupon->ID, 'wpd_coupon_code', TRUE );
		$coupon_amount = get_post_meta( $coupon->ID, 'wpd_coupon_amount', TRUE );
		$coupon_type   = get_post_meta( $coupon->ID, 'wpd_coupon_type', TRUE );
		$coupon_exp    = get_post_meta( $coupon->ID, 'wpd_coupon_exp', TRUE );

		// Add coupon to the cart.
		$_SESSION['wpd_ecommerce']->add_coupon( $coupon_code, $coupon_amount, $coupon_type, $coupon_exp );
		
		// Display success notification.
		echo '<div class="wpd-ecommerce-notifications success"><strong>' . __( 'Success', 'wpd-ecommerce' ) . ':</strong> ' . __( 'Coupon code has been applied', 'wpd-ecommerce' ) . '</div>';

		endforeach;
	}

	// Remove the coupon from cart.
	if ( ! empty( $_SESSION['wpd_ecommerce']->coupon_code ) ) {

		// Get the coupon code to remove.
		if ( ! empty( $_GET['remove_coupon'] ) ) {
			$remove_coupon = $_GET['remove_coupon'];
		} else {
			$remove_coupon = '';
		}

		// Remove the code from the cart and redirect back.
		if ( $_SESSION['wpd_ecommerce']->coupon_code === $remove_coupon ) {
			// Remove coupon.
			$_SESSION['wpd_ecommerce']->remove_coupon( $coupon_code, $coupon_amount, $coupon_type, $coupon_exp );
			// Redirect back.
			wp_redirect( get_the_permalink() );
		} else {
			// Do nothing.
		}
	} else {
		// Do nothing.
	}

	// If the coupon code form is submitted but no code was input.
	if ( isset( $_POST['coupon_code'] ) && empty( $_POST['coupon_code'] ) && isset( $_POST['add_coupon'] ) ) {
		$str = '<div class="wpd-ecommerce-notifications failed"><strong>' . __( 'Error', 'wpd-ecommerce' ) . ':</strong> ' . __( 'Please enter a coupon code', 'wpd-ecommerce' ) . '</div>';
	}

	return $str;
}