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
      'debugExt' => 1,
      'textExt' => 0,
      'arrayExt' => 0,
      'dateExt' => 0,
      'intlExt' => 0
    );
  }

  /**
   * Retrieves the list of config input fields
   * Implementation of the ConfigurableModule interface
   *
   * @return InputfieldWrapper
   */
  public function getInputfields() {
    // get inputfields
    $inputfields = parent::getInputfields();

    // Debug Extension checkbox
    $field = $this->modules->get('InputfieldCheckbox');
    $field->label = __('Enable the Debug Extension');
    $field->attr('name', 'debugExt');
    $field->attr('value', 1);
    $field->columnWidth = 33;
    $inputfields->add($field);

    // Text Extension checkbox
    $field = $this->modules->get('InputfieldCheckbox');
    $field->label = __('Enable the Text Extension');
    $field->attr('name', 'textExt');
    $field->attr('value', 1);
    $field->columnWidth = 33;
    $inputfields->add($field);

    // Array Extension checkbox
    $field = $this->modules->get('InputfieldCheckbox');
    $field->label = __('Enable the Array Extension');
    $field->attr('name', 'arrayExt');
    $field->attr('value', 1);
    $field->columnWidth = 34;
    $inputfields->add($field);

    // Date Extension checkbox
    $field = $this->modules->get('InputfieldCheckbox');
    $field->label = __('Enable the Date Extension');
    $field->attr('name', 'dateExt');
    $field->attr('value', 1);
    $field->columnWidth = 33;
    $inputfields->add($field);

    // Intl Extension checkbox
    $field = $this->modules->get('InputfieldCheckbox');
    $field->label = __('Enable the Intl Extension');
    $field->attr('name', 'intlExt');
    $field->attr('value', 1);
    $field->columnWidth = 33;
    $inputfields->add($field);

    return $inputfields;
  }

}
