<?php namespace ProcessWire;

/**
 * Class TwigExtensionsConfig
 */
class TwigExtensionsConfig extends ModuleConfig {

  /**
   * array Default config values
   */
  public function getDefaults() {
    return array(
      'debug' => 1,
      'intl' => 0
    );
  }

  /**
   * Retrieves the list of config input fields
   * Implementation of the ConfigurableModule interface
   *
   * @return InputfieldWrapper
   */
  public function getInputfields() {
    // get submitted data
    $data = array();
    foreach (array('debug', 'intl') as $ext) {
      $data[$ext] = isset($this->data[$ext]) ? $this->data[$ext] : false;
    }

    // get inputfields
    $inputfields = parent::getInputfields();

    // debug
    $field = $this->modules->get('InputfieldCheckbox');
    $field->label = __('Enable the Debug Extension');
    $field->attr('name', 'debug');
    $field->attr('value', 1);
    $field->attr('checked', $data['debug'] === 1 ? 'checked' : '' );
    $field->columnWidth = 50;
    $inputfields->add($field);

    // intl
    $field = $this->modules->get('InputfieldCheckbox');
    $field->label = __('Enable the Intl Extension');
    $field->attr('name', 'intl');
    $field->attr('value', 1);
    $field->attr('checked', $data['intl'] === 1 ? 'checked' : '' );
    $field->columnWidth = 50;
    $inputfields->add($field);

    return $inputfields;
  }

}
