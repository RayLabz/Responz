package com.panickapps.response;

import com.google.gson.JsonObject;

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
