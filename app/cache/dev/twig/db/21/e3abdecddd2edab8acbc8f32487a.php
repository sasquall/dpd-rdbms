<?php

/* BrdrgzDoctorPatientDiagnosisBundle:Diagnosis:new.html.twig */
class __TwigTemplate_db21e3abdecddd2edab8acbc8f32487a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "BrdrgzDoctorPatientDiagnosisBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "DPD RDBMS - New Diagnosis";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<h1>Diagnosis creation</h1>

<form action=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("diagnosis_create"), "html", null, true);
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderEnctype($this->getContext($context, "form"));
        echo ">
    ";
        // line 9
        echo $this->env->getExtension('form')->renderWidget($this->getContext($context, "form"));
        echo "
    <p>
        <button type=\"submit\">Create</button>
    </p>
</form>

<ul class=\"record_actions\">
    <li>
        <a href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("diagnosis"), "html", null, true);
        echo "\">
            Back to the list
        </a>
    </li>
</ul>
";
    }

    public function getTemplateName()
    {
        return "BrdrgzDoctorPatientDiagnosisBundle:Diagnosis:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
