<?php

namespace JMS\SocialBundle\Twig;

use JMS\SocialBundle\Templating\SocialHelper;

class SocialExtension extends \Twig_Extension
{
    private $helper;

    public function __construct(SocialHelper $helper)
    {
        $this->helper = $helper;
    }

    public function getFunctions()
    {
        return array(
            'tweet_button' => new \Twig_Filter_Method($this, 'tweetButton', array('is_safe' => array('html'))),
            'social_buttons' => new \Twig_Filter_Method($this, 'socialButtons', array('is_safe' => array('html'))),
            'social_javascript' => new \Twig_Filter_Method($this, 'socialJavascript', array('is_safe' => array('html'))),
        );
    }

    public function tweetButton(array $config = array())
    {
        return $this->helper->tweetButton($config);
    }

    public function socialButtons(array $configs = array())
    {
        return $this->helper->socialButtons($configs);
    }

    public function socialJavascript()
    {
        return $this->helper->socialJavascript();
    }

    public function getName()
    {
        return 'jms_social';
    }
}