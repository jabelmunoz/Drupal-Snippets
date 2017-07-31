<?php
/**
  To add custom CSS classes to a paragraph (or any other entity for that matter)

   - Add a text field to an entity called CSS Class (field_css_class)
   - Hide that text field from the display mode of that entity
   - In the custom module add the following code
   - Clear the cache and now you can style based on that class that you add
**/

/**
 * Implements template_preprocess_entity().
 */
function MODULE_NAME_preprocess_entity(&$variables, $hook) {
  $entity = $variables[$variables['entity_type']];
  // Add CSS classes to entity wrappers.
  $wrapper = entity_metadata_wrapper($variables['entity_type'], $entity);
  if (isset($wrapper->field_css_class)) {
    $classes = $wrapper->field_css_class->value();
    $classes_array = explode(' ', $classes);
    foreach ($classes_array as $a_class) {
      $a_class = trim($a_class);
      if (!empty($a_class)) {
        $variables['classes_array'][] = drupal_html_class($a_class);
      }
    }
  }
}
?>