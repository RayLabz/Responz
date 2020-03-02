<?php

/**
 * Created by RayLabz - 2019
 * Visit http://www.RayLabz.com
 *
 * Response - A simple HTTP response modeling library.
 * Provides a simple model for creating HTTP responses.
 * Repository: https://github.com/RayLabz/Responz
 * Guide: https://RayLabz.github.io/Responz/
 *
 * Apache 2.0 License
 */

require_once("EasyJSON\EasyJSON.php");

use EasyJSON\JsonObject as JsonObject;

/**
 * A class that defines the possible statuses of a response.
 */
class ResponseStatus {

    const OK = "ok";
    const ERROR = "error";

}

/**
 * Models an HTTP response and its attributes.
 */
class Response extends JsonObject {

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
     * @param $status ResponseStatus The status of the response.
     * @param $title string The title of the response.
     * @param $message string The message of the response.
     * @param $data object The data of the response.
     */
    public function __construct($status, $title, $message, $data) {
        $this->status = $status;
        $this->title = $title;
        $this->message = $message;
        $this->date = date("Y-m-d H:i:s");
        $this->data = $data;
    }

    /**
     * @return mixed The status of the response.
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * @param mixed $status The status of the response.
     */
    public function setStatus($status) {
        $this->status = $status;
    }

    /**
     * @return mixed The title of the response.
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * @param mixed $title The title of the response.
     */
    public function setTitle($title) {
        $this->title = $title;
    }

    /**
     * @return mixed  The message of the response.
     */
    public function getMessage() {
        return $this->message;
    }

    /**
     * @param mixed $message The message of the response.
     */
    public function setMessage($message) {
        $this->message = $message;
    }

    /**
     * @return false|string The date-time of the response.
     */
    public function getDate() {
        return $this->date;
    }

    /**
     * @param false|string $date The date-time of the response.
     */
    public function setDate($date) {
        $this->date = $date;
    }

    /**
     * @return mixed The data of the response.
     */
    public function getData() {
        return $this->data;
    }

    /**
     * @param mixed $data The data of the response.
     */
    public function setData($data) {
        $this->data = $data;
    }

    /**
     * Defines how the Response is going to be converted to JSON text format.
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

/**
 * Defines a response that indicates a successful execution of the user's request.
 */
class SuccessResponse extends Response {

    public function __construct($title, $message, $data) {
        parent::__construct(ResponseStatus::OK, $title, $message, $data);
    }

}

/**
 * Defines a response which indicates that an error has occurred while executing the user's request.
 */
class ErrorResponse extends Response {

    public function __construct($title, $message, $data) {
        parent::__construct(ResponseStatus::ERROR, $title, $message, $data);
    }

}

/**
 * Defines a response that indicates that parameter in the request was not valid (invalid type, not in range, bad format, etc).
 */
class InvalidParameterResponse extends ErrorResponse {

    public function __construct($paramName, $message, $data) {
        parent::__construct("Invalid parameter", "Invalid parameter '" . $paramName . "' - " . $message, $data);
    }

}

/**
 * Defines a response that indicates that an expected parameter in the request was not found.
 */
class MissingParameterResponse extends ErrorResponse {

    public function __construct($paramName, $data) {
        parent::__construct("Missing parameter", "Parameter '" . $paramName . "' is missing.", $data);
    }

}

/**
 * Defines a response used when the user has tried to access an endpoint/resource without proper authorization or authentication.
 */
class SecurityResponse extends ErrorResponse {

    public function __construct($data) {
        parent::__construct("Access denied", "Access to this service was denied. Please log in or use a properly authorized account.", $data);
    }

}

/**
 * Defines a response that indicates that an unexpected error has occurred on the server.
 */
class UnknownFailureResponse extends ErrorResponse {

    public function __construct($message, $data) {
        parent::__construct("Unknown failure", $message, $data);
    }

}

