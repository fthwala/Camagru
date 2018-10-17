function likePhoto(obj) {
    location.href = "gallary?action=like&id=" + obj.value;
}
function commentPhoto(obj) {
    var comment = document.querySelector("textarea[name='"+ obj.value +"']");
    location.href = "gallary?action=comment&id=" + obj.value + "&message=" + comment.value;
}

function deletePhoto(obj) {
    location.href = "workarea?action=del&id=" + obj.value;
}

function deletePhotoPreview(obj) {
    location.href = "upload?action=del&id=" + obj.value;
}