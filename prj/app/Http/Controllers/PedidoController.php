<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;

class PedidoController extends Controller
{
    // Exibe o formulário de criação
    public function create()
    {
        return view('pedido');
    }

    // Salva um novo pedido no banco
    public function store(Request $request)
    {
        $request->validate([
            'data' => 'required|date',
            'nomeCliente' => 'required|string|max:255',
            'pedido' => 'required|string',
            'endereco' => 'required|string',
            'observacoes' => 'nullable|string',
        ]);

        Pedido::create([
            'data' => $request->data,
            'nomeCliente' => $request->nomeCliente,
            'pedido' => $request->pedido,
            'endereco' => $request->endereco,
            'observacoes' => $request->observacoes,
        ]);

        return redirect()->route('pedido.index');
    }

    // Lista todos os pedidos não marcados como feitos
    public function index()
    {
        $pedidos = Pedido::where('feito', false)->orderBy('data', 'desc')->get();
        return view('lista', compact('pedidos'));
    }

    // Exibe o formulário de edição
    public function edit($id)
    {
        $pedido = Pedido::findOrFail($id);
        return view('editar', compact('pedido'));
    }

    // Atualiza um pedido
    public function update(Request $request, $id)
    {
        $pedido = Pedido::findOrFail($id);

        $pedido->update([
            'data' => $request->data,
            'nomeCliente' => $request->nomeCliente,
            'pedido' => $request->pedido,
            'endereco' => $request->endereco,
            'observacoes' => $request->observacoes,
        ]);

        return redirect()->route('pedido.index');
    }

    // Marca um pedido como feito (delete lógico)
    public function marcarComoFeito($id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->feito = true; // ou como você marca o "feito"
        $pedido->save();
    
        return redirect()->route('pedido.index')->with('success', 'Pedido marcado como feito!');
    }
    
    
    
    // Exclui o pedido do banco
    public function destroy($id)
    {
        Pedido::destroy($id);
        return redirect()->route('pedido.index');
    }
}
