<?php /*
 * PHR_DrupalEshop
 *
 * Copyright (C) 1999-2013 Photon Infotech Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *         http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
*/ ?>
<?php

/**
 * Return a themed breadcrumb trail.
 *
 * @param $breadcrumb
 *   An array containing the breadcrumb links.
 * @return a string containing the breadcrumb output.
 */
function shop_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];

  if (!empty($breadcrumb)) {
    // Provide a navigational heading to give context for breadcrumb links to
    // screen-reader users. Make the heading invisible with .element-invisible.
    $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';

    $output .= '<div class="breadcrumb">' . implode(' › ', $breadcrumb) . '</div>';
    return $output;
  }
}

/**
 * Override or insert variables into the maintenance page template.
 */
function shop_preprocess_maintenance_page(&$vars) {
  // While markup for normal pages is split into page.tpl.php and html.tpl.php,
  // the markup for the maintenance page is all in the single
  // maintenance-page.tpl.php template. So, to have what's done in
  // shop_preprocess_html() also happen on the maintenance page, it has to be
  // called here.
  shop_preprocess_html($vars);
}

/**
 * Override or insert variables into the html template.
 */
function shop_preprocess_html(&$vars) {
  // Toggle fixed or fluid width.
  if (theme_get_setting('shop_width') == 'fluid') {
    $vars['classes_array'][] = 'fluid-width';
  }
  // Add conditional CSS for IE6.
  drupal_add_css(path_to_theme() . '/fix-ie.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'lt IE 7', '!IE' => FALSE), 'preprocess' => FALSE));
}

/**
 * Override or insert variables into the html template.
 */
function shop_process_html(&$vars) {
  // Hook into color.module
  if (module_exists('color')) {
    _color_html_alter($vars);
  }
}

/**
 * Override or insert variables into the page template.
 */
function shop_preprocess_page(&$vars) {
  // Move secondary tabs into a separate variable.
  $vars['tabs2'] = array(
    '#theme' => 'menu_local_tasks',
    '#secondary' => $vars['tabs']['#secondary'],
  );
  unset($vars['tabs']['#secondary']);

  if (isset($vars['main_menu'])) {
    $vars['primary_nav'] = theme('links__system_main_menu', array(
      'links' => $vars['main_menu'],
      'attributes' => array(
        'class' => array('links', 'inline', 'main-menu'),
      ),
      'heading' => array(
        'text' => t('Main menu'),
        'level' => 'h2',
        'class' => array('element-invisible'),
      )
    ));
  }
  else {
    $vars['primary_nav'] = FALSE;
  }
  if (isset($vars['secondary_menu'])) {
    $vars['secondary_nav'] = theme('links__system_secondary_menu', array(
      'links' => $vars['secondary_menu'],
      'attributes' => array(
        'class' => array('links', 'inline', 'secondary-menu'),
      ),
      'heading' => array(
        'text' => t('Secondary menu'),
        'level' => 'h2',
        'class' => array('element-invisible'),
      )
    ));
  }
  else {
    $vars['secondary_nav'] = FALSE;
  }

  // Prepare header.
  $site_fields = array();
  if (!empty($vars['site_name'])) {
    $site_fields[] = $vars['site_name'];
  }
  if (!empty($vars['site_slogan'])) {
    $site_fields[] = $vars['site_slogan'];
  }
  $vars['site_title'] = implode(' ', $site_fields);
  if (!empty($site_fields)) {
    $site_fields[0] = '<span>' . $site_fields[0] . '</span>';
  }
  $vars['site_html'] = implode(' ', $site_fields);

  // Set a variable for the site name title and logo alt attributes text.
  $slogan_text = $vars['site_slogan'];
  $site_name_text = $vars['site_name'];
  $vars['site_name_and_slogan'] = $site_name_text . ' ' . $slogan_text;
}

/**
 * Override or insert variables into the node template.
 */
function shop_preprocess_node(&$vars) {
  $vars['submitted'] = $vars['date'] . ' — ' . $vars['name'];
}

/**
 * Override or insert variables into the comment template.
 */
function shop_preprocess_comment(&$vars) {
  $vars['submitted'] = $vars['created'] . ' — ' . $vars['author'];
}

/**
 * Override or insert variables into the block template.
 */
function shop_preprocess_block(&$vars) {
  $vars['title_attributes_array']['class'][] = 'title';
  $vars['classes_array'][] = 'clearfix';
}

/**
 * Override or insert variables into the page template.
 */
function shop_process_page(&$vars) {
  // Hook into color.module
  if (module_exists('color')) {
    _color_page_alter($vars);
  }
}

/**
 * Override or insert variables into the region template.
 */
function shop_preprocess_region(&$vars) {
  if ($vars['region'] == 'header') {
    $vars['classes_array'][] = 'clearfix';
  }
}


function shop_links__system_main_menu($variables){
  $links = $variables['links'];
  $attributes = $variables['attributes'];
  $heading = $variables['heading'];
  global $language_url;
  $output = '';

  if (count($links) > 0) {
    $output = '';

    // Treat the heading first if it is present to prepend it to the
    // list of links.
    if (!empty($heading)) {
      if (is_string($heading)) {
        // Prepare the array that will be used when the passed heading
        // is a string.
        $heading = array(
          'text' => $heading,
          // Set the default level of the heading.
          'level' => 'h2',
        );
      }
      $output .= '<' . $heading['level'];
      if (!empty($heading['class'])) {
        $output .= drupal_attributes(array('class' => $heading['class']));
      }
      $output .= '>' . check_plain($heading['text']) . '</' . $heading['level'] . '>';
    }

    $output .= '<ul' . drupal_attributes($attributes) . '>';

    $num_links = count($links);
    $i = 1;

    foreach ($links as $key => $link) {
      $class = array($key);

      // Add first, last and active classes to the list of links to help out themers.
      if ($i == 1) {
        $class[] = 'first';
      }
      if ($i == $num_links) {
        $class[] = 'last';
      }
      if (isset($link['href']) && ($link['href'] == $_GET['q'] || ($link['href'] == '<front>' && drupal_is_front_page()))
          && (empty($link['language']) || $link['language']->language == $language_url->language)) {
        $class[] = 'active';
      }
      $output .= '<li' . drupal_attributes(array('class' => $class)) . '>';

      if (isset($link['href'])) {
        // Pass in $link as $options, they share the same keys.
        $output .= l($link['title'], $link['href'], $link);
      }
      elseif (!empty($link['title'])) {
        // Some links are actually not links, but we wrap these in <span> for adding title and class attributes.
        if (empty($link['html'])) {
          $link['title'] = check_plain($link['title']);
        }
        $span_attributes = '';
        if (isset($link['attributes'])) {
          $span_attributes = drupal_attributes($link['attributes']);
        }
        $output .= '<span' . $span_attributes . '>' . $link['title'] . '</span>';
      }

      $i++;
      $output .= "</li>\n";
    }

    $output .= '</ul>';
  }

  return $output;
}

function shop_form_alter(&$form, &$form_state, $form_id) {
  if ($form_id == 'search_block_form') {
    $form['search_block_form']['#title'] = t('Search'); // Change the text on the label element
    $form['search_block_form']['#title_display'] = 'invisible'; // Toggle label visibilty
    $form['search_block_form']['#size'] = 40;  // define size of the textfield
    $form['search_block_form']['#default_value'] = t('Search'); // Set a default value for the textfield
    $form['actions']['submit']['#value'] = t('GO!'); // Change the text on the submit button
    $form['actions']['submit'] = array('#type' => 'image_button', '#src' => base_path() . path_to_theme() . '/images/search.gif');

// Add extra attributes to the text box
    $form['search_block_form']['#attributes']['onblur'] = "if (this.value == '') {this.value = 'Search';}";
    $form['search_block_form']['#attributes']['onfocus'] = "if (this.value == 'Search') {this.value = '';}";
  }
} 

function shop_uc_cart_block_summary($variables) {
  $item_count = $variables['item_count'];
  $item_text = $variables['item_text'];
  $total = $variables['total'];
  $summary_links = $variables['summary_links'];

  // Build the basic table with the number of items in the cart and total.
  $output = '<div class="cart_details">'
           . $item_text . '<br />'
           . '<span class="border_cart"></span>' . t('Total:')
           . '<span class="price"> ' . theme('uc_price', array('price' => $total)) . '</span></div>';

  // If there are products in the cart...
  if ($item_count > 0) {
    // Add a view cart link.
    $output .= '<tr class="cart-block-summary-links"><td colspan="2">'
             . theme('links', array('links' => $summary_links)) . '</td></tr>';
  }

  $output .= '</tbody></table>';

  return $output;
}

function shop_uc_cart_block_items($variables) {
  $items = $variables['items'];
  $class = $variables['collapsed'] ? 'cart-block-items collapsed' : 'cart-block-items';

  // If there are items in the shopping cart...
  if ($items) {
    $output = '<table class="' . $class . '"><tbody>';

    // Loop through each item.
    $row_class = 'odd';
    foreach ($items as $item) { 
      // Add the basic row with quantity, title, and price.  // Sudhakar
      $output .= '<tr class="' . $row_class . '"><td class="cart-block-item-qty"><span style=font-size:12px;> ' . $item['qty'] . '</span></td>'
                . '<td class="cart-block-item-title"><span style=font-size:11px;>' . $item['title'] . '</span></td>'
                . '<td class="cart-block-item-price"><span style=font-size:11px;>' . theme('uc_price', array('price' => $item['price'])) . '</span></td></tr>';

      // Add a row of description if necessary.
      if ($item['desc']) {
        $output .= '<tr class="' . $row_class . '"><td colspan="3" class="cart-block-item-desc">' . $item['desc'] . '</td></tr>';
      }

      // Alternate the class for the rows.
      $row_class = ($row_class == 'odd') ? 'even' : 'odd';
    }

    $output .= '</tbody></table>';
  }
  else {
    // Otherwise display an empty message.
    $output = '<p class="' . $class . '"><span style=font-size:11px;>' . t('There are no products in your shopping cart.') . '</span></p>';
  }

  return $output;
}



function shop_uc_product_price($variables) {
  $element = $variables['element'];
  $price = $element['#value'];
  $attributes = isset($element['#attributes']) ? $element['#attributes'] : array();
  $label = isset($element['#title']) ? $element['#title'] : '';

  if (isset($attributes['class'])) {
    array_unshift($attributes['class'], 'product-info');
  }
  else {
    $attributes['class'] = array('product-info');
  }

 // $output = '<div ' . drupal_attributes($attributes) . '>'; // Sudhakar
/*  if ($label) {
    $output .= '<span class="uc-price-label">' . $label . '</span> ';
  }
 */ 
  $output = theme('uc_price', array('price' => $price));
  $output .= drupal_render_children($element); 
 // $output .= '</div>'; // Sudhakar

  return $output;
}

/**
 * Formats a product's weight.
 *
 * @ingroup themeable
 */
function shop_uc_product_weight($variables) {
  $amount = $variables['amount'];
  $units = $variables['units'];

//  $output = '<div class="product-info weight">'; // Sudhakar
  $output = t('!weight', array('!weight' => uc_weight_format($amount, $units)));
//  $output .= '</div>'; // Sudhakar

  return $output;
}

/**
 * Formats a product's length, width, and height.
 *
 * @ingroup themeable
 */
function shop_uc_product_dimensions($variables) {
  $length = $variables['length'];
  $width = $variables['width'];
  $height = $variables['height'];
  $units = $variables['units'];

//  $output = '<div class="product-info dimensions">'; // Sudhakar
  $output = t('!length × !width × !height', array('!length' => uc_length_format($length, $units), '!width' => uc_length_format($width, $units), '!height' => uc_length_format($height, $units)));
  //$output .= '</div>'; // Sudhakar

  return $output;
}

/**
 * Formats a product's images with imagecache and an image widget
 * (Colorbox, Thickbox, or Lightbox2).
 *
 * @ingroup themeable
 */
function shop_uc_product_image($variables) {
  static $rel_count = 0;
  $images = $variables['images'];

  // Get the current product image widget.
  $image_widget = uc_product_get_image_widget();

  $first = array_shift($images);

  //$output = '<div class="product-image"><div class="main-product-image">';  // Sudhakar
  $output = '<div class="product_img_big">';
  $output .= '<a href="' . image_style_url('uc_product_full', $first['uri']) . '" title="' . $first['title'] . '"';
  if ($image_widget) {
    $image_widget_func = $image_widget['callback'];
    $output .= $image_widget_func($rel_count);
  } 
  $output .= '>';
  $output .= theme('image_style', array(
    'style_name' => 'uc_product',
    'path' => $first['uri'],
    'alt' => $first['alt'],
    'title' => $first['title'],
	'width' => 100,   // Sudhakar
	'height' => 92,    // Sudhakar
  ));
 // $output .= '</a></div>';  // Sudhakar
  $output .= '</a>';

  if (!empty($images)) {
    $output .= '<div class="more-product-images">';
    foreach ($images as $thumbnail) {
      // Node preview adds extra values to $images that aren't files.
      if (!is_array($thumbnail) || empty($thumbnail['uri'])) {
        continue;
      }
      $output .= '<a href="' . image_style_url('uc_product_full', $thumbnail['uri']) . '" title="' . $thumbnail['title'] . '"';
      if ($image_widget) {
        $output .= $image_widget_func($rel_count);
      }
      $output .= '>';
      $output .= theme('image_style', array(
        'style_name' => 'uc_thumbnail',
        'path' => $thumbnail['uri'],
        'alt' => $thumbnail['alt'],
        'title' => $thumbnail['title'],
      ));
      $output .= '</a>';
    }
    $output .= '</div>';
  }

  $output .= '</div>';
  $rel_count++;

  return $output;
}

