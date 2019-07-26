package com.panickapps.response;

import java.io.Serializable;

public interface JsonSerializable extends Serializable {

    String toJSON();

}
