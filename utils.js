
/*
**cheks whether a given string is an url

*/

function getHostName(url) {
    var match = url.match(/:\/\/(www[0-9]?\.)?(.[^/:]+)/i);
    if (match != null && match.length > 2 && typeof match[2] === 'string' && match[2].length > 0) {
    return true;
    }
    else {
        return null;
    }
}
