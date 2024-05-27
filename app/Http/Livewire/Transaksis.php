<?php

namespace App\Http\Livewire;

use App\Models\Transaksi;
use App\Models\DetilTransaksi;
use App\Models\Layanan;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class Transaksis extends Component
{
    public $total;
    public $transaksi_id;
    public $layanan_id;
    public $qty=1;
    public $uang;
    public $kembali;

    public function render()
    {
        $transaksi=Transaksi::select('*')->where('user_id','=',Auth::user()->id)->orderBy('id','desc')->first();

        $datalayanan = Layanan::all();
        $this->total=$transaksi->total;
        $this->kembali=$this->uang-$this->total;
        return view('livewire.transaksis')
        ->with('datalayanan', $datalayanan)
        ->with("data",$transaksi)
        ->with("dataTransaksiDetail",DetilTransaksi::where('transaksi_id','=',$transaksi->id)->get());
    }

    public function store()
    {
        $this->validate([
            
            'layanan_id'=>'required'
        ]);
        $transaksi=Transaksi::select('*')->where('user_id','=',Auth::user()->id)->orderBy('id','desc')->first();
        $this->transaksi_id=$transaksi->id;
        $layanan=Layanan::where('id','=',$this->layanan_id)->get();
        $harga=$layanan[0]->price;
        DetilTransaksi::create([
            'transaksi_id'=>$this->transaksi_id,
            'layanan_id'=>$this->layanan_id,
            'qty'=>$this->qty,
            'price'=>$harga
        ]);
        
        
        $total=$transaksi->total;
        $total=$total+($harga*$this->qty);
        Transaksi::where('id','=',$this->transaksi_id)->update([
            'total'=>$total
        ]);
        $this->layanan_id=NULL;
        $this->qty=1;
    }

    public function delete($detiltransaksi_id)
    {
        $detiltransaksi=DetilTransaksi::find($detiltransaksi_id);
        $detiltransaksi->delete();

        //update total
        $detiltransaksi=DetilTransaksi::select('*')->where('transaksi_id','=',$this->transaksi_id)->get();
        $total=0;
        foreach($detiltransaksi as $od){
            $total+=$od->qty*$od->price;
        }
        
        try{
            Transaksi::where('id','=',$this->transaksi_id)->update([
                'total'=>$total
            ]);
        }catch(Exception $e){
            dd($e);
        }
    }

    public function receipt($id)
    {
        //update stok
        $detiltransaksi=DetilTransaksi::select('*')->where('transaksi_id','=', $id)->get();
        //dd($order_detail);
        foreach ($detiltransaksi as $od) {
            $stocklama=Layanan::select('stock')->where('id','=', $od->layanan_id)->sum('stock');
            $stock=$stocklama - $od->qty;
            try {
                Layanan::where('id','=', $od->layanan_id)->update([
                    'stock' => $stock
                ]);
            } catch (Exception $e) {
                dd($e);
            }
        }
        return Redirect::route('cetakReceipt')->with(['id'=>$id]);
    }
}
