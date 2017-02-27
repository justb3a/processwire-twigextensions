# ProcessWire Twig Extensions

Allows customizing twig, e.g. add extensions.

**Dependencies:**

* [TemplateEngineFactory](http://modules.processwire.com/modules/template-engine-factory/)
* [TemplateEngineTwig](http://modules.processwire.com/modules/template-engine-twig/)

**Instructions:**

After installation go to module settings and enable/disable the required extensions/functions.

**Includes:**
Twig Extensions Repository https://github.com/twigphp/Twig-extensions

**Usage:**

Adds the following extensions/functions:

* [Debug](twig.sensiolabs.org/doc/functions/dump.html) // only if debug mode is turned on

    ```twig
    {{ dump(page) }}
    ```

* [Intl](http://twig-extensions.readthedocs.io/en/latest/intl.html)

    ```twig
    {{ post.published|localizeddate('medium', 'none', locale) }}
    ```
* [Text](http://twig-extensions.readthedocs.io/en/latest/text.html)

    ```twig
    {{ "Hello World!"|truncate(5) }}
    ```
* [Array](http://twig-extensions.readthedocs.io/en/latest/array.html)

    ```twig
    {{ post.published|shuffle }}
    ```
* [Date](http://twig-extensions.readthedocs.io/en/latest/date.html)

    ```twig
    {{ post.published|date("M jS, Y") }}
    ```
