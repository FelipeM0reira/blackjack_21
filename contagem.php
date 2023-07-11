<div class="titulo">21</div>

<form action="#" method="post">
  <div>
    <label for="contagem">Cartas:</label>
    <form action="processar.php" method="POST">
      <?php
    $values = array(2, 3, 4, 5, 6, 7, 8, 9, 10, 'J', 'Q', 'K', 'AS');
    
    foreach ($values as $value) {
        echo '<button type="submit" name="contagem" value="' . $value . '">' . $value . '</button>';
    }
    ?>
    </form>

    <!-- <input type="number" value=<?= $_POST['contagem'] ?? 0 ?> name="contagem" id="contagem" min="2" max="10"> -->
    <label for="baralhos">Baralhos:</label>
    <select name="baralhos" id="baralhos">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="4">4</option>
      <option value="6">6</option>
    </select>
  </div>
  <button>Calcular</button>
  <button name="reset" value="true">Zerar</button>
</form>

<?php

session_start();

$contagem = $_SESSION['contagem'] ?? 0;

if (isset($_POST['contagem'])) {
  $novo_valor = $_POST['contagem'];

  if ($novo_valor < 7) {
    $contagem += 1;
  } elseif ($novo_valor > 9) {
    $contagem -= 1;
  }

  $_SESSION['contagem'] = $contagem;
}

if (isset($_POST['baralhos'])) {
  $contagem = $contagem / $_POST['baralhos'];
}

if (isset($_POST['reset'])) {
  $contagem = 0;
  $_SESSION['contagem'] = 0;
}

echo "Total: $contagem";

echo "fim";