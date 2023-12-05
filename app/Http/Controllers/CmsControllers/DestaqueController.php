<?php

namespace App\Http\Controllers\CmsControllers;

use App\Http\Controllers\Controller;
use App\Models\CategoriaDestaque;
use App\Models\Destaque;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DestaqueController extends Controller
{
    private $dadosPagina;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->dadosPagina['tituloPagina'] = 'Todos os Destaques';
        $this->dadosPagina['destaques'] =  Destaque::with('categoria')->where(function($query){
            if(request()->filled('search')){
                $query->Where('titulo', 'LIKE','%'. request()->get('search') .'%');
             }
        })->paginate(10);

       return view('cms.pages.destaques.index',$this->dadosPagina);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function register()
    {
        $this->dadosPagina['tituloPagina'] = 'Registro de Destaques';
        $this->dadosPagina['destaqueCategorias'] = CategoriaDestaque::all();
        return view('cms.pages.destaques.register', $this->dadosPagina);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'categoria_id',
            'title',
            'subtitle',
            'body',
            'url_link',
            'txt_link',
            'date_start',
            'date_end',
            'ordem',
            'status',
        ]);

        $rules = [
            'categoria_id' => ['required'],
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['required', 'string', 'max:255'],
            'body' => ['required'],
            'url_link' => ['nullable', 'string' , 'max:255'],
            'txt_link' => ['nullable', 'string' , 'max:255'],
            'date_start' => ['nullable', 'date'],
            'date_end' => ['nullable', 'date'],
            'ordem' => ['required'],
            'status' => ['required', 'in:0,1'],
        ];

        if($request->file('img_src')){
            $path =  Storage::disk('public')->put('/images', $request->file('img_src'));
            $data['img_src']= Storage::url($path);

        }else{
            $data['img_src']= 'assets/site/images/main-slider/slider-2.jpg';
        }

        if($request->date_start){
            $date_start = \DateTime::createFromFormat('d/m/Y H:i:s', $request->date_start.':00');
            $data['date_start'] = $date_start->format('Y-m-d H:i:s');
        }

        if($request->date_end){
            $date_end = \DateTime::createFromFormat('d/m/Y H:i:s', $request->date_end.':00');
            $data['date_end'] = $date_end->format('Y-m-d H:i:s');
        }

        $validator = Validator::make($data, $rules);
        if($validator->fails()) {
            return redirect()->route('admin.destaque.create')
            ->withErrors($validator)
            ->withInput();
        }

        try {
            $destaque = new Destaque([
                'categoria_id' => $data['categoria_id'],
                'title' => $data['title'],
                'subtitle' => $data['subtitle'],
                'body' =>  $data['body'],
                'url_link' =>  $data['url_link'],
                'txt_link' =>  $data['txt_link'],
                'date_start' => $data['date_start'],
                'date_end' => $data['date_end'],
                'ordem' => $data['ordem'],
                'status' => $data['status'],
                'img_src' => $data['img_src']
            ]);
            $destaque->save();

            return redirect()->route('admin.destaques.index')->with('success', 'Destaque criado com sucesso!');

        } catch (\Exception $e) {
            return redirect()->route('admin.destaque.create')->with('errors', 'Ocorreu um erro ao criar o Destaque. Por favor, tente novamente.');
        }

    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $idDestaque = $request->id;
        $destaque = Destaque::findOrFail($idDestaque);
        $destaqueCategorias = CategoriaDestaque::all();
        $this->dadosPagina = [
            'destaque' => $destaque,
            'destaqueCategorias' => $destaqueCategorias,
            'tituloPagina' => 'Editar Destaque: #'.$destaque->id,
        ];

        return view('cms.pages.destaques.edit', $this->dadosPagina);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
            $destaque = Destaque::findOrFail($id);

            $data = $request->only([
                'categoria_id',
                'title',
                'subtitle',
                'body',
                'url_link',
                'txt_link',
                'date_start',
                'date_end',
                'order',
                'status',
            ]);

            $rules = [
                'categoria_id' => ['required'],
                'title' => ['required', 'string', 'max:255'],
                'subtitle' => ['required', 'string', 'max:255'],
                'body' => ['required'],
                'url_link' => ['nullable', 'string' , 'max:255'],
                'txt_link' => ['nullable', 'string' , 'max:255'],
                'date_start' => ['nullable', 'date'],
                'date_end' => ['nullable', 'date'],
                'order' => ['required'],
                'status' => ['required', 'in:0,1'],
            ];

            // Verificar se um novo arquivo foi enviado
            if($request->hasFile('img_src')) {
                // Remover a imagem anterior (opcional)
                $existingImage = $destaque->img_src;
                if ($existingImage) {
                    Storage::disk('public')->delete($existingImage);
                }
                // Armazenar a nova imagem
                $path = Storage::disk('public')->put('/images', $request->file('img_src'));
                $data['img_src'] = Storage::url($path);
            }else{
                // Caso contrário, manter a imagem existente
                unset($data['img_src']);
            }

            if($request->date_start){
                $date_start = \DateTime::createFromFormat('d/m/Y H:i:s', $request->date_start.':00');
                $data['date_start'] = $date_start->format('Y-m-d H:i:s');
            }

            if($request->date_end){
                $date_end = \DateTime::createFromFormat('d/m/Y H:i:s', $request->date_end.':00');
                $data['date_end'] = $date_end->format('Y-m-d H:i:s');
            }

            $validator = Validator::make($data, $rules);
            if($validator->fails()) {
                return redirect()->route('admin.destaque.create')
                ->withErrors($validator)
                ->withInput();
            }

            try {
                $destaque->update($data);
                return redirect()->route('admin.destaques.index')->with('success', 'Destaque Alterado com sucesso!');
            } catch (\Throwable $th) {
                return redirect()->route('admin.destaque.edit', ['id' => $id])
                ->with('error', 'Ocorreu um erro ao atualizar o Destaque. Por favor, tente novamente.');

            }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        try {
            $destaque = Destaque::findOrFail($id);
            $destaque->delete();
            return redirect()->route('admin.destaques.index')->with('success', 'Destaque excluído com sucesso.');
        } catch (\Exception $e) {
            return redirect()->route('admin.destaques.index')->with('error', 'Erro ao tentar excluir o Destaque.');
        }

    }
}
