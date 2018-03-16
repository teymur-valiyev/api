<?php

namespace Core;

abstract class AbstractResponse
{

    protected $headers = [];

    protected $httpResponseCode;

    protected $body;

    public function setHttpResponseCode($httpCode)
    {
        $this->httpResponseCode = $httpCode;
        return $this;
    }

    public function setHeader($name, $value, $replace = false)
    {
        $this->headers[] = [
            'name'    => $name,
            'value'   => $value,
            'replace' => $replace,
        ];

        return $this;
    }

    public function setBody($content) {
        $this->body = $content;

        return $this;
    }



    public function sendHeaders()
    {
        $httpCodeSent = false;

        foreach ($this->headers as $header) {
            if (!$httpCodeSent && $this->httpResponseCode) {
                header($header['name'] . ': ' . $header['value'], $header['replace'], $this->httpResponseCode);
                $httpCodeSent = true;
            } else {
                header($header['name'] . ': ' . $header['value'], $header['replace']);
            }
        }

        if (!$httpCodeSent) {
            header('HTTP/1.1 ' . $this->httpResponseCode);
        }

        return $this;
    }

    abstract protected function render();

    public function sendResponse()
    {
        ob_start();
        $this->sendHeaders();
        echo $this->render();
        ob_end_flush();
    }
}
