<?php

namespace App\Http\Controllers\CmsControllers;

use App\Models\Galeria;
use App\Http\Controllers\Controller;
use App\Models\ImagemGaleria;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class GaleriasController extends Controller
{
    private $dadosPagina;
    private $galeria;
    private $galerias;
    private $imgGaleria;

    public function __construct() {
        $this->galeria = new Galeria();
        $this->imgGaleria = new ImagemGaleria();
    }

    public function index() {
        $this->dadosPagina['tituloPagina'] = 'Todas as Galerias';
        $this->dadosPagina['galerias'] = Galeria::paginate(10);
        return view('cms.pages.galeria.index', $this->dadosPagina);
    }

    public function register() {
        $this->dadosPagina['tituloPagina'] = 'Nova galeria';
        return view('cms.pages.galeria.register', $this->dadosPagina);
    }

    public function store(Request $request) {
        $data = $request->only([
            'title',
            'subtitle',
            'resume',
            'description',
            'body',
            'status',
        ]);

        $rules = [
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'resume' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:255'],
            'body' => ['required', 'string'],
            'img_default' => ['nullable','file', 'mimes:jpg,png,webp'],
            'status' => ['required', 'in:0,1'],
        ];

        $validator = Validator::make($data, $rules);

        if($validator->fails()) {
            return redirect()->route('admin.galeria.create')
            ->withErrors($validator)
            ->withInput();
        }

        $data['slug'] = Str::slug($data['title'], '-');

        try {
            $this->galeria = Galeria::firstOrNew(['slug' => $data['slug']]);
            if (!$this->galeria->exists) {
                $this->galeria->title = $data['title'];
                $this->galeria->slug = $data['slug'];
                $this->galeria->subtitle = $data['subtitle'];
                $this->galeria->resume = $data['resume'];
                $this->galeria->description = $data['description'];
                $this->galeria->body = $data['body'];
                $this->galeria->status = $data['status'];
                if($request->hasFile('img_default')) {
                    if ($request->file('img_default')->isValid()) {
                        $img_default = $request->file('img_default')->store('public/images');
                        $url = asset(Storage::url($img_default));
                        $this->galeria->img_default = $url;
                    }
                }
                $this->galeria->save();
                return redirect()->route('admin.galerias.index')->with('success', 'Galeria criada com sucesso!');

            } else {
                return redirect()->route('admin.galeria.create')->with('error', 'Uma Galeria com esse nome já existe.');
            }

        } catch (\Exception $e) {
            return redirect()->route('admin.galeria.create')->with('errors', 'Ocorreu um erro ao criar a galeria. Por favor, tente novamente.');
        }
    }

    public function edit(Request $request) {
        $idGaleria = $request->id;
        $galeria = Galeria::findOrFail($idGaleria);

        $this->dadosPagina = [
            'galeria' => $galeria,
            'imagens' => $this->imgGaleria->getImagensByGaleriaId($idGaleria),
            'tituloPagina' => 'Editar Galeria: '.$galeria->title
        ];

        return view('cms.pages.galeria.edit', $this->dadosPagina);
    }

    public function update(Request $request, $id) {
        $galeria = Galeria::findOrFail($id);

        $data = $request->only([
            'title',
            'subtitle',
            'resume',
            'description',
            'body',
            'status',
        ]);

        $rules = [
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'resume' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:255'],
            'body' => ['required', 'string'],
            'img_default' => ['nullable','file', 'mimes:jpg,png,webp'],
            'status' => ['required', 'in:0,1'],
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return redirect()->route('admin.galeria.edit', ['id' => $id])
                ->withErrors($validator)
                ->withInput();
        }

        $data['slug'] = Str::slug($data['title'], '-');

        try {
            $galeria->title = $data['title'];
            $galeria->slug = $data['slug'];
            $galeria->subtitle = $data['subtitle'];
            $galeria->resume = $data['resume'];
            $galeria->description = $data['description'];
            $galeria->body = $data['body'];
            $galeria->status = $data['status'];

            if ($request->hasFile('img_default') && $request->file('img_default')->isValid()) {
                $img_default = $request->file('img_default')->store('public/images');
                $url = asset(Storage::url($img_default));
                $galeria->img_default = $url;
            }

            $galeria->save();

            return redirect()->route('admin.galerias.index')->with('success', 'Galeria atualizada com sucesso!');

        } catch (\Exception $e) {
            return redirect()->route('admin.galeria.edit', ['id' => $id])
                ->with('error', 'Ocorreu um erro ao atualizar a galeria. Por favor, tente novamente.');
        }
    }

    public function delete(Request $request) {
        $idGaleria = $request->id;
        $this->galeria = Galeria::find($idGaleria);
        if (!$this->galeria) {
            return redirect()->route('admin.galerias.index')->with('error', 'Galeria não encontrado.');
        }
        try {
            $this->galeria->delete();
            return redirect()->route('admin.galerias.index')->with('success', 'Galeria excluída com sucesso.');
        } catch (\Exception $e) {
            return redirect()->route('admin.galerias.index')->with('error', 'Erro ao tentar excluir a galeria.');
        }
    }

    public function add(Request $request) {

        $idGaleria = $request->id;

        $data = $request->only([
            'title',
            'imagem',
        ]);

        $rules = [
            'title' => ['required', 'string', 'max:255'],
            'imagem' => ['nullable','file', 'mimes:jpg,png,webp'],
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return redirect()->route('admin.galeria.edit', ['id' => $idGaleria])
                ->withErrors($validator)
                ->withInput();
        }

        // try {
            $this->imgGaleria->gallery_id = $idGaleria;
            $this->imgGaleria->img_title = $data['title'];
            if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
                $img_default = $request->file('imagem')->store('public/images');
                $url = asset(Storage::url($img_default));
                $this->imgGaleria->src = $url;
            }
            $this->imgGaleria->save();
            return redirect()->route('admin.galeria.edit', ['id' => $idGaleria])->with('success', 'Galeria atualizada com sucesso!');
        // } catch (\Exception $e) {
        //     return redirect()->route('admin.galeria.edit', ['id' => $idGaleria])
        //         ->with('error', 'Ocorreu um erro ao atualizar a galeria. Por favor, tente novamente.');
        // }
    }

    public function remove(Request $request) {
        $idImagem = $request->id_foto;
        $idGaleria = $request->id;
        $imagem = ImagemGaleria::find($idImagem);
        if (!$imagem) {
            return redirect()->route('admin.galeria.edit', ['id' => $idGaleria])->with('error', 'Imagem não encontrada.');
        }
        try {
            $imagem->delete();
            return redirect()->route('admin.galeria.edit', ['id' => $idGaleria])->with('success', 'Imagem excluída com sucesso.');
        } catch (\Exception $e) {
            return redirect()->route('admin.galeria.edit', ['id' => $idGaleria])->with('error', 'Erro ao tentar excluir a imagem.');
        }
    }

}
