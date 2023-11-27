<?php

namespace App\Http\Controllers\CmsControllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    private $dadosPagina;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->dadosPagina['tituloPagina'] = 'Todos os Eventos';
        $this->dadosPagina['events'] = Event::where(function($query){
                    if(request()->filled('search')) {
                            $query->where('title', 'like' , '%'.request()->get('search').'%');
                    }
            })->paginate(10);

        return view('cms.pages.events.index', $this->dadosPagina);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function register()
    {
        $this->dadosPagina['tituloPagina'] = 'Registro de Eventos';
        return view('cms.pages.events.register', $this->dadosPagina);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'title',
            'subtitle',
            'resume',
            'body',
            'description',
            'date_start',
            'date_end',
            'status',
        ]);

        $rules = [
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:events,slug'],
            'subtitle' => ['required', 'string', 'max:255'],
            'resume' => ['required', 'string'],
            'body' => ['required', 'string'],
            'description' => ['required', 'string' , 'max:255'],
            'date_start' => ['required', 'date'],
            'date_end' => ['required', 'date'],
            'status' => ['required', 'in:0,1'],
        ];

        if($request->file('img_default')){
            $path =  Storage::disk('public')->put('/images/event', $request->file('img_default'));
            $data['img_default']= Storage::url($path);

        }else{
            $data['img_default']= null ;
        }

        if($request->date_start){
            $date_start = \DateTime::createFromFormat('d/m/Y H:i:s', $request->date_start.':00');
            $data['date_start'] = $date_start->format('Y-m-d H:i:s');
        }

        if($request->date_end){
            $date_end = \DateTime::createFromFormat('d/m/Y H:i:s', $request->date_end.':00');
            $data['date_end'] = $date_end->format('Y-m-d H:i:s');
        }

        $data['slug'] = Str::slug($request->title);
        $validator = Validator::make($data, $rules);

        if($validator->fails()) {
            return redirect()->route('admin.event.create')
            ->withErrors($validator)
            ->withInput();
        }


        try {

            $event =  new Event([
                'title' => $data['title'],
                'slug' => $data['slug'],
                'subtitle' => $data['subtitle'],
                'resume' =>  $data['resume'],
                'body' =>  $data['body'],
                'description' =>  $data['description'],
                'date_start' => $data['date_start'],
                'date_end' => $data['date_end'],
                'status' => $data['status'],
                'img_default' => $data['img_default']
            ]);

            $event->save();

            return redirect()->route('admin.events.index')->with('success', 'Evento criado com sucesso!');

        } catch (\Exception $e) {
            return redirect()->route('admin.event.create')->with('errors', 'Ocorreu um erro ao criar o Evento. Por favor, tente novamente.');
        }


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
            $idEvent = $request->id;
            //dd($idEvent);
            $event = Event::findOrFail($idEvent);
            //dd($event);

            $this->dadosPagina = [
                'event' => $event,
                'tituloPagina' => 'Editar Evento: #'.$event->id
            ];

            return view('cms.pages.events.edit', $this->dadosPagina);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
            $event =  Event::findOrFail($id);

            $data = $request->only([
                'title',
                'subtitle',
                'resume',
                'body',
                'description',
                'date_start',
                'date_end',
                'status',
            ]);

            $rules = [
                'title' => ['required', 'string', 'max:255'],
                'slug' => ['required', 'string', 'max:255'],
                'subtitle' => ['required', 'string', 'max:255'],
                'resume' => ['required', 'string'],
                'body' => ['required', 'string'],
                'description' => ['required', 'string' , 'max:255'],
                'date_start' => ['required', 'date'],
                'date_end' => ['required', 'date'],
                'status' => ['required', 'in:0,1'],
            ];


             // Verificar se um novo arquivo foi enviado
            if($request->hasFile('img_default')) {
                // Remover a imagem anterior (opcional)
                $existingImage = $event->img_default;
                if ($existingImage) {
                    Storage::disk('public')->delete($existingImage);
                }
                // Armazenar a nova imagem
                $path = Storage::disk('public')->put('/images/event', $request->file('img_default'));
                $data['img_default'] = Storage::url($path);
            }else{
                // Caso contrário, manter a imagem existente
                unset($data['img_default']);
            }

            if($request->date_start){
                $date_start = \DateTime::createFromFormat('d/m/Y H:i:s', $request->date_start.':00');
                $data['date_start'] = $date_start->format('Y-m-d H:i:s');
            }

            if($request->date_end){
                $date_end = \DateTime::createFromFormat('d/m/Y H:i:s', $request->date_end.':00');
                $data['date_end'] = $date_end->format('Y-m-d H:i:s');
            }

            $data['slug'] = Str::slug($request->title);
            $validator = Validator::make($data, $rules);

            if($validator->fails()) {
                return redirect()->route('admin.event.create')
                ->withErrors($validator)
                ->withInput();
            }

            try {
                $event->update($data);
                return redirect()->route('admin.events.index')->with('success', 'Evento Alterado com sucesso!');
            } catch (\Throwable $th) {
                return redirect()->route('admin.event.edit', ['id' => $id])
                ->with('error', 'Ocorreu um erro ao atualizar o Evento. Por favor, tente novamente.');

            }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $event = Event::findOrFail($id);
        try {
            $event->delete();
            return redirect()->route('admin.events.index')->with('success', 'Evento excluído com sucesso.');
        } catch (\Exception $e) {
            return redirect()->route('admin.users.index')->with('error', 'Erro ao tentar excluir o evento.');
        }

    }
}
