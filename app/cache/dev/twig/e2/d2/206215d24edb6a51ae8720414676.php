<?php

/* BrdrgzDoctorPatientDiagnosisBundle:Doctor:index.html.twig */
class __TwigTemplate_e2d2206215d24edb6a51ae8720414676 extends Twig_Template
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
        echo "DPD RDBMS - Doctors";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<h1>Doctors</h1>

<table class=\"records_list\">
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Degrees</th>
            <th>Email</th>
            <th>Portrait</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    ";
        // line 21
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "entities"));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 22
            echo "        <tr>
            <td><a href=\"";
            // line 23
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("doctor_show", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "id"), "html", null, true);
            echo "</a></td>
            <td>";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "firstname"), "html", null, true);
            echo "</td>
            <td>";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "lastname"), "html", null, true);
            echo "</td>
            <td>";
            // line 26
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "degrees"), "html", null, true);
            echo "</td>
            <td>";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "email"), "html", null, true);
            echo "</td>
            <td>";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "portrait"), "html", null, true);
            echo "</td>
            <td>
                <ul>
                    <li>
                        <a href=\"";
            // line 32
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("doctor_show", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
            echo "\">show</a>
                    </li>
                    <li>
                        <a href=\"";
            // line 35
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("doctor_edit", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
            echo "\">edit</a>
                    </li>
                </ul>
            </td>
        </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 41
        echo "    </tbody>
</table>

<ul>
    <li>
        <a href=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("doctor_new"), "html", null, true);
        echo "\">
            Create a new entry
        </a>
    </li>
</ul>
";
    }

    public function getTemplateName()
    {
        return "BrdrgzDoctorPatientDiagnosisBundle:Doctor:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
