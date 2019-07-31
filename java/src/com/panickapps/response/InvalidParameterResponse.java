package com.panickapps.response;

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
