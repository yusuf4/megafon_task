<?php

namespace App\Http\Controllers\Invoice;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\In;
use Inertia\Inertia;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index(Request $request)
    {
        $invoice = Invoice::query()
            ->when($request->search, function ($query, $search) use ($request) {
                $query->where('name', 'LIKE', "%{$search}%");
                $query->orWhere('invoice', 'LIKE', "%{$search}%");
            })
            ->with('userInvoice:id,name')
            ->get();
            //->withQueryString();
        if (Auth::check()){
            $userRole= Auth::user()->is_admin;
        };
        $searchlist = $request->only(['search']);
        return Inertia::render('Invoice/Index', [
            'invoice'=>$invoice,
            'userRole'=>$userRole,
            'searchlist'=>$searchlist
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        if (Auth::check()){
            $userRole= Auth::user()->is_admin;
        };
        return Inertia::render('Invoice/Add',[
            'userRole'=>$userRole
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // dd($request);
        Invoice::create([
            'name'=> $request->name,
            'lastname'=> $request->lastname,
            'phone' => $request->phone,
            'invoice' => $request->invoice,
        ]);
        return redirect()->route('invoice.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Inertia\Response
     */
    public function edit($id)
    {
        $invoiceID = Invoice::findOrFail($id);
        $users = User::query()
            ->where('is_admin', '=', 2)
            ->select('id', 'name', 'is_admin')
            ->get();

        return Inertia::render('Invoice/Edit',[
           'invoiceID'=>$invoiceID,
            'users'=>$users
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $item = Invoice::findOrFail($id);
        $userID = $request->user_id['id'];
        //dd($userID);
        $item->update([
            'name'=> $request->name,
            'lastname'=> $request->lastname,
            'phone'=> $request->phone,
            'invoice'=> $request->invoice,
            'status'=> $request->status,
            'user_id'=> $userID,
        ]);
        return redirect()->route('invoice.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Invoice::findOrFail($id)->delete();
        return redirect()->route('invoice.index');

    }
}
