const uploadfile = document.getElementById('uploadfile');
const img = document.getElementById('img');
const found = document.getElementById('found');
const Result = document.getElementById('result');
const Alert = document.getElementById('alert');

function loading() {
    let loading = document.getElementById("loading");
    if (loading.classList.contains('d-none')) {
        loading.classList.remove('d-none');
    }else {
        loading.classList.add('d-none');
    }
}
function generate() {
    Alert.classList.add('d-none');
    loading()
    if(!uploadfile.files[0]){
        loading()
        Alert.classList.remove('d-none');
        return false;
    }
    const formdata = new FormData();
    formdata.append('file',uploadfile.files[0]);
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'http://127.0.0.1:8000/generate', true);
    xhr.send(formdata);
    xhr.onload = function () {
        loading()
        if (xhr.status === 200) {
            if(found.classList.contains('d-none')){
                found.classList.remove('d-none');
            }
            const reader = new FileReader();
            reader.readAsDataURL(uploadfile.files[0]);
            reader.onload = function(event) {
            img.setAttribute('src', event.target.result);
            }
            const response = JSON.parse(xhr.responseText);
            Result.textContent = response.result;
        } else {
            console.error('Error uploading file:', xhr.statusText);
            result.textContent = 'Error uploading file. Please try again.';
        }
    };
};


