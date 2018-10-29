<?php
namespace Application\Roman;

class Convert
{
	protected $mapping = ['','I','II','III','IV','V','VI','VII','VIII','IX','X'];
	public function whatever($x)
	{
		return $this->mapping[(int) $x];
	}
}
