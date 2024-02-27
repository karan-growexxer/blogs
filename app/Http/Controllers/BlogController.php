<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Http\Requests\StoreBlogRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BlogController extends Controller
{
    /**
     * Used this for show listing page, and also handle Ajax request.
     *
     * @param  mixed $request
     * @return void
     */
    public function index(Request $request) 
    {
        if($request->ajax()) {
            $blogsBuilder = new Blog();
            if($request->has('search')) {
                $blogsBuilder = $blogsBuilder->where('title','LIKE', "%$request->search%")
                    ->orWhere('content','LIKE', "%$request->search%");
            }
            $blogsCollection = $blogsBuilder->get();
            return response()->json(['html'=> view('blogs.list', compact('blogsCollection'))->render()]);
        }
        return view('blogs.index');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(StoreBlogRequest $request) {
        try{
            $input = $request->all();
            if(!empty($request->id)) {
                $task = Blog::find($request->id);
                $task->update($input);
                return ['success' => true, 'message' => 'Task updated successfully'];
            } else {
                Blog::create($input);
                return  ['success' => true, 'message' => 'Task created successfully'];
            }
        } catch(Exception $e) {
            Log::error($e);
            $response = ['success' => false, 'message' => 'Something went wrong'];
        }
        return response()->json($response);
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
        //
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
