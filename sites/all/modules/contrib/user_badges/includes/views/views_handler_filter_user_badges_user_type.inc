<?php
/**
 * @file
 * A handler to provide filtering of views by badge type
 *
 * @author Richard Skinner (Likeless), http://drupal.org/user/310635
 *
 * @ingroup views_field_handlers
 */
class views_handler_filter_user_badges_user_type extends views_handler_filter_in_operator {

  function get_value_options() {
    $this->value_options = array(
      'user' => t('User Badge'),
      'role' => t('Granted by Role'),
    );
  }
}
