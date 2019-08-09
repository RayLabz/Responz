package com.panickapps.response;

/**
 * Created by PaNickApps - 2019
 * Visit http://www.panickapps.com
 *
 * Response - A simple HTTP response modeling library.
 * Provides a simple model for creating HTTP responses.
 * Repository: https://github.com/panickapps/Response
 * Guide: https://panickapps.github.io/Response/
 *
 * Apache 2.0 License
 */

/**
 * Defines a response that indicates that parameter in the request was not valid (invalid type, not in range, bad format, etc).
 */
public class InvalidParameterResponse extends ErrorResponse {

    public InvalidParameterResponse(String paramName, String message) {
        super("Invalid parameter","Invalid parameter '" + paramName + "' - " + message);
    }

    public InvalidParameterResponse(String paramName) {
        super("Invalid parameter", "Invalid parameter '" + paramName + "'.");
    }

}
