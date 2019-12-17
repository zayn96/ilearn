<?php

namespace App\Http\Controllers;
use App\Transaction;
use Illuminate\Http\Request;
class TransactionsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     */
    public function index()
    {
        $transactions = Transaction::all();

        return view('pages.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'amount' => 'required|max:255',
            'eSign' => 'required|max:255',
            'mpesa_receipt_no' => 'required|max:10',
            'phone_number' => 'required|max:255',
            'username' => 'required|max:255',
            'name' => 'required|max:255',
            'email' => 'required|email',
        ]);
        $transaction = Transaction::create($validatedData);

        return redirect('/transactions')->with('success', 'Transaction has been successfully saved');
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
        $transaction = Transaction::findOrFail($id);

        return view('pages.edit', compact('transaction'));
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
        $validatedData = $request->validate([
            'amount' => 'required|max:255',
            'eSign' => 'required|max:255',
            'mpesa_receipt_no' => 'required|max:10',
            'phone_number' => 'required|max:255',
            'username' => 'required|max:255',
            'name' => 'required|max:255',
            'email' => 'required|email',
        ]);
        Transaction::whereId($id)->update($validatedData);

        return redirect('/transactions')->with('success', 'Transaction is successfully updated');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     *
     */
    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return redirect('/transactions')->with('success', 'Transaction is successfully deleted');
    }

}
