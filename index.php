<?php
session_start(); // Inicia a sessão para verificar o login

// Verifica se o usuário está logado
$logged_in = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
?>

<?php
include 'conexao.php'; // Conexão com o banco de dados

// Consulta para buscar todos os produtos
$query = "SELECT * FROM produtos";
$stmt = $pdo->prepare($query);
$stmt->execute();
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?php
// Conexão com o banco de dados
include('conexao.php');

// Busca os produtos
$stmt = $pdo->query("SELECT * FROM produtos");
$produtos = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de Periféricos Gamers</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

    <nav class="menu">
        <div class="logo">
            <img src="img/logo.png" alt="Logo" style="width: 189px; height: 42px;"> <!-- Logo -->
        </div>

        <div class="search-bar">
            <input type="text" placeholder="">
            <button class="search-btn">
                <img src="img/lupa.png" alt="">
            </button>
        </div>

        <div class="menu-options">
            <?php
            // Verifica se o usuário está logado
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
                // Se estiver logado, mostrar os ícones de contato, carrinho e perfil
                echo '
                    <a href="carrinho.html" class="menu-icon"><img src="icn/carrinho.png" alt="Carrinho" style="width: 32px; height: 32px;"></a>
                    <a href="contato.html" class="menu-icon"><img src="icn/contato.png" alt="Contato" style="width: 36px; height: 36px;"></a>
                    <a href="perfil.html" class="menu-icon"><img src="icn/perfil.png" alt="Perfil" style="width: 36px; height: 36px;"></a>
                ';
            } else {
                // Se não estiver logado, mostrar os botões de cadastrar e logar
                echo '
                    <a href="cadastrar.php" class="menu-button">Cadastrar</a>
                    <a href="logar.php" class="menu-button">Logar</a>
                ';
            }
            ?>
        </div>
    </nav>
    <div class="carousel-container">
        <div class="carousel">
            <!-- Slide 1 -->
            <div class="carousel-slide">
                <div class="circle-container">
                    <div class="circle-blur"></div> <!-- Círculo desfocado -->
                    <div class="circle-content">
                        <img src="perifericos/mouses/mouse.png" alt="Periférico">
                    </div>
                </div>
                <div class="info">
                    <h2>Mouse Gamer<br>
                         Logitech<br> 
                         G403<BR></h2>
                    <a href="#" class="buy-btn">COMPRAR AGORA</a>
                </div>
            </div>
            
            <!-- Slide 2 -->
            <div class="carousel-slide">
                <div class="circle-container">
                    <div class="circle-blur"></div> <!-- Círculo desfocado -->
                    <div class="circle-content">
                        <img src="perifericos/teclados/teclado1.jpg" alt="Periférico">
                    </div>
                </div>
                <div class="info">
                    <h2>Teclado Redragon <br>
                         Kumara Branco<br>
                          K552W<br></h2>
                    <a href="#" class="buy-btn">COMPRAR AGORA</a>
                </div>
            </div>
            

            <!-- Slide 3 -->
            <div class="carousel-slide">
                <div class="circle-container">
                    <div class="circle-blur"></div> <!-- Círculo desfocado -->
                    <div class="circle-content">
                        <img src="perifericos/headset/headset.png" alt="Periférico">
                    </div>
                </div>
                <div class="info">
                    <h2>HyperX Cloud <br>
                        Alpha<br>
                    <br></h2>
                    <a href="#" class="buy-btn">COMPRAR AGORA</a>
                </div>
            </div>
            
        </div>

        <!-- Setas -->
        <button class="carousel-btn left-btn">&#9664;</button>
        <button class="carousel-btn right-btn">&#9654;</button>
    </div>

    <script src="js/script.js"></script>

    <div class="topic-carousel-container">
        <!-- Botão de navegação esquerda -->
        <div class="topic-carousel-arrow left-topic-arrow"></div>
        <a href=""><div class="topic-carousel">
            <div class="topic">
                <div class="topic-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-mouse2" viewBox="0 0 16 16">
                        <path d="M3 5.188C3 2.341 5.22 0 8 0s5 2.342 5 5.188v5.625C13 13.658 10.78 16 8 16s-5-2.342-5-5.188V5.189zm4.5-4.155C5.541 1.289 4 3.035 4 5.188V5.5h3.5zm1 0V5.5H12v-.313c0-2.152-1.541-3.898-3.5-4.154M12 6.5H4v4.313C4 13.145 5.81 15 8 15s4-1.855 4-4.188z"/>
                      </svg>
                </div>
                <p>Mouse</p>
            </div></a>
            <a href=""><div class="topic">
                <div class="topic-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-keyboard" viewBox="0 0 16 16">
                        <path d="M14 5a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1zM2 4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2z"/>
                        <path d="M13 10.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25zm0-2a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25zm-5 0A.25.25 0 0 1 8.25 8h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5A.25.25 0 0 1 8 8.75zm2 0a.25.25 0 0 1 .25-.25h1.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-1.5a.25.25 0 0 1-.25-.25zm1 2a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25zm-5-2A.25.25 0 0 1 6.25 8h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5A.25.25 0 0 1 6 8.75zm-2 0A.25.25 0 0 1 4.25 8h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5A.25.25 0 0 1 4 8.75zm-2 0A.25.25 0 0 1 2.25 8h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5A.25.25 0 0 1 2 8.75zm11-2a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25zm-2 0a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25zm-2 0A.25.25 0 0 1 9.25 6h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5A.25.25 0 0 1 9 6.75zm-2 0A.25.25 0 0 1 7.25 6h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5A.25.25 0 0 1 7 6.75zm-2 0A.25.25 0 0 1 5.25 6h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5A.25.25 0 0 1 5 6.75zm-3 0A.25.25 0 0 1 2.25 6h1.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-1.5A.25.25 0 0 1 2 6.75zm0 4a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25zm2 0a.25.25 0 0 1 .25-.25h5.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-5.5a.25.25 0 0 1-.25-.25z"/>
                      </svg>
                </div>
                <p>Teclado</p>
            </div></a>
            <a href=""><div class="topic">
                <div class="topic-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-headset" viewBox="0 0 16 16">
                        <path d="M8 1a5 5 0 0 0-5 5v1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6a6 6 0 1 1 12 0v6a2.5 2.5 0 0 1-2.5 2.5H9.366a1 1 0 0 1-.866.5h-1a1 1 0 1 1 0-2h1a1 1 0 0 1 .866.5H11.5A1.5 1.5 0 0 0 13 12h-1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h1V6a5 5 0 0 0-5-5"/>
                      </svg>
                </div>
                <p>Headset</p>
            </div></a>
            <a href=""><div class="topic">
                <div class="topic-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-mic" viewBox="0 0 16 16">
                        <path d="M3.5 6.5A.5.5 0 0 1 4 7v1a4 4 0 0 0 8 0V7a.5.5 0 0 1 1 0v1a5 5 0 0 1-4.5 4.975V15h3a.5.5 0 0 1 0 1h-7a.5.5 0 0 1 0-1h3v-2.025A5 5 0 0 1 3 8V7a.5.5 0 0 1 .5-.5"/>
                        <path d="M10 8a2 2 0 1 1-4 0V3a2 2 0 1 1 4 0zM8 0a3 3 0 0 0-3 3v5a3 3 0 0 0 6 0V3a3 3 0 0 0-3-3"/>
                      </svg>
                </div>
                <p>Microfone</p>
            </div></a>
            <a href=""><div class="topic">
                <div class="topic-circle">
                    <img src="icn/iconecadeira.png" alt="Cadeira Gamer">
                </div>
                <p>Cadeira Gamer</p>
            </div></a>
            <a href=""><div class="topic">
                <div class="topic-circle">
                    <img src="icn/iconemousepad.png" alt="Mousepad">
                </div>
                <p>Mousepad</p>
            </div></a>
            <a href=""><div class="topic">
                <div class="topic-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-display" viewBox="0 0 16 16">
                        <path d="M0 4s0-2 2-2h12s2 0 2 2v6s0 2-2 2h-4q0 1 .25 1.5H11a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1h.75Q6 13 6 12H2s-2 0-2-2zm1.398-.855a.76.76 0 0 0-.254.302A1.5 1.5 0 0 0 1 4.01V10c0 .325.078.502.145.602q.105.156.302.254a1.5 1.5 0 0 0 .538.143L2.01 11H14c.325 0 .502-.078.602-.145a.76.76 0 0 0 .254-.302 1.5 1.5 0 0 0 .143-.538L15 9.99V4c0-.325-.078-.502-.145-.602a.76.76 0 0 0-.302-.254A1.5 1.5 0 0 0 13.99 3H2c-.325 0-.502.078-.602.145"/>
                      </svg>
                </div>
                <p>Monitor</p>
            </div></a>
            <a href=""><div class="topic">
                <div class="topic-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-gift" viewBox="0 0 16 16">
                        <path d="M3 2.5a2.5 2.5 0 0 1 5 0 2.5 2.5 0 0 1 5 0v.006c0 .07 0 .27-.038.494H15a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 1 14.5V7a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h2.038A3 3 0 0 1 3 2.506zm1.068.5H7v-.5a1.5 1.5 0 1 0-3 0c0 .085.002.274.045.43zM9 3h2.932l.023-.07c.043-.156.045-.345.045-.43a1.5 1.5 0 0 0-3 0zM1 4v2h6V4zm8 0v2h6V4zm5 3H9v8h4.5a.5.5 0 0 0 .5-.5zm-7 8V7H2v7.5a.5.5 0 0 0 .5.5z"/>
                      </svg>
                </div>
                <p>Gift Card</p>
            </div></a>
        </div>
    
        <!-- Botão de navegação direita -->
        <div class="topic-carousel-arrow right-topic-arrow"></div>
    </div>
    <div class="product-grid">
    <div class="produtos-container">
    <h1>Produtos Disponíveis</h1>
    <div class="product-container">
        <?php foreach ($produtos as $produto): ?>
            <a href="" style="text-decoration: none;">
                <div class="product-box">
                    <div class="product-image">
                        <img src="<?php echo $produto['imagem']; ?>" alt="<?php echo $produto['nome']; ?>">
                    </div>
                    <div class="product-info">
                        <h3><?php echo htmlspecialchars($produto['nome']); ?></h3>
                        <p>R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></p>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
    </div>
    </div>

    </div> 
    <footer>
  <div class="footer-container">
    <!-- Logo centralizada -->
    <div class="footer-logo">
      <img src="img/logo.png" alt="Logo">
    </div>
    
    <!-- Seções Institucional, Dúvidas, Ajuda -->
    <div class="footer-sections">
      <div class="footer-section">
        <h3>Institucional</h3>
        <ul>
          <li><a href="#">Quem Somos</a></li>
          <li><a href="#">Localização</a></li>
          <li><a href="#">Blog</a></li>
        </ul>
      </div>

      <div class="footer-section">
        <h3>Dúvidas</h3>
        <ul>
          <li><a href="#">Entrega</a></li>
          <li><a href="#">Garantia</a></li>
          <li><a href="#">Como Comprar</a></li>
          <li><a href="#">Formas de Pagamento</a></li>
        </ul>
      </div>

      <div class="footer-section">
        <h3>Ajuda</h3>
        <ul>
          <li><a href="#">SAC</a></li>
          <li><a href="#">Fale Conosco</a></li>
          <li><a href="#">Termos de Aceite</a></li>
          <li><a href="#">Políticas de Privacidade</a></li>
        </ul>
      </div>
    </div>

    <!-- Divisão e redes sociais -->
    <div class="social-section">
      <div class="divider"></div>
      
      <div class="social-links">
        <p>Siga-nos e nossas redes sociais:</p>
        <div class="social-icons">
          <a href="#"><img src="icn/whatzapicn.png" alt="Whatzap"></a>
          <a href="#"><img src="icn/instagramicn.png" alt="Instagram"></a>
          <a href="#"><img src="icn/xicn.png" alt="Twitter"></a>
        </div>
        
        <!-- Botões para app stores -->
        <div class="store-buttons">
          <a href="#"><img src="icone-apple-store.png" alt="Apple Store"></a>
          <a href="#"><img src="img/playstore.png" alt="Play Store"></a>
        </div>
      </div>
    </div>
  </div>
</footer>

</body>
</html>
