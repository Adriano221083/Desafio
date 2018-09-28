<?php

/* AppBundle:Component:base.html.twig */
class __TwigTemplate_de62b3417bd2634ea1f418cadd9a09fc0be42c83d7ef052ff42ff17446c61d91 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <title>
            ";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        // line 6
        echo "        </title>
    </head>
    <body>
        ";
        // line 9
        $this->displayBlock('body', $context, $blocks);
        // line 11
        echo "    </body>
</html>";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo " FaleMais ";
    }

    // line 9
    public function block_body($context, array $blocks = array())
    {
        // line 10
        echo "        ";
    }

    public function getTemplateName()
    {
        return "AppBundle:Component:base.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  54 => 10,  51 => 9,  45 => 5,  40 => 11,  38 => 9,  33 => 6,  31 => 5,  25 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "AppBundle:Component:base.html.twig", "/home/rsilveira/application/src/AppBundle/Resources/views/Component/base.html.twig");
    }
}
