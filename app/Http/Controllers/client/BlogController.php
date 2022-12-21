<?php


namespace App\Http\Controllers\client;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class BlogController extends Controller
{
    //

    public function index(Request $request) {
        $list_blog = Blog::getListBlog();
        if(session('login_success')) {
            $email = $request-> session()-> get('user_mail'); 
            $password = $request-> session() -> get('user_password'); 
            $user = User::authUser($email,  $password);
            return view('clients.blog', compact('user','list_blog')); 
        }
      
        return view('clients.blog', compact('list_blog')); 
    }
    public function blogDetail($id_blog){
        $blog = Blog::getdetailBlog($id_blog);     
       return view('clients.blog-detail',compact('blog'));
    }
    public function list() {
        $list_blog = Blog::getListBlog();
        return view('admin.blog.all-blog', compact('list_blog'));
    }
     // add category 
     public function addView(){
        
        return view('admin.blog.add-blog');
    }

    
    public function addPost(Request $request) {
        
        
        $title = $request->title;
        $author = $request->author; 
        $content_blog = $request->content_blog;
        $content_blog_short = $request->content_blog_short;
         
 
        $image = $request-> file('image_blog');
        $imgName = current(explode('.', $image->getClientOriginalName()));
        $extension = $image-> getClientOriginalExtension();
        $img = $imgName.rand(1,100).'.'.$extension;
        $image -> move('uploads/blogs', $img); 
        
        $data = [
            'title'        => $title,
            'image'      => $img,
            'author' => $author,
            'content'      => $content_blog,
            'content_blog_short'      => $content_blog_short,
       
            
        ];

    

     
    // dd($data);
        Blog::addBlog($data); 
        $request->session()->put('msg', 'Thêm sách thành công');
        return redirect() -> route('blog.admin');

    }
     // update event
     public function updateView($id) {
        $blog = Blog::getBlog($id);     
        return view('admin.blog.edit-blog', compact('id','blog'));
    }

    public function updatePost(Request $request, $id) {
   
       
        $title = $request->title;
        $author = $request->author; 
        $content_blog = $request->content_blog;
        $content_blog_short = $request->content_blog_short;
         
        $image = $request-> file('image_blog');
        $imgName = current(explode('.', $image->getClientOriginalName()));
        $extension = $image-> getClientOriginalExtension();
        $img = $imgName.rand(1,100).'.'.$extension;
        $image -> move('uploads/blogs', $img); 
        
        $data = [
            'title'        => $title,
            'image'      => $img,
            'author'      => $author,
            'content'      => $content_blog,
            'content_blog_short'      => $content_blog_short,
       
            
        ];
         dd($data) ;
        // $edit = Blog::editBlog($data, $id); 
        $request->session()->put('msg','Cập nhật thành công');
        return redirect() -> route('blog.admin');
    }
    // delete event 
    public function deleteBlog(Request $request, $id) {
       
        $nameImg = Blog::getNameImage($id);
        $img = $nameImg->image;
        File::delete(public_path("uploads/events/$img"));
        $rs = Blog::removeBlog($id);
        $request->session()->put('msg','Xóa thành công');
        return redirect() -> route('blog.admin');
    }

 
}
