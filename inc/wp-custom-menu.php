<?php
/**
 * Helper functions for building ASU Web Standards 2.0 menus.
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'asu_wp_get_menu_array' ) ) {
	/**
	 * Load requested menu object and format into hierarchical array
	 * for the custom WP nav menu builders.
	 *
	 * @param string $menu_name Slug name of desired menu.
	 */
	function asu_wp_get_menu_formatted_array( $menu_name ) {

		$locations = get_nav_menu_locations();
		if ( isset( $locations[ $menu_name ] ) ) {
			$menu_object = wp_get_nav_menu_object( $locations[ $menu_name ] );
			$array_menu  = wp_get_nav_menu_items( $menu_object->term_id );

			// array_menu will return false if there are no menu options.
			if ( ! $array_menu ) {
				$array_menu = array();
			}

			/**
			 * Construct a preliminary menu array
			 */

			/**
			 * Step 1: Loop through ALL source menu items we retreived from WordPress,
			 * and add any that DO NOT HAVE a parent item. These would then be
			 * the top-level menu items. We call our menu holding array $menu.
			 */
			$pre_menu = array();
			foreach ( $array_menu as $m ) {
				if ( empty( $m->menu_item_parent ) ) {
					$pre_menu[ $m->ID ] = [
						'text' => $m->title,
						'href' => $m->url,
					];
				}
			}


			/**
			 * Step 2: Loop through ALL source menu items again. If an item has a parent, AND
			 * that parent is in the array we just made in step 1, it is a child item of
			 * a top-level menu item. We place that item's information as a new element in
			 * the $dropdown array.
			 *
			 * The item's information will have the id of the parent item as well.
			 */
			$dropdown = array();
			foreach ( $array_menu as $m ) {
				if ( ! empty( $m->menu_item_parent ) && array_key_exists( $m->menu_item_parent, $pre_menu ) ) {
					$dropdown[ $m->ID ] = [
						'type' => 'heading',
						'text' => $m->title,
						'href' => $m->url,
						'parent' => $m->menu_item_parent
					];

					$pre_menu[ $m->menu_item_parent ]['items'][ $m->ID ] = $dropdown[ $m->ID ];
				}
			}

			/**
			 * Step 3: Loop through every source menu item a third time. If this item has a
			 * parent value, but that value IS NOT IN the top-level menu array, add these
			 * "grandchildren" menu items to the secondary menu level array (required
       * by the UDS menu component.)
			 */
			foreach ( $array_menu as $m ) {
				if ( ! empty( $m->menu_item_parent )  && ! array_key_exists( $m->menu_item_parent, $pre_menu ) ) {

					$dropdown[ $m->menu_item_parent ] = [
						'text' => $m->title,
						'href' => $m->url,
					];

					/**
					 * Determine this item's top-menu item (grandparent) by getting the parent ID of this item's parent.
					 * Adding a check here to ensure that there is a parent array in the parent of this item for us to
					 * add anything to.
					 */
					if ( array_key_exists( 'parent', $dropdown[ $m->menu_item_parent ] ) ) {
						$top_menu = $dropdown[ $m->menu_item_parent ]['parent'];
						$pre_menu[ $top_menu ]['items'][ $m->menu_item_parent ] = $dropdown[ $m->menu_item_parent ];
					}
				}
			}

			// The UDS nav menu requires that we re-format our menu.
			// We must reset the menu IDs from the array keys to sequential array keys, 0 to x.
			// And the items[] nested arrays must be wrapped in an additional array.
			$menu = array();
			$menu[] = [
				'href' => '/',
				'type' => 'icon-home',
				'class' => 'data-class',
				'selected' => true
			];

			foreach ( $pre_menu as $m1 ) {
				$items = [];
				if (isset($m1['items'])) {
					foreach ($m1['items'] as $m2) {
						$items2 = [];
						if (isset($m2['items'])) {
							foreach ($m2['items'] as $m3) {
								$items2[] = [$m3];
							}

							$items[] = [
								'text' => $m2['text'],
								'href' => $m2['href'],
								'items' => [$items2],
							];
						} else {
							$items[] = [
								'text' => $m2['text'],
								'href' => $m2['href'],
							];
						}
					}

					$menu[] = [
						'text' => $m1['text'],
						'href' => $m1['href'],
						'items' => [$items],
					];
				} else {
					$menu[] = [
						'text' => $m1['text'],
						'href' => $m1['href'],
					];
				}
			}

			return $menu;
		} else {
			return;
		}
	}
}

if ( ! function_exists( 'asu_wp_get_menu_depth' ) ) {
	/**
	 * Get the depth of this particular top-level item's hierarchy by inspecting
	 * the 'children' sub-array at each level to determine whether or not
	 * it is empty.
	 *
	 * While we are here, we also compare each child/grandchild's URL to see if
	 * it matches the URL of the currently displayed page, so we can highlight
	 * the top-level menu item.
	 *
	 * @param Array  $item  Array of top-level menu items.
	 * @param String $this_page  The URL of the current page.
	 *
	 * @return Array $item_info Array containing info on the menu item
	 *    $item_info = [
	 *        'depth' => (string) depth of menu: single,children, or grandchildren
	 *        'has_current' => (bool) does this top-level item contain the current page?
	 *        'title'=> (string) text of the menu item
	 *    ]
	 */
	function asu_wp_get_menu_depth( $item = null, $this_page = null ) {

		// create local variable for the current page URL.
		$current_page = $this_page;

		// prepare the array will return with default values.
		$item_info = array(
			'depth'       => 'single',
			'has_current' => false,
			'title'       => $item['title'],
		);

		if ( empty( $item ) ) {
			wp_die( 'Cannot find depth of a menu item that was not provided, or is empty.' );
		}

		// compare the top-level item's URL with the current page URL.
		if ( $current_page === $item['url'] ) {
			$item_info['has_current'] = true;
		}

		// if we have child items under this top-level item, evaluate them.
		if ( ! empty( $item['children'] ) ) {

			// we have at least children, since the array is not empty.
			$item_info['depth'] = 'children';

			/**
			 * We have children. See if any of them are the current page
			 * or if any of them have grandchildren
			 */
			foreach ( $item['children'] as $child ) {

				// If this child's URL is the current URL, update our array.
				if ( $current_page === $child['url'] ) {
					$item_info['has_current'] = true;
				}

				// check to see if this child item also has children.
				if ( ! empty( $child['children'] ) ) {

					// if the child-level item has children, we have grandchildren.
					$item_info['depth'] = 'grandchildren';

					// check each grandchild to see if it is the current page.
					foreach ( $child['children'] as $grandchild ) {
						if ( $current_page === $grandchild['url'] ) {
							$item_info['has_current'] = true;
						}
					}
				}
			}
		}
		return $item_info;
	}
}

if ( ! function_exists( 'asu_wp_render_column_links' ) ) {
	/**
	 * Renders the individual links from the provided child/grandchild list
	 *
	 * @param array $children The array of links for one column.
	 *
	 * @return string A string containing all the <a> tags for the column.
	 */
	function asu_wp_render_column_links( $children = array() ) {

		if ( empty( $children ) ) {
			return 'No Menu Links';
		}

		$links = '';

		foreach ( $children as $child ) {
			// check if menu item is a CTA Button.
			$is_cta_button    = $child['cta_button'];
			$cta_button_color = $child['cta_color'];

			if ( $is_cta_button ) {
				$links .= asu_wp_render_nav_cta_button( $cta_button_color, $child );
			} else {
				$link   = '<a class="dropdown-item" href="%1$s" title="%2$s">%2$s</a>';
				$links .= wp_kses( sprintf( $link, $child['url'], $child['title'] ), wp_kses_allowed_html( 'post' ) );
			}
		}

		return $links;
	}
}

if ( ! function_exists( 'asu_wp_render_nav_item_link' ) ) {
	/**
	 * Renders the top-level link, either as a normal nav link or a drop-down link
	 * Note that we're using the 'default:' case to render our actual default, and
	 * not testing explicitly for the 'single' case of menu depth.
	 *
	 * @param string $menu_type The type of menu, used in the markup id and class names.
	 * @param array  $item      The navigation item whose link we want to render.
	 * @param array  $item_data Array of information about the current top-level nav link.
	 * @return string            The rendered navigation link
	 */
	function asu_wp_render_nav_item_link( $menu_type, $item, $item_data ) {
		$link = '';

		if ( true === $item_data['has_current'] ) {
			$active_classname = 'active';
		} else {
			$active_classname = '';
		}

		switch ( $item['depth'] ) {

			case 'children':
			case 'grandchildren':
				$template = '<a class="nav-link" href="%1$s" id="%2$s-one-col" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			%3$s
			<span class="fa fa-chevron-down"></span>
			</a>';
				$link     = wp_kses( sprintf( $template, $item['url'], $menu_type, $item['title'] ), wp_kses_allowed_html( 'post' ) );
				return $link;

			default:
				$template = '<a class="nav-link %1$s" href="%2$s" title="%3$s">%3$s</a>';
				$link     = wp_kses( sprintf( $template, $active_classname, $item['url'], $item['title'] ), wp_kses_allowed_html( 'post' ) );
				return $link;
		}
	}
}

if ( ! function_exists( 'asu_wp_render_nav_cta_button' ) ) {
	/**
	 * Renders menu link as a CTA button.
	 *
	 * @param string $cta_color The color slug, used in the markup id and class names.
	 * @param array  $item      The navigation item whose CTA button we want to render.
	 *
	 * @return string           The rendered button
	 */
	function asu_wp_render_nav_cta_button( $cta_color, $item ) {
		$button = '';

		$template = '<a href="%1$s" class="btn btn-sm btn-%2$s">%3$s</a>';
		$button   = wp_kses( sprintf( $template, $item['url'], $cta_color, $item['title'] ), wp_kses_allowed_html( 'post' ) );
		return $button;
	}
}
