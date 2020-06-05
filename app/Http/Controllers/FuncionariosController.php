<?php

namespace App\Http\Controllers;

use App\Funcionario;
use App\Cargo;
use App\Cep;
use Illuminate\Http\Request;

class FuncionariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $funcionarios = Funcionario::orderby('id')->get();
        foreach ($funcionarios as $funcionario)
            $funcionario->cargo = Cargo::findOrFail($funcionario->cargo);
        return view('funcionarios.index', compact('funcionarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cargos = Cargo::orderby('id')->get();
        $generos = ['Feminino', 'Masculino'];
        $estados = ['Solteiro', 'Casado', 'Separado', 'Amasiado', 'Viuvo'];
        $ceps = Cep::orderby('codigo')->get();
        return view('funcionarios.create', compact('cargos', 'generos', 'estados', 'ceps'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'cargo' => 'required',
            'nome' => 'required',
            'cpf' => 'required',
            'rg' => 'required',
            'oemissor' => 'required | max:3',
            'genero' => 'required',
            'estcivil' => 'required',
            'datanasc' => 'required',
            'cep' => 'required',
            'numero' => 'required',
            'fone1' => 'required',
            'email' => 'required'
        ]);

        Funcionario::create($request->all());

        return redirect()->route('funcionarios.index')->with('success', 'Funcionário cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Funcionario $funcionario)
    {
        $funcionario->cargo = Cargo::findOrFail($funcionario->cargo);
        return view('funcionarios.show', compact('funcionario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Funcionario $funcionario)
    {
        $funcionario->cargo = Cargo::findOrFail($funcionario->cargo);
        $funcionario->cep = Cep::findOrFail($funcionario->cep);

        $cargos = Cargo::orderby('id')->get();
        $generos = ['Feminino', 'Masculino'];
        $estados = ['Solteiro', 'Casado', 'Separado', 'Amasiado', 'Viuvo'];
        $ceps = Cep::orderby('codigo')->get();
        return view('funcionarios.edit', compact('funcionario', 'cargos', 'generos', 'estados', 'ceps'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Funcionario $funcionario)
    {
        $request->validate([
            'cargo' => 'required',
            'nome' => 'required',
            'cpf' => 'required',
            'rg' => 'required',
            'oemissor' => 'required | max:3',
            'genero' => 'required',
            'estcivil' => 'required',
            'datanasc' => 'required',
            'cep' => 'required',
            'numero' => 'required',
            'fone1' => 'required',
            'email' => 'required'
        ]);

        $funcionario->update($request->all());

        $nome = $request->input('nome');

        return redirect()->route('funcionarios.index')->with('success', 'Funcionário '. $nome .' atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Funcionario $funcionario)
    {
        $funcionario->delete();
        return redirect()->route('funcionarios.index')->with('success', 'Funcionário removido com sucesso!');
    }
}
