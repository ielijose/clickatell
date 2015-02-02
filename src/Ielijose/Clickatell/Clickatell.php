<?php namespace Ielijose\Clickatell;

class Clickatell {
	private $user = "user";
	private $password = "password";
	private $api_id = "api_id";
	
	private $baseurl ="http://api.clickatell.com";

	public  function send($message, $to){
		$text = urlencode($message);

		$url = $this->baseurl."/http/auth?user=".$this->user."&password=".$this->password."&api_id=".$this->api_id;
		$ret = file($url);

		$sess = explode(":",$ret[0]);
		if ($sess[0] == "OK") {

			$sess_id = trim($sess[1]); 
			$url = $this->baseurl."/http/sendmsg?session_id=$sess_id&to=$to&text=$text";

			$ret = file($url);
			$send = explode(":",$ret[0]);

			if ($send[0] == "ID") {
				return ["error" => false, "message" => "successnmessage ID: ". $send[1]];
			} else {
				return ["error" => true, "message" => "send message failed". $send[1]];
			}
		} else {
			return ["error" => true, "message" => "Authentication failure: ". $ret[0]];			
		}
	}

}