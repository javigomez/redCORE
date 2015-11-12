<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_weblinks
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

class AdministratorContacts1Cest
{
	/**
	 * Set up the contact stub
	 */
	public function __construct()
	{
		$this->name = 'contact' . rand(0,1000);
		$this->id = 0;
	}

	/*
	public function existsWsdl(ApiTester $I)
	{
		$I->comment('I execute a request to ensure that redCORE automatically generates the .wsdl schema on the fly');
		$I->sendGET('index.php?webserviceClient=administrator&webserviceVersion=1.0.0&option=contact&api=soap&wsdl');
		sleep(1);
		$I->sendGET('media/redcore/webservices/joomla/administrator.contact.1.0.0.wsdl');
		$I->seeResponseCodeIs(200);
		$I->seeResponseIsXml();
	}
	*/

	public function readList(ApiTester $I)
	{

		$I->wantTo('?');
		$I->amHttpAuthenticated('admin', 'admin');
		$I->sendSoapRequest('readList', '');
		//$I->sendSoapRequest('create', '<ns:create><name>soap4</name><catid>4</catid></ns:create>');
		$I->comment("agg");
	}
}