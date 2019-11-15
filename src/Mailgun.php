<?php

namespace Cbenjafield\Mailgun;

use GuzzleHttp\Client;

class Mailgun
{
	/**
	 * The Mailgun API Key
	 *
	 * @var string|null
	 */
	private $apiKey;

	/**
	 * The Guzzle Client
	 *
	 * @var \GuzzleHttp\Client
	 */
	private $client;

	/**
	 * The Mailgun APU version to use.
	 * 
	 * @var int
	 */
	private $version = 3;

	/**
	 * Specify the endpoint for the Mailgun API.
	 *
	 * @var string
	 */
	private $endpoint;

	/**
	 * The Mailgun constructor.
	 *
	 * @param  string  $apiKey
	 * @param  string  $endpoint
	 */
	public function __construct(string $apiKey, string $endpoint = 'https://api.eu.mailgun.net', int $timeout = 200)
	{
		if(is_null($apiKey)) throw new \InvalidArgumentException("Please specify a Mailgun API key.");
		if(is_null($endpoint)) throw new \InvalidArgumentException("Please specify a Mailgun API endpoint.");
		if(is_null($timeout)) $timeout = 200;

		$this->apiKey = $apiKey;
		$this->endpoint = $endpoint;

		$this->client = new Client([
			'base_uri' => Url::make($this->endpoint, "v{$this->version}")->toString(),
			'timeout' => $timeout,
			'auth' => [
				'api', $apiKey
			]
		]);
	}

	/**
	 * Messages
	 */
	public function messages($domain = null) : Api\Message
	{
		return new Api\Message($this->client, $domain);
	}
}