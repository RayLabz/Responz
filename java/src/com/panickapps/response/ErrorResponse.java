package com.panickapps.response;

import com.google.gson.JsonObject;

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
 * Defines a response which indicates that an error has occurred while executing the user's request.
 */
public class ErrorResponse extends Response {

    public ErrorResponse(String title, String message, JsonObject data) {
        super(ResponseStatus.ERROR, title, message, data);
    }

    public ErrorResponse(String title, String message) {
        super(ResponseStatus.ERROR, title, message, null);
    }

}
