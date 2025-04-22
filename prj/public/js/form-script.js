
    document.getElementById('pedidoForm').addEventListener('submit', function(e) {
        e.preventDefault();
    
        // Capturando os valores dos campos do formulário
        const data = document.getElementById('data').value;
        const nomeCliente = document.getElementById('nomeCliente').value;
        const pedido = document.getElementById('pedido').value;
        const endereco = document.getElementById('endereco').value;
        const observacoes = document.getElementById('observacoes').value;
    
        // Criando um objeto com os dados a serem enviados
        const pedidoData = {
            data: data,
            nome_cliente: nomeCliente,
            pedido: pedido,
            endereco: endereco,
            observacoes: observacoes
        };
    
        // Enviando os dados para o servidor via POST
        fetch('/inserir-pedido', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Token CSRF do Laravel
            },
            body: JSON.stringify(pedidoData)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Pedido anotado com sucesso!');
                // Resetando o formulário após o envio
                document.getElementById('pedidoForm').reset();
            } else {
                alert('Erro ao registrar o pedido.');
            }
        })
        .catch(error => {
            console.error('Erro:', error);
            alert('Erro ao conectar com o servidor.');
        });
    });
    

  
