<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\App;
class CBlog extends Controller
{
    public function addBlog(Request $req, $lang)
    {
        $blog = new Blog;
        $blog->photo = $req->file('image')->store('blog-image');
        // dd($req->all(), $req->file('image'));
        $blog->what = $req->what;
        $blog->title_tm = $req->title_tm;
        $blog->desc_tm = $req->desc_tm;
        $blog->title_ru = $req->title_ru;
        $blog->desc_ru = $req->desc_ru;
        $blog->title_en = $req->title_en;
        $blog->desc_en = $req->desc_en;

        $blog->save();

        return redirect('/' . $lang . '/admin/all-articles');
    }


    public function editBlog(Request $req, $lang, $id)
    {
        $blog = Blog::find($id);
        if (isset($req->image)) {
            $blog->photo = $req->file('image')->store('blog-image');
        }
        $blog->what = $req->what;
        $blog->title_tm = $req->title_tm;
        $blog->desc_tm = $req->desc_tm;
        $blog->title_ru = $req->title_ru;
        $blog->desc_ru = $req->desc_ru;
        $blog->title_en = $req->title_en;
        $blog->desc_en = $req->desc_en;

        $blog->save();

        return redirect('/' . $lang . '/admin/all-articles');
    }

    public function ajaxBlog(Request $req)
    {
        if ($req->category_blog == "All") {
            // $portfolio = Portfolio::paginate($perPage);
            $blog = Blog::offset(0)->limit(3)->get();
            // $portfolio = Portfolio::all();
        } else {
            $blog = Blog::where('what', $req->category_blog)->limit(3)->get();
        }
        $json = json_encode($blog);
        return $json;
    }

    public function showMore(string $lang, $pageOffset, $type)
    {
        if ($type != 'All') {
            $blog = Blog::where('what', $type)->offset($pageOffset)->limit(3)->get();
        } else {
            $blog = Blog::offset($pageOffset)->limit(3)->get();
        }

        $json = json_encode($blog);
        return $json;
    }

    public function destroy($lang, $id)
    {
        App::setLocale($lang);
        $blog = Blog::findOrFail($id); // Найти статью по ID
        $blog->delete(); // Удалить статью

        return redirect('/' . $lang . '/admin/all-articles')->with('success', 'Article deleted successfully.');
    }


}
?>