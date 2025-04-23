<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Editar Pedido - CR-Doces</title>
  <link rel="stylesheet" href="{{ asset('css/editar-style.css') }}">
</head>
<body>
  <div class="form-container">
    <h1>Editar Pedido</h1>
    <form action="{{ route('pedido.update', $pedido->id) }}" method="POST" id="pedidoForm">
      @csrf
      @method('PUT')

      <label for="data">Data do Pedido</label>
      <input type="date" id="data" name="data" value="{{ \Carbon\Carbon::parse($pedido->data)->format('Y-m-d') }}" required />

      <label for="nomeCliente">Nome do Cliente</label>
      <input type="text" id="nomeCliente" name="nomeCliente" value="{{ $pedido->nomeCliente }}" placeholder="Digite o nome" required />

      <label for="pedido">Pedido</label>
      <input type="text" id="pedido" name="pedido" value="{{ $pedido->pedido }}" placeholder="Ex: 1 panetone + 2 ovos" required />

      <label for="endereco">Endereço</label>
      <input type="text" id="endereco" name="endereco" value="{{ $pedido->endereco }}" placeholder="Rua, número, bairro, cidade..." required />

      <label for="observacoes">Observações</label>
      <textarea id="observacoes" name="observacoes" rows="4" placeholder="Ex: sem recheio, adicionar laço, etc.">{{ $pedido->observacoes }}</textarea>

      <button type="submit">Alterar Pedido</button>
    </form>
  </div>
</body>
</html>


