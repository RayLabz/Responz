package com.raylabz.responz;

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
 * Defines a response that indicates that an unexpected error has occurred on the server.
 */
public class UnknownFailureResponse extends ErrorResponse {

    public UnknownFailureResponse(String message) {
        super("Unknown failure", message);
    }

}
