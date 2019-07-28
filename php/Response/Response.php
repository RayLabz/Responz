<?php

namespace Response {

    interface JsonSerializable
    {

        public function toJSON();

    }

    class ResponseStatus
    {

        const OK = "ok";
        const ERROR = "error";

    }

    interface JsonObject {

        public function toJsonObject();

    }

    class Response implements JsonSerializable
    {

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
        private function __construct($status, $title, $message)
        {
            $this->status = $status;
            $this->title = $title;
            $this->message = $message;
            $this->date = date("Y-m-d H:i:s");
        }

        /**
         * @param $status
         * @param $title
         * @param $message
         * @return Response
         */
        public static function withoutData($status, $title, $message) {
            return new self($status, $title, $message);
        }

        /**
         * @param $status
         * @param $title
         * @param $message
         * @param $data
         * @return Response
         */
        public static function withData($status, $title, $message, $data) {
            $object = new self($status, $title, $message);
            $object->setData($data);
            return $object;
        }

        /**
         * @return mixed
         */
        public function getStatus(): ResponseStatus
        {
            return $this->status;
        }

        /**
         * @param mixed $status
         */
        public function setStatus($status)
        {
            $this->status = $status;
        }

        /**
         * @return mixed
         */
        public function getTitle(): string
        {
            return $this->title;
        }

        /**
         * @param mixed $title
         */
        public function setTitle($title)
        {
            $this->title = $title;
        }

        /**
         * @return mixed
         */
        public function getMessage(): string
        {
            return $this->message;
        }

        /**
         * @param mixed $message
         */
        public function setMessage($message)
        {
            $this->message = $message;
        }

        /**
         * @return mixed
         */
        public function getData()
        {
            return $this->data;
        }

        /**
         * @param mixed $data
         */
        public function setData($data)
        {
            $this->data = $data;
        }

        /**
         * @return false|string
         */
        public function toJSON()
        {
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

        //TODO

    }

    class ErrorResponse extends Response {

        //TODO

    }

    class InvalidParameterResposne extends ErrorResponse {

        //TODO

    }

    class MissingParameterResponse extends ErrorResponse {

        //TODO

    }

    class SecurityResponse extends ErrorResponse {

        //TODO

    }

    class UnknownFailureResponse extends ErrorResponse {

        //TODO

    }

}