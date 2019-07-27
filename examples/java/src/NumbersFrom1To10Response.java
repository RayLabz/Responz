import com.google.gson.JsonObject;
import com.panickapps.response.JsonUtil;
import com.panickapps.response.Response;
import com.panickapps.response.ResponseStatus;

import java.util.ArrayList;

public class NumbersFrom1To10Response extends Response {

    public NumbersFrom1To10Response() {
        super(ResponseStatus.OK, "Numbers fetched", "The numbers from 1-10 have been fetched.");
        JsonObject data = new JsonObject();
        ArrayList<Integer> numbers = new ArrayList<>();
        for (int i = 1; i <= 10; i++) {
            numbers.add(i);
        }
        data.add("numbers", JsonUtil.listToJsonArray(numbers));
        setData(data);
    }

}
