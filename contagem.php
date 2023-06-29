<div class="titulo">21</div>

<form action="#" method="post">
  <div>
    <label for="contagem">Cartas:</label>
    <button name="contagem" value="2">2</button>
    <button name="contagem" value="3">3</button>
    <button name="contagem" value="4">4</button>
    <button name="contagem" value="5">5</button>
    <button name="contagem" value="6">6</button>
    <button name="contagem" value="7">7</button>
    <button name="contagem" value="8">8</button>
    <button name="contagem" value="9">9</button>
    <button name="contagem" value="10">10</button>
    <button name="contagem" value="10">J</button>
    <button name="contagem" value="10">Q</button>
    <button name="contagem" value="10">K</button>
    <button name="contagem" value="11">AS</button>
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