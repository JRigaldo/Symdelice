<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;

class PasswordFieldType extends AbstractType
{
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars = array_merge($view->vars, []);
        parent::buildView($view, $form, $options);
    }

    public function getParent()
    {
        return PasswordType::class;
    }
}
