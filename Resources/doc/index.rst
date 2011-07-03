This bundle allows you to easily include several social sharing buttons on your
website. Currently, it has support for the following buttons:

    - Twitter's "Tweet" Button
    - Facebook's "Like it" Button
    
Installation
------------
Checkout a copy of the code::

    git submodule add https://github.com/schmittjoh/JMSSocialBundle.git vendor/bundles/JMS/SocialBundle
    
Then register the bundle with your kernel::

    // in AppKernel::registerBundles()
    $bundles = array(
        // ...
        new JMS\JMSSocialBundle\JMSSocialBundle(),
        // ...
    );

Make sure that you also register the namespace with the autoloader::

    // app/autoload.php
    $loader->registerNamespaces(array(
        // ...
        'JMS'              => __DIR__.'/../vendor/bundles',
        // ...
    ));    


Configuration
-------------

Below, you find a sample configuration. You can always overwrite these settings from your template::

    # app/config/config.yml
    jms_social:
        tweet_button:
            count: horizontal # allowed values: horizontal, vertical, or none
            via: someTwitterUsername
            related:
                name: anotherTwitterUsername
                description: Description of the relation
            text: Default text 
            url: Url, if not set the URL of the current page will be used
            
By default, all buttons are enabled. If you want to not show a specific button you turn it off in your config::

    # app/config/config.yml
    jms_social:
        tweet_button: false
        
Usage in Your Templates
-----------------------

The bundle adds a new templating helper named "social" that you can access from your PHP templates, and several
functions that you can use from your Twig templates.


social_buttons() / $view['social']->socialButtons()
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

This renders the configured social buttons. You can also pass an array of options to it which must be of
the same form like the configuration. Any options passed here will overwrite the configured defaults. 


social_javascript() / $view['social']->socialJavascript()
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

This renders the Javascript that is necessary for the configured buttons. You should
place this as close to the ``</body>`` tag as possible.