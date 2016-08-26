# ProcessWire Twig Extensions

Allows customizing twig, e.g. add extensions.

Dependencies:

* [TemplateEngineFactory](http://modules.processwire.com/modules/template-engine-factory/)
* [TemplateEngineTwig](http://modules.processwire.com/modules/template-engine-twig/)

Adds the following extensions/functions:

* [Debug](http://twig.sensiolabs.org/doc/functions/dump.html) // only if debug mode is turned on

    ```twig
    {{ dump(page) }}
    ```

* [Intl](http://twig.sensiolabs.org/doc/extensions/intl.html)

    ```twig
    {{ post.published|localizeddate('medium', 'none', locale) }}
    ```
