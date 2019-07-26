package com.panickapps.response;

public class UnknownFailureResponse extends ErrorResponse {

    public UnknownFailureResponse(String message) {
        super("Unknown failure", message);
    }

}
