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
      'textExt' => 1,
      'arrayExt' => 1,
      'dateExt' => 1,
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
    foreach (array('debug', 'textExt', 'arrayExt', 'dateExt', 'intl') as $ext) {
      $data[$ext] = isset($this->data[$ext]) ? $this->data[$ext] : false;
    }

    // get inputfields
    $inputfields = parent::getInputfields();

    // Debug Extension checkbox
    $field = $this->modules->get('InputfieldCheckbox');
    $field->label = __('Enable the Debug Extension');
    $field->attr('name', 'debug');
    $field->attr('value', 1);
    $field->attr('checked', $data['debug'] === 1 ? 'checked' : '' );
    $field->columnWidth = 50;
    $inputfields->add($field);

    // Text Extension checkbox
    $field = $this->modules->get('InputfieldCheckbox');
    $field->label = __('Enable the Text Extension');
    $field->attr('name', 'textExt');
    $field->attr('value', 1);
    $field->attr('checked', $data['textExt'] === 1 ? 'checked' : '' );
    $field->columnWidth = 50;
    $inputfields->add($field);

    // Array Extension checkbox
    $field = $this->modules->get('InputfieldCheckbox');
    $field->label = __('Enable the Array Extension');
    $field->attr('name', 'arrayExt');
    $field->attr('value', 1);
    $field->attr('checked', $data['arrayExt'] === 1 ? 'checked' : '' );
    $field->columnWidth = 50;
    $inputfields->add($field);

    // Date Extension checkbox
    $field = $this->modules->get('InputfieldCheckbox');
    $field->label = __('Enable the Date Extension');
    $field->attr('name', 'dateExt');
    $field->attr('value', 1);
    $field->attr('checked', $data['dateExt'] === 1 ? 'checked' : '' );
    $field->columnWidth = 50;
    $inputfields->add($field);

    // Intl Extension checkbox
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
