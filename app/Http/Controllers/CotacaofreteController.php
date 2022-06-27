<?php

namespace App\Http\Controllers;

use App\Http\Requests\CotacaofreteRequest;
use App\Models\Cotacaofrete as Cotacaofrete;
use App\Http\Resources\Cotacaofrete as CotacaofreteResource;
use Illuminate\Http\Request;

class CotacaofreteController extends Controller
{
    // Cadastra cotação de frete
    public function store(CotacaofreteRequest $request)
    {
        $cotacao = $request->all();

        if(Cotacaofrete::where('transportadora_id', '=', $request->transportadora_id)->select('uf')->count() > 0) {
            return response()->json([
                "message" => "Já existe cadastro de cotação para essa TRANSPORTADORA na UF informada."
            ], 412);
        }

        if(Cotacaofrete::create($cotacao)) {
            return response()->json([
                "message" => "Sucesso! Cotação de frete cadastrada."
            ], 200);
        } else {
            return response()->json([
                "message" => "Erro! Cotação de frete não cadastrada."
            ], 500);
        }
    }

    // Calcular imposto
    public function calculation(Request $request) 
    {
        if(Cotacaofrete::where('uf', $request->uf)->exists()) {
            $valorPedido = $request->valor_pedido;
            $transportadoras = Cotacaofrete::where('uf', '=', $request->uf)->get();

            foreach($transportadoras as $transp) {
                $calculo[] = ['id' => $transp->transportadora_id] + ['valor_frete' => number_format(($valorPedido/100 * $transp->percentual_cotacao) + $transp->valor_extra, 2, '.', '')];
            }

            uasort($calculo, function($a, $b) {
                return $a['valor_frete'] > $b['valor_frete'];
            });
            
            return response()->json(array_slice($calculo, 0, 5), 200);
        } else {
            return response()->json([
                "message" => "Não existe cotação cadastrada para UF."
            ], 500);
        }
    }

    // Listar imposto
    public function show()
    {
        $impostos = Cotacaofrete::get()->toJson(JSON_PRETTY_PRINT);

        if($impostos) {
            return response($impostos, 200);
        } else {
            return response()->json([
                "message" => "Não possui dados cadastrados!"
            ], 500);
        }
    }
}
