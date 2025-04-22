<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Lista de Pedidos</title>
  <link rel="stylesheet" href="./css/lista-style.css">
</head>
<body>
  <div class="form-container">
    <h1>Lista de Pedidos</h1>
    <table class="pedido-table">
      <thead>
        <tr>
          <th>Data</th>
          <th>Cliente</th>
          <th>Pedido</th>
          <th>Endereço</th>
          <th>Observações</th>
          <th>Alterar</th>
          <th>Feito</th>
          <th>Deletar</th>
        </tr>
      </thead>
      <tbody>
        @foreach($pedidos as $pedido)
          <tr>
            <td>{{ \Carbon\Carbon::parse($pedido->data)->format('d/m/Y') }}</td>
            <td>{{ $pedido->nomeCliente }}</td>
            <td>{{ $pedido->pedido }}</td>
            <td>{{ $pedido->endereco }}</td>
            <td>{{ $pedido->observacoes }}</td>
            <td>
              <a href="{{ route('pedido.edit', $pedido->id) }}" class="btn-edit">✏️ Alterar</a>
            </td>
            <td>
              <form action="{{ route('pedido.index', $pedido->id) }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn-done">✅ Feito</button>
              </form>
            </td>
            <td>
              <form action="{{ route('pedido.destroy', $pedido->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-delete">🗑️ Deletar</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>
</html>
