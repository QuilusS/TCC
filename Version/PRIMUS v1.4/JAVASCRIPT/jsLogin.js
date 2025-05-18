// Função de callback após o login
function handleCredentialResponse(response) {
    console.log("ID Token: ", response.credential);

    // Enviar o token para validação no seu backend (opcional)
    fetch('/validar-login', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ token: response.credential })
    })
    .then(res => res.json())
    .then(data => {
        console.log("Usuário logado: ", data);
    })
    .catch(err => console.error("Erro no login: ", err));
}

// Exemplo de redirecionamento após login do Google
const googleLoginUrl = 'https://a3b0-2804-2448-80d1-c300-10ee-3888-ad7b-a7fd.ngrok-free.app/auth/google/callback'; // URL do ngrok

// Quando o usuário se autenticar, o Google redirecionará para essa URL
app.get('/auth/google/callback', (req, res) => {
  // Aqui você pode pegar o código de autorização e fazer a troca pelo token
});

