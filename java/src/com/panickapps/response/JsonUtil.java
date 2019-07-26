package com.panickapps.response;

import com.google.gson.Gson;
import com.google.gson.JsonArray;
import com.google.gson.JsonElement;
import com.google.gson.JsonSyntaxException;
import com.google.gson.reflect.TypeToken;

import java.util.List;

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
