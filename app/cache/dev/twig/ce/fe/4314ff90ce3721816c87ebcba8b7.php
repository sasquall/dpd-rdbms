<?php

/* BrdrgzDoctorPatientDiagnosisBundle::layout.html.twig */
class __TwigTemplate_cefe4314ff90ce3721816c87ebcba8b7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
        <link rel=\"stylesheet\" href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/brdrgzdoctorpatientdiagnosis/css/style.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
        <title>";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        <link rel=\"shortcut icon\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
\t\t\t\t<div id=\"header\">
\t\t\t\t\t\t<ul id=\"tabs\">
\t\t\t\t\t\t\t\t<li><a href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("patient"), "html", null, true);
        echo "\">Home</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("doctor"), "html", null, true);
        echo "\">Doctors</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("patient"), "html", null, true);
        echo "\">Patients</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("diagnosis"), "html", null, true);
        echo "\">Diagnoses</a></li>
\t\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t\t<div id=\"content\">
\t\t\t\t\t\t";
        // line 19
        $this->displayBlock('content', $context, $blocks);
        // line 21
        echo "\t\t\t\t</div>
\t\t\t\t<div id=\"pagination\">
\t\t\t\t</div>
    </body>
</html>";
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
        echo "DPD RDBMS";
    }

    // line 19
    public function block_content($context, array $blocks = array())
    {
        // line 20
        echo "\t\t\t\t\t\t";
    }

    public function getTemplateName()
    {
        return "BrdrgzDoctorPatientDiagnosisBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
