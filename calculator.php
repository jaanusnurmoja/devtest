<?php 
class calculator
{
	public $commission = 17;
	public $cvmax = 100000;
	public $cvmin = 100;

	public function taxOpts()
	{
		$taxopts = array();
		$taxrange = range(0,100);
		foreach ($taxrange as $v)
		{
			$taxopts[] = '<option value="' . $v . '">' . $v . '</option>';
		}
		return implode($taxopts);
	}
	
	public function instOpts()
	{
		$instopts = array();
		$instrange = range(1,12);
		foreach ($instrange as $v)
		{
			$instopts[] = '<option value="' . $v . '">' . $v . '</option>';
		}
		return implode($instopts);
	}
	
	// Actually not needed as we prefer to not to generate a html select option list with numbers from 100 to 100000
	public function cvRange()
	{
		return range($this->cvmin, $this->cvmax);
	}

}
?>