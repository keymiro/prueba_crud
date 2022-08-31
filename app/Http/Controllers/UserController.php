<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\Helpers\ConsumeApi;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $token = session()->get('token');
        $params =   [
            'headers' =>[
                            'Authorization'=>"Bearer $token"
                        ]
            ];
            $data = new ConsumeApi('GET','users',$params);
            $users = $data->apiResource();
            return view('users.index')->with(compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validation($request);

        if ($validator->fails()) {
            return response()->json(['message'=>$validator->errors()]);
        }

        $token = session()->get('token');

        $params =   [

            'headers' =>[
                        'Authorization'=>"Bearer $token",
                        ],

            'form_params' => [
                                'name' => $request->name,
                                'email' => $request->email,
                                'gender' => $request->gender,
                                'status' => $request->status,
                            ]
            ];

        $data = new ConsumeApi('POST','users/',$params);

        $message = $data->apiResource();

        $data = "id = $message->id, nombre = $message->name, correo = $message->email, genero = $message->gender, status = $message->status";

        return redirect()->route('users.index')->with('notification',$data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $token = session()->get('token');

        $params =   [

            'headers' =>[
                        'Authorization'=>"Bearer $token"
                        ]
            ];

        $data = new ConsumeApi('GET',"users/$id",$params);

        $user = $data->apiResource();

        return view('users.edit')->with(compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = $this->validation($request);

        if ($validator->fails()) {
            return response()->json(['message'=>$validator->errors()]);
        }

        $token = session()->get('token');

        $params =   [

            'headers' =>[
                        'Authorization'=>"Bearer $token"
                        ],

            'form_params' => [
                                'name' => $request->name,
                                'email' => $request->email,
                                'gender' => $request->gender,
                                'status' => $request->status,
                            ]
            ];

        $data = new ConsumeApi('PUT',"users/$id",$params);

        $message = $data->apiResource();

        $data = "id = $message->id, nombre = $message->name, correo = $message->email, genero = $message->gender, status = $message->status";

        return redirect()->route('users.index')->with('notification',$data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $token = session()->get('token');

        $params =   [

            'headers' =>[
                        'Authorization'=>"Bearer $token"
                        ]
            ];

        $data = new ConsumeApi("DELETE","users/$id",$params);

        $message = $data->apiResource();

        return redirect()->route('users.index')->with('notification','Registro eliminado');
    }

    public function validation($request){

        $validator = Validator::make($request->all(),
        [
            'name'   => 'required|string',
            'email'  => 'required|email',
            'gender' => 'required|string',
            'status' => 'required|string',
        ]);

        return $validator;
    }
}
