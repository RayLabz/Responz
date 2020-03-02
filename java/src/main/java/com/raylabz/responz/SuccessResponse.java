package com.raylabz.responz;

import com.google.gson.JsonObject;

/**
 * Created by RayLabz - 2019
 * Visit http://www.RayLabz.com
 *
 * Response - A simple HTTP response modeling library.
 * Provides a simple model for creating HTTP responses.
 * Repository: https://github.com/RayLabz/Responz
 * Guide: https://RayLabz.github.io/Responz/
 *
 * Apache 2.0 License
 */

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
