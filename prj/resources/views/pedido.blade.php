<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Anotar Pedido - CR-Doces</title>
  <link rel="stylesheet" href="./css/form-style.css" />
</head>
<body>
  <div class="form-container">
    <h1>Anotar Pedido</h1>
    <form action="{{ route('pedido.store') }}" method="POST" id="pedidoForm">
      @csrf
      <label for="data">Data do Pedido</label>
      <input type="date" id="data" name="data" required />

      <label for="nomeCliente">Nome do Cliente</label>
      <input type="text" id="nomeCliente" name="nomeCliente" placeholder="Digite o nome" required />

      <label for="pedido">Pedido</label>
      <input type="text" id="pedido" name="pedido" placeholder="Ex: 1 panetone + 2 ovos" required />

      <label for="endereco">Endereço</label>
      <input type="text" id="endereco" name="endereco" placeholder="Rua, número, bairro, cidade..." required />

      <label for="observacoes">Observações</label>
      <textarea id="observacoes" name="observacoes" rows="4" placeholder="Ex: sem recheio, adicionar laço, etc."></textarea>

      <button type="submit">Anotar Pedido</button>
    </form>
  </div>
</body>
</html>
