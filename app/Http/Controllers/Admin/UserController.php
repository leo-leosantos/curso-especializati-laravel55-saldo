<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileFormRequest;

class UserController extends Controller
{
    public function profile()
    {
            return view('site.profile.profile');
    }


    public function profileUpdate(UpdateProfileFormRequest $request)
    {
        $user = auth()->user();
      
        $data = $request->all();

        if($data['password'] != null)
        {
            $data['password']  = bcrypt($data['password']);
        }else{

            unset($data['password']);
        }

        var_dump($user->image);

        $data['image'] = $user->image;

       
        $dataFoto = $request->hasFile('image') && $request->file('image')->isValid();
      
        if($dataFoto){

           
        
                $name = $user->id.kebab_case($user->name);
               
                  
             
                $extension = $request->image->extension();

                $nameFile = "{$name}.{$extension}";

                $data['image'] = $nameFile;

               $uploadFile =   $request->image->storeAs('users',$user->id.'/'.$nameFile);

               
                    if(!$uploadFile){
                        return redirect()->back()->with('error','Error ao  atualizar perfil!');

                    
            
                    }
        }

        $update = $user->update($data);


        if($update){
            return redirect()->route('profile')->with('success','Perfil atualizado com sucesso.');
        }

        return redirect()->back()->with('error','Error ao  atualizar perfil!');

    }
}
