<?php

/* AheGsbBundle:Visiteurs:saisieFicheFrais.html.twig */
class __TwigTemplate_b175d02082f55f4b6deee8981fd62f116e55d3aebb6eed14fefdf6f89c4ca3a2 extends Twig_Template
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
        echo "    ";
        $this->displayBlock('bloc1', $context, $blocks);
    }

    public function block_bloc1($context, array $blocks = array())
    {
        // line 4
        echo "        ";
        $this->env->loadTemplate("AheGsbBundle:Visiteurs:erreurs.html.twig")->display(array_merge($context, array("lesErreurs" => (isset($context["lesErreursForfait"]) ? $context["lesErreursForfait"] : $this->getContext($context, "lesErreursForfait")))));
        // line 5
        echo "
        <h2> Fiche de frais du mois ";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["numMois"]) ? $context["numMois"] : $this->getContext($context, "numMois")), "html", null, true);
        echo "-";
        echo twig_escape_filter($this->env, (isset($context["numAnnee"]) ? $context["numAnnee"] : $this->getContext($context, "numAnnee")), "html", null, true);
        echo "</h2>
        <form action=\"";
        // line 7
        echo $this->env->getExtension('routing')->getPath("gsb_saisie_frais");
        echo "\" method=\"POST\">
            <div class=\"corpsForm\">    
                <fieldset>
                    <legend>Frais au Forfait : </legend>
                    ";
        // line 11
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["lesFraisForfait"]) ? $context["lesFraisForfait"] : $this->getContext($context, "lesFraisForfait")));
        foreach ($context['_seq'] as $context["_key"] => $context["unFrais"]) {
            // line 12
            echo "                        ";
            $context["idFrais"] = $this->getAttribute((isset($context["unFrais"]) ? $context["unFrais"] : $this->getContext($context, "unFrais")), "idFrais");
            // line 13
            echo "                        ";
            $context["libelle"] = $this->getAttribute((isset($context["unFrais"]) ? $context["unFrais"] : $this->getContext($context, "unFrais")), "libelle");
            // line 14
            echo "                        ";
            $context["quantite"] = $this->getAttribute((isset($context["unFrais"]) ? $context["unFrais"] : $this->getContext($context, "unFrais")), "quantite");
            // line 15
            echo "                        <p>
                            <label class=\"col-md-offset-1 col-lg-3\" 
                                   for=\"idFrais\"> ";
            // line 17
            echo twig_escape_filter($this->env, (isset($context["libelle"]) ? $context["libelle"] : $this->getContext($context, "libelle")), "html", null, true);
            echo " 
                            </label>
                            <input type=\"text\" id=\"idFrais\" 
                                   name=\"lesFrais[";
            // line 20
            echo twig_escape_filter($this->env, (isset($context["idFrais"]) ? $context["idFrais"] : $this->getContext($context, "idFrais")), "html", null, true);
            echo "]\" 
                                   size=\"10\" maxlength=\"5\" 
                                   value=\"";
            // line 22
            echo twig_escape_filter($this->env, (isset($context["quantite"]) ? $context["quantite"] : $this->getContext($context, "quantite")), "html", null, true);
            echo "\" >
                        </p>


                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['unFrais'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        echo "                </fieldset>
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
        // line 39
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["fhf"]) ? $context["fhf"] : $this->getContext($context, "fhf")));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 40
            echo "                            <tr>
                                <td> ";
            // line 41
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "date", array(), "array"), "html", null, true);
            echo "</td>
                                <td> ";
            // line 42
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "libelle", array(), "array"), "html", null, true);
            echo "</td>
                                <td> ";
            // line 43
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "montant", array(), "array"), "html", null, true);
            echo "</td>
                                <td> 
                                    <table border=\"1\"> 
                                        <tr>
                                            <td>
                                                <a href=\"";
            // line 48
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("gsb_visiteurs_mod_FhF", array("id" => $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "idVisiteur", array(), "array"))), "html", null, true);
            echo "\" accesskey=\"\"title=\"Déconnexion\">Modifier</a>
                                            </td>
                                            <td>
                                                <a href=\"";
            // line 51
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
        // line 58
        echo "                    </table>
                    <hr>
                    ";
        // line 60
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form');
        echo "
                </fieldset>
                <input class =\"btn-success\" type=\"submit\" value=\"Valider\" 
                       name=\"valider\">
            </div>    
        </form>

        <a href=\"/\">  </a>
    </div>
";
    }

    public function getTemplateName()
    {
        return "AheGsbBundle:Visiteurs:saisieFicheFrais.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  157 => 60,  153 => 58,  140 => 51,  134 => 48,  126 => 43,  122 => 42,  118 => 41,  115 => 40,  111 => 39,  97 => 27,  86 => 22,  81 => 20,  75 => 17,  71 => 15,  68 => 14,  65 => 13,  62 => 12,  58 => 11,  51 => 7,  45 => 6,  42 => 5,  39 => 4,  32 => 3,  29 => 2,);
    }
}
