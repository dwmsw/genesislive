<?php

use dwmsw\genesislive\Image;

class ImageTest extends PHPUnit_Framework_TestCase
{
	/**
	 * Check the returned value of the image
	 */
	public function testBaseImage()
	{
		$expected = 'http://api.genesislive.net/get/media?Key=1234';
		$imageURL = Image::getImageURL('1234');

		$this->assertEquals($expected, $imageURL);
	}

	/**
	 * Check the returned value of the image
	 */
	public function testWidthImage()
	{
		$imageURL = Image::getImageURL('1234', 200);

		$this->assertContains('width=200', $imageURL, 'String didn\'t contain a width' , true);
	}

	/**
	 * Check the returned value of the image
	 */
	public function testHeightImage()
	{
		$imageURL = Image::getImageURL('1234', false, 200);

		$this->assertContains('height=200', $imageURL, 'String didn\'t contain a Height' , true);
	}

	/**
	 * Check the returned value of the image
	 */
	public function testCompleteImage()
	{
		$imageURL = Image::getImageURL('1234', 200, 200);

		$this->assertContains('width=200', $imageURL, 'String didn\'t contain a width' , true);
		$this->assertContains('height=200', $imageURL, 'String didn\'t contain a height' , true);
		$this->assertContains('key=1234', $imageURL, 'String didn\'t contain a key' , true);
	}

}