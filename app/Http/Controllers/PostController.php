<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Post;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->paginate(10);

        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $post = new Post([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'content' => $request->content
        ]);

        $post->save();

        $request->session()->flash('message', 'Post has been added');

        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.post')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit')->withPost($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $post->update([
            'title' => $request->title,
            'content' => $request->content
        ]);

        $request->session()->flash('message', 'Post has been updated');

        return redirect('/posts');
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

    /**
     * Upload csv
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function csvupload(Request $request)
    {
        $result = [];

        if($request->file()) {

            $file = $request->file('file');

            $fileExtension = $file->getClientOriginalExtension();

            //check file type
            if ($fileExtension == 'csv') {
                $filepath = $file->getRealPath();
        
                $records = array_map('str_getcsv', file($filepath));
        
                if (!count($records) > 0) {
                    $result['error'] = 'No records in file';
                } else {
                    // Get field names from header column
                    $fields = array_map('strtolower', $records[0]);
            
                    // Remove the header column
                    array_shift($records);
            
                    foreach ($records as $record) {
                        if (count($fields) != count($record)) {
                            return 'csv_upload_invalid_data';
                        }
            
                        // Set the field name as key
                        $record = array_combine($fields, $record);
            
                        // Get the clean data
                        $this->rows[] = $record;
                    }
            
                    foreach ($this->rows as $data) {
                        Post::create([
                        'title' => $data['title'],
                        'content' => $data['content'],
                        'user_id' => $data['user_id']
                        ]);
                    }

                    $result['Success'] = "Added " . count($records) . " records";
                }
        
            } else {
                $result['error'] = 'File extension is not .csv';
            }
        } else {
            $result['error'] = 'No file uploaded.';
        }

        return view('posts.uploadresult')->withResult($result);
    }    
}
