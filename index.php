<?php include_once 'includes/header.php'; ?>

<div class="container">
    <div class="form-wrapper">
        <h1>Cadastro de Cliente</h1>
        
        <?php
        if (isset($_SESSION['message'])) {
            echo '<div class="alert ' . $_SESSION['message_type'] . '">' . $_SESSION['message'] . '</div>';
            unset($_SESSION['message']);
            unset($_SESSION['message_type']);
        }
        ?>

        <form action="includes/process.php" method="POST" class="modern-form">
            <div class="form-group">
                <input type="text" name="nome" id="nome" required>
                <label for="nome">Nome</label>
                <div class="line"></div>
            </div>

            <div class="form-group">
                <input type="tel" name="telefone" id="telefone" required>
                <label for="telefone">Telefone</label>
                <div class="line"></div>
            </div>

            <button type="submit" name="save_client" class="submit-btn">
                Cadastrar
                <span class="btn-icon">→</span>
            </button>
        </form>
    </div>
</div>

<?php include_once 'includes/footer.php'; ?>