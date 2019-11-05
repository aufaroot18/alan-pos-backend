<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use PDF;

class KasirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSession(Request $request) {
        $session['cart'] = $request->session()->get('cart');
        $session['harga'] = $request->session()->get('harga');
        
        return $session;
    }

    public function index(Request $request)
    {
        $barangs = Barang::all();
        $session = $this->getSession($request);
        return view('kasir.index', [
            'barangs' => $barangs,
            'cart' => $session['cart'],
            'harga' => $session['harga']
        ]);
    }

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
        $request->session()->push('cart', $request->all());
        $cart = $request->session()->get('cart');
        $barangs = Barang::all();

        $harga = 0;
        foreach ($cart as $cart) {
            $harga = $harga + $cart['harga'];
        }
        $request->session()->put('harga', $harga);

        $session = $this->getSession($request);

        return view('kasir.index', [
            'barangs' => $barangs,
            'cart' => $session['cart'],
            'harga' => $session['harga']
        ]);
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

    /*
    Clear all cart
     */
    public function clear(Request $request)
    {
        $request->session()->forget('cart');
        $request->session()->forget('harga');
        return redirect()->route('kasir.index');
    }

    /*
    Print cart to pdf
     */
    public function print(Request $request) {
        $session = $this->getSession($request);

        if($session['cart'] == null) {
            return abort(404);
        }
        
        $pdf = PDF::loadView('kasir.print', [
            'cart' => $session['cart'],
            'harga' => $session['harga']
        ]);

        return $pdf->stream();
    }
}
