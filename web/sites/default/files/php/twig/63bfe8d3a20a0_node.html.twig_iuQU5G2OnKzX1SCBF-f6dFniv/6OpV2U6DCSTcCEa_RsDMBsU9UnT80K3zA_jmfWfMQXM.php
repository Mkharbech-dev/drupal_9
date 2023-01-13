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

/* themes/contrib/panache/templates/content/node.html.twig */
class __TwigTemplate_ea1bdf84f9d4bfd6b6267b7d9510d066 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 74
        $context["classes"] = [0 => "node", 1 => ("node--type-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source,         // line 76
($context["node"] ?? null), "bundle", [], "any", false, false, true, 76), 76, $this->source))), 2 => ((twig_get_attribute($this->env, $this->source,         // line 77
($context["node"] ?? null), "isPromoted", [], "method", false, false, true, 77)) ? ("node--promoted") : ("")), 3 => ((twig_get_attribute($this->env, $this->source,         // line 78
($context["node"] ?? null), "isSticky", [], "method", false, false, true, 78)) ? ("node--sticky") : ("")), 4 => (( !twig_get_attribute($this->env, $this->source,         // line 79
($context["node"] ?? null), "isPublished", [], "method", false, false, true, 79)) ? ("node--unpublished") : ("")), 5 => ((        // line 80
($context["view_mode"] ?? null)) ? (("node--view-mode-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(($context["view_mode"] ?? null), 80, $this->source)))) : (""))];
        // line 83
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("classy/node"), "html", null, true);
        echo "
<article";
        // line 84
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 84), 84, $this->source), "html", null, true);
        echo ">

    ";
        // line 86
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_prefix"] ?? null), 86, $this->source), "html", null, true);
        echo "
    ";
        // line 87
        if ( !($context["page"] ?? null)) {
            // line 88
            echo "        <h2";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_attributes"] ?? null), 88, $this->source), "html", null, true);
            echo ">
            <a href=\"";
            // line 89
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["url"] ?? null), 89, $this->source), "html", null, true);
            echo "\" rel=\"bookmark\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null), 89, $this->source), "html", null, true);
            echo "</a>
        </h2>
    ";
        }
        // line 92
        echo "    ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_suffix"] ?? null), 92, $this->source), "html", null, true);
        echo "

    ";
        // line 94
        if (($context["display_submitted"] ?? null)) {
            // line 95
            echo "        <div class=\"node__meta\">
            <div class=\"node__meta-date\">
                <div";
            // line 97
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["author_attributes"] ?? null), "addClass", [0 => "node__submitted"], "method", false, false, true, 97), 97, $this->source), "html", null, true);
            echo ">
                    ";
            // line 98
            echo t("@date", array("@date" => ($context["date"] ?? null), ));
            // line 99
            echo "                    ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["metadata"] ?? null), 99, $this->source), "html", null, true);
            echo "
                </div>
            </div>
            <div class=\"node__meta-author\">
                ";
            // line 103
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["author_picture"] ?? null), 103, $this->source), "html", null, true);
            echo "
                <div";
            // line 104
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["author_attributes"] ?? null), "addClass", [0 => "node__submitted"], "method", false, false, true, 104), 104, $this->source), "html", null, true);
            echo ">
                    ";
            // line 105
            echo t("@author_name", array("@author_name" => ($context["author_name"] ?? null), ));
            // line 106
            echo "                    ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["metadata"] ?? null), 106, $this->source), "html", null, true);
            echo "
                </div>
            </div>

        </div>

    ";
        }
        // line 113
        echo "
    <div";
        // line 114
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content_attributes"] ?? null), "addClass", [0 => "node__content"], "method", false, false, true, 114), 114, $this->source), "html", null, true);
        echo ">
        ";
        // line 115
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 115, $this->source), "html", null, true);
        echo "
    </div>



</article>
";
    }

    public function getTemplateName()
    {
        return "themes/contrib/panache/templates/content/node.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  128 => 115,  124 => 114,  121 => 113,  110 => 106,  108 => 105,  104 => 104,  100 => 103,  92 => 99,  90 => 98,  86 => 97,  82 => 95,  80 => 94,  74 => 92,  66 => 89,  61 => 88,  59 => 87,  55 => 86,  50 => 84,  46 => 83,  44 => 80,  43 => 79,  42 => 78,  41 => 77,  40 => 76,  39 => 74,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/contrib/panache/templates/content/node.html.twig", "C:\\xampp\\htdocs\\salah_drupal\\web\\themes\\contrib\\panache\\templates\\content\\node.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 74, "if" => 87, "trans" => 98);
        static $filters = array("clean_class" => 76, "escape" => 83);
        static $functions = array("attach_library" => 83);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'trans'],
                ['clean_class', 'escape'],
                ['attach_library']
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
