/*
document.getElementById('file-upload').addEventListener('change', function() {
    var fileList = document.getElementById('file-list');
    fileList.innerHTML = '';
    for (var i = 0; i < this.files.length; i++) {
        var li = document.createElement('li');
        li.textContent = this.files[i].name;
        fileList.appendChild(li);
    }
});

document.getElementById('doc-category').addEventListener('change', function() {
    var otherCategoryInput = document.getElementById('other-category');
    if (this.value === 'other') {
        otherCategoryInput.style.display = 'block';
        otherCategoryInput.required = true;
    } else {
        otherCategoryInput.style.display = 'none';
        otherCategoryInput.required = false;
    }
});
*/

// Show the modal
$('#successModal').modal('show');

// Optional: Hide the modal and backdrop after some time
setTimeout(function(){
    $('#successModal').modal('hide');
}, 3000);


document.getElementById('category').addEventListener('change', function () {
    var otherCategoryInput = document.getElementById('other-category');
    if (this.value === 'other') {
        otherCategoryInput.style.display = 'block';
        otherCategoryInput.required = true;
    } else {
        otherCategoryInput.style.display = 'none';
        otherCategoryInput.required = false;
    }
});

document.getElementById('file-input').addEventListener('change', function () {
    var fileList = document.getElementById('file-list');
    fileList.innerHTML = '';
    for (var i = 0; i < this.files.length; i++) {
        var li = document.createElement('li');
        li.textContent = this.files[i].name;
        fileList.appendChild(li);
    }
});