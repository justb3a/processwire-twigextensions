# ProcessWire Twig Extensions

Allows customizing twig, e.g. add extensions.

**Dependencies:**

* [TemplateEngineFactory][tef]
* [TemplateEngineTwig][tet]

**Instructions:**

After installation go to module settings and enable/disable the required extensions/functions.

**Includes:**

[Twig Extensions Repository][twigrepo] 

**Usage:**

Adds the following extensions/helpers:

## Extensions

* [Debug][dump] // only if debug mode is turned on

    ```twig
    {# dump - dumps information about a template variable #}
    {{ dump('Hello World!') }}
    string(12) "Hello World!"
    ```
* [Intl][intl]

    ```twig
    {# localizeddate - format dates into a localized string representating the date #}
    {{ "now"|date_modify("-2 day")|localizeddate('medium', 'none', 'en') }}
    Mar 8, 2017

    {# localizednumber - format numbers into a localized string representating the number #}
    {{ '50.5555'|localizednumber('decimal', 'default', 'en') }}
    50.556

    {# localizedcurrency - format a currency value into a localized string #}
    {{ '50.5555'|localizedcurrency('EUR', 'en') }}
    €50.56
    ```
* [Text][text]
 
    ```twig
    {# truncate - cut off a string after limit is reached #}
    {{ 'Hello World!'|truncate(5) }}
    Hello...

    {# wordwrap - split your text in lines with equal length #}
    {{ 'Hello World!'|wordwrap(4) }}
    Hell
    o Wo
    rld!
    ```
* [Array][array]
 
    ```twig
    {# shuffle - randomize an array #}
    {{ [ 'one', 'two', 'three', 'four' ]|shuffle }}
    [ 'two', 'three', 'one', 'four' ]
    ```
* [Date][date]
 
    ```twig
    {# time_diff - difference between two dates #}
    {% set start = "now"|date_modify("-2 day") %}
    {% set end = "now"|date_modify("+2 day") %}
    {{ start|time_diff }}
    2 days ago

    {{ start|time_diff(end) }}
    4 days ago
    ```

## Helpers

* **fileExists:** Checks whether a file or directory exists.

    ```twig
    {% if file_exists(config.paths.assets ~ 'img/filename.png') %}
      The file exists.
    {% else %}
      The file does not exist.
    {% endif %}
    ```

* **widont:** Prevent widow in string
    - in typesetting a widow is a very short line (one word or the end of an hyphenated word),
      which is separated from the rest of the paragraph. It's considered as poor typography because it leaves too much white space.

    ```twig
   {{ 'Add Widont Helper'|widont }}
   'Add Widont&nbsp;Helper'
    ```


[tef]:      http://modules.processwire.com/modules/template-engine-factory/ 'TemplateEngineFactory'
[tet]:      http://modules.processwire.com/modules/template-engine-twig/    'TemplateEngineTwig' 
[twigrepo]: https://github.com/twigphp/Twig-extensions                      'Twig Extension Repository'
[dump]:     http://twig.sensiolabs.org/doc/2.x/functions/dump.html          'Dump Extension'
[intl]:     http://twig-extensions.readthedocs.io/en/latest/intl.html       'Intl Extension'
[text]:     http://twig-extensions.readthedocs.io/en/latest/text.html       'Text Extension'
[array]:    http://twig-extensions.readthedocs.io/en/latest/array.html      'Array Extension'
[date]:     http://twig-extensions.readthedocs.io/en/latest/date.html       'Date Extension'
