<?php
/**
 * @file
 *   Version Control API field handler to be able to generate bug tracker
 *   links.
 */
class versioncontrol_handler_field_operation_message extends views_handler_field {
  function option_definition() {
    $options = parent::option_definition();
    $options['issue_tracker_url'] = array('default' => '', 'translatable' => TRUE);
    return $options;
  }

  function options_form(&$form, &$form_state) {
    parent::options_form($form, $form_state);
    $form['issue_tracker_url'] = array(
      '#type' => 'textfield',
      '#title' => t('Issue tracker URL'),
      '#description' => t('Convert #123 into a link to the issue tracker. Use %issue_id in the place the issue ID should be replaced. For example http://drupal.org/node/%issue_id'),
      '#default_value' => empty($this->options['issue_tracker_url']) ? '' : $this->options['issue_tracker_url'],
    );
  }

  function render($values) {
    $message = check_plain($values->{$this->field_alias});
    if (empty($this->options['issue_tracker_url'])) {
      return $message;
    }
    $replacement = sprintf('<a href="%s">#\\1</a>', strtr($this->options['issue_tracker_url'], array('%issue_id' => '\\1')));
    return preg_replace('/#(\d+)\b/i', $replacement, $message);
  }
}
