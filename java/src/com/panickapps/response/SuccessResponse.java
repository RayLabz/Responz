package com.panickapps.response;

import com.google.gson.JsonObject;

/**
 * Defines a response that indicates a successful execution of the user's request.
 */
public class SuccessResponse extends Response {

    public SuccessResponse(String title, String message, JsonObject data) {
        super(ResponseStatus.OK, title, message, data);
    }

    public SuccessResponse(String title, String message) {
        super(ResponseStatus.OK, title, message, null);
    }

}
