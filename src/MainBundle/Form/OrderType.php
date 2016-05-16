<?php

namespace MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrderType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fio', null, array('label' => 'Фамилия Имя Отчество'))
            ->add('address', null, array('label' => 'Адрес'))
            ->add('email', EmailType::class, array('label' => 'Email'))
            ->add('phone', null, array('label' => 'Телефон'))
            ->add('subject', null, array('label' => 'Тема'))
            ->add('message', null, array('label' => 'Сообщение'))
            ->add('file', 'file', ['label' => 'Лого компании', 'required' => false])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MainBundle\Entity\Order',
            'csrf_protection' => false,
        ));
    }
    /**
     * @return string
     */
    public function getName()
    {
        return 'order';
    }
}