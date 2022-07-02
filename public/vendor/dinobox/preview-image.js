function preview(e, id) {
    if (e.files && e.files[0]) {
        if (e.files[0].type.match('image.*')) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById(id).innerHTML = "<img src='" + e.target.result + "' class='Responsive image img-thumbnail' width='200px' height='200px' >";
            }
            reader.onerror = function(e) {
                document.getElementById(id).innerHTML = "Error de lectura";
            }
            reader.readAsDataURL(e.files[0]);
        } else {
            document.getElementById(id).innerHTML = "No es un formato de imagen";
        }
    }
}