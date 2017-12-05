<div class="info-section">
    <form action="index.php?page=login" method="POST">
        <?php
        include('components/login-box/login-box.view.php');
        if ($this->model->loginError) {
            ?>
            <p>Podano złe dane.</p>
            <?php
        }
        ?>
    </form>
</div>