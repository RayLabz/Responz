package com.panickapps.response;

import com.google.gson.JsonObject;

import java.util.Date;

/**
 * Models an HTTP response and its attributes.
 */
public class Response implements JsonSerializable {

    private static final String STATUS_TAG = "status";
    private static final String TITLE_TAG = "title";
    private static final String MESSAGE_TAG = "message";
    private static final String DATETIME_TAG = "datetime";
    private static final String DATA_TAG = "data";

    private ResponseStatus status;
    private String title;
    private String message;
    private Date date;
    private JsonObject data;

    /**
     * Creates a Response object.
     * @param status The status of the response (ok/error)
     * @param title The title of the response
     * @param message The message sent by the response
     * @param data The data requested by the client/sent by the response.
     */
    public Response(ResponseStatus status, String title, String message, JsonObject data) {
        this.status = status;
        this.title = title;
        this.message = message;
        date = new Date();
        this.data = data;
    }

    /**
     * Creates a Response object.
     * @param status The status of the response (ok/error).
     * @param title The title of the response.
     * @param message The message sent by the response.
     */
    public Response(ResponseStatus status, String title, String message) {
        this(status, title, message, null);
    }

    /**
     * Retrieves the status of the response.
     * @return (ok or error) ResponseStatus
     */
    public ResponseStatus getStatus() {
        return status;
    }

    /**
     * Retrieves the title of the response.
     * @return title (String).
     */
    public String getTitle() {
        return title;
    }

    /**
     * Retrieves the message of the response.
     * @return message (String).
     */
    public String getMessage() {
        return message;
    }

    /**
     * Retrieves the date-time of the response.
     * @return Date.
     */
    public Date getDate() {
        return date;
    }

    /**
     * Retrieves the data of the response.
     * @return JsonObject.
     */
    public JsonObject getData() {
        return data;
    }

    /**
     * Sets the status of the response.
     * @param status The status of the response.
     */
    public void setStatus(ResponseStatus status) {
        this.status = status;
    }

    /**
     * Sets the title of the response.
     * @param title The title of the response.
     */
    public void setTitle(String title) {
        this.title = title;
    }

    /**
     * Sets the message of the response.
     * @param message The message of the response.
     */
    public void setMessage(String message) {
        this.message = message;
    }

    /**
     * Sets the data of the response.
     * @param data The data of the response.
     */
    public void setData(JsonObject data) {
        this.data = data;
    }

    public String toJSON() {
        JsonObject responseJson = new JsonObject();
        responseJson.addProperty(STATUS_TAG, status.toString());
        responseJson.addProperty(TITLE_TAG, title);
        responseJson.addProperty(MESSAGE_TAG, message);
        responseJson.addProperty(DATETIME_TAG, ResponseDateTimeFormat.STANDARD.format(date));
        if (data != null) {
            responseJson.add(DATA_TAG, data);
        }
        return responseJson.toString();
    }

    @Override
    public String toString() {
        return toJSON();
    }

}
