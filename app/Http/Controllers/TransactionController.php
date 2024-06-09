<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function transaction()
    {
        $userId = Auth::id();

        $transactions = Transaction::where('user_id', $userId)->orderBy('created_at', 'desc')->get();

        $totalPemasukan = Transaction::where('user_id', $userId)->where('income_or_expenditure', 'Pemasukan')->sum('price');
        $totalPengeluaran = Transaction::where('user_id', $userId)->where('income_or_expenditure', 'Pengeluaran')->sum('price');
        $totalKeuangan = $totalPemasukan - $totalPengeluaran;
        return view('index', compact('transactions','totalKeuangan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function transactionCreate()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function transactionStore(Request $request)
    {
        // Validasi data yang diterima dari request
        $request->validate([
            'transaction_name' => 'required|string',
            'income_or_expenditure' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        $userId = auth()->id();
    
        // Mendapatkan waktu saat ini dalam format yang diinginkan
        $currentTime = time();
    
        // Mengambil ekstensi file gambar yang diunggah
        $imageExtension = $request->file('image')->getClientOriginalExtension();
    
        // Membuat nama unik untuk gambar dengan menambahkan waktu saat ini ke nama aslinya
        $imageName = 'image_' . $currentTime . '.' . $imageExtension;
    
        // Memindahkan file gambar ke direktori publicimages
        $request->file('image')->move(public_path('images'), $imageName);
    
        // Simpan data ke database
        $transaction = new Transaction();
        $transaction->transaction_name = $request->transaction_name;
        $transaction->income_or_expenditure = $request->income_or_expenditure;
        $transaction->price = $request->price;
        $transaction->user_id = $userId;
        $transaction->image = 'images/' . $imageName;
        $transaction->save();
    
        return redirect()->route('transaction')->with('success', 'Transaksi Baru Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function transactionDestroy(string $id)
    {
        // Temukan transaksi berdasarkan ID atau gagal dengan exception
        $transaction = Transaction::where('id', $id)->firstOrFail();
        
        // Hapus gambar terkait jika ada
        if (!empty($transaction->image)) {
            $imagePath = public_path($transaction->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
    
        // Hapus transaksi dari database
        $transaction->delete();
        
        // Redirect ke route 'transaction' dengan pesan sukses
        return redirect()->route('transaction')->with('success', 'Transaksi Berhasil Dihapus');
    }
}
