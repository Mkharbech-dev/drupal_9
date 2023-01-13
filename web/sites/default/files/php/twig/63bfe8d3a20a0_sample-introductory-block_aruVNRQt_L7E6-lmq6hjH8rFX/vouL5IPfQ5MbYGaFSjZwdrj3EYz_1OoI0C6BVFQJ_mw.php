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

/* @panache/includes/sample-introductory-block.html.twig */
class __TwigTemplate_0c933ec889a5f57ac5ba84c98cb22aec extends \Twig\Template
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
        // line 1
        echo "<div class=\"panache-introduction\">
  <div class=\"container\">
    <div class=\"row\">
      <div class=\"col-lg-6\">
        <div class=\"panache-introduction-image\">
          <img src=\"";
        // line 6
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 6, $this->source), "html", null, true);
        echo "/images/cake.png\" alt=\"What we do- Donut image\">
        </div>
      </div>
      <div class=\"col-lg-6\">
        <div class=\"panache-introduction-text\">

          <h2>What we do</h2>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ligula arcu, imperdiet quis scelerisque ac, congue vel lacus. Aliquam laoreet, ex ut commodo pretium, tortor nulla condimentum mauris, sed faucibus dolor ante sed mi.</p><p> Ut tincidunt risus ex, vitae sollicitudin diam elementum sit amet. Curabitur a dui porta, luctus purus porttitor, semper orci. Morbi tristique lorem eget neque rutrum viverra. Ut commodo justo quis posuere euismod. Pellentesque vel vestibulum est, ut molestie massa. Morbi tincidunt sem tortor, ornare sollicitudin lorem facilisis sit amet. Ut ac sem sit amet lorem faucibus lobortis. In eu gravida sapien.
          </p>
      </div>

      </div>
    </div>
  </div>
</div>";
    }

    public function getTemplateName()
    {
        return "@panache/includes/sample-introductory-block.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 6,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@panache/includes/sample-introductory-block.html.twig", "C:\\xampp\\htdocs\\salah_drupal\\web\\themes\\contrib\\panache\\templates\\includes\\sample-introductory-block.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array();
        static $filters = array("escape" => 6);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                [],
                ['escape'],
                []
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
