<?php

/* AcmeDemoBundle:Secured:hello.html.twig */
class __TwigTemplate_03b7a1928167ad41aca364687c2563e4eb5458057306330df1f226d209710d6d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AcmeDemoBundle:Secured:layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AcmeDemoBundle:Secured:layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 11
        $context["code"] = $this->env->getExtension('demo')->getCode($this);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, ("Hello " . (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name"))), "html", null, true);
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    <h1 class=\"title\">Hello ";
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), "html", null, true);
        echo "!</h1>

    <a href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_demo_secured_hello_admin", array("name" => (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")))), "html", null, true);
        echo "\">Hello resource secured for <strong>admin</strong> only.</a>
";
    }

    public function getTemplateName()
    {
        return "AcmeDemoBundle:Secured:hello.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 22,  90 => 32,  153 => 58,  134 => 48,  126 => 43,  118 => 41,  81 => 36,  58 => 17,  124 => 11,  100 => 56,  70 => 44,  34 => 30,  127 => 28,  104 => 38,  97 => 41,  84 => 29,  77 => 46,  65 => 18,  113 => 33,  76 => 17,  53 => 11,  23 => 3,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  229 => 73,  220 => 70,  214 => 69,  177 => 65,  169 => 60,  140 => 51,  132 => 51,  128 => 49,  107 => 42,  61 => 12,  273 => 96,  269 => 94,  254 => 92,  243 => 88,  240 => 86,  238 => 85,  235 => 74,  230 => 82,  227 => 81,  224 => 71,  221 => 77,  219 => 76,  217 => 75,  208 => 68,  204 => 72,  179 => 69,  159 => 61,  143 => 56,  135 => 62,  119 => 42,  102 => 17,  71 => 15,  67 => 15,  63 => 19,  59 => 13,  94 => 34,  89 => 28,  85 => 32,  75 => 17,  68 => 14,  56 => 11,  87 => 25,  28 => 3,  21 => 2,  201 => 92,  196 => 90,  183 => 82,  171 => 61,  166 => 71,  163 => 62,  158 => 79,  156 => 66,  151 => 63,  142 => 63,  138 => 54,  136 => 56,  121 => 46,  117 => 19,  105 => 18,  91 => 39,  62 => 12,  49 => 10,  38 => 6,  24 => 3,  31 => 3,  93 => 52,  88 => 31,  78 => 26,  44 => 12,  27 => 4,  25 => 4,  46 => 8,  26 => 11,  19 => 1,  79 => 32,  72 => 16,  69 => 19,  47 => 8,  40 => 6,  37 => 5,  22 => 2,  246 => 90,  157 => 60,  145 => 46,  139 => 63,  131 => 61,  123 => 59,  120 => 20,  115 => 40,  111 => 39,  108 => 19,  101 => 43,  98 => 31,  96 => 30,  83 => 25,  74 => 27,  66 => 15,  55 => 8,  52 => 10,  50 => 11,  43 => 7,  41 => 5,  35 => 5,  32 => 3,  29 => 3,  209 => 82,  203 => 78,  199 => 67,  193 => 73,  189 => 71,  187 => 84,  182 => 66,  176 => 64,  173 => 65,  168 => 72,  164 => 59,  162 => 57,  154 => 58,  149 => 51,  147 => 58,  144 => 49,  141 => 48,  133 => 55,  130 => 41,  125 => 44,  122 => 42,  116 => 34,  112 => 4,  109 => 3,  106 => 45,  103 => 32,  99 => 31,  95 => 28,  92 => 29,  86 => 22,  82 => 28,  80 => 30,  73 => 16,  64 => 13,  60 => 6,  57 => 12,  54 => 11,  51 => 7,  48 => 9,  45 => 8,  42 => 7,  39 => 5,  36 => 5,  33 => 3,  30 => 3,);
    }
}
