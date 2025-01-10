const sidebar = document.getElementById('sidebar');
const content = document.getElementById('content');
const toggleButton = document.getElementById('toggleSidebar');
const sidebarTitle = document.getElementById('sidebarTitle');
const logoImage = document.getElementById('logoImage');

const toggleSidebar = () => {
    sidebar.classList.toggle('collapsed');
    content.classList.toggle('expanded');

    if (sidebar.classList.contains('collapsed')) {
        sidebarTitle.style.display = 'none';
        logoImage.style.display = 'inline-block';
    } else {
        sidebarTitle.style.display = 'inline-block';
        logoImage.style.display = 'none';
    }
};

toggleButton.addEventListener('click', toggleSidebar);
