<!-- Sidebar -->
<div class="sidebar">
    <div class="sidebar-header">
        Gestion de Ferme
    </div>
    <div class="sidebar-menu">
        <a href="/dashboard.php" class="menu-item">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Accueil</span>
        </a>
        <a href="/especes/index.php" class="menu-item">
            <i class="fas fa-fw fa-paw"></i>
            <span>Espèces</span>
        </a>
        <a href="/betails/index.php" class="menu-item">
            <i class="fas fa-fw fa-kiwi-bird"></i>
            <span>Bétail</span>
        </a>
        <a href="/animeaux/index.php" class="menu-item">
            <i class="fas fa-fw fa-cow"></i>
            <span>Animaux</span>
        </a>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        let menus = document.querySelectorAll(".sidebar-menu .menu-item")
        let href = location.pathname
        for (let i = 0; i < menus.length; i++) {
            const menu = menus[i];
            if (menu.getAttribute("href") == href) {
                menu.classList.add("active")
            }
        }
    })
</script>