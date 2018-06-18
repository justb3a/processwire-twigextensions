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
      'debugExt' => 0,
      'textExt' => 0,
      'arrayExt' => 0,
      'dateExt' => 0,
      'intlExt' => 0,
      'fileExistsHelper' => 0,
      'widontHelper' => 0,
      'kalongFeature' => 0
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

    // EXTENSIONS
    // ----------
    $fieldset = $this->modules->get('InputfieldFieldset');
    $fieldset->label = __('EXTENSIONS');

    // Debug Extension checkbox
    $field = $this->modules->get('InputfieldCheckbox');
    $field->label = __('Enable the Debug Extension');
    $field->attr('name', 'debugExt');
    $field->attr('value', 1);
    $field->columnWidth = 33;
    $fieldset->add($field);

    // Text Extension checkbox
    $field = $this->modules->get('InputfieldCheckbox');
    $field->label = __('Enable the Text Extension');
    $field->attr('name', 'textExt');
    $field->attr('value', 1);
    $field->columnWidth = 33;
    $fieldset->add($field);

    // Array Extension checkbox
    $field = $this->modules->get('InputfieldCheckbox');
    $field->label = __('Enable the Array Extension');
    $field->attr('name', 'arrayExt');
    $field->attr('value', 1);
    $field->columnWidth = 34;
    $fieldset->add($field);

    // Date Extension checkbox
    $field = $this->modules->get('InputfieldCheckbox');
    $field->label = __('Enable the Date Extension');
    $field->attr('name', 'dateExt');
    $field->attr('value', 1);
    $field->columnWidth = 33;
    $fieldset->add($field);

    // Intl Extension checkbox
    $field = $this->modules->get('InputfieldCheckbox');
    $field->label = __('Enable the Intl Extension');
    $field->attr('name', 'intlExt');
    $field->attr('value', 1);
    $field->columnWidth = 33;
    $fieldset->add($field);

    $inputfields->add($fieldset);

    // HELPERS
    // ----------
    $fieldset = $this->modules->get('InputfieldFieldset');
    $fieldset->label = __('HELPERS');

    // FileExists Helper
    $field = $this->modules->get('InputfieldCheckbox');
    $field->label = __('Add Helper `FileExists`');
    $field->attr('name', 'fileExistsHelper');
    $field->attr('value', 1);
    $field->columnWidth = 33;
    $fieldset->add($field);

    $inputfields->add($fieldset);

    // Widont Helper
    $field = $this->modules->get('InputfieldCheckbox');
    $field->label = __('Add Helper `Widont`');
    $field->attr('name', 'widontHelper');
    $field->attr('value', 1);
    $field->columnWidth = 33;
    $fieldset->add($field);

    $inputfields->add($fieldset);

    // FEATURES
    // ----------
    $fieldset = $this->modules->get('InputfieldFieldset');
    $fieldset->label = __('FEATURES');
    $fieldset->collapsed = Inputfield::collapsedYes;

    // Kalong Feature
    $fractalUrl = 'https://fractal.build/';
    $kalongUrl = 'https://github.com/webgefrickel/kalong';
    $kalongTitle = __('Kalong—a frontend styleguide development toolkit.');
    $kalongDesc = __("[Kalong](%s) is a collection/combination of different tools, to help you get started creating your own frontend styleguide, with easy reusable components. It is based on [Fractal](%s) and a collection of custom gulp-tasks to get you started fast.");

    $field = $this->modules->get('InputfieldCheckbox');
    $field->label = __('Add Kalong Feature');
    $field->attr('name', 'kalongFeature');
    $field->attr('value', 1);
    $field->description = "**$kalongTitle**" . PHP_EOL . sprintf($kalongDesc, $kalongUrl, $fractalUrl);
    $field->columnWidth = 100;
    $fieldset->add($field);

    $inputfields->add($fieldset);

    return $inputfields;
  }

}
