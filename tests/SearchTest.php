<?php

use dwmsw\genesislive\Search;

class SearchTest extends PHPUnit_Framework_TestCase
{
	/**
	 * Make sure exception is thrown if no Api key provided
	 */
	public function testApiKeyException()
	{
		try {
            $a = new Search();
        } catch (Exception $expected) {
            return;
        }

        $this->fail('Missing API key didn\'t throw an exception');
	}

	/**
	 * This will throw an exception due to the erroneous API key
	 */
	public function testDoSearch()
	{
		
        $search = new Search('xxxx-xxxx-xxxx-xxxx');

        try {
	        $search->doSearch();
	        $search->sendRequest();

	        $output = $search->getResponse();
        } catch (GuzzleHttp\Exception\ClientException $expected) {
            return;
        }

        $this->fail('Exception not thrown from doSearch Error');
	}

}