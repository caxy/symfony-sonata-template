<?php

namespace App\Admin;

use App\Entity\User;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UserAdmin extends AbstractAdmin
{
    protected function configureListFields(ListMapper $list)
    {
        $list
            ->add('email')
            ->add('roles')
            ->add('_actions', 'actions', [
                'actions' => [
                    'edit' => null
                ]
            ]);
    }

    protected function configureFormFields(FormMapper $form)
    {
        $isNew = !$this->getSubject() || !$this->getSubject()->getId();

        $form
            ->add('email')
            ->add('role', ChoiceType::class, [
                'choices' => [
                    'Admin' => User::ROLE_ADMIN,
                ],
                'expanded' => true,
                'multiple' => false
            ]);

    }
}