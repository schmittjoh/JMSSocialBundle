<?php

namespace JMS\SocialBundle\Templating;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Templating\Helper\Helper;

class SocialHelper extends Helper
{
    private $defaultTweetButtonConfig;
    private $container;
    private $tweetButtonIncluded = false;

    public function __construct(array $defaultTweetButtonConfig)
    {
        $this->defaultTweetButtonConfig = $defaultTweetButtonConfig;
    }

    public function setContainer(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function tweetButton(array $config = array())
    {
        if (!$this->defaultTweetButtonConfig) {
            throw new \RuntimeException('Please enable support for the tweet-button in your config.');
        }
        $this->tweetButtonIncluded = true;

        return $this->container->get('templating')->render('JMSSocialBundle:Twitter:tweet_button.html.twig', array(
        	'config' => array_merge($this->defaultTweetButtonConfig, $config),
        ));
    }

    public function socialButtons(array $configs = array())
    {
        $default = array();

        if ($this->defaultTweetButtonConfig) {
            $default['tweet_button'] = array();
        }

        return $this->container->get('templating')->render('JMSSocialBundle::social_buttons.html.twig', array(
            'configs' => array_merge($default, $configs),
        ));
    }

    public function socialJavascript()
    {
        $js = '';
        if ($this->tweetButtonIncluded) {
            $js .= '<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>';
        }

        return $js;
    }

    public function getName()
    {
        return 'social';
    }
}