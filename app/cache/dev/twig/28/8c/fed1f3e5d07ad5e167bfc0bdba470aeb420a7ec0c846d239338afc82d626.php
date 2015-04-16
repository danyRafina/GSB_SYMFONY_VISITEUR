<?php

/* AheGsbBundle:Visiteurs:erreurs.html.twig */
class __TwigTemplate_288cfed1f3e5d07ad5e167bfc0bdba470aeb420a7ec0c846d239338afc82d626 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class='erreur'>
<ul>
 ";
        // line 3
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["lesErreurs"]) ? $context["lesErreurs"] : $this->getContext($context, "lesErreurs")));
        foreach ($context['_seq'] as $context["_key"] => $context["erreur"]) {
            // line 4
            echo "\t
      <li>";
            // line 5
            echo twig_escape_filter($this->env, (isset($context["erreur"]) ? $context["erreur"] : $this->getContext($context, "erreur")), "html", null, true);
            echo "</li>
\t
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['erreur'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 8
        echo "</ul></div>
";
    }

    public function getTemplateName()
    {
        return "AheGsbBundle:Visiteurs:erreurs.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  30 => 5,  27 => 4,  23 => 3,  19 => 1,  157 => 60,  153 => 58,  140 => 51,  134 => 48,  126 => 43,  122 => 42,  118 => 41,  115 => 40,  111 => 39,  97 => 27,  86 => 22,  81 => 20,  75 => 17,  71 => 15,  68 => 14,  65 => 13,  62 => 12,  58 => 11,  51 => 7,  45 => 6,  42 => 5,  39 => 8,  32 => 3,  29 => 2,);
    }
}
