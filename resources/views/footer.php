<footer>
    <nav>
        <ul>
            <li>
                <a href="index.php">
                    <i class="fas fa-hotel"></i>
                </a>
            </li>
            <li>
                <a href="friends.php">
                    <i class="fas fa-user-friends"></i>
                </a>
            </li>
            <li>
                <a href="profile.php"  alt="Perfil">
                    <i class="fas fa-id-card" alt="Perfil"></i>
                </a>
            </li>
            <li>
                <a href="faq.php">
                    <i class="fas fa-question-circle"></i>
                </a>
            </li>
            <li>
                <a href="contacto.php">
                    <i class="fas fa-bell"></i>
                </a>
            </li>
            <?php if( !(isset($_COOKIE['logeado'])) ): ?>
            <li>
                <a href="register.php">
                    <i class="fas fa-user"></i>
                </a>
            </li>
            <?php else: ?>
            <li>
                <a href="logout.php">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </li>
            <?php endif; ?>

        </ul>
    </nav>
</footer>