<?php

/*
 * This form is used for both adding and editing users within the system
 * 
 * All code in this project is under the GNU general public licence, full 
 * terms and conditions can be found online: http://www.gnu.org/copyleft/gpl.html
 * 
 * @author Gareth Fuller <gareth-fuller@hotmail.co.uk>
 * @copyright Copyright (c) Gareth Fuller
 * @package Forms
 */
class Application_Form_UserForm extends Zend_Form
{
    
    public function init()
    {
        $customDecorators = array(
                                'ViewHelper',
                                'Description',
                                'Errors',
                                array(array('Input' => 'HtmlTag'), array('tag' => 'dd')),
                                array('Label', array('tag' => 'dt')),
                                array(array('row' => 'HtmlTag'), array('tag' => 'div', 'class' => 'item-wrapper')));
       
        $this->setAttrib('class', 'user');
        $this->setAttrib('id', 'userForm');
        
        // Username input field
        $username = new Zend_Form_Element_Text('username');
        $username->addFilter('StringTrim')  
                ->addFilter(new Zend_Filter_HtmlEntities())
                ->setRequired(true)
                ->addErrorMessage('Username is required')
                ->setDecorators($customDecorators)
                ->setLabel('Username:');
        
        // Password input field
        $password = new Zend_Form_Element_Password('password');
        $password->addErrorMessage('Password is required')
                ->addFilter(new Zend_Filter_HtmlEntities())
                ->setDecorators($customDecorators)
                ->addValidator('Identical', false, array('token' => 'password_repeat'))
                ->setLabel('Password:');
        
        // Password repeat field
        $passwdRepeat = new Zend_Form_Element_Password('password_repeat');
        $passwdRepeat->addErrorMessage('Passwords don\'t match')
                ->addValidator('Identical', false, array('token' => 'password'))
                ->setDecorators($customDecorators)
                ->addFilter(new Zend_Filter_HtmlEntities())
                ->setLabel('Reapeat Password:');
        
        
        // First Name input field
        $firstName = new Zend_Form_Element_Text('first_name');
        $firstName->addFilter('StringTrim')
                ->addFilter(new Zend_Filter_HtmlEntities())
                ->setRequired(true)
                ->addErrorMessage('First name is required')
                ->setDecorators($customDecorators)
                ->setLabel('First Name:');
        
        // Lastname input field
        $lastName = new Zend_Form_Element_Text('last_name');
        $lastName->addFilter('StringTrim')
                ->addFilter(new Zend_Filter_HtmlEntities())
                ->setRequired(true)
                ->addErrorMessage('Last name is required')
                ->setDecorators($customDecorators)
                ->setLabel('Last Name');
        
        // Email input field
        $email = new Zend_Form_Element_Text('email_address');
        $email->addFilter('StringTrim')
                ->addFilter(new Zend_Filter_HtmlEntities())
                ->setRequired(true)
                ->addErrorMessage('Email address is required')
                ->setDecorators($customDecorators)
                ->setLabel('Email Address:');
        
        // Role input field
        $role = new Zend_Form_Element_Select('role');
        $role->setLabel('Role:')
                ->addMultiOption('admin', 'Admin')
                ->setDecorators($customDecorators)
                ->addMultiOption('editor', 'Editor')
                ->setAttrib('data-native-menu', 'false');
        
       
        
        
        // Prevent Cross site request forgery (CSRF) attack
        /*$this->addElement('hash', 'csrf_token',  
                    array('salt' => get_class($this) . 'ds38JHyw')); */
        
        
        // Submit input field
        $submit = new Zend_Form_Element_Submit('Save');
        $submit->setValue('Save')
                ->setAttrib('data-role', 'button')
                ->setAttrib('data-theme', 'b');
        
        // Work out if we are in the edit user location, if so display the staus select box
        if(Zend_Controller_Front::getInstance()->getRequest()->getActionName() == 'edit'){
             
            // Status input field
            $status = new Zend_Form_Element_Select('active');
            $status->setLabel('Active:')
                    ->addMultiOption('1', 'Yes')
                    ->setDecorators($customDecorators)
                    ->addMultiOption('0', 'No')
                    ->setAttrib('data-native-menu', 'false');
            
            $this->addElements(array($firstName, $lastName, $username, $email, $password, $passwdRepeat, $role, $status, $submit));
        }else{
            $this->addElements(array($firstName, $lastName, $username, $email, $password, $passwdRepeat, $role, $submit));
        }
         
      
    }
    
    
}

