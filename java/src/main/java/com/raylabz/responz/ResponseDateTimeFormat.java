package com.raylabz.responz;

import java.text.SimpleDateFormat;

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
 * Defines a Response date-time format.
 */
public class ResponseDateTimeFormat extends SimpleDateFormat {

    private ResponseDateTimeFormat() {
        super("yyyy-MM-dd HH:mm:ss");
    }

    public static ResponseDateTimeFormat STANDARD = new ResponseDateTimeFormat();

}
