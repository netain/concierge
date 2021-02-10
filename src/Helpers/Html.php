<?php

namespace MrTea\Concierge\Helpers;
use Concierge;

class Html{
	public function arrayToHtmlAttribs($attribs)
	{
		$htmlAttribs = "";
		if(count($attribs)){
			foreach($attribs as $name => $value){
				$htmlAttribs .= "{$name}=\"{$value}\" ";
			}
		}

		return $htmlAttribs;
	}
}