//Importing Response:
import {
    RESPONSE_OK,
    RESPONSE_ERROR,
    Response,
    ErrorResponse,
    SuccessResponse,
    MissingParameterResponse,
    InvalidParameterResponse,
    SecurityResponse,
    UnknownFailureResponse
} from "../src/Response/Response.mjs";

/*--------------------------------------------------------------------------------------------------------------------*/

//A generic response:
const response = new Response(RESPONSE_OK, "My title", "My message", null);

//A successful response:
const successResponse = new SuccessResponse("Success", "This is a successful response.", null);

//An error response:
const errorResponse = new ErrorResponse("Error", "This is an error response.", null);

/*--------------------------------------------------------------------------------------------------------------------*/

//Encoding responses to JSON format:
const json = response.toJSON();
console.log(json);

/*--------------------------------------------------------------------------------------------------------------------*/

//Using pre-defined response classes:
const invalidParameterResponse = new InvalidParameterResponse("myParam", "an integer, found string.", null);

const missingResponse = new MissingParameterResponse("myParam", null);

const securityResponse = new SecurityResponse(null);

const unknownFailureResponse = new UnknownFailureResponse("A failure has occurred, please contact the administrator.", null);

/*--------------------------------------------------------------------------------------------------------------------*/

//Creating a response with data in the constructor:

//TODO

/*--------------------------------------------------------------------------------------------------------------------*/

//Nesting an object inside another object in data:

//TODO

/*--------------------------------------------------------------------------------------------------------------------*/

//Changing a response's data using the setData() method:

//TODO

/*--------------------------------------------------------------------------------------------------------------------*/

//Defining and including custom objects in responses:

//TODO

/*--------------------------------------------------------------------------------------------------------------------*/

//Adding lists/arrays in data:

//TODO

/*--------------------------------------------------------------------------------------------------------------------*/

//Creating custom responses:

//TODO

/*--------------------------------------------------------------------------------------------------------------------*/

//Decoding JSON text:

//TODO

/*--------------------------------------------------------------------------------------------------------------------*/