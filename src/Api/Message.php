<?php

namespace Cbenjafield\Mailgun\Api;

use GuzzleHttp\Client;

class Message implements Apiable
{
	/**
	 * Guzzle Client
	 *
	 * @var \GuzzleHttp\Client
	 */
	private $client;

	/**
	 * Mailgun domain.
	 *
	 * @var string
	 */
	private $domain;

	public function __construct(Client $client, $domain = null)
	{
		$this->client = $client;
		$this->domain = $domain;
	}

	/**
	 * The messages URL.
	 *
	 * @return string
	 */
	public function url($path = null) : string
	{
		return Url::make('messages', $path)->toString();
	}

	/**
	 * Set the Mailgun domain.
	 */
	public function setDomain(string $domain) : self
	{
		if(is_null($domain)) throw new \InvalidArgumentException("Please specify a valid domain.");

		return $this;
	}

	/**
	 * Send a message.
	 *
	 * @param  \Cbenjafield\Mailgun\Message  $message
	 * @return mixed
	 */
	public function send(\Cbenjafield\Mailgun\Message $message)
	{
		return $message->send($this->client, $this->url());
	}

}