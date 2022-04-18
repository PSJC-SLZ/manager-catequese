<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComunidadeRequest;
use App\Models\Comunidade;
use App\Repositories\ComunidadeRepository;
use Illuminate\Http\Request;

class ComunidadeController extends Controller
{
    protected $repository;

    CONST ROUTE = '/admin/comunidades/';

    public function __construct(ComunidadeRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tableData = $this->repository->paginateRequest($request->all());
        return view('admin.comunidades.index', ['tableData' => $tableData]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.comunidades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComunidadeRequest $request)
    {
        try {
            $data = $this->repository->create($request->all());

            if (!$data) {
                flash()->error('Erro ao tentar salvar.');

                return redirect()->back()->withInput($request->all());
            }

            flash()->success('Cadastrado com sucesso.');

            return redirect($this::ROUTE);
        } catch (\Exception $e) {
            if (config('app.debug')) {
                throw $e;
            } else {
                flash()->error('Erro ao tentar salvar. Caso o problema persista, entre em contato com o suporte.');

                return redirect()->back();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comunidade  $comunidade
     * @return \Illuminate\Http\Response
     */
    public function show(Comunidade $comunidade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->repository->find($id);

        if (!$data) {
            flash()->error('Registro não existe.');

            return redirect()->back();
        }

        return view('admin.comunidades.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ComunidadeRequest  $request
     * @param  \App\Models\Comunidade  $comunidade
     * @return \Illuminate\Http\Response
     */
    public function update(ComunidadeRequest $request, $id)
    {
        try {
            $data = $this->repository->find($id);

            if (!$data) {
                flash()->error('Registro não existe.');

                return redirect($this::ROUTE);
            }

            $requestData = $request->only($this->repository->getFillableModelFields());

            if (!$data->update($requestData)) {
                flash()->error('Erro ao tentar salvar.');
                return redirect()->back()->withInput($request->all());
            }

            flash()->success('Registro atualizado com sucesso.');

            return redirect($this::ROUTE);
        } catch (\Exception $e) {
            if (config('app.debug')) {
                throw $e;
            } else {
                flash()->error('Erro ao tentar editar. Caso o problema persista, entre em contato com o suporte.');

                return redirect()->back();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comunidade  $comunidade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comunidade $comunidade)
    {
        //
    }
}
