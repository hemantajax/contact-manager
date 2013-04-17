<?php

class ContactsControllerTest extends TestCase {
	public function testIndex()
	{
		$response = $this->call('GET', 'contacts');
		$this->assertTrue($response->isOk());
	}

	public function testShow()
	{
		$response = $this->call('GET', 'contacts/1');
		$this->assertTrue($response->isOk());
	}

	public function testCreate()
	{
		$response = $this->call('GET', 'contacts/create');
		$this->assertTrue($response->isOk());
	}

	public function testEdit()
	{
		$response = $this->call('GET', 'contacts/1/edit');
		$this->assertTrue($response->isOk());
	}
}
