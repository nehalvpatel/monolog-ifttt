<?php

namespace nehalvpatel;

use Monolog\Logger;
use Monolog\Handler\AbstractProcessingHandler;

/**
 * Class IFTTTHandler
 *
 * @package nehalvpatel\monolog-ifttt
 */
class IFTTTHandler extends AbstractProcessingHandler
{
	private $_eventName;
	private $_secretKey;

	public function __construct($eventName, $secretKey, $level = Logger::ERROR, $bubble = true)
	{
		$this->_eventName = $eventName;
		$this->_secretKey = $secretKey;

		parent::__construct($level, $bubble);
	}

	public function write(array $record)
	{
		$postData = array(
			"value1" => $record["channel"],
			"value2" => $record["level_name"],
			"value3" => $record["message"]
		);
		$postString = json_encode($postData);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://maker.ifttt.com/trigger/" . $this->_eventName . "/with/key/" . $this->_secretKey);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			"Content-Type: application/json"
		));

		\Monolog\Handler\Curl\Util::execute($ch);
	}
}