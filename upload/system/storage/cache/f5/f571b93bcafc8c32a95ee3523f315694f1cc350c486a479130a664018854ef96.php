<?php

/* default/template/common/content_bottom.twig */
class __TwigTemplate_77d6e50cc1c38807770be99718142de7c96a366a10ab34341604c92be6989df1 extends Twig_Template
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
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["modules"]) ? $context["modules"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
            // line 2
            echo $context["module"];
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['module'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "default/template/common/content_bottom.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  23 => 2,  19 => 1,);
    }
}
/* {% for module in modules %}*/
/* {{ module }}*/
/* {% endfor %}*/
