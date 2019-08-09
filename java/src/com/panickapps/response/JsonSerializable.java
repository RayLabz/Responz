package com.panickapps.response;

import java.io.Serializable;

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
 * An interface that defines a type to be converted to JSON format.
 */
public interface JsonSerializable extends Serializable {

    /**
     * Converts an object to JSON text.
     * @return The text-formatted (encoded/serialized) version of an object.
     */
    String toJSON();

}
