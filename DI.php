<?php
// echo "<pre>";
interface MailingService {

}

class MailgunMailingService implements MailingService {
	
}

interface SMSService {

}

class TwilioSMSService implements SMSService {
	
}

class UserService {
	
	function __construct(MailingService $mailing) {
		var_dump($mailing);
	}
	
}


$diMap = [
	'MailingService' => 'MailgunMailingService',
	'SMSService' => 'TwilioSMSService'
];

$caller = 'UserService';
$ref = new ReflectionClass($caller);

$methods = $ref->getMethods();
$constructor = $methods[0];

//$refFunc = new ReflectionFunction($methods[0]);

$paramTypes = $constructor->getParameters()[0]->getClass()->name;
$obj = new $diMap[$paramTypes];

//var_dump()
new $caller($obj);

//var_dump($constructor->invoke($));