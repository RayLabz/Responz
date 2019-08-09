package com.panickapps.response;

import java.text.SimpleDateFormat;

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
 * Defines a Response date-time format.
 */
public class ResponseDateTimeFormat extends SimpleDateFormat {

    private ResponseDateTimeFormat() {
        super("yyyy-MM-dd HH:mm:ss");
    }

    public static ResponseDateTimeFormat STANDARD = new ResponseDateTimeFormat();

}
