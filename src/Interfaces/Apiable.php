<?php

namespace Cbenjafield\Mailgun\Interfaces;

interface Apiable
{
	/**
	 * Get the Url of the resource.
	 *
	 * @param  string  $path
	 * @return string
	 */
	public function url($path = null) : string;
}