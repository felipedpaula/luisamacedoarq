<?php

namespace App\Http\Controllers\CmsControllers;

use App\Http\Controllers\Controller;
use App\Models\TypeUser;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class UsersController extends Controller
{

    private $dadosPagina;
    private $user;
    private $users;

    public function index() {
        $this->dadosPagina['tituloPagina'] = 'Todos os usuários';
        $this->dadosPagina['tipos'] = TypeUser::all();
        $this->dadosPagina['usuarios'] = User::paginate(10);
        return view('cms.pages.users.index', $this->dadosPagina);
    }

    public function register() {
        $this->dadosPagina['tituloPagina'] = 'Registro de usuário';
        $this->dadosPagina['tipos'] = TypeUser::all();
        return view('cms.pages.users.register', $this->dadosPagina);
    }

    public function store(Request $request) {
        $data = $request->only([
            'name',
            'email',
            'password',
            'type_id',
            'cpf',
            'birth',
            'tel',
            'status',
        ]);

        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
            'type_id' => ['required', 'integer', 'in:1,2,3,4'],
            'cpf' => ['required', 'string', 'unique:users,cpf'],
            'birth' => ['required', 'date', 'before:today'],
            'tel' => ['required', 'string'],
            'status' => ['required', 'in:0,1'],
        ];

        $validator = Validator::make($data, $rules);

        if($validator->fails()) {
            return redirect()->route('admin.user.create')
            ->withErrors($validator)
            ->withInput();
        }

        try {
            $user = User::firstOrNew(['email' => $data['email']]);
            if (!$user->exists) {
                $user->name = $data['name'];
                $user->type_id = $data['type_id'];
                $user->password = Hash::make($data['password']);
                $user->cpf = $data['cpf'];
                $user->birth = $data['birth'];
                $user->tel = $data['tel'];
                $user->status = $data['status'];
                $user->save();
                return redirect()->route('admin.users.index')->with('success', 'Usuário criado com sucesso!');
            } else {
                return redirect()->route('admin.user.create')->with('error', 'E-mail já está em uso.');
            }

        } catch (\Exception $e) {
            return redirect()->route('admin.user.create')->with('errors', 'Ocorreu um erro ao criar o usuário. Por favor, tente novamente.');
        }
    }

    public function edit(Request $request) {
        $idUser = $request->id;
        $user = User::findOrFail($idUser);

        if ($user->birth !== null) {
            $user->birth = Carbon::parse($user->birth)->format('Y-m-d');
        }

        $this->dadosPagina = [
            'usuario' => $user,
            'tituloPagina' => 'Editar usuário: ' .$user->name
        ];

        return view('cms.pages.users.edit', $this->dadosPagina);
    }

    public function update(Request $request, $id) {
        $user = User::findOrFail($id);

        $data = $request->only([
            'name',
            'email',
            'password',
            'type_id',
            'cpf',
            'birth',
            'tel',
            'status',
        ]);

        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'type_id' => ['required', 'integer', 'in:1,2,3,4'],
            'cpf' => ['required', 'string', 'unique:users,cpf,' . $user->id],
            'birth' => ['required', 'date', 'before:today'],
            'tel' => ['required', 'string'],
            'status' => ['required', 'in:0,1'],
        ];

        if ($request->has('password') && !empty($data['password'])) {
            $rules['password'] = ['string', 'min:8'];
        }

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return redirect()->route('admin.user.edit', ['id' => $id])
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $user->name = $data['name'];
            $user->email = $data['email'];
            if (!empty($data['password'])) {
                $user->password = Hash::make($data['password']);
            }
            $user->type_id = $data['type_id'];
            $user->cpf = $data['cpf'];
            $user->birth = $data['birth'];
            $user->tel = $data['tel'];
            $user->status = $data['status'];
            $user->save();

            return redirect()->route('admin.users.index')->with('success', 'Usuário atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('admin.user.edit', ['id' => $id])
                ->with('error', 'Ocorreu um erro ao atualizar o usuário. Por favor, tente novamente.');
        }
    }

    public function delete(Request $request) {
        $idUser = $request->id;
        $user = User::find($idUser);
        if (!$user) {
            return redirect()->route('admin.users.index')->with('error', 'Usuário não encontrado.');
        }
        try {
            $user->delete();
            return redirect()->route('admin.users.index')->with('success', 'Usuário excluído com sucesso.');
        } catch (\Exception $e) {
            return redirect()->route('admin.users.index')->with('error', 'Erro ao tentar excluir o usuário.');
        }
    }


}
