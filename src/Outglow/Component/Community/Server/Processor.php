<?php namespace Outglow\Component\Community;

class Server_Processor
{
	private $httpHost;
	private $requestUri;
	private $requestString;

	public function __construct()
	{
		$this->setHttpHost();
		$this->setRequestUri();
		$this->concatFullRequestString();
	}

	public function getRequestString()
	{
		return $this->requestString;
	}

	public function processRequestStringForRoute($baseUrl)
	{
		return end(explode($baseUrl, $this->requestString));
	}

	private function setHttpHost()
	{
		return $this->httpHost = $_SERVER['HTTP_HOST'];
	}

	private function setRequestUri()
	{
		return $this->requestUri = $_SERVER['REQUEST_URI'];
	}

	private function concatFullRequestString()
	{
		return $this->requestString = 'http://' 	  .
									  $this->httpHost .
									  $this->requestUri;
	}
}

?>