<?php

namespace Cbenjafield\Mailgun;

class Url {

	/**
	 * The base of the URL.
	 *
	 * @var string
	 */
	protected $base;

	/**
	 * The path of the URL.
	 *
	 * @var string
	 */
	protected $path;

	/**
	 * URL constructor.
	 *
	 * @param  string $base
	 * @param  string $path
	 */
	public function __construct(string $base, $path = null)
	{
		$this->base = $base;
		$this->path = $path;
	}

	/**
	 * Make a new URL instance.
	 *
	 * @param  string $base
	 * @param  string $path
	 * @return \Cbenjafield\Mailgun\Url
	 */
	public static function make(string $base, $path = null) : self
	{
		return new self($base, $path);
	}

	/**
	 * Build URL.
	 *
	 * @return string
	 */
	public function buildUrl() : string
	{
		if(is_null($this->path)) return $this->base;

		return rtrim($this->path, '/') . '/' . ltrim($this->path, '/');
	}

	/**
	 * Get the URL as a string
	 *
	 * @return string
	 */
	public function toString() : string
	{
		return $this->buildUrl();
	}

	/**
	 * Get the URLs string form.
	 *
	 * @return string
	 */
	public function __toString()
	{
		return $this->toString();
	}

}