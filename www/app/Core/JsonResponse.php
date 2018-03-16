<?php
namespace Core;

class JsonResponse extends AbstractResponse {

    public function __construct($content)
    {
        $this->setHttpResponseCode(200);
        $this->setHeader('Content-Type', 'application/json', true);
        $this->setBody($content);
    }

    protected function render()
    {
        return json_encode($this->body, 1);
    }
}