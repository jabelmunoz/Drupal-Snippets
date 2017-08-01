<?php

/**
  *
  * This is to hide the title in the page when Title is not needed
  * Add a boolean field to content type with single on/off checkbox
  *
**/


/**
 * Override or insert variables into the page templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */

// This goes in the template.php file
  function iusd_theme_preprocess_page(&$variables, $hook) {
    $node = menu_get_object();

    if ($node && !empty($node->field_hide_node_title[LANGUAGE_NONE][0]['value'])) {
      $variables['hide_node_title'] = TRUE;
    }
  }
?>

  /** This goes in the page.tpl.php **/
  <?php if ($title && empty($hide_node_title)): ?>
    <h1 class="title" id="page-title"><?php print $title; ?></h1>
  <?php endif; ?>