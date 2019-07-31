package com.panickapps.response;

import java.io.Serializable;

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
