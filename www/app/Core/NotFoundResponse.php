<?php
namespace Core;

class NotFoundResponse extends AbstractResponse {

    public function __construct($content)
    {
        $this->setHttpResponseCode(404);
        $this->setHeader('Content-Type', 'application/json');
        $this->setBody($content);
    }

    protected function render()
    {
        return $this->body;
    }
}