<?php

/**
 * OXOResponse
 *
 * This class shall return a formatted output for your
 * api endpoints
 * This class aims to create a beautiful and well formatted response
 * showing results along with errors and error codes
 *
 * Simply call setObject($yourApiResponse) to embed your response to OXOResponse
 *
 * @author Salim Said <salim@oxoafrica.co.tz> Nov 2019
 *
 */

namespace Oxoresponse;

class OXOResponse implements \JsonSerializable
{
    private $message;
    private $errors = array();
    private $errorCount;
    private $genralErrorCode;
    private $objects = array();

    function __construct($message)
    {
        $this->message = $message;
        $this->errorCount = 0;
        $this->genralErrorCode = -1;
    }

    public function addMessage($message)
    {
        $this->message = $message;
    }

    public function addErrorToList($error)
    {
        array_push($this->errors, $error);
        $this->errorCount++;
    }

    public function setErrorCode($errorCode)
    {
        $this->genralErrorCode = $errorCode;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public function setObject($object)
    {
        $this->objects = $object;

    }


}

