<?php

namespace Cbenjafield\Mailgun\Interfaces;

interface Arrayable
{
	/**
	 * Return the array representation.
	 *
	 * @return array
	 */
	public function toArray() : array;
}