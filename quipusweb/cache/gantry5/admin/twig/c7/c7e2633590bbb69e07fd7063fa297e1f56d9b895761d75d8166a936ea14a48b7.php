<?php

/* @gantry-admin/pages/themes/themes.html.twig */
class __TwigTemplate_719eb0ad79668e7eb10f517cd1c85e382d5343e6907313260340750acc6ea281 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'gantry' => array($this, 'block_gantry'),
            'footer_section' => array($this, 'block_footer_section'),
        );
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return $this->loadTemplate(((((isset($context["ajax"]) ? $context["ajax"] : null) - (isset($context["suffix"]) ? $context["suffix"] : null))) ? ("@gantry-admin/partials/ajax.html.twig") : ("@gantry-admin/partials/base.html.twig")), "@gantry-admin/pages/themes/themes.html.twig", 1);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 3
        $context["settings_url"] = $this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "platform", array()), "settings", array());
        // line 4
        $context["settings_key"] = $this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "platform", array()), "settings_key", array());
        // line 1
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 6
    public function block_content($context, array $blocks = array())
    {
        // line 7
        echo "    <div id=\"g5-container\" class=\"g-container\">
        <div class=\"inner-container\">
            <div class=\"g-grid\">
                <div class=\"g-block main-block\">
                    <section id=\"main\">
                        <div data-g5-content=\"\">
                            ";
        // line 13
        $this->displayBlock('gantry', $context, $blocks);
        // line 60
        echo "                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
";
    }

    // line 13
    public function block_gantry($context, array $blocks = array())
    {
        // line 14
        echo "                                <div class=\"g-content\" data-g5-content=\"\">
                                    <div class=\"g-grid overview-header\">
                                        <div class=\"g-block\">
                                            <h2 class=\"theme-title\"><i class=\"fa fa-fw fa-plug\"></i> ";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_AVAILABLE_THEMES"), "html", null, true);
        echo "</h2>
                                        </div>
                                    ";
        // line 19
        if ((isset($context["settings_url"]) ? $context["settings_url"] : null)) {
            // line 20
            echo "                                        <div class=\"g-block\">
                                            <a class=\"button button-primary float-right\" href=\"";
            // line 21
            echo twig_escape_filter($this->env, (isset($context["settings_url"]) ? $context["settings_url"] : null), "html", null, true);
            echo "\" data-settings-key=\"";
            echo twig_escape_filter($this->env, (isset($context["settings_key"]) ? $context["settings_key"] : null), "html", null, true);
            echo "\">
                                                <i class=\"fa fa-cog\"></i> ";
            // line 22
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_PLATFORM_SETTINGS"), "html", null, true);
            echo "
                                            </a>
                                        </div>
                                    ";
        }
        // line 26
        echo "                                    </div>
                                    <div class=\"themes cards-wrapper g-grid fixed-blocks\">
                                        ";
        // line 28
        if (twig_length_filter($this->env, (isset($context["themes"]) ? $context["themes"] : null))) {
            // line 29
            echo "                                        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["themes"]) ? $context["themes"] : null));
            foreach ($context['_seq'] as $context["id"] => $context["theme"]) {
                // line 30
                echo "                                            <div class=\"theme card\">
                                                <div class=\"theme-id\">
                                                    ";
                // line 32
                if ($this->getAttribute($this->getAttribute($context["theme"], "details", array()), "icon", array())) {
                    echo "<i class=\"fa fa-fw fa-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["theme"], "details", array()), "icon", array()), "html", null, true);
                    echo "\"></i>";
                }
                // line 33
                echo "                                                    ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["theme"], "title", array()), "html", null, true);
                echo " <span class=\"theme-info\">(v";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["theme"], "details", array()), "version", array()), "html", null, true);
                echo " / ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["theme"], "name", array()), "html", null, true);
                echo ")</span>
                                                </div>
                                                <div class=\"theme-screenshot\">
                                                    ";
                // line 36
                if ($this->getAttribute($context["theme"], "admin_url", array())) {
                    // line 37
                    echo "                                                    <a href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["theme"], "admin_url", array()), "html", null, true);
                    echo "\">
                                                    ";
                }
                // line 39
                echo "                                                        <img src=\"";
                echo twig_escape_filter($this->env, _twig_default_filter($this->env->getExtension('GantryTwig')->urlFunc($this->getAttribute($context["theme"], "thumbnail", array())), "http://www.placehold.it/206x150/f4f4f4"), "html", null, true);
                echo "\" />
                                                    ";
                // line 40
                if ($this->getAttribute($context["theme"], "admin_url", array())) {
                    // line 41
                    echo "                                                    </a>
                                                    ";
                }
                // line 43
                echo "                                                </div>
                                                <div class=\"theme-name\">
                                                    ";
                // line 45
                if ($this->getAttribute($context["theme"], "preview_url", array())) {
                    // line 46
                    echo "                                                    <a class=\"button\" href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["theme"], "preview_url", array()), "html", null, true);
                    echo "\" target=\"_blank\">";
                    echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_PREVIEW"), "html", null, true);
                    echo "</a>
                                                    ";
                }
                // line 48
                echo "                                                    ";
                if ($this->getAttribute($context["theme"], "admin_url", array())) {
                    // line 49
                    echo "                                                    <a class=\"button button-primary\" href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["theme"], "admin_url", array()), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_CONFIGURE"), "html", null, true);
                    echo "</a>
                                                    ";
                }
                // line 51
                echo "                                                </div>
                                            </div>
                                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['id'], $context['theme'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 54
            echo "                                        ";
        } else {
            // line 55
            echo "                                            <p>";
            echo twig_escape_filter($this->env, $this->env->getExtension('GantryTwig')->transFilter("GANTRY5_PLATFORM_NO_THEMES_INSTALLED"), "html", null, true);
            echo "</p>
                                        ";
        }
        // line 57
        echo "                                    </div>
                                </div>
                            ";
    }

    // line 68
    public function block_footer_section($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "@gantry-admin/pages/themes/themes.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  187 => 68,  181 => 57,  175 => 55,  172 => 54,  164 => 51,  156 => 49,  153 => 48,  145 => 46,  143 => 45,  139 => 43,  135 => 41,  133 => 40,  128 => 39,  122 => 37,  120 => 36,  109 => 33,  103 => 32,  99 => 30,  94 => 29,  92 => 28,  88 => 26,  81 => 22,  75 => 21,  72 => 20,  70 => 19,  65 => 17,  60 => 14,  57 => 13,  47 => 60,  45 => 13,  37 => 7,  34 => 6,  30 => 1,  28 => 4,  26 => 3,  20 => 1,);
    }
}
/* {% extends ajax-suffix ? "@gantry-admin/partials/ajax.html.twig" : "@gantry-admin/partials/base.html.twig" %}*/
/* */
/* {% set settings_url = gantry.platform.settings %}*/
/* {% set settings_key = gantry.platform.settings_key %}*/
/* */
/* {% block content %}*/
/*     <div id="g5-container" class="g-container">*/
/*         <div class="inner-container">*/
/*             <div class="g-grid">*/
/*                 <div class="g-block main-block">*/
/*                     <section id="main">*/
/*                         <div data-g5-content="">*/
/*                             {% block gantry %}*/
/*                                 <div class="g-content" data-g5-content="">*/
/*                                     <div class="g-grid overview-header">*/
/*                                         <div class="g-block">*/
/*                                             <h2 class="theme-title"><i class="fa fa-fw fa-plug"></i> {{ 'GANTRY5_PLATFORM_AVAILABLE_THEMES'|trans }}</h2>*/
/*                                         </div>*/
/*                                     {% if settings_url %}*/
/*                                         <div class="g-block">*/
/*                                             <a class="button button-primary float-right" href="{{ settings_url }}" data-settings-key="{{ settings_key }}">*/
/*                                                 <i class="fa fa-cog"></i> {{ 'GANTRY5_PLATFORM_PLATFORM_SETTINGS'|trans }}*/
/*                                             </a>*/
/*                                         </div>*/
/*                                     {% endif %}*/
/*                                     </div>*/
/*                                     <div class="themes cards-wrapper g-grid fixed-blocks">*/
/*                                         {% if themes|length %}*/
/*                                         {% for id, theme in themes %}*/
/*                                             <div class="theme card">*/
/*                                                 <div class="theme-id">*/
/*                                                     {% if theme.details.icon %}<i class="fa fa-fw fa-{{ theme.details.icon }}"></i>{% endif %}*/
/*                                                     {{ theme.title }} <span class="theme-info">(v{{ theme.details.version }} / {{ theme.name }})</span>*/
/*                                                 </div>*/
/*                                                 <div class="theme-screenshot">*/
/*                                                     {% if theme.admin_url %}*/
/*                                                     <a href="{{ theme.admin_url }}">*/
/*                                                     {% endif %}*/
/*                                                         <img src="{{ url(theme.thumbnail)|default('http://www.placehold.it/206x150/f4f4f4') }}" />*/
/*                                                     {% if theme.admin_url %}*/
/*                                                     </a>*/
/*                                                     {% endif %}*/
/*                                                 </div>*/
/*                                                 <div class="theme-name">*/
/*                                                     {% if theme.preview_url %}*/
/*                                                     <a class="button" href="{{ theme.preview_url }}" target="_blank">{{ 'GANTRY5_PLATFORM_PREVIEW'|trans }}</a>*/
/*                                                     {% endif %}*/
/*                                                     {% if theme.admin_url %}*/
/*                                                     <a class="button button-primary" href="{{ theme.admin_url }}">{{ 'GANTRY5_PLATFORM_CONFIGURE'|trans }}</a>*/
/*                                                     {% endif %}*/
/*                                                 </div>*/
/*                                             </div>*/
/*                                         {% endfor %}*/
/*                                         {% else %}*/
/*                                             <p>{{ 'GANTRY5_PLATFORM_NO_THEMES_INSTALLED'|trans }}</p>*/
/*                                         {% endif %}*/
/*                                     </div>*/
/*                                 </div>*/
/*                             {% endblock %}*/
/*                         </div>*/
/*                     </section>*/
/*                 </div>*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/* {% endblock %}*/
/* */
/* {% block footer_section %}*/
/* {% endblock %}*/
/* */
