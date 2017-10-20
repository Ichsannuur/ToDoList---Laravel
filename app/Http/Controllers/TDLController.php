<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ToDoList;
class TDLController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req){
        $cari = $req->get('search');
        if ($cari != "") {
            $datas = ToDoList::where('title','LIKE','%'.$cari.'%')->paginate();
            if (count($datas)) {
                return view('form.showlist')->with('datas', $datas);
            }else{
                echo "<script>alert('Data Tidak Ada');window.location='/'</script>";
            }
        }else{
            $datas = ToDoList::where('done','=',0)->paginate();
            // $datas = ToDoList::orderBy('id','DESC')->paginate();    
            return view('form.showlist')->with('datas', $datas);
        }
    }

    public function done($id){
        $done = ToDoList::where('id',$id)->first();
        $done->done = 1;
        $done->update(); 
        echo "<script>alert('List Selesai');window.location='/'</script>";
    }

    public function showdone(){
        $datas = ToDoList::where('done','=',1)->paginate();
        return view('form.showdone')->with('datas',$datas);
    }

    public function editList($id){
        $edits = ToDoList::where('id', $id)->first();
        return view('form.editlist')->with('edit', $edits);
    }

    public function tambahList(){
        return view('form.tambahlist');
    }

    public function deleteList($id){
        $delete = ToDoList::where('id', $id)->first();
        $delete->delete();
        echo "<script>alert('Data Dihapus');window.location='/'</script>";
    }

    // public function search(Request $request){
    //     $query = $request->get('q');
    //     $datas = ToDoList::where('title', 'LIKE','%'.$query.'%');
    //     return view('form.showlist', compact('datas','query'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'desc' => 'required'       
        ]);

        $add = new ToDoList();
        $add->title = $request['title'];
        $add->description = $request['desc'];
        $add->done = 0;
        //Nambahin gambar ke folder
        $foto = $request->file('gambar');
        $namaFoto = $foto->getClientOriginalName();
        $request->file('gambar')->move("image/", $namaFoto);

        $add->image = $namaFoto;
        $add->save();
        echo "<script>alert('Data Ditambahkan');window.location='/'</script>";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $update = ToDoList::where('id', $id)->first();
        $update->title = $request['title'];
        $update->description = $request['description'];
        $update->done = 0;
        //Cek apakah foto kosong
        if ($request->file('gambar') == "") {
            $update->image = $update->image;
        }else{
            $foto = $request->file('gambar');
            $namaFoto = $foto->getClientOriginalName();
            $request->file('gambar')->move('image/',$namaFoto);
            $update->image = $namaFoto;
        }

        $update->update();
        echo "<script>alert('Data Diupdate');window.location='/'</script>";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
