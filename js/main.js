// ajaxFunctions
function ajaxRequest(method, data, callback) {
    const request = new XMLHttpRequest();

    request.open(method, window.location.protocol + '/movies/ajaxMovie');
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    let params = encodeQueryData(data);

    request.onreadystatechange = callback;
    request.send(params);
}

function encodeQueryData(data) {
    const ret = [];
    for (let d in data)
      ret.push(encodeURIComponent(d) + '=' + encodeURIComponent(data[d]));
    return ret.join('&');
}

// Search click
function search() {
    const input = document.getElementById('inputText');
    const select = document.getElementById('select');

    const row = select.options[select.selectedIndex].value;
    const value = input.value

    const data = [];
    data['action'] = 'search';
    data['row'] = row;
    data['value'] = value;

    const displayResult = function() {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText != false) {
                // text[0].value = "";
                let movieList = document.getElementById('movieList');
                movieList.innerHTML = this.responseText;
            }
        }
    
    }
    ajaxRequest('POST', data, displayResult);
}

// File upload
function handleFile(event) {
    const reader = new FileReader();
    reader.readAsText(event.target.files[0]);

    reader.onload = function(file){
        const data = [];
        data['action'] = 'importData';
        data['text'] = file.target.result;
        ajaxRequest('POST', data, realoadPage);
    };
}

// Add Movie
function addMovie() {
    const title = document.getElementById('title');
    const date = document.getElementById('year');
    const format = document.getElementById('format');
    const actors = document.getElementById('actors');

    const data = [];
    data['action'] = 'addMovie';
    data['title'] = title.value;
    data['year'] = date.value;
    data['format'] = format.value;
    data['actors'] = actors.value;

    ajaxRequest('POST', data, realoadPage);
}

<<<<<<< HEAD
// On reset Click
function reset() {
    realoadPage();
}

=======
>>>>>>> 36ae8eae91abd3c1fb42a809221de6c88d2f6a53
//Delete Movie
function deleteMovie() {
    const title = document.getElementById('titleToDelete');

    const data = [];
    data['action'] = 'deleteMovie';
    data['title'] = title.value;

    ajaxRequest('POST', data, realoadPage);
}

// Support functions
function realoadPage() {
    document.location.reload(true);
}

function showHideForm() {
    const addMovieForm = document.getElementById('addMovieForm');
    addMovieForm.hidden = !addMovieForm.hidden;
}

<<<<<<< HEAD
// Validate Year
function validateYear(year)
{
    let regExp = /^\d+$/;
    let result = regExp.test(year.value);
    if (result == false) {
        year.setCustomValidity("Only number value");
    } else {
        const int = parseInt(year.value);
        if (int >= 1878 && int <= 2030) {
            year.setCustomValidity("");
        } else {
            int <= 1878 ? 
            year.setCustomValidity("The oldest movie was made at 1878") : 
            year.setCustomValidity("Maximum release year is 2030");
        }
    }
}
=======

>>>>>>> 36ae8eae91abd3c1fb42a809221de6c88d2f6a53
