<div class="back-to-home">
        <a href="index.php?url=home">
            <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
            </svg>
            Voltar ao Início
        </a>
    </div>

    <div class="login-container" data-aos="zoom-in" data-aos-duration="1500">
        <div class="login-header">
            <h2>Bem-vindo de volta!</h2>
            <p>Faça login em sua conta</p>
        </div>

        <form action="../core/process_login.php" method="POST" id="loginForm">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="seu@email.com" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Digite sua senha" required>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember" style="background: rgba(0, 0, 0, 0.3); border-color: #3F0071;">
                <label class="form-check-label" for="remember" style="color: #B0B0B0; font-size: 0.9rem;">
                    Lembrar-me
                </label>
            </div>

            <button type="submit" class="btn btn-login">Entrar</button>
        </form>

        <div class="divider">
            <span>ou</span>
        </div>

        <div class="login-links">
            <p><a href="#" id="forgotPassword">Esqueceu sua senha?</a></p>
            <p style="color: #B0B0B0; margin-top: 1rem; font-size: 0.9rem;">
                Não tem uma conta?
                <a href="index.php?url=cadastro" style="color: #610094; font-weight: bold;">Cadastre-se</a>
            </p>
        </div>
    </div>
    <script>
        // Validação do formulário
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            if (!email || !password) {
                e.preventDefault();
                alert('Por favor, preencha todos os campos.');
                return;
            }

            // Validação básica de email
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                e.preventDefault();
                alert('Por favor, insira um email válido.');
                return;
            }
        });

        // Efeito de focus nos inputs
        const inputs = document.querySelectorAll('.form-control');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'translateY(-2px)';
            });

            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'translateY(0)';
            });
        });

        // Funcionalidade "Esqueceu sua senha"
        document.getElementById('forgotPassword').addEventListener('click', function(e) {
            e.preventDefault();
            alert('Funcionalidade de recuperação de senha será implementada em breve!');
        });
    </script>
