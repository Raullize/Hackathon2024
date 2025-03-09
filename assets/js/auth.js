// Função para verificar se o usuário está autenticado
function isAuthenticated() {
    return localStorage.getItem('userToken') !== null;
}

// Função para redirecionar para login se não estiver autenticado
function requireAuth(targetPage) {
    if (!isAuthenticated()) {
        // Salvar a página de destino para redirecionamento após login
        localStorage.setItem('redirectAfterLogin', targetPage);
        showToast('Por favor, faça login para continuar', 'warning');
        setTimeout(() => {
            window.location.href = '/public/login.html';
        }, 1500);
        return false;
    }
    return true;
}

// Função para fazer login
function login(email, password) {
    // Aqui seria implementado a autenticação real com o backend
    // Por enquanto, vamos simular um login bem-sucedido
    const userData = {
        id: 1,
        name: 'Usuário Teste',
        email: email,
        token: 'token_' + Math.random().toString(36).substr(2, 9)
    };
    
    localStorage.setItem('userToken', userData.token);
    localStorage.setItem('userName', userData.name);
    localStorage.setItem('userEmail', userData.email);
    
    // Redirecionar para a página salva anteriormente ou para o dashboard
    const redirectTo = localStorage.getItem('redirectAfterLogin') || '/protected/dashboard.html';
    localStorage.removeItem('redirectAfterLogin');
    window.location.href = redirectTo;
}

// Função para fazer logout
function logout() {
    localStorage.removeItem('userToken');
    localStorage.removeItem('userName');
    localStorage.removeItem('userEmail');
    localStorage.removeItem('redirectAfterLogin');
    window.location.href = '/index.html';
}

// Função para mostrar toast de notificação
function showToast(message, type = 'info') {
    // Criar elemento de toast se não existir
    if (!document.getElementById('toast-container')) {
        const toastContainer = document.createElement('div');
        toastContainer.id = 'toast-container';
        toastContainer.style.position = 'fixed';
        toastContainer.style.top = '20px';
        toastContainer.style.right = '20px';
        toastContainer.style.zIndex = '9999';
        document.body.appendChild(toastContainer);
    }
    
    // Criar o toast
    const toast = document.createElement('div');
    toast.className = `toast toast-${type}`;
    toast.innerHTML = message;
    
    // Estilos para o toast
    toast.style.minWidth = '250px';
    toast.style.margin = '10px 0';
    toast.style.padding = '15px 20px';
    toast.style.borderRadius = '4px';
    toast.style.boxShadow = '0 4px 12px rgba(0,0,0,0.15)';
    toast.style.backgroundColor = type === 'warning' ? '#ff9800' : 
                                  type === 'error' ? '#f44336' : 
                                  type === 'success' ? '#4caf50' : '#2196f3';
    toast.style.color = 'white';
    toast.style.transition = 'all 0.3s ease';
    toast.style.opacity = '0';
    
    // Adicionar o toast ao container
    document.getElementById('toast-container').appendChild(toast);
    
    // Mostrar o toast com animação
    setTimeout(() => {
        toast.style.opacity = '1';
    }, 10);
    
    // Remover o toast após 3 segundos
    setTimeout(() => {
        toast.style.opacity = '0';
        setTimeout(() => {
            toast.remove();
        }, 300);
    }, 3000);
}

// Inicializar listeners quando a página carregar
document.addEventListener('DOMContentLoaded', function() {
    // Verificar se estamos em página protegida
    if (window.location.pathname.includes('/protected/')) {
        if (!isAuthenticated()) {
            requireAuth(window.location.pathname);
        } else {
            // Mostrar nome do usuário se disponível
            const userName = localStorage.getItem('userName');
            if (userName && document.getElementById('user-name')) {
                document.getElementById('user-name').textContent = userName;
            }
        }
    }
    
    // Adicionar listener aos botões de ação
    const queroAjudarBtn = document.getElementById('quero-ajudar-btn');
    const precisoAjudaBtn = document.getElementById('preciso-ajuda-btn');
    
    if (queroAjudarBtn) {
        queroAjudarBtn.addEventListener('click', function(e) {
            e.preventDefault();
            if (requireAuth('/protected/ajudar.html')) {
                window.location.href = '/protected/ajudar.html';
            }
        });
    }
    
    if (precisoAjudaBtn) {
        precisoAjudaBtn.addEventListener('click', function(e) {
            e.preventDefault();
            if (requireAuth('/protected/receberAjuda.html')) {
                window.location.href = '/protected/receberAjuda.html';
            }
        });
    }
    
    // Adicionar listener para formulário de login se estiver na página de login
    const loginForm = document.getElementById('loginForm');
    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            login(email, password);
        });
    }
    
    // Adicionar listener para botão de logout
    const logoutBtn = document.getElementById('logout-btn');
    if (logoutBtn) {
        logoutBtn.addEventListener('click', function(e) {
            e.preventDefault();
            logout();
        });
    }
    
    // Login Empresarial
    const loginEmpresaForm = document.getElementById('loginEmpresaForm');
    if (loginEmpresaForm) {
        loginEmpresaForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const cnpj = document.getElementById('cnpj').value;
            const email = document.getElementById('emailEmpresa').value;
            const password = document.getElementById('passwordEmpresa').value;
            
            // Simulação de login empresarial bem-sucedido
            loginEmpresa(cnpj, email, password);
        });
    }
});

// Função para login empresarial
function loginEmpresa(cnpj, email, password) {
    // Simulação de autenticação bem-sucedida
    localStorage.setItem('userToken', 'empresa_token_123');
    localStorage.setItem('userType', 'empresa');
    localStorage.setItem('userName', 'Empresa ' + cnpj);
    
    // Exibir mensagem de sucesso
    showToast('Login empresarial realizado com sucesso!', 'success');
    
    // Redirecionar para a página salva ou para o dashboard
    const savedPage = localStorage.getItem('savedPage');
    if (savedPage) {
        localStorage.removeItem('savedPage');
        window.location.href = savedPage;
    } else {
        window.location.href = '../protected/ajudar.html';
    }
} 