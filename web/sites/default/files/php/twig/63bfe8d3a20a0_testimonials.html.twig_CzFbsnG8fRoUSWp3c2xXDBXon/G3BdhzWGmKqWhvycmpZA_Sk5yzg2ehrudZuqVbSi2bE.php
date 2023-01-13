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

/* @panache/includes/testimonials.html.twig */
class __TwigTemplate_5572e0db238208e10a59aaf7dee09b48 extends \Twig\Template
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
        echo "<section class=\"panache-testimonial\">
  <div class=\"container\">
    <div class=\"row\">
      <div class=\"col-lg-12\">
        <div class=\"panache-testimonial-wrapper\">
          <div class=\"panache-testimonial-item\">
            <div class=\"panache-testimonial-image-wrapper\">
              <div class=\"panache-testimonial-image\">
                <img src=\"";
        // line 9
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 9, $this->source), "html", null, true);
        echo "/images/author2.jpg\" alt=\"\">
              </div>
            </div>
            <h2 class=\"panache-testimonial-author\">
              <span class=\"first-name\">Lorem</span>
              <span class=\"last-name\">consetetur</span>
            </h2>
            <div class=\"panache-testimonial-text\">
              <p>
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore edolore magna aliquyam erat, sed diam voluptua. At vero eos accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, takimata sanctus est ipsum dolor.
              </p>
            </div>
          </div>
          <div class=\"panache-testimonial-item\">
            <div class=\"panache-testimonial-image-wrapper\">
              <div class=\"panache-testimonial-image\">
                <img src=\"";
        // line 25
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 25, $this->source), "html", null, true);
        echo "/images/author.jpg\" alt=\"\">
              </div>
            </div>
            <h2 class=\"panache-testimonial-author\">
              <span class=\"first-name\">Lorem</span>
              <span class=\"last-name\">Ipsum</span>
            </h2>
            <div class=\"panache-testimonial-text\">
              <p>
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore edolore magna aliquyam erat, sed diam voluptua. At vero eos accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, takimata sanctus est ipsum dolor.
              </p>
            </div>
          </div>
          <div class=\"panache-testimonial-item\">
            <div class=\"panache-testimonial-image-wrapper\">
              <div class=\"panache-testimonial-image\">
                <img src=\"";
        // line 41
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 41, $this->source), "html", null, true);
        echo "/images/author.jpg\" alt=\"\">
              </div>
            </div>
            <h2 class=\"panache-testimonial-author\">
              <span class=\"first-name\">Lorem</span>
              <span class=\"last-name\">Ipsum</span>
            </h2>
            <div class=\"panache-testimonial-text\">
              <p>
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore edolore magna aliquyam erat, sed diam voluptua. At vero eos accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, takimata sanctus est ipsum dolor.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
";
    }

    public function getTemplateName()
    {
        return "@panache/includes/testimonials.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  87 => 41,  68 => 25,  49 => 9,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@panache/includes/testimonials.html.twig", "C:\\xampp\\htdocs\\salah_drupal\\web\\themes\\contrib\\panache\\templates\\includes\\testimonials.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array();
        static $filters = array("escape" => 9);
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
