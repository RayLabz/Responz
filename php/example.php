<?php

//Import the file Response.php:
require_once("Response/Response.php");

//Creating a response without data:
$response1 = new Response(ResponseStatus::OK, "Response 1", "This is my first response", null);

/*--------------------------------------------------------------------------------------------------------------------*/

//Encoding the response to JSON-formatted text:
echo $response1->toJSON() . PHP_EOL . PHP_EOL;

/*--------------------------------------------------------------------------------------------------------------------*/

//Using pre-defined response classes:
$successResponse = new SuccessResponse("Success response", "Success response message", null);
echo $successResponse->toJSON() . PHP_EOL . PHP_EOL;

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

//TODO

/*--------------------------------------------------------------------------------------------------------------------*/

//Creating custom responses:

//TODO

/*--------------------------------------------------------------------------------------------------------------------*/

//Decoding JSON text into Response objects:

//TODO

/*--------------------------------------------------------------------------------------------------------------------*/


?>