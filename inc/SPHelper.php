<?php

namespace SPHelper;

use SparkPost\SparkPost;
use GuzzleHttp\Client;
use Http\Adapter\Guzzle6\Client as Guzzle6HttpAdapter;

class SparkPostApi
{
    public $spark;
    public $options;

    protected $auth;
    protected $http_adapter;

    public function __construct($apiKey = null)
    {
        $this->auth = "48ea6811157eb563585e22026c1fa3c62dcaeb68";
        $this->http_adapter = new Guzzle6HttpAdapter(new Client());
        $this->spark = new SparkPost($this->http_adapter, ['key'=>$this->auth]);

        $this->setDefaultOptions();
    }

    protected function setDefaultOptions()
    {
        // Set default options

        $this->options = [
            'trackOpens' => true,
            'trackClicks' => false,
            'inlineCss' => true,
        ];

        return;
    }

    public function setOptions($options)
    {
        $this->options = array_merge($this->options, $options);
    }

    public function sendEmail()
    {
        //Remove empty values
        $this->options = array_filter(array_map('array_filter', $this->options));

        $promise = $this->spark->transmissions->post($this->options);

        try {
            $response = $promise->wait();

            return $response->getBody();
        } catch (\Exception $e) {
            //echo $e->getCode()."\n";
            return $e->getMessage();
        }
    }
}

