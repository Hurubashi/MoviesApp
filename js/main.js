function ajaxRequest(method, params, callback) {

    const request = new XMLHttpRequest();

    request.open(method, 'api');
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // var params = [];
    // for (let elem in data) {
    //     params = params + (elem + "=" + data[elem] + "&");
    // }

    request.onreadystatechange = callback;
    request.send(params);
}

// Usage
//  const data = { 'first name': 'George', 'last name': 'Jetson', 'age': 110 };
// const querystring = encodeQueryData(data);

function encodeQueryData(data) {
    const ret = [];
    for (let d in data)
      ret.push(encodeURIComponent(d) + '=' + encodeURIComponent(data[d]));
    return ret.join('&');
}

function search() {
    const data = [];
    data['text'] = 'slslslslsls';
    data['commant'] = 'totot';

    const gg = encodeQueryData(data);
    console.log(gg);
    ajaxRequest('GET', data, displayResult);
}

function displayResult() {
    console.log('Pobedko!');
}
