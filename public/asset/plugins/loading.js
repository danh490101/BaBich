let loadingOverlay = $.dialog({
    title: '',
    content: 'Đang xử lý, vui lòng chờ...',
    animation: 'none',
    closeAnimation: 'none',
    closeIcon: false,
    lazyOpen: true
});

function showLoadingOverlay() {
    loadingOverlay.open();
}

function hideLoadingOverlay() {
    loadingOverlay.close();
}