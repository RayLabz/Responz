package com.panickapps.response;

public class MissingParameterResponse extends ErrorResponse {

    public MissingParameterResponse(String parameterName) {
        super("Missing parameter", "Parameter '" + parameterName + "' is missing.");
    }

}
