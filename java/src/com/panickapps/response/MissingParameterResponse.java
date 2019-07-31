package com.panickapps.response;

/**
 * Defines a response that indicates that an expected parameter in the request was not found.
 */
public class MissingParameterResponse extends ErrorResponse {

    public MissingParameterResponse(String parameterName) {
        super("Missing parameter", "Parameter '" + parameterName + "' is missing.");
    }

}
