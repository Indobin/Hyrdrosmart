
document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebarClose = document.getElementById('sidebarClose');

    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
        });
    }

    if (sidebarClose) {
        sidebarClose.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
        });
    }
    document.addEventListener('click', (e) => {
        const clickedInsideSidebar = sidebar.contains(e.target);
        const clickedToggleButton = sidebarToggle.contains(e.target);

        if (!clickedInsideSidebar && !clickedToggleButton && !sidebar.classList.contains('-translate-x-full')) {
            sidebar.classList.add('-translate-x-full');
            sidebarToggle.classList.remove('hidden');
        }
    });
});
