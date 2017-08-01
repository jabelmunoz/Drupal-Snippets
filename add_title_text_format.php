<?php
/*
*   If you need to allow spans or br in title fields this is a way to go about it
*
*   This goes in your custom module
*
*   Add text format Title
*   In Limit allowed HTML tags add <span> <br />
*
*/


/**
 * Implements hook_field_widget_form_alter().
 */
function website_custom_field_widget_form_alter(&$element, &$form_state, $context) {
  if ($context['field']['field_name'] == 'title_field' && $context['instance']['entity_type'] == 'paragraphs_item' && $context['instance']['bundle'] == 'cta_item') {
    // Set the Title field to use Title HTML text format.
    $element['#format'] = 'title_html';
    $element['#process'] = array('filter_process_format', 'website_title_limit_format_to_title_html');
  }
}

/**
 * Widget form process callback.
 */
function website_title_limit_format_to_title_html($element) {
  // Limit to only Title HTML format if user has access.
  if (isset($element['format']['format']['#options']['title_html'])) {
    $element['format']['format']['#options'] = array(
      'title_html' => t('Title HTML'),
      'plain_text' => t('Plain text'),
    );
  }
  else {
    $element['format']['format']['#options'] = array(
      'plain_text' => t('Plain text'),
    );
  }
  return $element;
}
?>