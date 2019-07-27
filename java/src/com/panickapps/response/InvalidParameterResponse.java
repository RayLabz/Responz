package com.panickapps.response;

public class InvalidParameterResponse extends ErrorResponse {

    public InvalidParameterResponse(String paramName, String message) {
        super("Invalid parameter","Invalid parameter '" + paramName + "' - " + message);
    }

    public InvalidParameterResponse(String paramName) {
        super("Invalid parameter", "Invalid parameter '" + paramName + "'.");
    }

}
