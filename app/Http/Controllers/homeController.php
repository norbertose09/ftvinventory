<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use App\Models\Store;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class homeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

public function signin(){
    return view('pages.signin');
}

public function signup(){
    return view(('pages.signup'));
}

public function changepassword(){
    return view('pages.changepassword');
}

public function signupConfig(Request $request){
    $formData = $request->validate([
    'name' => ['required', 'min:6'],
    'email' => ['required', 'email', Rule::unique('users', 'email')],
    'password' => 'required|confirmed|min:6'
    ]);

      //Hash password
      $formData['password'] = bcrypt($formData['password']);

      //create user
      $user = User::create($formData);

      //Login
      auth()->login($user);

      return redirect('/dashboard')->with('message', 'user created and logged in');

}

public function logout(Request $request){
    auth()->logout();

        //To invalidate session and regenerate token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out');
}

public function signinConfig(Request $request){
    $formData =  $request->validate([
        'name' => 'required',
        'password' => 'required'
    ]);
    if(auth()->attempt($formData)){
        $request->session()->regenerate();

        return redirect('/dashboard')->with('message', 'You are now logged in');
    }
    return back()->withErrors(['name' => 'Invalid Credentials'])->onlyInput('name');
}


public function records(){
    return view('pages.records',[
        'item' => Item::all()
    ]);
}

    public function index()
    {
       $todaysSales = Store::forToday()->sum('total_price');
       $totalItemsSold = Store::forToday()->sum('quantity');
       $totalItemsInStock = Item::count();
       $totalCatInStock = Category::count();
       $thisWeeksSales = Store::forCurrentWeek()->sum('total_price');
       $totalItemsSoldThisWeek = Store::forCurrentWeek()->sum('quantity');
       return view('index',[
        'store' => Store::all()
       ],
       compact('todaysSales', 'totalItemsSold', 'totalItemsInStock', 'totalCatInStock', 'thisWeeksSales', 'totalItemsSoldThisWeek'));
    }

    public function revenue(){
        return view('pages.revenue');
    }

    public function createCategory(){
        return view('pages.createcat');
    }

    public function category(){
        return view('pages.category', [
            'category' => Category::all()
        ]);
    }

    public function createcatConfig(Request $request){
   $formDataCat = $request->validate([
    'name' => 'required'
   ]);

   $cate = Category::create($formDataCat);
   if($cate){
    // return redirect('/dashboard')->with('message', 'user created and logged in');
    return redirect('/category');
   }
    }

    public function createItem(){
        return view('pages.createitem', [
            'category' => Category::all()
        ]);
    }

    public function stocks(){
        return view('pages.stocks', [
            'item' => Item::all()
        ]);
    }


    public function createitemconfig(Request $request){
     $itemFormData = $request->validate([
      'name' => 'required',
      'category' => 'required',
      'price' => 'required',
      'quantity' => 'required'
     ]);

     $saveItem = Item::create($itemFormData);
     if($saveItem){
        return redirect('/stocks');
     }
    }

    public function recordconfig(Request $request){
        $item_name = $request->input('item');
        $item_quantity = $request->input('quantity');
        $item = Item::where('name', '=', $item_name)->get();
        foreach($item as $item){
    
        $item_price = $item['price'];
        $cart = new Store;
        $cart->name = $item_name;
        $cart->unit_price = $item_price;
        $cart->quantity = $item_quantity;
        $cart->total_price = $item_price * $item_quantity;
        $cart->save();
        }
      
     return redirect('/records');

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
