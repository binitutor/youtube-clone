/*
SERVER RESPONSE ERROR TYPES:
- Not found
- 403: Forbidden
- 400: Unauthorized
- Request Timeout
- Method Not Allowed
- Bad Request
- Conflict
- Payment Required
- Length Required
- Payload too large
- Service Unavailable
- Not acceptable

HTTP response status codes
    Informational responses (100 – 199)
    Successful responses (200 – 299)
    Redirection messages (300 – 399)
    Client error responses (400 – 499)
    Server error responses (500 – 599)

500 Internal Server Error
The server has encountered a situation it does not know how to handle.

501 Not Implemented
The request method is not supported by the server and cannot be handled. The only methods that servers are required to support (and therefore that must not return this code) are GET and HEAD.

502 Bad Gateway
This error response means that the server, while working as a gateway to get a response needed to handle the request, got an invalid response.

503 Service Unavailable
The server is not ready to handle the request. Common causes are a server that is down for maintenance or that is overloaded. Note that together with this response, a user-friendly page explaining the problem should be sent. This response should be used for temporary conditions and the Retry-After HTTP header should, if possible, contain the estimated time before the recovery of the service. The webmaster must also take care about the caching-related headers that are sent along with this response, as these temporary condition responses should usually not be cached.

504 Gateway Timeout
This error response is given when the server is acting as a gateway and cannot get a response in time.

505 HTTP Version Not Supported
The HTTP version used in the request is not supported by the server.

506 Variant Also Negotiates
The server has an internal configuration error: the chosen variant resource is configured to engage in transparent content negotiation itself, and is therefore not a proper end point in the negotiation process.

507 Insufficient Storage (WebDAV)
The method could not be performed on the resource because the server is unable to store the representation needed to successfully complete the request.

508 Loop Detected (WebDAV)
The server detected an infinite loop while processing the request.

510 Not Extended
Further extensions to the request are required for the server to fulfill it.

511 Network Authentication Required
Indicates that the client needs to authenticate to gain network access.

*/





CREATE TABLE THP_Errors (
    id int NOT NULL AUTO_INCREMENT,
    Error_ID int NOT NULL UNIQUE, -- 3 digit number starting 100 - 599
    ErrorType varchar(10) NOT NULL CHECK (ErrorType IN ('Client', 'Server', 'Other')), -- client, server, unknown
    ErrorDetail text NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB;