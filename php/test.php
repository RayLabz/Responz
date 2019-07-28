<?php

require_once("Response/Response.php");
use Response\Response as Response;
use Response\ResponseStatus as ResponseStatus;
use Response\JsonObject as JsonObject;

class Person implements JsonObject {

    private $firstname;
    private $lastname;
    private $age;

    /**
     * Person constructor.
     * @param $firstname
     * @param $lastname
     * @param $age
     */
    public function __construct($firstname, $lastname, $age)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    public function toJsonObject()
    {
        $object["firstname"] = $this->firstname;
        $object["lastname"] = $this->lastname;
        $object["age"] = $this->age;
        return $object;
    }
}

$response = Response::withoutData(ResponseStatus::OK, "Hello title", "hello message");
$data["number"] = 4;
$data["name"] = "Nicos";
$person = new Person("John", "Doe", 45);
$data["person"] = $person->toJsonObject();

$list = array();
for ($i = 0; $i < 5; $i++) {
    $p = new Person(("Firstname " . $i), ("Lastname " . $i), $i);
    array_push($list, $p->toJsonObject());
}

$data["people"] = $list;

$response->setData($data);

echo $response->toJSON();

?>