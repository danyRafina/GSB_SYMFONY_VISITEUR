<?php

/* AheGsbBundle:Visiteurs:consultationFraisForfait.html.twig */
class __TwigTemplate_374aa0f5bb129f62e0073fc63e0e98565a201c779b9dd313dcf504f9fa279753 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AheGsbBundle::layout.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'bloc1' => array($this, 'block_bloc1'),
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
    public function block_body($context, array $blocks = array())
    {
        // line 3
        $this->displayBlock('bloc1', $context, $blocks);
        // line 30
        echo "

<h3>Consultation de la fiche de frais du mois ";
        // line 32
        echo twig_escape_filter($this->env, (isset($context["numMois"]) ? $context["numMois"] : $this->getContext($context, "numMois")), "html", null, true);
        echo "-";
        echo twig_escape_filter($this->env, (isset($context["numAnnee"]) ? $context["numAnnee"] : $this->getContext($context, "numAnnee")), "html", null, true);
        echo " : 
</h3>
    <div class=\"forfait\">
        <fieldset><legend> Frais forfaitisés </legend>
            <table border=1>
  \t    <tr>
                ";
        // line 38
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["lesFraisForfait"]) ? $context["lesFraisForfait"] : $this->getContext($context, "lesFraisForfait")));
        foreach ($context['_seq'] as $context["_key"] => $context["unFrais"]) {
            // line 39
            echo "                    ";
            $context["libelle"] = $this->getAttribute((isset($context["unFrais"]) ? $context["unFrais"] : $this->getContext($context, "unFrais")), "libelle");
            // line 40
            echo "                    <th> ";
            echo twig_escape_filter($this->env, (isset($context["libelle"]) ? $context["libelle"] : $this->getContext($context, "libelle")), "html", null, true);
            echo "</th>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['unFrais'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 41
        echo "  
            </tr>
            <tr>
                ";
        // line 44
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["lesFraisForfait"]) ? $context["lesFraisForfait"] : $this->getContext($context, "lesFraisForfait")));
        foreach ($context['_seq'] as $context["_key"] => $context["unFrais"]) {
            // line 45
            echo "                    ";
            $context["quantite"] = $this->getAttribute((isset($context["unFrais"]) ? $context["unFrais"] : $this->getContext($context, "unFrais")), "quantite");
            // line 46
            echo "                    <td >";
            echo twig_escape_filter($this->env, (isset($context["quantite"]) ? $context["quantite"] : $this->getContext($context, "quantite")), "html", null, true);
            echo " </td>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['unFrais'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 47
        echo "  
            </tr>
            </table>
        </fieldset>
             <fieldset>
                    <legend>Frais hors forfait : </legend>
                    <table border='1' >
                        <tr>
                            <th>date </th>
                            <th> Libéllé</th>
                            <th>Montant</th>
                            <th>Action</th>
                        </tr>


                        ";
        // line 62
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["fhf"]) ? $context["fhf"] : $this->getContext($context, "fhf")));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 63
            echo "                            <tr>
                                <td> ";
            // line 64
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "date", array(), "array"), "html", null, true);
            echo "</td>
                                <td> ";
            // line 65
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "libelle", array(), "array"), "html", null, true);
            echo "</td>
                                <td> ";
            // line 66
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "montant", array(), "array"), "html", null, true);
            echo "</td>
                                <td> 
                                    <table border=\"1\"> 
                                        <tr>
                                            <td>
                                                <a href=\"";
            // line 71
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("gsb_visiteurs_mod_FhF", array("id" => $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "idVisiteur", array(), "array"))), "html", null, true);
            echo "\" accesskey=\"\"title=\"Déconnexion\">Modifier</a>
                                            </td>
                                            <td>
                                                <a href=\"";
            // line 74
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("gsb_visiteurs_sup_FhF", array("id" => $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "idVisiteur", array(), "array"))), "html", null, true);
            echo "\" accesskey=\"\"title=\"Suppression\">Supprimer </a>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            <tr>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 81
        echo "                    </table>
                </fieldset>
        <br/>
        <a href=\"";
        // line 84
        echo $this->env->getExtension('routing')->getPath("gsb_consultation_frais");
        echo "\" >
            Autre Fiche
        </a> 
        &nbsp;&nbsp;&nbsp;&nbsp;
        <a href = \"";
        // line 88
        echo $this->env->getExtension('routing')->getPath("gsb_homepage_visiteurs");
        echo "\"> 
            Accueil Visiteurs
        </a>
        
";
    }

    // line 3
    public function block_bloc1($context, array $blocks = array())
    {
        // line 4
        echo "<br>
<div class=\"col-md-3\">
    <fieldset class=\"accueil\">
        <table>
            <tr>
                <td>
                    <h2> Bienvenue ";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "get", array(0 => "nom"), "method"), "html", null, true);
        echo " 
                       ";
        // line 11
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
        // line 19
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
</div>
";
    }

    public function getTemplateName()
    {
        return "AheGsbBundle:Visiteurs:consultationFraisForfait.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  192 => 19,  181 => 11,  177 => 10,  169 => 4,  166 => 3,  157 => 88,  150 => 84,  145 => 81,  132 => 74,  126 => 71,  118 => 66,  114 => 65,  110 => 64,  107 => 63,  103 => 62,  86 => 47,  77 => 46,  74 => 45,  70 => 44,  65 => 41,  56 => 40,  53 => 39,  49 => 38,  38 => 32,  34 => 30,  32 => 3,  29 => 2,);
    }
}
