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

//Create a data object that contains the data:
let data = {
    myInt: 3,
    myString: "hello",
    myBoolean: true
};

//Create a new response and pass the data object in the constructor:
let myResponse = new Response(RESPONSE_OK, "My response title", "My response message.", data);
let myResponseJSON = myResponse.toJSON();
console.log(myResponseJSON);

/*--------------------------------------------------------------------------------------------------------------------*/

//Nesting an object inside another object in data:

//Create an inner object:
let innerObject = {
    myInnerInt: 4,
    myInnerBoolean: false
};

//Set the inner object as a property of the outter object (in this case 'data'):
data.myInnerObject = innerObject;

console.log(myResponse.toJSON());

/*--------------------------------------------------------------------------------------------------------------------*/

//Changing a response's data using the setData() method:

let newData = {
    newInteger: 94,
    newString: "abcdef"
};

//Assign the new data as the data of the response:
myResponse.data = newData;

console.log(myResponse.toJSON());

/*--------------------------------------------------------------------------------------------------------------------*/

//Defining and including custom objects in responses:

//Create the new class:
class Person {
    constructor(firstname, lastname, age) {
        this.firstname = firstname;
        this.lastname = lastname;
        this.age = age;
    }
}

//Create an instance of the class:
let myPerson = new Person("John", "Doe", 50);

//Define a new data object and assign the custom object as a property of the data:
let customObjectData = {
    person: myPerson
};

//Assign the data object as the data property of the response:
myResponse.data = customObjectData;

console.log(myResponse.toJSON());

/*--------------------------------------------------------------------------------------------------------------------*/

//Adding lists/arrays in data:

//Create a new array:
let peopleArray = [];

//Add some people:
for (let i = 0; i < 5; i++) {
    let newPerson = new Person("Firstname " + i, "Lastname " + i, 30 + i);
    peopleArray.push(newPerson);
}

//Create a data object and assign the array as a property of the data object:
let peopleObjectData = {
    people: peopleArray
};

//Assign the data object as the data property of the response:
myResponse.data = peopleObjectData;

console.log(myResponse.toJSON());

/*--------------------------------------------------------------------------------------------------------------------*/

//Creating custom responses:

//Create a new response type by extending the Response, ErrorResponse or SuccessResponse classes:
class MyCustomResponse extends SuccessResponse {
    constructor(message) {
        super("Custom title", message, null);
    }
}

//Instantiate the new custom response:
let customResponse = new MyCustomResponse("Hello World!");

console.log(customResponse.toJSON());

/*--------------------------------------------------------------------------------------------------------------------*/

//Decoding JSON text:

//Let's instantiate a response just for an example:
let responseObject = new Response(RESPONSE_OK, "This is a title", "This is a message.", {myNumber: 54, myBoolean: true});

//Serialize/Encode to JSON text:
let responseJSON = responseObject.toJSON();

//Parse using JavaScripts native JSON.parse() method:
let decodedResponse = JSON.parse(responseJSON);

console.log("Status => " + decodedResponse.status);
console.log("Title => " + decodedResponse.title);
console.log("Message => " + decodedResponse.message);
console.log("Date/Time => " + decodedResponse.datetime);
console.log("Data[myNumber] => " + decodedResponse.data.myNumber);
console.log("Data[myBoolean] => " + decodedResponse.data.myBoolean);

/*--------------------------------------------------------------------------------------------------------------------*/