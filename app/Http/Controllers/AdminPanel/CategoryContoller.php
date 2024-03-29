<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $appends =[
        'getParentsTree'
    ];

    public static function getParentsTree($category,$title){
        if ($category->parent_id == 0){
            return $title;
        }

        $parent= Category::find($category->parent_id);
        $title = $parent->title . ' > ' .$title;
        return CategoryContoller::getParentsTree($parent,$title);
    }

    public static function getCategory($category,$title){
        if ($category->parent_id == 0){
            return $title;
        }

        $parent= Category::find($category->parent_id);
        $title = $title;
        return CategoryContoller::getCategory($parent,$title);
    }



    public function index()
    {
        $data = Category::all();
        $dataSettings = Setting::first();

        /*Main Slider Category*/
        if(Category::find(99)==null){
            $dataNavCategory = new Category();
            $dataNavCategory->id = 99;
            $dataNavCategory->parent_id = 0;
            $dataNavCategory->title = 'Main Slider';
            $dataNavCategory->status = 'True';
            $dataNavCategory->save();
        }

        return view('admin.category.index',[
            'data'=>$data,
            'dataSetting'=>$dataSettings
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Category::all();
        $dataSettings = Setting::first();
        return view('admin.category.create',[
            'data'=>$data,
            'dataSetting'=>$dataSettings
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Category();
        $data->parent_id = $request->parent_id;
        $data->title = $request->title;
        $data->keywords = $request->keywords;
        $data->description = $request->description;
        if ($request->file('image')){
            $data->image=$request->file('image')->store('images');
        }
        $data->status = $request->status;
        $data->save();
        return redirect('admin/category');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category,$id)
    {
        $data = Category::find($id);
        $dataSettings = Setting::first();
        return view('admin.category.show',[
            'data'=>$data,
            'dataSetting'=>$dataSettings
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category,$id)
    {
        $data = Category::find($id);
        $dataList = Category::all();
        $dataSettings = Setting::first();
        return view('admin.category.edit',[
            'data'=>$data,'dataList'=>$dataList,
            'dataSetting'=>$dataSettings
        ]);
    }

    /**
     * Updata the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category,$id)
    {
        $data = Category::find($id);
        $data->parent_id= $request->parent_id;
        $data->title = $request->title;
        $data->keywords = $request->keywords;
        $data->description = $request->description;
        $data->status = $request->status;
        if ($request->file('image')){
            $data->image=$request->file('image')->store('images');
        }
        $data->save();
        return redirect('admin/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category,$id)
    {
        $data= Category::find($id);
        Storage::delete($data->image);
        $data->delete();
        return redirect('admin/category');
    }
}
