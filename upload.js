function uploadFiles() {
    const form = document.getElementById('uploadForm');
    const formData = new FormData(form);
    const xhr = new XMLHttpRequest();

    xhr.open('POST', 'upload.php', true);

    xhr.upload.onprogress = function (e) {
        if (e.lengthComputable) {
            const percentComplete = (e.loaded / e.total) * 100;
            const progressBar = document.getElementById('progressBar').firstElementChild;
            progressBar.style.width = percentComplete + '%';
            progressBar.textContent = Math.round(percentComplete) + '%';
        }
    };

    xhr.onload = function () {
        const message = document.getElementById('message');
        if (xhr.status === 200) {
            message.textContent = 'File berhasil diupload!';
            message.style.color = 'green';
        } else {
            message.textContent = 'Gagal mengupload file!';
            message.style.color = 'red';
        }
        message.style.display = 'block';
    };

    xhr.send(formData);
}
