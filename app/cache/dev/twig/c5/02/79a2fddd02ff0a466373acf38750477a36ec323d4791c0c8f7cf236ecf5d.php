<?php

/* AheGsbBundle:Comptable:accueilComptable.html.twig */
class __TwigTemplate_c50279a2fddd02ff0a466373acf38750477a36ec323d4791c0c8f7cf236ecf5d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AheGsbBundle::layout.html.twig");

        $this->blocks = array(
            'messages' => array($this, 'block_messages'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AheGsbBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_messages($context, array $blocks = array())
    {
        // line 3
        echo "<div>
    ";
        // line 4
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashbag"), "get", array(0 => "warning"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 5
            echo "        ";
            echo twig_escape_filter($this->env, (isset($context["flashMessage"]) ? $context["flashMessage"] : $this->getContext($context, "flashMessage")), "html", null, true);
            echo "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 7
        echo "        
</div>
";
    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        // line 12
        echo "<br>
<div class=\"col-md-3\">
    <fieldset class=\"accueil\">
        <table>
            <tr>
                <td>
                    <h2> Bienvenue ";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "get", array(0 => "nom"), "method"), "html", null, true);
        echo " 
                       ";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "get", array(0 => "prenom"), "method"), "html", null, true);
        echo "
                    </h2> 
                </td>
                <td>
                    <h2> Gestion des Fiches de Frais </h2>
                </td>
                <td>
                    <h3>
                    <a href=\"";
        // line 27
        echo $this->env->getExtension('routing')->getPath("gsb_visiteurs_deconnexion");
        echo "\" 
                        accesskey=\"\"title=\"Déconnexion\">
                        Se déconnecter
                    </a> 
                    </h3>
                </td>
            </tr>
        </table>
        
            
    </fieldset>
        
    <div class=\"menu\">
        <ul class=\"nav\">
            <li> <a href=\"";
        // line 41
        echo $this->env->getExtension('routing')->getPath("gsb_consultation_frais");
        echo "\"
                    title=\"Consultation\"><h4>Consulter mes fiches de frais</h4>
                 </a>
            </li>
              
            <li> <a href=\"";
        // line 46
        echo $this->env->getExtension('routing')->getPath("gsb_saisie_frais");
        echo "\" 
                    title=\"Saisie\"><h4>Saisir mes fiches de frais</h4>
                 </a> 
            </li>
        </ul>
    </div>
  </div>

";
    }

    public function getTemplateName()
    {
        return "AheGsbBundle:Comptable:accueilComptable.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  153 => 58,  134 => 48,  126 => 43,  118 => 41,  81 => 36,  58 => 11,  124 => 11,  100 => 56,  70 => 44,  34 => 30,  127 => 51,  104 => 38,  97 => 41,  84 => 24,  77 => 46,  65 => 18,  113 => 33,  76 => 30,  53 => 39,  23 => 3,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  229 => 73,  220 => 70,  214 => 69,  177 => 65,  169 => 60,  140 => 51,  132 => 51,  128 => 49,  107 => 42,  61 => 19,  273 => 96,  269 => 94,  254 => 92,  243 => 88,  240 => 86,  238 => 85,  235 => 74,  230 => 82,  227 => 81,  224 => 71,  221 => 77,  219 => 76,  217 => 75,  208 => 68,  204 => 72,  179 => 69,  159 => 61,  143 => 56,  135 => 19,  119 => 42,  102 => 32,  71 => 15,  67 => 15,  63 => 15,  59 => 14,  94 => 40,  89 => 28,  85 => 37,  75 => 17,  68 => 14,  56 => 40,  87 => 25,  28 => 3,  21 => 2,  201 => 92,  196 => 90,  183 => 82,  171 => 61,  166 => 71,  163 => 62,  158 => 67,  156 => 66,  151 => 63,  142 => 63,  138 => 54,  136 => 56,  121 => 46,  117 => 44,  105 => 46,  91 => 39,  62 => 12,  49 => 38,  38 => 4,  24 => 3,  31 => 4,  93 => 52,  88 => 38,  78 => 21,  44 => 12,  27 => 4,  25 => 4,  46 => 10,  26 => 6,  19 => 1,  79 => 32,  72 => 16,  69 => 19,  47 => 9,  40 => 8,  37 => 10,  22 => 2,  246 => 90,  157 => 60,  145 => 46,  139 => 45,  131 => 52,  123 => 47,  120 => 10,  115 => 40,  111 => 39,  108 => 36,  101 => 32,  98 => 31,  96 => 30,  83 => 25,  74 => 45,  66 => 15,  55 => 8,  52 => 21,  50 => 11,  43 => 11,  41 => 7,  35 => 4,  32 => 3,  29 => 2,  209 => 82,  203 => 78,  199 => 67,  193 => 73,  189 => 71,  187 => 84,  182 => 66,  176 => 64,  173 => 65,  168 => 72,  164 => 59,  162 => 57,  154 => 58,  149 => 51,  147 => 58,  144 => 49,  141 => 48,  133 => 55,  130 => 41,  125 => 44,  122 => 42,  116 => 34,  112 => 4,  109 => 3,  106 => 33,  103 => 32,  99 => 31,  95 => 28,  92 => 29,  86 => 22,  82 => 36,  80 => 27,  73 => 18,  64 => 17,  60 => 6,  57 => 12,  54 => 11,  51 => 7,  48 => 7,  45 => 6,  42 => 5,  39 => 5,  36 => 5,  33 => 4,  30 => 5,);
    }
}
