<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.wpdispensary.com
 * @since      1.0.0
 *
 * @package    WPD_Styles
 * @subpackage WPD_Styles/admin
 */

// Create custom featured image size for the widget.
if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'wpd-styles-list-image', 90, 50, true );
}

/** Function to add top stuff to the shortcodes */

function add_wpd_styles_list_categories() {

	global $post;

	// Categories
	if ( in_array( get_post_type(), array( 'flowers' ) ) ) {
		$terms_flowers = get_the_terms( $post->ID, 'flowers_category' );
		$first_term_flower = $terms_flowers[0];
		if ( '' != $first_term_flower ) {
			echo '<span class="wpd-styles-category">' . $first_term_flower->name . '</span>';
		} else {
			echo '<span class="wpd-styles-category">&nbsp;</span>';
		}
	}
	if ( in_array( get_post_type(), array( 'concentrates' ) ) ) {
		$terms_concentrates = get_the_terms( $post->ID, 'concentrates_category' );
		$first_term_concentrate = $terms_concentrates[0];
		if ( '' != $first_term_concentrate ) {
			echo '<span class="wpd-styles-category">' . $first_term_concentrate->name . '</span>';
		} else {
			echo '<span class="wpd-styles-category">&nbsp;</span>';
		}
	}
	if ( in_array( get_post_type(), array( 'edibles' ) ) ) {
		$terms_edibles = get_the_terms( $post->ID, 'edibles_category' );
		$first_term_edible = $terms_edibles[0];
		if ( '' != $first_term_edible ) {
			echo '<span class="wpd-styles-category">' . $first_term_edible->name . '</span>';
		} else {
			echo '<span class="wpd-styles-category">&nbsp;</span>';
		}
	}
	if ( in_array( get_post_type(), array( 'topicals' ) ) ) {
		$terms_topicals = get_the_terms( $post->ID, 'topicals_category' );
		$first_term_topical = $terms_topicals[0];
		if ( '' != $first_term_topical ) {
			echo '<span class="wpd-styles-category">' . $first_term_topical->name . '</span>';
		} else {
			echo '<span class="wpd-styles-category">&nbsp;</span>';
		}
	}
	if ( in_array( get_post_type(), array( 'prerolls' ) ) ) {
		$terms_flowers = get_the_terms( $post->ID, 'flowers_category' );
		$first_term_flower = $terms_flowers[0];
		if ( '' != $first_term_flower ) {
			echo '<span class="wpd-styles-category">' . $first_term_flower->name . '</span>';
		} else {
			echo '<span class="wpd-styles-category">&nbsp;</span>';
		}
	}
	if ( in_array( get_post_type(), array( 'growers' ) ) ) {
		$terms_growers = get_the_terms( $post->ID, 'growers_category' );
		$first_term_grower = $terms_growers[0];
		if ( '' != $first_term_grower ) {
			echo '<span class="wpd-styles-category">' . $first_term_grower->name . '</span>';
		} else {
			echo '<span class="wpd-styles-category">&nbsp;</span>';
		}
	}
	if ( in_array( get_post_type(), array( 'gear' ) ) ) {
		$terms_gear      = get_the_terms( $post->ID, 'wpd_gear_category' );
		$first_term_gear = $terms_gear[0];
		if ( '' != $first_term_gear ) {
			echo '<span class="wpd-styles-category">' . $first_term_gear->name . '</span>';
		} else {
			echo '<span class="wpd-styles-category">&nbsp;</span>';
		}
	}
	if ( in_array( get_post_type(), array( 'tinctures' ) ) ) {
		$terms_tinctures      = get_the_terms( $post->ID, 'wpd_tinctures_category' );
		$first_term_tinctures = $terms_tinctures[0];
		if ( '' != $first_term_tinctures ) {
			echo '<span class="wpd-styles-category">' . $first_term_tinctures->name . '</span>';
		} else {
			echo '<span class="wpd-styles-category">&nbsp;</span>';
		}
	}

	echo '<div class="wpd-styles-item-details">'; // STARTS THE DIV WRAP AROUND THE TITLE AND INFO
}

function add_wpd_styles_list_images() {

	global $post;

	echo '<span class="wpd-styles-list-images">';
	echo get_wpd_product_image( $post->ID, 'wpd-styles-list-image' );
	echo '</span>';

	echo '<div class="wpd-styles-item-details">';
}

/** Function to add bottom stuff to the shortcodes */

function add_wpd_bottom_stuff() {

	global $post;

	/**
	 * Setting up WP Dispensary menu pricing data
	 */
	if ( get_post_meta( $post->ID, '_priceeach', true ) ) {
		$wpdpriceeach = '<div class="wpd-styles-price">'. wpd_currency_code() . get_post_meta( $post->ID, '_priceeach', true ) . '<span>each</span></div>';
	} else {
		$wpdpriceeach = '';
	}

	if ( get_post_meta( $post->ID, '_priceeach', true ) ) {
		$wpdpriceperunit = '<div class="wpd-styles-price">'. wpd_currency_code() . get_post_meta( $post->ID, '_priceeach', true ) . '<span>each</span></div>';
	} else {
		$wpdpriceperunit = '';
	}

	if ( get_post_meta( get_the_ID(), '_priceperpack', true ) ) {
		$wpdpriceperpack = '<div class="wpd-styles-price">'. wpd_currency_code() . get_post_meta( $post->ID, '_priceperpack', true ) . '<span>for ' . get_post_meta( $post->ID, '_unitsperpack', true ) . '</span></div>';
	} else {
		$wpdpriceperpack = '';
	}

	if ( get_post_meta( $post->ID, '_pricetopical', true ) ) {
		$wpdpricetopical = '<div class="wpd-styles-price">'. wpd_currency_code() .'' . get_post_meta( $post->ID, '_pricetopical', true ) . '<span>each</span></div>';
	} else {
		$wpdpricetopical = '';
	}

	if ( get_post_meta( $post->ID, '_halfgram', true ) ) {
		$wpdhalfgram = '<div class="wpd-styles-price">'. wpd_currency_code() .'' . get_post_meta( $post->ID, '_halfgram', true ) .'<span>1/2 g</span></div>';
	} else {
		$wpdhalfgram = '';
	}

	if ( get_post_meta( $post->ID, '_gram', true ) ) {
		$wpdgram = '<div class="wpd-styles-price">'. wpd_currency_code() .'' . get_post_meta( $post->ID, '_gram', true ) .'<span>1 g</span></div>';
	} else {
		$wpdgram = '';
	}

	if ( get_post_meta( $post->ID, '_twograms', true ) ) {
		$wpdtwograms = '<div class="wpd-styles-price">'. wpd_currency_code() .'' . get_post_meta( $post->ID, '_twograms', true ) .'<span>2 g</span></div>';
	} else {
		$wpdtwograms = '';
	}

	if ( get_post_meta( $post->ID, '_eighth', true ) ) {
		$wpdeighth = '<div class="wpd-styles-price">'. wpd_currency_code() .'' . get_post_meta( $post->ID, '_eighth', true ) .'<span>1/8 oz</span></div>';
	} else {
		$wpdeighth = '';
	}

	if ( get_post_meta( $post->ID, '_quarter', true ) ) {
		$wpdquarter = '<div class="wpd-styles-price">'. wpd_currency_code() .'' . get_post_meta( $post->ID, '_quarter', true ) .'<span>1/4 oz</span></div>';
	} else {
		$wpdquarter = '';
	}

	if ( get_post_meta( $post->ID, '_halfounce', true ) ) {
		$wpdhalfounce = '<div class="wpd-styles-price">'. wpd_currency_code() . get_post_meta( $post->ID, '_halfounce', true ) .'<span>1/2 oz</span></div>';
	} else {
		$wpdhalfounce = '';
	}

	if ( get_post_meta( $post->ID, '_ounce', true ) ) {
		$wpdounce = '<div class="wpd-styles-price">'. wpd_currency_code() . get_post_meta( $post->ID, '_ounce', true ) .'<span>1 oz</span></div>';
	} else {
		$wpdounce = '';
	}

	// Extra details

	echo '<p>';

	if ( in_array( get_post_type(), array( 'prerolls' ) ) ) {
		if ( get_post_meta( get_the_ID(), '_selected_flowers', true ) ) {
			$prerollflower = get_post_meta( get_the_id(), '_selected_flowers', true );
			echo '<span class="wpd-productinfo"><strong>Flower:</strong> <a href='. get_permalink( $prerollflower ) .'>'. get_the_title( $prerollflower ) .'</a></span>';
		} else {
			$wpdpreroll = '';
		}
	}

	if ( in_array( get_post_type(), array( 'topicals' ) ) ) {
		if ( get_post_meta( get_the_ID(), '_thctopical', true ) ) {
			echo '<span class="wpd-productinfo thc"><strong>THC:</strong> ' . get_post_meta( get_the_id(), '_thctopical', true ) .'mg</span>';
		} else {
			$wpdthctopical = '';
		}

		if ( get_post_meta( get_the_ID(), '_cbdtopical', true ) ) {
			echo '<span class="wpd-productinfo cbd"><strong>CBD:</strong> ' . get_post_meta( get_the_id(), '_cbdtopical', true ) .'mg</span>';
		} else {
			$wpdcbdtopical = '';
		}

		if ( get_post_meta( get_the_ID(), '_sizetopical', true ) ) {
			echo '<span class="wpd-productinfo"><strong>Size:</strong> ' . get_post_meta( get_the_id(), '_sizetopical', true ) .' (oz)</span>';
		} else {
			$wpdsizetopical = '';
		}
	}

	if ( in_array( get_post_type(), array( 'growers' ) ) ) {
		if ( get_post_meta( get_the_ID(), '_seedcount', true ) ) {
			echo '<span class="wpd-productinfo"><strong>Seeds per unit:</strong> ' . get_post_meta( get_the_id(), '_seedcount', true ) .'</span>';
		} else {
			$wpdseedcount = '';
		}

		if ( get_post_meta( get_the_ID(), '_clonecount', true ) ) {
			echo '<span class="wpd-productinfo"><strong>Clones per unit:</strong> ' . get_post_meta( get_the_id(), '_clonecount', true ) .'</span>';
		} else {
			$wpdclonecount = '';
		}

		if ( get_post_meta( get_the_ID(), '_origin', true ) ) {
			echo '<span class="wpd-productinfo"><strong>Origin:</strong> ' . get_post_meta( get_the_id(), '_origin', true ) .'</span>';
		} else {
			$wpdcloneorigin = '';
		}

		if ( get_post_meta( get_the_ID(), '_time', true ) ) {
			echo '<span class="wpd-productinfo"><strong>Grow Time:</strong> ' . get_post_meta( get_the_id(), '_time', true ) .'</span>';
		} else {
			$wpdclonetime = '';
		}

		if ( get_post_meta( get_the_ID(), '_selected_flowers', true ) ) {
			$growerflower = get_post_meta( get_the_id(), '_selected_flowers', true );
			echo '<span class="wpd-productinfo"><strong>Flower:</strong> <a href='. get_permalink( $growerflower ) .'>'. get_the_title( $growerflower ) .'</a></span>';
		} else {
			$wpdgrower = '';
		}
	}

	if ( in_array( get_post_type(), array( 'flowers', 'concentrates' ) ) ) {
		if ( get_post_meta( get_the_ID(), '_thc', true ) ) {
			echo '<span class="wpd-productinfo thc"><strong>THC:</strong>' . get_post_meta( get_the_id(), '_thc', true ) .'%</span>';
		} else {
			$wpdthc = '';
		}

		if ( get_post_meta( get_the_ID(), '_cbd', true ) ) {
			echo '<span class="wpd-productinfo cbd"><strong>CBD:</strong>' . get_post_meta( get_the_id(), '_cbd', true ) .'%</span>';
		} else {
			$wpdcbd = '';
		}

		if ( get_post_meta( get_the_ID(), '_thca', true ) ) {
			echo '<span class="wpd-productinfo thca"><strong>THCA:</strong>' . get_post_meta( get_the_id(), '_thca', true ) .'%</span>';
		} else {
			$wpdthca = '';
		}

		if ( get_post_meta( get_the_ID(), '_cba', true ) ) {
			echo '<span class="wpd-productinfo cba"><strong>CBA:</strong>' . get_post_meta( get_the_id(), '_cba', true ) .'%</span>';
		} else {
			$wpdcba = '';
		}

		if ( get_post_meta( get_the_ID(), '_cbn', true ) ) {
			echo '<span class="wpd-productinfo cbn"><strong>CBN:</strong>' . get_post_meta( get_the_id(), '_cbn', true ) .'%</span>';
		} else {
			$wpdcbn = '';
		}

		if ( get_post_meta( get_the_ID(), '_cbg', true ) ) {
			echo '<span class="wpd-productinfo cbg"><strong>CBG:</strong>' . get_post_meta( get_the_id(), '_cbg', true ) .'%</span>';
		} else {
			$wpdcbg = '';
		}
	}

	if ( in_array( get_post_type(), array( 'gear' ) ) ) {
		$terms_gear      = get_the_terms( $post->ID, 'wpd_gear_category' );
		$first_term_gear = $terms_gear[0];
		if ( '' != $first_term_gear ) {
			echo '<span class="wpd-productinfo">' . $first_term_gear->name . '</span>';
		} else {
			$wpdgearcat = '';
		}
	}

	if ( in_array( get_post_type(), array( 'edibles', 'tinctures' ) ) ) {
		if ( get_post_meta( get_the_ID(), '_thcmg', true ) ) {
			echo '<span class="wpd-productinfo thc"><strong>THC:</strong> ' . get_post_meta( get_the_id(), '_thcmg', true ) .'mg</span>';
		} else {
			$wpdthcmg = '';
		}

		if ( get_post_meta( get_the_ID(), '_cbdmg', true ) ) {
			echo '<span class="wpd-productinfo cbd"><strong>CBD:</strong> ' . get_post_meta( get_the_id(), '_cbdmg', true ) .'mg</span>';
		} else {
			$wpdcbdmg = '';
		}

		if ( get_post_meta( get_the_ID(), '_thccbdservings', true ) ) {
			echo '<span class="wpd-productinfo"><strong>Servings:</strong> ' . get_post_meta( get_the_id(), '_thccbdservings', true ) .'</span>';
		} else {
			$wpdservings = '';
		}

		if ( get_post_meta( get_the_ID(), '_netweight', true ) ) {
			echo '<span class="wpd-productinfo"><strong>Net weight:</strong> ' . get_post_meta( get_the_id(), '_netweight', true ) .'g</span>';
		} else {
			$wpdnetweight = '';
		}
	}

	echo '</p>';

	echo '</div>'; // ENDS THE TITLE AND INFO DIV WRAPPER

	// This is the pricing

	if ( in_array( get_post_type(), array( 'flowers' ) ) ) {
		echo '<div class="wpd-styles-price-wrap">' . $wpdgram . $wpdeighth . $wpdquarter . $wpdhalfounce . $wpdounce . '</div>';
	}

	if ( in_array( get_post_type(), array( 'concentrates' ) ) ) {
		if ( empty( $wpdpriceperunit ) ) {
			echo '<div class="wpd-styles-price-wrap">' . $wpdhalfgram . $wpdgram . $wpdtwograms . '</div>';
		} else {
			echo '<div class="wpd-styles-price-wrap">' . $wpdpriceperunit . '</div>';
		}
	}

	if ( in_array( get_post_type(), array( 'prerolls', 'edibles' ) ) ) {
		echo '<div class="wpd-styles-price-wrap">'. $wpdpriceeach . '</div>';
	}

	if ( in_array( get_post_type(), array( 'topicals' ) ) ) {
		echo '<div class="wpd-styles-price-wrap">'. $wpdpricetopical . '</div>';
	}

	if ( in_array( get_post_type(), array( 'growers' ) ) ) {
		echo '<div class="wpd-styles-price-wrap">'. $wpdpriceperunit . '</div>';
	}

	if ( in_array( get_post_type(), array( 'gear' ) ) ) {
		echo '<div class="wpd-styles-price-wrap">'. $wpdpriceeach . $wpdpriceperpack . '</div>';
	}

	if ( in_array( get_post_type(), array( 'tinctures' ) ) ) {
		echo '<div class="wpd-styles-price-wrap">'. $wpdpriceeach . $wpdpriceperpack . '</div>';
	}

}

/**
 * Function to hook into shortcode and add new attributes
 */
function wpd_styles_shortcode_flowers( $out, $pairs, $atts ) {

	$out['display'] = ''; // new display option

	if ( array_key_exists( 'display', $atts ) && $atts['display'] === 'list' ) {
		$out['class'] = 'display-list'; // added CSS class
		$out['cbd']   = 'hide'; // force CBD showing
		$out['cbn']   = 'hide'; // force CBN showing
		$out['cba']   = 'hide'; // force CBA showing
		$out['thc']   = 'hide'; // force THC showing
		$out['thca']  = 'hide'; // force THCA showing
		$out['info']  = 'hide'; // force PRICE hiding
		$out['image'] = 'hide'; // force IMAGE hiding

		add_action( 'wpd_shortcode_bottom_flowers', 'add_wpd_bottom_stuff' );
		add_action( 'wpd_shortcode_top_flowers', 'add_wpd_styles_list_images' );
		//add_action( 'wpd_shortcode_top_flowers', 'add_wpd_styles_list_categories' );
		remove_action( 'wpd_shortcode_inside_bottom', 'wpd_styles_wooconnect_shortcode_buttons' ); // removes the Styles buttons
		remove_action( 'wpd_shortcode_inside_bottom', 'wpd_wooconnect_buttons' ); // removes the original Connect for WooCommerce buttons
		remove_action( 'wpd_shortcode_inside_top', 'wpd_topsellers_icon' ); // removes the Top Sellers icon
		remove_action( 'wpd_shortcode_inside_bottom', 'wpd_ecommerce_archive_items_buttons' );

	}

  return $out;
}
add_filter( 'shortcode_atts_wpd_flowers', 'wpd_styles_shortcode_flowers', 10, 3 );

/**
 * Function to hook into shortcode and add new attributes
 */
function wpd_styles_shortcode_edibles( $out, $pairs, $atts ) {

	$out['display'] = ''; // new display option

	if ( array_key_exists( 'display', $atts ) && $atts['display'] == 'list' ) {
		$out['class'] = 'display-list'; // added CSS class
		$out['cbd']   = 'show'; // force CBD showing
		$out['thc']   = 'show'; // force THC showing
		$out['info']  = 'hide'; // force PRICE hiding
		$out['image'] = 'hide'; // force IMAGE hiding

		add_action( 'wpd_shortcode_bottom_edibles', 'add_wpd_bottom_stuff' );
		add_action( 'wpd_shortcode_top_edibles', 'add_wpd_styles_list_images' );
		//add_action( 'wpd_shortcode_top_edibles', 'add_wpd_styles_list_categories' );
		remove_action( 'wpd_shortcode_inside_bottom', 'wpd_styles_wooconnect_shortcode_buttons' ); // removes the Styles buttons
		remove_action( 'wpd_shortcode_inside_bottom', 'wpd_wooconnect_buttons' ); // removes the original Connect for WooCommerce buttons
		remove_action( 'wpd_shortcode_inside_top', 'wpd_topsellers_icon' ); // removes the Top Sellers icon
		remove_action( 'wpd_shortcode_inside_bottom', 'wpd_ecommerce_archive_items_buttons' );

	}

  return $out;
}
add_filter( 'shortcode_atts_wpd_edibles', 'wpd_styles_shortcode_edibles', 10, 3 );

/**
 * Function to hook into shortcode and add new attributes
 */
function wpd_styles_shortcode_concentrates( $out, $pairs, $atts ) {

	$out['display'] = ''; // new display option

	if ( array_key_exists( 'display', $atts ) && $atts['display'] == 'list' ) {
		$out['class'] = 'display-list'; // added CSS class
		$out['cbd']   = 'hide'; // force CBD showing
		$out['cbn']   = 'hide'; // force CBN showing
		$out['cba']   = 'hide'; // force CBA showing
		$out['thc']   = 'hide'; // force THC showing
		$out['thca']  = 'hide'; // force THCA showing
		$out['info']  = 'hide'; // force PRICE hiding
		$out['image'] = 'hide'; // force IMAGE hiding

		add_action( 'wpd_shortcode_bottom_concentrates', 'add_wpd_bottom_stuff' );
		add_action( 'wpd_shortcode_top_concentrates', 'add_wpd_styles_list_images' );
		//add_action( 'wpd_shortcode_top_concentrates', 'add_wpd_styles_list_categories' );
		remove_action( 'wpd_shortcode_inside_bottom', 'wpd_styles_wooconnect_shortcode_buttons' ); // removes the Styles buttons
		remove_action( 'wpd_shortcode_inside_bottom', 'wpd_wooconnect_buttons' ); // removes the original Connect for WooCommerce buttons
		remove_action( 'wpd_shortcode_inside_top', 'wpd_topsellers_icon' ); // removes the Top Sellers icon
		remove_action( 'wpd_shortcode_inside_bottom', 'wpd_ecommerce_archive_items_buttons' );
	}

  return $out;
}
add_filter( 'shortcode_atts_wpd_concentrates', 'wpd_styles_shortcode_concentrates', 10, 3 );

/**
 * Function to hook into shortcode and add new attributes
 */
function wpd_styles_shortcode_prerolls( $out, $pairs, $atts ) {

	$out['display'] = ''; // new display option

	if ( array_key_exists( 'display', $atts ) && $atts['display'] == 'list' ) {
		$out['class'] = 'display-list'; // added CSS class
		$out['cbd']   = 'show'; // force CBD showing
		$out['thc']   = 'show'; // force THC showing
		$out['info']  = 'hide'; // force PRICE hiding
		$out['image'] = 'hide'; // force IMAGE hiding

		add_action( 'wpd_shortcode_bottom_prerolls', 'add_wpd_bottom_stuff' );
		add_action( 'wpd_shortcode_top_prerolls', 'add_wpd_styles_list_images' );
		//add_action( 'wpd_shortcode_top_prerolls', 'add_wpd_styles_list_categories' );
		remove_action( 'wpd_shortcode_inside_bottom', 'wpd_styles_wooconnect_shortcode_buttons' ); // removes the Styles buttons
		remove_action( 'wpd_shortcode_inside_bottom', 'wpd_wooconnect_buttons' ); // removes the original Connect for WooCommerce buttons
		remove_action( 'wpd_shortcode_inside_top', 'wpd_topsellers_icon' ); // removes the Top Sellers icon
		remove_action( 'wpd_shortcode_inside_bottom', 'wpd_ecommerce_archive_items_buttons' );
	}

  return $out;
}
add_filter( 'shortcode_atts_wpd_prerolls', 'wpd_styles_shortcode_prerolls', 10, 3 );

/**
 * Function to hook into shortcode and add new attributes
 */
function wpd_styles_shortcode_topicals( $out, $pairs, $atts ) {

	$out['display'] = ''; // new display option

	if ( array_key_exists( 'display', $atts ) && $atts['display'] == 'list' ) {
		$out['class'] = 'display-list'; // added CSS class
		$out['cbd']   = 'show'; // force CBD showing
		$out['thc']   = 'show'; // force THC showing
		$out['info']  = 'hide'; // force PRICE hiding
		$out['image'] = 'hide'; // force IMAGE hiding

		add_action( 'wpd_shortcode_bottom_topicals', 'add_wpd_bottom_stuff' );
		add_action( 'wpd_shortcode_top_topicals', 'add_wpd_styles_list_images' );
		//add_action( 'wpd_shortcode_top_topicals', 'add_wpd_styles_list_categories' );
		remove_action( 'wpd_shortcode_inside_bottom', 'wpd_styles_wooconnect_shortcode_buttons' ); // removes the Styles buttons
		remove_action( 'wpd_shortcode_inside_bottom', 'wpd_wooconnect_buttons' ); // removes the original Connect for WooCommerce buttons
		remove_action( 'wpd_shortcode_inside_top', 'wpd_topsellers_icon' ); // removes the Top Sellers icon
		remove_action( 'wpd_shortcode_inside_bottom', 'wpd_ecommerce_archive_items_buttons' );
	}

  return $out;
}
add_filter( 'shortcode_atts_wpd_topicals', 'wpd_styles_shortcode_topicals', 10, 3 );

/**
 * Function to hook into shortcode and add new attributes
 */
function wpd_styles_shortcode_growers( $out, $pairs, $atts ) {

	$out['display'] = ''; // new display option

	if ( array_key_exists( 'display', $atts ) && $atts['display'] == 'list' ) {
		$out['class'] = 'display-list'; // added CSS class
		$out['cbd']   = 'show'; // force CBD showing
		$out['thc']   = 'show'; // force THC showing
		$out['info']  = 'hide'; // force PRICE hiding
		$out['image'] = 'hide'; // force IMAGE hiding

		add_action( 'wpd_shortcode_bottom_growers', 'add_wpd_bottom_stuff' );
		add_action( 'wpd_shortcode_top_growers', 'add_wpd_styles_list_images' );
		//add_action( 'wpd_shortcode_top_growers', 'add_wpd_styles_list_categories' );
		remove_action( 'wpd_shortcode_inside_bottom', 'wpd_styles_wooconnect_shortcode_buttons' ); // removes the Styles buttons
		remove_action( 'wpd_shortcode_inside_bottom', 'wpd_wooconnect_buttons' ); // removes the original Connect for WooCommerce buttons
		remove_action( 'wpd_shortcode_inside_top', 'wpd_topsellers_icon' ); // removes the Top Sellers icon
		remove_action( 'wpd_shortcode_inside_bottom', 'wpd_ecommerce_archive_items_buttons' );
	}

  return $out;
}
add_filter( 'shortcode_atts_wpd_growers', 'wpd_styles_shortcode_growers', 10, 3 );

/**
 * Function to hook into shortcode and add new attributes
 */
function wpd_styles_shortcode_gear( $out, $pairs, $atts ) {

	$out['display'] = ''; // new display option

	if ( array_key_exists( 'display', $atts ) && $atts['display'] === 'list' ) {
		$out['class'] = 'display-list'; // added CSS class
		$out['cbd']   = 'hide'; // force CBD showing
		$out['cbn']   = 'hide'; // force CBN showing
		$out['cba']   = 'hide'; // force CBA showing
		$out['thc']   = 'hide'; // force THC showing
		$out['thca']  = 'hide'; // force THCA showing
		$out['info']  = 'hide'; // force PRICE hiding
		$out['image'] = 'hide'; // force IMAGE hiding

		add_action( 'wpd_shortcode_bottom_gear', 'add_wpd_bottom_stuff' );
		add_action( 'wpd_shortcode_top_gear', 'add_wpd_styles_list_images' );
		//add_action( 'wpd_shortcode_top_gear', 'add_wpd_styles_list_categories' );
		remove_action( 'wpd_shortcode_inside_bottom', 'wpd_styles_wooconnect_shortcode_buttons' ); // removes the Styles buttons
		remove_action( 'wpd_shortcode_inside_bottom', 'wpd_wooconnect_buttons' ); // removes the original Connect for WooCommerce buttons
		remove_action( 'wpd_shortcode_inside_top', 'wpd_topsellers_icon' ); // removes the Top Sellers icon
		remove_action( 'wpd_shortcode_inside_bottom', 'wpd_ecommerce_archive_items_buttons' );
	}

  return $out;
}
add_filter( 'shortcode_atts_wpd_gear', 'wpd_styles_shortcode_gear', 10, 3 );

/**
 * Function to hook into shortcode and add new attributes
 */
function wpd_styles_shortcode_tinctures( $out, $pairs, $atts ) {

	$out['display'] = ''; // new display option

	if ( array_key_exists( 'display', $atts ) && $atts['display'] === 'list' ) {
		$out['class'] = 'display-list'; // added CSS class
		$out['cbd']   = 'hide'; // force CBD showing
		$out['cbn']   = 'hide'; // force CBN showing
		$out['cba']   = 'hide'; // force CBA showing
		$out['thc']   = 'hide'; // force THC showing
		$out['thca']  = 'hide'; // force THCA showing
		$out['info']  = 'hide'; // force PRICE hiding
		$out['image'] = 'hide'; // force IMAGE hiding

		add_action( 'wpd_shortcode_bottom_tinctures', 'add_wpd_bottom_stuff' );
		add_action( 'wpd_shortcode_top_tinctures', 'add_wpd_styles_list_images' );
		//add_action( 'wpd_shortcode_top_tinctures', 'add_wpd_styles_list_categories' );
		remove_action( 'wpd_shortcode_inside_bottom', 'wpd_styles_wooconnect_shortcode_buttons' ); // removes the Styles buttons
		remove_action( 'wpd_shortcode_inside_bottom', 'wpd_wooconnect_buttons' ); // removes the original Connect for WooCommerce buttons
		remove_action( 'wpd_shortcode_inside_top', 'wpd_topsellers_icon' ); // removes the Top Sellers icon
		remove_action( 'wpd_shortcode_inside_bottom', 'wpd_ecommerce_archive_items_buttons' );
	}

  return $out;
}
add_filter( 'shortcode_atts_wpd_tinctures', 'wpd_styles_shortcode_tinctures', 10, 3 );

/**
 * Function to hook into shortcode and add new attributes
 */
function wpd_styles_shortcode_menu( $out, $pairs, $atts ) {

	$out['display'] = ''; // new display option

	if ( array_key_exists( 'display', $atts ) && $atts['display'] === 'list' ) {
		$out['class'] = 'display-list'; // added CSS class
		$out['cbd']   = 'hide'; // force CBD showing
		$out['cbn']   = 'hide'; // force CBN showing
		$out['cba']   = 'hide'; // force CBA showing
		$out['thc']   = 'show'; // force THC showing
		$out['thca']  = 'hide'; // force THCA showing
		$out['info']  = 'hide'; // force INFO hiding
		$out['price'] = 'hide'; // force PRICE hiding
		$out['image'] = 'hide'; // force IMAGE hiding

		add_action( 'wpd_shortcode_bottom_menu', 'add_wpd_bottom_stuff' );
		add_action( 'wpd_shortcode_top_menu', 'add_wpd_styles_list_images' );
		//add_action( 'wpd_shortcode_top_menu', 'add_wpd_styles_list_categories' );
		remove_action( 'wpd_shortcode_inside_bottom', 'wpd_styles_wooconnect_shortcode_buttons' ); // removes the Styles buttons
		remove_action( 'wpd_shortcode_inside_bottom', 'wpd_wooconnect_buttons' ); // removes the original Connect for WooCommerce buttons
		remove_action( 'wpd_shortcode_inside_top', 'wpd_topsellers_icon' ); // removes the Top Sellers icon
		remove_action( 'wpd_shortcode_inside_bottom', 'wpd_ecommerce_archive_items_buttons' );
	}

  return $out;
}
add_filter( 'shortcode_atts_wpd_menu', 'wpd_styles_shortcode_menu', 10, 3 );

/**
 * Action hook to display the View Details & Buy Now buttons in shortcodes
 * with the added modal pop up codes added in.
 */
//add_action( 'wpd_shortcode_inside_bottom', 'wpd_styles_wooconnect_shortcode_buttons' );

function wpd_styles_wooconnect_shortcode_buttons() {

	if ( in_array( get_post_type(), array( 'flowers' ) ) ) { ?>
	<p class="wpd-productbuttons">

	<?php
	$viewbtntext = "Details";
	$btntext     = apply_filters( 'wpdwc_view_details_button_text', $viewbtntext );
	$newviewbtn  = '<a href="'. get_permalink() .'" class="button wpd-connect-btn">' . $btntext . '</a>';

	echo apply_filters('wpdwc_view_details_button_link', $newviewbtn );

	global $post;
	$flowerid = $post->ID;
	$args     = array(
		'meta_key'       => '_selected_flowers',
		'meta_value'     => $flowerid,
		'post_type'      => 'product',
		'posts_per_page' => -1
	);
	$wpd_wooconnect = new WP_Query( $args );
	if ( $wpd_wooconnect->have_posts() ) :
	while ( $wpd_wooconnect->have_posts() ) : $wpd_wooconnect->the_post();

	$buybtntext = "Buy Now!";

	global $product;
	$productID = get_the_ID();

	if ( 'outofstock' === get_post_meta( $productID, '_stock_status', true ) ) { ?>
		<span class="wpd-wooconnect-outofstock">Out of Stock</span>
	<?php } else { ?>
		<a href="#wpb_wl_quick_view_<?php echo get_the_id(); ?>" data-effect="mfp-zoom-in" class="wpb_wl_preview open-popup-link button wpd-connect-btn buy-now"><?php echo apply_filters( 'wpdwc_buy_now_button_text', $buybtntext ); ?></a>
	<?php
	} // outofstock

	global $post, $woocommerce, $product;

	$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 3 );
	$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
	$full_size_image   = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
	$image_title       = get_post_field( 'post_excerpt', $post_thumbnail_id );
	$placeholder       = has_post_thumbnail() ? 'with-images' : 'without-images';
	$wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
		'woocommerce-product-gallery',
		'woocommerce-product-gallery--' . $placeholder,
		'woocommerce-product-gallery--columns-' . absint( $columns ),
		'images',
	) );
	$attachment_ids = $product->get_gallery_image_ids();
	$gallery_id = rand(100,1000);

	?>
	<div id="wpb_wl_quick_view_<?php echo get_the_id(); ?>" class="mfp-hide mfp-with-anim wpb_wl_quick_view_content wpb_wl_clearfix product">
		<div class="wpb_wl_images">
			<div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>">
				<figure class="woocommerce-product-gallery__wrapper">
					<?php
					$attributes = array(
						'title'                   => $image_title,
						'data-src'                => $full_size_image[0],
						'data-large_image'        => $full_size_image[0],
						'data-large_image_width'  => $full_size_image[1],
						'data-large_image_height' => $full_size_image[2],
					);

					if ( has_post_thumbnail() ) {
						$html  = '<div data-thumb="' . get_the_post_thumbnail_url( $post->ID, 'shop_thumbnail' ) . '" class="woocommerce-product-gallery__image"><a href="' . esc_url( $full_size_image[0] ) . '" data-fancybox="gallery-'. esc_attr( $gallery_id ) .'">';
						$html .= get_the_post_thumbnail( $post->ID, 'shop_single', $attributes );
						$html .= '</a></div>';
					} else {
						$html  = '<div class="woocommerce-product-gallery__image--placeholder">';
						$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
						$html .= '</div>';
					}

					echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, get_post_thumbnail_id( $post->ID ) );

					?>
				</figure>

				<?php if ( $attachment_ids && has_post_thumbnail() ): ?>
					<div class="thumbnails <?php echo esc_attr( 'columns-' . $columns ) ?>">
						<?php
							$loop = 0;
							foreach ( $attachment_ids as $attachment_id ) {
								$full_size_image = wp_get_attachment_image_src( $attachment_id, 'full' );
								$thumbnail       = wp_get_attachment_image_src( $attachment_id, 'shop_thumbnail' );
								$image_title     = get_post_field( 'post_excerpt', $attachment_id );
								$gallery_classes = array();

								$attributes = array(
									'title'                   => $image_title,
									'data-src'                => $full_size_image[0],
									'data-large_image'        => $full_size_image[0],
									'data-large_image_width'  => $full_size_image[1],
									'data-large_image_height' => $full_size_image[2],
								);

								if ( $loop == 0 || $loop % $columns == 0 ){
									$gallery_classes[] = 'first';
								}

								if ( ( $loop + 1 ) % $columns == 0 ){
									$gallery_classes[] = 'last';
								}

								$gallery_classes = esc_attr( implode( ' ', $gallery_classes ) );

								$html  = '<a class="'. $gallery_classes .'" href="' . esc_url( $full_size_image[0] ) . '" data-fancybox="gallery-'. esc_attr( $gallery_id ) .'">';
								$html .= wp_get_attachment_image( $attachment_id, 'shop_single', false, $attributes );
						 		$html .= '</a>';

								echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $attachment_id );

								$loop++;
							}
						?>
					</div>
				<?php endif; ?>
			</div>
		</div>
		<div class="wpb_wl_summary">
			<!-- Product Title -->
			<h2 class="wpb_wl_product_title"><?php the_title();?></h2>

			<!-- Product Price -->
			<?php if ( $price_html = $product->get_price_html() ) : ?>
				<span class="price wpb_wl_product_price"><?php echo $price_html; ?></span>
			<?php endif; ?>

			<!-- Product short description -->
			<?php woocommerce_template_single_excerpt();?>

			<!-- Product cart link -->
			<?php woocommerce_template_single_add_to_cart();?>

		</div>
	</div>

	<?php
	endwhile;
	endif;

	// Reset Post Data
	wp_reset_postdata(); ?>
	</p>
<?php } // flowers ?>

<?php if ( in_array( get_post_type(), array( 'concentrates' ) ) ) { ?>
	<p class="wpd-productbuttons">

	<?php
	$viewbtntext = "Details";
	$btntext     = apply_filters( 'wpdwc_view_details_button_text', $viewbtntext );
	$newviewbtn  = '<a href="'. get_permalink() .'" class="button wpd-connect-btn">' . $btntext . '</a>';

	echo apply_filters('wpdwc_view_details_button_link', $newviewbtn );

	global $post;
	$concentrateid = $post->ID;
	$args          = array(
		'meta_key'       => '_selected_concentrates',
		'meta_value'     => $concentrateid,
		'post_type'      => 'product',
		'posts_per_page' => -1
	);
	$wpd_wooconnect = new WP_Query( $args );
	if ( $wpd_wooconnect->have_posts() ) :
	while ( $wpd_wooconnect->have_posts() ) : $wpd_wooconnect->the_post();

	$buybtntext = "Buy Now!";

	global $product;
	$productID = get_the_ID();

	if ( 'outofstock' === get_post_meta( $productID, '_stock_status', true ) ) { ?>
		<span class="wpd-wooconnect-outofstock">Out of Stock</span>
	<?php } else { ?>
		<a href="#wpb_wl_quick_view_<?php echo get_the_id(); ?>" data-effect="mfp-zoom-in" class="wpb_wl_preview open-popup-link button wpd-connect-btn buy-now"><?php echo apply_filters( 'wpdwc_buy_now_button_text', $buybtntext ); ?></a>
	<?php
	} // outofstock


	global $post, $woocommerce, $product;

	$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 3 );
	$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
	$full_size_image   = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
	$image_title       = get_post_field( 'post_excerpt', $post_thumbnail_id );
	$placeholder       = has_post_thumbnail() ? 'with-images' : 'without-images';
	$wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
		'woocommerce-product-gallery',
		'woocommerce-product-gallery--' . $placeholder,
		'woocommerce-product-gallery--columns-' . absint( $columns ),
		'images',
	) );
	$attachment_ids = $product->get_gallery_image_ids();
	$gallery_id     = rand( 100,1000 );
	?>
	<div id="wpb_wl_quick_view_<?php echo get_the_id(); ?>" class="mfp-hide mfp-with-anim wpb_wl_quick_view_content wpb_wl_clearfix product">
		<div class="wpb_wl_images">
			<div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>">
				<figure class="woocommerce-product-gallery__wrapper">
					<?php
					$attributes = array(
						'title'                   => $image_title,
						'data-src'                => $full_size_image[0],
						'data-large_image'        => $full_size_image[0],
						'data-large_image_width'  => $full_size_image[1],
						'data-large_image_height' => $full_size_image[2],
					);

					if ( has_post_thumbnail() ) {
						$html  = '<div data-thumb="' . get_the_post_thumbnail_url( $post->ID, 'shop_thumbnail' ) . '" class="woocommerce-product-gallery__image"><a href="' . esc_url( $full_size_image[0] ) . '" data-fancybox="gallery-'. esc_attr( $gallery_id ) .'">';
						$html .= get_the_post_thumbnail( $post->ID, 'shop_single', $attributes );
						$html .= '</a></div>';
					} else {
						$html  = '<div class="woocommerce-product-gallery__image--placeholder">';
						$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
						$html .= '</div>';
					}

					echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, get_post_thumbnail_id( $post->ID ) );
					?>
				</figure>

				<?php if ( $attachment_ids && has_post_thumbnail() ): ?>
					<div class="thumbnails <?php echo esc_attr( 'columns-' . $columns ) ?>">
						<?php
							$loop = 0;
							foreach ( $attachment_ids as $attachment_id ) {
								$full_size_image = wp_get_attachment_image_src( $attachment_id, 'full' );
								$thumbnail       = wp_get_attachment_image_src( $attachment_id, 'shop_thumbnail' );
								$image_title     = get_post_field( 'post_excerpt', $attachment_id );
								$gallery_classes = array();

								$attributes = array(
									'title'                   => $image_title,
									'data-src'                => $full_size_image[0],
									'data-large_image'        => $full_size_image[0],
									'data-large_image_width'  => $full_size_image[1],
									'data-large_image_height' => $full_size_image[2],
								);

								if ( $loop == 0 || $loop % $columns == 0 ){
									$gallery_classes[] = 'first';
								}

								if ( ( $loop + 1 ) % $columns == 0 ){
									$gallery_classes[] = 'last';
								}

								$gallery_classes = esc_attr( implode( ' ', $gallery_classes ) );

								$html  = '<a class="'. $gallery_classes .'" href="' . esc_url( $full_size_image[0] ) . '" data-fancybox="gallery-'. esc_attr( $gallery_id ) .'">';
								$html .= wp_get_attachment_image( $attachment_id, 'shop_single', false, $attributes );
						 		$html .= '</a>';

								echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $attachment_id );

								$loop++;
							}
						?>
					</div>
				<?php endif; ?>
			</div>
		</div>
		<div class="wpb_wl_summary">
			<!-- Product Title -->
			<h2 class="wpb_wl_product_title"><?php the_title();?></h2>

			<!-- Product Price -->
			<?php if ( $price_html = $product->get_price_html() ) : ?>
				<span class="price wpb_wl_product_price"><?php echo $price_html; ?></span>
			<?php endif; ?>

			<!-- Product short description -->
			<?php woocommerce_template_single_excerpt();?>

			<!-- Product cart link -->
			<?php woocommerce_template_single_add_to_cart();?>

		</div>
	</div>

	<?php
	endwhile;
	endif;

	// Reset Post Data
	wp_reset_postdata(); ?>
	</p>
<?php } // concentrates ?>

<?php if ( in_array( get_post_type(), array( 'edibles' ) ) ) { ?>
	<p class="wpd-productbuttons">

	<?php
	$viewbtntext = "Details";
	$btntext     = apply_filters( 'wpdwc_view_details_button_text', $viewbtntext );
	$newviewbtn  = '<a href="'. get_permalink() .'" class="button wpd-connect-btn">' . $btntext . '</a>';

	echo apply_filters('wpdwc_view_details_button_link', $newviewbtn );

	global $post;
	$edibleid = $post->ID;
	$args     = array(
		'meta_key'       => '_selected_edibles',
		'meta_value'     => $edibleid,
		'post_type'      => 'product',
		'posts_per_page' => -1
	);
	$wpd_wooconnect = new WP_Query( $args );
	if ( $wpd_wooconnect->have_posts() ) :
	while ( $wpd_wooconnect->have_posts() ) : $wpd_wooconnect->the_post();

	$buybtntext = "Buy Now!";

	global $product;
	$productID = get_the_ID();

	if ( 'outofstock' === get_post_meta( $productID, '_stock_status', true ) ) { ?>
		<span class="wpd-wooconnect-outofstock">Out of Stock</span>
	<?php } else { ?>
		<a href="#wpb_wl_quick_view_<?php echo get_the_id(); ?>" data-effect="mfp-zoom-in" class="wpb_wl_preview open-popup-link button wpd-connect-btn buy-now"><?php echo apply_filters( 'wpdwc_buy_now_button_text', $buybtntext ); ?></a>
	<?php
	} // outofstock

	global $post, $woocommerce, $product;

	$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 3 );
	$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
	$full_size_image   = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
	$image_title       = get_post_field( 'post_excerpt', $post_thumbnail_id );
	$placeholder       = has_post_thumbnail() ? 'with-images' : 'without-images';
	$wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
		'woocommerce-product-gallery',
		'woocommerce-product-gallery--' . $placeholder,
		'woocommerce-product-gallery--columns-' . absint( $columns ),
		'images',
	) );
	$attachment_ids = $product->get_gallery_image_ids();
	$gallery_id     = rand( 100,1000 );
	?>
	<div id="wpb_wl_quick_view_<?php echo get_the_id(); ?>" class="mfp-hide mfp-with-anim wpb_wl_quick_view_content wpb_wl_clearfix product">
		<div class="wpb_wl_images">
			<div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>">
				<figure class="woocommerce-product-gallery__wrapper">
					<?php
					$attributes = array(
						'title'                   => $image_title,
						'data-src'                => $full_size_image[0],
						'data-large_image'        => $full_size_image[0],
						'data-large_image_width'  => $full_size_image[1],
						'data-large_image_height' => $full_size_image[2],
					);

					if ( has_post_thumbnail() ) {
						$html  = '<div data-thumb="' . get_the_post_thumbnail_url( $post->ID, 'shop_thumbnail' ) . '" class="woocommerce-product-gallery__image"><a href="' . esc_url( $full_size_image[0] ) . '" data-fancybox="gallery-'. esc_attr( $gallery_id ) .'">';
						$html .= get_the_post_thumbnail( $post->ID, 'shop_single', $attributes );
						$html .= '</a></div>';
					} else {
						$html  = '<div class="woocommerce-product-gallery__image--placeholder">';
						$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
						$html .= '</div>';
					}

					echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, get_post_thumbnail_id( $post->ID ) );

					?>
				</figure>

				<?php if ( $attachment_ids && has_post_thumbnail() ): ?>
					<div class="thumbnails <?php echo esc_attr( 'columns-' . $columns ) ?>">
						<?php
							$loop = 0;
							foreach ( $attachment_ids as $attachment_id ) {
								$full_size_image = wp_get_attachment_image_src( $attachment_id, 'full' );
								$thumbnail       = wp_get_attachment_image_src( $attachment_id, 'shop_thumbnail' );
								$image_title     = get_post_field( 'post_excerpt', $attachment_id );
								$gallery_classes = array();

								$attributes = array(
									'title'                   => $image_title,
									'data-src'                => $full_size_image[0],
									'data-large_image'        => $full_size_image[0],
									'data-large_image_width'  => $full_size_image[1],
									'data-large_image_height' => $full_size_image[2],
								);

								if ( $loop == 0 || $loop % $columns == 0 ){
									$gallery_classes[] = 'first';
								}

								if ( ( $loop + 1 ) % $columns == 0 ){
									$gallery_classes[] = 'last';
								}

								$gallery_classes = esc_attr( implode( ' ', $gallery_classes ) );

								$html  = '<a class="'. $gallery_classes .'" href="' . esc_url( $full_size_image[0] ) . '" data-fancybox="gallery-'. esc_attr( $gallery_id ) .'">';
								$html .= wp_get_attachment_image( $attachment_id, 'shop_single', false, $attributes );
						 		$html .= '</a>';

								echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $attachment_id );

								$loop++;
							}
						?>
					</div>
				<?php endif; ?>
			</div>
		</div>
		<div class="wpb_wl_summary">
			<!-- Product Title -->
			<h2 class="wpb_wl_product_title"><?php the_title();?></h2>

			<!-- Product Price -->
			<?php if ( $price_html = $product->get_price_html() ) : ?>
				<span class="price wpb_wl_product_price"><?php echo $price_html; ?></span>
			<?php endif; ?>

			<!-- Product short description -->
			<?php woocommerce_template_single_excerpt();?>

			<!-- Product cart link -->
			<?php woocommerce_template_single_add_to_cart();?>

		</div>
	</div>

	<?php
	endwhile;
	endif;

	// Reset Post Data
	wp_reset_postdata(); ?>
	</p>
<?php } // edibles ?>

<?php if ( in_array( get_post_type(), array( 'prerolls' ) ) ) { ?>
	<p class="wpd-productbuttons">

	<?php
	$viewbtntext = "Details";
	$btntext     = apply_filters( 'wpdwc_view_details_button_text', $viewbtntext );
	$newviewbtn  = '<a href="'. get_permalink() .'" class="button wpd-connect-btn">' . $btntext . '</a>';

	echo apply_filters('wpdwc_view_details_button_link', $newviewbtn );

	global $post;
	$prerollid = $post->ID;
	$args      = array(
		'meta_key'       => '_selected_prerolls',
		'meta_value'     => $prerollid,
		'post_type'      => 'product',
		'posts_per_page' => -1
	);
	$wpd_wooconnect = new WP_Query( $args );
	if ( $wpd_wooconnect->have_posts() ) :
	while ( $wpd_wooconnect->have_posts() ) : $wpd_wooconnect->the_post();

	$buybtntext = "Buy Now!";

	global $product;
	$productID = get_the_ID();

	if ( 'outofstock' === get_post_meta( $productID, '_stock_status', true ) ) { ?>
		<span class="wpd-wooconnect-outofstock">Out of Stock</span>
	<?php } else { ?>
		<a href="#wpb_wl_quick_view_<?php echo get_the_id(); ?>" data-effect="mfp-zoom-in" class="wpb_wl_preview open-popup-link button wpd-connect-btn buy-now"><?php echo apply_filters( 'wpdwc_buy_now_button_text', $buybtntext ); ?></a>
	<?php
	} // outofstock

	global $post, $woocommerce, $product;

	$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 3 );
	$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
	$full_size_image   = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
	$image_title       = get_post_field( 'post_excerpt', $post_thumbnail_id );
	$placeholder       = has_post_thumbnail() ? 'with-images' : 'without-images';
	$wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
		'woocommerce-product-gallery',
		'woocommerce-product-gallery--' . $placeholder,
		'woocommerce-product-gallery--columns-' . absint( $columns ),
		'images',
	) );
	$attachment_ids = $product->get_gallery_image_ids();
	$gallery_id     = rand( 100,1000 );
	?>
	<div id="wpb_wl_quick_view_<?php echo get_the_id(); ?>" class="mfp-hide mfp-with-anim wpb_wl_quick_view_content wpb_wl_clearfix product">
		<div class="wpb_wl_images">
			<div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>">
				<figure class="woocommerce-product-gallery__wrapper">
					<?php
					$attributes = array(
						'title'                   => $image_title,
						'data-src'                => $full_size_image[0],
						'data-large_image'        => $full_size_image[0],
						'data-large_image_width'  => $full_size_image[1],
						'data-large_image_height' => $full_size_image[2],
					);

					if ( has_post_thumbnail() ) {
						$html  = '<div data-thumb="' . get_the_post_thumbnail_url( $post->ID, 'shop_thumbnail' ) . '" class="woocommerce-product-gallery__image"><a href="' . esc_url( $full_size_image[0] ) . '" data-fancybox="gallery-'. esc_attr( $gallery_id ) .'">';
						$html .= get_the_post_thumbnail( $post->ID, 'shop_single', $attributes );
						$html .= '</a></div>';
					} else {
						$html  = '<div class="woocommerce-product-gallery__image--placeholder">';
						$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
						$html .= '</div>';
					}

					echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, get_post_thumbnail_id( $post->ID ) );

					?>
				</figure>

				<?php if ( $attachment_ids && has_post_thumbnail() ): ?>
					<div class="thumbnails <?php echo esc_attr( 'columns-' . $columns ) ?>">
						<?php
							$loop = 0;
							foreach ( $attachment_ids as $attachment_id ) {
								$full_size_image = wp_get_attachment_image_src( $attachment_id, 'full' );
								$thumbnail       = wp_get_attachment_image_src( $attachment_id, 'shop_thumbnail' );
								$image_title     = get_post_field( 'post_excerpt', $attachment_id );
								$gallery_classes = array();

								$attributes = array(
									'title'                   => $image_title,
									'data-src'                => $full_size_image[0],
									'data-large_image'        => $full_size_image[0],
									'data-large_image_width'  => $full_size_image[1],
									'data-large_image_height' => $full_size_image[2],
								);

								if ( $loop == 0 || $loop % $columns == 0 ){
									$gallery_classes[] = 'first';
								}

								if ( ( $loop + 1 ) % $columns == 0 ){
									$gallery_classes[] = 'last';
								}

								$gallery_classes = esc_attr( implode( ' ', $gallery_classes ) );

								$html  = '<a class="'. $gallery_classes .'" href="' . esc_url( $full_size_image[0] ) . '" data-fancybox="gallery-'. esc_attr( $gallery_id ) .'">';
								$html .= wp_get_attachment_image( $attachment_id, 'shop_single', false, $attributes );
						 		$html .= '</a>';

								echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $attachment_id );

								$loop++;
							}
						?>
					</div>
				<?php endif; ?>
			</div>
		</div>
		<div class="wpb_wl_summary">
			<!-- Product Title -->
			<h2 class="wpb_wl_product_title"><?php the_title();?></h2>

			<!-- Product Price -->
			<?php if ( $price_html = $product->get_price_html() ) : ?>
				<span class="price wpb_wl_product_price"><?php echo $price_html; ?></span>
			<?php endif; ?>

			<!-- Product short description -->
			<?php woocommerce_template_single_excerpt();?>

			<!-- Product cart link -->
			<?php woocommerce_template_single_add_to_cart();?>

		</div>
	</div>


	<?php
	endwhile;
	endif;

	// Reset Post Data
	wp_reset_postdata(); ?>
	</p>
<?php } // pre-rolls ?>

<?php if ( in_array( get_post_type(), array( 'topicals' ) ) ) { ?>
	<p class="wpd-productbuttons">

	<?php
	$viewbtntext = "Details";
	$btntext     = apply_filters( 'wpdwc_view_details_button_text', $viewbtntext );
	$newviewbtn  = '<a href="'. get_permalink() .'" class="button wpd-connect-btn">' . $btntext . '</a>';

	echo apply_filters('wpdwc_view_details_button_link', $newviewbtn );

	global $post;
	$topicalid = $post->ID;
	$args      = array(
		'meta_key'       => '_selected_topicals',
		'meta_value'     => $topicalid,
		'post_type'      => 'product',
		'posts_per_page' => -1
	);
	$wpd_wooconnect = new WP_Query( $args );
	if ( $wpd_wooconnect->have_posts() ) :
	while ( $wpd_wooconnect->have_posts() ) : $wpd_wooconnect->the_post();

	$buybtntext = "Buy Now!";

	global $product;
	$productID = get_the_ID();

	if ( 'outofstock' === get_post_meta( $productID, '_stock_status', true ) ) { ?>
		<span class="wpd-wooconnect-outofstock">Out of Stock</span>
	<?php } else { ?>
		<a href="#wpb_wl_quick_view_<?php echo get_the_id(); ?>" data-effect="mfp-zoom-in" class="wpb_wl_preview open-popup-link button wpd-connect-btn buy-now"><?php echo apply_filters( 'wpdwc_buy_now_button_text', $buybtntext ); ?></a>
	<?php
	} // outofstock

	global $post, $woocommerce, $product;

	$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 3 );
	$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
	$full_size_image   = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
	$image_title       = get_post_field( 'post_excerpt', $post_thumbnail_id );
	$placeholder       = has_post_thumbnail() ? 'with-images' : 'without-images';
	$wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
		'woocommerce-product-gallery',
		'woocommerce-product-gallery--' . $placeholder,
		'woocommerce-product-gallery--columns-' . absint( $columns ),
		'images',
	) );
	$attachment_ids = $product->get_gallery_image_ids();
	$gallery_id     = rand( 100,1000 );
	?>
	<div id="wpb_wl_quick_view_<?php echo get_the_id(); ?>" class="mfp-hide mfp-with-anim wpb_wl_quick_view_content wpb_wl_clearfix product">
		<div class="wpb_wl_images">
			<div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>">
				<figure class="woocommerce-product-gallery__wrapper">
					<?php
					$attributes = array(
						'title'                   => $image_title,
						'data-src'                => $full_size_image[0],
						'data-large_image'        => $full_size_image[0],
						'data-large_image_width'  => $full_size_image[1],
						'data-large_image_height' => $full_size_image[2],
					);

					if ( has_post_thumbnail() ) {
						$html  = '<div data-thumb="' . get_the_post_thumbnail_url( $post->ID, 'shop_thumbnail' ) . '" class="woocommerce-product-gallery__image"><a href="' . esc_url( $full_size_image[0] ) . '" data-fancybox="gallery-'. esc_attr( $gallery_id ) .'">';
						$html .= get_the_post_thumbnail( $post->ID, 'shop_single', $attributes );
						$html .= '</a></div>';
					} else {
						$html  = '<div class="woocommerce-product-gallery__image--placeholder">';
						$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
						$html .= '</div>';
					}

					echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, get_post_thumbnail_id( $post->ID ) );

					?>
				</figure>

				<?php if ( $attachment_ids && has_post_thumbnail() ): ?>
					<div class="thumbnails <?php echo esc_attr( 'columns-' . $columns ) ?>">
						<?php
							$loop = 0;
							foreach ( $attachment_ids as $attachment_id ) {
								$full_size_image = wp_get_attachment_image_src( $attachment_id, 'full' );
								$thumbnail       = wp_get_attachment_image_src( $attachment_id, 'shop_thumbnail' );
								$image_title     = get_post_field( 'post_excerpt', $attachment_id );
								$gallery_classes = array();

								$attributes = array(
									'title'                   => $image_title,
									'data-src'                => $full_size_image[0],
									'data-large_image'        => $full_size_image[0],
									'data-large_image_width'  => $full_size_image[1],
									'data-large_image_height' => $full_size_image[2],
								);

								if ( $loop == 0 || $loop % $columns == 0 ){
									$gallery_classes[] = 'first';
								}

								if ( ( $loop + 1 ) % $columns == 0 ){
									$gallery_classes[] = 'last';
								}

								$gallery_classes = esc_attr( implode( ' ', $gallery_classes ) );

								$html  = '<a class="'. $gallery_classes .'" href="' . esc_url( $full_size_image[0] ) . '" data-fancybox="gallery-'. esc_attr( $gallery_id ) .'">';
								$html .= wp_get_attachment_image( $attachment_id, 'shop_single', false, $attributes );
						 		$html .= '</a>';

								echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $attachment_id );

								$loop++;
							}
						?>
					</div>
				<?php endif; ?>
			</div>
		</div>
		<div class="wpb_wl_summary">
			<!-- Product Title -->
			<h2 class="wpb_wl_product_title"><?php the_title();?></h2>

			<!-- Product Price -->
			<?php if ( $price_html = $product->get_price_html() ) : ?>
				<span class="price wpb_wl_product_price"><?php echo $price_html; ?></span>
			<?php endif; ?>

			<!-- Product short description -->
			<?php woocommerce_template_single_excerpt();?>

			<!-- Product cart link -->
			<?php woocommerce_template_single_add_to_cart();?>

		</div>
	</div>


	<?php
	endwhile;
	endif;

	// Reset Post Data
	wp_reset_postdata(); ?>
	</p>
<?php } // topicals ?>

<?php if ( in_array( get_post_type(), array( 'growers' ) ) ) { ?>
	<p class="wpd-productbuttons">

	<?php
	$viewbtntext = "Details";
	$btntext     = apply_filters( 'wpdwc_view_details_button_text', $viewbtntext );
	$newviewbtn  = '<a href="'. get_permalink() .'" class="button wpd-connect-btn">' . $btntext . '</a>';

	echo apply_filters('wpdwc_view_details_button_link', $newviewbtn );

	global $post;
	$growerid = $post->ID;
	$args     = array(
		'meta_key'       => '_selected_growers',
		'meta_value'     => $growerid,
		'post_type'      => 'product',
		'posts_per_page' => -1
	);
	$wpd_wooconnect = new WP_Query( $args );
	if ( $wpd_wooconnect->have_posts() ) :
	while ( $wpd_wooconnect->have_posts() ) : $wpd_wooconnect->the_post();

	$buybtntext = "Buy Now!";

	global $product;
	$productID = get_the_ID();

	if ( 'outofstock' === get_post_meta( $productID, '_stock_status', true ) ) { ?>
		<span class="wpd-wooconnect-outofstock">Out of Stock</span>
	<?php } else { ?>
		<a href="#wpb_wl_quick_view_<?php echo get_the_id(); ?>" data-effect="mfp-zoom-in" class="wpb_wl_preview open-popup-link button wpd-connect-btn buy-now"><?php echo apply_filters( 'wpdwc_buy_now_button_text', $buybtntext ); ?></a>
	<?php
	} // outofstock

	global $post, $woocommerce, $product;

	$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 3 );
	$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
	$full_size_image   = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
	$image_title       = get_post_field( 'post_excerpt', $post_thumbnail_id );
	$placeholder       = has_post_thumbnail() ? 'with-images' : 'without-images';
	$wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
		'woocommerce-product-gallery',
		'woocommerce-product-gallery--' . $placeholder,
		'woocommerce-product-gallery--columns-' . absint( $columns ),
		'images',
	) );
	$attachment_ids = $product->get_gallery_image_ids();
	$gallery_id     = rand( 100,1000 );
	?>
	<div id="wpb_wl_quick_view_<?php echo get_the_id(); ?>" class="mfp-hide mfp-with-anim wpb_wl_quick_view_content wpb_wl_clearfix product">
		<div class="wpb_wl_images">
			<div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>">
				<figure class="woocommerce-product-gallery__wrapper">
					<?php
					$attributes = array(
						'title'                   => $image_title,
						'data-src'                => $full_size_image[0],
						'data-large_image'        => $full_size_image[0],
						'data-large_image_width'  => $full_size_image[1],
						'data-large_image_height' => $full_size_image[2],
					);

					if ( has_post_thumbnail() ) {
						$html  = '<div data-thumb="' . get_the_post_thumbnail_url( $post->ID, 'shop_thumbnail' ) . '" class="woocommerce-product-gallery__image"><a href="' . esc_url( $full_size_image[0] ) . '" data-fancybox="gallery-'. esc_attr( $gallery_id ) .'">';
						$html .= get_the_post_thumbnail( $post->ID, 'shop_single', $attributes );
						$html .= '</a></div>';
					} else {
						$html  = '<div class="woocommerce-product-gallery__image--placeholder">';
						$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
						$html .= '</div>';
					}

					echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, get_post_thumbnail_id( $post->ID ) );
					?>
				</figure>

				<?php if ( $attachment_ids && has_post_thumbnail() ): ?>
					<div class="thumbnails <?php echo esc_attr( 'columns-' . $columns ) ?>">
						<?php
							$loop = 0;
							foreach ( $attachment_ids as $attachment_id ) {
								$full_size_image = wp_get_attachment_image_src( $attachment_id, 'full' );
								$thumbnail       = wp_get_attachment_image_src( $attachment_id, 'shop_thumbnail' );
								$image_title     = get_post_field( 'post_excerpt', $attachment_id );
								$gallery_classes = array();

								$attributes = array(
									'title'                   => $image_title,
									'data-src'                => $full_size_image[0],
									'data-large_image'        => $full_size_image[0],
									'data-large_image_width'  => $full_size_image[1],
									'data-large_image_height' => $full_size_image[2],
								);

								if ( $loop == 0 || $loop % $columns == 0 ){
									$gallery_classes[] = 'first';
								}

								if ( ( $loop + 1 ) % $columns == 0 ){
									$gallery_classes[] = 'last';
								}

								$gallery_classes = esc_attr( implode( ' ', $gallery_classes ) );

								$html  = '<a class="'. $gallery_classes .'" href="' . esc_url( $full_size_image[0] ) . '" data-fancybox="gallery-'. esc_attr( $gallery_id ) .'">';
								$html .= wp_get_attachment_image( $attachment_id, 'shop_single', false, $attributes );
						 		$html .= '</a>';

								echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $attachment_id );

								$loop++;
							}
						?>
					</div>
				<?php endif; ?>
			</div>
		</div>
		<div class="wpb_wl_summary">
			<!-- Product Title -->
			<h2 class="wpb_wl_product_title"><?php the_title();?></h2>

			<!-- Product Price -->
			<?php if ( $price_html = $product->get_price_html() ) : ?>
				<span class="price wpb_wl_product_price"><?php echo $price_html; ?></span>
			<?php endif; ?>

			<!-- Product short description -->
			<?php woocommerce_template_single_excerpt();?>

			<!-- Product cart link -->
			<?php woocommerce_template_single_add_to_cart();?>

		</div>
	</div>

	<?php
	endwhile;
	endif;

	// Reset Post Data
	wp_reset_postdata();
	?>

	</p>
<?php } // growers ?>

<?php if ( in_array( get_post_type(), array( 'tinctures' ) ) ) { ?>
	<p class="wpd-productbuttons">

	<?php
	$viewbtntext = "Details";
	$btntext     = apply_filters( 'wpdwc_view_details_button_text', $viewbtntext );
	$newviewbtn  = '<a href="'. get_permalink() .'" class="button wpd-connect-btn">' . $btntext . '</a>';

	echo apply_filters('wpdwc_view_details_button_link', $newviewbtn );

	global $post;
	$tinctureid = $post->ID;
	$args       = array(
		'meta_key'       => '_selected_tinctures',
		'meta_value'     => $tinctureid,
		'post_type'      => 'product',
		'posts_per_page' => -1
	);
	$wpd_wooconnect = new WP_Query( $args );
	if ( $wpd_wooconnect->have_posts() ) :
	while ( $wpd_wooconnect->have_posts() ) : $wpd_wooconnect->the_post();

	$buybtntext = "Buy Now!";

	global $product;
	$productID = get_the_ID();

	if ( 'outofstock' === get_post_meta( $productID, '_stock_status', true ) ) { ?>
		<span class="wpd-wooconnect-outofstock">Out of Stock</span>
	<?php } else { ?>
		<a href="#wpb_wl_quick_view_<?php echo get_the_id(); ?>" data-effect="mfp-zoom-in" class="wpb_wl_preview open-popup-link button wpd-connect-btn buy-now"><?php echo apply_filters( 'wpdwc_buy_now_button_text', $buybtntext ); ?></a>
	<?php
	} // outofstock

	global $post, $woocommerce, $product;

	$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 3 );
	$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
	$full_size_image   = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
	$image_title       = get_post_field( 'post_excerpt', $post_thumbnail_id );
	$placeholder       = has_post_thumbnail() ? 'with-images' : 'without-images';
	$wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
		'woocommerce-product-gallery',
		'woocommerce-product-gallery--' . $placeholder,
		'woocommerce-product-gallery--columns-' . absint( $columns ),
		'images',
	) );
	$attachment_ids = $product->get_gallery_image_ids();
	$gallery_id     = rand( 100,1000 );
	?>
	<div id="wpb_wl_quick_view_<?php echo get_the_id(); ?>" class="mfp-hide mfp-with-anim wpb_wl_quick_view_content wpb_wl_clearfix product">
		<div class="wpb_wl_images">
			<div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>">
				<figure class="woocommerce-product-gallery__wrapper">
					<?php
					$attributes = array(
						'title'                   => $image_title,
						'data-src'                => $full_size_image[0],
						'data-large_image'        => $full_size_image[0],
						'data-large_image_width'  => $full_size_image[1],
						'data-large_image_height' => $full_size_image[2],
					);

					if ( has_post_thumbnail() ) {
						$html  = '<div data-thumb="' . get_the_post_thumbnail_url( $post->ID, 'shop_thumbnail' ) . '" class="woocommerce-product-gallery__image"><a href="' . esc_url( $full_size_image[0] ) . '" data-fancybox="gallery-'. esc_attr( $gallery_id ) .'">';
						$html .= get_the_post_thumbnail( $post->ID, 'shop_single', $attributes );
						$html .= '</a></div>';
					} else {
						$html  = '<div class="woocommerce-product-gallery__image--placeholder">';
						$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
						$html .= '</div>';
					}

					echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, get_post_thumbnail_id( $post->ID ) );

					?>
				</figure>

				<?php if ( $attachment_ids && has_post_thumbnail() ): ?>
					<div class="thumbnails <?php echo esc_attr( 'columns-' . $columns ) ?>">
						<?php
							$loop = 0;
							foreach ( $attachment_ids as $attachment_id ) {
								$full_size_image = wp_get_attachment_image_src( $attachment_id, 'full' );
								$thumbnail       = wp_get_attachment_image_src( $attachment_id, 'shop_thumbnail' );
								$image_title     = get_post_field( 'post_excerpt', $attachment_id );
								$gallery_classes = array();

								$attributes = array(
									'title'                   => $image_title,
									'data-src'                => $full_size_image[0],
									'data-large_image'        => $full_size_image[0],
									'data-large_image_width'  => $full_size_image[1],
									'data-large_image_height' => $full_size_image[2],
								);

								if ( $loop == 0 || $loop % $columns == 0 ){
									$gallery_classes[] = 'first';
								}

								if ( ( $loop + 1 ) % $columns == 0 ){
									$gallery_classes[] = 'last';
								}

								$gallery_classes = esc_attr( implode( ' ', $gallery_classes ) );

								$html  = '<a class="'. $gallery_classes .'" href="' . esc_url( $full_size_image[0] ) . '" data-fancybox="gallery-'. esc_attr( $gallery_id ) .'">';
								$html .= wp_get_attachment_image( $attachment_id, 'shop_single', false, $attributes );
						 		$html .= '</a>';

								echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $attachment_id );

								$loop++;
							}
						?>
					</div>
				<?php endif; ?>
			</div>
		</div>
		<div class="wpb_wl_summary">
			<!-- Product Title -->
			<h2 class="wpb_wl_product_title"><?php the_title();?></h2>

			<!-- Product Price -->
			<?php if ( $price_html = $product->get_price_html() ) : ?>
				<span class="price wpb_wl_product_price"><?php echo $price_html; ?></span>
			<?php endif; ?>

			<!-- Product short description -->
			<?php woocommerce_template_single_excerpt();?>

			<!-- Product cart link -->
			<?php woocommerce_template_single_add_to_cart();?>

		</div>
	</div>

	<?php
	endwhile;
	endif;

	// Reset Post Data
	wp_reset_postdata(); ?>
	</p>
<?php } // tinctures ?>

<?php if ( in_array( get_post_type(), array( 'gear' ) ) ) { ?>
	<p class="wpd-productbuttons">

	<?php
	$viewbtntext = "Details";
	$btntext     = apply_filters( 'wpdwc_view_details_button_text', $viewbtntext );
	$newviewbtn  = '<a href="'. get_permalink() .'" class="button wpd-connect-btn">' . $btntext . '</a>';

	echo apply_filters('wpdwc_view_details_button_link', $newviewbtn );

	global $post;
	$gearid = $post->ID;
	$args   = array(
		'meta_key'       => '_selected_gear',
		'meta_value'     => $gearid,
		'post_type'      => 'product',
		'posts_per_page' => -1
	);
	$wpd_wooconnect = new WP_Query( $args );
	if ( $wpd_wooconnect->have_posts() ) :
	while ( $wpd_wooconnect->have_posts() ) : $wpd_wooconnect->the_post();

	$buybtntext = "Buy Now!";

	global $product;
	$productID = get_the_ID();

	if ( 'outofstock' === get_post_meta( $productID, '_stock_status', true ) ) { ?>
		<span class="wpd-wooconnect-outofstock">Out of Stock</span>
	<?php } else { ?>
		<a href="#wpb_wl_quick_view_<?php echo get_the_id(); ?>" data-effect="mfp-zoom-in" class="wpb_wl_preview open-popup-link button wpd-connect-btn buy-now"><?php echo apply_filters( 'wpdwc_buy_now_button_text', $buybtntext ); ?></a>
	<?php
	} // outofstock

	global $post, $woocommerce, $product;

	$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 3 );
	$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
	$full_size_image   = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
	$image_title       = get_post_field( 'post_excerpt', $post_thumbnail_id );
	$placeholder       = has_post_thumbnail() ? 'with-images' : 'without-images';
	$wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
		'woocommerce-product-gallery',
		'woocommerce-product-gallery--' . $placeholder,
		'woocommerce-product-gallery--columns-' . absint( $columns ),
		'images',
	) );
	$attachment_ids = $product->get_gallery_image_ids();
	$gallery_id     = rand( 100,1000 );
	?>
	<div id="wpb_wl_quick_view_<?php echo get_the_id(); ?>" class="mfp-hide mfp-with-anim wpb_wl_quick_view_content wpb_wl_clearfix product">
		<div class="wpb_wl_images">
			<div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>">
				<figure class="woocommerce-product-gallery__wrapper">
					<?php
					$attributes = array(
						'title'                   => $image_title,
						'data-src'                => $full_size_image[0],
						'data-large_image'        => $full_size_image[0],
						'data-large_image_width'  => $full_size_image[1],
						'data-large_image_height' => $full_size_image[2],
					);

					if ( has_post_thumbnail() ) {
						$html  = '<div data-thumb="' . get_the_post_thumbnail_url( $post->ID, 'shop_thumbnail' ) . '" class="woocommerce-product-gallery__image"><a href="' . esc_url( $full_size_image[0] ) . '" data-fancybox="gallery-'. esc_attr( $gallery_id ) .'">';
						$html .= get_the_post_thumbnail( $post->ID, 'shop_single', $attributes );
						$html .= '</a></div>';
					} else {
						$html  = '<div class="woocommerce-product-gallery__image--placeholder">';
						$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
						$html .= '</div>';
					}

					echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, get_post_thumbnail_id( $post->ID ) );

					?>
				</figure>

				<?php if ( $attachment_ids && has_post_thumbnail() ): ?>
					<div class="thumbnails <?php echo esc_attr( 'columns-' . $columns ) ?>">
						<?php
							$loop = 0;
							foreach ( $attachment_ids as $attachment_id ) {
								$full_size_image = wp_get_attachment_image_src( $attachment_id, 'full' );
								$thumbnail       = wp_get_attachment_image_src( $attachment_id, 'shop_thumbnail' );
								$image_title     = get_post_field( 'post_excerpt', $attachment_id );
								$gallery_classes = array();

								$attributes = array(
									'title'                   => $image_title,
									'data-src'                => $full_size_image[0],
									'data-large_image'        => $full_size_image[0],
									'data-large_image_width'  => $full_size_image[1],
									'data-large_image_height' => $full_size_image[2],
								);

								if ( $loop == 0 || $loop % $columns == 0 ){
									$gallery_classes[] = 'first';
								}

								if ( ( $loop + 1 ) % $columns == 0 ){
									$gallery_classes[] = 'last';
								}

								$gallery_classes = esc_attr( implode( ' ', $gallery_classes ) );

								$html  = '<a class="'. $gallery_classes .'" href="' . esc_url( $full_size_image[0] ) . '" data-fancybox="gallery-'. esc_attr( $gallery_id ) .'">';
								$html .= wp_get_attachment_image( $attachment_id, 'shop_single', false, $attributes );
						 		$html .= '</a>';

								echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $attachment_id );

								$loop++;
							}
						?>
					</div>
				<?php endif; ?>
			</div>
		</div>
		<div class="wpb_wl_summary">
			<!-- Product Title -->
			<h2 class="wpb_wl_product_title"><?php the_title();?></h2>

			<!-- Product Price -->
			<?php if ( $price_html = $product->get_price_html() ) : ?>
				<span class="price wpb_wl_product_price"><?php echo $price_html; ?></span>
			<?php endif; ?>

			<!-- Product short description -->
			<?php woocommerce_template_single_excerpt();?>

			<!-- Product cart link -->
			<?php woocommerce_template_single_add_to_cart();?>

		</div>
	</div>

	<?php
	endwhile;
	endif;

	// Reset Post Data
	wp_reset_postdata(); ?>
	</p>
<?php } // gear ?>

<?php }
