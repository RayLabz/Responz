package com.panickapps.response;

public class SecurityResponse extends ErrorResponse {

    public SecurityResponse() {
        super("Access denied", "Access to this service was denied. Please log in or use a properly authorized account.");
    }

}
