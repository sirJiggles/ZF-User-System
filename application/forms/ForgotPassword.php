<?php

/*
 * This is the form for dealing with users that have forgotten their password
 * 
 * All code in this project is under the GNU general public licence, full 
 * terms and conditions can be found online: http://www.gnu.org/copyleft/gpl.html
 * 
 * @author Gareth Fuller <gareth-fuller@hotmail.co.uk>
 * @copyright Copyright (c) Gareth Fuller
 * @package Forms
 */

class Application_Form_ForgotPassword extends Zend_Form
{
    
    public function init()
    {
        $this->setAttrib('class', 'user');
        $this->setAttrib('id', 'forgotPassword');
        
        $customDecorators = array(
                            'ViewHelper',
                            'Description',
                            'Errors',
                            array(array('Input' => 'HtmlTag'), array('tag' => 'dd')),
                            array('Label', array('tag' => 'dt')),
                            array(array('row' => 'HtmlTag'), array('tag' => 'div', 'class' => 'item-wrapper')));
        

        // Email input field
        $email = new Zend_Form_Element_Text('email');
        $email->setRequired(true)
                ->addFilter(new Zend_Filter_HtmlEntities())
                ->addValidator(new Zend_Validate_EmailAddress())
                ->addErrorMessage('Email Address is required')
                ->setDecorators($customDecorators)
                ->setLabel('Email address:');
        
        // Submit input field
        $submit = new Zend_Form_Element_Submit('Request');
        $submit->setValue('Request new password')
                ->setAttrib('data-role', 'button')
                ->setAttrib('data-theme', 'b');
        
        $this->addElements(array($email, $submit));

        
    }
}

