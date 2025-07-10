<!-- Header -->
<div class="header">
    <div class="page-title">
        <h1>
            <?php
            if (isset($title)) {
                echo $title;
            } else {
                'Tableau de Bord';
            }
            ?>
        </h1>
    </div>
    <div class="user-info">
        <span>Admin</span>
        <img src="" alt="User">
    </div>
</div>