export const RESPONSE_OK = "ok";
export const RESPONSE_ERROR = "error";

Number.prototype.pad = function(size) {
    let s = String(this);
    while (s.length < (size || 2)) {s = "0" + s;}
    return s;
};

export class Response {

    constructor(status, title, message, data) {
        const currentDate = new Date();
        this.datetime = currentDate.getFullYear() + "-" + (currentDate.getMonth() + 1).pad() + "-" + currentDate.getDate().pad()
            + " " + currentDate.getHours().pad() + ":" + currentDate.getMinutes().pad() + ":" + currentDate.getSeconds().pad();
        this.status = status;
        this.title = title;
        this.message = message;
        this.data = data;
    }

    toJSON() {
        const out = {
            "status": this.status,
            "title": this.title,
            "message": this.message,
            "datetime": this.datetime
        };
        if (this.data != null) {
            out.data = this.data;
        }
        return JSON.stringify(out);
    }

}

export class SuccessResponse extends Response {

    constructor(title, message, data) {
        super(RESPONSE_OK, title, message, data);
    }

}

export class ErrorResponse extends Response {

    constructor(title, message, data) {
        super(RESPONSE_ERROR, title, message, data);
    }

}

export class InvalidParameterResponse extends Response {

    constructor(paramName, message, data) {
        super(RESPONSE_ERROR, "Invalid parameter", "Invalid parameter '" + paramName + "' - " + message, data);
    }

}

export class MissingParameterResponse extends Response {

    constructor(paramName, data) {
        super(RESPONSE_ERROR, "Missing parameter", "Parameter '" + paramName + "' is missing.", data);
    }

}

export class SecurityResponse extends Response {

    constructor(data) {
        super(RESPONSE_ERROR, "Access denied", "Access to this service was denied. Please log in or use a properly authorized account.", data);
    }

}

export class UnknownFailureResponse extends Response {

    constructor(message, data) {
        super(RESPONSE_ERROR, "Unknown failure", message, data);
    }

}