<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;



class Yelp_helperController extends Controller
{
	protected $client_id;
	protected $client_secret;
	protected $token;
	protected $access_token;

	function __construct()
	{
		$this->client_id     = "84anZvUxSF55RDYgfuyUcA";
		$this->client_secret = "fJzSX7hZFFOoKr4YG4YvJUUEzaOliPEn63xExELq4TgvfAr1jhvQQzunIThQeffC";
		$this->api_host      = "https://api.yelp.com";
		$this->search_path   = "/v3/businesses/search";
		$this->business_path = "/v3/businesses/";  // Business ID will come after slash.
		$this->token_path    = "/oauth2/token";
		$this->grant_type    = "client_credentials";
		$this->request_path  = "";
		$this->get_token();
	}

	public function get_token()
	{
		try
		{
			$curl = curl_init();

			$postfields = "client_id=" .  $this->client_id .
				"&client_secret=" .  $this->client_secret .
				"&grant_type=" .  $this->grant_type;

			curl_setopt_array($curl, array(
				CURLOPT_URL => $this->api_host . $this->token_path,
				CURLOPT_RETURNTRANSFER => true,  // Capture response.
				CURLOPT_ENCODING => "",  // Accept gzip/deflate/whatever.
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS => $postfields,
				CURLOPT_HTTPHEADER => array(
					"cache-control: no-cache",
					"content-type: application/x-www-form-urlencoded",
				),
			));

			$response = curl_exec($curl);

			if (FALSE === $response)
				throw new Exception(curl_error($curl), curl_errno($curl));
			$http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
			if (200 != $http_status)
				throw new Exception($response, $http_status);
			curl_close($curl);
		}
		catch(Exception $e){
			trigger_error(sprintf( 'Curl failed with error #%d: %s', $e->getCode(), $e->getMessage()), E_USER_ERROR);
		}

		$body = json_decode($response);
		$this->access_token = $body->access_token;
		return $this->access_token;
	}


	function request($url_params = array()) {
		try {
			$curl = curl_init();
			if (FALSE === $curl)
				throw new Exception('Failed to initialize');
			$url = $this->api_host . $this->request_path . "?" . http_build_query($url_params);
			curl_setopt_array($curl, array(
				CURLOPT_URL => $url,
				CURLOPT_RETURNTRANSFER => true,  // Capture response.
				CURLOPT_ENCODING => "",  // Accept gzip/deflate/whatever.
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "GET",
				CURLOPT_HTTPHEADER => array(
					"authorization: Bearer " . $this->access_token,
					"cache-control: no-cache",
				),
			));
			$response = curl_exec($curl);
			if (FALSE === $response)
				throw new Exception(curl_error($curl), curl_errno($curl));
			$http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
			if (200 != $http_status)
				throw new Exception($response, $http_status);
			curl_close($curl);
		} catch(Exception $e) {
			trigger_error(sprintf( 'Curl failed with error #%d: %s', $e->getCode(), $e->getMessage()), E_USER_ERROR);
		}
		return $response;
	}

	function search(Request $request) {
		$url_params = array();

		$latitude   = $request->post("latitude");
		$longitude  = $request->post("longitude");
		$category   = $request->post("category");

		$url_params['categories']      = $category;
		$url_params['latitude']  = $latitude;
		$url_params['longitude'] = $longitude;
		$url_params['limit']     = 50;

		$this->request_path = $this->search_path;

		$data = $this->request($url_params);

		$data = json_decode($data);
		$data = $data->businesses;

		echo json_encode($data);
		exit();
	}

}
