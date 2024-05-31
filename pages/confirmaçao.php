<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/stylePedido.css">
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Poetsen+One&display=swap">
    <title>Confirmação do Pedido</title>
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
        <h1>Confirmação do Pedido</h1>
        <div class="resumoPedido">
            <h3>Suas pizzas selecionadas:</h3>
            <ul>
                <?php
                if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $pizza) {
                        echo "<li>$pizza</li>";
                    }
                } else {
                    echo "<li>Nenhuma pizza selecionada.</li>";
                }
                ?>
            </ul>
            <button onclick="location.href='../index.html'" class="botaoVoltar">Voltar para o início</button>
        </div>
    </div>
</body>
</html>
