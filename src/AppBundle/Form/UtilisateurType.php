<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UtilisateurType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom')->add('prenom')->add('mail')->add('login')->add('password')->add('iP')->add('port')
                ->add('reponses_sondage')->add('reponses_sequence')->add('reponses_quizz')
                ->add('reponses_sequence', \Symfony\Bridge\Doctrine\Form\Type\EntityType::class, ['class'=>'AppBundle:Reponse_Sequence', 'choice_label'=>'Intitule', 'multiple'=>false, 'expanded'=>true, 'required'=>false]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Utilisateur'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_utilisateur';
    }


}
