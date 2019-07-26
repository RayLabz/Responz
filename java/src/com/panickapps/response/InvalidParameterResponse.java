package com.panickapps.response;

public class InvalidParameterResponse extends ErrorResponse {

    public InvalidParameterResponse(String paramName, String expectedWhat, String butFoundWhat) {
        super("Invalid parameter","Invalid parameter '" + paramName + "' - Expected " + expectedWhat + " but found " + butFoundWhat + ".");
    }

    public InvalidParameterResponse(String paramName) {
        super("Invalid parameter", "Invalid parameter '" + paramName + "'.");
    }

}
