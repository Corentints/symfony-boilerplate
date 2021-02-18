<?php

namespace App\Twig;

use Symfony\Component\Form\FormFactoryInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class GenerateFormExtension extends AbstractExtension
{
    private FormFactoryInterface $factory;

    public function __construct(FormFactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('generate_form', [$this, 'formType'])
        ];
    }

    public function formType($formType, $formName = '')
    {
        if ($formName === '') {
            return $this->factory->create($formType)->createView();
        }
        return $this->factory->createNamed($formName, $formType)->createView();
    }
}
