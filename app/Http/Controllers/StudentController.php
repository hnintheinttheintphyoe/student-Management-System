<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
 public function studentList(){
    // dd(request('key'));
    $students=Student::when(request('key'),function($query){
        $searchKey=request('key');
        $query->orWhere('first_name','like','%'.$searchKey.'%')
              ->orWhere('second_name','like','%'.$searchKey.'%')
            ->orWhere('cne','like','%'.$searchKey.'%')
            ->orWhere('speciality','like','%'.$searchKey.'%')
             -> orWhere('age','like','%'.$searchKey.'%');

    })->
    orderBy('created_at','desc')->paginate(5);

    return view('students',compact('students'));
 }
 public function createPage(){
    $students=Student::orderBy('created_at','desc')->paginate(5);
    return view('create',compact('students'));
 }
 public function delete($id){
    $data=Student::where('id',$id)->delete();
    return back()->with('deleteSuccess','!Successful,Student information deleted');

 }
 public function create(Request $request){
    // dd($request->all());
    $this->studentValidationRule($request);
    $data=$this->getStudentData($request);
    // dd($request->file('image'));
    if($request->hasFile('image')){
      $fileName=uniqid().$request->file('image')->getClientOriginalName();
      $request->file('image')->storeAs('public',$fileName);
      $data['image']=$fileName;
      }



    Student::create($data);

    return redirect()->route('students#createPage');
 }
 public function editPage($id){
    $data=Student::where('id',$id)->first();
    // dd($data->toArray());
    return view('edit',compact('data'));
 }
 public function edit(Request $request){
    $this->studentValidationRule($request);
    $data=$this->getStudentData($request);
    if($request->hasFile('image')){
        $oldImage=Student::where('id',$request->id)->first();
        $oldImage=$oldImage->image;
        if($oldImage != null){
            Storage::delete('public/'.$oldImage);
        }
        $newImage=uniqid().$request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public',$newImage);
        $data['image']=$newImage;
    }

    Student::where('id',$request->id)->update($data);
    return redirect()->route('students#createPage')->with('updateSuccess','Successful!student information updated..');

 }
    //student data
    private function getStudentData($request){
        $data=[
            'cne'=>$request->cne,
            'first_name'=>$request->firstname,
            'second_name'=>$request->secondname,
            'age'=>$request->age,
            'speciality'=>$request->speciality
        ];
        return $data;
    }
    private function studentValidationRule($request){
        Validator::make($request->all(),[
            'cne'=>'required|unique:students,cne,'.$request->id,
            'image'=>'mimes:jpg,jpeg,png,webp',
            'firstname'=>'required',
            'secondname'=>'required',
            'age'=>'required',
            'speciality'=>'required'

        ])->validate();
    }
}

