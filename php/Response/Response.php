<?php

require_once("EasyJSON\EasyJSON.php");
use EasyJSON\JsonSerializable as JsonSerializable;

class ResponseStatus {

    const OK = "ok";
    const ERROR = "error";

}

class Response implements JsonSerializable {

    const STATUS_TAG = "status";
    const TITLE_TAG = "title";
    const MESSAGE_TAG = "message";
    const DATETIME_TAG = "datetime";
    const DATA_TAG = "data";

    private $status;
    private $title;
    private $message;
    private $date;
    private $data;

    /**
     * Response constructor
     * @param $status
     * @param $title
     * @param $message
     */
    public function __construct($status, $title, $message, $data) {
        $this->status = $status;
        $this->title = $title;
        $this->message = $message;
        $this->date = date("Y-m-d H:i:s");
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status) {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title) {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getMessage() {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message) {
        $this->message = $message;
    }

    /**
     * @return false|string
     */
    public function getDate() {
        return $this->date;
    }

    /**
     * @param false|string $date
     */
    public function setDate($date) {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getData() {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data) {
        $this->data = $data;
    }

    /**
     * @return false|string
     */
    public function toJSON() {
        $object[self::STATUS_TAG] = $this->status;
        $object[self::TITLE_TAG] = $this->title;
        $object[self::MESSAGE_TAG] = $this->message;
        $object[self::DATETIME_TAG] = $this->date;
        if ($this->data != null) {
            $object[self::DATA_TAG] = $this->data;
        }
        return json_encode($object);
    }

}

class SuccessResponse extends Response {

    public function __construct($title, $message, $data) {
        parent::__construct(ResponseStatus::OK, $title, $message, $data);
    }

}

class ErrorResponse extends Response {

    public function __construct($title, $message, $data) {
        parent::__construct(ResponseStatus::ERROR, $title, $message, $data);
    }

}

class InvalidParameterResponse extends ErrorResponse {

    public function __construct($paramName, $data) {
        parent::__construct("Invalid parameter", "Invalid parameter '" . $paramName . "'.", $data);
    }

}

class MissingParameterResponse extends ErrorResponse {

    public function __construct($paramName, $data) {
        parent::__construct("Missing parameter", "Parameter '" . $paramName . "' is missing.", $data);
    }

}

class SecurityResponse extends ErrorResponse {

    public function __construct($data) {
        parent::__construct("Access denied", "Access to this service was denied. Please log in or use a properly authorized account.", $data);
    }

}

class UnknownFailureResponse extends ErrorResponse {

    public function __construct($message, $data) {
        parent::__construct("Unknown failure", $message, $data);
    }

}

