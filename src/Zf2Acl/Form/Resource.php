<?php

namespace Zf2Acl\Form;

use Zend\Form\Form;

class Resource extends Form
{
    public function __construct($name = null, array $options = null)
    {
        parent::__construct('resource');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Zend\Form\Element\Hidden',
            'name' => 'id'
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Text',
            'name' => 'name',
            'attributes' => array(
                'class' => 'form-control col-xs-12 col-sm-10 col-md-10 col-lg-10',
                'placeholder' => 'Name',
            ),
            'options' => array(
                'label' => 'Name:',
                'label_attributes' => array(
                    'class' => 'control-label col-xs-12 col-sm-2 col-md-2 col-lg-2 no-padding-right'
                ),
            ),
        ));

        $this->add(array(
            'name' => 'submit',
            'type' => 'Zend\Form\Element\Submit',
            'attributes' => array(
                'value' => 'Salvar',
                'class' => 'btn btn-success'
            )
        ));
    }

}
