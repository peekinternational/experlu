<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class BlogController extends Controller
{
  public function sendsms(Request $request)

    {

      $member = 1;

      $message = 'Your verify code ';//"INTL SMS Send Test";

      $message = $message;//"INTL SMS Send Test";

      $message = bin2hex(iconv('UTF-8', 'UTF-16BE', $message));

      //echo $message."<br>";

      //die();

      $usercode = "oklinkshare";

      $deptcode = "ZZ-38K-FK";

      $group_name = "923054949010";//"82-10xxxxxxxx";

      $from_num = "0220580137";

      $encoding = "UNICODE";



      //echo $message;

      //exit;

      $host_v = "https://toll.surem.com:440/message/direct_INTL_return_post.asp";

      $data_v = "usercode=".$usercode."&deptcode=".$deptcode."&group_name=".$group_name."&from_num=".$from_num."&member=".$member."&to_message=".$message."&Encoding=".$encoding."&Rurl=direct";


  //dd($data_v);
        $ch = curl_init();
        $timeout = 10;
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)');
          curl_setopt($ch, CURLOPT_URL,$host_v);
          curl_setopt($ch, CURLOPT_POST, 1);
          curl_setopt($ch, CURLOPT_POSTFIELDS,$data_v);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
          $result = curl_exec($ch);

      // curl_setopt ($ch, CURLOPT_URL,$host_v);

      // curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

      // curl_setopt ($ch, CURLOPT_SSLVERSION,3);

      // curl_setopt ($ch, CURLOPT_HEADER, 0);

      // curl_setopt ($ch, CURLOPT_POST, 1);

      // curl_setopt ($ch, CURLOPT_POSTFIELDS, $data_v);

      // curl_setopt ($ch, CURLOPT_TIMEOUT, 30);

      // curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);

      // $result = curl_exec ($ch);

      // curl_close ($ch);

     dd($result);

    }
  public function sendsmspage(Request $request)
    {
      $skills = DB::table('skills')->get();
      //dd($categories);
      return view('admin.admin_account.sendsms',compact('skills'));
    }
  public function sendsmstouser(Request $request)

    {
      $skills=$request->input('skill');
      $body=$request->input('body');
     $users=DB::table('registers')->select('name','phone')->where('skill','=',$skills)->where('user_status','=','Active')->get();
       //dd($users);
     foreach($users as $sendtouser){
      $messages= nl2br("Dear ".$sendtouser->name." \n ".$body);
      //dd($message);
      $message =strip_tags($messages);

    $username = "923328624840";
      $password = "7532";
      $sender = "SenderID";
      $post = "sender=".urlencode($sender)."&mobile=".urlencode($sendtouser->phone)."&message=".urlencode($message)."";
        $url = "https://sendpk.com/api/sms.php?username=".$username."&password=".$password."";
        $ch = curl_init();
        $timeout = 10; // set to zero for no timeout
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)');
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $result = curl_exec($ch);
      echo ' send msg to '.$sendtouser->name;
     }

    }
     /**
       * Display a listing of the resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function index()
      {
          $blogs = DB::table('fa_blogs')->orderBy('updated_at', 'desc')->paginate(6);
          $top_three_posts = DB::table('fa_blogs')->orderBy('updated_at', 'desc')->limit(3)->get();
          return view('frontend.blog', compact('blogs','top_three_posts'));
      }

      public function adminListPosts(){
          $blogs = Blog::paginate(5);
          return view('list_posts', compact('blogs'));
      }

      /**
       * Show the form for creating a new resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function create()
      {
          // dd("asdasd");

          return view('admin.create_blog');
      }

      /**
       * Store a newly created resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @return \Illuminate\Http\Response
       */
      public function store(Request $request)
      {
        // dd($request->all());
          $this->validate($request, [
              'title' => 'required',
              'body' => 'required',
              'post_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:80048'
          ]);
          $blog_id = $request->input('blog_id');
          $image = $request->file('post_image');

          $insert_data = array(
              'title' => $request->input('title'),
              'body' => $request->input('body'),
              // 'blog_image' => $image_name,
              'user_id' => session()->get('fa_admin')->id
          );
          if ($image !="") {
          $profilePicture = 'post-'.time().'-'.rand(000000,999999).'.'.$image->getClientOriginalExtension();
          $destinationPath = public_path('frontend-assets/dashboard/post');
          $image->move($destinationPath, $profilePicture);
          $image_name=$profilePicture;
          $insert_data['blog_image'] = $image_name;
          }
          if ($blog_id !="") {
            $post = DB::table('fa_blogs')->where('id','=',$blog_id)->update($insert_data);
          }else {
            $post = DB::table('fa_blogs')->insert($insert_data);
          }
          return redirect('dashboard/blogs')->with('Blog added successfully...!');


      }

      /**
       * Display the specified resource.
       *
       * @param  \App\Blog  $blog
       * @return \Illuminate\Http\Response
       */
      public function show(Request $request,$id)
      {
          $post = DB::table('fa_blogs')->where('id','=',$id)->first();
          $top_three_posts = DB::table('fa_blogs')->orderBy('updated_at', 'desc')->limit(3)->get();
          return view('frontend.show_blog', compact('post','top_three_posts'));
      }

      /**
       * Show the form for editing the specified resource.
       *
       * @param  \App\Blog  $blog
       * @return \Illuminate\Http\Response
       */
      public function edit(Request $request,$id)
      {
          $blog = DB::table('fa_blogs')->where('id','=',$id)->first();
          return view('admin.edit_blog',compact('blog'));
      }

      /**
       * Update the specified resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @param  \App\Blog  $blog
       * @return \Illuminate\Http\Response
       */
      public function update(Request $request, Blog $blog)
      {
          //
          $this->validate($request, [
              'title' => 'required',
              'body' => 'required',
              'user_id' => 'required',
              'post_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:80048'
          ]);

           if($request->hasfile('post_image')){
            $image_name = $request->file('post_image')->getClientOriginalName();
            $request->file('post_image')->move(public_path().'/images/posts/', $image_name);
          }else{
              $image_name = $request->input('blog_image');
          }


          $id = $request->input('id');
          $update_data = array(
              'title' => $request->input('title'),
              'body' => $request->input('body'),
              'blog_image' => $image_name,
              'user_id' => session()->get('u_session')->id
          );
          $posts = Blog::where('id',$id)->update($update_data);
          return redirect('admin/blog')->with('Blog updated successfully...!');
      }

      /**
       * Remove the specified resource from storage.
       *
       * @param  \App\Blog  $blog
       * @return \Illuminate\Http\Response
       */
      public function destroy(Request $request,$id)
      {
        // dd($id);
          $blog = DB::table('fa_blogs')->where('id','=',$id)->delete();
           return redirect('/dashboard/blogs')->with('Blog deleted successfully...!');
      }

       public function header_data2()
    {
      $user_skill_info = DB::table('skills')->get();

      $data = array(
        "skills" => $user_skill_info
      );

      return $data;

    }
}
