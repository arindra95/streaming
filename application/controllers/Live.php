<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Live extends MY_Controller
{


	public function index()
	{
		$this->chanel();
	}
	public function chanel($idLive = '')
	{
		$dataLive =  $this->getDataRow('live', '*');;
		if (!empty($idLive))
			$dataLive = $this->getDataRow('live', '*', array('pkey' => $idLive));
		$dataLiveAll = $this->getDataRow('live', '*');
		$ads = $this->getDataRow('ads', '*', array('status' => '1'));

		$data['html']['ads'] = $ads;
		$data['html']['dataLiveAll'] = $dataLiveAll;
		$data['html']['dataLive'] = $dataLive[0];
		$data['html']['title'] = 'Live Streaming Tv';
		$data['url'] = 'public/body';
		$this->templatePublic($data);
	}
}
