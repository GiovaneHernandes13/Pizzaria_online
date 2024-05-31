<?php
session_start();

// Initialize the cart if not already done
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['pizzas'])) {
    $selectedPizzas = $_POST['pizzas'];
    foreach ($selectedPizzas as $pizza) {
        if (!in_array($pizza, $_SESSION['cart'])) {
            $_SESSION['cart'][] = $pizza;
        }
    }
}

// Handle removing items from the cart
if (isset($_GET['action']) && $_GET['action'] == 'remove' && isset($_GET['pizza'])) {
    $pizzaToRemove = $_GET['pizza'];
    if (($key = array_search($pizzaToRemove, $_SESSION['cart'])) !== false) {
        unset($_SESSION['cart'][$key]);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/stylePedido.css">
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Poetsen+One&display=swap">
    <title>Cart</title>
</head>
<body>
    <nav class="navbar">
        <a class="tituloHome" href="../index.html">Pizzaria A+</a>
        <div class="caminhosHome">
            <a href="../pages/Cardapio.html">Cardápio</a>
            <a href="../pages/contato.html">Contato</a>
            <a href="../pages/sobre.html">Sobre nós</a>
            <a href="../pages/escolhadapizza.html">Pedidos</a>
        </div>
    </nav>

    <div class="container_pedido">
        <div class="tituloPedido">
            <h1>Seu Carrinho</h1>
        </div>
        <?php if (!empty($_SESSION['cart'])): ?>
            <ul>
                <?php foreach ($_SESSION['cart'] as $pizza): ?>
                    <li>
                        <?php echo htmlspecialchars($pizza); ?>
                        <a href="cart.php?action=remove&pizza=<?php echo urlencode($pizza); ?>">Remover</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Seu carrinho está vazio.</p>
        <?php endif; ?>
        <button onclick="location.href='pedidos.html'" class="botaoEnviar">Adicionar mais pizzas</button>
    </div>
</body>
</html>
