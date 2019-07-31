package com.panickapps.response;

/**
 * Defines a response that indicates that an unexpected error has occurred on the server.
 */
public class UnknownFailureResponse extends ErrorResponse {

    public UnknownFailureResponse(String message) {
        super("Unknown failure", message);
    }

}
