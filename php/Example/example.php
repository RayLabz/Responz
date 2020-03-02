<?php

//Import the file Response.php:
require_once("Responz/Response.php");

//Creating a response without data:

//A generic response:
$response1 = new Response(ResponseStatus::OK, "Response 1", "This is my first response", null);

//A successful response:
$successResponse = new SuccessResponse("Success", "This is a success response.", null);

//An error response:
$errorResponse = new ErrorResponse("Error", "This is an error response.", null);

/*--------------------------------------------------------------------------------------------------------------------*/

//Encoding the response to JSON-formatted text:
$jsonText = $response1->toJSON();
echo $response1->toJSON() . PHP_EOL . PHP_EOL;

/*--------------------------------------------------------------------------------------------------------------------*/

//Using pre-defined response classes:
$successResponse = new SuccessResponse("Success response", "Success response message", null);
echo $successResponse->toJSON() . PHP_EOL . PHP_EOL;

$invalidParameterResponse = new InvalidParameterResponse("myParam", "An integer, found string.", null);

$missingParameterResponse = new MissingParameterResponse("myParam", null);

$securityResponse = new SecurityResponse(null);

$unknownFailureResponse = new UnknownFailureResponse("A failure has occurred, please contact the administrator.", null);


/*--------------------------------------------------------------------------------------------------------------------*/

//Creating a response with data using constructor:
$dataObject1["myIntValue"] = 10;
$dataObject1["myStringValue"] = "Hello!";
$nestedObject["nestedIntValue"] = -5;
$nestedObject["nestedBooleanValue"] = true;

/*--------------------------------------------------------------------------------------------------------------------*/

//Nesting an object inside the data object etc.:
$dataObject1["myNestedObject"] = $nestedObject;

$responseWithData = new SuccessResponse("Data response", "This is a response containing data.", $dataObject1);
echo $responseWithData->toJSON() . PHP_EOL . PHP_EOL;

/*--------------------------------------------------------------------------------------------------------------------*/

//Changing a response's data using the setData() method:
$dataObject2["newIntValue"] = 20;
$dataObject2["newStringValue"] = "World!";

$responseWithData->setData($dataObject2);
echo $responseWithData->toJSON() . PHP_EOL . PHP_EOL;

/*--------------------------------------------------------------------------------------------------------------------*/

//Using more pre-defined responses:
$invalidParameterResponse = new InvalidParameterResponse("myParam", null);
echo $invalidParameterResponse->toJSON() . PHP_EOL . PHP_EOL;

$securityResponse = new SecurityResponse(null);
echo $securityResponse->toJSON() . PHP_EOL . PHP_EOL;

/*--------------------------------------------------------------------------------------------------------------------*/

//Including custom objects in responses:

require_once("Person.php"); //Import your custom class
$person = new Person("John", "Doe", 50); //Instantiate a custom class object
$dataObject3["person"] = $person->toJsonObject();
$responseWithCustomObject = new SuccessResponse("Custom object response", "This is a response containing a custom object.", $dataObject3);
echo $responseWithCustomObject->toJSON() . PHP_EOL . PHP_EOL;

/*--------------------------------------------------------------------------------------------------------------------*/

//Adding lists:

$dataObject4["persons"] = array(); //Create a new data object as an array;

//Create 5 new people and add them in the array:
for ($i = 0; $i < 5; $i++) {
    $person = new Person("Firstname " . $i, "Lastname " . $i, $i + 30);
    array_push($dataObject4["persons"], $person->toJsonObject());
}

$responseWithCustomObject->setData($dataObject4); //Set the dataObject4 (the one including the array) as the data of the existing response:
echo $responseWithCustomObject->toJSON() . PHP_EOL . PHP_EOL;

/*--------------------------------------------------------------------------------------------------------------------*/

//Creating custom responses:

class CustomResponse extends SuccessResponse { //This is custom response that returns "Hello World!" as a message:

    const MESSAGE = "Hello world!";

    public function __construct($data) {
        parent::__construct("Hello World!", "Custom response says Hello World!", $data);
    }

}

//Using the custom response:
$customResponse = new CustomResponse(null);
echo $customResponse->toJSON() . PHP_EOL . PHP_EOL;

/*--------------------------------------------------------------------------------------------------------------------*/

//Decoding JSON text into Response objects:

//You can easily decode JSON text using PHP's utility function -> json_decode and dereferencing the associative array.

$customResponse->setData($dataObject1); //Contains "myIntValue" etc...
$jsonText = $customResponse->toJSON(); //this contains the serialized/encoded JSON text

//Convert to an associative array using json_decode:
$object = json_decode($jsonText);

echo "Status -> " . $object->status . PHP_EOL;
echo "Title -> " . $object->title . PHP_EOL;
echo "Message -> " . $object->message . PHP_EOL;
echo "Date/Time -> " . $object->datetime . PHP_EOL;

//Decode the data:
$data = $object->data;
echo "Data[myIntValue] -> " . $data->myIntValue . PHP_EOL;

/*--------------------------------------------------------------------------------------------------------------------*/


?>