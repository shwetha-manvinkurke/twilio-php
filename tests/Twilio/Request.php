<?php


namespace Twilio\Tests;

class Request {
    public function __construct($method, $url, $params = [], $data = [], $headers = [], $user = null, $password = null) {
        $this->method = $method;
        $this->url = $url;
        $this->params = $params;
        $this->data = $data;
        $this->headers = $headers;
        $this->user = $user;
        $this->password = $password;
    }
}