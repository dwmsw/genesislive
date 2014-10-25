<?php

use dwmsw\genesislive\Single;

class SingleTest extends PHPUnit_Framework_TestCase
{
	/**
	 * Make sure exception is thrown if no Api key provided
	 */
	public function testApiKeyException()
	{
		try {
            $a = new Single();
        } catch (Exception $expected) {
            return;
        }

        $this->fail('Missing API key didn\'t throw an exception');
	}

}