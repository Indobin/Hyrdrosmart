<footer class="p-4 mt-10 text-center text-white bg-gray-800">
    <p>&copy; 2025 IoT Monitoring System. All rights reserved.</p>
</footer>
<script>
      const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebarClose = document.getElementById('sidebarClose');

        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
        });

        sidebarClose.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
        });
</script>
