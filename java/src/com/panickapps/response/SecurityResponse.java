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
 * Defines a response used when the user has tried to access an endpoint/resource without proper authorization or authentication.
 */
public class SecurityResponse extends ErrorResponse {

    public SecurityResponse() {
        super("Access denied", "Access to this service was denied. Please log in or use a properly authorized account.");
    }

}
