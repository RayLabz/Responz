package com.panickapps.response;

/**
 * Defines a response used when the user has tried to access an endpoint/resource without proper authorization or authentication.
 */
public class SecurityResponse extends ErrorResponse {

    public SecurityResponse() {
        super("Access denied", "Access to this service was denied. Please log in or use a properly authorized account.");
    }

}
