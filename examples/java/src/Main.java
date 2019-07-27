import com.google.gson.Gson;
import com.google.gson.JsonObject;
import com.panickapps.response.*;

import java.util.ArrayList;

public class Main {

    public static void main(String[] args) {

        //Gson instance:
        final Gson gson = new Gson();

        //Add raw data in response:
        JsonObject data = new JsonObject();
        data.addProperty("property1", 10);
        data.addProperty("property2", "hello");

        //Add custom data in response:
        Person person = new Person("John", "Doe", 50);
        data.add("person", gson.toJsonTree(person));

        //Create response:
        SuccessResponse successResponse = new SuccessResponse("Success", "This is a successful message.", data);

        //Encode into JSON:
        final String responseJSON = successResponse.toJSON();

        //Decode using GSON:
        final Response decodedResponse = gson.fromJson(responseJSON, Response.class);

        //Print the status, title and message:
        ResponseStatus responseStatus = decodedResponse.getStatus();
        String title = decodedResponse.getTitle();
        String message = decodedResponse.getMessage();

        //Get the value of raw values from the data object:
        int property1 = decodedResponse.getData().get("property1").getAsInt();
        String property2 = decodedResponse.getData().get("property2").getAsString();

        //Get the value of custom objects from the data object:
        Person responsePerson = gson.fromJson(decodedResponse.getData().get("person"), Person.class);










    }

}
