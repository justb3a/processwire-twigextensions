<?php namespace ProcessWire;

/**
 *
 * RenderPattern_TokenParser
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
require(__DIR__ . '/RenderPatternNode.php');

/**
* Class RenderPattern_TokenParser
*/
class RenderPattern_TokenParser extends \Twig_TokenParser {

  /**
   * parse
   *
   * @param \Twig_Token
   */
  public function parse(\Twig_Token $token) {
    $expr = $this->parser->getExpressionParser()->parseExpression();
    list($variables, $merge) = $this->parseArguments();
    return new RenderPattern_Node($expr, $variables, $merge, $token->getLine(), $this->getTag());
  }

  /**
   * parse arguments
   */
  protected function parseArguments() {
    $stream = $this->parser->getStream();
    $variables = null;
    $merge = false;

    if ($stream->nextIf(\Twig_Token::PUNCTUATION_TYPE, ',')) {
      $variables = $this->parser->getExpressionParser()->parseExpression();
    }

    if ($stream->nextIf(\Twig_Token::PUNCTUATION_TYPE, ',')) {
      $stream->expect(\Twig_Token::NAME_TYPE, 'true');
      $merge = true;
    }

    $stream->expect(\Twig_Token::BLOCK_END_TYPE);

    return array($variables, $merge);
  }
  /**
   * get tag
   *
   * @return string
   */
  public function getTag() {
    return 'render';
  }
}
