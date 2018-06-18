<?php namespace ProcessWire;

/**
 *
 * RenderPattern_Node
 *
 * Part of Kalong Feature:
 * kalong—a frontend styleguide development toolkit
 * Kalong is a collection/combination of different tools, to help you get started creating your own frontend styleguide,
 * with easy reusable components. It is based on Fractal and a collection of custom gulp-tasks to get you started fast.
 *
 * @see: https://github.com/webgefrickel/kalong
 * @see: https://fractal.build/
 */

require(__DIR__ . '/../vendor/autoload.php');

/**
* Class RenderPattern_Node
*/
class RenderPattern_Node extends \Twig_Node implements \Twig_NodeOutputInterface {

  /**
   * construct
   *
   * @param \Twig_Node_Expression $expr
   * @param \Twig_Node_Expression $variables
   * @param boolean $merge
   * @param string $lineno
   * @param string $tag
   */
  public function __construct(\Twig_Node_Expression $expr, \Twig_Node_Expression $variables = null, $merge = null, $lineno, $tag = null) {
    $nodes = array('expr' => $expr);
    if ($variables !== null) {
      $nodes['variables'] = $variables;
    }

    parent::__construct($nodes, [ 'merge' => (bool) $merge ], $lineno, $tag);
  }

  /**
   * get kalong data
   * parse yaml config
   *
   * @param string $pattern
   * @return array
   */
  public function kalongData($pattern = null) {
    $yaml = new \Spyc();

    // load the default page data, and override anything in need of override
    $globalData = $yaml->loadFile(wire('config')->kalong['patterns'] . wire('config')->kalong['global']);
    $patternData = ($pattern !== null) ? $yaml->loadFile(wire('config')->kalong['patterns'] . $pattern . '.yml') : [];
    $data = array_merge($globalData, $patternData);

    // debugging and deactivating styleguide
    $data['debug'] = wire('config')->debug;
    $data['styleguide'] = false;
    $data['site']['modifiers'] = wire('config')->site['modifiers'];
    $data['site']['title'] = wire('config')->site['title'];
    $data['site']['description'] = wire('config')->site['description'];
    $data['site']['lang'] = wire('config')->site['language'];
    $data['page']['title'] = wire('page')->title();

    return $data;
  }


  /**
   * compile
   *
   * @param \Twig_Compiler $compiler
   */
  public function compile(\Twig_Compiler $compiler) {
    $compiler->addDebugInfo($this);
    $this->addGetTemplate($compiler);
    $compiler->raw('->display(');
    $this->addTemplateArguments($compiler);
    $compiler->raw(");\n");
  }

  /**
   * add get template
   *
   * @param \Twig_Compiler $compiler
   */
  protected function addGetTemplate(\Twig_Compiler $compiler) {
    $patternString = $this->getNode('expr')->attributes['value'];
    $parts = explode('--', $patternString);
    $this->pattern = trim($patternString, '@');
    $this->variant = null;
    $this->file = null;

    if (count($parts) === 2) {
      $this->pattern = trim($parts[0], '@');
      $this->variant = $parts[1];
    }

    $this->file = $this->pattern . '.html';

    $compiler
      ->write('$this->loadTemplate(')
      ->repr('@pattern/' . $this->file)
      ->raw(', ')
      ->repr($this->getTemplateName())
      ->raw(', ')
      ->repr($this->getTemplateLine())
      ->raw(')');
  }


  /**
   * add template arguments
   *
   * @param \Twig_Compiler $compiler
   */
  protected function addTemplateArguments(\Twig_Compiler $compiler) {
    $patternName = '';
    if ($this->variant !== null) {
      $patternDataFile = wire('config')->kalong['patterns'] . $this->pattern . '--' . $this->variant . '.yml';
      $patternName = $this->pattern . '--' . $this->variant;

      // try the default variant, if not existing
      if (!file_exists($patternDataFile) && $this->variant !== null) {
        $patternName = $this->pattern . '--default.yml';
      }
    } else {
      $patternName = $this->pattern;
    }

    $defaultData = $this->kalongData($patternName);

    // we always merge context over default data, if merge is false,
    // we just ignore the default data and merge context + variables
    if (!$this->getAttribute('merge')) {
      if (!$this->hasNode('variables')) {
        $compiler
          ->raw('array_merge(')
          ->repr($defaultData)
          ->raw(', $context)');
      } else {
        $compiler
          ->raw('array_merge($context, ')
          ->subcompile($this->getNode('variables'))
          ->raw(')');
      }
    } else {
      if (!$this->hasNode('variables')) {
        $compiler
          ->raw('array_merge(')
          ->repr($defaultData)
          ->raw(', $context)');
      } else {
        $compiler
          ->raw('array_merge(')
          ->repr($defaultData)
          ->raw(', $context, ')
          ->subcompile($this->getNode('variables'))
          ->raw(')');
      }
    }
  }
}
