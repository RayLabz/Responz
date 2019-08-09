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
 * Defines a response that indicates that an expected parameter in the request was not found.
 */
public class MissingParameterResponse extends ErrorResponse {

    public MissingParameterResponse(String parameterName) {
        super("Missing parameter", "Parameter '" + parameterName + "' is missing.");
    }

}
