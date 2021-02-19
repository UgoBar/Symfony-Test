<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* quiz/result.html.twig */
class __TwigTemplate_e97354eaff31bd5d4eafc0f6fcadeaa8ecf85f4d3c2ade32f46187383381279d extends \Twig\Template
{
    private $source;

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("bootstrap4.html.twig", "quiz/result.html.twig", 1);
        $this->blocks = [
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        return "bootstrap4.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "quiz/result.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "quiz/result.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_body($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 5
        if (((isset($context["totalScore"]) || array_key_exists("totalScore", $context) ? $context["totalScore"] : (function () { throw new RuntimeError('Variable "totalScore" does not exist.', 5, $this->source); })()) == 0)) {
            // line 6
            echo "    <h2>Raté !</h2>";
        } else {
            // line 8
            echo "    <h2>Bravo !</h2>";
        }
        // line 10
        echo "
<p>Votre score est de <strong>";
        // line 11
        echo twig_escape_filter($this->env, (isset($context["totalScore"]) || array_key_exists("totalScore", $context) ? $context["totalScore"] : (function () { throw new RuntimeError('Variable "totalScore" does not exist.', 11, $this->source); })()), "html", null, true);
        echo "</strong></p>

<h3>Détails de votre score :</h3>
<ul>";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["scorePerQuestion"]) || array_key_exists("scorePerQuestion", $context) ? $context["scorePerQuestion"] : (function () { throw new RuntimeError('Variable "scorePerQuestion" does not exist.', 15, $this->source); })()));
        foreach ($context['_seq'] as $context["key"] => $context["detail"]) {
            // line 16
            echo "        <li>";
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo " :";
            echo twig_escape_filter($this->env, $context["detail"], "html", null, true);
            echo "</li>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['detail'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "</ul>";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "quiz/result.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  96 => 18,  86 => 16,  82 => 15,  76 => 11,  73 => 10,  70 => 8,  67 => 6,  65 => 5,  56 => 3,  27 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'bootstrap4.html.twig' %}

{% block body %}

{% if totalScore == 0 %}
    <h2>Raté !</h2>
{% else %}
    <h2>Bravo !</h2>
{% endif %}

<p>Votre score est de <strong>{{ totalScore }}</strong></p>

<h3>Détails de votre score :</h3>
<ul>
    {% for key, detail in scorePerQuestion %}
        <li>{{ key }} : {{ detail }}</li>
    {% endfor %}
</ul>

{% endblock %}", "quiz/result.html.twig", "C:\\wamp64\\www\\Ugo Barathe - test So_Buzz\\consignes\\app\\Resources\\views\\quiz\\result.html.twig");
    }
}
