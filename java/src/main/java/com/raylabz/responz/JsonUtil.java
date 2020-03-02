package com.raylabz.responz;

import com.google.gson.Gson;
import com.google.gson.JsonArray;
import com.google.gson.JsonElement;
import com.google.gson.JsonSyntaxException;
import com.google.gson.reflect.TypeToken;

import java.util.List;

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
 * A utility class that allows easier conversion between Java and JSON objects.
 */
public class JsonUtil {

    /**
     * Converts a List to a JsonArray
     * @param list The list to convert.
     * @return a JsonArray with the items in list.
     */
    public static JsonArray listToJsonArray(List<?> list) {
        Gson gson = new Gson();
        JsonElement element = gson.toJsonTree(list, new TypeToken<List<?>>() {}.getType());
        if (! element.isJsonArray()) {
            throw new JsonSyntaxException("Could not find a valid JSON array in list.");
        }
        return element.getAsJsonArray();
    }

}
