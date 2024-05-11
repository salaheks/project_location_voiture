function showImageModal(src, imageId) {
    document.getElementById(imageId).src = src;
    $('#imageModal').modal('show');
}
