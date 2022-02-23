<?php 

namespace Config;

class Auth extends \Myth\Auth\Config\Auth

{
    
    /**
	 * --------------------------------------------------------------------
	 * Allow User Registration
	 * --------------------------------------------------------------------
	 *
	 * When enabled (default) any unregistered user may apply for a new
	 * account. If you disable registration you may need to ensure your
	 * controllers and views know not to offer registration.
	 *
	 * @var bool
	 */
	public $allowRegistration = false;
	
	/**
	 * --------------------------------------------------------------------
	 * Default User Group
	 * --------------------------------------------------------------------
	 *
	 * The name of a group a user will be added to when they register,
	 * i.e. $defaultUserGroup = 'guests'.
	 *
	 * @var string
	 */
	public $defaultUserGroup;
    
	/**
	 * --------------------------------------------------------------------
	 * Views used by Auth Controllers
	 * --------------------------------------------------------------------
	 *
	 * @var array
	 */
	public $views = [
		'login'		   => 'Views/auth/login',
		'register'		=> 'Myth\Auth\Views\register',
		'forgot'		  => 'Myth\Auth\Views\forgot',
		'reset'		   => 'Myth\Auth\Views\reset',
		'emailForgot'	 => 'Myth\Auth\Views\emails\forgot',
		'emailActivation' => 'Myth\Auth\Views\emails\activation',
	];
	
		/**
	 * --------------------------------------------------------------------
	 * Layout for the views to extend
	 * --------------------------------------------------------------------
	 *
	 * @var string
	 */
	public $viewLayout = 'Views/auth/layout';
	
}
/*
$namespaces=array();
foreach(get_declared_classes() as $name) {
    if(preg_match_all("@[^\\\]+(?=\\\)@iU", $name, $matches)) {
        $matches = $matches[0];
        $parent =&$namespaces;
        while(count($matches)) {
            $match = array_shift($matches);
            if(!isset($parent[$match]) && count($matches))
                $parent[$match] = array();
            $parent =&$parent[$match];

        }
    }
}

print_r($namespaces);
*/