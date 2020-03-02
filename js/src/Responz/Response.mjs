/**
 * Created by PaNickApps - 2019
 * Visit http://www.panickapps.com
 *
 * Responz - A simple HTTP response modeling library.
 * Provides a simple model for creating HTTP responses.
 * Repository: https://github.com/panickapps/Response
 * Guide: https://panickapps.github.io/Response/
 *
 * Apache 2.0 License
 */

/**
 * Defines a status for responses.
 * @type {string}
 */
export const RESPONSE_OK = "ok";

/**
 * Defines a status for responses.
 * @type {string}
 */
export const RESPONSE_ERROR = "error";

/**
 * Converts a number to its text representation with a number of trailing zeros.
 * @param size The number of trailing zeros.
 * @returns {string}
 */
Number.prototype.pad = function(size) {
    let s = String(this);
    while (s.length < (size || 2)) {s = "0" + s;}
    return s;
};

/**
 * Models an HTTP response and its attributes.
 */
export class Response {

    /**
     * Creates a Responz object.
     * @param status The status of the response (ok/error)
     * @param title The title of the response
     * @param message The message sent by the response
     * @param data The data requested by the client/sent by the response.
     */
    constructor(status, title, message, data) {
        const currentDate = new Date();
        this.timestamp = currentDate.getFullYear() + "-" + (currentDate.getMonth() + 1).pad() + "-" + currentDate.getDate().pad()
            + " " + currentDate.getHours().pad() + ":" + currentDate.getMinutes().pad() + ":" + currentDate.getSeconds().pad();
        this.status = status;
        this.title = title;
        this.message = message;
        this.data = data;
    }

    /**
     * Defines the way the response class is going to be converted to JSON format.
     * @returns {string}
     */
    toJSON() {
        const out = {
            "status": this.status,
            "title": this.title,
            "message": this.message,
            "datetime": this.timestamp
        };
        if (this.data != null) {
            out.data = this.data;
        }
        return JSON.stringify(out);
    }

}

/**
 * Defines a response that indicates a successful execution of the user's request.
 */
export class SuccessResponse extends Response {

    constructor(title, message, data) {
        super(RESPONSE_OK, title, message, data);
    }

}

/**
 * Defines a response which indicates that an error has occurred while executing the user's request.
 */
export class ErrorResponse extends Response {

    constructor(title, message, data) {
        super(RESPONSE_ERROR, title, message, data);
    }

}

/**
 * Defines a response that indicates that parameter in the request was not valid (invalid type, not in range, bad format, etc).
 */
export class InvalidParameterResponse extends Response {

    constructor(paramName, message, data) {
        super(RESPONSE_ERROR, "Invalid parameter", "Invalid parameter '" + paramName + "' - " + message, data);
    }

}

/**
 * Defines a response that indicates that an expected parameter in the request was not found.
 */
export class MissingParameterResponse extends Response {

    constructor(paramName, data) {
        super(RESPONSE_ERROR, "Missing parameter", "Parameter '" + paramName + "' is missing.", data);
    }

}

/**
 * Defines a response used when the user has tried to access an endpoint/resource without proper authorization or authentication.
 */
export class SecurityResponse extends Response {

    constructor(data) {
        super(RESPONSE_ERROR, "Access denied", "Access to this service was denied. Please log in or use a properly authorized account.", data);
    }

}

/**
 * Defines a response that indicates that an unexpected error has occurred on the server.
 */
export class UnknownFailureResponse extends Response {

    constructor(message, data) {
        super(RESPONSE_ERROR, "Unknown failure", message, data);
    }

}