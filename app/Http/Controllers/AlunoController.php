<?php
namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        @extends('layouts.app')

            @section('content')
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Cadastro de Alunos </h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-success" href="" title="Create a product"> <i class="fas fa-plus-circle"></i>
                                </a>
                        </div>
                    </div>
                </div>
            
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p></p>
                    </div>
                @endif
            
                <table class="table table-bordered table-responsive-lg">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>dataNasc</th>
                        <th>serie</th>
                        <th>Date Created</th>
                        <th>Actions</th>
                    </tr>
                    @foreach ($alunos as $aluno)
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <form action="" method="POST">
            
                                    <a href="" title="show">
                                        <i class="fas fa-eye text-success  fa-lg"></i>
                                    </a>
            
                                    <a href="">
                                        <i class="fas fa-edit  fa-lg"></i>
                                    </a>
            
                                    @csrf
                                    @method('DELETE')
            
                                    <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                        <i class="fas fa-trash fa-lg text-danger"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            
                {!! $alunos->links() !!}
            
            @endsection

        $alunos = Aluno::latest()->paginate(5);

        return view('alunos.index', compact('alunos'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        @extends('layouts.app')

        @section('content')
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Novo ALuno</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="" title="Go back"> <i class="fas fa-backward "></i> </a>
                    </div>
                </div>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Error!</strong> 
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li></li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="" method="POST" >
                @csrf

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Nome:</strong>
                            <input type="text" name="name" class="form-control" placeholder="Name">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Data de Nascimento:</strong>
                            <textarea class="form-control" style="height:50px" name="introduction"
                                placeholder="dataNasc"></textarea>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Serie:</strong>
                            <input type="string" name="serie" class="form-control" placeholder="Put the price">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>
                </div>

            </form>
        @endsection

        return view('alunos.create');
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
            'name' => 'required',
            'dataNasc' => 'required',
            'serie' => 'required'
        ]);

        Aluno::create($request->all());

        return redirect()->route('alunos.index')
            ->with('success', 'Aluno created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function show(Aluno $aluno)
    {
        @extends('layouts.app')

        @section('content')
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>  </h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="" title="Go back"> <i class="fas fa-backward "></i> </a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nome:</strong>

                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Data de Nascimento</strong>

                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>serie</strong>

                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Date Created</strong>

                    </div>
                </div>
            </div>
        @endsection

        return view('alunos.show', compact('aluno'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function edit(Aluno $aluno)
    {
        @extends('layouts.app')

        @section('content')
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Editar cadastro</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="" title="Go back"> <i class="fas fa-backward "></i> </a>
                    </div>
                </div>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Error!</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li></li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Nome:</strong>
                            <input type="text" name="name" value="" class="form-control" placeholder="Name">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Data de Nascimento</strong>
                            <textarea class="form-control" style="height:50px" name="description"
                                placeholder="dataNasc"></textarea>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>serie</strong>
                            <input type="string" name="price" class="form-control" placeholder=""
                                value="">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </div>
                </div>

            </form>
        @endsection

        return view('alunos.edit', compact('aluno'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, aluno $aluno)
    {
        $request->validate([
            'name' => 'required',
            'dataNasc' => 'required',
            'serie' => 'required'
        ]);
        $aluno->update($request->all());

        return redirect()->route('alunos.index')
            ->with('success', 'aluno updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aluno $aluno)
    {
        $aluno->delete();

        return redirect()->route('alunos.index')
            ->with('success', 'Aluno deleted successfully');
    }
}
