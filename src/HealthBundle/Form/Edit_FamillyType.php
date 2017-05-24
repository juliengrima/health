<?php

namespace HealthBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;


class Edit_FamillyType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('picture', FileType::class, array(
                'data_class' => null,
                    'label' => 'Capture',
                    'attr' => array('accept' => 'image/*',
                        'id' => 'capture',
                        'capture' => 'camera')
            ))
            ->add('name')
            ->add('statut', ChoiceType::class, array(
                'choices' => array(
                    'grandfather' => 'grandfather',
                    'Grandmother' => 'Grandmother',
                    'Father' => 'Father',
                    'Mother' => 'Mother',
                    'Stepfather' => 'Stepfather',
                    'Stepmother' => 'Stepmother',
                    'Son' => 'Son',
                    'daughter' => 'Daughter'
                ,)))
            ->add('type', ChoiceType::class, array(
                'choices' => array(
                    'male' => 'male',
                    'female' => 'female'
                ,)))
            ->add('birthdate')

            ->add('color')
            ->add('information');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'HealthBundle\Entity\Familly'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'healthbundle_familly';
    }


}
