<?php

namespace Cbenjafield\Mailgun;

class Message
{


	/**
	 * The from attribute.
	 *
	 * @var string
	 */
	protected $from;

	/**
	 * The to attribute.
	 *
	 * @var string|array
	 */
	protected $to;

	/**
	 * The CC attribute.
	 *
	 * @var string|array
	 */
	protected $cc;

	/**
	 * The BCC attribute.
	 *
	 * @var string|array
	 */
	protected $bcc;

	/**
	 * The subject attribute.
	 *
	 * @var string
	 */
	protected $subject;

	/**
	 * The text body attribute.
	 *
	 * @var string
	 */
	protected $text;

	/**
	 * The html body attribute.
	 *
	 * @var string
	 */
	protected $html;

	/**
	 * The amp-html attribute.
	 *
	 * @var string
	 */
	protected $ampHtml;

	/**
	 * The attachments for the email.
	 *
	 * @var array
	 */
	protected $attachments = [];

	/**
	 * The inline attachments for the email
	 *
	 * @var string|array
	 */
	protected $inline;

	/**
	 * Set the from attribute.
	 *
	 * @param  string $address
	 * @return self
	 */
	public function setFrom(string $address) : self
	{
		$this->from = $address;
		return $this;
	}

	/**
	 * Set the to attribute
	 *
	 * @param  mixed $address
	 * @return self
	 */
	public function setTo($address) : self
	{
		$this->to = $address;
		return $this;
	}

	/**
	 * Set the cc attribute
	 *
	 * @param  mixed $address
	 * @return self
	 */
	public function setCC($address) : self
	{
		$this->cc = $address;
		return $this;
	}

	/**
	 * Set the bcc attribute
	 *
	 * @param  mixed $address
	 * @return self
	 */
	public function setBCC($address) : self
	{
		$this->bcc = $address;
		return $this;
	}

	/**
	 * Set the subject attribute
	 *
	 * @param  string $subject
	 * @return self
	 */
	public function setSubject(string $subject) : self
	{
		$this->subject = $subject;
		return $this;
	}

	/**
	 * Set the Text Body attribute.
	 *
	 * @param  string $value
	 * @return self
	 */
	public function setText(string $value) : self
	{
		$this->text = $value;
		return $this;
	}

	/**
	 * Set the HTML Body Attribute.
	 *
	 * @param  string $value
	 * @return self
	 */
	public function setHtml(string $value) : self
	{
		$this->html = $value;
		return $this;
	}

	/**
	 * Set the Amp-HTML body attribute.
	 *
	 * @param  string $value
	 * @return self
	 */
	public function setAmp(string $value) : self
	{
		$this->ampHtml = $value;
		return $this;
	}

	/**
	 * Get the array representation.
	 *
	 * @return array
	 */
	public function toArray()
	{
		return [
			'to' => $this->commaSeparated($this->to),
			'from' => $this->from,
			'bcc' => $this->commaSeparated($this->bcc),
			'cc' => $this->commaSeparated($this->cc),
			'subject' => $this->subject,
			'text' => $this->text,
			'html' => $this->html,
			'ampHtml' => $this->ampHtml
		];
	}

	/**
	 * Send the message.
	 *
	 * @param  \GuzzleHttp\Client $client
	 * @param  string $url
	 * @return mixed
	 */
	public function send($client, $url)
	{
		$response = $client->post($url, [
			'form_params' => array_filter($this->toArray())
		]);
		return $response;
	}

	/**
	 * Return a comma separated string of values.
	 *
	 * @param  mixed $value
	 * @return string
	 */
	public function commaSeparated($value) : string
	{
		if(is_array($value)) {
			return implode(',', $value);
		}

		return $value;
	}

}